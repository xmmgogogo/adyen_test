define("chart/widgetFramework/core/BasicMediator", ["jqueryExtended", "lodash", "chart/widgetFramework/core/constants/UIConstants", "chart/widgetFramework/core/constants/DataConstants", "util/Functional", "chartutil/domUtils"], function (a, j, h, f, d, g) {
    var c = false;
    var k = "color:darkblue;font-size:1em";
    var b = false;
    var e = "color:darkgreen;font-size:1em";
    var i = function (o, m) {
        var p = {};
        p.init = function () {
            j.bindAll(this, "onNotifiedFormatter", "onNotifiedViewCreator", "onNotifiedFetcher");
            this.actionCommanderExclusionArray = ["actioncommander", "dataformatter", "viewcreator", "timeline", "snapshot", "basicmediator"];
            this.chartInstances = [];
            this.fetcherInstances = [];
            this.formatterInstances = [];
            this.allInstances = [];
            this.$el = o.getNode();
            this.parameters = this.getParameters(o);
            this.id = this.$el.attr("id");
            this.eventOptions = this.parameters.events;
            this.hasSetupOwnEvents = false;
            if (typeof this.eventOptions === "string" && this.eventOptions.length > 0) {
                console.error("## BasicMediator - mediator's data-actions have not parsed correctly: check markup to make sure there isn't a problem with the JSON string");
            }
            this.$allFetchers = this.$el.find("[data-widget*=DataFetcher]");
            this.$allFormatters = this.$el.find("[data-widget*=DataFormatter]");
            this.$allCharts = this.$el.find("[data-widget*=ViewCreator]");
            this.totalDomElements = this.$allFetchers.length + this.$allFormatters.length + this.$allCharts.length;
            this.getAdditionalDOMElements();
            setTimeout(function () {
                if (!p.hasSetupOwnEvents && this.totalDomElements > 0) {
                    console.error("### BasicMediator: hasSetupOwnEvents has not run - check that all observables and widgets have called back");
                    console.error("### BasicMediator: hasSetupOwnEvents has not run - this.totalDomElements=", p.totalDomElements);
                    console.error("### BasicMediator: hasSetupOwnEvents has not run - this.allInstances.length=", p.allInstances.length);
                    j.each(p.allInstances, function (q) {
                        if (window.console && console.log) {
                            console.log("### BasicMediator::all instances:: pInst=", q);
                        }
                    });
                }
            }, 2000);
            this.acCount = 0;
            this.getObservables();
            this.getWidgets();
        };
        p.getAdditionalDOMElements = function () {
            this.actionCommanderInstances = [];
            this.$actionCommanders = o.__$node.find("[data-widget*=ActionCommander]");
            this.totalDomElements += this.$actionCommanders.length;
        };
        p.getObservables = function () {
            this.getObservableInstances(this.$allFetchers, "onNotifiedFetcher", this.fetcherInstances, "Fetchers");
            this.getObservableInstances(this.$allFormatters, "onNotifiedFormatter", this.formatterInstances, "Formatters");
            this.getObservableInstances(this.$allCharts, "onNotifiedViewCreator", this.chartInstances, "VizComps");
        };
        p.getWidgets = function () {
            if (this.$actionCommanders.length) {
                this.getWidgetInstances(this.$actionCommanders, this.actionCommanderInstances, "ActionCommander");
            }
        };
        p.getObservableInstances = function (r, t, s, q) {
            j.each(r, function (u) {
                if (window.console && console.log && c) {
                    console.log("\n### BasicMediator2::getObservableInstances:: getting ", u.id, " promise----");
                }
                a(u).widget().then(function (v) {
                    var x = v.instance;
                    if (window.console && console.log && c) {
                        console.log("%c\n################", k);
                        console.log("%c### INIT STAGE :: BasicMediator::" + p.id + '::WIDGET PROMISE RESOLVED: pFn="' + t, k);
                        console.log("%c### INIT STAGE :: BasicMediator::", p.id, "::WIDGET PROMISE RESOLVED: - widgetRef= ", v);
                        console.log("%c### INIT STAGE :: BasicMediator::", p.id, "::WIDGET PROMISE RESOLVED: - widgetRef.instance= ", x);
                        console.log("%c### INIT STAGE :: BasicMediator::", p.id, "::WIDGET PROMISE RESOLVED:  - widgetRef.instance.id= ", x.id);
                        console.log("%c################", k);
                    }
                    n(x, p, t);
                    l(s, x, p);
                    var w = p.checkInstancesReady(s, r, q);
                    if (w) {
                        p.setUpOwnEvents();
                    }
                });
            });
        };
        p.getWidgetInstances = function (r, s, q) {
            j.each(r, function (t) {
                a(t).widget().then(function (u) {
                    l(s, u.instance, p);
                    var v = p.checkInstancesReady(s, r, q);
                    if (v) {
                        p.setUpOwnEvents();
                    }
                });
            });
        };
        p.setUpOwnEvents = function () {
            var q = this.allInstances;
            if (q.length !== this.totalDomElements) {
                if (window.console && console.log && c) {
                    console.log("%c\n################", k);
                    console.log("%c### INIT STAGE :: BasicMediator::" + this.id + "::setUpOwnEvents:: NOT EVERYTHING INSTANTIATED YET", k);
                    console.log("%c################", k);
                }
                return false;
            }
            if (window.console && console.log && c) {
                console.log("%c\n################", k);
                console.log("%c### INIT STAGE :: BasicMediator::" + this.id + "::setUpOwnEvents:: EVERYTHING READY", k);
                console.log("%c################", k);
            }
            q.push(this);
            this.hasSetupOwnEvents = true;
            if (this.actionCommanderInstances.length > 0) {
                j.each(this.actionCommanderInstances, function (r) {
                    var t = p.filterAllInstances(p.actionCommanderExclusionArray);
                    var s = r.pushAllInstances(t);
                    s.done(function () {
                        p.mediatorReady();
                    });
                });
            } else {
                this.acCount = -1;
                this.mediatorReady();
            }
            return true;
        };
        p.mediatorReady = function () {
            this.acCount++;
            if (this.acCount !== this.actionCommanderInstances.length) {
                return;
            }
            if (window.console && console.log) {
                console.log("%c\n################", k);
                console.log("%c### INIT STAGE :: BasicMediator::" + this.id + "::WIDGET_APP_STARTUP!!!!!!!!!!!!!!", k);
                console.log("%c################", k);
            }
            this.$el.trigger(h.WIDGET_APP_STARTUP);
        };
        p.onNotifiedFetcher = function (r, q) {
            if (window.console && console.log && b) {
                console.log("%c\n################", e);
                console.log("%c### START STAGE :: BasicMediator::" + this.id + "::onNotifiedFetcher :: pId=" + q + " pData.type= " + r.changeObject.type, e);
                console.log("%c################", e);
            }
        };
        p.onNotifiedFormatter = function (r, q) {
            if (window.console && console.log && b) {
                console.log("%c\n################", e);
                console.log("%c### START STAGE :: BasicMediator::" + this.id + "::onNotifiedFormatter :: pId=" + q + " pData.type= " + r.changeObject.type, e);
                console.log("%c################", e);
            }
        };
        p.onNotifiedViewCreator = function (r, q) {
            if (window.console && console.log && b) {
                console.log("%c\n################", e);
                console.log("%c### START STAGE :: BasicMediator::" + this.id + "::onNotifiedViewCreator :: pId=" + q + " pData.type= " + r.changeObject.type, e);
                console.log("%c################", e);
            }
        };
        function n(r, q, s) {
            if (window.console && console.log && c) {
                console.log("\n### BasicMediator2::registerObserver:: pWidget=", r);
            }
            r.registerObserver(q[s], false, q.id, true);
        }

        function l(s, r, q) {
            s.push(r);
            q.allInstances.push(r);
        }

        p.checkInstancesReady = function (t, s, r) {
            var q = this.compareInstanceArrays(t, s);
            if (q) {
                if (window.console && console.log && c) {
                    console.log("%c\n################", k);
                    console.log("%c### INIT STAGE :: BasicMediator::" + this.id + ":: all " + r + " AreReady:: !!!!!!!!!!!!!!!!", k);
                    console.log("%c################", k);
                }
                return true;
            }
            if (window.console && console.log && c) {
                console.log("%c\n################", k);
                console.log("%c### INIT STAGE :: BasicMediator::" + this.id + ":: all " + r + " not yet ready:: :-(:-(:-(:-(:-(:-(:-(", k);
                console.log("%c################", k);
            }
            return false;
        };
        p.filterAllInstances = function (q) {
            var r = this.allInstances;
            j.each(q, function (s) {
                r = j.filter(r, function (u) {
                    var t = u.$el.data().widget.toLowerCase();
                    if (t.indexOf(s) === -1) {
                        return u;
                    }
                });
            });
            return r;
        };
        p.getInstanceByDomContainer = function (r) {
            var q = j.find(this.allInstances, function (s) {
                return s.$el[0] === r[0];
            });
            return q;
        };
        p.getInstanceById = function (r, t) {
            var u = t || this.allInstances;
            var s = r.replace(/#/, "");
            var q = j.find(u, function (v) {
                return v.id === s;
            });
            return q;
        };
        p.getParameters = function (q) {
            var t = q.getNode().data();
            var r = (j.keys(t).length) ? t : q.parameters;
            var s = {};
            if (j.keys(r).length) {
                s.events = r.events;
                s.dataFetcherEvents = r.datafetcherEvents;
            } else {
                throw"The parameters are not well defined" + r;
            }
            return s;
        };
        p.compareInstanceArrays = function (s, r) {
            var q = j.map(s, function (t) {
                return t.$el[0];
            });
            if (j.isEmpty(j.difference(q, r)) && j.isEmpty(j.difference(r, q))) {
                return true;
            }
            return false;
        };
        p.getInstance = function () {
            return this;
        };
        if (!m) {
            p.init();
            if (window.console && console.log && c) {
                console.log("\n### BasicMediator2::constructor:: calling pWidgetApi.ready()");
            }
            o.ready();
        }
        return p;
    };
    return i;
});