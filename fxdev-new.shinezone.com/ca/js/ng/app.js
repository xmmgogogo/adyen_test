(function () {
    function loadLibrary(plugin) {
        var defer = new jQuery.Deferred(), pluginName = plugin.name || plugin, pluginPath = plugin.path || adyen.jsbase + "/" + plugin + ".js";
        if (typeof jQuery.fn[pluginName] === "function") {
            defer.resolve(jQuery.fn[pluginName]);
        } else {
            jQuery.getScript(pluginPath);
            var wait = setInterval(function () {
                if (typeof jQuery.fn[pluginName] === "function") {
                    clearInterval(wait);
                    defer.resolve(jQuery.fn[pluginName]);
                }
            }, 100);
        }
        return defer.promise();
    }

    var AdyenApp = angular.module("adyen", []), adyen = window.adyen = window.adyen || {};
    define("ng/app", [], function () {
        return AdyenApp;
    });
    adyen.__app = AdyenApp;
    adyen.config = adyen.config || {};
    adyen.appConfig = true;
    AdyenApp.config(function ($sceProvider) {
        if (jQuery(document.documentElement).hasClass("ie7")) {
            $sceProvider.enabled(false);
        }
    });
    function queryDate(date) {
        var parts = [date.getFullYear(), "" + (date.getMonth() + 1), "" + date.getDate()];
        if (parts[1].length < 2) {
            parts[1] = "0" + parts[1];
        }
        if (parts[2].length < 2) {
            parts[2] = "0" + parts[2];
        }
        return parts.join("-");
    }

    function dateDiff(diff, startDate) {
        var date = new Date();
        if (startDate) {
            date.setTime(startDate.getTime());
        }
        if (diff.days) {
            date.setTime(date.getTime() + 1000 * 60 * 60 * 24 * diff.days);
        }
        if (diff.months) {
            var years = Math.ceil(diff.months / 12), months = parseInt(diff.months, 10), month = parseInt(date.getMonth(), 10);
            if (years !== 0) {
                months -= years * 12;
                date.setFullYear(date.getFullYear() + years);
            }
            if (months < 0 && -months > month) {
                months = 11 - parseInt(month, 10) + parseInt(months, 10);
                date.setFullYear(date.getFullYear() - 1);
                date.setMonth(parseInt(months, 10));
            } else {
                if (months > 0 && (month + months) > 11) {
                    date.setFullYear(date.getFullYear() + 1);
                    date.setMonth((month + months) % 12);
                } else {
                    date.setMonth(parseInt(month + months, 10));
                }
            }
        }
        if (diff.years) {
            date.setFullYear(date.getFullYear() + diff.years);
        }
        return date;
    }

    function roundToDecimals(value, decimals) {
        var multiplier = Math.pow(10, decimals);
        return (Math.round(value * multiplier) / multiplier);
    }

    var cfg = adyen.config = adyen.config || {}, chartsXML = (adyen.base.slice(-1) === "/") ? adyen.base + "ca/reports/chartxml.php" : adyen.base + "/ca/reports/chartxml.php", dateMin14 = queryDate(dateDiff({days: -14})), dateMin10w = queryDate(dateDiff({days: -70})), dateMin1Year = queryDate(dateDiff({years: -1}));

    function setDefaults(target, defaults) {
        for (var i in defaults) {
            if (defaults.hasOwnProperty(i)) {
                if (typeof defaults[i] === "object") {
                    target[i] = target[i] || {};
                    setDefaults(target[i], defaults[i]);
                } else {
                    target[i] = target[i] || defaults[i];
                }
            }
        }
    }

    var QS_PIE = "&showLabels=false&showValues=false&showPercentValues=false&showPercentInToolTip=false&enableRotation=false&showZeroPies=false", serviceDefaults = {
        conversionPerPaymentMethodService: chartsXML + "?statsType=CONVERSION_PER_PAYMENTMETHOD&granularity=day&lang=$lang",
        atvPerPaymentMethodService: chartsXML + "?statsType=ATV_PER_PAYMENTMETHOD&granularity=day&lang=$lang",
        sessionsEightRegions: chartsXML + "?statsType=MAP_WORLD_8REGION&granularity=day&lang=$lang&showLabels=true",
        acquirerConversionService: chartsXML + "?statsType=CONVERSION_PER_ACQUIRER&granularity=day&lang=$lang",
        defendableChargebackServiceUrl: adyen.base + "/ca/disputes/summaryJSON.shtml",
        disputesPageUrl: adyen.base + "/disputes/showList.shtml",
        bookmarksUrl: adyen.base + "/ca/accounts/bookmarksJSON.php",
        speedometerUrl: adyen.base + "/ca/reports/chartdata/speedometer.php?random=" + new Date().getTime(),
        weekHistoryUrl: adyen.base + "/ca/reports/chartdata/chart_weekhistory.php?random=" + new Date().getTime(),
        ecpPerTimeInterval: chartsXML + "?statsType=ECP_PER_TIME_INTERVAL&granularity=day&bdate=" + dateMin14 + "&lang=$lang" + QS_PIE,
        transactionBreakdownPerTimeIntervalUrl: {
            days: chartsXML + "?statsType=TRANSACTION_BREAKDOWN_PER_TIME_INTERVAL&granularity=day&bdate=" + dateMin14 + QS_PIE,
            weeks: chartsXML + "?statsType=TRANSACTION_BREAKDOWN_PER_TIME_INTERVAL&granularity=week&bdate=" + dateMin10w + QS_PIE,
            months: chartsXML + "?statsType=TRANSACTION_BREAKDOWN_PER_TIME_INTERVAL&granularity=month&bdate=" + dateMin1Year + QS_PIE
        }
    };
    setDefaults(adyen.config, serviceDefaults);
    function responseFilter(deferred, axis, config) {
        config = config || {};
        return function (response) {
            var result = [], parser = new DOMParser(), xml = parser.parseFromString(response.data, "text/xml"), meta = {}, categories = xml.getElementsByTagName("category"), datasetName = [], dataset = [], datasets = xml.getElementsByTagName("dataset"), d, c = categories.length, axisLength = axis.length, axisCount, volumeRegEx, volumeAttribute;
            if (config.volumeMatcher) {
                volumeAttribute = config.volumeMatcher.split(/,/, 2)[0];
                volumeRegEx = new RegExp(config.volumeMatcher.split(/,/, 2)[1]);
            }
            meta.currency = xml.firstChild.getAttribute("numberSuffix") || "";
            for (d = datasets.length; d-- > 0;) {
                datasetName[d] = datasets[d].getAttribute("seriesName").toLowerCase() || "value" + d;
                dataset[d] = datasets[d].getElementsByTagName("set") || null;
            }
            for (; c-- > 0;) {
                var item = {
                    name: categories[c].getAttribute("label"),
                    volume: 0,
                    avg: 0,
                    order: c
                }, todo = [], todoItem;
                for (d = dataset.length; d-- > 0;) {
                    item[datasetName[d]] = parseInt(dataset[d][c].getAttribute("value"), 10);
                    if (volumeAttribute) {
                        item.volumeText = dataset[d][c].getAttribute(volumeAttribute);
                        item.volumeMatch = item.volumeText.match(volumeRegEx);
                        item[datasetName[d]] = parseInt(item.volumeMatch && item.volumeMatch[1] || "0", 10);
                    }
                    item.volume += item[datasetName[d]];
                    todo.push(datasetName[d]);
                }
                var totalp = 0;
                while (todo.length) {
                    todoItem = todo.shift();
                    item[todoItem + "_p"] = Math.floor(100 / item.volume * item[todoItem]);
                    totalp += item[todoItem + "_p"];
                }
                if (totalp < 100) {
                    item.authorised_p += (100 - totalp);
                }
                axisCount = 0;
                for (var a = 0; a < axisLength; a++) {
                    item[axis[a] + "_l"] = axisCount;
                    axisCount += (item[axis[a] + "_p"] || 0);
                }
                result.push(item);
            }
            deferred.resolve({result: result, meta: meta});
        };
    }

    function regionResponseFilter(deferred) {
        return function (response) {
            var result = [], parser = new DOMParser(), xml = parser.parseFromString(response.data, "text/xml"), meta = {}, countries = xml.getElementsByTagName("entity"), c = countries.length;
            for (; c-- > 0;) {
                result.push({
                    name: countries[c].getAttribute("toolText").split(" from ").pop(),
                    value: countries[c].getAttribute("value"),
                    link: countries[c].getAttribute("link"),
                    sessions: parseInt(countries[c].getAttribute("toolText").split(" ")[0], 10),
                    text: countries[c].getAttribute("toolText")
                });
            }
            var max = 0;
            result.sort(function (a, b) {
                if (a.sessions > max) {
                    max = a.sessions;
                }
                if (b.sessions > max) {
                    max = b.sessions;
                }
                return a.sessions === b.sessions ? 0 : (a.sessions > b.sessions ? -1 : 1);
            });
            for (var i = 0; i < result.length; i++) {
                result[i].order = i;
                result[i].sessions_p = Math.round(100 / max * result[i].sessions);
            }
            deferred.resolve({result: result, meta: meta});
        };
    }

    AdyenApp.service("myDataService", function ($http, $q) {
        return {
            promises: {}, getItems: function (origin) {
                if (!this.promises[origin]) {
                    var deferred = $q.defer(), pPerMethod = $q.defer(), pATV = $q.defer(), pRegions = $q.defer(), config;
                    if (origin.match(/^paymentmethodconversion/i)) {
                        $http.get(adyen.config.conversionPerPaymentMethodService).then(responseFilter(pPerMethod, ["authorised", "completed", "abandonned"]), function (err) {
                            pPerMethod.reject(err);
                        });
                    } else {
                        if (origin.match(/^acquirerconversion/i)) {
                            config = {volumeMatcher: "toolText,(\\d+) transactions"};
                            $http.get(adyen.config.acquirerConversionService).then(responseFilter(pPerMethod, ["authorised", "refused"], config), function (err) {
                                pPerMethod.reject(err);
                            });
                        } else {
                            pPerMethod.resolve({result: [], meta: {}});
                        }
                    }
                    if (origin.match(/^paymentmethodconversion/i) && origin.match(/atv/i)) {
                        $http.get(adyen.config.atvPerPaymentMethodService).then(responseFilter(pATV), function (err) {
                            pATV.reject(err);
                        });
                    } else {
                        pATV.resolve({result: [], meta: {}});
                    }
                    if (origin.match(/^paymentmethodconversion/i) && origin.match(/regions/i)) {
                        $http.get(adyen.config.sessionsEightRegions).then(regionResponseFilter(pRegions), function (err) {
                            pRegions.reject(err);
                        });
                    } else {
                        pRegions.resolve({result: [], meta: {}});
                    }
                    var meta = {};
                    $q.all([pPerMethod.promise, pATV.promise, pRegions.promise]).then(function (combined) {
                        var methods = combined[0].result, atv = combined[1].result, data = {}, c, regions = combined[2].result;
                        if (meta.currency && meta.currency !== "%") {
                            meta.currency = decodeURIComponent(combined[0].meta.currency || combined[1].meta.currency || "EUR");
                        }
                        for (c = atv.length; c-- > 0;) {
                            data[atv[c].name] = atv[c].value0;
                        }
                        for (c = methods.length; c-- > 0;) {
                            methods[c].avg = data[methods[c].name] || 0;
                        }
                        deferred.resolve({methods: methods, meta: meta, regions: regions});
                    }, function (x) {
                        deferred.reject(x);
                    });
                    this.promises[origin] = deferred.promise;
                }
                return this.promises[origin];
            }
        };
    });
    AdyenApp.service("bookmarkService", function ($http, $q) {
        return {
            getItems: function (forceUpdate) {
                var deferred = $q.defer();
                require(["service/Bookmark"], function (bookmarkService) {
                    bookmarkService.getBookmarks(forceUpdate).then(function (d) {
                        deferred.resolve(d);
                    }, function (e) {
                        deferred.reject(e);
                    });
                });
                return deferred.promise;
            }
        };
    });
    AdyenApp.service("RiskRatesService", function ($http, $q) {
        return {
            getAuthorisationRates: function (forceUpdate) {
                if (typeof forceUpdate === "boolean" && forceUpdate) {
                    delete this._getAuthorisationRatesPromise;
                }
                var $service = this;
                this._getAuthorisationRatesPromise = this._getAuthorisationRatesPromise || (function () {
                        var deferred = $q.defer();
                        $service.getRiskRates("days", forceUpdate).then(function (rates) {
                            deferred.resolve(rates.authorisations || {items: [], meta: {min: 0, max: 0}});
                        }, function (e, f, g) {
                            deferred.reject(e, f, g);
                        });
                        return deferred.promise;
                    }());
                return this._getAuthorisationRatesPromise;
            }, getChargebackRates: function (forceUpdate) {
                if (typeof forceUpdate === "boolean" && forceUpdate) {
                    delete this._getChargebackRatesPromise;
                }
                var $service = this;
                this._getChargebackRatesPromise = this._getChargebackRatesPromise || (function () {
                        var deferred = $q.defer();
                        $service.getRiskRates("weeks", forceUpdate).then(function (rates) {
                            deferred.resolve(rates.chargeback || {items: [], meta: {min: 0, max: 0}});
                        }, function (e, f, g) {
                            deferred.reject(e, f, g);
                        });
                        return deferred.promise;
                    }());
                return this._getChargebackRatesPromise;
            }, _getRiskRatesPromise: {}, getRiskRates: function (period, forceUpdate) {
                period = period || "days";
                if (typeof forceUpdate === "boolean" && forceUpdate) {
                    delete this._getRiskRatesPromise[period];
                }
                var $service = this;
                this._getRiskRatesPromise[period] = this._getRiskRatesPromise[period] || (function () {
                        var deferred = $q.defer();
                        jQuery.get(adyen.config.transactionBreakdownPerTimeIntervalUrl[period]).then(function (xml) {
                            var result = {}, categories = [], $xml = jQuery(xml);
                            $xml.find("categories category").each(function (index, node) {
                                categories.push(jQuery(node).attr("label"));
                            });
                            $xml.find("dataset").each(function (index, node) {
                                var $dataset = jQuery(node), setName = $dataset.attr("seriesName").replace(" Rate", "").toLowerCase(), min = null, max = null, set = result[setName] = {
                                    items: [],
                                    min: 0,
                                    max: 0
                                };
                                $dataset.find("set").each(function (index, node) {
                                    var value = parseFloat(jQuery(node).attr("value")), item;
                                    if (value < set.min || set.min === null) {
                                        set.min = value;
                                    }
                                    if (value > set.max || set.max === null) {
                                        set.max = value;
                                    }
                                    set.items.push(item = {
                                        name: categories[index],
                                        value: value,
                                        totalIndex: index,
                                        index: index
                                    });
                                });
                                set.chartMax = (set.min === set.max) ? set.min + 0.15 : set.max;
                            });
                            deferred.resolve(result);
                        }, function (e, f, g) {
                            deferred.reject(e, f, g);
                        });
                        return deferred.promise;
                    }());
                return this._getRiskRatesPromise[period];
            }
        };
    });
    function volumeSteps(volArray, maxVolume, steps) {
        var unit = "", multiplier = "", volume = maxVolume, step = Math.floor(volume / steps), upVolumeRatio = steps;
        if (volume > 1000000 * upVolumeRatio) {
            unit = "m";
            multiplier = "x 1.000.000";
            volume = volume / 1000000;
        } else {
            if (volume > 1000 * upVolumeRatio) {
                unit = "k";
                volume = volume / 1000;
                multiplier = "x 1.000";
            }
        }
        volArray[0].unit = unit;
        volArray[0].multiplier = multiplier;
        step = Math.round(volume / 5);
        if (step > 100) {
            step = 100 * Math.round(step / 100);
        } else {
            if (step > 10) {
                step = 10 * Math.round(step / 10);
            }
        }
        for (var i = 1; i <= steps; i++) {
            var value = step * i, left = Math.round(100 / volume * value);
            volArray[i] = {left: left, value: (left > 95) ? "" : value};
        }
    }

    AdyenApp.controller("ChartEngine", ["$scope", "myDataService", function ($scope, $service) {
        var that = this;
        $scope.currency = "";
        $scope.loaded = false;
        $scope.items = [];
        $scope.defaultOrder = "-volume";
        $scope.order = $scope.order || $scope.defaultOrder;
        $scope.csr = csr;
        $scope.init = function (origin) {
            $service.getItems(origin).then(function (r) {
                var items = r.methods;
                if (items.length > 10) {
                    items.sort(function (a, b) {
                        if (a.volume === b.volume) {
                            return 0;
                        }
                        return a.volume > b.volume ? -1 : 1;
                    });
                    items = items.slice(0, 10);
                }
                $scope.items = items;
                $scope.currency = (r.meta || {}).currency;
                $scope.regions = r.regions;
                $scope.$$phase || $scope.$apply();
                $scope.order = $scope.order || $scope.defaultOrder;
                $scope.loaded = true;
                $scope.__reOrder($scope.order);
            }, function () {
                $scope.loaded = true;
            });
        };
        this.update = function () {
        };
        $scope.granularity = "day";
        $scope.region = "world";
        this.vol = [{left: 0, value: 0, unit: "", multiplier: ""}];
        var cachedMax = 0;
        this.maxVolume = function () {
            var maxVolume = ($scope.items[0] || {}).volume || 0, c = $scope.items.length;
            for (; c-- > 0;
            ) {
                if ($scope.items[c].volume > maxVolume) {
                    maxVolume = $scope.items[c].volume;
                }
            }
            if (cachedMax !== maxVolume) {
                volumeSteps(this.vol, maxVolume, 5);
                cachedMax = maxVolume;
            }
            return maxVolume;
        };
        $scope.__reOrder = function (newOrder) {
            var column = $scope.order || $scope.defaultOrder;
            var high = 1, low = -1;
            if (column.substring(0, 1) == "-") {
                column = column.substring(1);
                high = -high;
                low = -low;
            }
            var position = [], c;
            for (c = $scope.items.length;
                 c-- > 0;) {
                position.push({item: c, value: $scope.items[c][column]});
            }
            position.sort(function (a, b) {
                if (a.value === b.value) {
                    return 0;
                }
                return a.value > b.value ? high : low;
            });
            for (c = position.length; c-- > 0;) {
                var item = $scope.items[position[c].item];
                $scope.items[position[c].item].order = c;
                if (column.indexOf("abandoned") > -1) {
                    item.authorised_l = item.abandoned_p;
                    item.completed_l = item.abandoned_p + item.authorised_p;
                    item.abandoned_l = 0;
                } else {
                    if (column.indexOf("completed") > -1) {
                        item.authorised_l = item.completed_p;
                        item.abandoned_l = item.completed_p + item.authorised_p;
                        item.completed_l = 0;
                    } else {
                        item.authorised_l = 0;
                        item.completed_l = item.authorised_p;
                        item.abandoned_l = item.authorised_p + item.completed_p;
                    }
                }
            }
        };
        $scope.$watch("order", $scope.__reOrder);
    }]);
    AdyenApp.controller("Configuration", ["$scope", function ($scope) {
        for (var i in adyen) {
            if (adyen.hasOwnProperty(i)) {
                this[i] = adyen[i];
            }
        }
    }]);
    AdyenApp.controller("BookmarkController", ["$scope", "bookmarkService", function ($scope, $service) {
        $scope.bookmarks = [];
        $scope.home = {};
        $scope.current = false;
        $scope.bookmarksByColumn = function (columns, column) {
            var step = Math.ceil($scope.bookmarks.length / columns);
            return $scope.bookmarks.slice(column * step, (column + 1) * step);
        };
        var refreshMe = function (force) {
            $service.getItems(force).then(function (r) {
                $scope.bookmarks = r.bookmarks;
                $scope.home = r.home;
                $scope.current = r.current || false;
            });
        };
        $scope.addCurrent = function (ev) {
            if (ev && ev.preventDefault) {
                ev.preventDefault();
            }
            jQuery.get($scope.current.addUrl).then(function () {
                refreshMe(true);
            });
            $scope.current = false;
            return false;
        };
        refreshMe();
    }]);
    AdyenApp.controller("AuthorisationsPerDayController", ["$scope", function ($scope) {
        $scope.TPD = 0;
        $scope.history = [];
        $scope.min = 0;
        $scope.max = 0;
        $scope.date = dateDiff({days: -1});
        require(["service/AuthorisationsPerDay"], function (service) {
            service.getItems().then(function (r) {
                $scope.history = r.history;
                $scope.TPD = r.TPD;
                $scope.min = 0;
                $scope.max = r.max;
                $scope.chartMax = (r.min === r.max) ? r.min + 0.15 : r.max;
                $scope.vol = [{unit: "", value: "", multiplier: ""}];
                $scope.divMin = -1;
                $scope.divMax = 1;
                $scope.divScale = 1;
                for (var i = 0, diff = 0; i < 7; i++) {
                    r.history[i] = r.history[i] || {};
                    r.history[i + 7] = r.history[i + 7] || {};
                    diff = r.history[i].diff = r.history[i + 7].value - r.history[i].value;
                    if (diff < $scope.divMin) {
                        r.history[i].divLeft = diff;
                        r.history[i].divRight = 0;
                        $scope.divMin = diff;
                    } else {
                        if (diff > $scope.divMax) {
                            r.history[i].divLeft = 0;
                            r.history[i].divRight = diff;
                            $scope.divMax = diff;
                        } else {
                            r.history[i].divLeft = -1;
                            r.history[i].divRight = 1;
                        }
                    }
                }
                $scope.divScale = $scope.divMax - $scope.divMin;
                volumeSteps($scope.vol, r.max, 5);
            });
        });
    }]);
    function bucketeer(items, bucketcount, rangeMin, rangeMax) {
        if (items.length > bucketcount - 2) {
            throw new Error("Bucketcount too low for provided data");
        }
        var result = {}, buckets = [], i, item, bucket, range = (rangeMin >= rangeMax) ? ((rangeMax + 1) - rangeMin) : (rangeMax - rangeMin);
        items.sort(function (a, b) {
            return a.value === b.value ? 0 : (a.value > b.value ? -1 : 1);
        });
        for (i = items.length; i-- > 0;) {
            item = items[i];
            bucket = Math.floor(bucketcount / range * (item.value - rangeMin));
            item.bucket = bucket;
            while (typeof buckets[bucket] !== "undefined") {
                bucket++;
            }
            item.bucket = bucket;
            buckets[bucket] = item.name;
        }
        if (buckets.length > bucketcount) {
            var decrease = buckets.length - bucketcount, position = bucketcount;
            while (decrease > 0 && position >= 0) {
                if (typeof buckets[position] === "undefined") {
                    buckets.splice(position, 1);
                    decrease--;
                } else {
                    position--;
                }
            }
        }
        for (i in buckets) {
            if (buckets.hasOwnProperty(i)) {
                result[buckets[i]] = i;
            }
        }
        return result;
    }

    AdyenApp.controller("AuthorisationRatesController", ["$scope", "RiskRatesService", function ($scope, $service) {
        $scope.items = [];
        $scope.min = 0;
        $scope.max = 0;
        $scope.chartMax = 0;
        $service.getAuthorisationRates().then(function (r) {
            $scope.items = r.items;
            $scope.min = 0;
            $scope.max = r.max;
            $scope.chartMax = (r.min === r.max) ? r.min + 0.15 : r.max;
        });
    }]);
    var ratesProcessor = function ($scope) {
        return function (r) {
            $scope.chargeback = r.chargeback.items;
            $scope.refusedbybank = r.refusedbybank.items;
            $scope.refusedbyrisk = r.refusedbyrisk.items;
            $scope.min = 0;
            $scope.max = Math.max(r.chargeback.max, r.refusedbybank.max, r.refusedbyrisk.max);
            $scope.chartMax = ($scope.min === $scope.max) ? $scope.min + 0.15 : $scope.max;
            var iterate = ["chargeback", "refusedbybank", "refusedbyrisk"], item, len, sections = [];
            while (iterate.length > 0) {
                item = iterate.shift();
                if (!$scope[item] || $scope[item].length < 1) {
                    $scope.recent[item] = {value: "n/a", delta: "n/a", section: 0};
                } else {
                    if ($scope[item].length === 1) {
                        $scope.recent[item] = {value: $scope[item][0].value, delta: "n/a", section: 0};
                    } else {
                        len = $scope[item].length;
                        $scope.recent[item] = {
                            value: $scope[item][len - 1].value,
                            delta: $scope[item][len - 1].value - $scope[item][len - 2].value
                        };
                    }
                }
                sections.push({
                    item: item,
                    name: item,
                    value: $scope.recent[item].value,
                    section: Math.floor(10 / $scope.chartMax * $scope.recent[item].value)
                });
            }
            var buckets = 8, bucketHeight = Math.round(100 / buckets), bucketed = bucketeer(sections, buckets, 0, $scope.chartMax);
            for (var i in bucketed) {
                if (bucketed.hasOwnProperty(i)) {
                    $scope.recent[i].section = bucketed[i] * bucketHeight;
                }
            }
        };
    };
    AdyenApp.controller("ChargebackRatesController", ["$scope", "RiskRatesService", function ($scope, $service) {
        $scope.recent = {};
        $scope.chargeback = [];
        $scope.refusedbybank = [];
        $scope.refusedbyrisk = [];
        $scope.min = 0;
        $scope.max = 0;
        $scope.chartMax = 0;
        $service.getRiskRates("weeks").then(ratesProcessor($scope));
    }]);
    AdyenApp.controller("RefusalRatesController", ["$scope", "RiskRatesService", function ($scope, $service) {
        $scope.recent = {};
        $scope.chargeback = [];
        $scope.refusedbybank = [];
        $scope.refusedbyrisk = [];
        $scope.min = 0;
        $scope.max = 0;
        $scope.chartMax = 0;
        $service.getRiskRates("days").then(ratesProcessor($scope));
    }]);
    if (adyen && adyen.privileged) {
        if (adyen.privileged.controllers) {
            var ctrl = adyen.privileged.controllers, cName;
            for (cName in ctrl) {
                if (ctrl.hasOwnProperty(cName)) {
                    AdyenApp.controller(cName, ["$scope", ctrl[cName]]);
                }
            }
        }
        if (adyen.privileged.filters) {
            var filter = adyen.privileged.filters, fName;
            for (fName in filter) {
                if (filter.hasOwnProperty(fName)) {
                    AdyenApp.filter(fName, filter[fName]);
                }
            }
        }
    }
    AdyenApp.controller("PayoutTimeline", ["$scope", "$q", function ($scope, $q) {
        $scope.today = new Date();
        var service = {
            getItems: function () {
                var d = this.defer = this.defer || new $q.defer();
                var items = [], count = 10, item;
                while (count-- > 0) {
                    item = {
                        authorize: Math.round(1 + 20 * Math.random()),
                        amount: Math.round(1 + 300 * Math.random()),
                        num: Math.round(1 + 15 * Math.random())
                    };
                    item.capture = item.authorize + Math.round(1 + (28 - item.authorize) * Math.random());
                    item.payout = item.capture + 1;
                    item.payout += (5 - (item.payout % 5));
                    if (item.payout > 28) {
                        delete item.payout;
                    } else {
                        item.payout = "2014-02-" + (item.payout < 10 ? "0" : "") + item.payout;
                    }
                    if (item.captured > 28) {
                        delete item.captured;
                    } else {
                        item.capture = "2014-02-" + (item.capture < 10 ? "0" : "") + item.capture;
                    }
                    item.authorize = "2014-02-" + (item.authorize < 10 ? "0" : "") + item.authorize;
                    items.push(item);
                }
                items.sort(function (a, b) {
                    if (a.authorize !== b.authorize) {
                        return a.authorize > b.authorize ? 1 : -1;
                    }
                    if (a.capture !== b.capture) {
                        return a.capture > b.capture ? 1 : -1;
                    }
                    if (a.payout !== b.payout) {
                        return a.payout > b.payout ? 1 : -1;
                    }
                    return 0;
                });
                d.resolve({items: items});
                return d.promise;
            }
        };
        $scope.items = [];
        $scope.auths = {};
        $scope.total = 0;
        $scope.index = {};
        $scope.dates = [];
        $scope.payoutCache = {};
        $scope.hasPayout = function (name) {
            if (typeof $scope.payoutCache.payDate === "undefined") {
                $scope.payoutCache.payDate = {};
                for (var c = $scope.items.length; c-- > 0;) {
                    if ($scope.items[c].payout) {
                        $scope.payoutCache.payDate[$scope.items[c].payout] = true;
                    }
                }
            }
            return $scope.payoutCache.payDate[name] || false;
        };
        $scope.hasPayout.cache = {};
        $scope.hasXAxisGap = function (index) {
            if (index === 0) {
                return false;
            }
            var from = $scope.dates[index - 1].split("-"), to = $scope.dates[index].split("-"), fromDate = new Date(from[0], parseInt(from[1], 10) - 1, from[2], 0, 0, 0), toDate = new Date(to[0], parseInt(to[1], 10) - 1, to[2], 0, 0, 0), diff = toDate.getTime() - fromDate.getTime();
            return diff > (1000 * 60 * 60 * 24);
        };
        $scope.getItemClass = function (item, cssAuthorized, cssAuthorizedAndCaptured, cssCapturedNotPaid, cssPaid) {
            if (item.isPaid) {
                return cssPaid;
            } else {
                if (item.isCaptured && !item.isAuthorized) {
                    return cssCapturedNotPaid;
                } else {
                    if (item.isCaptured) {
                        return cssAuthorizedAndCaptured;
                    }
                }
            }
            return cssAuthorized;
        };
        service.getItems().then(function (data) {
            $scope.payoutCache = {};
            try {
                var dates = [], i = 0, dateExists = {}, minDate = false, maxDate = false, addDate = function (d) {
                    if (!minDate || d < minDate) {
                        minDate = d;
                    }
                    if (!maxDate || d > maxDate) {
                        maxDate = d;
                    }
                    if (typeof dateExists[d] === "undefined") {
                        dates.push(d);
                        dateExists[d] = true;
                    }
                }, maxAmount = 0, maxNum = 0;
                i = 0;
                while (data.items.length > 0) {
                    var item = data.items.shift();
                    item.order = i++;
                    addDate(item.authorize);
                    if (item.payout) {
                        addDate(item.payout);
                    }
                    if (item.capture) {
                        addDate(item.capture);
                    }
                    if (item.amount > maxAmount) {
                        maxAmount = item.amount;
                    }
                    if (item.num > maxNum) {
                        maxNum = item.num;
                    }
                    $scope.items.push(item);
                }
                $scope.maxNum = maxNum;
                $scope.maxAmount = maxAmount;
                $scope.maxSum = 0;
                $scope.total = dates.length;
                dates.sort();
                $scope.dates = [];
                var sums = $scope.sums = {};
                i = 0;
                while (dates.length > 0) {
                    var date = dates.shift();
                    $scope.dates.push(date);
                    $scope.index[date] = i++;
                }
                for (i = $scope.items.length; i-- > 0;) {
                    $scope.items[i].stages = [];
                    var from = $scope.items[i].from = $scope.index[$scope.items[i].authorize];
                    if (typeof $scope.auths[from] === "undefined") {
                        $scope.auths[from] = {total: $scope.items[i].amount, position: from};
                    } else {
                        $scope.auths[from].total += $scope.items[i].amount;
                    }
                    $scope.items[i].stages[0] = {
                        from: $scope.index[$scope.items[i].authorize],
                        to: $scope.total - 1,
                        type: "authorized",
                        isAuthorized: true,
                        label: "Authorized on " + $scope.items[i].authorize
                    };
                    if ($scope.items[i].capture) {
                        $scope.items[i].stages[0].to = $scope.index[$scope.items[i].capture];
                        $scope.items[i].stages[0].isCaptured = true;
                        $scope.items[i].stages[0].label += " - Captured on " + $scope.items[i].capture;
                        $scope.items[i].stages[1] = {
                            from: $scope.index[$scope.items[i].capture],
                            to: $scope.total - 1,
                            type: "capture",
                            label: "Captured on " + $scope.items[i].capture,
                            isCaptured: true
                        };
                    }
                    if ($scope.items[i].payout) {
                        $scope.items[i].stages[1].to = $scope.index[$scope.items[i].payout];
                        $scope.items[i].stages[1].isPaid = true;
                        $scope.items[i].stages[1].label += " - Payed out on " + $scope.items[i].payout;
                    }
                    var dt = $scope.items[i].to = $scope.items[i].stages[$scope.items[i].stages.length - 1].to;
                    if (typeof sums[dt] === "undefined") {
                        sums[dt] = {
                            count: 1,
                            total: $scope.items[i].amount,
                            position: dt,
                            order: $scope.items[i].order
                        };
                    } else {
                        sums[dt].count++;
                        sums[dt].total += $scope.items[i].amount;
                        sums[dt].order = Math.max(sums[dt].order, $scope.items[i].order);
                    }
                    if (sums[dt].total > $scope.maxSum) {
                        $scope.maxSum = sums[dt].total;
                    }
                }
            } catch (e) {
                if (window.console && window.console.warn) {
                    window.console.warn("PayoutTimeline error: " + e.message, e);
                }
                $scope.error = e;
            }
        });
    }]);
    AdyenApp.controller("Library", ["$scope", function ($scope) {
        $scope.apps = adyen.apps || [];
        this.app = adyen.apps[0].path;
        $scope.app = this.app;
    }]);
    AdyenApp.directive("adyAppjs", function () {
        return {
            restrict: "A", transclude: true, link: function (scope, element, attrs) {
                var script = document.createElement("script");
                script.type = "text/javascript";
                script.src = adyen.jsbase + "/ng/apps/" + attrs.adyAppjs;
                document.getElementsByTagName("head")[0].appendChild(script);
                return true;
            }
        };
    });
    AdyenApp.directive("ngScripts", function () {
        return {
            restrict: "A", transclude: true, link: function (scope, element, attrs) {
                var items = attrs.ngScripts.split(/\s*,\s*/ig), item, script;
                while (items.length > 0) {
                    item = items.shift();
                    if (item && item.length > 0) {
                        script = document.createElement("script");
                        script.type = "text/javascript";
                        script.src = adyen.jsbase + "/" + item;
                        document.getElementsByTagName("head")[0].appendChild(script);
                    }
                }
                return true;
            }
        };
    });
    var generatedIds = 0;

    function newId() {
        return "aa-gen-" + generatedIds++;
    }

    AdyenApp.directive("ngWatch", ["$timeout", function (timer) {
        return {
            restrict: "A", transclude: true, link: function (scope, element, attrs) {
                element.id = element.id || newId();
                var watchConfig = attrs.ngWatch.split(/\s*,\s*/, 2), trigger = function (value) {
                    jQuery(document).ready(function () {
                        timer(function () {
                            var ev = new jQuery.Event(watchConfig[1]);
                            ev.target = element;
                            ev.value = value;
                            jQuery(document.body).trigger(ev);
                        }, 0);
                    });
                };
                scope.$watch(watchConfig[0], trigger);
                return true;
            }
        };
    }]);
    AdyenApp.factory("jquery.sparkline", ["$q", function ($q) {
        if (define.amd) {
            var prom = new jQuery.Deferred();
            require(["jquery.sparkline"], function () {
                prom.resolve();
            });
            return prom;
        }
        return loadLibrary({name: "sparkline", path: adyen.jsbase + "/jquery.sparkline-2.1.2.js"});
    }]);
    function sparkLineByValues(sparkLine, element, values) {
        var palette = jQuery(element).data("palette");
        var config = jQuery(element).data("spark-line") || {};
        jQuery(element).html('<div class="x-sparkline"></div>').find(".x-sparkline").css({
            display: "inline-block",
            height: config.height || 20,
            width: config.width || 40
        });
        sparkLine.then(function () {
            var cfg = {
                width: config.width || 40,
                height: config.height || 20,
                minSpotColor: false,
                maxSpotColor: false,
                spotColor: false,
                fillColor: false,
                tooltipPrefix: config.tooltipPrefix || "",
                tooltipSuffix: config.tooltipSuffix || "",
                lineColor: config.lineColor || csr.paletteColor(config.lineColorClass) || csr.palette.authorised
            };
            if (typeof config.rangeMin === "number") {
                cfg.chartRangeMin = config.rangeMin;
            }
            if (typeof config.rangeMax === "number") {
                cfg.chartRangeMax = config.rangeMax;
            }
            jQuery(element).find(".x-sparkline").sparkline((values || "0,0").split(","), cfg);
        });
    }

    AdyenApp.directive("adySparkLine", ["jquery.sparkline", function (sparkLine) {
        return {
            restrict: "A",
            template: '<div style="position:relative;float:left;" class="ady-sparkline"></div>',
            link: function (scope, element, attrs) {
                element.id = element.id || newId();
                if (typeof attrs.values !== "undefined") {
                    sparkLineByValues(sparkLine, element, attrs.values);
                    scope.$watch(function () {
                        return jQuery(element).attr("data-values");
                    }, function (newValue, oldValue) {
                        if (oldValue !== newValue) {
                            sparkLineByValues(sparkLine, element, newValue);
                        }
                    });
                } else {
                    if (attrs.items) {
                        var palette = jQuery(element).data("palette"), charts = attrs.items.split(/\s*,\s*/ig), fnUpdateChart = function (data) {
                            palette = JSON.parse(jQuery(element).attr("data-palette") || "{}");
                            sparkLine.then(function () {
                                var composite = false, values = [], data = {}, chartNames = attrs.items.split(/\s*,\s*/ig), chartName, chartConfig;
                                while (chartNames.length > 0) {
                                    chartName = chartNames.shift();
                                    data = scope[chartName];
                                    palette[chartName] = palette[chartName] || palette["default"] || {};
                                    if (palette[chartName].extendDefault) {
                                        for (var i in palette["default"]) {
                                            if (palette["default"].hasOwnProperty(i)) {
                                                palette[chartName][i] = palette[chartName][i] || palette["default"][i];
                                            }
                                        }
                                    }
                                    chartConfig = {};
                                    if (attrs[chartName + "SparkLine"]) {
                                        chartConfig = element.data(chartName + "-spark-line");
                                    }
                                    values = [];
                                    if (typeof data === "undefined") {
                                        if (window.console && window.console.warn) {
                                            window.console.warn("Chart with name '" + chartName + "' is not available in scope: ", scope);
                                        }
                                    } else {
                                        if (data.values && (data.values.constructor === Array) && typeof data.values.slice === "function") {
                                            values = data.values.slice(0);
                                        } else {
                                            for (var j = 0, len = data.length; j < len; j++) {
                                                values.push(data[j].value);
                                            }
                                        }
                                    }
                                    if (values.length === 0) {
                                        jQuery(element).html("No data to display");
                                    } else {
                                        var cfg = {
                                            __data: data,
                                            lineColor: csr.paletteColor(palette[chartName].lineColor),
                                            fillColor: csr.paletteColor(palette[chartName].fillColor) || false,
                                            spotColor: csr.paletteColor(palette[chartName].lineColor),
                                            minSpotColor: false,
                                            maxSpotColor: false,
                                            height: attrs.height || "100",
                                            width: attrs.width || "100%",
                                            valueSpots: {},
                                            composite: composite,
                                            tooltipContainer: element,
                                            tooltipPrefix: chartConfig.toolTipPrefix || (palette[chartName].tooltipPrefix || chartName) + " ",
                                            tooltipSuffix: chartConfig.toolTipSuffix || palette[chartName].tooltipSuffix || "%",
                                            chartRangeMax: chartConfig.chartMax || palette[chartName].chartMax || palette.chartMax || scope.chartMax || 1,
                                            chartRangeMin: chartConfig.chartMin || palette[chartName].chartMin || palette.chartMax || scope.chartMin || 0
                                        };
                                        if (typeof cfg.chartRangeMax === "string") {
                                            cfg.chartRangeMax = parseInt(cfg.chartRangeMax, 10);
                                        }
                                        if (typeof cfg.chartRangeMin === "string") {
                                            cfg.chartRangeMin = parseInt(cfg.chartRangeMin, 10);
                                        }
                                        if (attrs.tooltips === "auto") {
                                            cfg.tooltipFormatter = function (chart, node, item) {
                                                var x = item.x, label = "", items = cfg.__data.items || {};
                                                for (var i in items) {
                                                    if (items.hasOwnProperty(i)) {
                                                        if (x-- === 0) {
                                                            label = i;
                                                        }
                                                    }
                                                }
                                                return (label || chartName) + ": " + item.y + "%";
                                            };
                                        }
                                        if (attrs.warning) {
                                            cfg.valueSpots[attrs.warning] = csr.paletteColor("orange");
                                        }
                                        if (attrs.error) {
                                            cfg.valueSpots[attrs.error] = csr.paletteColor("red");
                                        }
                                        if (attrs.chartMax) {
                                            cfg.chartMax = parseFloat(attrs.chartMax, 10);
                                        }
                                        if (attrs.chartMin) {
                                            cfg.chartMin = parseFloat(attrs.chartMin, 10);
                                        }
                                        jQuery(element).sparkline(values, cfg);
                                        composite = true;
                                    }
                                }
                            });
                        }, fnTriggerUpdate = function () {
                            clearTimeout(element.adySparkLine);
                            element.adySparkLine = setTimeout(function () {
                                fnUpdateChart();
                            }, 200);
                        };
                        for (var i = 0, c = charts.length; i < c; i++) {
                            palette[charts[i]] = palette[charts[i]] || {};
                            scope.$watch(charts[i], fnTriggerUpdate);
                        }
                        scope.$watch("lastSparkChartUpdate", fnTriggerUpdate);
                    }
                }
                return true;
            }
        };
    }]);
    AdyenApp.directive("adySparkAxisX", function () {
        var friendlyNum = function (num) {
            if (num > 1000000 && num % 1000000 === 0) {
                return (num / 1000000) + "M";
            }
            if (num > 1000 && num % 1000 === 0) {
                return (num / 1000) + "K";
            }
            return num;
        }, sparkRenderLabels = function (element, labelsString) {
            var labels = (labelsString || "").split(","), c = labels.length, points = c, mod = 1;
            if (c >= 2) {
                if (element.attr("data-points")) {
                    points = parseInt(element.attr("data-points"), 10);
                    mod = Math.round((c - 1) / (points - 1));
                }
                var start = 0, step = 100 / (c - 1), item, counter = 0;
                var html = ['<div style="position:relative;font-size: 10px">'];
                while (labels.length > 0) {
                    item = labels.shift();
                    if (((counter++ % mod) === 0 && labels.length > mod) || labels.length === 0) {
                        html.push('<div style="position:absolute; white-space:nowrap; border-left: solid 1px #eaeaea; padding-left: 2px; padding-top: 5px; top: -2px; left:' + start + '%">' + item + "</div>");
                    }
                    start += step;
                }
                html.push("</div>");
                element.html(html.join(""));
            } else {
                element.html("");
            }
        }, sparkRenderMinToMax = function (element, min, max, asDate, lineHeight) {
            asDate = asDate || false;
            if (typeof lineHeight !== "number") {
                lineHeight = 10;
            }
            if (typeof min !== "number") {
                min = parseInt(min, 10);
            }
            if (typeof max !== "number") {
                max = parseInt(max, 10);
            }
            var html = ['<div style="position:relative;font-size:10px">'], diff = max - min;
            var paddingTop = "padding-top:" + lineHeight + "px;top:-" + lineHeight + "px";
            html.push('<div style="position:absolute;left:0;border-left:solid 1px #ccc; padding-left: 2px;' + paddingTop + '">' + (asDate ? shortDate(min) : friendlyNum(min)) + "</div>");
            html.push('<div style="position:absolute;right:0;border-right:solid 1px #ccc; padding-right: 2px;' + paddingTop + '">' + (asDate ? shortDate(max) : friendlyNum(max)) + "</div>");
            for (var steps = 6; steps > 0; steps--) {
                if (Math.floor(diff / steps) === Math.ceil(diff / steps)) {
                    var step = Math.floor(diff / steps), pos = 1;
                    for (var x = min + step; x <= (max - step); x += step) {
                        pos = 100 / diff * (x - min);
                        html.push('<div style="position:absolute;left:' + pos + "%;border-left:solid 1px #ccc; padding-left: 2px;" + paddingTop + '">' + (asDate ? shortDate(x) : friendlyNum(x)) + "</div>");
                    }
                    break;
                }
            }
            html.push("</div>");
            element.html(html.join(""));
        };
        return {
            restrict: "A", template: '<div class="ady-spark-x-axis"></div>', link: function ($scope, element, attrs) {
                if (typeof attrs.labels !== "undefined") {
                    $scope.$watch(function () {
                        return element.attr("data-labels");
                    }, function (newValue) {
                        sparkRenderLabels(element, newValue);
                    });
                } else {
                    $scope.$watch(function () {
                        return element.attr("data-min") + ":" + element.attr("data-max");
                    }, function (newValue) {
                        newValue = newValue.split(":");
                        sparkRenderMinToMax(element, newValue[0], newValue[1], "true" === element.attr("data-asdate"), parseInt(element.attr("data-line-height") || "10", 10));
                    });
                }
            }
        };
    });
    AdyenApp.directive("adyUserPreferences", function () {
        return {
            restrict: "A", link: function (scope, element, attrs) {
                require(["util/UserPreferences", "compat/Array/filter"], function (uP) {
                    var keys = (attrs.adyUserPreferences || "").split(/\s*,\s*/).filter(function (x) {
                        return !!x;
                    }), bindKey = function (scope, key) {
                        var scopeKey = key.split(":").pop();
                        scope[scopeKey] = uP.getPreference(key, scope[scopeKey]);
                        scope.$watch(scopeKey, function () {
                            uP.setPreference(key, scope[scopeKey] || "");
                        });
                    };
                    while (keys.length > 0) {
                        bindKey(scope, keys.shift());
                    }
                    scope.$$phase || scope.$apply();
                });
                return true;
            }
        };
    });
    AdyenApp.directive("adyClock", function () {
        var updateText = function ($node, newValue, increase) {
            if (typeof newValue !== "number") {
                newValue = +newValue || 0;
            }
            var oldValue = $node.text().substring(0, 1);
            if (oldValue !== newValue) {
                if (!increase) {
                    setTimeout(function () {
                        $node.html("<div><div>" + oldValue + "</div><div>" + newValue + "</div>").find("div:first").css({
                            position: "absolute",
                            overflow: "visible"
                        }).animate({top: "-100%"}, 500, function (x) {
                            $node.html(newValue);
                        });
                    }, 500);
                } else {
                    setTimeout(function () {
                        $node.html("<div><div>" + newValue + "</div><div>" + oldValue + "</div>").find("div:first").css({
                            position: "absolute",
                            overflow: "visible",
                            top: "-100%"
                        }).animate({top: 0}, 500, function (x) {
                            $node.html(newValue);
                        });
                    }, 500);
                }
            }
        };
        return {
            restrict: "A", template: '<div class="ca-clock"></div>', link: function (scope, element, attrs) {
                var $element = jQuery(element), $clock = $element.find(".ca-clock"), digits = parseInt($element.attr("data-digits") || "8", 10);
                for (var i = 0; i < digits; i++) {
                    if (i > 0 && i % 3 === 0) {
                        $clock.prepend('<div class="ca-comma">,</div>');
                    }
                    $clock.prepend('<div class="ca-number"><div>0</div></div>');
                }
                scope.$watch(function () {
                    return $element.attr("data-value");
                }, function (newValue, oldValue) {
                    var sNewValue = "" + newValue, sOldValue = "" + oldValue, increase = newValue > oldValue;
                    while (sNewValue.length < digits) {
                        sNewValue = "0" + sNewValue;
                    }
                    while (sOldValue.length < digits) {
                        sOldValue = "0" + sOldValue;
                    }
                    var isLeadingZeros = true;
                    $element.find(".ca-number").each(function (index) {
                        var digit = index, num = sNewValue.substring(index, index + 1);
                        if (num !== "0" || !isLeadingZeros) {
                            isLeadingZeros = false;
                            updateText(jQuery(this), num, increase);
                            jQuery(this).css("visibility", "visible");
                            jQuery(this).next(".ca-comma").css("visibility", "visible");
                        } else {
                            jQuery(this).css("visibility", "hidden");
                            jQuery(this).next(".ca-comma").css("visibility", "hidden");
                        }
                    });
                });
                return true;
            }
        };
    });
    AdyenApp.directive("caClone", function () {
        return {
            restrict: "A", compile: function (element, attr) {
                var srcNode = jQuery(attr.caClone);
                if (srcNode.length === 0) {
                    throw new Error("Node not found " + attr.caClone);
                }
                element.html(srcNode.html());
                if (attr.removeSource === "yes") {
                    srcNode.remove();
                }
                return true;
            }
        };
    });
    function numberWithCommas(x, comma) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, comma || ",");
    }

    function largeNumberFilter(input) {
        var floored = Math.floor(input), fragment = ("" + input).split(".")[1];
        return numberWithCommas(floored, ".") + (fragment && fragment !== "0" ? "," + fragment : "");
    }

    function roundFilter(input, digits) {
        return roundToDecimals(input, digits || 0);
    }

    function percentageFilter(input, digits) {
        if (input === null) {
            return "";
        }
        if (input > 0) {
            return "+" + roundFilter(input, digits);
        }
        return roundFilter(input, digits);
    }

    function explicitPlusFilter(input, formatted) {
        if (formatted) {
            return input > 0 ? "+" + numberWithCommas(input) : numberWithCommas(input);
        }
        return input > 0 ? "+" + input : input;
    }

    function lpad(input, length, paddingChar) {
        input = "" + input;
        while (input.length < length) {
            input = paddingChar + input;
        }
        return input;
    }

    var days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"], months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    function shortDate(input) {
        if (input === null) {
            return "";
        }
        if (typeof input === "number") {
            input = new Date(input);
        } else {
            if (typeof input === "string" && input.match(/^\d+$/)) {
                input = new Date(parseInt(input, 10));
            }
        }
        var parts = [days[input.getDay()], input.getDate(), months[input.getMonth()]];
        return parts.join(" ");
    }

    function shortDateTime(input) {
        if (input === null) {
            return "";
        }
        if (typeof input === "number") {
            input = new Date(input);
        } else {
            if (typeof input === "string" && input.match(/^\d+$/)) {
                input = new Date(parseInt(input, 10));
            }
        }
        return shortDate(input) + " " + lpad(input.getHours(), 2, "0") + ":" + lpad(input.getMinutes(), 2, "0");
    }

    function constantToCamelFilter(input) {
        if (typeof input !== "string" || input.length < 2) {
            return input;
        }
        var result = [], parts = input.split("_"), part;
        while (parts.length > 0) {
            part = parts.shift();
            result.push(part.substring(0, 1) + part.substring(1).toLowerCase());
        }
        return result.join(" ");
    }

    function relativeTime(ts, filter) {
        filter = filter || "ms";
        var MS = 1, SECONDS = 1000 * MS, MINUTES = SECONDS * 60, HOURS = 60 * MINUTES, DAYS = 24 * HOURS;
        var now = new Date().getTime();
        if (ts === 0) {
            return "xxx";
        }
        var ms = now - ts;
        if (ms > DAYS || filter == "D") {
            return Math.round(ms / DAYS) + "d";
        }
        if (ms > HOURS || filter == "H") {
            return Math.round(ms / HOURS) + "h";
        }
        if (ms > MINUTES || filter == "M") {
            return Math.round(ms / MINUTES) + "m";
        }
        if (ms > SECONDS || filter == "S") {
            return Math.round(ms / SECONDS) + "s";
        }
        if (ms > MS || filter == "MS") {
            return Math.round(ms / MS) + "ms";
        }
        return ms;
    }

    AdyenApp.filter("round", function () {
        return roundFilter;
    });
    AdyenApp.filter("numberWithCommas", function () {
        return largeNumberFilter;
    });
    AdyenApp.filter("explicitPlus", function () {
        return explicitPlusFilter;
    });
    AdyenApp.filter("percentage", function () {
        return percentageFilter;
    });
    AdyenApp.filter("shortDate", function () {
        return shortDate;
    });
    AdyenApp.filter("shortDateTime", function () {
        return shortDateTime;
    });
    AdyenApp.filter("constantToCamel", function () {
        return constantToCamelFilter;
    });
    AdyenApp.filter("relativeTime", function () {
        return relativeTime;
    });
}());