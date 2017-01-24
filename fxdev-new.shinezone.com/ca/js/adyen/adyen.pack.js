(function () {
    var a = window.csr = window.csr || {};
    a.adyen = a.adyen || {};
    a.adyen.palette = a.adyen.palette || {};
    if (typeof"".hashCode !== "function") {
        String.prototype.hashCode = function () {
            var e = 0, c, d, b;
            if (this.length == 0) {
                return e;
            }
            for (c = 0, b = this.length; c < b; c++) {
                d = this.charCodeAt(c);
                e = ((e << 5) - e) + d;
                e |= 0;
            }
            return e;
        };
    }
    a.setPalette = function (e) {
        a.palette = {};
        a.fpalette = {};
        var c = {}, b = Math.abs(e.hashCode());
        c.brand1 = "#3C8A2E";
        c["brand1-contrast"] = "#FFFFFF";
        c.brand2 = "#024D63";
        c["brand2-contrast"] = "#FFFFFF";
        c.green = "#3C8A2E";
        c.darkGrey = "#4D4D4F";
        c.lightGrey = "#EAEAEA";
        c["pastel-1"] = "#F1F6D8";
        c["pastel-2"] = "#F8FAEB";
        c.blue = "#024D63";
        c.orange = "#F1Bf43";
        c.red = "#94120F";
        c.taupe = "#F1EFE8";
        c.grey = "#CCCCCC";
        c.mediumGrey = "#e0e0e0";
        c.lightGrey = "#EAEAEA";
        c.white = "#FFFFFF";
        c.whiteSmoke = "#F5F5F5";
        c.warning = "#FCF1D5";
        c.authorised = "#A9D6A6";
        c.authorisedLight = "#D0E39E";
        c.completed = "#75BE9C";
        c.abandonned = "#CFD1D1";
        c.chargeback = "#94120F";
        c.chargebackMastercard = "#37638D";
        c.chargebackVisaInternational = "#152F47";
        c.chargebackVisaDomestic = "#04486C";
        c.refusedRisk = "#60A397";
        c.refusedBank = "#04486C";
        c.refused = "#378888";
        c.refusedOilsplash = "#EAEAEA";
        c.cancelledOilsplash = "#EAEAEA";
        c.settledOilsplash = "#3C8A2E";
        c.sentforsettleOilsplash = "#3C8A2E";
        c.chargebackOilsplash = "#94120F";
        c.range0 = "#CFD1D1";
        c.range1 = "#D0E39E";
        c.range2 = "#A9D6A6";
        c.range3 = "#75BE9C";
        c.range4 = "#60A397";
        c.range5 = "#378888";
        c.range6 = "#37638D";
        c.range7 = "#04486C";
        c.range8 = "#152F47";
        c.themeHash = b;
        if (b == 600745409) {
            c.brand1 = "#0192d3";
            c["brand1-contrast"] = "#FFFFFF";
            c.brand2 = "#024D63";
            c["brand2-contrast"] = "#FFFFFF";
            c.green = "#0192d3";
            c.darkGrey = "#4D4D4F";
            c.lightGrey = "#EAEAEA";
            c["pastel-1"] = "#d8eef6";
            c["pastel-2"] = "#ebf8fa";
            c.blue = "#024D63";
            c.orange = "#F1Bf43";
            c.red = "#94120F";
            c.taupe = "#F1EFE8";
            c.grey = "#CCCCCC";
            c.mediumGrey = "#e0e0e0";
            c.lightGrey = "#EAEAEA";
            c.white = "#FFFFFF";
            c.whiteSmoke = "#F5F5F5";
            c.range0 = "#CFD1D1";
            c.range1 = "#c6e5f9";
            c.range2 = "#a3d5f5";
            c.range3 = "#60b7ef";
            c.range4 = "#3193d2";
            c.range5 = "#2e7bab";
            c.range6 = "#00558b";
            c.range7 = "#00436d";
            c.range8 = "#003455";
            c.authorised = "#a3d5f5";
            c.authorisedLight = "#c6e5f9";
            c.completed = "#60b7ef";
            c.abandonned = "#CFD1D1";
            c.chargeback = "#94120F";
            c.chargebackMastercard = "#00558b";
            c.chargebackVisaInternational = "#003455";
            c.chargebackVisaDomestic = "#00436d";
            c.refusedRisk = "#3193d2";
            c.refusedBank = "#00436d";
            c.refused = "#2e7bab";
        }
        for (var d in c) {
            if (c.hasOwnProperty(d)) {
                a.palette[d] = c[d];
                a.fpalette[d] = c[d];
            }
        }
        a.palette.evenRow = "#f0f0f0";
        a.palette.oddRow = "#fefefe";
    };
    a.setPalette(((document.documentElement.className || "").match(/csr-t-(\w+)/) || [])[1] || "");
    a.paletteColor = function (c) {
        var f = c && c.split(",") || "", e = (f[0] && f[0].split(/\./).pop()) || f[0], d;
        d = (e && a.palette[e]) || f[0];
        if (f.length == 2) {
            var b = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(d);
            return b ? "rgba(" + parseInt(b[1], 16) + "," + parseInt(b[2], 16) + "," + parseInt(b[3], 16) + "," + f[1] + ")" : d;
        }
        return d;
    };
    a.paletteGroups = {
        brand1: "brand",
        "brand1-contrast": "brand",
        brand2: "brand",
        "brand2-contrast": "brand",
        range0: "range",
        range1: "range",
        range2: "range",
        range3: "range",
        range4: "range",
        range5: "range",
        range6: "range",
        range7: "range",
        range8: "range",
        range9: "range",
        green: "primary",
        darkGrey: "primary",
        lightGrey: "primary",
        "pastel-1": "secondary",
        "pastel-2": "secondary",
        blue: "secondary",
        red: "secondary",
        orange: "secondary",
        authorised: "charts",
        authorisedLight: "charts",
        completed: "charts",
        abandonned: "charts",
        refused: "charts",
        refusedRisk: "charts",
        refusedBank: "charts",
        chargeback: "charts",
        chargebackMastercard: "charts",
        chargebackVisaInternational: "charts",
        chargebackVisaDomestic: "charts"
    };
    a.layer = a.layer || {};
    a.layer.dialog = 700;
    a.layer.notification = 600;
    a.layer.sidebar = 500;
    a.layer.dropdown = 300;
    a.layer.tooltip = 200;
    a.layer.header = 400;
    a.layer.aside = 100;
    a.layer.minimal = 0;
    a.layer.maximal = 9999;
    if (window.define && window.define.amd) {
        define("csr/palette", [], function () {
            return a.palette;
        });
    }
}());
(function (a) {
    var d = {}, h, g = 12000, i = {}, k = {};

    function b(o, p, n) {
        var m = o[p];
        o[p] = function () {
            if (n.before) {
                n.before.apply(o, arguments);
            }
            var q = m.apply(o, arguments);
            if (n.filter) {
                q = n.filter(q);
            }
            if (n.after) {
                n.after.apply(o, arguments);
            }
            return q;
        };
    }

    function c(m) {
        var o = new a.Deferred();
        o.amdWaiting = false;
        o.amdName = m;
        o.amdDefined = false;
        var n = {
            before: function () {
                o.amdWaiting = true;
            }, after: function () {
                o.amdLoad();
            }
        };
        b(o, "done", n);
        b(o, "then", n);
        o.promise = function () {
            return this;
        };
        o.amdDefine = function (q, p) {
            this.amdDeps = q;
            this.amdConstruct = p;
            this.amdDefined = true;
            if (this.amdWaiting) {
                this.amdLoad();
            }
        };
        o.amdLoad = function () {
            if (!this.amdDefined) {
                return;
            } else {
                if (this.amdLoading) {
                    return;
                }
            }
            this.amdLoading = true;
            var q = this, p = this.amdConstruct, r = this.amdDeps;
            e(r, function () {
                var s = typeof p === "function" ? p.apply(window, arguments) : p;
                q.resolve(s);
            }, function (s) {
                q.reject(s);
            });
        };
        return o;
    }

    function f(m) {
        if (typeof d[m] === "undefined") {
            d[m] = c(m);
            d[m].timeout = setTimeout(function () {
                if (!d[m].amdDefined) {
                    d[m].reject("Loading timeout for " + m);
                    clearInterval(d[m].shimExport);
                }
            }, g);
            var s = m.match(/(^\w+!)/) || "";
            if (s) {
                s = s[1];
                m = m.substring(s.length);
            }
            var v = k[m] || false, o = m.split("/"), u = o.length, r = u, p;
            while (!v && r > 0) {
                p = o.slice(0, r).join("/");
                if (typeof k[p] === "string") {
                    v = k[p] + "/" + o.slice(r).join("/");
                }
                r--;
            }
            m = (s || "") + m;
            if (!v) {
                v = m;
            } else {
                v = (s || "") + v;
            }
            if (d[v] && v !== m) {
                d[v].then(function (w) {
                    d[m].resolve(w);
                }, function (w) {
                    d[m].reject(w);
                });
                return d[v];
            }
            if (i[m] && i[m].exports) {
                var t = i[m].exports;
                if (window[t]) {
                    return d[m].resolve(window[t]);
                }
                d[m].shimExport = setInterval(function () {
                    if (window[t]) {
                        clearInterval(d[m].shimExport);
                        d[m].resolve(window[t]);
                    }
                }, 100);
            }
            if (v.substring(0, 5) === "text!") {
                var n = v.split(/\./g).pop(), q = e.toUri(v.substring(5, v.length - 1 - n.length)).replace(/\.js(\?.*)?$/i, "." + n);
                q = q.replace(/([^:]\/)\//g, "$1");
                a.get(q).then(function (w) {
                    d[m].resolve(w);
                });
            } else {
                if (v.match(/\.\w+$/)) {
                    e.load(e.toUri(v), function () {
                        d[m].shimExport || d[m].resolve({});
                    });
                } else {
                    e.load(e.toUri(v));
                }
            }
        }
        return d[m];
    }

    function e(s, o, p) {
        var r = [];
        for (var n in r) {
            if (r.hasOwnProperty(n)) {
                r.push(n);
            }
        }
        var m = [], q, t = [];
        while (s.length > 0) {
            q = s.shift();
            t.push(q);
            m.push(f(q));
        }
        if (m.length === 0) {
            o();
        } else {
            a.when.apply(a, m).done(o).fail(p);
        }
    }

    e.load = function (o, m) {
        if (typeof m === "function") {
            a.getScript(o, m);
        } else {
            var n = document.createElement("script");
            n.type = "text/javascript";
            n.src = o;
            n.setAttribute("data-define", "true");
            document.getElementsByTagName("head")[0].appendChild(n);
        }
    };
    e.toUri = function (n) {
        if (n.match(/\.\w+$/)) {
            return n;
        }
        if (n.match(/^http/)) {
            return n + ".js?9326";
        }
        var m = h + "/" + n + ".js?9326";
        m = m.replace(/([^:]\/)\//g, "$1");
        return m;
    };
    e.config = function (m) {
        h = m.baseUrl || h;
        g = m.timeout || g;
        i = m.shim || i;
        k = m.paths || k;
    };
    e.config.addPath = function (n, m) {
        k[n] = m;
    };
    var l = 0;

    function j(o, q, m, n) {
        if (a.isArray(o)) {
            m = q;
            q = o;
            o = "mod" + l++;
        }
        if (!a.isArray(q)) {
            m = q;
            q = [];
        }
        var p = d[o] = d[o] || c(o);
        p.amdDefine(q, m);
        if (typeof n === "function") {
            p.fail(n);
        }
        return p;
    }

    window.require = e;
    window.define = j;
    window.define("jquery/require", [], function () {
        return e;
    });
}(window.jQuery));
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
(function (a) {
    require(["util/Browser", "util/Ajax"], function (b) {
        b.init();
    }, function (b) {
        if (window.console) {
            a.warn("Unable to load one or more foundation libraries: ", b);
        }
    });
}(window.console));
function wopen(d, a, b) {
    if (!a) {
        a = 800;
    }
    if (!b) {
        b = 600;
    }
    var e = "height=" + b + ",width=" + a + ",,,menubar=no,resizable=yes,scrollbars=yes,status=no,titlebar=no,toolbar=no";
    var c = window.open("", "info", e);
    c.location.href = d.href;
    if (parseInt(navigator.appVersion, 10) >= 4) {
        c.window.focus();
    }
    return false;
}
function addOnLoad(a) {
    if (typeof window.addEventListener === "function") {
        window.addEventListener("load", a, false);
    } else {
        if (typeof window.attachEvent === "function") {
            window.attachEvent("onload", a);
        } else {
            if (window.onload !== null) {
                var b = window.onload;
                window.onload = function (c) {
                    b(c);
                    a();
                };
            } else {
                window.onload = a;
            }
        }
    }
}
function confirmSubmit(a) {
    if (!confirm(a)) {
        return false;
    }
}
function getJQuerySelectorFromPrototypeSelector(a) {
    if (typeof a === "string" && a.split(" ").length === 1) {
        a = a.replace(/\\?\./g, "\\.");
    }
    return a;
}
function toggleElementVisibility(b, a) {
    if (typeof b === "string") {
        if (!b.match(/^[#\.]/)) {
            b = "#" + b;
            if (window.console && window.console.log) {
                window.console.log("[TEV01] Legacy flow for " + b);
            }
        }
        b = getJQuerySelectorFromPrototypeSelector(b);
        var c = jQuery(b);
        c.trigger("toggled", c);
        if (a === "slide" || a === "blind") {
            c.slideToggle();
        } else {
            if (a === "appear" || a === "fade") {
                c.fadeToggle();
            } else {
                c.toggle();
            }
        }
        return false;
    }
    if (b === null) {
        return false;
    }
    if (b.style.display === "none") {
        b.style.display = "block";
        return false;
    }
    b.style.display = "none";
    return false;
}
var submitFormCounter = 0;
function checkSubmitFormCounter(a) {
    if (submitFormCounter > 0) {
        if (a !== null && a !== "") {
            alert(a);
        }
        return false;
    }
    submitFormCounter++;
    return true;
}
function toggleAllCheckboxes(e, a, d) {
    var c = document.getElementById(e);
    if (c && c.elements) {
        for (var b = 0;
             b < c.elements.length; b++) {
            if (c.elements[b].type === "checkbox" && c.elements[b].name === a) {
                c.elements[b].checked = d;
            }
        }
    }
}
function adjustForParentPositionStyle(a) {
    var e = parseInt(a.style.left.replace(/[^0-9]/g, ""), 10), d = parseInt(a.style.top.replace(/[^0-9]/g, ""), 10);
    var c = a.parentNode;
    while (typeof c !== "undefined" && c !== null) {
        var b = c.currentStyle || (typeof window.getComputedStyle === "function" ? window.getComputedStyle(c) : null);
        if (b && b.position) {
            if (b.position === "relative" || b.position === "absolute" || b.position === "fixed") {
                e -= Element.cumulativeOffset(c)[0];
                d -= Element.cumulativeOffset(c)[1];
                break;
            }
        }
        c = c.parentNode || null;
    }
    a.style.left = e + "px";
    a.style.top = d + "px";
}
function toggleTooltipJQuery(a, b) {
    if (a === null || b === null) {
        return false;
    }
    a = getJQuerySelectorFromPrototypeSelector(a);
    b = getJQuerySelectorFromPrototypeSelector(b);
    a = jQuery(a);
    b = jQuery(b);
    b.css("left", a.position().left + a.width() + "px");
    b.css("top", a.position().top + "px");
    b.toggle();
    return false;
}
function toggleTooltip(a, b) {
    if (typeof a === "string" && typeof b === "string") {
        a = getJQuerySelectorFromPrototypeSelector(a);
        b = getJQuerySelectorFromPrototypeSelector(b);
        return toggleTooltipJQuery(a, b);
    }
    if (a === null || b === null) {
        return false;
    }
    b.style.left = Element.cumulativeOffset(a)[0] + Element.getWidth(a) + "px";
    b.style.top = Element.cumulativeOffset(a)[1] + "px";
    adjustForParentPositionStyle(b);
    toggleElementVisibility(b);
    return false;
}
function clearForm(e) {
    for (var c = 0;
         c < e.elements.length; c++) {
        var d = e.elements[c];
        var a = d.type.toLowerCase();
        switch (a) {
            case"text":
            case"password":
            case"textarea":
                d.value = "";
                break;
            case"radio":
            case"checkbox":
                if (d.checked) {
                    d.checked = false;
                }
                break;
            case"select-one":
            case"select-multiple":
                for (var b = 0;
                     b < d.options.length; b++) {
                    d.options[b].selected = false;
                }
                break;
            default:
                break;
        }
    }
}
(function onJQuery(b) {
    if (typeof b !== "function") {
        return setTimeout(function () {
            onJQuery(window.jQuery);
        }, 100);
    }
    var a = function () {
        b(".csr-focus-on-load").first().focus();
        b("#power-search").each(function () {
            var c = this;
            require(["ui/globalsearch"], function (d) {
                d.boot(c);
            });
        });
        require(["util/Loaders"], function (c) {
            c.lazyEnrichment("[data-collapse]", "ui/Collapse");
            c.lazyEnrichment("acronym,abbr", "ui/acronym");
            c.lazyEnrichment("[data-copy-text]", "ui/copy-to-clipboard");
            c.lazyEnrichment("[data-copy]", "ui/Copy");
            c.lazyEnrichment("[data-user-preference]", "util/UserPreferences");
            c.lazyEnrichment("[data-dialog]", "ui/Dialog");
            c.lazyEnrichment("form[data-form]", "ui/Form");
            c.lazyEnrichment("form[data-stepped]", "ui/Form/Stepped");
            c.lazyEnrichment("form[data-validate]", "ui/Form/Validate");
            c.lazyEnrichment("[placeholder]", "ui/Form/Placeholder");
            c.lazyEnrichment("[data-progress]", "ui/Form/Progress");
            c.lazyEnrichment("form[data-ajax-form]", "ui/Form/AjaxForm");
            c.lazyEnrichment("form[data-submit-once]", "ui/Form/SubmitOnce");
            c.lazyEnrichment("[data-event]", "util/Analytics");
            c.lazyEnrichment("[data-form-in-form]", "ui/Form/FormInForm");
            c.lazyEnrichment("[data-form-help]", "ui/Form/Help");
            c.lazyEnrichment("[data-faux-columns]", "ui/Faux");
            c.lazyEnrichment("[data-element-list]", "ui/Form/ElementList");
            c.lazyEnrichment("table[data-filterable]", "ui/Table/Filterable");
            c.lazyEnrichment("table[data-sortable]", "ui/Table/Sortable");
            c.lazyEnrichment("table[data-downloadable]", "ui/Table/Downloadable");
            c.lazyEnrichment(".switch", "ui/Switch");
            c.lazyEnrichment(".csr-radio-button", "ui/Form/RadioButton");
            c.lazyEnrichment(".csr-toggle-button,[data-toggle]", "ui/Toggle");
            c.lazyEnrichment("[data-tableheader]", "ui/Table/TableHeader");
            c.lazyEnrichment("[data-messaging]", "ui/Messaging");
            c.lazyEnrichment("[data-widget]", "ui/Widget");
            c.lazyEnrichment("[data-dropdown]", "ui/Dropdown");
            c.lazyEnrichment("[data-tooltip]", "ui/Tooltip");
            c.lazyEnrichment("[data-dateinput]", "ui/DateInput");
            c.lazyEnrichment("[data-include]", "ui/Include");
            c.lazyEnrichment("textarea[data-editor]", "ui/Form/Editor/TextArea");
            c.lazyEnrichment("[data-tags]", "ui/Tags");
            c.lazyEnrichment("[data-custom-select]", "ui/CustomSelect");
            c.lazyEnrichment(".csr-progressive", "util/Features");
            c.lazyEnrichment("[data-date-picker-collection]", "calendar/DatePickerCollection");
            c.lazyEnrichment("[data-legacy]", "util/Legacy");
            c.lazyEnrichment("[data-chart]", "ui/VisualizationComponent");
        });
        jQuery(".ca-portal-add-widget").hover(function () {
            jQuery(this).find("div").stop().show().fadeIn(200);
        }, function () {
            jQuery(this).find("div").stop().fadeOut(200);
        });
        jQuery(document.body).on("click", ".csr-collapsed-info-line", function (d) {
            var c = jQuery(d.target).closest(".csr-collapsed-info-line");
            if (c.is(".open")) {
                c.removeClass("open");
            } else {
                c.addClass("open");
            }
        });
    };
    jQuery(document).ready(a);
}(window.jQuery));
function legacyVxG(a) {
    return a.style ? a : document.getElementById(a);
}
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
define("ui/UIConstants", ["jquery"], function (b) {
    var a = {
        CHART_CREATED: "chartCreated",
        WIDGET_CREATED: "widgetCreated",
        OBSERVABLE_CREATED: "observableCreated",
        WIDGET_APP_STARTUP: "widgetAppStartup",
        CHART_FIRST_RENDER: "chartFirstRender",
        CHART_TO_VIEW_EVENT: "chartToWidgetEvent"
    };
    a.getNamespaced = function (d, c) {
        if (typeof d !== "string") {
            return d;
        }
        return d.split(/\s+/g).join("." + c + " ") + "." + c;
    };
    return a;
});
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
define("util/UserPreferences", ["store", "jquery"], function (f, a) {
    var k = window.store || f;
    var h = k.enabled, l, g, c, m, i;
    l = h ? function (q, n) {
        var o = "" + k.get(q);
        if (o === "undefined" || o === "null") {
            return n;
        }
        return o;
    } : function (o, n) {
        return n;
    };
    g = h ? function (q) {
        var o = {}, n = q.length;
        k.forEach(function (p, r) {
            if (p === q) {
                return r.toString();
            } else {
                if (p.substring(0, n + 1) === q + ".") {
                    var s = p.substring(n + 1);
                    if (s.indexOf(".") > -1) {
                        s = s.substring(0, s.indexOf("."));
                        o[s] = g(q + "." + s);
                    } else {
                        o[s] = r.toString();
                    }
                }
            }
        });
        return o;
    } : function () {
        return {};
    };
    c = h ? function (o, n) {
        if (typeof n === "undefined" || "undefined" === ("" + n)) {
            throw new Error("Do not store 'undefined'");
        }
        var p = l(o);
        k.set(o, n);
        return p;
    } : function () {
    };
    function d(o, n) {
        if (typeof n === "object") {
            for (var p in n) {
                if (n.hasOwnProperty(p)) {
                    d(o ? o + "." + p : p, n[p]);
                }
            }
        } else {
            c(o, n);
        }
    }

    m = h ? function (q, p, u) {
        var s = l(q) || "", r = s.split(/\?/), t = r.shift(), n = r.join("?").split(/&/), o, w = false;
        while (n.length > 0) {
            o = n.shift();
            if (o.length === 0) {
                continue;
            }
            if (o.split("=")[0] === p) {
                o = p + "=" + encodeURIComponent(u);
                w = true;
            }
            if (t.indexOf("?") > -1) {
                t += "&" + o;
            } else {
                t += "?" + o;
            }
        }
        if (!w) {
            if (t.indexOf("?") > -1) {
                t += "&" + p + "=" + encodeURIComponent(u);
            } else {
                t += "?" + p + "=" + encodeURIComponent(u);
            }
        }
        c(q, t);
    } : function () {
    };
    i = h ? function () {
        require(["jquery"], function (n) {
            n(document).ready(function () {
                n("select[data-user-preference]").each(function () {
                    var p = n(this), o = "ui-dup-" + p.attr("data-user-preference"), q = l(o);
                    p.val(q).change(function () {
                        c(o, p.val());
                    }).change();
                });
            });
        });
    } : function () {
    };
    var e = {};

    function j(n) {
        n = n || {};
        e.url = n.url || e.url || adyen.config.savePreferencesUrl || adyen.base + "/ca/accounts/preferences/save.shtml";
        e.formHash = n.formHash || e.formHash || a("input[name=formHash]").val();
    }

    function b(n, q) {
        j();
        var p = new a.Deferred();
        var o = {formHash: e.formHash};
        if (!n.match(/^preferences\./)) {
            n = "preferences." + n;
        }
        o[n] = q;
        require(["util/Ajax"], function (r) {
            r.post(e.url, o).then(function () {
                p.resolve();
            }, function (s) {
                p.reject(s);
            });
        }, function (r) {
            p.reject(r);
        });
        return p.promise();
    }

    return {
        getPreference: l,
        setPreference: c,
        setPreferences: d,
        getPreferences: g,
        setPreferenceParam: m,
        setPersistencyParameters: j,
        setPersistentPreference: b,
        bind: i,
        init: i
    };
});
define("util/Console", [], function () {
    var e = function () {
    };
    var b = ["clear", "debug", "dir", "error", "info", "log", "trace", "warn", "table"];
    var a = window.console || {};
    for (var c in b) {
        if (b.hasOwnProperty(c)) {
            a[b[c]] = a[b[c]] || e;
        }
    }
    var d = navigator.userAgent.match(/Chrome/i) ? {
        debug: "color:blue",
        info: "color:cyan",
        warn: "color:darkorange",
        error: "color:red"
    } : {};

    function f(g, i, h) {
        return function () {
            var j = [].slice.call(arguments);
            if (i.match(/log|info|warn|debug/i)) {
                if (d.hasOwnProperty(i)) {
                    j.unshift(d[i]);
                    j.unshift("%c [" + i.toUpperCase() + " " + h + "]");
                } else {
                    j.unshift("[" + i.toUpperCase() + " " + h + "]");
                }
            }
            if (Object.prototype.hasOwnProperty.call(g, i) && typeof g[i] === "function") {
                g[i].apply(g, j);
            }
        };
    }

    a.getLog = function (i) {
        var h = {}, g = b.slice(0), j;
        while (g.length > 0) {
            j = g.shift();
            h[j] = f(a, j, i);
        }
        return h;
    };
    return a;
});
define("util/Ajax", ["jquery", "util/Console", "json"], function (i, h, l) {
    var g = h.getLog("util/Ajax");
    var n = {};
    var d = true;
    var b = {};
    try {
        var a = "qWSUBfmto8MMyy3hr4rkqRqCSI6FnnsooZfs9PwEtRydLkzUytCpH2iFpYW2DI1";
        var m = "rBM6Tnzv0DSO4gyHTve09twlffcbWjgQKYETygtJkgF2ZG1TRf8j95yadUVm4y7";
        var j = "facade://", f = 4000;
        i.ajaxPrefilter(function (e, p, o) {
            if (typeof p[a] === "undefined") {
                g.warn("Unfiltered ajax request to '" + e.url + "'");
            }
        });
        i.ajaxTransport("+*", function (e, q, o) {
            if (e.url.substring(0, j.length) !== j) {
                return;
            }
            var p;
            return {
                send: function (y, v) {
                    var s = e.url.substring(j.length).split("?"), w = (s[0] || "").split("/"), x = s[1] || "", z, r;
                    r = w.pop();
                    z = w.join("/");
                    var t = setTimeout(function () {
                        v(500, "error");
                    }, e.timeout || f);
                    require(["util/QueryString", z], function (C, A) {
                        if (t) {
                            clearTimeout(t);
                            t = null;
                        }
                        try {
                            e.urlParams = C.parse(x);
                            var u = A[r].call(A, e, q, o);
                            if (u.then && u.done && u.fail) {
                                u.then(function (D) {
                                    v(200, "success", {json: D, text: JSON.stringify(D)});
                                }, function (D) {
                                    v(500, "error", {text: D});
                                });
                            } else {
                                v(200, "success", {json: u, text: JSON.stringify(u)});
                            }
                        } catch (B) {
                            g.info("Error while calling function", B.message);
                            v(500, "error", {text: B.message});
                        }
                    }, function (u) {
                        g.info("Unable to load class", u);
                    });
                }, abort: function () {
                    if (p) {
                        clearTimeout(p);
                    }
                }
            };
        });
        var c = function (e, o) {
            o = o || {};
            o.type = o.type || "GET";
            o.headers = o.headers || {};
            o.headers["Accept-Language"] = o.headers["Accept-Language"] || navigator.language;
            if (typeof o.sanitation === "function") {
                var p = o.beforeSend, q = o.dataFilter;
                o.beforeSend = function (s, r) {
                    s[m] = m;
                    if (typeof p === "function") {
                        p(s, r);
                    }
                };
                o.dataFilter = function (s, r) {
                    if (typeof q === "function") {
                        s = q(s, r);
                    }
                    return o.sanitation(s);
                };
            }
            o.hash = JSON.stringify([e, o]);
            return o;
        };
        b.ajax = function (o, p) {
            if (typeof o === "object") {
                p = o;
                o = null;
            }
            p = c(o, p);
            var q = p.hash;
            p[a] = new Date().getTime();
            if (d && p.type.toUpperCase() === "GET") {
                if (typeof n[q] !== "undefined" && p.datatype !== "script") {
                    if (typeof n[q].cacheIndefinitely !== "undefined" && n[q].cacheIndefinitely === true) {
                        g.warn("Throttle in effect: Repeated infiniteCached request to GET " + p.url);
                    } else {
                        g.warn("Throttle in effect: Duplicated request to GET " + p.url);
                    }
                    if (typeof p.success === "function" && typeof n[q] === "object") {
                        n[q].done(p.success);
                    }
                    return n[q];
                }
            }
            var e = n[q] = (o === null ? i.ajax(p) : i.ajax(o, p));
            if (typeof n[q] !== "undefined") {
                n[q].cacheIndefinitely = n[q].cacheIndefinitely || p.afpCache;
                if (typeof n[q] !== "undefined") {
                    n[q].complete(function () {
                        if (typeof n[q] !== "undefined" && n[q].cacheIndefinitely !== true) {
                            delete n[q];
                        } else {
                            g.info("Infinite cache (afpCache=true) in place for " + (o || p.url));
                        }
                    });
                }
                if (typeof n[q] !== "undefined") {
                    n[q].fail(function () {
                        if (typeof n[q] !== "undefined") {
                            delete n[q];
                        }
                    }).error(function () {
                        if (typeof n[q] !== "undefined") {
                            delete n[q];
                        }
                    });
                }
            } else {
                delete n[q];
            }
            return e;
        };
        b.autoResponder = function (o, p, e) {
            p = c(o, p);
            e.cacheIndefinitely = true;
            n[p.hash] = e;
        };
        b.get = function (p, r, s, o, q, t, e) {
            if (typeof r === "function") {
                o = s;
                s = r;
                r = null;
            }
            return b.ajax({
                url: p,
                data: r,
                success: s,
                dataType: o,
                sanitation: q,
                contentType: t,
                afpCache: e === true
            });
        };
        b.post = function (p, r, s, o, q, t, e) {
            if (typeof r === "function") {
                o = s;
                s = r;
                r = null;
            }
            return b.ajax({
                type: "POST",
                url: p,
                data: r,
                success: s,
                dataType: o,
                sanitation: q,
                contentType: t,
                afpCache: e === true
            });
        };
        b.getScript = function (e, o) {
            return b.ajax({url: e, dataType: "script", success: o});
        };
        b.getJSON = function (e, p, o) {
            return b.ajax({url: e, dataType: "json", contentType: "application/json", success: p, sanitation: o});
        };
        i.fn.ajaxLoad = function (r, t, p) {
            var o = i(this), u, s = r.split(" "), q = s.shift(), e = s.join(" ");
            if (o.length < 1) {
                return;
            }
            if (typeof t === "function") {
                p = t;
                t = null;
            }
            if (typeof t === "object") {
                u = b.ajax({url: q, method: "POST", data: t});
            } else {
                u = b.get(q);
            }
            u.then(function (v) {
                if (e) {
                    o.html(i(v).find(e));
                } else {
                    o.html(v);
                }
                if (typeof p === "function") {
                    o.each(p);
                }
            }, function (v) {
                g.warn("Error while loading data into element: " + v.message);
            });
            return o;
        };
        b.isSanitized = function (e) {
            return typeof e[m] !== "undefined";
        };
    } catch (k) {
        g.warn(k.getMessage());
    }
    return b;
});
define("Constants", ["jquery"], function (b) {
    var a = {
        EV_CONTENT_MERGED: "csrcontentmerged",
        EV_CONTENT_SHOW: "csrcontentshown",
        EV_CONTENT_HIDE: "csrcontenthidden",
        EV_STATE_CHANGE: "csrstatechanged",
        EV_RESIZE: "csrresized",
        EV_FOCUS: "csrfocus"
    };
    a.EV_CONTENT_SHOW_HIDE = [a.EV_CONTENT_SHOW, a.EV_CONTENT_HIDE].join(" ");
    a.getNamespaced = function (d, c) {
        if (typeof d !== "string") {
            return d;
        }
        return d.split(/\s+/g).join("." + c + " ") + "." + c;
    };
    return a;
});
define("ui/Collapse", ["jqueryExtended", "Constants", "util/QueryString", "util/UserPreferences"], function (j, e, o, i) {
    var s = "icons", l = "text", q = {
        normal: {collapsedIcon: "icon-caret-down", uncollapsedIcon: "icon-caret-up"},
        panel: {collapsedIcon: "icon-caret-left", uncollapsedIcon: "icon-caret-down"},
        checkbox: {collapsedIcon: "icon-square-o", uncollapsedIcon: "icon-check-square-o"},
        below: {collapsedIcon: "icon-caret-right", uncollapsedIcon: "icon-caret-up"},
        dropdown: {collapsedIcon: "icon-caret-down", uncollapsedIcon: "icon-caret-down"},
        chevron: {collapsedIcon: "icon-chevron-down", uncollapsedIcon: "icon-chevron-up"},
        hamburger: {collapsedIcon: "icon-bars", uncollapsedIcon: "icon-bars", linkClass: "csr-hamburger-collapse-link"},
        text: {collapsedIcon: "csr-text-caret", uncollapsedIcon: "csr-text-caret", isText: true}
    }, d = "data-collapse-style", p = "data-collapse-open-text", g = "data-collapse-close-text", m = "O", b = "C";

    function h(u) {
        return q[u] || q.normal;
    }

    function n(v, u) {
        var x = v.find("i.csr-collapse-caret"), w = h(v.attr(d));
        if (w.linkClass) {
            v.addClass(w.linkClass);
        }
        if (u.is(":visible")) {
            x.removeClass(w.collapsedIcon).addClass(w.uncollapsedIcon);
            v.removeClass("csr-collapsed");
            v.addClass("csr-uncollapsed");
            if (w.isText) {
                x.text(v.attr(g) || "hide");
            }
        } else {
            x.removeClass(w.uncollapsedIcon).addClass(w.collapsedIcon);
            v.addClass("csr-collapsed");
            v.removeClass("csr-uncollapsed");
            if (w.isText) {
                x.text(v.attr(p) || "show");
            }
        }
    }

    function r(v) {
        var z = v.attr("data-collapse").split("?"), u = j(z[0]), w = (z.length > 1 ? o.parse(z[1], true) : {}), y = u.css("display"), x = !u.is("tbody,tr") && y !== "inline";
        if (z[0].indexOf("#") === -1 && w.target === "self") {
            u = v.find(z[0]);
        } else {
            if (z[0].indexOf("#") === -1 && w.target === "parent") {
                u = v.parent().find(z[0]);
            }
        }
        if (w.position || w.style) {
            v.attr(d, w.position || w.style);
        }
        u.open = function (A) {
            var B = u.css("display");
            if (A && x) {
                u.slideDown(400, function () {
                    n(v, u);
                    if (B !== u.css("display")) {
                        u.trigger(e.EV_CONTENT_SHOW);
                    }
                });
            } else {
                u.show();
                n(v, u);
                u.each(function () {
                    if (B !== u.css("display")) {
                        j(this).trigger(e.EV_CONTENT_SHOW);
                    }
                });
            }
            if (w.collapsedClass) {
                u.removeClass(w.collapsedClass);
            }
            if (w.uncollapsedClass) {
                u.addClass(w.uncollapsedClass);
            }
            if (w.userPreference) {
                i.setPreference(w.userPreference, m);
            }
        };
        u.close = function (A) {
            var B = u.css("display");
            if (A && x) {
                u.slideUp(400, function () {
                    n(v, u);
                    if (B !== u.css("display")) {
                        u.trigger(e.EV_CONTENT_HIDE);
                    }
                });
            } else {
                u.hide();
                n(v, u);
                if (B !== u.css("display")) {
                    u.trigger(e.EV_CONTENT_HIDE);
                }
            }
            if (w.collapsedClass) {
                u.addClass(w.collapsedClass);
            }
            if (w.uncollapsedClass) {
                u.removeClass(w.uncollapsedClass);
            }
            if (w.userPreference) {
                i.setPreference(w.userPreference, b);
            }
        };
        return u;
    }

    function c(w) {
        var v = j(w);
        if (v.is("[data-collapse]")) {
            if (v.attr("data-collapse").match(/generate/i)) {
                if (v.find(".preview").length === 0) {
                    v.html('<span class="preview">' + v.html() + "</span>");
                }
                var F = v.find(".preview"), x = F.text() || v.text(), G = v.attr("data-collapse").match(/.*maxlength=([^&]*)\&.*/)[1], z = v.attr("data-collapse").match(/.*caret=([^&]*)\&.*/)[1], C = v.attr("data-collapse").match(/.*show=([^&]*)/)[1], D = x.slice(0, G), y = x.length, B = x.slice(G);
                if (y >= G) {
                    var u = j('<span class="show-all"></span>').text(B).appendTo(v), E = u.getOrGenerateId(), A = j('<span class="csr-more" style="display: inline-block;"></span>').attr("data-collapse", "#" + E + "?" + z + "&" + C).appendTo(v).show();
                    F.empty();
                    F.append(D);
                    v = A;
                }
            }
            v.off("click.ui-collapse,change.ui-collapse").on("click.ui-collapse,change.ui-collapse", function (J) {
                var K = j(this), H = r(K), I = j(J.target);
                if (K.attr("data-collapse").match(/\?.*once/i)) {
                    K.hide();
                }
                if (K.is("input[type=checkbox],input[type=radio]")) {
                    if (K.is(":checked")) {
                        H.open(true);
                    } else {
                        H.close(true);
                    }
                } else {
                    if (H.is(":visible")) {
                        H.close(true);
                        if (!I.is("a[href]")) {
                            J.preventDefault();
                        }
                    } else {
                        H.open(true);
                        if (!I.is("a[href]")) {
                            J.preventDefault();
                        }
                    }
                }
            }).each(function () {
                var L = j(this), H = r(L), M = L.attr("data-collapse").split("?"), J = (M.length > 1 ? o.parse(M[1], true) : {});
                if (L.is("input[type=checkbox],input[type=radio]")) {
                    if (L.is(":checked")) {
                        H.open(false);
                    } else {
                        H.close(false);
                    }
                    if (this.form && this.name && this.name.match(/^[\w\-]+$/)) {
                        j(this.form).find("input[type=radio][name=" + this.name + "]").not("[data-collapse]").change(function () {
                            if (L.is(":checked")) {
                                H.open(false);
                            } else {
                                H.close(false);
                            }
                        });
                    }
                } else {
                    if (L.find(".csr-collapse-caret").length === 0) {
                        L.addClass("csr-collapse-link");
                        if (!L.attr("data-collapse").match(/\?.*no-caret/i)) {
                            if (L.is("tr")) {
                                L.find("td,th").first().prepend('<i class="csr-collapse-caret"></i>');
                            } else {
                                L.prepend('<i class="csr-collapse-caret"></i>');
                            }
                        }
                        var K = J.defaultState || "";
                        if (J.userPreference) {
                            if (i.getPreference(J.userPreference) === m) {
                                K = "open";
                            } else {
                                if (i.getPreference(J.userPreference) === b) {
                                    K = "close";
                                }
                            }
                        }
                        if (K.match(/open/i)) {
                            H.open();
                        } else {
                            if (K.match(/close/i)) {
                                H.close();
                            }
                        }
                        n(L, H);
                    } else {
                        n(L, H);
                    }
                }
                if ((J.waitForVisible || "false").match(/true|yes|on|1/i) && !L.is(":visible")) {
                    var I = setInterval(function () {
                        if (L.is(":visible")) {
                            clearInterval(I);
                            n(L, H);
                        }
                    }, 500);
                }
            });
        } else {
            v.find("[data-collapse]").not(".ui-collapse-bound").addClass("ui-collapse-bound").each(function () {
                c(this, false);
            });
        }
    }

    function a(v) {
        var u = j(v), w = u.is("[data-collapse]") ? u : u.closest("[data-collapse]");
        n(w, r(w).hide());
    }

    var k = false, f = false;

    function t(u) {
        if (typeof u === "undefined") {
            u = j(document);
        }
        if (k) {
            c(u);
        } else {
            if (f) {
            } else {
                f = true;
                j(document).ready(function () {
                    k = true;
                    c(document.body);
                });
            }
        }
    }

    return {init: t, createCollapse: c, close: a};
});
define("ui/Favorites", ["jqueryExtended", "Constants", "ui/Collapse", "util/Ajax", "jquery.ui"], function (a, d, h, e) {
    var n = "data-favorites";
    var c = "data-area-id";
    var f = "selectedFavorites";
    var o = ".ca-report-widget";
    var g = "data-id";
    var b = "data-favorites-action";
    var m = "ca-favorite";
    var i = ".ca-report-widget-placeholder";
    var k = "[" + n + "]";
    var j = "[" + n + "=" + f + "]";

    function l(p) {
        var q = this;
        this.isCollapsed = true;
        this.api = p;
        var r = this.api.getNode();
        this.saveUrl = r.attr("data-save-url");
        this.columns = r.find(k);
        this.favoritesList = this.columns.filter(j);
        if (p.parameters && p.parameters.sortable === "favorites") {
            this.favoritesList.sortable({
                items: o, change: function (s, t) {
                    t.placeholder.css({visibility: "visible"});
                }
            }).disableSelection();
            this.favoritesList.on("sortstop", function () {
                q.save();
            });
        }
        r.on("click", "[" + b + "]", function (s) {
            q.handleAction(s);
        });
        p.ready();
        this.state = this.getState();
        this.updateUI();
    }

    l.prototype.handleAction = function (q) {
        q.preventDefault();
        var p = a(q.target).closest("[" + b + "]");
        var t = p.closest(o);
        var u = t.attr(g);
        var s = p.attr(b);
        var r = this.favoritesList.findOne("[" + g + "=" + u + "]");
        switch (s.split("?")[0]) {
            case"favorite":
                if (r.length === 0) {
                    t.clone().appendTo(this.favoritesList);
                    this.save();
                    this.updateUI();
                    this.message("You added this item in your favorite list", {timeout: 3000});
                } else {
                    this.message("You already have this item in your favorite list", {timeout: 3000});
                }
                break;
            case"unfavorite":
                if (r.length > 0) {
                    r.remove();
                    this.save();
                    this.updateUI();
                    this.message("The item is removed from your favorite list", {timeout: 3000});
                }
                break;
        }
    };
    l.prototype.getState = function () {
        var p = {};
        this.favoritesList.each(function () {
            var s = a(this), r = s.find(o), t = [], q = {};
            r.each(function () {
                var u = a(this).attr(g);
                if (typeof q[u] === "undefined") {
                    q[u] = true;
                    t.push(u);
                }
            });
            p[a(this).attr(c)] = t.join(",");
        });
        return p;
    };
    l.prototype.save = function () {
        var q = this.state, r = this.getState();
        for (var p in q) {
            if (q.hasOwnProperty(p)) {
                if (q[p] !== r[p]) {
                    e.post(this.saveUrl, {value: p + ":" + r[p]});
                }
            }
        }
        this.state = r;
        this.updateUI();
    };
    l.prototype.updateUI = function () {
        var q = "," + ((this.currentState || this.getState())["ca-reports-column"]) + ",", p = this.favoritesList.find(o).length > 0;
        if (p) {
            a(i).addClass("hidden").removeClass("show");
        } else {
            a(i).addClass("show").removeClass("hidden");
        }
        this.columns.find(o).each(function () {
            var r = a(this), s = r.attr(g);
            if (q.indexOf("," + s + ",") > -1) {
                r.addClass(m);
            } else {
                r.removeClass(m);
            }
        });
    };
    l.prototype.message = function (q, p) {
        require(["ui/Notification"], function (r) {
            r.info(q, p);
        });
    };
    return l;
});
define("ui/ColumnSize", ["Constants", "jqueryExtended", "util/QueryString"], function (c, e, b) {
    function a(j) {
        var g = e(j).closest("[data-column-resize]"), i = (g.attr("data-column-resize") || "").split("?"), f = i[0], k = b.parse(i[1] || "");
        if (g.length === 0 || typeof k.size !== "string") {
            return;
        }
        var h = k.size.split(/\s*,\s*/);
        e(f).children("." + h.shift()).each(function () {
            e(this).removeClass("a b c d e f g h ij").addClass(h.shift());
        });
    }

    function d() {
        e(document).ready(function () {
            e("[data-column-resize]").not(".csr-columnsize-initialized").addClass("csr-columnsize-initialized").each(function () {
                var f = this;
                e(this).on(c.EV_FOCUS, function (g) {
                    g.stopPropagation();
                    a(f);
                });
            }).click(function (f) {
                e(f.target).trigger(c.EV_FOCUS);
            });
        });
    }

    return {focus: a, init: d};
});
define("util/Css", ["jquery"], function (c) {
    var a = {_count: 0};

    function b(f) {
        if (a._count === 0) {
            c("link[rel=stylesheet],link[type='text/css']").each(function () {
                a[this.href] = true;
                a._count++;
            });
        }
        if (!a[f]) {
            a._count++;
            a[f] = true;
            var e = document.createElement("link");
            e.rel = "stylesheet";
            e.href = f;
            e.type = "text/css";
            c("html > head").append(e);
        }
    }

    function d(e) {
        if (c.isArray(e)) {
            e = e.join("\n");
        }
        c("html > head").append('<style type="text/css">' + e + "</style>");
    }

    return {addStyle: d, addLink: b};
});
define("ui/copy-to-clipboard", ["jquery", "util/Css"], function (g, d) {
    var b, e = [];
    e.push(".csr-j-hover {height: 20px; position: absolute; top: 0; min-height: 100%; left: -50px; z-index: 5; padding: 4px; white-space: nowrap;}");
    e.push(".csr-j-full {visibility:hidden; overflow: hidden;}");
    e.push(".csr-j-copy {position: absolute; top: 0px; left: 0px;}");
    e.push(".csr-copy-right .csr-j-copy {left:100%;}");
    e.push(".csr-copy-right .csr-j-hover {left:0px}");
    d.addStyle(e);
    function f() {
        var i = g("[data-copy-text]").filter(function () {
            return g(this).find("csr-j-full").length === 0;
        });
        i.mouseenter(h).mouseleave(c);
        i.append('<div class="csr-j-hover" style="display:none"><div class="csr-j-full"></div><a href="#" class="csr-j-copy csr-button csr-button-copy csr-reduce"><span>copy</span></a></div>');
        if (i.length > 0) {
            i.find(".csr-j-copy").click(function (k) {
                k.preventDefault();
                var j = g(k.target).closest(".csr-j-copy").attr("data-clipboard-text");
                if (j) {
                    if (g(document.documentElement).is(".mac")) {
                        prompt("Use Command+C to copy the text to your clipboard:", j);
                    } else {
                        prompt("Use Ctrl+C to copy the text to your clipboard:", j);
                    }
                }
            });
        }
    }

    function h(j) {
        g(".csr-j-hover").each(function () {
            a(g(this));
        });
        var i = g(j.target).closest("[data-copy-text]"), l = i.find(".csr-j-hover");
        var k = i.attr("title") || i.text();
        l.find(".csr-j-full").width(i.width() + 50).text(i.attr("title"));
        l.find(".csr-j-copy").attr("data-clipboard-text", k);
        l.css("display", "").show();
    }

    function c(j) {
        var i = g(j.target).closest("[data-copy-text]").find(".csr-j-hover");
        a(i);
    }

    function a(i) {
        if (i.find(".csr-j-is-hover").length > 0) {
            setTimeout(function () {
                a(i);
            }, 100);
        } else {
            if (i.is(":visible")) {
                i.hide();
            }
        }
    }

    return {init: f};
});
define("util/Template", ["jquery", "Constants", "hogan"], function (e, b, a) {
    function d(f) {
        var g = this;
        this.entity = {
            render: function () {
                throw new Error("Synchronous rendering not available");
            }
        };
        this.template = f;
        f.then(function (h) {
            g.entity = h;
        });
    }

    d.prototype.render = function (h, g) {
        var f = new e.Deferred();
        this.template.then(function (i) {
            f.resolve(i.render(h, g || {}));
        }, function (i) {
            f.reject("Error while getting template", i);
        });
        return f.promise();
    };
    d.prototype.format = function (f) {
        return this.entity.render(f);
    };
    if (typeof window.Hogan === "undefined") {
        throw new Error("Hogan should be available");
    }
    var c = {};
    c.compile = function (g) {
        var f = new e.Deferred();
        if (typeof g === "string") {
            f.resolve(a.compile(g));
        }
        return new d(f.promise());
    };
    c.render = function (h) {
        var f = new e.Deferred();
        if (h.templateSelector) {
            h.template = h.template || e(h.templateSelector).html();
        }
        if (h.template) {
            f = c.compile(h.template).render(h.context, h.partials || {});
            if (h.node) {
                f.then(function (j) {
                    var i = e(h.node);
                    i.html(j).trigger(b.EV_CONTENT_MERGED);
                }, function (i) {
                    console.warn("Error rendering template", i);
                });
            }
        } else {
            if (h.templateUrl) {
                var g = h.templateUrl + (h.templateUrl.indexOf("?") > -1 ? "&" : "?") + "9326";
                g = g.replace(/\$\{version\}/g, new Date().getTime());
                require(["Constants", "util/Ajax"], function (j, i) {
                    i.get(g).then(function (k) {
                        c.compile(k).render(h.context).then(function (m) {
                            if (h.node) {
                                var l = e(h.node);
                                l.html(m).trigger(j.EV_CONTENT_MERGED);
                                f.resolve(l);
                            } else {
                                f.resolve(m);
                            }
                        }, function (l) {
                            f.reject(l);
                        });
                    }, function (k) {
                        f.reject(k);
                    });
                }, function (i) {
                    f.reject(i);
                });
            } else {
                f.reject("Invalid Template Render configuration");
            }
        }
        return f.promise();
    };
    return c;
});
define("util/Collection", ["jquery"], function (b) {
    function a(c) {
        this.data = (b.isArray(c) ? c : []);
        this.eventManager = b(this);
    }

    a.ADD = "collection:add";
    a.REMOVE = "collection:remove";
    a.RESET = "collection:reset";
    a.UPDATE = "collection:update";
    a.prototype = {
        addItem: function (c) {
            this.data.push(c);
            this.trigger({type: a.ADD, location: (this.data.length - 1), oldLocation: -1, items: [c]});
        }, addItemAt: function (d, c) {
            this.data.splice(c, 0, d);
            this.trigger({type: a.ADD, location: c, oldLocation: -1, items: [d]});
        }, bind: function (c) {
            b.fn.bind.apply(this.eventManager, arguments);
        }, getItemAt: function (c) {
            return (this.data[c]);
        }, getItemIndex: function (d) {
            for (var c = 0; c < this.data.length; c++) {
                if (this.data[c] === d) {
                    return (c);
                }
            }
            return (-1);
        }, reset: function (c) {
            this.data = (b.isArray(c) ? c : []);
            this.trigger({type: a.RESET, location: -1, oldLocation: -1, items: []});
        }, removeItemAt: function (c) {
            var d = this.data.splice(c, 1)[0];
            this.length = this.data.length;
            this.trigger({type: a.REMOVE, location: c, oldLocation: -1, items: [d]});
        }, updateItemAt: function (d, c) {
            this.data[c] = d;
            this.trigger({type: a.UPDATE, location: c, oldLocation: -1, items: [d]});
        }, size: function () {
            return (this.data.length);
        }, toArray: function () {
            return (this.data);
        }, trigger: function (c) {
            b.fn.trigger.apply(this.eventManager, arguments);
        }
    };
    return a;
});
define("ui/Tags", ["jqueryExtended", "util/Collection", "util/Template", "text!ui/tag.html"], function (d, b, c, a) {
    return {
        tagTemplate: c.compile(a), $removeClass: ".tag-remove", tags: this, init: function () {
            var e = this;
            d(document).ready(function () {
                d("[data-tags]").not(".csr-tags-initialized").addClass("csr-tags-initialized").each(function () {
                    e.createTags(this);
                });
            });
        }, createTags: function (h, g) {
            var f = this, e = d(h), i = typeof g !== "undefined" ? new b(g.data) : new b(e.data("tag-values"));
            d(i.toArray()).each(function (j) {
                f.addTag(e, i, j);
            });
            d(i).on(b.ADD, function (j) {
                f.addTag(e, i, j.location);
            });
            d(i).on(b.REMOVE, function (j) {
                f.removeTag(e, i, j.items[0]);
            });
            return {view: e, data: i};
        }, addTag: function (e, j, g) {
            var f = this;
            var i;
            var h = j.getItemAt(g);
            this.tagTemplate.render({tagName: h}).then(function (k) {
                d(e).append(k);
                i = d(e).find("[data-tag-value='" + h + "']");
                d(i).find(f.$removeClass).on("click", function () {
                    var l = j.getItemIndex(h);
                    j.removeItemAt(l);
                });
            });
        }, removeTag: function (e, h, f) {
            var g = d(e).find("[data-tag-value='" + f + "']");
            d(g).remove();
        }
    };
});
define("util/Number", [], function () {
    function e(i, h) {
        if (typeof h !== "number" || h < 0) {
            throw new Error("decimals should be a number greater than 0");
        }
        var j = Math.pow(10, h);
        return (Math.round(i * j) / j);
    }

    function d(i, h) {
        return i.toString().replace(/\B(?=(\d{3})+(?!\d))/g, h || ",");
    }

    function b(h) {
        var j = Math.floor(h), i = ("" + h).split(".")[1];
        return d(j, ",") + (i && i !== "0" ? "." + i : "");
    }

    function g(h) {
        if (typeof h === "string" && h.match(/^\d+(\.\d+)?$/)) {
            h = parseInt(h, 10);
        }
        if (typeof h !== "number") {
            return h;
        }
        if (h >= 1000 * 1000) {
            return Math.round(h / 100000) / 10 + "M";
        }
        if (h >= 1000) {
            return Math.round(h / 100) / 10 + "K";
        }
        return h;
    }

    function a(l) {
        if (typeof l === "string" && l.match(/^\d+(\.\d+)?$/)) {
            l = parseInt(l, 10);
        }
        if (typeof l !== "number") {
            return l;
        }
        var j = [{limit: 1024, unit: "KB"}];
        j.unshift({limit: j[0].limit * 1024, unit: "MB"});
        j.unshift({limit: j[0].limit * 1024, unit: "GB"});
        j.unshift({limit: j[0].limit * 1024, unit: "TB"});
        j.unshift({limit: j[0].limit * 1024, unit: "PB"});
        for (var k = 0, m = j.length; k < m; k++) {
            var h = j[k];
            if (l > h.limit) {
                return Math.round(l / (h.limit / 10)) / 10 + h.unit;
            }
        }
        return l;
    }

    function c(k) {
        var j = k.replace(/[^\d,\.]/g, "").split(/\D+/);
        var h = j.pop();
        var i = j.join("");
        if (i && h) {
            k = i + "." + h;
        } else {
            k = i || h;
        }
        return k ? parseFloat(k) : 0;
    }

    function f(l, k, j, i) {
        if (typeof j !== "boolean") {
            j = true;
        }
        if (typeof i !== "string") {
            i = ",";
        }
        if (k > 0) {
            var h = ("" + e(l / Math.pow(10, k), k)).split(".");
            if (j) {
                h[0] = b(h[0]);
            }
            if (h.length === 1) {
                h[1] = "0";
            }
            while (h[1].length < k) {
                h[1] += "0";
            }
            return h.join(i);
        }
        return l;
    }

    return {
        largeNumber: b,
        roundToDecimals: e,
        roundToThousands: g,
        roundToBytes: a,
        numberWithCommas: d,
        parseToNumber: c,
        formatMinorUnits: f
    };
});
define("ui/Include", ["jquery", "Constants", "util/Console"], function (a, d, g) {
    var e = false, i = a, b = "csr:closeDialog";
    a.fn.closeDialog = function () {
        a("#dialog").trigger(b);
    };
    function c(l) {
        var k;
        var j;
        k = document.getElementsByTagName("head")[0];
        if (k) {
            j = document.createElement("script");
            j.type = "text/javascript";
            j.src = l;
            k.appendChild(j);
        }
    }

    function f(l, k) {
        var m = new i.Deferred();
        var p = function (s) {
            try {
                var r = s.responseText || "";
                if (r.match(/id="content"/)) {
                    r = r.substring(r.indexOf('<div id="content"'));
                    r = r.substring(0, r.indexOf("</body"));
                }
                if (l.split(" ").length > 1) {
                    r = a(r).find(l.split(" ").slice(1).join(" ")).html() || a(s.responseText).find(l.split(" ").slice(1).join(" ")).html() || "";
                }
                var q = [];
                if (r && r.replace) {
                    r.replace(/<script.*?<\/script>/ig, function (v) {
                        var u = v.match(/src=['"](.*?)['"]/);
                        if (u && u[1]) {
                            q.push(u[1]);
                        }
                        return "";
                    });
                }
                k.html('<div class="include-content">' + r + "</div>");
                while (q.length > 0) {
                    c(q.shift());
                }
                g.log("Triggering " + d.EV_CONTENT_MERGED);
                k.trigger(d.EV_CONTENT_MERGED);
                m.resolve(k);
            } catch (t) {
                g.warn("Error while loading include content: " + t.message);
                m.reject();
            }
        };
        if (l.substring(0, 1) === "#") {
            var o = l.substring(1);
            p({responseText: '<div id="content">' + document.getElementById(o).innerHTML + "</body>"});
        } else {
            var n = l.split(" ");
            n[0] += (n[0].indexOf("?") > -1 ? "&_=" : "?_=") + new Date().getTime();
            l = n.join(" ");
            a.get(l).then(function (q) {
                if (q.indexOf("login-form") > -1 && q.indexOf("j_username") > -1) {
                    m.reject();
                    document.location.href = l;
                    return;
                }
                p({responseText: q});
            }, function () {
                p({responseText: '<body><div id="content">Unable to load data</div></body>'});
            });
        }
        var j = m.promise();
        j.closeDialog = function () {
            a("#dialog").trigger(b);
        };
        return j;
    }

    function h() {
        a(document.body).find("[data-include]").each(function (k) {
            var l = a(this), j = l.attr("data-include");
            l.removeAttr("data-include").attr("data-included", j);
            f(j, l);
        });
    }

    return {init: h, include: f};
});
define("util/Cookie", [], function () {
    function c(f, i, g) {
        var h = new Date();
        h.setTime(h.getTime() + (g * 24 * 60 * 60 * 1000));
        var e = "expires=" + h.toGMTString();
        document.cookie = f + "=" + i + "; " + e + ";path=" + (adyen && adyen.base || "/");
    }

    function a(f) {
        var e = f + "=";
        var d = document.cookie.split(";");
        for (var g = 0; g < d.length; g++) {
            var h = d[g].trim();
            if (h.indexOf(e) === 0) {
                return h.substring(e.length, h.length);
            }
        }
        return "";
    }

    var b = {set: c, get: a};
    return b;
});
define("ui/Form/Validate/VATValidator", ["jquery", "jquery.validate"], function (f) {
    var j = /^\d{5}$/, d = /^\d{8}$/, n = /^\d{9}$/, h = /^\d{10}$/, g = /^\d{11}$/, e = /^\d{12}$/, b = /^\d{14}$/, l = /^\d{14}$/;
    var k = /^\d{8,10}$/, i = /^\d{9,10}$/;
    var m = {
        AT: /^U[A-Z]{8}$/,
        BE: /^(1|0?)\d{9}$/,
        BG: i,
        HR: g,
        CY: /^[A-Z0-9]{9}/i,
        CZ: k,
        DK: d,
        EE: n,
        FI: d,
        FR: /^[A-Z0-9]{2}\d{9}$/,
        DE: n,
        EL: n,
        HU: d,
        IE: /^(\d{7}[A-Z]W?|\d{7}[A-Z]{2}|\d[A-Z]\d{5}[A-Z])$/,
        IT: g,
        LV: g,
        LT: /^(\d{9}|\d{12})$/,
        LU: d,
        MT: d,
        NL: /^\d{9}B\d{2}$/,
        PL: /^\d[-]?\d[-]?\d[-]?\d[-]?\d[-]?\d[-]?\d[-]?\d[-]?\d[-]?\d$/,
        PT: n,
        RO: /^\d{2,10}$/,
        SE: /^\d{10}01$/,
        SK: h,
        SI: d,
        ES: /^[A-Z0-9]\d{7}[A-Z0-9]$/,
        GB: /^(\d{3}[ ]?\d{4}[ ]?\d{2}|\d{9}[ ]?\d{3}|GD\d{3}|HA\d{3})$/,
        AL: /[JK][A-Z0-9]{8}[A-Z]$/,
        AU: g,
        BY: n,
        CA: /^[A-Z0-9]{15}$/,
        IN: /^\d{11}[VC]$/,
        NO: /^\d{9}MVA$/,
        PH: e,
        RU: /^(\d{10}|\d{12})$/,
        SM: j,
        RS: n,
        CH: /^(\d{6}|E\d{9}(TVA|MWST|IVA))$/,
        TR: h,
        UA: e,
        AR: g,
        BO: /.*/,
        BR: l,
        CL: /^\d{8}-\d{1}$/,
        CO: h,
        CR: /^\d{9,12}$/,
        EC: b,
        SV: /.*/,
        GT: /^\d{7}-\d{1}$/,
        HN: /.*/,
        MX: /.*/,
        NI: /.*/,
        PA: /.*/,
        PY: /.*/,
        PE: g,
        DO: /.*/,
        UY: /.*/,
        VE: /^[JGVE]-\d{8}-?\d$/
    };

    function c(q, p) {
        q = q || "";
        if (this.optional(p) || q === "EXEMPTED" || q.toLowerCase() === "n/a") {
            return true;
        }
        var o = ((q || "").toUpperCase().match(/^[A-Z]{2}/) || [])[0];
        if (!o && f(p).attr("data-country")) {
            o = f(p).attr("data-country");
            if (m.hasOwnProperty(o)) {
                return m[o].test(q);
            }
        }
        if (!o || !m.hasOwnProperty(o)) {
            return this.optional(p);
        }
        return m[o].test(q.substring(2)) || m[o].test(q.substring(2).replace(/\W/g, ""));
    }

    function a(p, o) {
        p = p || "";
        if (this.optional(o) || p === "EXEMPTED" || p.toLowerCase() === "n/a") {
            return true;
        }
        return p.match(/^\d{2}-?\d{7}$/);
    }

    f.validator.addMethod("vat", c, "Please specify a valid VAT number");
    f.validator.addMethod("ein", a, "Please specify a valid EIN number");
    f.validator.addMethod("vat-or-ein", function (p, o) {
        if ((f(o).attr("data-vat-validation") || "").match(/vat/i)) {
            return c.apply(this, [p, o]);
        }
        if ((f(o).attr("data-vat-validation") || "").match(/ein/i)) {
            return a.apply(this, [p, o]);
        }
        return true;
    }, "Please specify a valid VAT / EIN number");
    return {};
});
define("compat/btoa", [], function () {
    if ("btoa" in window) {
        return;
    }
    var a = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    window.btoa = function (g) {
        var e = "";
        var f, d;
        for (f = 0, d = g.length; f < d; f += 3) {
            var k = g.charCodeAt(f) & 255;
            var j = g.charCodeAt(f + 1) & 255;
            var h = g.charCodeAt(f + 2) & 255;
            var c = k >> 2, b = ((k & 3) << 4) | (j >> 4);
            var m = f + 1 < d ? ((j & 15) << 2) | (h >> 6) : 64;
            var l = f + 2 < d ? (h & 63) : 64;
            e += a.charAt(c) + a.charAt(b) + a.charAt(m) + a.charAt(l);
        }
        return e;
    };
    return window.btoa;
});
define("ui/Conditionals", ["jquery"], function (b) {
    var a = {};
    a.evaluateRule = function (e, d) {
        if (typeof e !== "string") {
            return false;
        }
        if (e.indexOf("&&") > -1) {
            var f = e.split(/\s*&&\s*/g), c = true;
            while (f.length > 0) {
                c = a.evaluateRule(f.shift(), d) && c;
            }
            return c;
        }
        if (e.indexOf(":") < 2) {
            return false;
        }
        var g = [e.substring(0, e.indexOf(":")), e.substring(e.indexOf(":") + 1)];
        if (typeof g[1] !== "string" || g[1] === "") {
            return false;
        }
        if (typeof d === "undefined" || typeof d.find === "undefined") {
            return false;
        }
        switch (g[0]) {
            case"invisible":
            case"hidden":
            case"require":
                return (d.find(g[1]).length === 0);
            case"visible":
            case"present":
            case"exists":
                return (d.find(g[1]).length !== 0);
            default:
                if (window.console && console.warn) {
                    console.warn("Invalid condition type", g[0]);
                }
                return false;
        }
    };
    a.update = function (d, f, e) {
        var c = {$shown: [], $hidden: []};
        e = e || {};
        d.find("[data-condition]").each(function () {
            var h = b(this), k = h.attr("data-condition"), g = false, i = false, j = a.evaluateRule(k, f);
            g = j === true;
            i = j === false;
            if (j) {
                c.$shown.push(h);
            } else {
                c.$hidden.push(h);
            }
            if (typeof e.filter === "function" && !e.filter(h, j)) {
            } else {
                if (g) {
                    h.show();
                } else {
                    if (i) {
                        h.hide();
                    }
                }
            }
        });
        return c;
    };
    return a;
});
define("tutorials/Guide", ["jquery", "ui/Conditionals", "util/Console"], function (d, c, a) {
    function b(h, e) {
        var g = this, f;
        d(window).resize(function () {
            clearInterval(f);
            f = setTimeout(function () {
                g.updateUI(true);
            }, 100);
        });
        this.$tutorial = h = d(h);
        this.$activePage = h.find("doesntexist");
        this.updatePages = function () {
            g.$pages = g.findPages(h.find(".tutorial-content"));
        };
        this.updatePages();
        h.find("a[rel=close]").css({opacity: 0, position: "absolute", right: -2000});
        h.find(".tutorial-content").height(0).css({overflow: "hidden", minHeight: 0}).hide();
        this.setPage(0);
        h.on("click", "a:not(.csr-disabled)", function (i) {
            switch (i.currentTarget.rel) {
                case"next":
                    g.next();
                    break;
                case"previous":
                    g.previous();
                    break;
            }
        });
        h.on("dialogNext,dialogPrevious,dialogPlay,dialogStop", function (i) {
            switch (i.type) {
                case"dialogNext":
                    g.next();
                    break;
                case"dialogPrevious":
                    g.previous();
                    break;
            }
        });
        this.setPage(0);
    }

    b.prototype.findPages = function (f, e) {
        var h = [], g = this;
        if (!e) {
            f.find(".slideshow>li").filter(function (i, j) {
                var k = d(j).attr("data-condition");
                if (k && k.match(":") && g.childDocument && !c.evaluateRule(k, g.childDocument.$body)) {
                    return false;
                }
                return true;
            }).each(function () {
                var i = {node: this, pages: g.findPages(d(this), true)};
                h.push(i);
            });
        } else {
            f.find("li").each(function () {
                if (d(this).find("[data-ref]")) {
                    var i = {node: this, pages: g.findPages(d(this), true)};
                    h.push(i);
                }
            });
        }
        return h;
    };
    b.prototype.setDocument = function (f) {
        if (!f || !f.document || !f.document.TUTORIAL_REF_WINDOW_ID) {
            return false;
        }
        if (!this.childDocumentRef || this.childDocumentRef !== f.document.TUTORIAL_REF_WINDOW_ID) {
            this.childDocument = f;
            this.childDocumentRef = f.document.TUTORIAL_REF_WINDOW_ID;
            try {
                this.updatePages();
                this.updateUI();
            } catch (g) {
                a.warn("[Tutorials/Guide] " + g.message);
            } finally {
                return true;
            }
        }
        return false;
    };
    b.prototype.log = function () {
        a.log("[Tutorials/Guide] ", arguments);
    };
    b.prototype.next = function () {
        if (this.page < this.$pages.length - 1) {
            this.setPage(this.page + 1, 1);
        }
    };
    b.prototype.previous = function () {
        if (this.page > 0) {
            this.setPage(this.page - 1, -1);
        }
    };
    b.prototype.end = function () {
        var f = this, e = this.page;
        require(["util/Analytics"], function (g) {
            g.event("E_GUIDE", {step: e}).then(function () {
                f.$tutorial.find("[rel=close]:visible").click();
                f.$tutorial.find("[data-rel=tutorial-end]:visible").click();
            });
        });
    };
    b.prototype.setPage = function (g, f) {
        if (g < 0) {
            g = 0;
        } else {
            if (g >= this.$pages.length) {
                g = this.$pages.length - 1;
            }
        }
        var e = d(this.$pages[g].node), h = e.attr("data-condition");
        if (h && (f === 1 || f === -1) && this.childDocument) {
            if (!c.evaluateRule(h, this.childDocument.$body)) {
                return this.setPage(g + f, f);
            }
        }
        if (g !== this.page) {
            this.page = g;
            this.updateUI();
            this.$tutorial.find(".tutorial-content").hide();
        }
    };
    b.prototype.getActivePage = function () {
        return this.$activePage;
    };
    b.prototype.updateUI = function (f) {
        var e = this;
        clearTimeout(this.__tUpdateUI);
        this.__tUpdateUI = setTimeout(function () {
            e.__updateUI(f);
        }, 100);
    };
    b.prototype.__updateUI = function (h) {
        var k = this, o = new d.Event("contentShow");
        o.pageNumber = k.page;
        o.total = k.$pages.length;
        this.$pages.each(function (t, s) {
            if (s === k.page) {
                k.$activePage = d(t.node);
                try {
                    k.$activePage.show().trigger(o);
                } catch (u) {
                    a.warn("[Tutorials/Guide] event error: " + u.message, u);
                }
            } else {
                d(t).hide();
            }
        });
        if (this.childDocument && this.childDocument.$body) {
            var j = this.$activePage, f = j.find("*[data-ref]").filter(function (t, v) {
                var w = true, s = d(v), u = s.attr("data-ref");
                s.parents("[data-condition]").each(function () {
                    var x = d(this).attr("data-condition");
                    w = w && c.evaluateRule(x, k.childDocument.$body);
                });
                return w;
            }).attr("data-ref");
            var i = this.childDocument.$body, p = i.find(f).filter(":visible"), e = i.find(".tutorial-hover"), r = p.offset(), q = e.find(".tutorial-hover-content");
            if (q.length === 0) {
                e.append('<div class="tutorial-hover-content"></div>');
                q = e.find(".tutorial-hover-content");
                q.css({minHeight: "200", position: "absolute", top: 0, left: "105%"});
                q.append('<a rel="tutorial-end"  style="float:right;margin:0px 4px;" href="#"><i class="icon-times"></i></a> ');
                q.append('<a rel="dialog-toggle" style="float:right;margin:0px 4px;" href="#"><i class="icon-caret-down"></i></a> ');
                q.append('<div class="tutorial-hover-content-text"></div>');
                q.append('<div class="tutorial-buttons"><br /><a rel="tutorial-previous" class="csr-button csr-submit-button csr-reduce">previous</a> <a rel="tutorial-next" class="csr-button csr-submit-button csr-reduce">next</a></div>');
                q.on("click", "a[rel=tutorial-next]", function (s) {
                    if (!d(s.target).is(".csr-disabled")) {
                        k.next();
                    }
                });
                q.on("click", "a[rel=tutorial-previous]", function (s) {
                    if (!d(s.target).is(".csr-disabled")) {
                        k.previous();
                    }
                });
                q.on("click", "a[rel=tutorial-end]", function (s) {
                    if (!d(s.target).is(".csr-disabled")) {
                        k.end();
                    }
                });
                q.on("click", "a[rel=dialog-toggle]", function (t) {
                    var s = d(t.target).closest("a[rel=dialog-toggle]");
                    if (s.find(".icon-caret-down").length > 0) {
                        s.prepend('<span class="tutorial-closed-message" style="padding-right: 4px">click to continue </span>');
                        q.find(".tutorial-hover-content-text,.tutorial-buttons").slideUp();
                        s.find(".icon-caret-down").removeClass("icon-caret-down").addClass("icon-caret-up");
                    } else {
                        q.find(".tutorial-hover-content-text,.tutorial-buttons").slideDown();
                        q.find(".tutorial-closed-message").remove();
                        s.find(".icon-caret-up").removeClass("icon-caret-up").addClass("icon-caret-down");
                    }
                });
            }
            if (p.length === 0) {
                r = i.find("h1.pagetitle,h1.ca-pagetitle").offset();
                e.addClass("no-highlight");
            } else {
                e.removeClass("no-highlight");
            }
            if (!r) {
                setTimeout(function () {
                    k.updateUI();
                }, 100);
            } else {
                var n = p.width() || 10, g = 700;
                e.addClass("find-me").show().stop(true).animate({
                    left: (r.left || 15) - 7,
                    top: (r.top || 15) - 7,
                    width: n + 7,
                    height: (p.height() || 0) + 7
                }, g).css("overflow", "visible");
                if (p.length === 0) {
                    e.stop(true).animate({
                        left: i.width() / 2,
                        top: r.top + 5 || 10,
                        height: p.height() || 10
                    }, g).css("overflow", "visible");
                    q.stop(true).animate({
                        left: 0,
                        marginLeft: -(q.width() / 2),
                        width: Math.min(400, i.width() / 2)
                    }, g);
                } else {
                    a.log("We got a target");
                    q.width("");
                    if (n > i.width() * 0.5) {
                        q.stop(true).animate({left: "25%", top: 10, marginLeft: 0}, g);
                    } else {
                        if (r.left > i.width() * 0.5) {
                            q.stop(true).animate({left: "-240px", marginLeft: 0}, g);
                        } else {
                            q.stop(true).animate({left: n + 20, marginLeft: 0}, g);
                        }
                    }
                }
                var m = {};
                try {
                    m = frames.controlled && frames.controlled.adyen || m;
                } catch (l) {
                }
                q.find(".tutorial-hover-content-text").html((j.html() || "").replace("ADYEN_CURRENT_ACCOUNT", encodeURIComponent(m.currentAccount || "YOUR COMPANY NAME")));
                c.update(q, i);
                q.find(".tutorial-buttons a").show();
                if (q.find("a[rel=tutorial-next]:visible").length > 1) {
                    q.find(".tutorial-buttons a[rel=tutorial-next]").hide();
                } else {
                    q.find(".tutorial-buttons a[rel=tutorial-next]").show();
                }
                if (q.find("a[rel=tutorial-previous]:visible").length > 1 || o.pageNumber === 0) {
                    q.find(".tutorial-buttons a[rel=tutorial-previous]").hide();
                } else {
                    q.find(".tutorial-buttons a[rel=tutorial-previous]").show();
                }
                if (q.find("a[rel=tutorial-previous].csr-disabled:visible").length > 0 || o.pageNumber === 0) {
                    this.$tutorial.find("a[rel=previous]:visible").addClass("csr-disabled disabled");
                } else {
                    this.$tutorial.find("a[rel=previous]:visible").removeClass("csr-disabled disabled");
                }
                if (q.find("a[rel=tutorial-next].csr-disabled:visible").length > 0) {
                    this.$tutorial.find("a[rel=next]:visible").addClass("csr-disabled disabled");
                } else {
                    this.$tutorial.find("a[rel=next]:visible").removeClass("csr-disabled disabled");
                }
                if (o.pageNumber === 0 && !h) {
                    e.stop(true, true);
                    q.stop(true, true);
                }
                setTimeout(function () {
                    q.parents("body").addClass("hovering").stop().animate({scrollTop: Math.max(0, r.top - 100)}, g - 200);
                }, 200);
            }
        }
    };
    return b;
});
define("service/Mcc", ["jqueryExtended", "util/Ajax"], function (d, b) {
    var a = {};
    var c = false;
    a.get = function () {
        var e = adyen.config = adyen.config || {};
        e.mccServiceUrl = (e.mccServiceUrl || adyen.base + "ca/data/mcc.shtml");
        if (!c) {
            c = new d.Deferred();
            if (adyen.data && adyen.data.mcc) {
                c.resolve(adyen.data.mcc);
            } else {
                if (adyen.config.mccServiceUrl) {
                    b.getJSON(e.mccServiceUrl + "?ignoresaverequest=true").then(function (f) {
                        adyen.data = adyen.data || {};
                        adyen.data.mcc = f;
                        c.resolve(f);
                    }, function (g, f) {
                        c.reject(f);
                    });
                } else {
                    c.reject("MCC Data not available");
                }
            }
        }
        return c.promise();
    };
    return a;
});
define("service/Risk/EcpRates", ["jqueryExtended", "util/Ajax", "util/Number"], function (c, b, d) {
    var a = {
        getEcpRates: function () {
            var e = new c.Deferred();
            b.get(adyen.config.ecpPerTimeInterval).then(function (g) {
                var f = [], l = c(g), m = {
                    items: [],
                    minDate: l.find("category:first").attr("label"),
                    maxDate: l.find("category:last").attr("label"),
                    masterCard: {value: 0, delta: 0, max: 0, items: {}, values: []},
                    visaInternational: {value: 0, delta: 0, items: {}, max: 0, values: []},
                    visaDomestic: {value: 0, delta: 0, items: {}, max: 0, values: []},
                    axis: []
                };
                l.find("dataset[seriesName]").each(function () {
                    var p = "", i = c(this), o = i.attr("seriesName"), n = {};
                    if (o.match(/mastercard/i)) {
                        p = "masterCard";
                    } else {
                        if (o.match(/visa international/i)) {
                            p = "visaInternational";
                        } else {
                            if (o.match(/visa domestic/i)) {
                                p = "visaDomestic";
                            } else {
                                return;
                            }
                        }
                    }
                    i.find("set").each(function () {
                        var s = c(this), r = s.attr("toolText"), u = parseFloat(s.attr("value"), 10), t = r.split(":")[0], q = r.split("(")[1].split(/\s*[\/,]\s*/);
                        u = d.roundToDecimals(u, 2);
                        m[p].chargebacks = parseFloat(q[0].split(" ")[0]);
                        m[p].authorisations = parseFloat(q[1].split(" ")[0]);
                        m[p].items[t] = u;
                        if (u > m[p].max) {
                            m[p].max = u;
                        }
                        if (p === "masterCard") {
                            m.axis.push(t);
                        }
                    });
                });
                l.find("categories category[label]").each(function () {
                    var i = c(this).attr("label"), n = {
                        label: i,
                        masterCard: m.masterCard.items[i] || 0,
                        visaInternational: m.visaInternational.items[i] || 0,
                        visaDomestic: m.visaDomestic.items[i] || 0
                    };
                    f.push(i);
                    m.items.push(n);
                    m.masterCard.values.push(n.masterCard);
                    m.visaInternational.values.push(n.visaInternational);
                    m.visaDomestic.values.push(n.visaDomestic);
                });
                var k = {
                    masterCard: m.masterCard.values.length,
                    visaInternational: m.visaInternational.values.length,
                    visaDomestic: m.visaDomestic.values.length
                }, j;
                for (var h in k) {
                    if (k.hasOwnProperty(h)) {
                        j = m[h];
                        if (k[h] > 0) {
                            j.value = j.values[k[h] - 1];
                            if (k[h] > 1) {
                                j.delta = j.value - j.values[k[h] - 2];
                            }
                            if (j.delta > 0) {
                                j.deltaIncreasing = true;
                            } else {
                                if (j.delta < 0) {
                                    j.deltaDecreasing = true;
                                }
                            }
                        }
                    }
                }
                m.max = Math.max(m.masterCard.max, m.visaInternational.max, m.visaDomestic.max);
                m.chartMax = Math.max(2.5, (m.min === m.max) ? m.min + 0.15 : m.max);
                if (m.masterCard.chargebacks > 100) {
                    if (m.masterCard.value >= 1.5) {
                        m.masterCard.error = "MasterCard may issue fines after MasterCard ECP rate of 1.5%";
                    } else {
                        if (m.masterCard.value >= 1) {
                            m.masterCard.warning = "MasterCard may issue fines after MasterCard ECP rate of 1.5%";
                        }
                    }
                }
                if (m.visaInternational.value >= 2) {
                    m.visaInternational.error = "VISA may issue fines after VISA International ECP rate of 2%";
                } else {
                    if (m.visaInternational.value > 1.5) {
                        m.visaInternational.warning = "VISA may issue fines after VISA International ECP rate of 2%";
                    }
                }
                if (m.visaDomestic.value >= 2) {
                    m.visaDomestic.error = "VISA may issue fines after VISA International ECP rate of 2%";
                } else {
                    if (m.visaDomestic.value > 1.5) {
                        m.visaDomestic.warning = "VISA may issue fines after VISA International ECP rate of 2%";
                    }
                }
                e.resolve(m);
            }, function (j, i, h) {
                e.reject(j, i, h);
            });
            return e.promise();
        }
    };
    return a;
});
define("ui/Form/FileUpload", ["jqueryExtended", "jquery.ui", "jquery.fileupload"], function (a) {
    var d = "ui-form-fileupload-name", c = "ui-form-fileupload-size", i = "ui-form-fileupload-type";

    function j(l) {
        this.name = l.data(d);
        this.size = l.data(c);
        this.type = l.data(i);
    }

    function g(m, l) {
        this.done = m.loaded;
        this.total = m.total;
        this.percentage = Math.round(100 / m.total * m.loaded);
        this.name = l.name;
        this.size = l.size;
        this.type = l.type;
    }

    function h(m, l) {
        this.raw = m;
        this.name = l.name;
        this.size = l.size;
        this.type = l.type;
    }

    function f(m, l) {
        this.raw = m;
        this.name = l.name;
        this.size = l.size;
        this.type = l.type;
        this.responseText = (m.jqXHR || {}).responseText || "";
    }

    function b(m, l) {
        this.raw = m;
        this.name = l.name;
        this.size = l.size;
        this.type = l.type;
    }

    function k(l, m) {
        if (m && m.fallback) {
            m.fallback();
        }
    }

    function e(l, m) {
        m = m || {};
        var o = {}, p = a('<input type="file" class="csr-optional" />').attr("name", m.paramName || "file");
        o.url = m.url || document.location.href;
        o.change = function (r, q) {
            if (q.files[0]) {
                p.data(d, q.files[0].name);
                p.data(c, q.files[0].size);
                p.data(i, q.files[0].type);
            }
        };
        o.drop = function (r, q) {
            if (q.files[0]) {
                p.data(d, q.files[0].name);
                p.data(c, q.files[0].size);
                p.data(i, q.files[0].type);
            }
        };
        o.start = function (r, q) {
            m.start(new h(q, new j(p)));
        };
        o.done = function (r, q) {
            m.success(new f(q, new j(p)));
        };
        o.fail = function (r, q) {
            m.error(new b(q, new j(p)));
        };
        if (typeof m.progress === "function") {
            o.progress = function (r, q) {
                m.progress(new g(q, new j(p)));
            };
        }
        if (typeof m.previewTemplate === "string") {
            p.bind("fileuploadstart", function (r, q) {
                l.append(m.previewTemplate);
            });
        }
        if (typeof m.params === "object" && m.params !== null) {
            o.formData = [];
            for (var n in m.params) {
                if (m.params.hasOwnProperty(n)) {
                    o.formData.push({name: n, value: m.params[n]});
                }
            }
        }
        if (typeof m.url === "string") {
            p.attr("data-url", m.url);
            o.url = m.url;
        }
        if (typeof m.paramName === "string") {
            o.paramName = m.paramName;
        }
        if (typeof m.acceptedFiles === "string") {
            p.attr("accept", m.acceptedFiles);
        }
        o.dropZone = l;
        o.pasteZone = l;
        o.fileInput = p;
        o.progressInterval = 10;
        o.autoUpload = true;
        this.pluginOptions = o;
        this.plugin = p.appendTo(l).fileupload(o);
        if (typeof m.init === "function") {
            m.init(this);
        }
    }

    if (typeof a('<input type="file" />').get(0).files === "undefined") {
        return k;
    }
    return e;
});
define("ui/acronym", ["jquery", "util/Css", "ui/copy-to-clipboard"], function (d, a, c) {
    a.addStyle("acronym, abbr {position: relative;}");
    function b() {
        d("acronym,abbr").not("[data-copy-text]").each(function () {
            d(this).attr("data-copy-text", this.title);
        });
        c.init();
    }

    return {init: b};
});
define("ui/Form/Mcc", ["jqueryExtended", "service/Mcc"], function (c, a) {
    function b(d) {
        var e = d.getNode(), f = this;
        a.get().then(function (g) {
            require(["ui/AutoComplete"], function (h) {
                f.autoComplete = new h({inputElement: e, source: g, minLength: 0});
            });
        });
        d.ready();
    }

    return b;
});
define("config/DCCMarkup", ["jquery", "jquery.ui", "jquery.validate"], function (a) {
    function k(m) {
        a(document).ready(b);
    }

    function b() {
        j(a("#dcc-markup-add-btn"));
        j(a('[id^="dcc-markup-edit-btn"]', "#dcc-markup-table"));
    }

    function j(m) {
        m.click(function (n) {
            n.preventDefault();
            c(a(this).attr("href"));
        });
    }

    function c(m) {
        require(["ui/Dialog"], function (n) {
            var o = n.createDialog(m, true).then(function (p) {
                d(p);
            });
        });
    }

    function d(m) {
        a("div#headcontent").hide();
        a("#calc-btn").hide();
        g();
        l(m);
    }

    function g() {
        var m = a("#currency-exchange-lbl").text() != "";
        if (m) {
            a("#dcc-markup-input").focus();
        } else {
            a("#currency-exchange-list").focus();
        }
    }

    function l(m) {
        a("#dcc-markup-input").keyup(function (n) {
            f(DCC_CALCULATE_PARAMS_URL, "#dcc-markup-edit-form");
        }).keypress(function (n) {
            if (n.keyCode == 13) {
                n.preventDefault();
                return false;
            }
        });
        h(DCC_SAVE_MARKUP_URL, "#save-btn", "#dcc-markup-edit-form", "#error-container", "#dcc-markup-list");
        e(DCC_DELETE_MARKUP_URL, DCC_DELETE_MSG, "#delete-btn", "#dcc-markup-edit-form", "#error-container", "#dcc-markup-list");
        a("#dcc-markup-edit-form").validate({
            onfocusout: false,
            onkeyup: false,
            rules: {"dccMarkup.dccMarkupPoints": {required: true, number: true, range: [0, 99999]}}
        });
    }

    function f(n, m) {
        var o = {
            url: n, data: a(m).serializeArray(), success: function (r) {
                var p = a(r);
                var q = p.find("table.actionMessages").html();
                if (!!q) {
                    a("#shopper-markup-lbl").text("");
                    a("#merchant-revenue-lbl").text("");
                } else {
                    a("#exchange-rate-lbl").text(p.find("#exchange-rate-lbl").text());
                    a("#shopper-markup-lbl").text(p.find("#shopper-markup-lbl").text());
                    a("#merchant-revenue-lbl").text(p.find("#merchant-revenue-lbl").text());
                }
            }
        };
        a.ajax(o);
    }

    function h(q, p, n, o, m) {
        a(p).unbind("click").bind("click", function (s) {
            s.preventDefault();
            if (i()) {
                var r = {
                    url: q, data: a(n).serializeArray(), success: function (v) {
                        var t = a(v);
                        var u = t.find("table.actionMessages").html();
                        if (!!u) {
                            a(o).html(u);
                        } else {
                            a(m).html(t.find(m).html());
                            b();
                            dialog.closeDialog();
                        }
                    }
                };
                a.ajax(r);
            }
        });
    }

    function e(q, r, p, n, o, m) {
        a(p).unbind("click").bind("click", function (t) {
            t.preventDefault();
            if (confirm(r)) {
                var s = {
                    url: q, data: a(n).serializeArray(), success: function (w) {
                        var u = a(w);
                        var v = u.find("table.actionMessages").html();
                        if (!!v) {
                            a(o).html(v);
                        } else {
                            a(m).html(u.find(m).html());
                            b();
                            dialog.closeDialog();
                        }
                    }
                };
                a.ajax(s);
            }
        });
    }

    function i() {
        if (!a("#dcc-markup-edit-form").valid()) {
            return false;
        }
        return true;
    }

    return {init: k};
});
define("ui/Form/Placeholder", ["jquery"], function (d) {
    var b = "[placeholder]";
    var a = (function () {
        return "placeholder" in document.createElement("input");
    }());

    function c(e) {
        d(document).ready(function () {
            require(["jquery.placeholder"], function () {
                if (typeof e === "undefined") {
                    e = d(document);
                }
                e.find(b).not("[type=password],.ui-form-placeholder-bound").addClass("ui-form-placeholder-bound").placeholder();
            });
        });
    }

    return {
        init: a ? function () {
        } : c
    };
});
define("util/Loaders", ["jquery", "Constants", "util/Console"], function (c, b, a) {
    var d = {};
    d.lazyMethod = function (g, h, e, f) {
        g[h] = function () {
            var i = arguments;
            require(f, function () {
                g[h] = e;
                g[h].apply(g, i);
            });
        };
    };
    d.lazyJQueryPlugin = function (f, e) {
        c.fn[f] = c.fn[f] || function () {
                var h = arguments;
                var g = this;
                if (this.length > 0) {
                    require(e, function () {
                        c.fn[f].apply(g, h);
                    });
                }
                return this;
            };
    };
    c.fn.lazyPlugin = function (f, e) {
        if (typeof c.fn[f] === "undefined") {
            d.lazyJQueryPlugin(f, e);
            return c(this);
        }
        return this;
    };
    d.lazyEnrichment = function (e, g) {
        var f = function () {
            if (c(e).length > 0) {
                require([g], function (h) {
                    if (h && typeof h.init === "function") {
                        try {
                            h.init();
                        } catch (i) {
                            a.warn("Error initializing " + g + ": " + i.message);
                            throw i;
                        }
                    } else {
                        a.warn("Unable to initialize plugin " + g, h);
                    }
                }, function (h) {
                    a.log("Error loading plugin '" + g + "' " + h);
                });
            }
        };
        c(document).ready(f).on("csr:contentMerged " + b.EV_CONTENT_MERGED, f);
    };
    return d;
});
define("ui/Form/Help", ["jquery"], function (g) {
    var b = g("<div></div>"), f = b, e = "display", c = "sidebar";

    function a(k) {
        if (k.text() === "") {
            return;
        }
        var j = k.closest("[data-help-placeholder]"), i;
        if (j.length === 1) {
            i = j.find(j.attr("data-help-placeholder"));
            i.html(k.html()).show();
            k.hide();
        } else {
            k.show();
        }
    }

    function h(k) {
        var j = k.closest("[data-help-placeholder]"), i;
        if (j.length === 1) {
            i = j.find(j.attr("data-help-placeholder"));
            i.html("");
            k.hide();
        } else {
            k.hide();
        }
    }

    function d() {
        g(document).ready(function () {
            g(".csr-form-help").not(".csr-form-help-bound").addClass(".csr-form-help-bound").each(function () {
                var i = g(this);
                i.prepend('<i class="icon-caret-left"></i>');
                i.closest(".csr-form-row,.csr-form-help-container").mouseover(function () {
                    if (i.text() !== "") {
                        h(f);
                        a(i);
                    }
                }).mouseout(function () {
                    h(i);
                    a(f);
                }).find("input,textarea,select").focus(function () {
                    h(f);
                    a(i);
                    f = i;
                }).blur(function () {
                    h(f);
                    f = b;
                });
            });
        });
    }

    return {init: d};
});
define("ui/Dropdown", ["jqueryExtended", "ui/Collapse"], function (c, d) {
    function a(h) {
        var f = c(h), e = f.findOne(".csr-navigation"), g = e.findOne(".csr-selected");
        var j = e.hide().getOrGenerateId();
        f.attr("data-collapse", "#" + j + "?style=dropdown");
        f.append('<div class="csr-selected-value"></div>');
        if (g.length === 0) {
            g = e.findOne("li");
        }
        f.find(".csr-selected-value").text(g.text());
        var i = function () {
            var k = e.width();
            f.width(k);
            if (k === 0) {
                setTimeout(i, 300);
            }
        };
        i();
        d.createCollapse(f);
        f.on("click", "a", function (k) {
            f.find(".csr-selected").removeClass("csr-selected");
            g = c(k.target).closest("li").addClass("csr-selected");
            f.find(".csr-selected-value").text(g.text());
        });
    }

    function b() {
        c(document).ready(function () {
            c("[data-dropdown]").not(".csr-dropdown-initialized").addClass("csr-dropdown-initialized").each(function () {
                a(this);
            });
        });
        c(document.body).click(function (e) {
            if (e.isDefaultPrevented()) {
                return;
            }
            c(".csr-dropdown-initialized").each(function () {
                d.close(this);
            });
        });
    }

    return {init: b, createDropdown: a};
});
define("ui/CustomSelect", ["jqueryExtended", "ui/Collapse", "ui/Dropdown", "util/Collection"], function (c, e, a, b) {
    var d = c.extend(a, {
        init: function () {
            var g = "[data-custom-select]", f = this;
            c(document).ready(function () {
                c(g).not(".csr-custom-select-initialized").addClass("csr-custom-select-initialized").each(function () {
                    f.createCustomSelect(this);
                });
            });
        }, createCustomSelect: function (i, h) {
            var f = this, g = c(i), j = typeof h !== "undefined" ? new b(h.data) : new b(g.data("custom-select-values"));
            c(j.toArray()).each(function (k) {
                f.addOption(g, j, k);
            });
            this.initEventHandlers(g, j);
            this.createDropdown(i);
            g.click(function (k) {
                g.css("z-index", 1000);
            });
            c(document.body).click(function (k) {
                if (k.isDefaultPrevented()) {
                    return;
                }
                e.close(g);
            });
            return {view: i, data: j};
        }, initEventHandlers: function (g, h) {
            var f = this;
            c(h).on(b.ADD, function (i) {
                f.addOption(g, h, i.location);
            });
            c(h).on(b.REMOVE, function (i) {
                f.removeOption(g, h, i.items[0]);
            });
            c(h).on(b.UPDATE, function (i) {
                f.updateOption(g, h, i.items[0]);
            });
        }, addOption: function (k, l, h) {
            var g = c(k), j = l.getItemAt(h), f = g.findOne(".csr-navigation");
            var i = c("<li>").attr("data-option-value", j.value).text(j.label);
            f.append(i);
            g.width(f.width());
            c(i).click(function (m) {
                g.find(".csr-selected-value").text(j.label);
                g.trigger({type: "change", value: j.value, label: j.label});
            });
        }, removeOption: function (i, k, h) {
            var g = c(i), f = g.findOne(".csr-navigation");
            var j = f.find("[data-option-value='" + h.value + "']");
            c(j).remove();
            g.find(".csr-selected-value").text(k.size() > 0 ? k.getItemAt(0).label : "");
        }, updateOption: function (g, h, f) {
        }
    });
    return d;
});
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
define("util/Functional", ["underscore"], function (m) {
    function g(r) {
        return r != null;
    }

    function n(r) {
        return (r !== false) && g(r);
    }

    function a(r) {
        if (!n(r)) {
            return true;
        }
        if (m.isNumber(r)) {
            if (r === 0 || isNaN(r)) {
                return true;
            }
        }
        if ((m.isArray(r) || m.isString(r)) && r.length === 0) {
            return true;
        }
        if (m.isObject(r) && m.keys(r).length === 0) {
            return true;
        }
        return false;
    }

    function l(r) {
        return !a(r);
    }

    function q(t) {
        var s = m.rest(arguments);
        var r = t.apply(null, s);
        if (r) {
            return function (u, v) {
                setTimeout(u, v);
            };
        }
        return function (u) {
            u.apply(null);
        };
    }

    function h(r) {
        var s = m.rest(arguments);
        return function () {
            var t = m.map(arguments, function (v, u) {
                return g(v) ? v : s[u];
            });
            return r.apply(null, t);
        };
    }

    function d(r) {
        return function (u, s) {
            var t = h(m.identity, r[s]);
            return u && t(u[s]);
        };
    }

    function p(r) {
        var s = m.rest(arguments);
        return function () {
            var t = m.map(arguments, function (v, u) {
                return a(v) ? s[u] : v;
            });
            return r.apply(null, t);
        };
    }

    function o(r) {
        return function (u, s) {
            var t = p(m.identity, r[s]);
            return u && t(u[s]);
        };
    }

    function e(u, t, w, x) {
        var s = {};
        s[w] = t;
        var v = o(s);
        var r = v(u, w);
        if (x) {
            u[w] = r;
        }
        return r;
    }

    function c() {
        var r = m.toArray(arguments);
        return function (s) {
            return m.reduce(r, function (u, t) {
                if (t(s)) {
                    return u;
                }
                return m.chain(u).push(t.message).value();
            }, []);
        };
    }

    function b(s, r) {
        var t = function () {
            return r.apply(r, arguments);
        };
        t.message = s;
        return t;
    }

    function f() {
        var r = m.toArray(arguments);
        var s = function (t) {
            return m.every(r, function (u) {
                return m.has(t, u);
            });
        };
        s.message = j(["Must have values for keys:"], r).join(" ");
        return s;
    }

    function i() {
        var r = m.toArray(arguments);
        var s = function (t) {
            return m.every(r, function (u) {
                var v = m.has(t, u);
                if (v && n(t[u])) {
                    if (typeof t[u] === "string" && t[u].length === 0) {
                        return false;
                    }
                    return true;
                }
                return false;
            });
        };
        s.message = j(["Must have values for keys:"], r).join(" ");
        return s;
    }

    function j() {
        var r = m.first(arguments);
        if (g(r)) {
            return r.concat.apply(r, m.rest(arguments));
        }
        return [];
    }

    function k(r) {
        return m.isObject(r);
    }

    return {
        existy: g,
        truthy: n,
        falsy: a,
        notFalsy: l,
        conditionalTimeout: q,
        cat: j,
        fnull: h,
        fnull2: p,
        defaults: d,
        defaults2: o,
        getValueOrDefault: e,
        checker: c,
        validator: b,
        hasKeys: f,
        hasKeysWithTruthyValues: i,
        aMap: k
    };
});
define("ui/Form/Validate/3rdPartyValidators", ["jquery", "jquery.validate"], function (a) {
    a.validator.addMethod("iban", function (q, l) {
        if (this.optional(l)) {
            return true;
        }
        var g = q.replace(/ /g, "").toUpperCase(), h = "", m = true, s = "", r = "", d, f, e, o, n, b, k, j, c;
        if (!(/^([a-zA-Z0-9]{4} ){2,8}[a-zA-Z0-9]{1,4}|[a-zA-Z0-9]{12,34}$/.test(g))) {
            return false;
        }
        d = g.substring(0, 2);
        b = {
            AL: "\\d{8}[\\dA-Z]{16}",
            AD: "\\d{8}[\\dA-Z]{12}",
            AT: "\\d{16}",
            AZ: "[\\dA-Z]{4}\\d{20}",
            BE: "\\d{12}",
            BH: "[A-Z]{4}[\\dA-Z]{14}",
            BA: "\\d{16}",
            BR: "\\d{23}[A-Z][\\dA-Z]",
            BG: "[A-Z]{4}\\d{6}[\\dA-Z]{8}",
            CR: "\\d{17}",
            HR: "\\d{17}",
            CY: "\\d{8}[\\dA-Z]{16}",
            CZ: "\\d{20}",
            DK: "\\d{14}",
            DO: "[A-Z]{4}\\d{20}",
            EE: "\\d{16}",
            FO: "\\d{14}",
            FI: "\\d{14}",
            FR: "\\d{10}[\\dA-Z]{11}\\d{2}",
            GE: "[\\dA-Z]{2}\\d{16}",
            DE: "\\d{18}",
            GI: "[A-Z]{4}[\\dA-Z]{15}",
            GR: "\\d{7}[\\dA-Z]{16}",
            GL: "\\d{14}",
            GT: "[\\dA-Z]{4}[\\dA-Z]{20}",
            HU: "\\d{24}",
            IS: "\\d{22}",
            IE: "[\\dA-Z]{4}\\d{14}",
            IL: "\\d{19}",
            IT: "[A-Z]\\d{10}[\\dA-Z]{12}",
            KZ: "\\d{3}[\\dA-Z]{13}",
            KW: "[A-Z]{4}[\\dA-Z]{22}",
            LV: "[A-Z]{4}[\\dA-Z]{13}",
            LB: "\\d{4}[\\dA-Z]{20}",
            LI: "\\d{5}[\\dA-Z]{12}",
            LT: "\\d{16}",
            LU: "\\d{3}[\\dA-Z]{13}",
            MK: "\\d{3}[\\dA-Z]{10}\\d{2}",
            MT: "[A-Z]{4}\\d{5}[\\dA-Z]{18}",
            MR: "\\d{23}",
            MU: "[A-Z]{4}\\d{19}[A-Z]{3}",
            MC: "\\d{10}[\\dA-Z]{11}\\d{2}",
            MD: "[\\dA-Z]{2}\\d{18}",
            ME: "\\d{18}",
            NL: "[A-Z]{4}\\d{10}",
            NO: "\\d{11}",
            PK: "[\\dA-Z]{4}\\d{16}",
            PS: "[\\dA-Z]{4}\\d{21}",
            PL: "\\d{24}",
            PT: "\\d{21}",
            RO: "[A-Z]{4}[\\dA-Z]{16}",
            SM: "[A-Z]\\d{10}[\\dA-Z]{12}",
            SA: "\\d{2}[\\dA-Z]{18}",
            RS: "\\d{18}",
            SK: "\\d{20}",
            SI: "\\d{15}",
            ES: "\\d{20}",
            SE: "\\d{20}",
            CH: "\\d{5}[\\dA-Z]{12}",
            TN: "\\d{20}",
            TR: "\\d{5}[\\dA-Z]{17}",
            AE: "\\d{3}\\d{16}",
            GB: "[A-Z]{4}\\d{14}",
            VG: "[\\dA-Z]{4}\\d{16}"
        };
        n = b[d];
        if (typeof n !== "undefined") {
            k = new RegExp("^[A-Z]{2}\\d{2}" + n + "$", "");
            if (!(k.test(g))) {
                return false;
            }
        }
        f = g.substring(4, g.length) + g.substring(0, 4);
        for (j = 0; j < f.length; j++) {
            e = f.charAt(j);
            if (e !== "0") {
                m = false;
            }
            if (!m) {
                h += "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ".indexOf(e);
            }
        }
        for (c = 0;
             c < h.length; c++) {
            o = h.charAt(c);
            r = "" + s + "" + o;
            s = r % 97;
        }
        return s === 1;
    }, "Please specify a valid IBAN");
    a.validator.addMethod("bic", function (c, b) {
        return this.optional(b) || /^([A-Z]{6}[A-Z2-9][A-NP-Z1-9])(X{3}|[A-WY-Z0-9][A-Z0-9]{2})?$/.test(c);
    }, "Please specify a valid BIC code");
    return {};
});
define("util/Namespace", ["jquery"], function (d) {
    var c = {};
    c.defineNamespace = function (b, j) {
        if (typeof j == "undefined") {
            j = {};
        }
        if (b.indexOf(".") < 0) {
            typeof window[b] == "undefined" && (window[b] = j);
            return window[b];
        }
        var i = b.substr(0, b.lastIndexOf(".")), h = b.substr(b.lastIndexOf(".") + 1), g = c.defineNamespace(i, {});
        if (typeof g[h] === "undefined") {
            g[h] = j;
        }
        return g[h];
    };
    c.setDefaults = function (b, l) {
        if (typeof l == "string") {
            var k = b.substring(b.lastIndexOf(".") + 1), j = l;
            b = b.substring(0, b.lastIndexOf("."));
            l = {};
            l[k] = j;
        }
        var i = c.defineNamespace(b);
        for (var h in l) {
            typeof l[h] != "object" ? typeof i[h] == "undefined" && (i[h] = l[h]) : c.setDefaults(b + "." + h, l[h]);
        }
        return i;
    };
    c.getDefaults = function (b, j) {
        if (typeof b != "string") {
            return j;
        }
        if (b.indexOf(".") < 0) {
            return window[b] || j;
        }
        var i = b.substring(0, b.lastIndexOf(".")), h = b.substring(b.lastIndexOf(".") + 1), g = c.defineNamespace(i, {});
        return typeof g == "object" ? g[h] : j;
    };
    c.defineClass = function (b, l, k) {
        var j = k || function () {
            }, i, h = c.defineNamespace(b, j);
        h.getClass = function () {
            return b;
        };
        if (typeof l != "undefined") {
            typeof l == "function" && (l = l());
            for (i in l) {
                h.prototype[i] = l[i];
            }
        }
        return h;
    };
    c.extend = function (b, j, i) {
        typeof b == "string" && (b = c.defineClass(b)), typeof j == "string" && (j = c.defineClass(j));
        if (!j || !b) {
            throw new Error("Extend failed, please check that all dependencies are included.");
        }
        var h, g = function () {
        };
        g.prototype = j.prototype, b.prototype = new g;
        if (i) {
            for (h in i) {
                b.prototype[h] = i[h];
            }
        }
        return b;
    };
    c.defineSubClass = function (b, l, k, j) {
        typeof l == "string" && (l = c.defineClass(l));
        if (typeof j != "function") {
            var i = l.prototype.constructor;
            j = function () {
                i.apply(this, arguments);
            };
        }
        var h = c.defineClass(b, null, j);
        return c.extend(h, l, k);
    };
    c.getConfig = function (n, m) {
        function a() {
            typeof m != "undefined" ? (c.setDefaults(n, m), l.resolve(m)) : l.reject(n + " is undefined");
        }

        var l = new d.Deferred;
        if (typeof n != "string") {
            typeof m != "undefined" ? l.resolve(m) : l.reject("getConfig(String) expected, but called as getConfig(" + typeof n + ")");
            return l.promise();
        }
        if (n.indexOf(".") < 0) {
            typeof window[n] != "undefined" ? l.resolve(window[n]) : typeof m != "undefined" ? (window[n] = m, l.resolve(m)) : l.reject(n + " is undefined");
            return l.promise();
        }
        var k = n.substring(0, n.lastIndexOf(".")), j = n.substring(n.lastIndexOf(".") + 1), b = c.getConfig(k);
        b.fail(a), b.done(function (e) {
            typeof e != "object" && e !== null ? l.reject(n + " is null") : typeof e[j] == "undefined" ? a() : typeof e[j] == "string" && e[j].match(/[\/\-]config\.js$/) ? require(["core/ajax", "util/link-resolver"], function (g, r) {
                var q = e[j], p = r.resolve(q, require.toUrl("../stub.js"), document.location.href), o = setTimeout(function () {
                    l.isResolved() || (typeof m != "undefined" ? (ns.setDefaults(n, m), l.resolve(m)) : l.reject("Timeout on " + p));
                }, 3000);
                require([p], function (f) {
                    e[j] = f, clearTimeout(o), l.resolve(f);
                });
            }) : l.resolve(e[j]);
        });
        return l.promise();
    };
    d.fn.ady = function (j, i) {
        var h = c.defineNamespace("ady.ext"), b = c.defineNamespace("ady.ext._registeredMethods"), a;
        if (typeof j != "undefined") {
            b[j] = i || h[j], d.ady = d.ady || {}, d.ady[j] = d.ady[j] || function () {
                    var g = arguments[0], m = [], l = d(g).ady(), k;
                    for (k = 1; k < arguments.length; k++) {
                        m.push(arguments[k]);
                    }
                    l[j].apply(l, m);
                };
            return this.ady();
        }
        for (a in b) {
            this[a] = b[a];
        }
        return this;
    };
    return c;
});
define("examples/xmasButton", ["jquery"], function (b) {
    function a(c) {
        var d = this.$node = c.getNode();
        this.clicks = 0;
        this.turnToGreen();
        var e = this;
        d.click(function () {
            e.handleClick();
        });
        c.ready();
    }

    a.prototype.handleClick = function () {
        this.clicks++;
        if (this.clicks % 2 == 0) {
            this.turnToGreen();
        } else {
            this.turnToRed();
        }
    };
    a.prototype.turnToGreen = function () {
        this.$node.css("color", "green");
    };
    a.prototype.turnToRed = function () {
        this.$node.css("color", "red");
    };
    return a;
});
define('ui/Table/ColumnResize-css', function () {
    return '.resizable{position:relative}.resizer{bottom:0;color:#024d63;cursor:col-resize;display:none!important;font-size:10px;height:100%;position:absolute;right:0;width:10px}\n.resizer .icon-resize{bottom:2px;line-height:1;position:absolute;right:2px}.resizable:hover .resizer,.is-resizing .resizer{display:block!important}\n.resizable:hover,.is-resizing.is-resizing{background:#dcdcdc}.is-resizing{border-right:1px solid #024d63}';
});
define("ui/Table/ColumnResize", ["jquery", "util/UserPreferences", "ui/Table/ColumnResize-css", "util/Css"], function (e, d, c, b) {
    function a(f) {
        this.$node = f.getNode();
        this.init();
        b.addStyle(c);
        f.ready();
    }

    a.prototype.init = function () {
        var g = this.$node;
        var j = "column-width-" + g.text().trim();
        var m, o, l, k = false;
        var n = '<div class="stretcher"></div>';
        var h = e(n).appendTo(g);
        var i = '<div class="resizer"><i class="icon-resize"></i></div>';
        var f = e(i).appendTo(g);
        var p = function (q) {
            if (q > 10) {
                l = q;
                g.attr("width", q);
                h.width(q);
            }
        };
        g.addClass("resizable");
        e(window).ready(function () {
            p(d.getPreference(j) || g.width());
        });
        f.mousedown(function (q) {
            q.preventDefault();
            g.addClass("is-resizing");
            k = true;
            m = q.pageX;
            o = g.width();
        });
        e(document).mousemove(function (q) {
            if (k) {
                p(o + (q.pageX - m));
            }
        });
        e(document).mouseup(function () {
            k = false;
            if (l) {
                d.setPreference(j, l);
            }
            g.removeClass("is-resizing");
        });
    };
    return a;
});
define("ui/Form/Validate/SimpleValidators", ["jquery", "jquery.validate"], function (b) {
    adyen.config = adyen.config || {};
    b.validator.addMethod("country-code", function (e, d) {
        if (this.optional(d)) {
            return true;
        }
        return (e || "").match(/^[A-Z]{1,2}$/);
    }, "Please specify a valid country code");
    b.validator.addMethod("percentage", function (e, d) {
        if (this.optional(d)) {
            return true;
        }
        if (!e.match(/^[0-9]+(\.[0-9]+)?$/)) {
            return false;
        }
        var f = parseFloat(e, 10);
        return !isNaN(f) && f >= 0 && f <= 100;
    }, "Please specify a valid percentage");
    b.validator.addMethod("percentagegroup", function (k, g) {
        var m = b(g).attr("data-validation-percentagegroup");
        var j = 0, n = [], h = [];
        var e = b(g.form).find("[data-validation-percentagegroup=" + m + "]");
        e.each(function () {
            var o = parseFloat(this.value, 10);
            if (!isNaN(o)) {
                j += o;
            }
        });
        var l = b(g.form).find("[data-validation-message=" + m + "]");
        var d = l.find("[data-validation-value=currentTotal]").text(j).val(j);
        var i = "csr-fcolor-green";
        var f = "csr-fcolor-red";
        if (j === 100) {
            l.removeClass("csr-invalid").addClass("csr-valid");
            d.removeClass(f).addClass(i);
        } else {
            l.removeClass("csr-valid").addClass("csr-invalid");
            d.removeClass(i).addClass(f);
        }
        return true;
    }, "Please make sure the percentages add up to 100%");
    b.validator.addMethod("currency-code", function (e, d) {
        if (this.optional(d)) {
            return true;
        }
        return (e || "").match(/^[A-Z]{2,3}$/);
    }, "Please specify a valid currency code");
    b.validator.addMethod("no-html", function (e, d) {
        if (this.optional(d)) {
            return true;
        }
        return !(e || "").match(/[<>]/);
    }, "Please do not use < or >");
    b.validator.addMethod("enum", function (g, e) {
        var d = b(e), h = d.attr("data-validation-enum").split(/\s*,\s*/), f = new RegExp("^(" + h.join("|") + ")\\s*(,\\s*(" + h.join("|") + ")\\s*)*$");
        if ((g || "").match(/^\s*$/)) {
            return this.optional(e);
        }
        return f.test(g);
    }, "Please provide a comma separated list of options from the list.");
    b.validator.addMethod("phonenumber", function (e, d) {
        if ((e || "").match(/^\s*$/)) {
            return this.optional(d);
        }
        return (e || "").match(/^[\+-.() \d]+$/);
    }, "Please provide a valid phone number");
    function a(d) {
        return typeof d !== "undefined" && d !== null && d !== "";
    }

    function c(i) {
        var g = i.split(/\D+/).filter(a);
        if (g.length !== 3) {
            return "Invalid";
        }
        var j = parseInt(g[0], 10), e = parseInt(g[1], 10), h = parseInt(g[2], 10);
        if (e < 1 || e > 12) {
            return "Invalid";
        }
        if (h < 1 || h > 31) {
            return "Invalid";
        }
        var f = new Date();
        f.setFullYear(j);
        f.setMonth(e);
        f.setDate(h);
        return f;
    }

    b.validator.addMethod("year", function (e, d) {
        if ((e || "").match(/^\s*$/)) {
            return this.optional(d);
        }
        if (isNaN(parseInt(e, 10)) || e.length !== 4) {
            return false;
        }
        return (e || "").match(/^(19|20|21)\d{2}$/);
    }, "Please provide a valid year");
    b.validator.addMethod("monthyear", function (e, d) {
        if ((e || "").match(/^\s*$/)) {
            return this.optional(d);
        }
        var f = e.split("/");
        if (f.length !== 2 || f[0].length !== 2 || isNaN(parseInt(f[0], 10)) || f[1].length !== 4 || isNaN(parseInt(f[1], 10))) {
            return false;
        }
        return (e || "").match(/^(0[1-9]|1[012])\/(19|20|21)\d{2}$/);
    }, "Please provide a valid month and year (mm/yyyy)");
    b.validator.addMethod("ddmmyyyy", function (e, d) {
        if ((e || "").match(/^\s*$/)) {
            return this.optional(d);
        }
        var f = e.split("-");
        if (f.length !== 3 || f[0].length !== 2 || isNaN(parseInt(f[0], 10)) || f[1].length !== 2 || isNaN(parseInt(f[1], 10)) || f[2].length !== 4 || isNaN(parseInt(f[2], 10))) {
            return false;
        }
        return (e || "").match(/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[012])-(19|20|21)\d{2}$/);
    }, "Please provide a valid date (dd-mm-yyyy)");
    b.validator.addMethod("dateTime", function (h, f) {
        var e = h.split(" "), g = e[0].split("-"), j = [g[2], g[1], g[0]].join("-"), d = !/Invalid|NaN/.test(new Date(j).toString()), i = /^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$/i.test(e[1]);
        return this.optional(f) || (d && i);
    }, "Please enter a valid date and time ( 2001-01-01 10:10 )");
    b.validator.addMethod("dateTimeOriginal", function (g, f) {
        var e = g.split(" "), d = !/Invalid|NaN/.test(c(e[0])), h = /^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$/i.test(e[1]);
        return this.optional(f) || (d && h);
    }, "Please enter a valid date and time ( 2001-01-01 10:10 )");
    b.validator.addMethod("dateTimeOriginalRange", function (r, m) {
        var f = this;
        var h = {}, q = b(m).attr("data-range-config").split("&");
        while (q.length > 0) {
            var t = q.shift().split("="), g = t.shift(), i = t.join("=");
            h[g] = i;
        }
        if (typeof h.after === "string") {
            if (h.after === m.name) {
                throw new Error("Error in dateTimeOriginalRange configuration. Cannot configure date picker to point to itself");
            }
            var s = parseInt(h.limit || "7", 10);
            if (s < 1) {
                s = 1;
            }
            var j = b(m.form.elements[h.after]).val() || "";
            var n = r || "";
            var p = c(j.split(" ")[0]);
            var e = c(n.split(" ")[0]);
            if (/Invalid|NaN/.test(p) || /Invalid|NaN/.test(e)) {
                return false;
            }
            var d = Math.round((e.getTime() - p.getTime()) / (1000 * 60));
            var k = 0;
            var o = h.granularity || "days";
            switch (o) {
                case"weeks":
                    k = Math.round(d / (7 * 24 * 60));
                    break;
                case"days":
                    k = Math.round(d / (24 * 60));
                    break;
                default:
                    throw new Error("Granularity '" + h.granularity + "' is not supported.");
            }
            var l = k <= s;
            if (k < 0) {
                f.settings.messages[m.name] = "Please make sure the the start of the range is before the end of your range.";
                return false;
            } else {
                if (k > s) {
                    f.settings.messages[m.name] = "Please do not exceed " + s + " " + o + " ( the specified range is " + k + " " + o + ").";
                    return false;
                }
            }
            return true;
        } else {
            if (typeof h.before === "string") {
                if (h.before === m.name) {
                    throw new Error("Error in dateTimeOriginalRange configuration. Cannot configure date picker to point to itself");
                }
                b(m.form.elements[h.before]).valid();
                return true;
            }
        }
        return this.optional(m) || true;
    }, "Please provide a valid date and time within the specified range");
    b.validator.addMethod("accountcode", function (e, d) {
        if ((e || "").match(/^\s*$/)) {
            return this.optional(d);
        }
        return (e || "").match(/^[A-Z0-9][\w-]{5,39}$/);
    }, "Please provide a valid account code (between 6 and 40 alphanumeric characters, starting with an uppercase character or digit, no whitespaces)");
    b.validator.addMethod("mcc", function (e, d) {
        if ((e || "").match(/^\s*$/)) {
            return this.optional(d);
        }
        return (e || "").match(/^\d{4}$/);
    }, "Please provide a valid merchant category code (4 digits), no whitespaces)");
    return {};
});
define("ui/Form/Validate", ["jquery", "util/Console", "jquery.validate", "ui/Form/Validate/3rdPartyValidators", "ui/Form/Validate/SimpleValidators", "ui/Form/Validate/VATValidator"], function (d, a) {
    var b = d.validator;

    function c() {
        d(document).ready(function () {
            d("form[data-validate]").each(function () {
                var e = d(this), f = {};
                e.find("[data-validation]").each(function () {
                    var h = d(this), i = h.attr("name"), g = h.attr("data-validation").split(/\s*,\s*/g), j;
                    f[i] = f[i] || {};
                    while (g.length > 0) {
                        j = g.shift();
                        if (j.match(/^\w+(-\w+)*$/)) {
                            if (b.methods && !b.methods.hasOwnProperty(j)) {
                                a.warn("[ui/Form/Validate] Found a reference to an invalid validation method '" + j + "'");
                            } else {
                                f[i][j] = true;
                            }
                        }
                    }
                });
                e.validate({
                    errorClass: "csr-invalid-field",
                    validClass: "csr-valid-field",
                    wrapper: "div",
                    rules: f,
                    errorPlacement: function (g, h) {
                        g.addClass("csr-invalid-field-wrapper");
                        g.appendTo(h.closest(".csr-form-row, .csr-form-help-container, .csr-validation-message, .csr-form-row-2, .csr3-formrow"));
                        g.prepend('<i class="icon-caret-left"></i>');
                        g.prepend('<i class="icon-exclamation-triangle"></i>');
                    }
                });
                e.valid();
                e.find(".csr-invalid-field").removeClass("csr-invalid-field");
                e.find(".csr-invalid-field-wrapper").remove();
                e.find(".csr-server-error[data-error]").each(function () {
                    var g = d(this), h = {};
                    h[g.attr("name")] = g.attr("data-error");
                    e.validate().showErrors(h);
                });
            });
        });
    }

    return {init: c};
});
define("ui/Form/Progress", ["jqueryExtended", "Constants", "util/Console"], function (a, b, e) {
    var g = e.getLog("ui/Form/Progress"), i = {__count: 0}, h = "UI_FORM_PROGRESS";

    function f(k, l) {
        var j = [];
        k.find("input,textarea,select").not(".csr-button").each(function () {
            var r = a(this), n = r.attr("name") || "", s = (this.type === "checkbox" || this.type === "radio" ? (r.is(":checked") ? r.val() : "") : r.val()), t = this.is, p = this.className || "";
            var q = n + (t ? "#" + t : "") + (p ? "." + p : "") + "?value=" + encodeURIComponent(s);
            for (var o = 0; o < l.length; o++) {
                var m = r.attr(l[o]);
                if (m) {
                    q += "&" + encodeURIComponent(l[o]) + "=" + encodeURIComponent(r.attr(m));
                }
            }
            if (this.name || this.id) {
                j.push(q);
            }
        });
        return j.join("\n");
    }

    function c(p) {
        var l = p.attr("data-progress"), m = l.split("?")[0], k = a(m);
        if (k.length === 0) {
            return;
        }
        if (typeof i[l] === "undefined") {
            i[l] = "ui-form-progress-monitor-" + i.__count++;
        }
        p.addClass(i[l]);
        p = a("." + i[l]);
        var q = i[l].split("-").pop();
        var o = "change.ui-form-progress-" + q, j = b.getNamespaced(b.EV_CONTENT_SHOW_HIDE, "ui-form-progress-" + q), r = b.getNamespaced(b.EV_STATE_CHANGE, "ui-form-progress-" + q);
        var n = function (y, z) {
            if (z === h) {
                return;
            }
            var x = "__cache__" + l, s = "__cache2__" + l, t = f(k, ["data-validation"]);
            if (t === i[x]) {
                return;
            }
            i[x] = t;
            var w = 0, u = 0, v = [];
            k.find("input,textarea").not(".csr-button").each(function () {
                var B = !a(this).is(".csr-optional") && (a(this).is(".csr-required") || a(this).closest(".csr-required").length > 0 || a(this).is('[data-validation*="required"]'));
                if (a(this).attr("readonly")) {
                    B = false;
                }
                a(this).removeClass("required optional").addClass(B ? "required" : "optional");
                if (B) {
                    w++;
                    if (this.type === "checkbox") {
                        if (this.checked) {
                            u++;
                        } else {
                            v.push(this.name);
                        }
                    } else {
                        if (this.value !== "") {
                            u++;
                        } else {
                            v.push(this.name);
                        }
                    }
                }
            });
            k.find("select").each(function () {
                var B = a(this).is(".csr-required,.required");
                if (B) {
                    w++;
                    if (this.value !== "") {
                        u++;
                    } else {
                        v.push(this.name);
                    }
                }
            });
            var A;
            if (w === u) {
                A = "100%";
                p.removeClass("csr-incomplete").addClass("csr-complete");
                if (l.match(/\?.*broadcast=true/i)) {
                    p.filter(".csr-when-incomplete").hideWithEvent(b.EV_CONTENT_HIDE, h);
                    p.filter(".csr-when-complete").showWithEvent(b.EV_CONTENT_SHOW, h);
                }
            } else {
                A = Math.round(100 / w * u) + "%";
                p.removeClass("csr-complete").addClass("csr-incomplete");
                if (l.match(/\?.*broadcast=true/i)) {
                    p.filter(".csr-when-complete").hideWithEvent(b.EV_CONTENT_HIDE, h);
                    p.filter(".csr-when-incomplete").showWithEvent(b.EV_CONTENT_SHOW, h);
                }
            }
            p.find(".csr-progress").css("width", A === "0%" ? "1%" : A).find("span").text(A);
        };
        k.off(o).on(o, "input,select,textarea", n);
        k.off(r).on(r, "input,select,textarea", n);
        k.off(j).on(j, n);
        p.off("click.show-first-error").on("click.show-first-error", "[rel=show-first-error]", function (u) {
            u.preventDefault();
            var s = a(u.target).closest("[data-progress]"), t = s.attr("data-progress"), w = t.split("?")[0], v = a(w);
            v.find("input,select,textarea").filter("[data-validation]:visible").valid();
            v.findOne(".csr-invalid-field").focus();
        });
        n({type: "boot"});
    }

    function d() {
        a(document).ready(function (j) {
            var k = a("#progress-counter");
            if (k.length === 0) {
                k = a('<div class="csr-color-pastel-1" id="progress-counter>0</div>').appendTo(document.body).css({
                    position: "fixed",
                    top: 5,
                    right: 5
                });
            }
            a("[data-progress]").each(function () {
                c(a(this));
            });
        });
    }

    return {init: d};
});
define("ui/Toggle", ["jquery"], function (d) {
    function b(e, l, i, f, g, h, k) {
        var j = e.attr(k), m = d(l.find(i)).map(function () {
            return d(this).attr(k);
        });
        if (!e.hasClass(g)) {
            d(l).each(function () {
                d(this).find(i).removeClass(g);
            });
            e.addClass(g);
            d(f).each(function () {
                var r = d(this).attr(k).split(h);
                for (var q = 0; q < r.length; q++) {
                    var o = r[q];
                    if (d.inArray(o, m) > -1) {
                        d(this).hide();
                    }
                }
                for (var p = 0; p < r.length; p++) {
                    var n = r[p];
                    if (n === j) {
                        d(this).show();
                    }
                }
            });
        } else {
            e.removeClass(g);
            d(f).each(function () {
                var p = d(this).attr(k).split(h);
                for (var o = 0; o < p.length; o++) {
                    var n = p[o];
                    if (d.inArray(n, m) > -1) {
                        d(this).hide();
                    }
                }
            });
        }
    }

    function c(e, i, h, k, g, f) {
        var j = d(e).map(function () {
            if (!d(this).find(i).hasClass(k)) {
                return d(this).find(i).first().attr(f);
            }
            return d(this).find(i + "." + k).attr(f);
        });
        d(e).each(function () {
            if (d(this).find("input[type=radio]").length > 1) {
                d(this).find("input[type=radio]").first().attr("checked", "checked");
            }
            if (!d(this).find(i).hasClass(k)) {
                d(this).find(i).first().addClass(k);
            }
        });
        d(h).each(function () {
            var m = d(this).attr(f).split(g);
            for (var l = 0; l < m.length; l++) {
                var n = m[l];
                if (d.inArray(n, j) > -1) {
                    d(this).show();
                }
            }
        });
    }

    function a() {
        var e = ".toggle-container", i = ".toggle-button", h = ".toggle-content", j = "active", g = ",", f = "data-toggle-id";
        c(e, i, h, j, g, f);
        d(document.body).on("click", i, function (l) {
            var k = d(l.target), m = d(l.target).parent(e);
            b(k, m, i, h, j, g, f);
        });
    }

    return {init: a};
});
define("ui/AutoComplete", ["jqueryExtended", "util/Css", "jquery.ui"], function (d, c) {
    var a = [];
    a.push(".ui-helper-hidden-accessible {display: none}");
    a.push(".ui-autocomplete {background : white; list-style-type: none; padding: 0; font-size: 12px; max-width: 400px; z-index:" + csr.layer.maximal + "}");
    a.push(".ui-autocomplete li {list-style-type: none; padding: 0; cursor: pointer}");
    a.push(".ui-autocomplete li a {display: block; padding: 4px;}");
    a.push(".ui-autocomplete .ui-state-focus {background : " + csr.palette["pastel-2"] + "; text-decoration: underline }");
    c.addStyle(a);
    function b(e) {
        if (typeof e !== "object" || e === null) {
            throw new Error("IllegalArgumentException object expected for parameter options");
        }
        this.$input = d(e.inputElement);
        this.$list = d(e.listElement);
        this.$list.hide();
        this.url = e.url;
        this.paramName = e.paramName || this.$input.attr("name");
        var f = function (i, h) {
            g.fetch(i.term, h);
        };
        var g = this;
        this.$autocomplete = this.$input.autocomplete(f, {
            minLength: typeof e.minLength !== "number" ? 3 : e.minLength,
            source: e.source || f,
            select: function (h, i) {
                h.stopPropagation();
                g.$input.val(i.item.value).change();
            }
        });
        if (typeof e.select === "function") {
            this.$input.on("autocompleteselect", e.select);
        }
        if (typeof e.open === "function") {
            this.$input.on("autocompleteopen", e.open);
        }
    }

    b.prototype.fetch = function (f, g) {
        var e = {};
        e[this.paramName] = f;
        d.post(this.url, e).then(function (i) {
            var h = [];
            d(i).find("li").each(function () {
                var k = d(this);
                var j = {
                    value: k.find(".name").text(),
                    description: k.find(".description").text(),
                    name: k.find(".name").text()
                };
                j.label = j.value + (j.description ? " ( " + j.description + " )" : "");
                h.push(j);
            });
            g(h);
        }, function () {
            g([]);
        });
    };
    b.prototype.disable = function () {
        return this.$autocomplete.autocomplete("disable");
    };
    b.prototype.enable = function () {
        return this.$autocomplete.autocomplete("enable");
    };
    b.prototype.getUpdatedChoices = function () {
        return this.$autocomplete.autocomplete("search", "");
    };
    b.prototype.setData = function (e) {
        return this.$autocomplete.autocomplete("option", {source: e});
    };
    b.PrototypeLegacyInterface = function (i, h, g, f) {
        var j = {}.undefinedProperty, e = j;
        if (typeof f !== "object" || f === null) {
            f = {};
        }
        if (typeof f.afterUpdateElement === "function") {
            e = function (m, n) {
                var k = ["<div>"];
                for (var l in n.item) {
                    if (n.item.hasOwnProperty(l)) {
                        k.push('<div class="' + l + '">' + n.item[l] + "</div>");
                    }
                }
                k.push("</div>");
                f.afterUpdateElement(d("#" + i), k.join(""), n.item);
            };
        }
        return new b({
            inputElement: "#" + i,
            listElement: (h ? "#" + h : j),
            url: g,
            paramName: f.paramName || j,
            select: e
        });
    };
    b.PrioritizeSourceByValue = function (f, e) {
        if (typeof e !== "number") {
            e = 10;
        }
        return function (k, g) {
            var i = d.ui.autocomplete.escapeRegex(k.term), j = new RegExp(i, "i"), h = d.grep(f, function (l) {
                return j.test(l.label || l.value || l);
            });
            h.sort(function (o, l) {
                var n = "" + (o.value || "");
                while (n.length < e) {
                    n += " ";
                }
                n += (o.label || "") + o;
                var q = "" + (l.value || "");
                while (q.length < e) {
                    q += " ";
                }
                q += (l.label || "") + l;
                var p = n.indexOf(k.term), m = q.indexOf(k.term);
                if (p === m) {
                    return 0;
                }
                return p > m ? 1 : -1;
            });
            g(h);
        };
    };
    return b;
});
define("util/Date", [], function () {
    var j = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"], b = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    function a(o, p, q) {
        o = "" + o;
        while (o.length < p) {
            o = q + o;
        }
        return o;
    }

    function m(o) {
        return a(o.getHours(), 2, "0") + ":" + a(o.getMinutes(), 2, "0");
    }

    function l(o) {
        if (o === null) {
            return "";
        }
        if (typeof o === "number") {
            o = new Date(o);
        }
        var p = [j[o.getDay()], o.getDate(), b[o.getMonth()]];
        return p.join(" ");
    }

    function h(o) {
        if (o === null) {
            return "";
        }
        if (typeof o === "number") {
            o = new Date(o);
        }
        return l(o) + " " + m(o);
    }

    function n(o) {
        if (o === null) {
            return "";
        }
        if (typeof o === "number") {
            o = new Date(o);
        }
        var p = [];
        p.push(o.getFullYear());
        p.push("-");
        p.push(a(o.getMonth() + 1, 2, "0"));
        p.push("-");
        p.push(a(o.getDate(), 2, "0"));
        p.push(" ");
        p.push(a(o.getHours(), 2, "0"));
        p.push(":");
        p.push(a(o.getMinutes(), 2, "0"));
        return p.join("");
    }

    function k(o) {
        if (o === null) {
            return "";
        }
        if (typeof o === "number") {
            o = new Date(o);
        }
        var p = new Date(), q = p.getTime() - o.getTime();
        if (q > 1000 * 60 * 60 * 48) {
            return h(o);
        } else {
            if (q < 1000 * 60 * 60 * 20) {
                return m(o);
            }
        }
        return j[o.getDay()] + " " + m(o);
    }

    function d(o, q) {
        if (o === null || typeof o === "undefined") {
            return "";
        }
        if (q === null || typeof q === "undefined") {
            q = new Date();
        }
        if (typeof q === "number") {
            q = new Date(q);
        }
        if (typeof o === "number") {
            o = new Date(o);
        }
        var s = Math.ceil((o.getTime() - q.getTime()) / 1000), r = [], p;
        if (s > (60 * 60 * 24)) {
            p = Math.floor(s / (60 * 60 * 24));
            s -= p * 60 * 60 * 24;
            r.push(p + "d");
        }
        if (s > 60 * 60 || r.length > 0) {
            p = Math.floor(s / (60 * 60));
            s -= p * 60 * 60;
            r.push(p + "h");
        }
        if (s > 60 || r.length > 0) {
            p = Math.floor(s / 60);
            s -= p * 60;
            r.push(p + "m");
        }
        r.push(s + "s");
        return r.join(" ");
    }

    function g(o) {
        var p = parseInt(o, 10);
        if (o < 10) {
            p = "0" + p;
        }
        return p;
    }

    function f(o) {
        return g(o.getMinutes());
    }

    function i(p, q) {
        var o;
        var r = p.getFullYear() + "-" + g(p.getMonth() + 1) + "-" + g(p.getDate());
        if (q) {
            o = g(p.getHours());
            r += " " + o + ":" + f(p);
        }
        return r;
    }

    function c(o, p) {
        var q = i(o, true);
        q = q.replace(/\s/, "T");
        q += ":00";
        if (p) {
            q += ".000Z";
        }
        return q;
    }

    function e(p) {
        var q = "([0-9]{4})(-([0-9]{2})(-([0-9]{2})( ([0-9]{1,2}):([0-9]{2})?)?)?)?";
        var s = p.match(new RegExp(q, "i"));
        if (s === null) {
            return Date.parse(p);
        }
        var r = 0;
        var o = new Date(s[1], 0, 1);
        if (s[3]) {
            o.setMonth(s[3] - 1);
        }
        if (s[5]) {
            o.setDate(s[5]);
        }
        if (s[7]) {
            o.setHours(s[7]);
        }
        if (s[8]) {
            o.setMinutes(s[8]);
        }
        if (s[0]) {
            o.setSeconds(s[0]);
        }
        if (s[2]) {
            o.setMilliseconds(Number("0." + s[2]));
        }
        if (s[4]) {
            r = (Number(s[6])) + Number(s[8]);
            r = ((s[5] == "-") ? 1 : -1);
        }
        return o;
    }

    return {
        dateTime: n,
        shortDate: l,
        shortDateTime: h,
        friendlyDateTime: k,
        friendlyCountdown: d,
        toFormattedString: i,
        toFormattedTimeString: c,
        parseFormattedString: e
    };
});
define("calendar/datepicker", ["util/Date"], function (h) {
    var i = 31;
    var j = 12;
    var F = 12;
    var u = false;
    var e = false;
    var q = [], l = new Date(), C = {
        current: {
            year: function () {
                return l.getFullYear();
            }, month: {
                integer: function () {
                    return l.getMonth();
                }, string: function (K, I) {
                    var J = l.getMonth();
                    return E(J, K, I);
                }
            }, day: function () {
                return l.getDate();
            }
        }, month: {
            string: function (K, L, I) {
                var J = L;
                return E(J, K, I);
            }, numDays: function (J, I) {
                return (J === 1 && !(I & 3) && (I % 100 || !(I % 400))) ? 29 : a[J];
            }
        }
    }, a = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31], B = [], s = {
        calendarClick: function (L) {
            if (L.target.className) {
                switch (L.target.className) {
                    case"prev-month":
                    case"prevMonth":
                        this.currentMonthView--;
                        if (this.currentMonthView < 0) {
                            this.currentYearView--;
                            this.currentMonthView = 11;
                        }
                        z.call(this);
                        break;
                    case"next-month":
                    case"nextMonth":
                        this.currentMonthView++;
                        if (this.currentMonthView > 11) {
                            this.currentYearView++;
                            this.currentMonthView = 0;
                        }
                        z.call(this);
                        break;
                    case"day":
                        var I = this.currentMonthView;
                        if (L.target.parentNode.className === "prev-day") {
                            I -= 1;
                        }
                        if (L.target.parentNode.className === "next-day") {
                            I += 1;
                        }
                        var K = new Date(this.currentYearView, I, L.target.innerHTML);
                        this.chosenDate = h.toFormattedString(K);
                        this.element.value = p(K.getTime(), this.config);
                        if ("createEvent" in document) {
                            var J = document.createEvent("HTMLEvents");
                            J.initEvent("change", false, true);
                            this.element.dispatchEvent(J);
                        } else {
                            this.element.fireEvent("onchange");
                        }
                        z.call(this);
                        this.close();
                        break;
                }
            }
        }, documentClick: function (J) {
            if (J.target != this.element && J.target != this.calendar && J.target !== this.icon) {
                var I = J.target.parentNode;
                if (I != this.calender) {
                    while (I != this.calendar) {
                        I = I.parentNode;
                        if (I === null) {
                            this.close();
                            break;
                        }
                    }
                }
            }
        }
    };

    function p(L, K) {
        var N = "", I = new Date(L), M = {
            d: function () {
                var O = M.j();
                return (O < 10) ? "0" + O : O;
            }, D: function () {
                return K.weekdays[M.w()].substring(0, 3);
            }, j: function () {
                return I.getDate();
            }, l: function () {
                return K.weekdays[M.w()];
            }, S: function () {
                return K.suffix[M.j()] || K.defaultSuffix;
            }, w: function () {
                return I.getDay();
            }, F: function () {
                return E(M.n(), true, K.months);
            }, m: function () {
                var O = M.n() + 1;
                return (O < 10) ? "0" + O : O;
            }, M: function () {
                return E(M.n(), false, K.months);
            }, n: function () {
                return I.getMonth();
            }, Y: function () {
                return I.getFullYear();
            }, y: function () {
                return M.Y().toString().substring(2, 4);
            }
        }, J = K.dateFormat.split("");
        r(J, function (P, O) {
            if (M[P] && J[O - 1] !== "\\") {
                N += M[P]();
            } else {
                if (P !== "\\") {
                    N += P;
                }
            }
        });
        return N;
    }

    function r(J, L) {
        var K = 0, I = J.length;
        for (K; K < I; K++) {
            if (L(J[K], K) === false) {
                break;
            }
        }
    }

    function t(K, J, L) {
        if (K.addEventListener) {
            K.addEventListener(J, L, false);
        } else {
            if (K.attachEvent) {
                var I = function (M) {
                    M = M || window.event;
                    M.preventDefault = (function (N) {
                        return function () {
                            N.returnValue = false;
                        };
                    })(M);
                    M.stopPropagation = (function (N) {
                        return function () {
                            N.cancelBubble = true;
                        };
                    })(M);
                    M.target = M.srcElement;
                    L.call(K, M);
                };
                K.attachEvent("on" + J, I);
            }
        }
    }

    function x(J, I, K) {
        if (J.removeEventListener) {
            J.removeEventListener(I, K, false);
        } else {
            if (J.detachEvent) {
                J.detachEvent("on" + I, K);
            }
        }
    }

    function g(M, I, L) {
        var J;
        if (!(M in B)) {
            B[M] = document.createElement(M);
        }
        J = B[M].cloneNode(false);
        if (I) {
            for (var K in I) {
                J[K] = I[K];
            }
        }
        if (L) {
            if (typeof(L) === "object") {
                J.appendChild(L);
            } else {
                J.innerHTML = L;
            }
        }
        return J;
    }

    function E(J, K, I) {
        return ((K === true) ? I[J] : ((I[J].length > 3) ? I[J].substring(0, 3) : I[J]));
    }

    function H(I, K, J) {
        return I === C.current.day() && K === C.current.month.integer() && J === C.current.year();
    }

    function d(L, K, J, N) {
        var P = this.chosenDate.split("-");
        var I = Number(P[2]);
        var O = Number(P[1]) - 1;
        var M = Number(P[0]);
        if (I === L && O === K && M === Number(J)) {
            return true;
        }
        return false;
    }

    function w(J, P, O, L) {
        var I = (L) ? 0 : 1;
        var K = new Date(O, P, J);
        var N = new Date();
        N.setDate(N.getDate() - I);
        var M;
        if (e) {
            M = new Date(N.getFullYear(), N.getMonth() - (11 + I));
        } else {
            M = new Date(N.getFullYear(), N.getMonth(), N.getDate());
            M.setMonth(M.getMonth() - F);
            M.setHours(0, 0, 0, 0);
        }
        return (K > N || K < M);
    }

    function G(I) {
        var J = document.createDocumentFragment();
        r(I, function (K) {
            J.appendChild(g("th", {}, K.substring(0, 2)));
        });
        return J;
    }

    function z() {
        while (this.calendarBody.hasChildNodes()) {
            this.calendarBody.removeChild(this.calendarBody.lastChild);
        }
        this.chosenDate = this.element.value;
        var J = new Date(this.currentYearView, this.currentMonthView, 1).getDay(), I = C.month.numDays(this.currentMonthView, this.currentYearView);
        this.currentMonth.innerHTML = C.month.string(this.config.fullCurrentMonth, this.currentMonthView, this.config.months) + " " + this.currentYearView;
        this.calendarBody.appendChild(v.call(this, J, I, this.currentMonthView, this.currentYearView, this.config.useToday, this.calendarBody, "rebuildCalendar"));
    }

    function b(J, L, K, I) {
        return g("span", {className: "current-month"}, C.month.string(J.fullCurrentMonth, L, I) + " " + K);
    }

    function c(J, N, M) {
        var I = g("div", {className: "months"}), L = g("span", {className: "prev-month"}, g("span", {className: "prevMonth"}, "&lt;")), K = g("span", {className: "next-month"}, g("span", {className: "nextMonth"}, "&gt;"));
        I.appendChild(L);
        I.appendChild(K);
        return I;
    }

    function v(ab, I, Y, ak, aj, V, W) {
        var U = document.createDocumentFragment(), O = g("tr"), ae = 0, ah, ac, al = 0, J;
        var N = new Date(ak, Y, 1);
        for (ah = 1; ah <= ab; ah++) {
            var ai = new Date(ak, Y, N.getDate() - ((ab + 1) - ah));
            var X = ai.getDate();
            var S = "prev-day";
            ac = w(X, ai.getMonth(), ai.getFullYear(), aj) ? "out-of-range" : null;
            J = d.call(this, X, ai.getMonth(), ai.getFullYear()) ? "chosen" : null;
            if (ac) {
                S = S + " " + ac;
            }
            if (J) {
                S = S + " " + J;
            }
            var aa = {className: S};
            O.appendChild(g("td", aa, g("span", {className: "day"}, X)));
            ae++;
        }
        for (ah = 1;
             ah <= I; ah++) {
            if (ae === 7) {
                U.appendChild(O);
                O = g("tr");
                ae = 0;
            }
            var Z = H(ah, Y, ak) ? "today" : null;
            ac = w(ah, Y, ak, aj) ? "out-of-range" : null;
            J = d.call(this, ah, Y, ak) ? "chosen" : null;
            var L = (Z) ? Z : null;
            if (ac) {
                if (L) {
                    L = L + " " + ac;
                } else {
                    L = ac;
                }
                al++;
            }
            if (J) {
                L = L + " " + J;
            }
            var K = (L) ? {className: L} : null;
            O.appendChild(g("td", K, g("span", {className: "day"}, ah)));
            ae++;
        }
        var af = new Date(ak, Y, ah - 1);
        if (al === I) {
            var R;
            var Q = A(h.toFormattedString(af), aj);
            if (Q) {
                if (V.parentNode) {
                    R = V.parentNode.parentNode.getElementsByClassName("next-month")[0];
                    R.className = R.className + " disabled";
                }
            } else {
                if (V.parentNode) {
                    R = V.parentNode.parentNode.getElementsByClassName("prev-month")[0];
                    R.className = R.className + " disabled";
                }
            }
        } else {
            if (V.parentNode) {
                var ag = V.parentNode.parentNode.getElementsByClassName("next-month")[0];
                ag.className = "next-month";
                var P = V.parentNode.parentNode.getElementsByClassName("prev-month")[0];
                P.className = "prev-month";
            }
        }
        for (ah = 1; ah <= (7 - ae); ah++) {
            var M = "next-day";
            ac = w(af.getDate() + ah, Y, ak, aj) ? "out-of-range" : null;
            var T = new Date(ak, Y, af.getDate() + ah);
            J = d.call(this, T.getDate(), T.getMonth(), T.getFullYear()) ? "chosen" : null;
            if (ac) {
                M = M + " " + ac;
            }
            if (J) {
                M = M + " " + J;
            }
            var ad = {className: M};
            O.appendChild(g("td", ad, g("span", {className: "day"}, ah)));
        }
        U.appendChild(O);
        return U;
    }

    function o() {
        this.chosenDate = this.element.value;
        var J = new Date(this.currentYearView, this.currentMonthView, 1).getDay(), M = C.month.numDays(this.currentMonthView, this.currentYearView), P = this;
        var O = 0, N = 0, L = this.element;
        if (L.offsetParent) {
            do {
                O += L.offsetLeft;
                N += L.offsetTop;
                L = L.offsetParent;
            } while (L);
        }
        var Q = g("div", {className: "calendar"});
        Q.style.cssText = "display: none; position: absolute; top: " + (N + this.element.offsetHeight) + "px; left: " + O + "px; z-index: 100;";
        this.currentMonth = b(this.config, this.currentMonthView, this.currentYearView, this.config.months);
        var I = c(this.config, this.currentMonthView, this.currentYearView);
        I.appendChild(this.currentMonth);
        var K = g("table", {className: "datepicker-table"}, g("thead", null, g("tr", {className: "weekdays"}, G(this.config.weekdays))));
        this.calendarBody = g("tbody");
        this.calendarBody.appendChild(v.call(this, J, M, this.currentMonthView, this.currentYearView, this.config.useToday, this.calendarBody, "buildCalendar"));
        K.appendChild(this.calendarBody);
        Q.appendChild(I);
        Q.appendChild(K);
        document.body.appendChild(Q);
        t(Q, "click", function (R) {
            s.calendarClick.call(P, R);
        });
        return Q;
    }

    function A(K, R, Q) {
        var M = new Date(K);
        M.setHours(0, 0, 0, 0);
        var I = (R) ? 0 : 1;
        var O = new Date();
        var P = new Date(O.getFullYear(), O.getMonth(), O.getDate() - I);
        if (R) {
            if (Q === "month") {
                var L = new Date(O.getFullYear(), O.getMonth() + 1);
                return (M > L);
            } else {
                if (Q === "week") {
                    var N = new Date(O.getFullYear(), O.getMonth(), P.getDate() + 7);
                    var J = N.getDay();
                    N.setDate(N.getDate() - J);
                    return (M > N);
                }
            }
        }
        return (M > P);
    }

    function f(K, L) {
        var J = new Date(K);
        J.setHours(0, 0, 0, 0);
        var I = (L) ? 0 : 1;
        var N = new Date();
        N.setDate(N.getDate() - I);
        var M;
        if (e) {
            M = new Date(N.getFullYear(), N.getMonth() - (11 + I));
        } else {
            M = new Date(N.getFullYear(), N.getMonth(), N.getDate());
            M.setMonth(M.getMonth() - F);
            M.setHours(0, 0, 0, 0);
        }
        return (J < M);
    }

    function k(L, J) {
        var I = new Date(L);
        I.setHours(0, 0, 0, 0);
        var K = new Date(J);
        K.setHours(0, 0, 0, 0);
        if (e) {
            return (I <= K);
        } else {
            return (I < K);
        }
    }

    function D(S) {
        try {
            var R = 2;
            var K = 1;
            var L = 0;
            S = S.replace(/-/g, "/").replace(/\./g, "/");
            var N = S.split("/");
            var M = true;
            if (!(N[R].length === 1 || N[R].length === 2)) {
                M = false;
            }
            if (M && !(N[K].length === 1 || N[K].length === 2)) {
                M = false;
            }
            if (M && N[L].length !== 4) {
                M = false;
            }
            if (M) {
                var Q = parseInt(N[R], 10);
                var O = parseInt(N[K], 10);
                var I = parseInt(N[L], 10);
                if (I > 1900 && I < 9999) {
                    M = true;
                    if (O <= 12 && O > 0) {
                        M = true;
                        var J = (((I % 4) === 0) && ((I % 100) !== 0) || ((I % 400) === 0));
                        if (O === 2) {
                            M = J ? Q <= 29 : Q <= 28;
                        } else {
                            if ((O === 4) || (O === 6) || (O === 9) || (O === 11)) {
                                M = (Q > 0 && Q <= 30);
                            } else {
                                M = (Q > 0 && Q <= 31);
                            }
                        }
                    } else {
                        M = false;
                    }
                } else {
                    M = false;
                }
            }
            return M;
        } catch (P) {
            return false;
        }
    }

    function n(K, J) {
        var N = new Date(J);
        N.setHours(0, 0, 0, 0);
        N.setDate(N.getDate() - 1);
        if (K === "day") {
            N.setDate(N.getDate() - i);
        } else {
            if (K === "week") {
                N.setDate(N.getDate() - j * 7);
            } else {
                N.setMonth(N.getMonth() - F);
            }
        }
        var I = N.getDate();
        var L = N.getMonth() + 1;
        var M = N.getFullYear();
        if (I < 10) {
            I = "0" + I;
        }
        if (L < 10) {
            L = "0" + L;
        }
        return M + "-" + L + "-" + I;
    }

    function m(J, I) {
        if (I) {
            I.innerHTML = J;
        }
    }

    var y = function (K, N, O, L, J) {
        var I = this;
        this.element = K;
        u = (typeof J !== "undefined") ? true : false;
        e = (typeof N.linkedToTimeline !== "undefined") ? N.linkedToTimeline : true;
        this.inputLeft = 0;
        this.inputTop = 0;
        this.config = {
            fullCurrentMonth: true,
            dateFormat: "F jS, Y",
            weekdays: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            suffix: {1: "st", 2: "nd", 3: "rd", 21: "st", 22: "nd", 23: "rd", 31: "st"},
            defaultSuffix: "th",
            useToday: true
        };
        this.currentYearView = C.current.year();
        this.currentMonthView = C.current.month.integer();
        if (N) {
            for (var M in N) {
                if (this.config.hasOwnProperty(M)) {
                    this.config[M] = N[M];
                }
            }
        }
        this.documentClick = function (P) {
            s.documentClick.call(I, P);
        };
        this.open = function (S) {
            var R = 0, P = 0, Q = I.element;
            if (I.inputLeft === 0) {
                if (Q.offsetParent) {
                    do {
                        R += Q.offsetLeft;
                        P += Q.offsetTop;
                        Q = Q.offsetParent;
                    } while (Q);
                }
                I.inputLeft = R;
                I.inputTop = P;
                I.calendar.style.left = I.inputLeft + "px";
                I.calendar.style.top = I.inputTop + I.element.offsetHeight + "px";
            }
            t(document, "click", I.documentClick);
            r(q, function (T) {
                if (T != I) {
                    T.close();
                }
            });
            I.calendar.style.display = "block";
        };
        this.close = function () {
            x(document, "click", I.documentClick);
            I.calendar.style.display = "none";
        };
        this.calendar = o.call(this);
        q.push(this);
        if (O) {
            this.errorField = O;
        }
        if (L) {
            this.icon = L;
            t(L, "click", this.open);
        } else {
            if (this.element.nodeName.toLowerCase() === "input") {
                t(this.element, "focus", this.open);
            } else {
                t(this.element, "click", this.open);
            }
        }
        this.clearMessage = function () {
            m("", I.errorField);
        };
        this.updateMonth = function (Q, P) {
            this.currentMonthView = Q;
            this.currentYearView = P;
            z.call(this);
        };
        this.checkDate = function (U) {
            var P = U.data.startDate.value;
            var S = U.data.endDate.value;
            var V = U.data.callback;
            var R = U.data.useToday;
            var T = U.data.granularity;
            var Q = (R) ? "today." : "yesterday.";
            if (!D(P)) {
                m("The start date either doesn't exist or is not in a valid format, please check the format: yyyy-mm-dd.", I.errorField);
                return false;
            }
            if (!D(S)) {
                m("The end date either doesn't exist or is not in a valid format, please check the format: yyyy-mm-dd.", I.errorField);
                return false;
            }
            if (A(P, R, T)) {
                m("The start date is set in the future, data can only be shown up until " + Q, I.errorField);
                return false;
            }
            if (A(S, R, T)) {
                m("The end date is set in the future, data can only be shown up until " + Q, I.errorField);
                return false;
            }
            if (f(P, R)) {
                m("The start date is more than 1 year in the past.", I.errorField);
                return false;
            }
            if (!k(P, S)) {
                if (e) {
                    m("The start date is set after the end date, please make sure the start date is before (or the same as) the end date.", I.errorField);
                } else {
                    m("The start date is set after (or is the same as) the end date, please make sure the start date is before the end date.", I.errorField);
                }
                return false;
            }
            m("", I.errorField);
            if (!u) {
                V(P, S);
                return true;
            }
            var W;
            if (k(n("day", S), P)) {
                W = "day";
                V(P, S, W);
            } else {
                if (k(n("week", S), P)) {
                    W = "week";
                    V(P, S, W);
                } else {
                    if (k(n("month", S), P)) {
                        W = "month";
                        V(P, S, W);
                    }
                }
            }
        };
        this.checkDateSingle = function (T) {
            var P = T.data.startDate.value;
            var U = T.data.callback;
            var R = T.data.useToday;
            var S = T.data.granularity;
            var Q = (R) ? "today." : "yesterday.";
            if (!D(P)) {
                m("The start date either doesn't exist or is not in a valid format, please check the format: yyyy-mm-dd.", I.errorField);
                return false;
            }
            if (A(P, R, S)) {
                m("The start date is set in the future, data can only be shown up until " + Q, I.errorField);
                return false;
            }
            if (f(P, R)) {
                m("The start date is more than 1 year in the past.", I.errorField);
                return false;
            }
            m("", I.errorField);
            U(P);
            return true;
        };
        this.checkGranularity = function (Q, S, P) {
            var R = n(P, S);
            if (!k(R, Q)) {
                m("The time period is too long for this step size.", I.errorField);
                return false;
            } else {
                m("", I.errorField);
                return true;
            }
        };
    };
    return y;
});
define("ui/Tooltip2", ["jquery", "hogan", "Constants", "text!ui/tooltip.html"], function (e, d, b, a) {
    function c(f) {
        this.$node = f.getNode();
        this.selector = f.parameters.selector;
        this.position = f.parameters.position || "top";
        this.content = f.parameters.content || "";
        this.init();
        f.ready();
    }

    c.prototype.init = function () {
        var g = e(window);
        var l = this;
        var m = this.content;
        var h = this.selector;
        if (typeof h !== "undefined") {
            m = e(h).html();
        }
        if (!l.wouldTooltipBeInView(l.position)) {
            var n = l.position.split("-");
            l.position = n[0] + (n[1] ? "-" + n[1] : "");
        }
        var j = d.compile(a).render({
            content: m,
            position: l.position,
            arrowPosition: this.getOppositeDirections(l.position)
        });
        var i = e("body");
        var k = e(j);
        l.$tooltip = k;
        k.addClass("tooltip2");
        i.append(k);
        var f = this.$node;
        f.on("mouseenter", function () {
            var q = f[0].getBoundingClientRect().left + g.scrollLeft();
            var s = f[0].getBoundingClientRect().right + g.scrollLeft();
            var p = f[0].getBoundingClientRect().top + g.scrollTop();
            var o = f[0].getBoundingClientRect().bottom + g.scrollTop();
            var r, t;
            if (l.position === "right-bottom") {
                r = p;
                t = q + f.outerWidth();
            } else {
                if (l.position === "left-bottom") {
                    r = p;
                    t = q - k.outerWidth();
                } else {
                    r = p - k.outerHeight();
                    t = q + (f.outerWidth() / 2) - (k.outerWidth() / 2);
                }
            }
            k.css({top: r, left: t});
            k.show();
        });
        f.on("mouseleave", function () {
            l.checkTooltipHover = false;
            if (!l.content) {
                setTimeout(function () {
                    if (l.checkTooltipHover === false) {
                        k.hide();
                    }
                }, 10);
            } else {
                k.hide();
            }
        });
        k.on("mouseenter", function () {
            l.checkTooltipHover = true;
        });
        k.on("mouseleave", function () {
            k.hide();
        });
    };
    c.prototype.wouldTooltipBeInView = function (l) {
        var i = e(window);
        var g = this.$node;
        var k = 320;
        var o = g[0].getBoundingClientRect().left + i.scrollLeft();
        var j = g[0].getBoundingClientRect().right + i.scrollLeft();
        var m = g[0].getBoundingClientRect().top + i.scrollTop();
        var f = g[0].getBoundingClientRect().bottom + i.scrollTop();
        if (l = "right-bottom") {
            var n = (j + k);
            var h = i.width();
            return (n < h);
        }
    };
    c.prototype.getOppositeDirections = function (k) {
        if (k.indexOf("-") > -1) {
            var g = k.split("-");
            var f = [];
            for (var h = 0; h < g.length; h++) {
                var j = this.getOppositeDirection(g[h]);
                if (typeof j === "string") {
                    f.push(j);
                } else {
                    return false;
                }
            }
            return f.join("-");
        } else {
            if (["top", "left", "bottom", "right"].indexOf(k) > -1) {
                return this.getOppositeDirection(k);
            }
        }
        return false;
    };
    c.prototype.getOppositeDirection = function (f) {
        if (f === "top") {
            return "bottom";
        }
        if (f === "right") {
            return "left";
        }
        if (f === "bottom") {
            return "top";
        }
        if (f === "left") {
            return "right";
        }
    };
    return c;
});
define("ui/Widget", ["jquery", "util/QueryString", "util/Console"], function (a, f, e) {
    var d = e.getLog("ui/Widget");
    var c = "csr:widgetLoaded";

    function g(j, l) {
        this.__$node = j;
        var k = (j.attr("data-widget") || "").split("?");
        if (k.length < 2) {
            this.parameters = {};
        } else {
            k.shift();
            this.parameters = f.parse(k.join("?"));
        }
        if (typeof l === "object" && l !== null) {
            a.extend(this.parameters, l);
        }
        this.__promise = new a.Deferred();
        this.__promise.then(function () {
            j.trigger(c);
        });
    }

    g.prototype.getNode = function () {
        return this.__$node;
    };
    g.prototype.ready = function () {
        this.__promise.resolve();
    };
    function b(j, m) {
        var n = j.attr("data-widget"), k = (n || "").split("?")[0];
        var l = this;
        if (!n) {
            j.addClass("csr-widget-error").attr("data-widget-error", "NOT_A_WIDGET_NODE");
            if (typeof m === "function") {
                m("NODE_IS_NOT_A_WIDGET");
            }
        } else {
            require([k], function (p) {
                try {
                    l.$node = j;
                    l.api = new g(j);
                    l.instance = new p(l.api);
                    j.removeClass("js-unbound");
                } catch (o) {
                    j.addClass("csr-widget-error");
                    d.warn("[ui/Widget] Error while loading widget: " + o.message);
                    d.info("[ui/Widget] widget uri was " + n);
                    d.log("Error stack", o.stack);
                    if (typeof m === "function") {
                        m("WIDGET_MODULE_INSTANTIATION_ERROR");
                    }
                }
            }, function () {
                j.removeAttr("data-widget").addClass("csr-widget-error").attr("data-widget-error", "WIDGET_MODULE_LOADING_ERROR");
                if (typeof m === "function") {
                    m("WIDGET_MODULE_LOADING_ERROR");
                }
            });
        }
    }

    function i(j) {
        var m = new a.Deferred(), k = {}, l = false;
        j.bind(c, function (n) {
            n.preventDefault();
            n.stopPropagation();
            if (l) {
                return;
            }
            setTimeout(function () {
                m.resolve(k.widget);
                l = true;
            }, 5);
        });
        setTimeout(function () {
            if (l) {
                return;
            }
            m.reject("WIDGET_LOADING_TIMEOUT");
        }, 5000);
        k.widget = new b(j, function (n) {
            m.reject(n);
        });
        return m.promise();
    }

    function h() {
        a(document).ready(function () {
            a("[data-widget]").not(".csr-ui-widget-bound").addClass("csr-ui-widget-bound").widget();
        });
    }

    a.fn.widget = function () {
        if (this.length === 0) {
            var l = new a.Deferred();
            l.reject("No nodes");
            return l.promise();
        }
        var j = "__widgetCreationPromise";
        var k = [];
        this.each(function (m, n) {
            if (!Object.prototype.hasOwnProperty.call(n, j)) {
                n[j] = i(a(n));
            }
            k.push(n[j]);
        });
        return a.when.apply(a, k);
    };
    return {
        init: h, createWidget: i, createInitializer: function (k, j, l) {
            return function () {
                a("[" + k + "]").not("." + j).addClass(j).each(function () {
                    var m = f.parse(a(this).attr(k) || "");
                    this[j.replace("-", "_")] = new l(new g(a(this), m));
                });
            };
        }
    };
});
define("ui/Table/Downloadable", ["jqueryExtended", "ui/Widget"], function (e, c) {
    var d = {};

    function b(h, o, f) {
        var n = o.find("tr:has(th:visible,td:visible)"), g = String.fromCharCode(11), m = String.fromCharCode(0), k = '","', i = '"\r\n"', j = '"' + n.map(function (q, r) {
                var p = e(r).find("th:visible,td:visible");
                return p.map(function (t, s) {
                    var u = e(s), v = u.text();
                    v = e.trim(v);
                    return v.replace(/"/g, '""');
                }).get().join(g);
            }).get().join(m).split(m).join(i).split(g).join(k) + '"', l = "data:application/csv;charset=utf-8," + encodeURIComponent(j);
        h.attr({download: f, href: l, target: "_blank"});
    }

    d.csv = function (g, i) {
        b(g.$button, g.$table, g.fileName);
        if (g.debug) {
            i.preventDefault();
            var f = decodeURIComponent(g.$button.attr("href").split(",").slice(1).join(","));
            var h = e("<div><h2></h2><pre></pre></div>").hide().appendTo(document.body);
            h.findOne("h2").text(g.fileName);
            h.findOne("pre").text(f);
            var j = h.getOrGenerateId();
            require(["ui/Dialog"], function (k) {
                k.createDialog("#" + j);
            });
            setTimeout(function () {
                h.remove();
            }, 2000);
        }
    };
    function a(g) {
        var f = this;
        f.format = g.parameters.format || "csv";
        f.debug = "true" === g.parameters.debug;
        f.fileName = g.parameters.filename || "exports." + f.format;
        if (!d.hasOwnProperty(f.format)) {
            return;
        }
        var h = this.$table = g.getNode();
        var j = h.findOne("caption");
        if (j.length === 0) {
            j = e("<caption></caption>").prependTo(h);
        }
        var i = this.$button = e("<a>Download</a>").text("Download (" + f.format + ")").addClass(g.parameters.buttonClass || "csr-button-2 secondary").appendTo(j);
        i.attr("href", "#download-failed");
        i.click(function (k) {
            f.handleClick(k);
        });
    }

    a.prototype.handleClick = function (f) {
        d[this.format](this, f);
    };
    a.init = c.createInitializer("data-downloadable", "js-ui-table-downloadable", a);
    return a;
});
define("ui/Form/ElementList", ["jqueryExtended", "Constants", "json"], function (g, b, f) {
    var c = "uiFormElementListBooted", e = "data-element-list";

    function d(j) {
        if (j[c]) {
            return;
        }
        j[c] = true;
        var h = this;
        h.$list = g(j);
        h.config = f.parse(h.$list.attr(e) || "{}") || {};
        h.config.moreOptionsClass = h.config.moreOptionsClass || "csr-more-options";
        h.config.noMoreOptionsClass = h.config.noMoreOptionsClass || "csr-no-more-options";
        h.config.lastClass = h.config.lastClass || "csr-last-item";
        h.config.firstClass = h.config.firstClass || "csr-first-item";
        h.$elements = h.$list.find("[data-element]");
        h.$addMore = h.$list.findOne("[data-add-element]");
        h.$addMoreGroup = h.$list.findOne("[data-add-element-group]");
        h.$addMoreTypes = h.$list.findOne("[data-add-element-types]");
        h.zebra = h.config.zebra === "true" || h.config.zebra;
        if (typeof h.config.type === "string") {
            h.isTyped = true;
            h.typeAttribute = h.config.type;
            h.types = [];
            h.$typeNodes = {};
            h.$typeOptions = {};
            h.$elements.each(function () {
                var k = g(this);
                var l = k.attr(h.typeAttribute);
                if (!l) {
                    return;
                }
                h.types.push(l);
                h.$typeNodes[l] = k;
                h.$typeOptions[l] = g("<option></option>").html(l).attr("value", l).appendTo(h.$addMoreTypes);
            });
        } else {
            h.isTyped = false;
        }
        h.visible = typeof h.config.required === "number" ? h.config.required : 1;
        var i = [];
        this.$elements.each(function (l, m) {
            var k = g(m);
            if (k.attr("data-element") === "scan") {
                k.find("input,select,textarea").each(function () {
                    var n = g(this);
                    if (this.type === "hidden" || !this.name) {
                        return;
                    }
                    if ((n.val() && n.val() !== "") || n.is(":checked")) {
                        k.attr("data-element", "visible");
                    }
                });
            }
            if (k.attr("data-element") === "visible") {
                k.show();
                if (l > h.visible) {
                    h.visible = l;
                    if (!h.isTyped && i.length > 0) {
                        g(i).show().attr("data-element", "visible");
                    }
                }
            } else {
                if (l < h.visible) {
                    k.show().attr("data-element", "visible");
                } else {
                    k.hide().attr("data-element", "hidden");
                    i.push(m);
                }
            }
        });
        h.updateUI();
        h.$addMore.click(function (m) {
            m.preventDefault();
            var n = h.$elements.filter("[data-element=hidden]");
            if (h.isTyped) {
                var l = h.$addMoreTypes.val();
                if (l) {
                    var o = h.$elements.filter("[data-element=visible]");
                    var k = h.$typeNodes[l].attr("data-element", "visible");
                    if (o.length > 0) {
                        k.parent().append(k);
                    }
                    k.showWithEvent(b.EV_CONTENT_SHOW);
                    h.updateUI();
                    h.$addMoreTypes.val("");
                }
            } else {
                if (n.length > 0) {
                    h.visible++;
                    n.first().attr("data-element", "visible").showWithEvent(b.EV_CONTENT_SHOW);
                    h.updateUI();
                }
            }
            return false;
        });
        if (h.isTyped) {
            h.$addMoreTypes.change(function () {
                h.$addMore.click();
            });
        }
        h.$list.on(b.EV_CONTENT_HIDE, "[data-element]", function (l) {
            var k = g(l.target);
            if (k.is("[data-element]")) {
                k.attr("data-element", "hidden");
            }
            h.updateUI();
        });
        h.$list.on("click", "[data-remove-element]", function (m) {
            m.preventDefault();
            var l = g(m.target).closest("[data-element]");
            var k = g(m.target).closest("[data-remove-element]").attr("data-remove-element") || "";
            if (k.match(/clearInputs/i)) {
                l.find("input,select").filter("[name]").val("").filter("[data-validation]").each(function () {
                    g(this).valid();
                });
            }
            if (!k.match(/clearInputsOnly/i)) {
                l.hide().trigger(b.EV_CONTENT_HIDE);
            }
        });
    }

    d.prototype.updateUI = function () {
        var h = this;
        var k = h.$elements.filter("[data-element=hidden]");
        var j = h.$list.find("[data-element=visible]");
        if (k.length === 0) {
            h.$addMore.hide();
            h.$addMoreGroup.hide();
            h.$list.addClass(h.config.noMoreOptionsClass).removeClass(h.config.moreOptionsClass);
        } else {
            h.$addMore.show();
            h.$addMoreGroup.show();
            h.$list.addClass(h.config.moreOptionsClass).removeClass(h.config.noMoreOptionsClass);
            if (h.zebra) {
                k.appendTo(k.first().parent());
            }
        }
        if (h.config.firstClass || h.config.lastClass) {
            j.each(function (l) {
                if (h.config.firstClass) {
                    if (l === 0) {
                        g(this).addClass(h.config.firstClass);
                    } else {
                        g(this).removeClass(h.config.firstClass);
                    }
                }
                if (h.config.lastClass) {
                    if (l === (j.length - 1)) {
                        g(this).addClass(h.config.lastClass);
                    } else {
                        g(this).removeClass(h.config.lastClass);
                    }
                }
            });
        }
        if (h.isTyped) {
            for (var i in h.$typeNodes) {
                if (h.$typeNodes.hasOwnProperty(i)) {
                    if (h.$typeNodes[i].is("[data-element=hidden]")) {
                        h.$typeOptions[i].show();
                    } else {
                        h.$typeOptions[i].hide();
                    }
                }
            }
        }
    };
    function a() {
        g(document).ready(function () {
            g("[" + e + "]").each(function () {
                var h = new d(this);
            });
        });
    }

    d.init = a;
    return d;
});
define("util/Analytics", ["jquery"], function (f) {
    var a = adyen.imgbase + "/adyen.png";
    var h = [];

    function c() {
        f(document.body).on("click", "[data-event]", function (k) {
            var l = f(k.target).closest("[data-event]"), j = e(l.attr("data-event"));
            b("Click", l.attr("data-event"));
            if (l.is("a[href]")) {
                var i = l.attr("href");
                k.preventDefault();
                j.always(function () {
                    document.location.href = i;
                });
            }
        });
    }

    function e(m, o) {
        var j = ["a=" + encodeURIComponent(m)];
        var n = new f.Deferred();
        if (typeof o === "object" && null !== o) {
            if (!o.hasOwnProperty("user_level") && adyen.hasOwnProperty("currentAccountType")) {
                o.user_level = adyen.currentAccountType.substring(0, 1);
            }
            for (var l in o) {
                if (o.hasOwnProperty(l)) {
                    j.push(encodeURIComponent(l) + "=" + encodeURIComponent(o[l]));
                }
            }
        }
        var k = new Image();
        k.onload = function () {
            n.resolve();
        };
        k.src = a + (a.indexOf("?") > -1 ? "&" : "?") + j.join("&");
        setTimeout(function () {
            n.resolve();
        }, 500);
        return n.promise();
    }

    function d(i) {
        i = i || {};
        i.type = i.type || "content";
        i.category = i.category || "page";
        i.action = i.action || "view";
        return e("track", i);
    }

    function b(m, o, k, n) {
        for (var l = 0, q = h.length; l < q; l++) {
            var j = h[l];
            try {
                j(m, o, k, n);
            } catch (p) {
            }
        }
    }

    function g(i) {
        if (typeof i !== "function") {
            return;
        }
        h.push(i);
    }

    return {event: e, pageView: d, init: c, trackEvent: b, addTracker: g};
});
define("ui/Dialog", ["jquery", "Constants", "util/Console", "util/Analytics"], function (b, d, h, l) {
    var e = false, o = b, c = "csr:closeDialog", m = "dialogCreated";
    var k = "Dialog";
    var j = "Open";
    var f = "Close";
    b.fn.closeDialog = function () {
        b("#dialog").trigger(c);
    };
    function a(r) {
        var q;
        var p;
        q = document.getElementsByTagName("head")[0];
        if (q) {
            p = document.createElement("script");
            p.type = "text/javascript";
            p.src = r;
            q.appendChild(p);
        }
    }

    function g() {
        if (!e) {
            e = true;
            o(document.body).keyup(function (p) {
                if (!p.isInDialog && p.keyCode === 27) {
                    o("#dialog").trigger(c);
                    o("#power-search").removeClass("opened");
                }
            });
        }
    }

    function n(r, q) {
        l.trackEvent(k, j, r, q ? 1 : 0);
        var s = new o.Deferred();
        g();
        var u = function (G) {
            try {
                var B = G.responseText || "";
                B = B.substring(B.indexOf('<div id="content"'));
                if (B.indexOf("</body") > -1) {
                    B = B.substring(0, B.indexOf("</body"));
                }
                if (r.split(" ").length > 1) {
                    B = b(B).find(r.split(" ").slice(1).join(" ")).html() || B;
                }
                var y = [];
                B.replace(/<script.*?<\/script>/ig, function (I) {
                    var x = I.match(/src=['"](.*?)['"]/);
                    if (x && x[1]) {
                        y.push(x[1]);
                    }
                    return "";
                });
                var z = document.getElementById("dialog-overlay") || document.createElement("div");
                z.id = "dialog-overlay";
                z.setAttribute("id", "dialog-overlay");
                z.setAttribute("data-rel-hide", "true");
                z.style.display = "block";
                document.body.appendChild(z);
                var w = document.getElementById("dialog") || document.createElement("div"), E = b(w);
                w.id = "dialog";
                w.setAttribute("id", "dialog");
                E.addClass("dialog csr-dialog");
                w.innerHTML = '<div class="dialog-content">' + B + "</div>";
                w.style.display = "block";
                w.style.top = "10%";
                document.body.appendChild(w);
                while (y.length > 0) {
                    a(y.shift());
                }
                E.find("[data-dialog-width]").each(function () {
                    var x = b(this).attr("data-dialog-width");
                    E.animate({width: x, marginLeft: -0.5 * parseInt(x.replace(/\D+/g, ""))}, 400);
                });
                E.find("[data-dialog-class]").each(function () {
                    E.addClass(b(this).attr("data-dialog-class"));
                });
                w.style.top = Math.floor(b(window).scrollTop() + 0.1 * b(window).height()) + "px";
                var F = document.createElement("div");
                F.innerHTML = "&times;";
                F.style.position = "absolute";
                F.style.right = "10px";
                F.style.top = "5px";
                F.style.cursor = "pointer";
                if (window.csr) {
                    F.style.zIndex = window.csr.layer.maximal;
                }
                w.appendChild(F);
                E.trigger(d.EV_CONTENT_MERGED);
                E.on(c, function () {
                    z.style.display = "none";
                    w.style.display = "none";
                    E.trigger(d.EV_CONTENT_HIDE);
                    l.trackEvent(k, f);
                });
                E.click(function (x) {
                    x.isInDialog = true;
                });
                b(F).click(function (x) {
                    E.trigger(c);
                });
                E.find(".ca-dialog-close").click(function (x) {
                    E.trigger(c);
                });
                b(z).click(function (x) {
                    if (!x.isInDialog && q === "true") {
                        E.trigger(c);
                    }
                });
                var v = w.getElementsByTagName("form");
                if (v && v.length >= 1) {
                    var H = false;
                    for (var A = 0, D = v.length; A < D; A++) {
                        if (v[A].filterValue) {
                            v[A].filterValue.focus();
                            H = true;
                            break;
                        }
                    }
                }
                w.closeDialog = function () {
                    E.trigger(c);
                };
                s.resolve(w);
            } catch (C) {
                h.warn("Error while loading dialog: " + C.message);
                s.reject();
            }
        };
        if (r.substring(0, 1) === "#") {
            var t = r.substring(1);
            u({responseText: '<div id="content">' + document.getElementById(t).innerHTML + "</body>"});
        } else {
            b.get(r.split(" ")[0]).then(function (v) {
                if (v.indexOf("login-form") > -1 && v.indexOf("j_username") > -1) {
                    s.reject();
                    document.location.href = r;
                    return;
                }
                u({responseText: v});
            }, function () {
                u({responseText: '<body><div id="content">Unable to load data</div></body>'});
            });
        }
        var p = s.promise();
        p.closeDialog = function () {
            b("#dialog").trigger(c);
        };
        p.asModal = function () {
            b("#dialog").unbind(c);
            b(".ca-dialog-close").hide();
            return p;
        };
        return p;
    }

    function i() {
        b(document.body).off("click.ui-data-dialog").on("click.ui-data-dialog", "[data-dialog]", function (s) {
            var t = b(s.target).closest("[data-dialog]"), q = t.attr("href"), r = t.attr("data-dialog"), p = t.attr("data-dialog-hide");
            if (typeof p === "undefined") {
                p = "true";
            }
            s.preventDefault();
            l.event("B_DIALOG", {text: b.trim(t.text()), target: q});
            n(q || r, p).then(function (u) {
                t.trigger(m, u);
            });
        });
    }

    return {init: i, bindEscape: g, createDialog: n, EV_DIALOG_CREATED: m, EV_DIALOG_CLOSED: c};
});
define("util/Browser", ["jquery"], function (b) {
    function c() {
        var h = {browser: {}};
        (function (t) {
            var r, s;
            t.uaMatch = function (v) {
                v = v.toLowerCase();
                var u = /(chrome)[ \/]([\w.]+)/.exec(v) || /(webkit)[ \/]([\w.]+)/.exec(v) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(v) || /(msie) ([\w.]+)/.exec(v) || /(trident)(?:.*?)rv:([\w+.]+)/.exec(v) || v.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(v) || [];
                return {browser: u[1] || "", version: u[2] || "0"};
            };
            r = t.uaMatch(navigator.userAgent);
            s = {};
            if (r.browser) {
                s[r.browser] = true;
                s.version = r.version;
            }
            if (s.chrome) {
                s.webkit = true;
            } else {
                if (s.webkit) {
                    s.safari = true;
                } else {
                    if (s.trident) {
                        s.msie = true;
                    }
                }
            }
            t.browser = s;
            t.sub = function () {
                function u(x, y) {
                    return new u.fn.init(x, y);
                }

                t.extend(true, u, this);
                u.superclass = this;
                u.fn = u.prototype = this();
                u.fn.constructor = u;
                u.sub = this.sub;
                u.fn.init = function w(x, y) {
                    if (y && y instanceof t && !(y instanceof u)) {
                        y = u(y);
                    }
                    return t.fn.init.call(this, x, y, v);
                };
                u.fn.init.prototype = u.fn;
                var v = u(document);
                return u;
            };
        })(h);
        var m = function (v, s, t) {
            var r = t.toString().split(/\D+/).slice(0, 2), u, w;
            v.push(s);
            for (u = 0, w = r.length; u < w; u = u + 1) {
                v.push(s + r.slice(0, u + 1).join("_"));
            }
        }, d = ["js"], e = navigator.platform, g = navigator.userAgent, f = /(android)(\s*([\d\.]+))?/i.exec(g) || /^(Linux)(\s*(\w+))/.exec(e) || /(Iphone)/i.exec(e) || /(Ipad)/i.exec(e) || /(MacIntel)/i.exec(e) || /(Win)/i.exec(e), k = {
            win: "windows",
            linux: "linux",
            iphone: "iphone",
            ipad: "ipad",
            macintel: "mac"
        };
        if (h.browser.msie) {
            adyen.browser = "ie" + h.browser.version;
            m(d, "ie", h.browser.version);
        } else {
            if (h.browser.chrome) {
                var l = navigator.userAgent.match(/Chrome\/([\d\.]+)/)[1];
                if (l) {
                    adyen.browser = "chrome" + l;
                    m(d, "chrome", l);
                } else {
                    adyen.browser = "chrome" + h.browser.version;
                    d.push("chrome");
                    d.push("chrome" + h.browser.version);
                }
            } else {
                if (h.browser.webkit) {
                    m(d, "webkit", h.browser.version);
                    adyen.browser = "webkit" + h.browser.version;
                } else {
                    if (h.browser.mozilla) {
                        m(d, "ff", h.browser.version);
                        adyen.browser = "ff" + h.browser.version;
                    } else {
                        if (h.browser.safari) {
                            m(d, "safari", h.browser.version);
                            adyen.browser = "safari" + h.browser.version;
                        } else {
                            if (h.browser.opera) {
                                m(d, "opera", h.browser.version);
                                adyen.browser = "opera" + h.browser.version;
                            }
                        }
                    }
                }
            }
        }
        if (d.length === 0) {
            m(d, "-x", h.browser.version);
        }
        if (f && f[1]) {
            var q = false, o = f[1].toLowerCase(), p = k[o] ? k[o] : o, n, i, j;
            adyen.platform = p;
            d.push(p);
            if (o === "macintel") {
                d.push(o);
            } else {
                if (o === "iphone" && (q = navigator.userAgent.match(/iphone os ([\d\_]+)/i))) {
                    n = q[1].split("_")[0];
                    d.push("ios ios" + n);
                } else {
                    if (o === "ipad" && (q = navigator.userAgent.match(/os ([\d\_]+)/i))) {
                        n = q[1].split("_")[0];
                        d.push("ios ios" + n);
                    } else {
                        if (o === "android" && (q = navigator.userAgent.match(/android ([\d\.]+)/i))) {
                            n = q[1].split(/\./)[0];
                            i = q[1].split(/\./)[1] || 0;
                            j = q[1].split(/\./)[2] || 0;
                            d.push("android android" + n + " android" + n + "_" + i + " android" + n + "_" + i + "_" + j);
                        }
                    }
                }
            }
        }
        if ("ontouchstart" in window) {
            d.push("touch");
        } else {
            d.push("notouch");
        }
        b(document.documentElement).addClass(d.join(" "));
    }

    function a() {
        c();
    }

    return {init: a, detectUserAgent: c};
});
define("widgets/SystemOverview", ["jqueryExtended", "Constants", "ui/Collapse"], function (c, a, d) {
    function b(e) {
        this.isCollapsed = true;
        this.api = e;
        this.updateNode();
        var g = this, f = this.api.getNode();
        f.bind(a.EV_CONTENT_MERGED, function () {
            g.updateNode();
        });
        f.bind(a.EV_CONTENT_SHOW, function () {
            g.isCollapsed = false;
        });
        f.bind(a.EV_CONTENT_HIDE, function () {
            g.isCollapsed = true;
        });
        e.ready();
    }

    b.prototype.updateNode = function () {
        var e = this.api.getNode(), g = e.getOrGenerateId(), f = e.find(".csr-so-uptodate").parents("tr").length;
        if (f > 3) {
            e.append('<div style="text-align:center;line-height:2em"><a data-collapse="#' + g + ' .csr-so-uptodate?position=below&no-caret">Also show ' + f + " up to date jobs</a></div>");
            if (this.isCollapsed) {
                e.find(".csr-so-uptodate").hide();
            }
            d.createCollapse(e);
        }
    };
    return b;
});
define("ui/Form/FieldWithDefaults", ["jqueryExtended"], function (b) {
    function a(m) {
        if (m.parameters.options) {
            var e = this.$node = m.getNode();
            var g = b("<select></select>").insertBefore(e), c;
            var h = m.parameters.options.split(/\s*,\s*/);
            var l = m.parameters.other || "";
            var j = e.clone().attr("name", "").attr("value", "").attr("id", "").attr("data-widget", "");
            var f = e.val() || "";
            var i = false;
            var k = ": ";
            while (h.length > 0) {
                var d = h.shift();
                c = b("<option></option>").val(d).text(d).appendTo(g);
                if (f === d) {
                    c.attr("selected", "selected");
                    i = true;
                }
            }
            if (l) {
                c = b("<option></option>").val(l).text(l).appendTo(g);
                if (f.substring(0, l.length) === l) {
                    j.val(f.substring(l.length + k.length));
                    c.attr("selected", "selected");
                    i = true;
                }
                j.change(function () {
                    g.change();
                });
                j.insertAfter(g);
                j.attr("placeholder", "Please specify");
            }
            if (e.is(".csr-required") && !i) {
                b("<option></option>").text("Please choose").prependTo(g);
            }
            g.change(function () {
                var n = g.val();
                if (n === l) {
                    j.prop("disabled", false).show();
                    n += k + j.val();
                } else {
                    j.prop("disabled", true).hide();
                }
                if (e.val() !== n) {
                    e.val(n).change();
                }
            });
            e.hide();
            g.change();
        }
        m.ready();
    }

    return a;
});
define("data/Observable", ["jquery", "util/Namespace", "util/Console"], function (e, d, c) {
    var b = function (f, g) {
        this._restricted = g || false;
        this._data = typeof f === "object" ? f : {};
        this._delta = {};
        this._observers = [];
        this.id = "observable";
    };
    var a = d.defineClass("AAB.data.Observable", function () {
        var f = {};
        f.getData = function () {
            return this._data;
        };
        f.setProperty = function (h, j, g) {
            if (this._restricted && typeof this._data[h] === "undefined") {
                c.dir({error: 'Not allowed to set property "' + h + '" on restricted dataprovider', provider: this});
                throw new Error("Not allowed to set property " + h + " on restricted dataprovider.");
            }
            var i = this.getPendingChanges();
            if (this._data[h] !== j) {
                i++;
                this._delta[h] = j;
                this._data[h] = j;
            }
            if (i === 0) {
                return false;
            }
            if (typeof g === "undefined" || g) {
                this.notify();
            }
            return true;
        };
        f.setProperties = function (j, h) {
            var i = this.getPendingChanges();
            for (var g in j) {
                if (j.hasOwnProperty(g)) {
                    if (this.setProperty(g, j[g], false)) {
                        i++;
                    }
                }
            }
            if (i === 0) {
                return false;
            }
            if (typeof h === "undefined" || h) {
                this.notify();
            }
            return true;
        };
        f.getPendingChanges = function () {
            var g = 0;
            for (var h in this._delta) {
                if (this._delta.hasOwnProperty(h)) {
                    g++;
                }
            }
            return g;
        };
        f.invalidate = function (g) {
            this._delta.__invalidate = g;
            this.notify();
        };
        f.getProperty = function (g) {
            return this._data[g];
        };
        f.hasProperty = function (g) {
            return (typeof this._data[g] !== "undefined");
        };
        f.registerObserver = function (h, j, i) {
            var g;
            if (typeof h === "function") {
                g = h;
                h = {notify: g, id: i};
            } else {
                c.warn("[Observable] You are trying to register something other than a function as an observer. This won't work");
                return false;
            }
            if (this.deregisterObserver(g, true)) {
                c.warn("[Observable] You are registering the same observer twice. We kindly removed the earlier observer, and re-registered it.");
            }
            if (j) {
                h.notify(this._data);
            }
            this._observers.push(h);
            return true;
        };
        f.deregisterObserver = function (h, g) {
            for (var j = 0, k = this._observers.length;
                 j < k; j++) {
                if (this._observers[j].notify === h) {
                    this._observers.splice(j, 1);
                    return true;
                }
            }
            if (!g) {
                c.warn("You are trying deregistering an observer that hasn't been previously registered as an observer.");
            }
            return false;
        };
        f.notify = function () {
            var h = this._delta;
            this._delta = {};
            this._observers.reverse();
            for (var g = this._observers.length - 1;
                 g > -1; g--) {
                if (typeof this._observers[g] === "undefined") {
                    continue;
                }
                this._observers[g].notify(h, this.id);
            }
            this._observers.reverse();
        };
        return f;
    }, b);
    return a;
});
define("util/Implement", [], function () {
    return {
        fromTo: function (b, c) {
            for (var a in b.prototype) {
                if (!c.prototype.hasOwnProperty(a)) {
                    c.prototype[a] = b.prototype[a];
                }
            }
        }
    };
});
define("util/Features", ["jquery"], function (f) {
    var c = {};
    var b = new f.Deferred();
    b.resolve();
    var a = function () {
        return b.promise();
    };
    var d = new f.Deferred();
    d.reject();
    var e = function () {
        return d.promise();
    };
    c.Cookie = navigator.cookieEnabled ? a : e;
    c.FileUpload = !!(window.ProgressEvent && window.FileReader) ? a : e;
    c.FileApi = (window.File && window.FileReader && window.FileList && window.Blob) ? a : e;
    c.Unzip = function () {
        return c.FileApi();
    };
    c.init = function () {
        f(".csr-progressive[data-features]").each(function () {
            var h = f(this), j = h.attr("data-features").split(/\s*,\s*/g);
            var g = new f.Deferred();
            g.resolve(true);
            while (j.length > 0) {
                var i = j.shift();
                if (c.hasOwnProperty(i)) {
                    g = g.then(c[i]);
                }
            }
            g.done(function () {
                h.show();
            }).fail(function () {
                h.remove();
            });
        });
    };
    return c;
});
define("ui/ImageCarrousel", ["jquery"], function (b) {
    function a(e) {
        this.api = e;
        var d = e.getNode(), c = d.find("img"), f = c.length;
        if (c.length > 0) {
            d.css("cursor", "pointer").click(function () {
                c.filter(":visible").each(function () {
                    var g = b(this).next("img");
                    if (g.length > 0) {
                        b(g.get(0)).show();
                    } else {
                        b(c.get(0)).show();
                    }
                    b(this).hide();
                });
            });
        }
        e.ready();
    }

    return a;
});
define("ui/Form/Stepped", ["jqueryExtended", "Constants"], function (c, a) {
    function b() {
        c(document).ready(function () {
            c("form[data-stepped]").each(function () {
                var e = c(this), h = e.find("nav").outerHeight(), g = e.attr("data-stepped"), f = (g || "").match(/persist=(true|yes)/i);
                var d = e.find("nav .selected a");
                if (d.length === 0) {
                    d = e.findOne("nav a");
                }
                if (f) {
                    e.find("nav li a").each(function () {
                        var i = (this.href || "").split("#").pop();
                        if (i && (document.location.hash === i || document.location.hash === "#" + i)) {
                            d = c(this);
                        }
                    });
                }
                e.find("section").css("minHeight", h);
                e.on("click", "nav li", function (i) {
                    i.preventDefault();
                    var k = c(i.target).closest("li"), j = (k.find("a[href]").attr("href") || "").split("#")[1];
                    if (j) {
                        if (f) {
                            document.location.hash = "#" + j;
                        }
                        e.find("section").hide();
                        e.find("#" + j).show();
                        i.preventDefault();
                        if (!k.is(".csr-active")) {
                            e.find("nav li.csr-active").removeClass("csr-active").trigger(a.EV_CONTENT_HIDE);
                            k.addClass("csr-active").trigger(a.EV_CONTENT_SHOW);
                            k.scrollIntoView();
                        }
                    }
                });
                e.unbind("click.ui-form-stepped").on("click.ui-form-stepped", ".csr-next-button", function () {
                    e.find("nav li.csr-active").next("li").find("a[href]").click();
                });
                d.click();
            });
        });
    }

    return {init: b};
});
define("ui/Form/Prefill", ["jqueryExtended"], function (a) {
    return function (b) {
        var c = b.getNode();
        c.click(function (g) {
            var f = a(g.currentTarget).closest("form")[0];
            for (var e = 0, h = f.elements.length; e < h; e++) {
                var d = f.elements[e];
                if (!d || !b.parameters[d.name]) {
                    continue;
                }
                if (a(d).is(":checkbox,:radio")) {
                    d.checked = (d.value === b.parameters[d.name]);
                } else {
                    d.value = b.parameters[d.name];
                }
            }
        });
        b.ready();
    };
});
define("util/Callback", [], function () {
    var a = 300, c = {};

    function b(d, e, f) {
        if (typeof e === "function") {
            f = e;
            e = a;
        }
        return function () {
            clearTimeout(c[d]);
            c[d] = setTimeout(f, e);
        };
    }

    return {pace: b};
});
define("util/Type", [], function () {
    return {
        isArray: function (a) {
            return Object.prototype.toString.call(a) === "[object Array]";
        }
    };
});
define("service/Currency", ["jquery", "util/Console"], function (e, b) {
    adyen.data = adyen.data || {};
    var d = {}, c, a = b.getLog("service/Currency");
    d.getCurrencies = function () {
        if (!c) {
            var f = new e.Deferred();
            if (adyen.data && adyen.data.currency) {
                f.resolve(adyen.data.currency);
            } else {
                if (adyen.config && adyen.config.currencyService) {
                    require(["util/Ajax"], function (g) {
                        g.getJSON(adyen.config.currencyService).then(function (h) {
                            adyen.data.currency = adyen.data.currency || {};
                            e.extend(true, adyen.data.currency, h);
                            f.resolve(adyen.data.currency);
                        }, function (j, h, i) {
                            f.reject("Currenct data is not available: " + i);
                        });
                    }, function (g) {
                        f.reject("Currenct data is not available: " + g);
                    });
                }
            }
            c = f.promise();
        }
        return c;
    };
    return d;
});
define("ui/Form/CurrencyMinorUnit", ["jqueryExtended", "service/Currency", "util/Number", "util/Console"], function (f, d, h, c) {
    var b, a = c.getLog("ui/Form/CurrencyMinorUnit");
    var g = "csr-widget-error";

    function e(i) {
        var j = this.$node = i.getNode();
        var k = this;
        b = b || d.getCurrencies();
        b.then(function (l) {
            k.currencyData = l;
            j.find("input,select").each(function () {
                var n = f(this), m = this.name;
                if (!m) {
                    return;
                }
                if (m === i.parameters.currencyField) {
                    k.$currencyField = n;
                } else {
                    if (m === i.parameters.amountField) {
                        k.$amountField = n;
                    }
                }
            });
            if (k.$currencyField && k.$amountField) {
                k.bindCurrencyField();
                k.bindAmountField();
            } else {
                j.addClass(g);
                a.warn("Either currencyField or widget field is not configured correctly.");
            }
        }, function (l) {
            j.addClass(g);
            a.warn("Error loading widget.", l);
        }).always(function () {
            i.ready();
        });
    }

    e.prototype.bindCurrencyField = function () {
        var i = this;
        i.$currencyField.change(function () {
            i.updateValue();
        });
    };
    e.prototype.bindAmountField = function () {
        var i = this;
        i.$stubField = i.$amountField.clone().attr("name", "").attr("id", "").insertBefore(i.$amountField);
        i.updateStub();
        i.$stubField.change(function () {
            i.updateValue(true);
        });
        i.$amountField.hide();
    };
    e.prototype.updateValue = function (l) {
        var k = this;
        var j = k.$currencyField.val(), i = k.$amountField.val();
        if (j && k.currencyData.hasOwnProperty(j)) {
            k.$amountField.val(Math.round(h.parseToNumber(k.$stubField.val()) * Math.pow(10, k.currencyData[j].exponent)));
        } else {
            k.$amountField.val(Math.round(h.parseToNumber(k.$stubField.val())));
        }
        if (l || k.$amountField.val() !== i) {
            this.updateStub();
        }
    };
    e.prototype.updateStub = function () {
        var j = this, i = this.$currencyField.val();
        var l = i && j.currencyData.hasOwnProperty(i) ? j.currencyData[i].exponent : 0;
        var k = h.parseToNumber(j.$amountField.val());
        if (l > 0) {
            k = (k / Math.pow(10, l)).toFixed(l);
        }
        this.$stubField.val(k);
    };
    return e;
});
define("ui/Table/TableModel", ["jqueryExtended"], function (d) {
    var c = "data-filter-name";

    function b(e) {
        return e.attr(c) || ((e.html() || "").split("<")[0] || "").replace(/^\s*|\s*$/g, "");
    }

    function a(f) {
        var e = d(f), g = e.data("headers");
        if (!g) {
            g = [];
            e.findOne("thead").find("tr:last").find("th,td").each(function () {
                var h = b(d(this));
                if (this.colSpan > 1) {
                    for (var j = 0; j < this.colSpan; j++) {
                        g.push(h + "-" + (j + 1));
                    }
                } else {
                    g.push(h);
                }
            });
            e.data("headers", g);
        }
        return g;
    }

    return {getHeaders: a, getColumnName: b};
});
define("ui/Table/RowModel", ["jqueryExtended", "ui/Table/TableModel"], function (d, c) {
    var a = "data-filter-value";

    function b(i, h) {
        var e = d(i), f = e.data("filter-model");
        if (!f) {
            f = {fullText: (e.text() || "").replace(/^\s+|\s+$/g, "").replace(/[\s\n\r\t]+/img, " ")};
            f.fullTextLowerCase = f.fullText.toLowerCase();
            e.data("filter-model", f);
        }
        if (h && !f.fields) {
            f.fields = {};
            var g = c.getHeaders(e.closest("table"));
            d.map(e.find("td,th"), function (j, k) {
                var l = d(j);
                f.fields[g[k]] = (l.text() || "").replace(/^\s+|\s+$/g, "").replace(/[\s\n\r\t]+/img, " ");
                if (l.attr(a)) {
                    f.fields[g[k]] = l.attr(a);
                }
            });
            e.data("filter-model", f);
        }
        return f;
    }

    return {getModel: b};
});
define("ui/Table/GroupSortable", ["jqueryExtended", "ui/Table/TableModel", "ui/Table/RowModel"], function (e, c, a) {
    var f = 0;
    var b = "js-ui-group-sortable-summary";

    function d(h) {
        var g = this;
        var j = this.groupId = "js-ui-group-sortable-" + (++f);
        this.$source = h.getNode();
        this.doSummaries = (h.parameters.summaries || "false").match(/^(true|yes|on|1)$/i);
        this.doCloneImages = (h.parameters.cloneImages || "false").match(/^(true|yes|on|1)$/i);
        this.removeSummariesForSingleItemGroups = (h.parameters.noOneItemGroups || "false").match(/^(true|yes|on|1)$/i);
        this.$table = e('<table class="csr-table-2"></table>').hide().insertBefore(this.$source);
        this.$table.append(this.$source.find("thead")).find("thead [data-filter], thead [rel]").remove();
        this.$table.find("[data-sortable]").each(function () {
            var k = e(this);
            k.attr("data-group-sortable", k.attr("data-sortable"));
            k.removeAttr("data-sortable");
        });
        this.$table.find("[data-group-sortable]").prepend('<input class="' + j + '-radio" type="radio" name="' + j + '" />').each(function () {
            this.innerHTML = "<label>" + this.innerHTML + "</label>";
        });
        this.groupRadioButtons = this.$table.find("[data-group-sortable] input." + j + "-radio").change(function () {
            g.updateUI();
        });
        var i = this.availableSortColumns = [];
        this.groupRadioButtons.closest("[data-group-sortable]").each(function () {
            i.push(c.getColumnName(e(this)));
        });
        this.$table.append("<tbody></tbody>").find("tbody").append(this.$source.find("tbody tr"));
        this.$rows = this.$table.find("tbody").find("tr");
        this.$source.hide();
        this.$table.show();
        this.$table.on("click", "." + b, function (l) {
            var k = e(l.target).closest("tbody");
            if (k.find("tr:hidden").length > 0) {
                k.find("tr").show();
            } else {
                k.find("tr").not("." + b).hide();
            }
        });
        this.groupRadioButtons.first().prop("checked", "checked").change();
        h.ready();
    }

    d.prototype.updateUI = function () {
        var q = this.$table;
        this.$rows = q.find("tbody tr").not("." + b);
        var m = c.getHeaders(q).length;
        var l = c.getColumnName(this.groupRadioButtons.filter(":checked").closest("[data-group-sortable]"));
        var u = this.$table.find("tbody").removeAttr("data-group-value").toArray();
        var s = {};
        var o = {};
        var t = this.availableSortColumns, j = t.length;
        var i = this.doSummaries;
        var h = this.doCloneImages;
        var r = this.removeSummariesForSingleItemGroups;
        this.$rows.each(function () {
            var w = e(this);
            var B = a.getModel(w, true);
            var v = (B.fields.hasOwnProperty(l) ? B.fields[l] : "") || "No value";
            if (!s.hasOwnProperty(v)) {
                if (u.length > 0) {
                    var C = s[v] = e(u.pop());
                    C.attr("data-group-value", v);
                } else {
                    s[v] = e("<tbody></tbody>").attr("data-group-value", v).appendTo(q);
                }
                if (s[v].findOne("." + b).length < 1) {
                    var z = e("<tr><th></th></tr>").addClass(b).appendTo(s[v]);
                    z.findOne("th").attr("colspan", m);
                }
            }
            w.appendTo(s[v]);
            s[v].find("." + b + " th").text(v);
            if (i) {
                o[v] = o[v] || {_values: []};
                for (var y = 0; y < j; y++) {
                    var x = t[y];
                    if (x !== l && B.fields.hasOwnProperty(x)) {
                        var A = o[v][x] = o[v][x] || {_values: []};
                        if (!A.hasOwnProperty(B.fields[x]) && B.fields[x]) {
                            A[B.fields[x]] = true;
                            A._values.push(B.fields[x]);
                            o[v]._values.push(B.fields[x]);
                        }
                    }
                }
            }
        });
        e(u).remove();
        var k = q.find("tbody");
        var n = 0;
        if (h) {
            var g = c.getHeaders(q);
            e.each(g, function (v, w) {
                if (w === l) {
                    n = v;
                }
            });
        }
        k.each(function () {
            var v = e(this);
            this.sortingKey = (v.attr("data-group-value") || "");
            this.sortingKeyLC = (this.sortingKey || "").toLowerCase();
            if (k.length === 1) {
                v.find("tr").show();
                v.find("." + b).hide();
            } else {
                if (this.rows.length <= 2 && r) {
                    v.find("tr").show();
                    v.find("." + b).hide();
                } else {
                    v.find("tr").not("." + b).hide();
                    var x = v.find("tr." + b).show();
                    var z = x.find("th,td").append(" (" + (this.rows.length - 1) + ")");
                    if (i) {
                        var A = o[this.sortingKey];
                        for (var w in A) {
                            if (A.hasOwnProperty(w) && A[w].hasOwnProperty("_values") && A[w]._values.length > 0) {
                                var y = false;
                                if (A[w]._values.length > 3) {
                                    y = w + ": <" + A[w]._values.length + " values>";
                                } else {
                                    if (A[w]._values.length === 1) {
                                        y = w + ": " + A[w]._values[0];
                                    } else {
                                        y = w + ": " + A[w]._values.join(", ");
                                    }
                                }
                                if (y) {
                                    e('<span class="pg-value-hint"></span>').text(y).appendTo(z);
                                }
                            }
                        }
                    }
                    if (h) {
                        z.prepend(v.findOne("tr:eq(1)").find("td,th").eq(n).findOne("img").clone().css("margin-right", 10));
                    }
                }
            }
        });
        k.sort(function (w, v) {
            return w.sortingKeyLC === v.sortingKeyLC ? 0 : (w.sortingKeyLC > v.sortingKeyLC ? 1 : -1);
        });
        var p = false;
        e.each(k, function (v, w) {
            if (v > 0) {
                e(w).insertAfter(p);
            }
            p = this;
        });
    };
    return d;
});
define("ui/slideshow", ["jquery"], function (b) {
    function a(f, d) {
        var c = b(f), e = this;
        this.$node = c;
        this.$activePage = b(document.getElementById("ui-slideshow-doesnt-exist"));
        this.config = b.extend({
            itemSelector: "ol[data-slideshow]>li",
            applicableSelector: ':not([data-applicable="no"])'
        }, d || {});
        c.on("click", "a:not(.csr-disabled)", function (g) {
            switch (g.currentTarget.rel) {
                case"next":
                    e.next();
                    break;
                case"previous":
                    e.previous();
                    break;
                case"play":
                    e.play();
                    break;
                case"stop":
                    e.stop();
                    break;
            }
        });
        c.on("dialogNext,dialogPrevious,dialogPlay,dialogStop", function (g) {
            switch (g.type) {
                case"dialogNext":
                    e.next();
                    break;
                case"dialogPrevious":
                    e.previous();
                    break;
                case"dialogPlay":
                    e.play();
                    break;
                case"dialogStop":
                    e.stop();
                    break;
            }
        });
        this.setPage(0);
    }

    a.prototype.getPages = function () {
        var e = this.$node.find(this.config.itemSelector), d = [], c = this.config.applicableSelector;
        if (c) {
            e.each(function () {
                if (b(this).is(c)) {
                    d.push(this);
                } else {
                    b(this).hide();
                }
            });
        } else {
            d = e;
        }
        this.$pages = b(d);
        return this.$pages;
    };
    a.prototype.setPage = function (c) {
        this.$pages = this.getPages();
        if (c < 0) {
            c = 0;
        } else {
            if (c >= this.$pages.length) {
                c = this.$pages.length - 1;
            }
        }
        this.page = c;
        this.updateUI();
    };
    a.prototype.next = function () {
        this.stop();
        this.setPage(this.page + 1);
    };
    a.prototype.previous = function () {
        this.stop();
        this.setPage(this.page - 1);
    };
    a.prototype.play = function () {
        var c = this, d = new b.Event("onBeforeDialogPlay");
        this.$node.trigger(d);
        if (!d.isDefaultPrevented()) {
            this.nextStep = setTimeout(function () {
                c.next();
                c.play();
            }, this.config.timeout);
        } else {
            this.nextStep = d.interval;
        }
    };
    a.prototype.stop = function () {
        clearInterval(this.nextStep);
    };
    a.prototype.updateUI = function () {
        var d = this, c = new b.Event("contentShow");
        c.pageNumber = d.page;
        c.total = d.$pages.length;
        this.$pages.each(function (e) {
            if (e === d.page) {
                d.$activePage = b(this);
                d.$activePage.show().trigger(c);
            } else {
                b(this).hide();
            }
        });
    };
    a.prototype.getActivePage = function () {
        return this.$activePage;
    };
    return a;
});
define("ui/CriteriaBuilder", ["jqueryExtended", "Constants", "util/Console"], function (c, a, f) {
    var g = f.getLog("ui/CriteriaBuilder");
    var d = "[data-criteria-container]", m = "[data-criteria-group]", e = "[data-criteria-group-row]", b = "[data-criteria-group-content]", k = "[data-criteria]", j = "[data-criteria-row]", l = "[data-criteria-content]", o = "[data-criteria-remove]", h = "[data-criteria-add]", i = c(d), q = ":visible", p = ":empty";

    function n(r) {
        this.$node = r.getNode();
        this.init();
        r.ready();
    }

    n.prototype.init = function () {
        this.duplicateCriteria();
        this.removeCriteria();
    };
    n.prototype.duplicateCriteria = function () {
        i.unbind().on("click", h, function () {
            var v = c(this), w = v.parents(d), t = v.parents(e), B = w.find(m), z = t.find(k), s = t.find(l), x = w.find(b), r, A, y;

            function u(C, D) {
                if (v.prev().is(C)) {
                    r = D.clone().contents().appendTo(C);
                    y = r.find(o);
                    A = r.find(l);
                    if (D === B) {
                        if (!A.is(p)) {
                            A.empty();
                        }
                        if (!y.is(q)) {
                            y.show();
                        }
                        r.find(h).trigger("click");
                    }
                }
            }

            u(s, z);
            u(x, B);
        });
    };
    n.prototype.removeCriteria = function () {
        i.on("click", o, function () {
            var r = c(this);

            function s(t) {
                if (r.parent().is(t)) {
                    r.parent(t).remove();
                }
            }

            s(j);
            s(e);
        });
    };
    return n;
});
define("calendar/DatePickerCollection", ["jqueryExtended", "json", "util/Css", "calendar/datepicker", "util/Date"], function (h, g, c, b, f) {
    var e = function () {
        e = function () {
        };
        c.addLink(adyen.base + "js/calendar/datepicker.css");
    };

    function a() {
        e();
        h(document).ready(function () {
            h("[data-date-picker-collection]").each(function () {
                var i = h(this);
                var j = g.parse(i.attr("data-date-picker-collection"));
                d.init(i, j.useLatestDay);
            });
        });
    }

    var d = {
        init: function (i, k) {
            this.useLatestDay = (typeof k !== "undefined") ? k : true;
            h(".calendar-holder").css("display", "block");
            this.startDate = i.find("#datepickStart");
            this.endDate = i.find("#datepickEnd");
            this.dpStartElement = this.startDate;
            this.dpEndElement = this.endDate;
            var j = i.find("#checkMessage")[0];
            this.dpStartIcon = i.find("#datepickStart-icon");
            this.dpEndIcon = i.find("#datepickEnd-icon");
            this.granularity = i.find("#datepickGranularity");
            this.dpStart = new b(this.dpStartElement[0], {
                dateFormat: "Y-m-d",
                useToday: this.useLatestDay,
                linkedToTimeline: false
            }, j, this.dpStartIcon[0], this.granularity[0]);
            if (this.endDate.length) {
                this.dpEnd = new b(this.dpEndElement[0], {
                    dateFormat: "Y-m-d",
                    useToday: this.useLatestDay,
                    linkedToTimeline: false
                }, j, this.dpEndIcon[0], this.granularity[0]);
            }
            this.startDate.on("change", {datepicker: this.dpStart}, h.proxy(this.checkDate, this));
            this.endDate.on("change", {datepicker: this.dpEnd}, h.proxy(this.checkDate, this));
            this.startDate.on("blur", {datepicker: this.dpStart}, h.proxy(this.inputBlur, this));
            this.endDate.on("blur", {datepicker: this.dpEnd}, h.proxy(this.inputBlur, this));
            this.granularity.on("change", h.proxy(this.checkGranularity, this));
            if (this.dpStartElement[0].value.length) {
                var l = this.getDates(this.dpStartElement[0].value);
                this.dpStart.updateMonth(l[0], l[1]);
            }
        }, getDates: function (i) {
            var l = i.split("-");
            var j = l[0];
            var k = Number(l[1]) - 1;
            return [k, j];
        }, checkDate: function (m) {
            var l = m.data.datepicker;
            var k = {};
            var i = (this.granularity[0]) ? this.granularity[0].value : "day";
            var j = this.endDate[0];
            if (!j) {
                k.data = {
                    startDate: this.startDate[0],
                    callback: h.proxy(this.submitDates, this),
                    useToday: this.useLatestDay,
                    granularity: i
                };
                l.checkDateSingle(k);
            } else {
                k.data = {
                    startDate: this.startDate[0],
                    endDate: this.endDate[0],
                    callback: h.proxy(this.submitDates, this),
                    useToday: this.useLatestDay,
                    granularity: i
                };
                l.checkDate(k);
            }
        }, inputBlur: function (k) {
            var j = k.data.datepicker;
            var i = this.getDates(k.currentTarget.value);
            j.updateMonth(i[0], i[1]);
        }, submitDates: function (k, j, i) {
            if (window.submitDates) {
                window.submitDates(k, j, i);
            }
        }, checkGranularity: function () {
            var j = this.startDate[0].value;
            var k = this.endDate[0].value;
            var i = this.granularity[0].value;
            var l = this.dpStart.checkGranularity(j, k, i);
            if (l) {
                window.submitGranularity(i);
            }
        }, clearErrors: function () {
            this.dpStart.clearMessage();
            this.dpEnd.clearMessage();
        }
    };
    return {init: a};
});
define("ui/List", ["jqueryExtended", "Constants", "util/Console"], function (y, N, aa) {
    var V = aa.getLog("ui/List");
    var ad = "ul", ao = "li", K = "a", D = "i", ar = "div", R = "span", b = "input", x = "label", A = "csr-list-container-2", a = "." + A, af = ".csr-list-2", ap = ".csr-label-2", aW = "csr-label-2 checkbox", F = ".csr-label-2.checkbox", aM = "csr-input-2", Q = "." + aM, aG = "csr-input-checkbox-2", t = "." + aG, aq = "csr-button-2 secondary", n = ".csr-button-2", O = "csr-button-container-2", v = "." + O, aR = v + " .notification-message", aL = ":visible", G = ":hidden", Y = ":not", J = ":checked", ai = ":last", i = "disabled", az = "selected", at = "initial-value", Z = "data-list-id", aC = "data-list-item", H = "data-list-item-count", g = "data-list-relation-item", an = "data-list-relation-name", B = "show", au = "static", p = "clearfix", k = "." + au, C = "has-nested", W = "nested-selected", S = "has-toggle", aJ = "toggle", E = "." + aJ, ae = "Select all", aX = "Deselect all", aS = "has-icon", q = "Select item", f = "list-placeholder", aP = "." + f, e = aP + " " + R, L = "has-count", c = "count", al = "." + c, aU = "." + c + " " + R, o = "has-filter", ak = "filter", aV = "." + ak, aA = "icon-times-circle", aB = "no-items", aN = "." + aB, ac = "No items found", r = "has-relation", u = "has-relation-text", U = "has-relation-item", aI = "has-relation-value", aD = "." + aI, w = "This value has been selected in ", ah = "btn-relation-change", M = "." + ah, h = "Change", aH = "btn-relation-cancel", ax = "." + aH, d = "Cancel", ay = "csr-list-group-container-2", ag = "." + ay, P = "csr-list-group-2", aQ = "." + P, am = "group-list-item", j = "." + am, X = "group-label", aK = "." + X, z = "button", aE = "." + z, m = "button-container", aZ = "." + m, aj = "button-content", T = "." + aj, aT = "list-extension", aw = "." + aT, l = "csr-list-extension-2", aY = "." + l, aO = "list-extension-content", I = "." + aO, av = "list-extension-position-right", aF = "autocomplete-container", s = "." + aF;

    function ab(a0) {
        this.$node = a0.getNode();
        this.parameterName = a0.parameters.name;
        this.parameterCount = a0.parameters.count;
        this.parameterCountName = a0.parameters.countName;
        this.parameterIcon = a0.parameters.icon;
        this.parameterFilter = a0.parameters.filter;
        this.parameterToggle = a0.parameters.toggle;
        this.parameterRelation = a0.parameters.relation;
        this.parameterRelationName = a0.parameters.relationName;
        this.parameterRelationSelected = a0.parameters.relationSelected;
        this.parameterGroupName = a0.parameters.groupName;
        this.parameterGroupContainer = a0.parameters.groupContainer;
        this.parameterGroup = a0.parameters.group;
        this.parameterAutocomplete = a0.parameters.autoComplete;
        this.parameterAutocompleteType = a0.parameters.autoCompleteType;
        this.parameterValueGroup = a0.parameters.valueGroup;
        this.init();
        a0.ready();
    }

    ab.prototype.init = function () {
        this.wrapList();
        this.generateListItemId();
        this.generateRelationListItemId();
        this.generateInitialValue();
        this.createToggle();
        this.createFilter();
        this.createIcon();
        this.createName();
        this.createCounter();
        this.createGroup();
        this.createGroupItems();
        this.createExtension();
        this.createButton();
        this.createAutocompleteList();
        this.toggleList();
        this.toggleNestedList();
        this.changeFilter();
        this.labelChange();
        this.labelChangeToggle();
        this.labelChangeRelation();
        this.labelChangeRelationSelected();
        this.labelChangeName();
        this.labelChangeCounter();
        this.labelChangeGroup();
        this.clickGroupItem();
        this.checkSelected();
        this.closeList();
    };
    ab.prototype.wrapList = function () {
        this.$node.each(function () {
            var a0 = y(this);
            a0.hide();
            a0.wrap("<" + ar + ' class="' + A + '"></' + ar + ">");
        });
    };
    ab.prototype.generateListItemId = function () {
        y(af).each(function (a1) {
            var a2 = y(this), a0 = 1;
            a2.attr(Z, a1 + 1);
            a2.find(ao).each(function () {
                var a4 = y(this), a3 = a4.parent(af).attr(Z);
                if (!a4.hasClass(au)) {
                    a4.attr(aC, a3 + "-" + a0++);
                }
            });
        });
    };
    ab.prototype.generateRelationListItemId = function () {
        var a0 = this.parameterRelation;
        if (typeof a0 !== "undefined") {
            this.$node.each(function () {
                var a2 = y(this), a1 = 1;
                a2.find(ao).each(function () {
                    var a3 = y(this);
                    if (!a3.hasClass(au)) {
                        a3.attr(g, a0 + "-" + a1++);
                    }
                });
            });
        }
    };
    ab.prototype.generateInitialValue = function () {
        this.$node.each(function () {
            var a0 = y(this);
            a0.find(ao).each(function () {
                var a1 = y(this);
                if (a1.find(t).is(J)) {
                    a1.addClass(at);
                }
            });
        });
    };
    ab.prototype.createToggle = function () {
        var a0 = this.parameterToggle, a1 = this.parameterRelation;
        if (a0 === "true") {
            this.$node.each(function () {
                var a2 = y(this);
                a2.parent(a).addClass(S);
                a2.prepend("<" + ao + ' class="' + aJ + " " + au + '"><' + x + ' class="' + aW + '"><' + b + ' type="checkbox" class="' + aG + '"><' + R + ">" + ae + "</" + R + "></" + x + "></" + ao + ">");
                a2.find(E + " " + t).change(function () {
                    var a8 = y(this), a5 = a8.parents(af), a6 = a5.find(ao).not(k), a3 = a5.find(E + " " + R), a7 = a5.find(F), a4 = a5.find(ao + ai + " " + F);
                    if (a8.is(J)) {
                        a7.find(t).not(J).trigger("click");
                        a3.text(aX);
                        a8.parents(a).find(e).text(a4.text());
                    } else {
                        a7.find(t).trigger("click");
                        a3.text(ae);
                        if (typeof a1 !== "undefined") {
                            a6.each(function () {
                                y(this).find(ax).trigger("click");
                            });
                        }
                    }
                });
            });
        }
    };
    ab.prototype.createFilter = function () {
        var a0 = this.parameterFilter;
        if (a0 === "true") {
            this.$node.each(function () {
                var a1 = y(this), a2 = a1.parent(a);
                a2.addClass(o);
                a1.prepend("<" + ao + ' class="' + aB + " " + au + '"><' + ar + ">" + ac + "</" + ar + "></" + ao + ">");
                a1.prepend("<" + ao + ' class="' + ak + " " + au + '"><' + b + ' type="text" autocomplete="off" class="' + aM + '"><' + D + ' class="' + aA + '"></' + D + "></" + ao + ">");
            });
        }
    };
    ab.prototype.createIcon = function () {
        var a0 = this.parameterIcon;
        if (typeof a0 !== "undefined") {
            this.$node.each(function () {
                var a1 = y(this), a2 = a1.parent(a);
                a2.addClass(aS);
                a2.prepend("<" + ar + ' class="' + f + '"><' + D + ' class="' + a0 + '"></' + D + "></" + ar + ">");
            });
        }
    };
    ab.prototype.createName = function () {
        var a0 = this.parameterName;
        this.$node.each(function () {
            var a1 = y(this), a2 = a1.parent(a);
            if (typeof a0 !== "undefined") {
                a2.prepend("<" + ar + ' class="' + f + '"><' + R + ">" + a0 + "</" + R + "></" + ar + ">");
            } else {
                if (!a2.find(aP).length) {
                    a2.prepend("<" + ar + ' class="' + f + '"><' + R + ">" + q + "</" + R + "></" + ar + ">");
                }
            }
        });
    };
    ab.prototype.createCounter = function () {
        var a1 = this.parameterCount, a0 = this.parameterName, a2 = this.parameterCountName;
        this.$node.each(function () {
            var a8 = y(this), a6 = az, a5 = a8.find(t + J), a7 = parseInt(a5.not(a8.find(ao + k + " " + t)).length), a9 = a8.parent(a), a4 = a9.find(e), a3 = a9.find("." + at + " " + x).text();
            if (typeof a2 !== "undefined") {
                a6 = a2;
            }
            if (a1 === "bottom") {
                a9.addClass(L);
                a9.append("<" + ar + ' class="' + c + '"><' + R + ">" + a7 + "</" + R + ">" + a6 + "</" + ar + ">");
                if (a7 === 0) {
                    a8.next(al).hide();
                }
            }
            if (a1 === "placeholder") {
                a9.addClass(L);
                if (a5) {
                    if (typeof a0 !== "undefined") {
                        a4.text(y(this).parent(F).text());
                    }
                }
                if (a7 > 1) {
                    a4.text(a7 + " " + a6);
                } else {
                    if (a7 === 1) {
                        a4.text(a3);
                    } else {
                        if (typeof a0 !== "undefined") {
                            a4.text(a0);
                        } else {
                            a4.text(q);
                        }
                    }
                }
            }
        });
    };
    ab.prototype.createGroup = function () {
        var a1 = this.parameterGroup, a0 = this.parameterGroupContainer;
        if (typeof a0 !== "undefined") {
            this.$node.each(function () {
                var a5 = y(this), a2 = a5.attr(Z), a3 = a5.find(t + J).length, a4 = a1.split(","), a6 = y("#" + a0);
                if (a6.length) {
                    if (typeof a1 !== "undefined") {
                        y.each(a4, function () {
                            if (y("#" + this).find(aK).length < 1) {
                                a6.append("<" + ar + ' id="' + this + '" class="' + P + '" ' + Z + '="' + a2 + '"  ></' + ar + ">");
                            }
                            if (a3 > 0) {
                                y("#" + this).parent(ag).show();
                                y("#" + this).show();
                            } else {
                                y("#" + this).parent(ag).hide();
                            }
                        });
                    }
                }
            });
        }
    };
    ab.prototype.createGroupItems = function () {
        var a1 = this.parameterGroupName, a0 = this.parameterGroup;
        if (typeof a0 !== "undefined") {
            this.$node.each(function () {
                var a5 = y(this), a4 = a5.find(t + J), a3 = a4.parent(x), a2 = a0.split(",");
                y.each(a2, function () {
                    var a6 = y("#" + this);
                    if ((a6.find(aK).length < 1) && (typeof a1 !== "undefined")) {
                        a6.append("<" + ar + ' class="' + X + '">' + a1 + "</" + ar + ">");
                    }
                    a3.each(function () {
                        var a7 = y(this);
                        setTimeout(function () {
                            if (!y("#" + a0).find(j).is(aL)) {
                                y("#" + a0).parent(ag).show();
                            }
                            a6.prepend("<" + ar + ' class="' + am + '" ' + aC + '="' + a7.parent(ao).attr(aC) + '">' + a7.text() + "</" + ar + ">");
                        }, 50);
                    });
                });
            });
        }
    };
    ab.prototype.createAutocompleteList = function () {
        var a0 = this.parameterAutocomplete, a1 = this.parameterAutocompleteType, a2 = this.parameterValueGroup;
        if ((typeof a0 !== "undefined") && (typeof a2 !== "undefined") && (typeof a1 !== "undefined")) {
            this.$node.each(function () {
                var a6 = y(this), a4 = 1, a3 = a6.attr(Z), a7 = a6.parent(a), a5 = a6.find(aV + " " + Q), a8 = a6.find(aN);
                a6.attr(H, a4);
                a5.on("keyup change", function () {
                    var ba = y(this), bb = ba.parents(af).attr(H), a9 = ba.val();
                    if (!a7.find(s).length) {
                        a7.append("<" + ar + ' class="' + aF + '" style="display: none;"></' + ar + ">");
                    }
                    a7.find(s).load(a0 + "?accountTypeCode=" + a1 + "&accountCodeSearch=" + a9, function (bc) {
                        var be = y(this), bd = be.find(ao);
                        bd.each(function () {
                            var bh = y(this), bj = bh.find(".name").text(), bf = bh.find(".informal").text();
                            if (bf.indexOf(a1) >= 0) {
                                var bg = y(this).length;
                                if (bg > 0) {
                                    if (!y("#" + bj).length) {
                                        var bi = bb++;
                                        a6.append('<li id="' + bj + '" ' + aC + '="' + a3 + "-" + bi + '"><label class="' + aW + '"><input type="checkbox" class="' + aG + '" data-value-group="' + a2 + '" value="' + bj + '">' + bj + "</label></li>");
                                        a6.attr(H, bi);
                                    }
                                    a8.hide();
                                    a7.find(s).remove();
                                } else {
                                    a8.show();
                                }
                            }
                        });
                    });
                });
            });
        }
    };
    ab.prototype.createButton = function () {
        this.$node.each(function () {
            var a4 = y(this), a6 = parseInt(a4.outerHeight()), a1 = a4.width(), a8 = parseInt(a4.css("top")), a3 = a4.find(ao + aE), a2 = a6 + a8, a7 = a4.parent(a), a5 = a3.find(n);
            if (a3.length) {
                a7.append("<" + ar + ' class="' + m + '" style="top: ' + a2 + "px; width: " + a1 + 'px;"><' + ar + ' class="' + aj + '"></' + ar + "></" + ar + ">");
                var a0 = a7.find(T);
                a5.appendTo(a0);
                a3.remove();
            }
        });
    };
    ab.prototype.createExtension = function () {
        this.$node.each(function () {
            var a5 = y(this), a1 = a5.find(ao + aw), a7 = a5.parent(a), a3 = a5.width() + 2, a4 = a1.find(I), a6, a0 = "", a2 = "";
            a1.remove();
            if (a1.length) {
                if (a1.hasClass(av)) {
                    a0 += "left: " + a3 + "px; ";
                }
                a2 = "<" + ar + ' class="' + l + ' hidden " style="' + a0 + '"></' + ar + ">";
                a7.append(a2);
                a6 = a7.find(aY);
                a4.appendTo(a6);
            }
        });
    };
    ab.prototype.toggleList = function () {
        this.$node.each(function () {
            var a3 = y(this), a4 = a3.parent(a), a0 = a4.find(aP), a2 = a4.find(aZ), a1 = a4.find(aY);
            a0.click(function (a5) {
                y(af).hide();
                a3.parent(a).toggleClass(B);
                if (a3.parent(a).hasClass(B)) {
                    a3.show();
                    a2.show();
                    a1.show();
                } else {
                    a3.hide();
                    a2.hide();
                    a1.hide();
                }
                a5.stopPropagation();
            });
        });
    };
    ab.prototype.toggleNestedList = function () {
        this.$node.each(function () {
            var a0 = y(this);
            a0.find(ao).click(function () {
                var a2 = y(this), a3 = a2.find(ap).next(ad), a1 = a2.find(t + J).length;
                if (a3.length) {
                    a2.toggleClass(C);
                    a3.toggle();
                    if (a1 > 0) {
                        a2.addClass(W);
                    } else {
                        a2.removeClass(W);
                    }
                }
            });
        });
    };
    ab.prototype.changeFilter = function () {
        var a1 = this.parameterFilter, a0 = this.parameterAutocomplete;
        if (a1 === "true") {
            this.$node.each(function () {
                var a3 = y(this), a4 = a3.parent(a), a2 = a3.find(aV + " " + Q);
                a2.on("keyup change", function () {
                    var a6 = y(this), a5 = a6.val().toLowerCase(), a7 = a6.parents(a).find(ao + " " + t).not(ao + k + " " + t);
                    a3.find(ao).each(function () {
                        if ((y(this).find(F).text().toLowerCase().search(a5) > -1) || y(this).hasClass(au)) {
                            y(this).show();
                        } else {
                            y(this).hide();
                            if (typeof a0 !== "undefined") {
                                if (y(this).find(t).is(J)) {
                                    y(this).show();
                                }
                            }
                        }
                    });
                    if (a3.find(ao).not(k).is(aL)) {
                        a3.find(aN).hide();
                    } else {
                        a3.find(aN).show();
                        a3.find(ao).show();
                    }
                    if (a5 === "") {
                        y(this).next(D).hide();
                        if (typeof a0 !== "undefined") {
                            a7.each(function () {
                                if (!y(this).is(J)) {
                                    y(this).parents(ao).not(k).remove();
                                }
                            });
                        }
                        if (a1 === "true") {
                            a4.find(E).show();
                        }
                    } else {
                        y(this).next(D).show();
                        if (a1 === "true") {
                            a4.find(E).hide();
                        }
                    }
                    y(this).next(D).click(function () {
                        y(this).prev(Q).val("");
                        y(this).hide();
                        a3.find(ao).show();
                        a3.find(aN).hide();
                        if (typeof a0 !== "undefined") {
                            a7.each(function () {
                                if (!y(this).is(J)) {
                                    y(this).parents(ao).not(k).remove();
                                }
                            });
                        }
                    });
                });
            });
        }
    };
    ab.prototype.labelChange = function () {
        var a0 = this.parameterGroup;
        this.$node.each(function () {
            var a1 = y(this);
            y(document).on("change", F, function () {
                var a4 = y(this), a5 = a4.parents(a), a3 = a5.find(t + J).last(), a2 = a5.find(e);
                if (a4.find(t).is(J)) {
                    a4.parent(ao).addClass(az);
                    if (!a4.parent(ao).hasClass(aJ)) {
                        a2.text(a4.text());
                    }
                    if (a4.parents(ao).hasClass(W)) {
                        a2.text(a4.parents(ao).find(E).text());
                    }
                } else {
                    a4.parent(ao).removeClass(az);
                    if (!a4.parent(ao).hasClass(aJ)) {
                        a2.text(a3.parent(F).text());
                    }
                }
            });
        });
    };
    ab.prototype.labelChangeToggle = function () {
        var a1 = this.parameterToggle, a2 = this.parameterGroup, a0 = this.parameterGroupContainer;
        if (typeof a1 !== "undefined") {
            this.$node.each(function () {
                var a3 = y(this);
                a3.find(F).change(function () {
                    var a5 = y(this), bc = a5.parents(a), a7 = a5.parents(af), bd = a7.find(E + " " + t), a8 = a7.find(E), bb = a7.find(E + " " + F + " " + R), a4 = parseInt(bc.find(t).length - 1), a6 = parseInt(bc.find(t + J).not(bc.find(ao + k + " " + t)).length);
                    if (a1 === "true") {
                        if (a5.find(t).is(J)) {
                            if (a4 === a6) {
                                bd.prop("checked", true);
                                bb.text(aX);
                                a8.addClass(az);
                                if ((a2 !== "undefined") && (a0 !== "undefined")) {
                                    bc.find(F).each(function () {
                                        var bf = y(this), be = a2.split(",");
                                        y.each(be, function () {
                                            var bg = y("#" + this);
                                            bf.each(function () {
                                                var bh = y(this), bj = bh.parent(ao).attr(aC), bi = [];
                                                bg.find(ar).each(function () {
                                                    bi.push(y(this).attr(aC));
                                                });
                                                if (y.inArray(bj, bi) === -1) {
                                                    bg.prepend("<" + ar + ' class="' + am + '" ' + aC + '="' + bh.parent(ao).attr(aC) + '">' + bh.text() + "</" + ar + ">");
                                                }
                                            });
                                        });
                                    });
                                }
                            }
                        } else {
                            bd.prop("checked", false);
                            bb.text(ae);
                            a8.removeClass(az);
                            if ((a2 !== "undefined") && (a0 !== "undefined")) {
                                var ba = a2.split(","), a9 = a5.parent(ao).hasClass(aJ);
                                if (a9) {
                                    y.each(ba, function () {
                                        var be = y("#" + this);
                                        be.find(j).each(function () {
                                            y(this).remove();
                                        });
                                    });
                                }
                            }
                        }
                    }
                });
            });
        }
    };
    ab.prototype.labelChangeName = function () {
        var a0 = this.parameterName, a1 = this.parameterIcon;
        this.$node.each(function () {
            var a2 = y(this);
            a2.find(F).change(function () {
                var a4 = y(this), a5 = a4.parents(a), a3 = a5.find(e), a6 = parseInt(a5.find(t + J).not(a5.find(ao + k + " " + t)).length);
                if (a6 === 0) {
                    if (typeof a0 !== "undefined") {
                        a3.text(a0);
                    } else {
                        if (typeof a1 === "undefined") {
                            a3.text(q);
                        }
                    }
                }
            });
        });
    };
    ab.prototype.labelChangeCounter = function () {
        var a0 = this.parameterName, a1 = this.parameterCount, a2 = this.parameterCountName;
        if (typeof a1 !== "undefined") {
            y(document).on("change", F, function () {
                var a6 = y(this), a5 = az, a7 = a6.parents(a), a4 = a7.find("." + az + Y + "(." + U + ") " + x).text(), a3 = a7.find(e), a8 = parseInt(a7.find(t + J).not(a7.find(ao + k + " " + t)).length);
                if (typeof a2 !== "undefined") {
                    a5 = a2;
                }
                if (a1 === "bottom") {
                    a7.find(aU).html(a8);
                    if (a8 === 0) {
                        a7.find(al).hide();
                        a3.text(a0);
                    } else {
                        a7.find(al).show();
                    }
                }
                if (a1 === "placeholder") {
                    if (a8 > 1) {
                        a3.text(a8 + " " + a5);
                    } else {
                        if (a8 === 1) {
                            a3.text(a4);
                        } else {
                            if (typeof a0 !== "undefined") {
                                a3.text(a0);
                            } else {
                                a3.text(q);
                            }
                        }
                    }
                }
            });
        }
    };
    ab.prototype.labelChangeRelation = function () {
        var a3 = this.parameterRelation, a1 = this.parameterRelationName, a0 = this.parameterCount, a4 = this.parameterCountName, a2 = this.parameterGroup;
        if ((typeof a3 !== "undefined") && (typeof a1 !== "undefined")) {
            this.$node.each(function () {
                var a7 = y(this), a6 = az, a8 = a7.parent(a), a5 = a8.find(e);
                if (typeof a4 !== "undefined") {
                    a6 = a4;
                }
                a8.addClass(r);
                a7.attr(an, a1);
                a7.find(ao).each(function () {
                    y(document).on("change", F, function () {
                        var bb = y(this), bc = bb.parent(ao), a9 = a8.find("." + az + Y + "(." + U + ") " + x).text(), bf = 0, be = bb.parent(ao).attr(g), ba = y("[" + g + '="' + be + '"]').map(function () {
                            if (y(this).hasClass(az)) {
                                return y(this);
                            }
                        }), bd = y("[" + g + '="' + be + '"]').map(function () {
                            if ((y(this).hasClass(az)) && (!y(this).is(aL))) {
                                return y(this).parent(ad).attr(an);
                            }
                        });
                        if (ba.length > 1) {
                            bc.addClass(U);
                            bb.find(t).prop("checked", false);
                            if (bc.find(aD).length === 0) {
                                bc.prevAll().not(G).map(function () {
                                    bf += parseInt(y(this).outerHeight());
                                });
                                bc.append("<" + ar + ' class="' + aI + " " + p + '"><' + ar + ' class="' + u + '">' + w + bd[0] + "</" + ar + "><" + ar + ' class="' + aq + " " + aH + '">' + d + "</" + ar + "><" + ar + ' class="' + aq + " " + ah + '">' + h + "</" + ar + "></" + ar + ">");
                                bc.parent(ad).stop().animate({scrollTop: bf}, 250);
                            }
                            bc.find(ax).click(function () {
                                bc.removeClass(U).removeClass(az);
                                bc.find(aD).remove();
                            });
                            bc.find(M).click(function () {
                                y("[" + g + '="' + be + '"]').each(function () {
                                    var bj = y(this);
                                    if (bj.find(t).is(J)) {
                                        bj.find(F).trigger("click");
                                    }
                                });
                                bb.trigger("click");
                                bb.find(t).prop("checked", true);
                                bc.removeClass(U);
                                bc.find(aD).remove();
                                if (a0 === "placeholder") {
                                    var bi = parseInt(a8.find(t + J).not(a8.find(ao + k + " " + t)).length);
                                    if (bi > 1) {
                                        a5.text(bi + " " + a6);
                                    } else {
                                        a5.text(a9);
                                    }
                                }
                                if (typeof a2 !== "undefined") {
                                    var bh = a2.split(","), bg = bb.find(t + J).parent(x);
                                    y.each(bh, function () {
                                        var bj = y("#" + this);
                                        bg.each(function () {
                                            var bk = y(this), bm = bk.parent(ao).attr(aC), bl = [];
                                            bj.find(ar).each(function () {
                                                bl.push(y(this).attr(aC));
                                            });
                                            if (y.inArray(bm, bl) === -1) {
                                                bj.prepend("<" + ar + ' class="' + am + '" ' + aC + '="' + bk.parent(ao).attr(aC) + '">' + bk.text() + "</" + ar + ">");
                                                bj.show();
                                                bj.parent(ag).show();
                                            }
                                        });
                                    });
                                }
                            });
                        } else {
                            bb.find(F).trigger("click");
                        }
                    });
                });
            });
        }
    };
    ab.prototype.labelChangeRelationSelected = function () {
        var a1 = this.parameterRelation, a0 = this.parameterRelationName, a2 = this.parameterRelationSelected;
        if ((typeof a1 !== "undefined") && (typeof a0 !== "undefined") && (a2 === "true")) {
            this.$node.each(function () {
                var a5 = y(this), a6 = y(a), a3 = y(v), a4 = y(aR);
                a5.find(F).change(function () {
                    var a7 = parseInt(a5.find(t).length), a8 = parseInt(a6.find(t + J).length);
                    if (a7 === a8) {
                        a3.find(n).prop("disabled", false).removeClass(i);
                        a4.hide();
                    } else {
                        a3.find(n).prop("disabled", true).addClass(i);
                        a4.show();
                    }
                    a5.find(M).click(function () {
                        if (a7 === a8) {
                            a3.find(n).prop("disabled", false).removeClass(i);
                            a4.hide();
                        } else {
                            a3.find(n).prop("disabled", true).addClass(i);
                            a4.show();
                        }
                    });
                });
            });
        }
    };
    ab.prototype.labelChangeGroup = function () {
        var a1 = this.parameterGroup, a0 = this.parameterGroupContainer;
        if (typeof a1 !== "undefined") {
            this.$node.each(function () {
                y(document).on("change", F, function () {
                    var a4 = y(this), a6 = a4.parent(ao).attr(aC), a3 = a4.parents(af).attr(Z), a5 = y(aQ).attr(Z), a2 = a1.split(",");
                    if (a4.find(t).is(J)) {
                        if (a6 !== undefined) {
                            if (!y(j + "[" + aC + '="' + a6 + '"]').length) {
                                y(aQ + "[" + Z + '="' + a3 + '"]').prepend("<" + ar + ' class="' + am + '" ' + aC + '="' + a6 + '">' + a4.text() + "</" + ar + ">");
                            }
                        }
                    } else {
                        y(j + "[" + aC + '="' + a6 + '"]').remove();
                    }
                    if (typeof a1 !== "undefined") {
                        y.each(a2, function () {
                            var a9 = y("#" + this), a7 = y("#" + this).parent(ag), a8 = a9.find(j).length;
                            if (a8 > 0) {
                                a7.show();
                                a9.show();
                                a9.addClass(B);
                            } else {
                                a9.hide();
                                a9.removeClass(B);
                            }
                        });
                    }
                    if (y("#" + a0).find(j).length) {
                        y("#" + a0).show();
                    } else {
                        y("#" + a0).hide();
                    }
                });
            });
        }
    };
    ab.prototype.clickGroupItem = function () {
        var a0 = this.parameterGroup;
        if (typeof a0 !== "undefined") {
            y(document).on("click", j, function () {
                var a3 = y(this), a1 = a3.attr(aC), a2 = y(ao + "[" + aC + '="' + a1 + '"]');
                a3.remove();
                if (a2.hasClass(az)) {
                    a2.find(F).trigger("click");
                }
            });
        }
    };
    ab.prototype.checkSelected = function () {
        var a0 = this.parameterName, a2 = this.parameterToggle, a1 = this.parameterCount, a4 = this.parameterCountName, a3 = this.parameterRelationSelected;
        this.$node.each(function () {
            var a5 = y(this);
            a5.find(ao).each(function () {
                var a8 = y(this), bb = az, bj = a8.parents(a), bg = bj.find(e), ba = y(v), bi = y(aR), a6 = a8.hasClass(az), bd = a8.parents(af), bk = bd.find(E + " " + t), be = bd.find(E), bh = bd.find(E + " " + F + " " + R), a7 = parseInt(bj.find(t).length - 1), bc = parseInt(bj.find(t + J).not(bj.find(ao + k + " " + t)).length);
                if (a8.find(t).is(J)) {
                    a8.addClass(az);
                    if (typeof a0 !== "undefined") {
                        if (a1 !== "placeholder") {
                            bg.text(a8.find(F).text());
                        }
                    }
                }
                if (a3 === "true") {
                    var bf = parseInt(a5.find(t).length), a9 = parseInt(y(a).find(t + J).length);
                    if (bf === a9) {
                        ba.find(n).prop("disabled", false).removeClass(i);
                        bi.hide();
                    } else {
                        ba.find(n).prop("disabled", true).addClass(i);
                        bi.show();
                    }
                }
                if (typeof a2 !== "undefined") {
                    if (a7 === bc) {
                        bk.prop("checked", true);
                        bh.text(aX);
                        be.addClass(az);
                    } else {
                        bk.prop("checked", false);
                        bh.text(ae);
                        be.removeClass(az);
                    }
                }
                if ((typeof a0 !== "undefined") && (a6 === true) && (a8.has(K).length)) {
                    bg.text(a8.find(K).text());
                }
                if (typeof a4 !== "undefined") {
                    bb = a4;
                }
            });
        });
    };
    ab.prototype.closeList = function () {
        this.$node.click(function (a0) {
            a0.stopPropagation();
        });
        y("html").click(function () {
            y(af).hide();
            y(a).find(aZ).hide();
            y(a).find(aY).hide();
            y(a).removeClass(B);
        });
    };
    return ab;
});
define("Event", ["jquery"], function (b) {
    function a(d, c) {
        var e = new b.Event(d, c);
        e.stopPropagation();
        return e;
    }

    return {createNonBubblingEvent: a};
});
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
define("util/KeepAlive", ["jquery", "util/UserPreferences"], function (e, b) {
    var d = "ca-uiats", c = 5 * 1000 * 60, a = {};
    e(document).ready(function () {
        b.setPreference(d, new Date().getTime());
    });
    e(document).on("click keypress", function () {
        b.setPreference(d, new Date().getTime());
    });
    a.setExpireTime = function (f) {
        c = f;
    };
    a.timeout = function (h, g, f) {
        return setTimeout(function () {
            if (b.getPreference(d) > (new Date().getTime() - c)) {
                return h();
            } else {
                if (f) {
                    var i = a.interval(function () {
                        clearInterval(i);
                        h();
                    }, 1000);
                }
            }
        }, g);
    };
    a.interval = function (g, f) {
        return setInterval(function () {
            if (b.getPreference(d) > (new Date().getTime() - c)) {
                g();
            }
        }, f);
    };
    return a;
});
define("bankaccount/MerchantAccountLegalEntity", ["jquery", "Constants"], function (c, a) {
    function b(d) {
        var e = c('input[name="prospect.legalEntity"]'), g = c(".email-dialog"), f = c(".submit-dialog");
        g.hide();
        c(document).on("change", e, function () {
            var i = c('input[name="prospect.legalEntity"]:checked').last(), h = i.val();
            if (h === "New") {
                g.show();
                f.hide();
            }
            if (h === "Existing") {
                g.hide();
                f.show();
            }
        });
    }

    return b;
});
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
define("ui/Form/CountryProvince", ["jqueryExtended"], function (e) {
    var c = "uiformcountryprovince_update", b = {};

    function a(f) {
        var h = this, g = this.$node = f.getNode();
        if (typeof f.parameters.field !== "string") {
            throw new Error("Field should be set");
        }
        this.fieldName = f.parameters.field;
        this.groupName = f.parameters.group || "";
        this.$container = g.closest("form, [data-countryprovince-container]");
        this.$container.bind(c, function (i, j) {
            h.handleUpdate(i, j);
        });
        g.change(function () {
            h.broadcast();
        });
        this.broadcast();
        f.ready();
    }

    a.prototype.broadcast = function () {
        this.$node.trigger(c, [{value: this.$node.val(), fieldName: this.fieldName, groupName: this.groupName}]);
    };
    a.prototype.handleUpdate = function (i, k) {
        if (typeof k !== "object" || k === null) {
            return;
        }
        if (k.groupName !== this.groupName) {
            return;
        }
        if (k.field === this.fieldName) {
            return;
        }
        if (this.fieldName === "province" && k.fieldName === "country") {
            var j = this, g = k.value, f = this.$node;
            if (adyen && adyen.data && adyen.data.countryProvinces && adyen.data.countryProvinces[g]) {
                this.$node.removeAttr("disabled");
                var h = adyen.data.countryProvinces[g];
                if (h.length === 1) {
                    this.$node.val(h[0].code);
                    this.$node.attr("readonly", "readonly");
                    this.trigger();
                } else {
                    this.$node.removeAttr("readonly");
                    require(["jquery", "ui/AutoComplete"], function (n, m) {
                        var l = b[g] = b[g] || m.PrioritizeSourceByValue(h, 4);
                        j.autoCompleted = j.autoCompleted || new m({inputElement: f, source: l, minLength: 0});
                        j.autoCompleted.setData(l);
                    });
                }
            } else {
                this.$node.attr("disabled", "disabled").val("");
            }
        }
    };
    function d() {
    }

    a.init = d;
    return a;
});
define("service/Settlement", ["jquery", "json", "util/Ajax", "util/Console", "chartutil/dateUtils_CET"], function (a, l, b, d, g) {
    var c = {}, k = {}, f = d.getLog("service/Settlement");
    var e = {settlementBatchOverviewUrl: "facade://service/Settlement/stub"};

    function j() {
        return a.extend({}, e, adyen.config);
    }

    c.getForYear = function (m) {
        if (!k.hasOwnProperty(m)) {
            k[m] = b.post(j().settlementBatchOverviewUrl, {reportingYear: m});
        }
        return k[m];
    };
    c.getData = function (o, q, t, n) {
        var s = new a.Deferred();
        var p = {months: {}};
        var m = [];
        for (var r = o; r <= t; r++) {
            m.push(h(p, r, o, q, t, n));
        }
        a.when.apply(window, m).then(function () {
            s.resolve(p);
        });
        return s.promise();
    };
    c.fetchData = function (o) {
        var m = new Date(o.bdate);
        var p = g.convertDateToAMS(m);
        var n = g.roundToDay(p);
        var s = n.getMonth();
        var r = n.getFullYear();
        var q = s;
        if (o.granularity === "year") {
            q = 0;
        }
        return this.getData(r, q, r, s);
    };
    function h(q, r, n, p, s, m) {
        var o = new a.Deferred();
        c.getForYear(r).then(function (t) {
            if (typeof t === "string") {
                t = l.parse(t);
            }
            if (typeof t.months === "object" && t.months !== null) {
                for (var u in t.months) {
                    if (t.months.hasOwnProperty(u)) {
                        if ((r > n || u >= p) && (r < s || u <= m)) {
                            q.months[r + "-" + u] = a.extend(t.months[u], {year: r});
                        }
                    }
                }
            }
            o.resolve();
        });
        return o;
    }

    c.stub = function (s, v, r, u) {
        f.log("Generating stub data for", v.data.reportingYear);
        var p = {months: {}};
        for (var q = 0; q < 12; q++) {
            var o = p.months[q] = {empty: false, monthOneIndexed: q + 1, batches: []};
            for (var t = 0, n = Math.ceil(Math.random() * 10);
                 t < n; t++) {
                o.batches.push({
                    batchId: q * 100 + t,
                    closeDate: v.data.reportingYear + "/" + (q + 1) + "/" + (t + 1),
                    fee: i("EUR", 0),
                    depositCorrection: i("EUR", 0),
                    invoiceDeduction: i("EUR", 0),
                    internalPayout: i("EUR", q * 10000 + t * 100),
                    realMoneyPayout: i("EUR", q * 10100 + t * 100)
                });
            }
        }
        return p;
    };
    function i(m, n) {
        return {value: m + " " + n / 100, unit: m, quantity: n};
    }

    return c;
});
define("ui/Slider", ["jqueryExtended", "util/Css", "json", "jquery.ui"], function (f, c, e) {
    var d = function () {
        d = function () {
        };
        c.addLink(adyen.base + "/custom-theme/jquery-ui-1.10.3.min.css");
    };

    function a(j) {
        var g = {
            min: 0, max: 100, value: j.val(), change: function (k, l) {
                j.val(l.value).change();
            }
        }, i = e.parse(j.attr("data-slider")), h;
        if (i && i.min) {
            g.min = i.min;
        }
        if (i && i.max) {
            g.max = i.max;
        }
        h = j.wrap('<div class="csr-slider"></div>').closest(".csr-slider");
        h.slider(g);
    }

    function b() {
        f(document).ready(function () {
            d();
            f("[data-slider]").filter(":not(.ui-slider-bound)").addClass("ui-slider-bound").each(function () {
                a(f(this));
            });
        });
    }

    return {init: b};
});
define("navigation/PersistFocus", ["jqueryExtended"], function (f) {
    var b = "defusedByNavPersistFocus-";
    var e = [];
    var d = function () {
        d = function () {
        };
        var g = (document.location.hash || "").replace(/^#/, "");
        if (g) {
            f(function () {
                f("a[name]").each(function () {
                    if (this.name === b + g || this.name === g) {
                        f(this).scrollIntoView();
                    }
                });
            });
        }
        setTimeout(function () {
            f(window).scrollDetached(c);
        }, 500);
    };

    function c() {
        var g = null;
        var h = f(document).scrollTop();
        f.each(e, function (i, j) {
            f(j).find("a[name]").each(function () {
                var k = f(this);
                var l = k.attr("name");
                if (l.substring(0, b.length) !== b) {
                    k.attr("name", b + l);
                } else {
                    l = l.substring(b.length);
                }
                var m = {name: l, node: this, top: k.offset().top};
                if (m.top > h && (g === null || g.top > m.top)) {
                    g = m;
                }
            });
        });
        if (g !== null) {
            document.location.hash = g.name;
        }
    }

    function a(g) {
        e.push(g.getNode());
        d();
        g.ready();
    }

    return a;
});
define("ui/Switch", ["jquery"], function (d) {
    var c = false;

    function a(i) {
        var g = i.find("input"), h = ".inverted-switch", f = "switch-on", m = "inverted-switch-on", l = "switch-off", e = "inverted-switch-off", j = g.attr("disabled"), k = "switch-change-notification";
        if (g.length === 0) {
            return;
        }
        if (i.is(h)) {
            f = m;
            l = e;
        }
        if (!j) {
            if (g.is(":checked")) {
                i.addClass(f).removeClass(l);
                if (g.attr("data-notification") !== "no") {
                    i.append('<span class="' + k + '">Your change has not been saved yet</span>');
                }
            } else {
                i.removeClass(f).addClass(l);
                i.find("." + k).remove();
            }
        }
    }

    function b() {
        if (c) {
            return;
        }
        c = true;
        var e = ".switch";
        d(document.body).on("change", e, function (g) {
            var f = d(g.target).closest(e);
            a(f);
        }).find(e).each(function () {
            a(d(this));
        });
    }

    return {init: b};
});
define("compat/Array/filter", [], function () {
    if (!Array.prototype.filter) {
        Array.prototype.filter = function (c) {
            if (this === void 0 || this === null) {
                throw new TypeError();
            }
            var f = Object(this);
            var a = f.length >>> 0;
            if (typeof c !== "function") {
                throw new TypeError();
            }
            var e = [];
            var b = arguments.length >= 2 ? arguments[1] : void 0;
            for (var d = 0; d < a; d++) {
                if (d in f) {
                    var g = f[d];
                    if (c.call(b, g, d, f)) {
                        e.push(g);
                    }
                }
            }
            return e;
        };
    }
});
define("ui/Table/Filterable", ["jqueryExtended", "Constants", "ui/Table/TableModel", "ui/Table/RowModel", "compat/Array/filter"], function (a, b, g, e) {
    var h = "csr-row-not-filtered", f = "csr-row-filtered";

    function c(j) {
        var k = this;
        k.state = {search: "", filters: {}};
        k.$table = a(j);
        k.$filters = k.$table.find("thead, caption").find("[data-filter]");
        k.$rows = k.$table.find("tbody>tr");
        k.$rows.addClass(h);
        this.preventUpdate = true;
        k.$filters.on("keyup change", function (m) {
            var n = a(m.target).closest("[data-filter]"), l = n.attr("data-filter");
            if (l === "search") {
                k.search(n.val());
            } else {
                k.filter(l || g.getColumnName(n.closest("td,th")), n.val());
            }
        }).show().change();
        this.preventUpdate = false;
        this.fillFilterDropdowns();
        this.updateRows(this.$rows);
    }

    c.prototype.fillFilterDropdowns = function () {
        var j = this;
        j.$filters.filter("select[data-filter=automatic]").each(function () {
            var l = a(this), k = [], o = {}, m = g.getColumnName(l.closest("td,th"));
            l.attr("data-filter", m);
            j.$rows.each(function () {
                var q = a(this), r = e.getModel(q, true) || {}, p = r.fields || {}, s = p[m] || "";
                if (s && typeof o[s] === "undefined") {
                    o[s] = s;
                    k.push(s);
                }
            });
            k.sort();
            while (k.length > 0) {
                var n = document.createElement("option");
                n.text = k.shift();
                n.vaue = n.text;
                this.appendChild(n);
            }
        });
    };
    c.prototype.filter = function (j, k) {
        if (typeof k !== "string" || k === this.state.filters[j]) {
            return;
        }
        this.state.filters[j] = k;
        this.updateRows(this.$rows);
    };
    c.prototype.search = function (k) {
        if (typeof k !== "string" || k === this.state.search) {
            return;
        }
        var j = this.$rows;
        if (k.length > this.state.search.length && k.indexOf(this.state.search) > -1) {
            j = j.filter("." + h);
        } else {
            if (k.length > 0 && this.state.search.indexOf(k) > -1) {
                j = j.filter("." + f);
            }
        }
        this.state.search = k;
        this.updateRows(j);
    };
    c.prototype.updateRows = function (k) {
        if (this.preventUpdate) {
            return;
        }
        this.$table.hide();
        var o = this.state, m = 0, n = 0, q = 0, l = o.filters;
        var p = o.search.toLowerCase().split(/[\s,]+/).filter(function (r) {
            return r;
        }), j = p.length;
        k.each(function () {
            q++;
            var s = a(this), t = e.getModel(s, true), r = true, u;
            if (j > 0) {
                for (u = j; u-- > 0 && r;) {
                    if (t.fullTextLowerCase.indexOf(p[u].toLowerCase()) < 0) {
                        r = false;
                    }
                }
            }
            for (var v in l) {
                if (!l.hasOwnProperty(v) || !l[v]) {
                    continue;
                }
                if (typeof t.fields[v] !== "undefined" && t.fields[v] !== l[v]) {
                    r = false;
                    break;
                }
            }
            if (!r && s.is("." + h)) {
                s.removeClass(h).addClass(f).hide();
                n++;
            } else {
                if (r && s.is("." + f)) {
                    s.removeClass(f).addClass(h).show();
                    m++;
                }
            }
        });
        this.$table.show();
        if (n > 0) {
            this.$table.trigger(b.EV_CONTENT_HIDE);
        }
        if (m > 0) {
            this.$table.trigger(b.EV_CONTENT_SHOW);
        }
    };
    function d() {
        a("table[data-filterable]").not(".csr-table-filter-bound").addClass("csr-table-filter-bound").each(function () {
            var j = new c(this);
        });
    }

    function i() {
        a(document).ready(function () {
            d();
        });
    }

    return {init: i};
});
define("bankaccount/BankAccountSettlementFlow", ["jquery"], function (b) {
    function a() {
        var k = b("#table-add-currency"), d = k.find("tbody tr"), e = ".currency span", h = b("#add-new-currency"), c = "data-value", f = adyen.data.settlementFlow, i = adyen.data.foundationAccount, j = adyen.data.bankAccount;

        function g(l) {
            b("<option>").val("").text("--").appendTo(l);
        }

        if (k.length > 0) {
            d.each(function () {
                var w = b(this).find(e).text(), l = b(this).find("[id=currency_new]"), r = b(this).find("[id*=settlement_flow_]"), v = b(r).val(), p = r.attr(c), s = b(this).find("[id*=split_settlement_]"), m = s.attr(c), y, o, q, n = b(this).find("[id*=foundation_account_]"), x = n.attr(c), u = b(this).find("[id*=bank_account_]"), t = parseInt(u.attr(c));
                g(r);
                g(n);
                g(u);
                l.change(function () {
                    var z = b(this).val();
                    r.find("option").remove();
                    n.find("option").remove();
                    u.find("option").remove();
                    g(r);
                    b.each(f, function (A, B) {
                        if (b.inArray(z, B.currency) > -1) {
                            b("<option>").val(B.value).text(B.value).appendTo(r);
                        }
                    });
                    g(n);
                    g(u);
                    b.each(j, function (A, B) {
                        if (z === B.currency) {
                            b("<option>").val(B.value).text(B.label).appendTo(u);
                        }
                    });
                });
                r.change(function () {
                    var z = b(this).val();
                    n.find("option").remove();
                    b.each(f, function (A, B) {
                        if (B.value === z) {
                            o = B.foundationAccount;
                        }
                    });
                    g(n);
                    b.each(i, function (A, B) {
                        if (b.inArray(B.value, o) > -1) {
                            if (!w.empty()) {
                                if ((w === B.currency) || (B.currency === "")) {
                                    b("<option>").val(B.value).text(B.label).appendTo(n);
                                }
                            } else {
                                if ((l.val() === B.currency) || (B.currency === "")) {
                                    b("<option>").val(B.value).text(B.label).appendTo(n);
                                }
                            }
                        }
                    });
                });
                s.change(function () {
                    var z = b(this).val();
                    if (z === "") {
                        b.each(f, function (A, B) {
                            if (B.value === v) {
                                o = B.foundationAccount;
                            }
                        });
                        b.each(i, function (A, B) {
                            if (b.inArray(B.value, o) > -1) {
                                if ((w === B.currency) || (B.currency === "")) {
                                    if (B.currency === "") {
                                        y = B.value;
                                    }
                                }
                            }
                        });
                        b(n).val(y);
                        b(u).val("");
                    }
                });
                if (!w.empty()) {
                    n.find("option").remove();
                    u.find("option").remove();
                    b.each(f, function (z, A) {
                        if (b.inArray(w, A.currency) > -1) {
                            if (A.value === p) {
                                q = A.foundationAccount;
                            }
                            b("<option>").val(A.value).text(A.value).appendTo(r);
                        }
                    });
                    g(n);
                    b.each(i, function (z, A) {
                        if (b.inArray(A.value, q) > -1) {
                            if ((w === A.currency) || (A.currency === "")) {
                                if (A.currency === "") {
                                    y = A.value;
                                }
                                b("<option>").val(A.value).text(A.label).appendTo(n);
                            }
                        }
                    });
                    g(u);
                    b.each(j, function (z, A) {
                        if (w === A.currency) {
                            b("<option>").val(A.value).text(A.label).appendTo(u);
                        }
                    });
                    b(r).val(p);
                    b(n).val(x);
                    b(u).val(t);
                    if (s.length > 0) {
                        if ((m === "") || (s.val() === "")) {
                            b(n).val(y);
                            b(u).val("");
                        }
                    }
                }
                b("select").change(function () {
                    if (l.val() && r.val()) {
                        h.attr("checked", "checked");
                    } else {
                        h.removeAttr("checked");
                    }
                });
            });
        }
    }

    return a;
});
define("bankaccount/RequestMerchantAccount", ["jquery", "Constants"], function (c, b) {
    function a(m) {
        var y = c.parseJSON(c("#merchant-details").text().replace(/\s+/g, " ")), g = c("#merchant-currencies").val(), p = c("#settlement-currencies").val(), d = c(".merchant-account"), x = c(".bank-statement"), j = c(".select-bank-account-currency"), f = c(".select-merchant"), u = c(".select-bank-account"), C = c(".csr-form-text-2"), s = c(".editable-fields"), k = s.find("input, select"), q = s.find(C), B = c(".input-banknumber"), G = c(".input-iban"), v = c(".input-bic"), t = c(".input-bank-name"), n = c(".input-bank-city"), h = c(".select-bank-country"), w = c(".input-bank-holder-name"), o = c(".input-bank-holder-city"), A = c(".select-bank-holder-country"), D = c(".subscription-model"), F = c(".delivery-days"), e = c(".subscriptions");

        function l(H) {
            H = H.replace(/[\[\] ]/g, "").split(",");
            j.find("option").remove();
            j.append('<option value="">Select</option>');
            c.each(H, function (J, I) {
                j.append('<option value="' + I + '">' + I + "</option>");
            });
        }

        function i() {
            B.next(C).text("");
            G.next(C).text("");
            v.next(C).text("");
            t.next(C).text("");
            n.next(C).text("");
            h.next(C).text("");
            w.next(C).text("");
            o.next(C).text("");
            A.next(C).text("");
        }

        function E() {
            f.find("option").remove();
            f.append('<option value="">Select</option>');
        }

        function z() {
            if (c('input[name="prospect.usesSubscriptionModel"]:checked').val() === "yes") {
                e.show();
                F.hide();
            } else {
                e.hide();
                F.show();
            }
        }

        function r() {
            if (u.val() === "existing") {
                x.hide();
                d.show();
                k.hide();
                i();
                q.show();
                l(g);
                E();
            } else {
                if (u.val() === "new") {
                    x.show();
                    d.hide();
                    k.show();
                    q.hide();
                    l(p);
                }
            }
        }

        D.on("change", z);
        u.on("change", r);
        c(window).load(function () {
            r();
            z();
        });
        j.on("change", function () {
            var H = c(this).val();
            E();
            c.each(y, function (J, L) {
                var I = L.currency, K = L.merchant;
                if (H === I) {
                    if (!f.find('option[value="' + K + '"]').length) {
                        f.append('<option value="' + K + '">' + K + "</option>");
                    }
                }
            });
        });
        f.on("change", function () {
            var H = c(this).val();
            i();
            c.each(y, function (N, R) {
                var S = R.merchant, L = R.banknumber, P = R.iban, K = R.bic, M = R.bankName, J = R.bankCity, Q = R.bankCountry, T = R.holderName, O = R.holderCity, I = R.holderCountry;
                if (H === S) {
                    if (L !== "null") {
                        B.next(C).text(L);
                    }
                    if (P !== "null") {
                        G.next(C).text(P);
                    }
                    if (K !== "null") {
                        v.next(C).text(K);
                    }
                    if (M !== "null") {
                        t.next(C).text(M);
                    }
                    if (J !== "null") {
                        n.next(C).text(J);
                    }
                    if (Q !== "null") {
                        h.next(C).text(Q);
                    }
                    if (T !== "null") {
                        w.next(C).text(T);
                    }
                    if (O !== "null") {
                        o.next(C).text(O);
                    }
                    if (I !== "null") {
                        A.next(C).text(I);
                    }
                }
            });
        });
    }

    return a;
});
define("compat/TypedArray", [], function () {
    try {
        var b = [new Uint8Array(1), new Uint32Array(1), new Int32Array(1)];
        return {Uint8Array: Uint8Array, Uint32Array: Uint32Array, Int32Array: Int32Array};
    } catch (g) {
    }
    function f(e, a) {
        return this.slice(e, a);
    }

    function c(j, e) {
        if (arguments.length < 2) {
            e = 0;
        }
        for (var a = 0, h = j.length; a < h;
             ++a, ++e) {
            this[e] = j[a] & 255;
        }
    }

    function d(e) {
        var a;
        if (typeof e === "number") {
            a = [];
            for (var h = 0; h < e; ++h) {
                a[h] = 0;
            }
        } else {
            a = e.slice(0);
        }
        a.subarray = f;
        a.buffer = a;
        a.byteLength = a.length;
        a.set = c;
        if (typeof e === "object" && e.buffer) {
            a.buffer = e.buffer;
        }
        return a;
    }

    try {
        window.Uint8Array = d;
    } catch (g) {
    }
    try {
        window.Uint32Array = d;
    } catch (g) {
    }
    try {
        window.Int32Array = d;
    } catch (g) {
    }
    return {Uint8Array: window.Uint8Array, Uint32Array: window.Uint32Array, Int32Array: window.Int32Array};
});
define("ui/Form", ["jqueryExtended", "Constants", "util/QueryString", "util/Strings", "util/Console"], function (a, b, g, c, d) {
    var i = {};

    function f(l) {
        var j = a(l), n = j.attr("data-form-target") || "", m = j.attr("data-form-active") || "yes", k;
        if (c.isFalse(m)) {
            return false;
        }
        j.find(".csr-form-error").remove();
        k = n.match(/^newwindow:\s*(.+)\s*$/i);
        if (k && k[1]) {
            k = k[1];
            if (i[k] && !i[k].closed) {
                i[k].focus();
                return false;
            }
            i[k] = window.open("", k, "width=650,height=580,menubar=no,location=yes,resizable=yes,scrollbars=yes,status=no,titlebar=no,toolbar=no");
            i[k].focus();
            setTimeout(function () {
                j.submit();
            }, 500);
            return true;
        }
        if (a(n).length === 0) {
            d.log("There is no element that matches the selector: " + n);
            n = "#" + a("<div></div>").insertAfter(l).getOrGenerateId();
            d.log("The new target id will be " + n);
        }
        a.post(l.action, a(l).serialize()).then(function (o) {
            var p = a(o).find("#subcontent");
            p.find("h1.pagetitle,h1.ca-pagetitle").remove();
            if (p.is(".csr-error-page")) {
                a(l).prepend('<div class="csr-form-error">' + p.html() + "</div>").findOne(".csr-form-error").scrollIntoView();
                a(n).find("input,select,textarea").removeAttr("disabled");
                a(n).find(".ca-when-disabled").hide();
                a(n).find(".ca-when-enabled").show();
            } else {
                a(n).html(p.html()).trigger(b.EV_CONTENT_MERGED).scrollIntoView();
            }
        });
        return true;
    }

    function h(m) {
        var k = a(m.target).closest("[data-form-configure]"), l = g.parse(k.attr("data-form-configure") || ""), j = k.closest("form");
        if (typeof l.target === "string") {
            j.attr("data-form-target", l.target);
        }
        if (typeof l.active === "string") {
            j.attr("data-form-active", l.active);
        }
        if (typeof l["form-target"] === "string") {
            j.attr("target", l["form-target"]);
        }
    }

    function e() {
        a(document.body).unbind("submit.ui-form").on("submit.ui-form", "form[data-form]", function (j) {
            if (f(this)) {
                j.preventDefault();
            }
        }).unbind("change.ui-form,mousedown.ui-form").bind("change.ui-form,mousedown.ui-form", "form[data-form]", function (k) {
            var j = a(k.target).closest("form"), l = j.attr("data-form-target");
            if (j.attr("data-form-disable") !== "submit") {
                a(l).find("input,select,textarea").attr("disabled", "disabled");
                a(l).find(".ca-when-disabled").show();
                a(l).find(".ca-when-enabled").hide();
            }
        }).unbind("click.ui-form-configure").bind("click.ui-form-configure", "input[data-form-configure]", h).unbind("keypress.ui-form-configure").bind("keypress.ui-form-configure", "input[data-form-configure]", h);
    }

    return {
        bind: function () {
            a(document).ready(e);
        }, init: e
    };
});
define("util/ObjectSuper", [], function () {
    var a = function (b) {
        var e = {};

        function c(g) {
            var f = b[g];
            e[g] = function () {
                return f.apply(b, arguments);
            };
        }

        for (var d in b) {
            if (b.hasOwnProperty(d) && typeof b[d] === "function") {
                c(d);
            }
        }
        return e;
    };
    return a;
});
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
define("ui/Tooltip", ["jquery", "util/Console", "json", "hogan", "text!ui/tooltip.html"], function (a, d, g, h, c) {
    var i = 0;

    function b() {
        var k = a(this), j = g.parse(k.attr("data-preview-tooltip"));
        if (typeof j !== "object") {
            throw new Error("Incorrect configuration of data-preview-tooltip");
        }
        j.contentSelector = j.contentSelector || "";
        j.hoverNode = a(j.hoverNode || this);
        if (!j.hoverNode.attr("id")) {
            j.hoverNode.attr("id", "ca-preview-tooltip-target-" + i++);
        }
        j.href = j.href || this.href;
        a(j.hoverNode).on("mouseenter", function () {
            if (!j.content) {
                j.content = new a.Deferred();
                j.contentNode = a('<div class="ca-tooltip ca-preview-tooltip"><i class="clock"></i></div>').attr("id", "ca-preview-tooltip-" + i++).hide().appendTo(document.body);
                var l = j.href + (j.contentSelector ? " " + j.contentSelector : " .ca-preview-content");
                j.content.resolve(j.contentNode);
                j.contentNode.load(l);
            }
            j.content.then(function (m) {
                toggleTooltip("#" + j.hoverNode.attr("id"), "#" + m.attr("id"));
            });
        }).on("mouseleave", function () {
            j.content.then(function (l) {
                l.hide();
            });
        });
    }

    function f() {
        var k = a(this), j = g.parse(k.attr("data-tooltip")), l = a(window);
        if (typeof j !== "object") {
            throw new Error("Incorrect configuration of data-tooltip");
        }
        j.contentSelector = j.contentSelector || "";
        j.hoverNode = a(j.hoverNode || this);
        j.offsetX = j.offsetX || 10;
        j.mode = j.mode || "hover";
        j.unescape = j.unescape || false;
        if (!j.hoverNode.attr("id")) {
            j.hoverNode.attr("id", "ca-tooltip-target-" + i++);
        }
        a(j.hoverNode).on("mouseenter", function () {
            if (!j.content) {
                j.content = new a.Deferred();
                j.contentNode = a('<div class="ca-tooltip"></div>').attr("id", "ca-tooltip-" + i++).hide().appendTo(document.body);
                var m = j.contentSelector.match(/#/) ? a(j.contentSelector).html() : j.hoverNode.find(j.contentSelector).html();
                if (j.unescape) {
                    m = m.replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&quot;/i, '"');
                }
                j.contentNode.html(m);
                j.content.resolve(j.contentNode);
                if (typeof j.css === "object" && typeof j.css !== null) {
                    j.contentNode.css(j.css);
                }
            }
            if (j.mode !== "click") {
                j.content.then(function (n) {
                    var o = j.hoverNode.offset();
                    var q = o.left + j.hoverNode.outerWidth() + j.offsetX;
                    var p = l.scrollLeft() + l.width();
                    n.css({top: o.top, left: q}).show();
                    if (q + n.outerWidth() > p) {
                        q = o.left - n.outerWidth() - j.offsetX;
                        n.css("left", q + "px");
                    }
                });
            }
        }).on("mouseleave", function () {
            j.content.then(function (m) {
                m.hide();
            });
        });
        if (j.mode === "click") {
            a(j.hoverNode).on("click", function () {
                j.content.then(function (m) {
                    var n = j.hoverNode.offset();
                    m.css({top: n.top, left: n.left + j.hoverNode.outerWidth() + j.offsetX}).toggle();
                });
            });
        }
    }

    function e() {
        a(document).ready(function () {
            try {
                a("[data-preview-tooltip]").each(b);
                a("[data-tooltip]").each(f);
            } catch (j) {
                d.log("[UI/T] Error", j);
            }
        });
    }

    return {bind: e, init: e};
});
define("ui/ViewPort", [], function () {
    function a(e, g) {
        g = g || {};
        g.left = g.left || 0;
        g.top = g.top || 0;
        g.right = g.right || 0;
        g.bottom = g.bottom || 0;
        var f = e.getBoundingClientRect(), b = window.innerHeight || document.documentElement.clientHeight, d = window.innerWidth || document.documentElement.clientWidth, c = {
            left: d / 100 * g.left,
            right: d / 100 * (100 - g.right),
            bottom: b / 100 * (100 - g.bottom),
            top: b / 100 * g.top
        };
        return (f.top <= c.bottom && f.left <= c.right && f.bottom >= c.top && f.right >= c.left);
    }

    return {isElementInViewport: a};
});
define("service/Settlement/WidgetFormats", ["jquery", "service/Settlement"], function (c, b) {
    function a(e) {
        if (e && e.unit && e.quantity) {
            switch (e.unit) {
                case"EUR":
                case"USD":
                case"GBP":
                    e.formattedQuantity = (e.quantity / 100).toFixed(2);
                    break;
                default:
                    e.formattedQuantity = e.value.replace(e.unit, "");
                    break;
            }
        }
    }

    var d = {};
    d.listForMonth = function (i) {
        var h = new c.Deferred();
        var f = i.urlParams.month || "", g = f.match(/^(\d{4})-(\d{2})-(\d{2})$/);
        var e = i.urlParams.activeBatch || "-";
        if (!g) {
            h.reject("Invalid date specification: " + f);
            return h;
        }
        b.getData(parseInt(g[1], 10), parseInt(g[2], 10) - 1, parseInt(g[1], 10), parseInt(g[2], 10) - 1).then(function (n) {
            if (n.months) {
                var j = n.months;
                n.months = [];
                for (var m in j) {
                    if (j.hasOwnProperty(m)) {
                        n.months.push(j[m]);
                        if (j[m].total) {
                            a(j[m].total.payout);
                            a(j[m].total.fee);
                            a(j[m].total.deposit);
                        }
                        if (j[m].batches) {
                            var l = j[m].batches;
                            for (var k = 0; k < l.length; k++) {
                                l[k].activeBatch = ("" + l[k].batchId) === e;
                                a(l[k].realMoneyPayout);
                            }
                            l.sort(function (p, o) {
                                return p.closeDate > o.closeDate ? -1 : 1;
                            });
                        }
                    }
                }
            }
            h.resolve(n);
        });
        return h;
    };
    return d;
});
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
define("util/Queue", ["jquery"], function (b) {
    function a(c) {
        this.promise = new b.Deferred();
        this.promise.resolve();
        if (typeof c === "function") {
            this.add(c);
        }
        this.promise.index = 0;
    }

    a.prototype.add = function (c) {
        var e = this.promise;
        var d = this.promise = new b.Deferred();
        d.index = e.index + 1;
        e.always(function () {
            if (typeof c === "function") {
                var f = c();
                if (typeof f === "object" && typeof f.always === "function") {
                    f.always(d.resolve);
                } else {
                    d.resolve(f);
                }
            } else {
                d.reject("Queue item " + d.index + ": Callback is not a function");
            }
        });
        return d.promise();
    };
    return a;
});
define("ui/Faux", ["jquery", "Constants"], function (g, a) {
    var f = a.getNamespaced(a.EV_RESIZE, "ui-faux"), b = a.getNamespaced(a.EV_CONTENT_SHOW_HIDE, "ui-faux");

    function e(i) {
        var h = i.attr("data-faux-columns");
        return g(h);
    }

    function d(j) {
        var i = e(j), h = i.filter(":visible").outerHeight(), k = j.outerHeight() - j.height();
        j.height(h - k);
    }

    function c() {
        g(document).ready(function () {
            var h = g("[data-faux-columns]");
            g([window, document]).unbind(f).bind(f, function () {
                h.each(function () {
                    d(g(this));
                });
            });
            h.each(function () {
                var j = g(this), i = e(j);
                i.unbind(b).bind(b, function () {
                    d(j);
                });
                d(j);
            });
        });
    }

    return {init: c};
});
define("ui/Table/TableHeader", ["jqueryExtended"], function (d) {
    function c(g, f, j, e, h, i) {
        d(g).each(function () {
            var m = d(this).width(), l = d(this).find(e), k = d(this).offset().left - d(window).scrollLeft();
            d(this).attr(j, k);
            d(e).find(h).each(function () {
                var o = d(this).attr(i);
                if (o > 1) {
                    var p = o - 1;
                    for (var n = 0; n < p; n++) {
                        d(this).after("<th></th>");
                    }
                    d(this).removeAttr(i);
                }
            });
            d(e).find(h).each(function () {
                var n = d(this).outerWidth();
                d(this).css("width", n);
            });
            d(l).clone().prependTo(this).addClass(f).hide();
            d(this).find("." + f).width(m);
        });
    }

    function b(f, e, g, h) {
        d(f).each(function () {
            var k = d(this).find(h).outerHeight(), j = d(this).find("." + e).height(), o = d(this).height(), n = d(this).offset().top - d(window).scrollTop(), i = d(this).attr(g), m = d(window).scrollLeft(), l = i - m;
            if (n < -k && n > -o + j) {
                d(this).find("." + e).show();
                if (m >= 0) {
                    d(this).find("." + e).css("left", l);
                }
            } else {
                d(this).find("." + e).hide();
            }
        });
    }

    function a() {
        var g = "table", f = "fixed", j = "data-table-left", k = "caption", e = "thead", h = "th", i = "colspan";
        c(g, f, j, e, h, i);
        d(document).scrollDetached(function (l) {
            b(g, f, j, k);
        });
    }

    return {init: a};
});
define("ui/DateInput", ["jqueryExtended", "util/Css", "json", "jquery.ui"], function (e, a, d) {
    var c = function () {
        c = function () {
        };
        a.addLink(adyen.base + "/custom-theme/jquery-ui-1.10.3.min.css");
    };

    function b() {
        e(document).ready(function () {
            c();
            e("[data-dateinput]").filter(":not(.ui-dateinput-bound)").addClass("ui-dateinput-bound").each(function () {
                var i = e(this), g = {
                    dateFormat: "yy-mm-dd",
                    changeYear: true,
                    showOptions: {direction: "down"}
                }, h = d.parse(i.attr("data-dateinput"));
                if (h && h.min) {
                    g.minDate = h.min;
                }
                if (h && h.max) {
                    g.maxDate = h.max;
                }
                if (h && h["event-onselect"]) {
                    g.onSelect = function (j) {
                        i.trigger(h["event-onselect"], j);
                    };
                }
                if (h) {
                    for (var f in h) {
                        g[f] = h[f];
                    }
                }
                i.datepicker(g);
            });
        });
    }

    return {init: b};
});
define("navigation/FixedSticky", ["jqueryExtended"], function (b) {
    function a(d) {
        this.$node = d.getNode();
        var c = d.parameters.stickTo || "a[name]";
        this.$stickTo = b(c).not(this.$node.find(c));
        this.minTop = d.parameters.minTop || 0;
        this.bindScrolling();
        d.ready();
    }

    a.prototype.bindScrolling = function () {
        this.bindScrolling = function () {
        };
        var c = this;
        setTimeout(function () {
            b(window).scrollDetached(function () {
                c.updateSticky();
            });
        }, 500);
    };
    a.prototype.updateSticky = function () {
        var d = null;
        var e = b(document).scrollTop();
        var c = this.$stickTo.length;
        this.$stickTo.each(function (g, i) {
            var f = b(this);
            var h = {node: this, top: f.offset().top, height: f.height(), left: f.offset().left, width: f.width()};
            if (d === null && h.top > e || c === 1) {
                d = h;
            }
            if (h.top < e && h.top + 0.6 * h.height > e) {
                d = h;
            }
        });
        if (d !== null) {
            this.$node.css("top", Math.max(this.minTop, d.top - e));
        }
    };
    return a;
});
define("ui/ContentFilter", ["jqueryExtended", "Constants", "util/Console"], function (d, c, e) {
    var f = e.getLog("ui/ContentFilter");
    var h = "[data-filter-input]", j = "data-filter-content", i = "data-filter-value", b = "[data-filter-item]", g = "[data-filter-no-records]", k = ":visible";

    function a(l) {
        this.$node = l.getNode();
        this.parameterInput = l.parameters.input;
        this.parameterContent = l.parameters.content;
        this.parameterClassFiltered = l.parameters.classFiltered || "filtered";
        this.init();
        l.ready();
    }

    a.prototype.init = function () {
        this.searchContent();
    };
    a.prototype.searchContent = function () {
        var l = this, o = l.parameterInput, n = l.parameterContent, m = l.parameterClassFiltered;
        if (typeof n === "string" && typeof o === "string") {
            l.$node.each(function () {
                var p = d(this), q = p.find(h);
                q.on("keyup change", function () {
                    var t = d(this), v = t.val().toLowerCase(), s = p.find("[" + j + '="' + n + '"]'), r = s.find(g), u;
                    s.find(b).each(function () {
                        var w = d(this), x = w.attr(i);
                        if (w.text().toLowerCase().search(v) > -1) {
                            w.addClass(m).show();
                        } else {
                            w.removeClass(m).hide();
                        }
                        if (typeof x !== typeof undefined && x !== false) {
                            if (x.toLowerCase().search(v) > -1) {
                                w.addClass(m).show();
                            }
                        }
                    });
                    u = s.find(b + k).length;
                    if (r.length) {
                        if (u === 0) {
                            r.show();
                        } else {
                            r.hide();
                        }
                    }
                });
            });
        }
    };
    return a;
});
define("ui/Notification", ["jqueryExtended"], function (g) {
    var f = "ca-ui-notification-container";
    var a = 5000;
    var b = new g.Deferred();
    b.resolve();
    function e(k) {
        var j = g(document.getElementById(f) || (function () {
                var m = document.createElement("div");
                m.id = f;
                document.body.appendChild(m);
                return m;
            })());
        k.$container = j;
        var l = b, i = new g.Deferred();
        var h = {
            promise: i, hide: function () {
                k.ignore = true;
                if (this.$node) {
                    var m = this.$node;
                    this.$node.fadeOut("normal", function () {
                        m.remove();
                    });
                }
                return h;
            }
        };
        b = i;
        l.done(function () {
            if (!k.ignore) {
                setTimeout(function () {
                    i.resolve();
                }, 500);
                h.$node = c(k);
            } else {
                i.resolve();
            }
        });
        return h;
    }

    function c(i) {
        var h = g('<div class="ca-notification"><div class="ca-notification-text"></div></div>');
        if (i.ignore) {
            return h;
        }
        if (i.closeIcon === true) {
            h.prepend('<div class="ca-close-notification"><i class="icon-times"></i></div>');
        }
        if (!i.sticky) {
            setTimeout(function () {
                h.fadeOut();
            }, i.timeout || a);
        }
        if (i.html) {
            h.findOne(".ca-notification-text").html(i.html);
        } else {
            h.findOne(".ca-notification-text").text(i.text);
        }
        if (i.type === d.INFO) {
            h.addClass("info");
        } else {
            if (i.type === d.WARN) {
                h.addClass("warn");
            } else {
                if (i.type === d.ERROR) {
                    h.addClass("error");
                } else {
                    if (i.type === d.SUCCESS) {
                        h.addClass("success");
                    }
                }
            }
        }
        h.findOne(".ca-close-notification").click(function () {
            h.fadeOut();
        });
        h.appendTo(i.$container);
        return h;
    }

    var d = {
        INFO: "UI_NOTIF_INFO",
        WARN: "UI_NOTIF_WARN",
        ERROR: "UI_NOTIF_ERROR",
        SUCCESS: "UI_NOTIF_SUCCESS",
        message: function (h) {
            return e(h);
        },
        error: function (i, h) {
            h = h || {};
            h.type = d.ERROR;
            h.text = i || h.text;
            return this.message(h);
        },
        warn: function (i, h) {
            h = h || {};
            h.type = d.WARN;
            h.text = i || h.text;
            return this.message(h);
        },
        info: function (i, h) {
            h = h || {};
            h.type = d.INFO;
            h.text = i || h.text;
            return this.message(h);
        }
    };
    return d;
});
define("report/RetryReport", ["jquery"], function (d) {
    var e = "retryreport.shtml";

    function a(f) {
        var g = f.getNode();
        g.find("#timeline1").on("timelineTimespanSet", function (i, h) {
            b([h[0], h[1]]);
        });
    }

    function b(f) {
        if (window.console && console.log) {
            console.log("### RetryReport::requestData:: start date=", f[0]);
            console.log("### RetryReport::requestData:: end date=", f[1]);
        }
        var h = {startdate: f[0], enddate: f[1]};
        var g = e + "?cb=" + new Date().getTime();
        d.ajax({type: "POST", url: g, data: h}).done(function (l) {
            var i = d(l).find("#retryReportData")[0];
            var k = new XMLSerializer();
            var j = k.serializeToString(i);
            d("#retryReportDataHolder").html(j);
            d("#timelineLoader").css("display", "none");
            c(true);
        }).fail(function (j, k, i) {
            if (window.console && console.log) {
                console.log("### RetryReport::FAILLLLLLL:: textStatus=", k, "error=", i);
            }
        });
    }

    function c(g) {
        var f = d(".table-report-retry-js");
        if (window.console && console.log) {
            console.log("### RetryReport::RetryReportUI:: draw table pFromAjaxCall=", g);
        }
        f.each(function () {
            var h = d(this).find("tbody tr");
            h.each(function () {
                var l = "data-volume-retries", o = "data-volume-successful-retries", p = d(this).find("td:nth-child(4)").attr(l), m = p / 100, n = d(this).find("td:nth-child(5)").attr(o), j = ".chart-success", q = ".chart-success-percentage", i = n / m, k = i.toFixed(2) + "%";
                if ((i > 0) && (isFinite(i))) {
                    d(this).find(q).html(k);
                }
                d(this).find(j).stop(true, false).animate({width: k}, 1250);
            });
        });
    }

    return a;
});
define("ui/CheckboxList", ["jqueryExtended", "Constants", "util/Console"], function (v, d, u) {
    var x = u.getLog("ui/CheckboxList");
    var y = "[data-checkbox-list]", l = "[data-template-container]", D = "[data-search-form]", r = "[data-search-form-input]", o = "[data-search-form-icon]", s = "[data-list-deselected]", q = "[data-list-selected]", t = "[data-button-deselect]", j = "[data-button-select]", w = "[data-list-items]", A = "[data-item]", i = "data-item-id", e = "[data-item-icon]", c = "[data-item-input]", p = "[data-item-title]", z = "[data-item-text]", k = "[data-resource-key]", C = "checked", h = ":checked", n = "icon-search", a = "icon-times-circle", B = "icon-chevron-down", g = "icon-chevron-up", b = "disabled", m = "selected", f = "filtered";

    function E(F) {
        this.$node = F.getNode();
        this.parameterSearch = F.parameters.search;
        this.parameterTemplate = F.parameters.template;
        this.parameterResourceKey = F.parameters.resourceKey;
        this.init();
        F.ready();
    }

    E.prototype.init = function () {
        this.createTemplate();
    };
    E.prototype.afterCreateTemplate = function () {
        this.populateTemplate();
        this.removeSearch();
        this.filterContent();
        this.toggleButtons(q, t);
        this.toggleButtons(s, j);
        this.toggleButtons();
        this.toggleText();
        this.selectItem();
        this.addResourceKey();
        this.changeListItem(q, s, j, true);
        this.changeListItem(s, q, t, false);
    };
    E.prototype.createTemplate = function () {
        var F = this, G = F.parameterTemplate;
        if (typeof G !== "undefined") {
            this.$node.each(function () {
                var I = v(this), H = I.find(l);
                I.find(y).hide();
                if (I.find(l).length) {
                    v.when(v.get(adyen.jsbase + G, function (J) {
                        H.append(J);
                    })).then(function () {
                        F.afterCreateTemplate();
                    });
                }
            });
        }
    };
    E.prototype.populateTemplate = function () {
        this.$node.each(function () {
            var H = v(this), G = H.find(q), F = H.find(s);
            H.find(A).each(function () {
                var J = v(this), K = J.find(c), I;
                if (K.is(h)) {
                    I = J.clone().appendTo(G);
                    I.find(c).attr(C, false);
                    I.find(z).hide();
                } else {
                    I = J.clone().appendTo(F);
                    I.find(z).hide();
                }
            });
        });
    };
    E.prototype.removeSearch = function () {
        var F = this, G = F.parameterSearch;
        if (typeof G === "undefined") {
            this.$node.each(function () {
                v(this).find(D).remove();
            });
        }
    };
    E.prototype.filterContent = function () {
        var F = this, G = F.parameterSearch;
        if (typeof G !== "undefined") {
            this.$node.each(function () {
                var I = v(this), H = I.find(r);
                H.on("keyup change", function () {
                    var L = v(this), J = L.parents(D).find(o), M = L.val().toLowerCase(), K = L.parents(l).find(A);
                    if (L.val() !== "") {
                        J.removeClass(n).addClass(a);
                        J.on("click", function () {
                            L.val("").focus();
                            v(this).removeClass(a).addClass(n);
                            K.show().removeClass(f);
                        });
                    } else {
                        J.removeClass(a).addClass(n);
                    }
                    K.each(function () {
                        var N = v(this);
                        if ((N.text().toLowerCase().search(M) > -1)) {
                            N.show().addClass(f);
                        } else {
                            N.hide().removeClass(f);
                        }
                    });
                });
            });
        }
    };
    E.prototype.addResourceKey = function () {
        var F = this, G = F.parameterResourceKey;
        this.$node.each(function () {
            if (typeof G !== "undefined") {
                v(k).each(function () {
                    v(this).append(" " + G);
                });
            }
        });
    };
    E.prototype.toggleText = function () {
        this.$node.each(function () {
            var G = v(this), F = G.find(p);
            F.on("click", function () {
                var H = v(this), I = H.parents(A).find(e), J = H.parents(A).find(z);
                J.toggle();
                if (I.hasClass(B)) {
                    I.removeClass(B).addClass(g);
                } else {
                    I.removeClass(g).addClass(B);
                }
            });
        });
    };
    E.prototype.toggleButtons = function (G, F) {
        this.$node.each(function () {
            var H = v(this), I = H.find(l + " " + c);
            I.on("change", function () {
                var K = v(this).parents(w), L = K.find(c + h), J = v(this).parents(l).find(F);
                if (K.is(G)) {
                    if (L.length > 0) {
                        J.removeClass(b);
                    } else {
                        J.addClass(b);
                    }
                }
            });
        });
    };
    E.prototype.selectItem = function () {
        this.$node.each(function () {
            var F = v(this), G = F.find(l + " " + c);
            G.on("change", function () {
                var I = v(this), H = I.parents(A);
                if (I.is(h)) {
                    H.addClass(m);
                } else {
                    H.removeClass(m);
                }
            });
        });
    };
    E.prototype.changeListItem = function (H, I, F, G) {
        this.$node.each(function () {
            var L = v(this), K = L.find(H), J = L.find(F);
            J.on("click", function () {
                var M = L.find(l + " " + I + " " + A);
                if (!v(this).hasClass(b)) {
                    M.each(function () {
                        var O = v(this), Q = O.attr(i), N = O.find(c), P = [], R = null;
                        L.find(l + " " + H + " " + A).each(function () {
                            P.push(v(this).attr(i));
                        });
                        v.each(P, function () {
                            if (R === null || Math.abs(this - parseInt(Q)) < Math.abs(R - parseInt(Q))) {
                                R = this;
                            }
                        });
                        if (N.is(h)) {
                            if (!K.find("[" + i + '="' + Q + '"]').length) {
                                if (parseInt(Q) > parseInt(R)) {
                                    O.insertAfter(K.find("[" + i + '="' + R + '"]'));
                                } else {
                                    O.insertBefore(K.find("[" + i + '="' + R + '"]'));
                                }
                            }
                            L.find(l + " " + A).each(function () {
                                var S = v(this);
                                if (S.attr(i) === Q) {
                                    S.removeClass(m);
                                    S.find(c).attr(C, false);
                                    S.find(z).hide();
                                    S.find(e).removeClass(g).addClass(B);
                                }
                            });
                            L.find(y + " " + A).each(function () {
                                var S = v(this);
                                if (S.attr(i) === Q) {
                                    S.find(c).attr(C, G);
                                }
                            });
                        }
                    });
                    v(this).addClass(b);
                }
            });
        });
    };
    return E;
});
define("ui/Table/TableColumns", ["jqueryExtended", "util/Console"], function (p, o) {
    var q = o.getLog("ui/Table/TableColumns");

    function a(y) {
        return p.trim(y.attr("data-filter-name") || y.text());
    }

    var c = "checked", k = "data-column-id", e = "data-column-colspan", l = "data-column", t = "data-column-show", d = "csr-input-checkbox-2", h = "csr-label-2", s = h + " checkbox", j = "csr-list-2", g = "settings-column", i = "input", m = "li", r = "table", w = "td", v = "th", b = "thead th", n = "tr", f = "tbody tr", x = "ui/List?icon=icon-cog";

    function u(y) {
        this.$node = y.getNode();
        this.$table = this.$node.parents(r);
        this.$thCells = this.$node.find(v);
        this.columns = [];
        this.persistentPreference = y.parameters.persistentPreference || false;
        this.visibleColumns = y.parameters.visibleColumns || "";
        this.createSettingsColumn();
        this.fetchColumns();
        this.createList();
        this.createListItems();
        this.removeColumnId();
        this.hideColumns();
        this.bindListWidgetChanges();
        this.updateColspans();
        y.ready();
    }

    u.prototype.createSettingsColumn = function () {
        this.$settingsColumn = p("<th></th>").addClass(g).prependTo(this.$node.find(n));
        this.$table.find(f).each(function () {
            p(this).prepend('<td class="' + g + '"></td>');
        });
    };
    u.prototype.fetchColumns = function () {
        var y = this.columns;
        this.$thCells.each(function (B) {
            var C = p(this);
            C.attr(k, B + 1);
            if (C.attr(l) === "false") {
                return;
            }
            var D = C.attr(k), A = a(C), z = C.attr(t);
            if (A !== "") {
                y.push({id: D, name: A, show: z});
            }
        });
    };
    u.prototype.createList = function () {
        this.$listWidget = p("<ul></ul>").hide().addClass(j).appendTo(this.$settingsColumn);
        this.$listWidget.attr("data-widget", x).widget();
    };
    u.prototype.createListItems = function () {
        var y = this, z = this.$listWidget, A = this.visibleColumns;
        p(this.columns).each(function (B, D) {
            var C = "";
            if (A === "" && D.show !== "false") {
                C = c;
            }
            if (("," + A + ",").indexOf("," + D.name + ",") >= 0) {
                C = c;
            }
            if (C === c) {
                y.$thCells.each(function () {
                    if (a(p(this)) === D.name) {
                        p(this).attr(t, "true");
                    }
                });
            }
            z.append('<li><label class="' + s + '"><input type="checkbox" ' + k + '="' + D.id + '" class="' + d + '" ' + C + ">" + D.name + "</label></li>");
        });
    };
    u.prototype.removeColumnId = function () {
        this.$thCells.removeAttr(k);
    };
    u.prototype.hideColumns = function () {
        var y = this.$table;
        this.$listWidget.find(m).each(function () {
            var A = p(this).find("." + d).attr(k), z = p(this).find(i).attr(c);
            if (!z) {
                y.find(b).eq(A).hide();
                y.find(f).each(function () {
                    p(this).find(w).eq(A).hide();
                });
            }
        });
    };
    u.prototype.bindListWidgetChanges = function () {
        var y = this;
        var z = this.$table;
        this.$listWidget.on("change", "." + d, function () {
            var B = p(this).attr(k), A = p(this).is(":checked");
            if (!A) {
                z.find(b).eq(B).attr(t, "false");
                z.find(b).eq(B).hide();
                z.find(f).each(function () {
                    p(this).find(w).eq(B).hide();
                });
            } else {
                z.find(b).eq(B).attr(t, "true");
                z.find(b).eq(B).show();
                z.find(f).each(function () {
                    p(this).find(w).eq(B).show();
                });
            }
            y.updateColspans();
            y.persist();
        });
    };
    u.prototype.updateColspans = function () {
        var y = this.$listWidget.find(m + " ." + d + ":checked").length;
        this.$table.find("[" + e + "]").attr("colspan", y + 1);
    };
    u.prototype.persist = function () {
        if (typeof this.persistentPreference === "string") {
            var A = [];
            this.$node.find("[" + t + '="true"]').each(function () {
                A.push(a(p(this)));
            });
            var z = this.persistentPreference, y = A.join(",");
            q.log("Setting " + z + "=" + y);
            require(["util/UserPreferences"], function (B) {
                B.setPersistentPreference(z, y);
            });
        }
    };
    return u;
});
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
define("fraud/customriskfields/createCustomRiskRules", ["jquery", "hogan", "lodash", "calendar/datepicker", "text!fraud/customriskfields/singleRowTemplate.html", "text!fraud/customriskfields/groupTemplate.html", "text!fraud/customriskfields/messageBox.html"], function (f, a, c, b, e, h, d) {
    function g(p, o, i, w, m, n) {
        var q = this;
        this.init = function () {
            this.ruleId = 0;
            this.groupId = 0;
            this.singleRowTemplate = a.compile(e);
            var D = c.uniq(o, function (G) {
                return G.fieldType;
            });
            if (i.Date) {
                i.Date.Range = ["Date"];
            }
            this.data = {possibleLeftOperands: p, operators: D, rowId: this.ruleId};
            if (!c.isEmpty(m)) {
                try {
                    f("#ruleJSONString").val(m.rule);
                    f("#ruleId").val(m.ruleId);
                    f("#deleteRule").show();
                    f("#deleteRule").click(function () {
                        var H = {
                            title: "Delete Custom Risk Field",
                            attentionMessage: "Warning!",
                            message: "You are about to delete a custom risk rule, this action cannot be undone.",
                            abortButtonText: "Cancel",
                            confirmButtonText: "Delete Rule"
                        };
                        var G = a.compile(d);
                        f("#message-container").html(G.render(H));
                        f("#message-overlay").click(function () {
                            f(this).hide();
                        });
                        f("#confirm-button").click(function () {
                            f("#saveRuleForm").attr("action", w.deleteRule);
                            f("#saveRuleForm").submit();
                        });
                        f("#message-overlay").show();
                    });
                    f("#ruleName").val(m.ruleName).attr("disabled", true);
                    var F = A(m.rule);
                    c.each(F, function (I, G) {
                        var H = q.addNewGroup(!G);
                        y(H.find("#rule-row-" + (q.ruleId - 1)), c.first(I), q.ruleId - 1);
                        c.each(I, function (K, J) {
                            if (J > 0) {
                                y(q.addAndRule(H, q.ruleId, G), K, q.ruleId - 1);
                            }
                        });
                    });
                } catch (E) {
                    this.addNewGroup(true);
                }
            } else {
                this.addNewGroup(true);
            }
            f("#ruleName").on("keyup focus blur change", function (H) {
                var J = f(this);
                var G = J.val();
                if (H.which === 32) {
                    J.val(G.replace(/\s/g, ""));
                    f("#errorInputText").text("You cannot Use Spaces in a CustomRiskRule Name").show().fadeOut(2000, "swing");
                    return false;
                }
                if (G.length > 0 && c.findIndex(n, function (K) {
                        return K.toLowerCase() === G.toLowerCase();
                    }) === -1) {
                    var I = true;
                    f(".value-input").filter(":visible").each(function () {
                        if (f(this).hasClass("deactivated")) {
                            I = false;
                        }
                    });
                    q.activateUIelements(J);
                    if (!I) {
                        f("[name=saveButton]").addClass("disabled");
                    }
                } else {
                    q.deactivateUIelements(J);
                    if (G.length > 0) {
                        f("#errorInputText").text("This ruleName already Exists").show().fadeOut(2000);
                    }
                }
            });
            f("[name=OrButton]").click(c.bind(this.addNewGroup, this, false));
            f("[name=saveButton]").click(c.bind(this.saveConfiguration, this));
        };
        var y = function (G, D, H) {
            G.find("#fieldNamesSelector-" + H + " option").filter(function () {
                var I = c.first(f(this).text().split(" "));
                return I === D.leftOperand.value;
            }).attr("selected", "true");
            G.find("#fieldNamesSelector-" + H).change();
            var E = G.find("#fieldNamesSelector-" + H).val();
            G.find("[name^=operators_]").hide();
            G.find("[name=operators_" + E + "]").val(D.operator).show();
            G.find("[name=operators_" + E + "]").change();
            f("#valueContainer-" + H).children().hide();
            var F = D.rightOperand.value;
            if (F) {
                F = F.split("'").join("");
            }
            if (E === "Date") {
                f("#valueContainer-" + H).find("[name=simpleDateInput]").show();
                f("#valueContainer-" + H).find("[name=dateInput]").val(F);
                f("#valueContainer-" + H).find("[name=dateInput]").change();
            } else {
                f("#valueContainer-" + H).find("[name=simpleInputContainer]").show();
                f("#valueContainer-" + H).find("[name=simpleInput]").val(F);
                f("#valueContainer-" + H).find("[name=simpleInput]").change();
            }
        };
        var A = function (F) {
            var D = [];
            var E = x(F);
            c.each(E, function (G) {
                D.push(u(G));
            });
            return D;
        };
        var u = function (D) {
            var E = [];
            while (D.operator === "AND") {
                E.push(D.leftOperand);
                if (!c.has(D.rightOperand, "type")) {
                    D = D.rightOperand;
                } else {
                    E.push(D.rightOperand);
                }
            }
            E.push(D);
            return E;
        };
        var x = function (D) {
            var E = [];
            while (D.operator === "OR") {
                E.push(D.leftOperand);
                D = D.rightOperand;
            }
            E.push(D);
            return E;
        };
        this.addNewGroup = function (F) {
            var D = f("[name=rules-container]");
            this.groupTemplate = a.compile(h);
            var E = this.groupTemplate.render({groupId: this.groupId});
            D.append(E);
            var G = D.find("#rule-group-" + this.groupId);
            if (F) {
                G.find("[name=orIndicator]").hide();
            }
            this.addAndRule(G, true, F);
            G.find("[name=addAndRule]").click(c.bind(this.addAndRule, this, G, false, F));
            this.groupId++;
            return G;
        };
        this.addAndRule = function (M, F, G) {
            var D = this.ruleId;
            var J = q.data;
            J.rowId = D;
            var H = q.singleRowTemplate.render(J);
            M.find("[name=addNewRuleContainer]").prepend(H);
            var N = f("#rule-row-" + D);
            N.insertBefore(M.find("[name=addAndRule]"));
            var I = N.find("[name=removeButtonContainer]");
            var K = N.find(".remove-button");
            var L = N.find("[name=operatorIndicator]");
            if (F === true && G === true) {
                I.hide();
                L.hide();
            } else {
                I.show();
            }
            var E = N.find("[name=fieldNamesSelector]");
            E.change(q.showOpeators);
            K.click(this.deleteRow);
            M.find("[name=addAndRule]").addClass("disabled").attr("disabled", true);
            f("[name=saveButton],[name=OrButton]").attr("disabled", true).addClass("disabled");
            this.ruleId++;
            return N;
        };
        this.showOpeators = function () {
            var E = f(this);
            var G = E.attr("id").replace("fieldNamesSelector-", "");
            var F = f("#rule-row-" + G);
            F.find("[name=operatorSelector]").attr("id", "operatorSelector-" + G);
            F.find("[name^=operators]").hide();
            if (E.val() === "") {
                F.find("[name=operators_empty]").show();
            }
            F.find("[name=valueContainer]").children().hide();
            F.find("[name=simpleInputContainer]").show();
            var D = f("#rule-row-" + G).find("[name='operators_" + E.val() + "']");
            D.change(q.chooseOperator);
            D.show();
        };
        this.chooseOperator = function () {
            var G = f(this);
            var J = G.parent().attr("id").replace("operatorSelector-", "");
            var I = f("#rule-row-" + J);
            var F = I.find("#fieldNamesSelector-" + J).val();
            var D = I.find("[name=operators_" + F + "]").val();
            var E = i[F][D];
            var H = I.find("#valueContainer-" + J);
            c.each(E, function (L) {
                if (L === "Date") {
                    var K;
                    H.find("div").hide();
                    if (D === "Range") {
                        H.find("[name=rangeDateInput],[name=startDateInput],[name=endDateInput]").show();
                        K = H.find("[name=startDate],[name=endDate]");
                    } else {
                        H.find("[name=simpleDateInput]").show();
                        K = H.find("[name=simpleDateInput]").find("[name=dateInput]");
                    }
                    if (J !== 0) {
                        H.find("[name=removeButtonContainer]").show();
                    }
                    K.each(function () {
                        new b(f(this)[0], {dateFormat: "Y-m-d", useToday: true, linkedToTimeline: false});
                    }).on("keyup focus blur change", C);
                } else {
                    if (L === "Number") {
                        H.find(".simple-value-input").on("keyup focus blur change", t);
                    } else {
                        if (L === "Boolean") {
                            H.find(".simple-value-input").on("keyup focus blur change", B);
                        } else {
                            if (L === "String") {
                                H.find(".simple-value-input").on("keyup focus blur change", s);
                            } else {
                                if (L === "NumberList") {
                                    H.find(".simple-value-input").on("keyup focus blur change", l);
                                } else {
                                    if (L === "StringList") {
                                        H.find(".simple-value-input").on("keyup focus blur change", k);
                                    }
                                }
                            }
                        }
                    }
                }
            });
        };
        var s = function () {
            var D = f(this);
            var E = D.val() || D.val();
            if (E.length > 0) {
                q.activateUIelements(D);
            }
            return true;
        };
        var k = function () {
            return true;
        };
        var B = function () {
            var D = f(this);
            var E = D.val() || D.val();
            if (E.toLowerCase() === "true" || E.toLowerCase() === "false" || E.toLowerCase() === "t" || E.toLowerCase() === "f") {
                q.activateUIelements(D);
            } else {
                q.deactivateUIelements(D);
            }
        };
        var t = function () {
            var D = f(this);
            var E = D.val() || D.val();
            if (r(E)) {
                q.activateUIelements(D);
            } else {
                q.deactivateUIelements(D);
            }
        };
        var l = function () {
            var E = f(this);
            var F = E.val() || E.val().split(",");
            for (var D = 0; D < F.length;
                 D++) {
                if (!r(F[D])) {
                    return false;
                }
            }
            return true;
        };
        var r = function (D) {
            return D.length > 0 && !isNaN(D);
        };
        var j = function (E) {
            var G = /^\d{4}-\d{2}-\d{2}$/;
            if (!E.slice(0, 10).match(G)) {
                return false;
            }
            var H;
            if (!((H = new Date(E)))) {
                return false;
            }
            try {
                var D = H.toISOString().slice(0, 10) === E || (E.length === 16 && Number.parseInt(E.slice(10, 12)) < 23 && Number.parseInt(E.slice(10, 12)) >= 0 && Number.parseInt(E.slice(14, 16)) < 60 && Number.parseInt(E.slice(14, 16)) >= 0) || (E.length === 19 && Number.parseInt(E.slice(10, 12)) < 23 && Number.parseInt(E.slice(10, 12)) >= 0 && Number.parseInt(E.slice(14, 16)) < 60 && Number.parseInt(E.slice(14, 16)) >= 0 && Number.parseInt(E.slice(17, 19)) < 60 && Number.parseInt(E.slice(17, 19)) >= 0);
                return D;
            } catch (F) {
                return false;
            }
        };
        var C = function () {
            var H = f(this);
            var F = H.val();
            var E = H.parent();
            if (j(F)) {
                q.activateUIelements(H.parent());
            } else {
                q.deactivateUIelements(H.parent());
            }
            if (H.attr("name") === "startDate") {
                var D = E.parent().find("[name=endDate]");
                if (!j(D.val())) {
                    q.deactivateUIelements(D);
                } else {
                    q.activateUIelements(D);
                }
            } else {
                if (H.attr("name") === "endDate") {
                    var G = E.parent().find("[name=startDate]");
                    var I = G.val();
                    if (!j(I)) {
                        q.deactivateUIelements(G);
                    } else {
                        q.activateUIelements(G);
                    }
                }
            }
        };
        this.deactivateUIelements = function (E) {
            E.removeClass("activated").addClass("deactivated");
            var D = E.parents().find("[id^=rule-group-]");
            D.find("[name=addAndRule]").addClass("disabled").attr("disabled", true);
            f("[name=saveButton], [name=OrButton]").attr("disabled", true).addClass("disabled");
        };
        this.activateUIelements = function (E) {
            E.removeClass("deactivated").addClass("activated");
            var D = E.parents().find("[id^=rule-group-]");
            D.find("[name=addAndRule]").removeClass("disabled").attr("disabled", false);
            f("[name=OrButton]").attr("disabled", false).removeClass("disabled");
            if (f("#ruleName").hasClass("disabled") || f("#ruleName").length === 0) {
                f("[name=saveButton]").addClass("disabled").attr("disabled", true);
            } else {
                f("[name=saveButton]").removeClass("disabled").attr("disabled", false);
            }
        };
        this.deleteRow = function () {
            var E = f(this).attr("id").replace("removeButton-", "");
            var F = f("#rule-row-" + E);
            f("[name=saveButton], [name=OrButton]").attr("disabled", false);
            q.activateUIelements(f(this));
            var D = F.parent();
            F.remove();
            if (D.parent().find("[id^=rule-row]").length === 0) {
                D.parent().remove();
            }
        };
        var v = function (E, D) {
            if (E.length > 1) {
                return {leftOperand: c.head(E), operator: D, rightOperand: v(c.rest(E), D)};
            } else {
                return c.head(E);
            }
        };
        var z = function (D) {
            if (D.length === 10) {
                return D + " 00:00:00";
            } else {
                if (D.length === 16) {
                    return D + ":00";
                }
            }
            return D;
        };
        this.saveConfiguration = function () {
            var E = w.addRule;
            if (!c.isEmpty(m)) {
                f("#saveRuleForm").attr("action", w.editRule);
                f("#ruleName").attr("disabled", false);
            }
            var D = f("[name=rule-group]");
            var G = [];
            c.each(D, function (I) {
                var H = [];
                var J = f(I).find("[name=rule-row]");
                c.each(J, function (Q) {
                    var L = c.first(f(Q).find("[name=fieldNamesSelector] option:selected").text().split(" "));
                    var S = f(Q).find("[name=fieldNamesSelector]").val();
                    var N = f(Q).find(".operator-selector").filter(":visible").val();
                    var R = f(Q).find("[name=valueContainer]").children().filter(":visible");
                    var P = {operandType: "customField", fieldType: S, value: L};
                    if (R.attr("name") === "rangeDateInput") {
                        var K = R.find("[name=startDate]").val();
                        var M = R.find("[name=endDate]").val();
                        H.push({
                            leftOperand: P,
                            operator: ">=",
                            rightOperand: {operandType: "value", fieldType: S, value: z(K)}
                        });
                        H.push({
                            leftOperand: P,
                            operator: "<",
                            rightOperand: {operandType: "value", fieldType: S, value: z(M)}
                        });
                    } else {
                        var O = R.find("input").val();
                        if (S === "Date") {
                            O = z(O);
                        }
                        H.push({
                            leftOperand: P,
                            operator: N,
                            rightOperand: {operandType: "value", fieldType: S, value: O}
                        });
                    }
                });
                G.push(v(H, "AND"));
            });
            var F = v(G, "OR");
            f("#ruleJSONString").val(JSON.stringify(F));
            f("#saveRuleForm").submit();
        };
    }

    return g;
});
define("ui/Copy", ["jquery", "ui/Notification"], function (c, a) {
    function b() {
        c("[data-copy]").not(".ui-copy-bound").addClass("ui-copy-bound").each(function () {
            var d = c(this);
            var f = d.attr("data-copy");
            var e = (f !== "") ? f : d.text();
            if (typeof window.getSelection === "undefined") {
                d.css({visibility: "hidden"});
                return;
            }
            d.off("click").on("click", function () {
                var h = document.createElement("textarea");
                c(h).val(e);
                document.body.appendChild(h);
                var g = document.createRange();
                g.selectNode(h);
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(g);
                try {
                    var j = document.execCommand("copy");
                    if (j) {
                        a.info(d.attr("data-copy-message") || "Copied the data to the clipboard, so you can paste it in other applications");
                    } else {
                        a.warn("Oops, unable to copy");
                    }
                } catch (i) {
                    a.warn("Oops, unable to copy");
                }
                document.body.removeChild(h);
            });
        });
    }

    return {init: b};
});
define("ui/Table/Sortable", ["jqueryExtended", "ui/Table/TableModel", "ui/Table/RowModel", "util/Console", "Constants"], function (a, j, f, e, b) {
    var g = "asc", c = "desc", h = {
        alphabetical: function (m, l) {
            return m === l ? 0 : (m > l ? 1 : -1);
        }, numeric: function (m, l) {
            if (typeof m !== "number") {
                m = parseInt(m, 10);
            }
            if (typeof l !== "number") {
                l = parseInt(l, 10);
            }
            if (isNaN(m) && isNaN(l)) {
                return 0;
            } else {
                if (isNaN(m)) {
                    return 1;
                } else {
                    if (isNaN(l)) {
                        return -1;
                    }
                }
            }
            return m === l ? 0 : (m > l ? 1 : -1);
        }
    };

    function i(m) {
        var n = this;
        n.state = {sort: "", ascending: null};
        n.sortings = {};
        n.$table = a(m);
        n.$sorting = n.$table.findOne("thead").find("td[data-sortable],th[data-sortable]");
        n.tableHeaders = j.getHeaders(n.$table);
        n.$sorting.each(function () {
            var s = a(this), p = j.getColumnName(s), o = s.attr("data-sortable"), q = o.split(",")[0];
            var r = {
                type: q,
                $node: s,
                $asc: a('<a class="csr-button csr-sort-button csr-sort"><i class="icon-sort-asc"></i></a>').attr("rel", "sort-" + g + ":" + p).appendTo(s),
                $desc: a('<a class="csr-button csr-sort-button csr-sort"><i class="icon-sort-desc"></i></a>').attr("rel", "sort-" + c + ":" + p).appendTo(s)
            };
            n.sortings[p] = r;
        });
        n.$sorting.on("click keyup", ".csr-sort", function (q) {
            var p = a(q.target).closest(".csr-sort"), o = p.attr("rel"), s = o.split(":")[0].split("-").pop(), r = o.split(":")[1];
            n.sort(r, g === (s || g));
        });
        n.rows = [];
        n.$table.find("tbody>tr").each(function (o) {
            a(this).attr("data-sort-index", o);
            n.rows[o] = this;
        });
        n.$table.on(b.EV_CONTENT_HIDE + " " + b.EV_CONTENT_SHOW, function () {
            n.updateRows(n.$rows);
        });
        this.updateIcons();
        if (n.$table.attr("data-initial-sorting")) {
            var l = n.$table.attr("data-initial-sorting").split(":");
            n.sort(l[0], g === (l[1] || g));
        }
    }

    i.prototype.sort = function (m, n) {
        if (typeof m !== "string" || typeof n !== "boolean") {
            e.log("InvalidArgumentException", typeof m, typeof n);
            return;
        } else {
            if (m === this.state.sort && n === this.state.ascending) {
                n = !n;
            }
        }
        this.state.sort = m;
        this.state.ascending = n;
        var l = this.$rows;
        this.updateRows(l);
        this.updateIcons();
    };
    i.prototype.updateIcons = function () {
        var n = this.state.ascending, m = this.state.sort, l = "sort-" + (n ? g : c) + ":" + m;
        this.$sorting.find(".csr-sort").each(function () {
            var o = a(this);
            if (this.rel === l) {
                o.addClass("active").show();
            } else {
                if (this.rel.indexOf(":" + m) > -1 && m !== "") {
                    o.removeClass("active").hide();
                } else {
                    if (this.rel.indexOf("sort-asc:") > -1) {
                        o.removeClass("active").show();
                    } else {
                        o.removeClass("active").hide();
                    }
                }
            }
        });
    };
    i.prototype.updateRows = function (m) {
        var o = this.state, q = o.ascending ? 1 : -1, n = this.sortings[o.sort] || {}, p = h[n.type || ""];
        if (typeof p !== "function") {
            if (adyen.sort && typeof adyen.sort[n.type] === "function") {
                p = adyen.sort[n.type];
            }
            if (typeof p !== "function") {
                p = h.alphabetical;
            }
        }
        this.rows.sort(function (t, r) {
            var u = f.getModel(t, true), s = f.getModel(r, true), w = a(t), v = a(r);
            if (!w.is(":visible") && v.is(":visible")) {
                return 1;
            } else {
                if (w.is(":visible") && !v.is(":visible")) {
                    return -1;
                }
            }
            if (o.sort === "") {
                return h.numeric(w.attr("data-sort-index"), v.attr("data-sort-index"));
            }
            return q * p(u.fields[o.sort], s.fields[o.sort]);
        });
        var l = false;
        a.each(this.rows, function (r, s) {
            if (r > 0) {
                a(s).insertAfter(l);
            }
            l = s;
        });
    };
    function d() {
        a("table[data-sortable]").not(".csr-table-sorting-bound").addClass("csr-table-sorting-bound").each(function () {
            var l = new i(this);
        });
    }

    function k() {
        a(document).ready(function () {
            d();
        });
    }

    return {init: k};
});
define("util/data/Sanitation", ["util/Type"], function (a) {
    var c = {
        ALLOW_ONLY_WHITELISTED: function (d) {
            return d.replace(/[^a-zA-Z0-9]/g, "");
        }, STRIP_XML: function (d) {
            return c.ALLOW_ONLY_WHITELISTED(d.replace(/<.*?(>|$)/g, ""));
        }, NUMBERS_ONLY: function (d) {
            return d.replace(/\D/g, "");
        }
    };
    var b = {};
    b.filterString = function (d, f, e) {
        if (typeof d === "undefined") {
            return d;
        }
        if (typeof d !== "string") {
            throw new Error("filterString expects a string as input");
        }
        if (typeof f === "string" && c.hasOwnProperty(f)) {
            f = c[f];
        }
        if (typeof f !== "function") {
            return b.filterString(d, c.ALLOW_ONLY_WHITELISTED, e);
        }
        return f(d, e);
    };
    b.filter = function (j, d, m) {
        var f = (m ? m + "." : "");
        if ((typeof j).match(/^(undefined|boolean|number)$/) || j === null) {
            return j;
        }
        if (typeof j === "string") {
            return b.filterString(j, d, m);
        }
        if (a.isArray(j)) {
            var h = [];
            for (var e = 0, g = j.length; e < g; e++) {
                h[e] = b.filter(j[e], d, m + "[]");
            }
            return h;
        }
        if (typeof j === "object") {
            var k = {};
            for (var l in j) {
                if (j.hasOwnProperty(l)) {
                    k[l] = b.filter(j[l], d, f + l);
                }
            }
            return k;
        }
        throw new Error("Unable to filter '" + typeof j + "'");
    };
    b.createConfiguredFilter = function (k) {
        var e = [];
        for (var g in k) {
            if (k.hasOwnProperty(g) && g !== "default") {
                var j = [], f = g.split(/\./);
                while (f.length > 0) {
                    var d = f.shift();
                    if (d === "*") {
                        j.push("\\w+(.\\w+)*");
                    } else {
                        j.push(d);
                    }
                }
                var h = new RegExp("^" + j.join("\\."));
                e.push({length: g.split(".").length + 1, regexp: h, filter: k[g]});
            }
        }
        e.push({length: 0, regexp: /.*/, filter: k["default"] || c.ALLOW_ONLY_WHITELISTED});
        e.sort(function (l, i) {
            if (l.length === i.length) {
                return 0;
            }
            return l.length > i.length ? -1 : 1;
        });
        return function (i, l) {
            var n = e.slice(0);
            while (n.length > 0) {
                var m = n.shift();
                if (l.match(m.regexp)) {
                    return b.filter(i, m.filter, l);
                }
            }
            return b.filter(i, k["default"] || c.ALLOW_ONLY_WHITELISTED, l);
        };
    };
    return b;
});
define("ui/VisualizationController", ["jqueryExtended", "underscore", "util/Console"], function (e, b, c) {
    var a = c.getLog("ui/VisualizationController");

    function d(f) {
        var h = this.$node = f.getNode();
        this.allCharts = h.find("[data-widget*=VisualizationComponent]");
        if (window.console && a.log) {
            a.log("### VisualizationController::VisualizationController:: this.allCharts=", this.allCharts);
        }
        var i = [];
        var g = this;
        this.allCharts.on("chartRendered", function (m, l) {
            if (window.console && a.log) {
                a.log("### VisualizationController:: chartRendered D:: ", m);
            }
            var j = e(m.currentTarget);
            var k = b.find(i, function (n) {
                return b.isEqual(e(n.el), j);
            });
            if (k) {
                k = l;
            } else {
                i.push(l);
            }
            if (g.allChartsReady(i, g.allCharts)) {
                b.each(i, function (n) {
                    if (window.console && a.log) {
                        a.log("### VisualizationController:: CHART CALL SET UP EVENTS:: ");
                    }
                    n.setupEvents();
                });
                i = [];
            }
        });
        f.ready();
    }

    d.prototype.allChartsReady = function (g, f) {
        var h = b.chain(g).map(function (i) {
            return e(i.el)[0];
        }).value();
        if (b.isEmpty(b.difference(h, f)) || b.isEmpty(b.difference(f, h))) {
            return true;
        }
        return false;
    };
    return d;
});
define("ui/Form/SubmitOnce", ["jquery"], function (d) {
    var e = "true";
    var b = "submitOnce";
    var c = "submitOnceAndDisableSubmits";

    function a() {
        d(document).ready(function () {
            d("form[data-submit-once]").unbind("submit.ui-form-submitonce").bind("submit.ui-form-submitonce", function (g) {
                if (g.isDefaultPrevented()) {
                    return;
                }
                var f = d(g.target).closest("form");
                var h = f.attr("data-submit-once");
                if (h !== e && h !== b && h !== c) {
                    return;
                }
                if (h === c) {
                    setTimeout(function () {
                        f.find('input[type="submit"], button[type="submit"]').prop("disabled", true).each(function () {
                            var i = d(this);
                            if (i.is(".csr-button")) {
                                i.addClass("csr-disabled");
                            } else {
                                if (i.is(".csr-button-2")) {
                                    i.addClass("disabled");
                                }
                            }
                        });
                    }, 10);
                }
                if (f.attr("data-is-submitted") === "true") {
                    g.preventDefault();
                } else {
                    f.attr("data-is-submitted", "true");
                }
            });
        });
    }

    return {init: a};
});
define("ui/Localize", ["jqueryExtended", "util/Ajax", "util/QueryString"], function (c, b, a) {
    function d(g, f, e) {
        var i = this;
        this.node = g;
        this.setLocale(e, false);
        this.bundleData = {"default": {}};
        this._available = false;
        this.findNodes().each(function () {
            var k = c(this), j = k.attr("data-tl"), m = k.attr("data-tl-attributes");
            if (j) {
                i.bundleData["default"][j] = k.html();
            }
            if (m) {
                var l = a.parse(m);
                for (j in l) {
                    if (l.hasOwnProperty(j)) {
                        i.bundleData["default"][l[j]] = k.attr(j);
                    }
                }
            }
        });
        var h = [];
        if (c.isArray(f)) {
            while (f.length > 0) {
                h.push(this.loadBundle(f.shift()));
            }
        } else {
            h.push(this.loadBundle(f));
        }
        c.when.apply(c, h).then(function () {
            var j = Array.prototype.slice.call(arguments);
            while (j.length > 0) {
                i.bundleData = c.extend(true, i.bundleData, j.shift());
            }
            i._available = true;
            i.updateUI();
        }, function (j) {
            if (window.console && window.console.warn) {
                window.console.warn("Could not localize", j);
            }
        });
        this.updateUI();
    }

    d.prototype.findNodes = function (e) {
        if (!this._nodes || e) {
            this._nodes = c(this.node).find("[data-tl],[data-tl-attributes]");
        }
        return this._nodes;
    };
    d.prototype.setLocale = function (e, f) {
        this._locale = e;
        if (f) {
            this.updateUI();
        }
        if (this._available) {
            return this.getLocaleData();
        }
    };
    d.prototype.getLocaleData = function (g) {
        var h = {}, f = this.bundleData;
        if (!f) {
            return h;
        }
        var e = (g || this.getLocale() || "").toLowerCase();
        if (f.hasOwnProperty(e)) {
            h = f[e];
            if (h && h.hasOwnProperty("_extends")) {
                h = c.extend(true, {}, this.getLocaleData(h._extends), h);
            }
        } else {
            h = f["default"];
        }
        return h;
    };
    d.prototype.loadBundle = function (f) {
        var e = new c.Deferred();
        b.getJSON(adyen.jsbase + "/" + f + ".json?9326").then(function (g) {
            e.resolve(g);
        }, function (g) {
            e.reject(g);
        });
        return e.promise();
    };
    d.prototype.ready = function (f) {
        if (this._available) {
            return f();
        }
        var e = this;
        return setTimeout(function () {
            e.ready(f);
        }, 100);
    };
    d.prototype.updateUI = function () {
        var e = this;
        if (!this._available) {
            return setTimeout(function () {
                e.updateUI();
            }, 500);
        }
        var f = this.getLocaleData();
        this.findNodes().each(function () {
            var i = c(this), k = i.attr("data-tl"), h = i.attr("data-tl-attributes");
            if (k) {
                if (f.hasOwnProperty(k)) {
                    i.html(e.expandProperties(f[k], k));
                } else {
                    i.text("");
                }
            }
            if (h) {
                var j = a.parse(h);
                for (var g in j) {
                    if (j.hasOwnProperty(g)) {
                        if (f.hasOwnProperty(j[g])) {
                            i.attr(g, f[j[g]]);
                        } else {
                            i.attr(g, "");
                        }
                    }
                }
            }
        });
    };
    d.prototype.getLocale = function () {
        return this._locale || "default";
    };
    d.prototype.expandProperties = function (g, f) {
        var e = this;
        return g.replace(/\{\{@(\w+)\}\}/g, function (h, i) {
            return (e.getLocaleData(i) || {})[f] || "";
        });
    };
    return {
        getLocalizer: function (f, e, g) {
            return new d(f, e, g);
        }
    };
});
define("ui/ToggleRow", ["jqueryExtended", "Constants", "util/Console"], function (d, b, f) {
    var j = f.getLog("ui/ToggleRow");
    var l = "data-toggle-row", o = "data-toggle-content", g = "data-toggle-button", q = ":visible", p = "uncollapsed", a = "i", e = "icon", i = "icon-chevron-down", n = "icon-chevron-up", m = "button", h = "disabled", k = "disabled";

    function c(r) {
        this.$node = r.getNode();
        this.parameterRow = r.parameters.row;
        this.parameterContent = r.parameters.content;
        this.parameterType = r.parameters.type;
        this.parameterButton = r.parameters.button;
        this.init();
        r.ready();
    }

    c.prototype.init = function () {
        this.toggleContent();
    };
    c.prototype.toggleContent = function () {
        var s = this, r = s.parameterRow, v = s.parameterContent, t = s.parameterType, u = s.parameterButton;
        if (typeof v !== "undefined" && typeof t !== "undefined") {
            this.$node.each(function () {
                var A = d(this), x = A.find(a), y = d("[" + g + '="' + u + '"]'), z = d("[" + l + '="' + v + '"]'), w = d("[" + o + '="' + v + '"]');
                A.on("click", function () {
                    w.toggle();
                    if (w.is(q)) {
                        if (t === e) {
                            x.removeClass(i).addClass(n);
                        }
                        if (typeof r !== "undefined") {
                            z.addClass(p);
                        }
                        if (t === m) {
                            A.addClass(k).prop(h, true);
                        }
                        w.addClass(p);
                    } else {
                        if (t === e) {
                            x.removeClass(n).addClass(i);
                        }
                        if (typeof r !== "undefined") {
                            z.removeClass(p);
                        }
                        w.removeClass(p);
                    }
                });
                if (typeof u !== "undefined") {
                    y.on("click", function () {
                        if (t === m) {
                            w.hide().removeClass(p);
                            A.removeClass(k).prop(h, false);
                        }
                    });
                }
            });
        }
    };
    return c;
});
(function () {
    var n, p, m, k = {}, c = "Power Search - ", a = "ui-gs-searchtype", i = {
        searchtype: '<div class="ps-searchoption" data-type="searchType"><select name="searchType"><option selected="selected" value="accountNumber">Account number/IBAN</option><option value="branchCode">Bank/Branch code</option><option value="description">Description</option></select></div>',
        accountTypeCompany: '<input type="hidden" id="accountTypeCode" name="accountTypeCode"  value="Company"/>',
        accountTypeMerchantAccount: '<input type="hidden" id="accountTypeCode" name="accountTypeCode"  value="MerchantAccount"/>',
        offersearchtype: '<select name="searchType"><option selected="selected" value="pspref">Psp reference</option><option value="merchantref">Merchant reference / Description</option><option value="email">Shopper e-mail</option></select>',
        offertxtype: '<select name="txTypeCode"><option value="Offer">Offer</option><option value="Order">Order</option><option value="Payment">Payment</option><option value="Capture">Capture</option><option value="Dispute">Dispute</option><option value="DisputeEvent">DisputeEvent</option><option value="BankInstruction">BankInstruction</option><option value="BankStatement">BankStatement</option><option value="CompanyPayout">CompanyPayout</option><option value="MerchantPayout">MerchantPayout</option><option value="EpaLine">EpaLine</option></select>'
    }, e = {
        payment: "Search for payments by entering some search terms in the field above (e.g. amount, reference number, shopper email, etc...)",
        bankReference: "Search for bank transfer references, using * as wildcard.<br/> NOTE: Search would be done on last 1 Month old References.For older reference, please select appropriate date range on next screen",
        offer: "Search for tx, using * as wildcard",
        incomingBankTransfer: "Search for incoming bank transfers, using * as wildcard.<br />NOTE: Description based search will work for 1 Month old TX's for more options please use Wigdet search.	",
        companyMerchant: "Type some characters into the search box for autocomplete matches.<br />You can either prefix your search characters with a '<code>^</code>' to force the match to occur at the beginning or append a '<code>$</code>' for the match to occur at the end."
    }, g = {
        payment: "amount, reference number, shopper email, etc...",
        bankReference: "bank transfer references, use * as wildcard",
        offer: "psp or merchant reference, shopper e-mail, use * as wildcard",
        incomingBankTransfer: "account number, iban, bank code, description, use * as wildcard",
        companyMerchant: "company or merchant account name"
    }, b = {};

    function l() {
        var q = n("#power-search");
        q.removeClass("opened");
        q.find("input.ps-query").attr("placeholder", "");
    }

    function f(s, r) {
        var q = s.find(".power-search-tools input[name=ps-search-type]:checked");
        if (k.type !== q.val()) {
            k.type = q.val();
            m.trackEvent("search", r ? "open" : "change_type", c + k.type);
        }
    }

    function h(x) {
        var q = x.is(".opened");
        x.addClass("opened");
        if (!x.is(".ps-initialized")) {
            x.addClass("ps-initialized");
            var t = [], B = [], z = adyen.searchmodes, y = x.find(".power-search-inactive"), s = p.getPreference(a, adyen.activeSearch || z[0].type);
            for (var w = 0, F = z.length; w < F; w++) {
                var D = z[w], A = D.hotKey ? D.type.replace(new RegExp("(" + D.hotKey + ")", "i"), '<u class="csr-accesskey">$1</u>') : D.type;
                t.push('<label class="ps-search-type">');
                t.push('<input type="radio" name="ps-search-type" value="' + D.type + '"');
                if (D.hotKey) {
                    t.push(' accesskey="' + D.hotKey + '"');
                }
                if (s && s.toLowerCase() === D.type.toLowerCase()) {
                    t.push(' checked="checked"');
                } else {
                    if (adyen.activeSearch && adyen.activeSearch.toLowerCase() === D.type.toLowerCase()) {
                        t.push(' checked="checked"');
                    }
                }
                t.push(" /> " + A + "</label>");
                if (D.options) {
                    var r = jQuery('<div class="ps-search-option" data-pstype="' + D.type + '"></div>');
                    for (var u = 0, v = D.options.length; u < v; u++) {
                        var C = D.options[u];
                        r.append(jQuery(i[C] || "<div>Option '" + C + "' is not available.</div>"));
                        r.append(" ");
                    }
                    y.append(r);
                }
                if (D.hint) {
                    y.append('<div class="ps-type-info" data-pstype="' + D.type + '">' + (e[D.hint] || D.hint) + "</div>");
                }
            }
            x.find(".power-search-types").prepend(t.join(""));
            if (x.find(".power-search-tools input[name=ps-search-type]:checked").length === 0) {
                n(x.find(".power-search-tools input[name=ps-search-type]")[0]).attr("checked", "checked").change();
                p.setPreference(a, s);
            } else {
                x.find(".power-search-tools input[name=ps-search-type]:checked").change();
            }
            var E = x.find("form");
            E.on("submit.track", function (G) {
                G.preventDefault();
                E.off("submit.track");
                m.event("track", {
                    type: "action",
                    category: "search",
                    action: "search",
                    searchType: c + k.type,
                    querySize: (E.find("input[type=text],input[type=search]").val() || "").length
                }).always(function () {
                    E.submit();
                });
            });
        }
        f(x, q);
    }

    function d(z, x) {
        var r = jQuery(z.target), t = r.attr("value"), w = x.find(".power-search-tools"), y = x.find(".power-search-inactive"), s = x.find("input.ps-search-type"), u = null, q = "/empty", v = "query";
        p.setPreference(a, t);
        x.find(".ps-search-option").each(function (C, D) {
            var B = jQuery(D), A = r.closest("form");
            B.appendTo(B.attr("data-pstype") === t ? w : y);
        });
        x.find(".ps-type-info").each(function (C, E) {
            var B = jQuery(E), A = r.closest("form"), F;
            B.appendTo(B.attr("data-pstype") === t ? w : y);
            A.attr("action", "#");
            A.attr("autocomplete", "");
            for (var D = 0, G = adyen.searchmodes.length; D < G; D++) {
                if (t === adyen.searchmodes[D].type) {
                    s.val(t);
                    F = adyen.searchmodes[D];
                    q = F.autoComplete || q;
                    A.attr("action", F.action);
                    A.attr("autocomplete", q);
                    v = F.queryParam || v;
                    A.find("input.ps-query,input.ps-new-query").attr("name", v).attr("placeholder", g[F.hint] || "");
                }
            }
        });
        x.find("input.ps-query").focus();
        require(["ui/AutoComplete"], function (A) {
            u = u || new A({
                    inputElement: "#ps-query", listElement: "#ps-suggestions", url: q, select: function (D, E) {
                        var C = (E || {}).item || {}, B = (C.description || "").match(/account type:\s*(Company|MerchantAccount)/);
                        if (B) {
                            m.event("event", {
                                type: "action",
                                category: "search",
                                action: "search_autocomplete",
                                label: c + k.type
                            }).then(function () {
                                document.location.href = adyen.base + "ca/accounts/choose.php?setActiveAccountKey=" + encodeURIComponent(B[1] + "." + C.value);
                            });
                        }
                    }
                });
            if (q === "/empty") {
                u.disable();
            } else {
                u.url = q;
                u.paramName = v;
                u.getUpdatedChoices();
                u.enable();
            }
        }, function () {
        });
        f(x, true);
    }

    function o(r) {
        var t = r, s = n(r), q;
        s.find('script[type="text/template"]').each(function () {
            var u = (this.id || "").replace(/^ps-/, "");
            if (u !== "" && i.hasOwnProperty(u)) {
                i[u] = n(this).html();
            }
        });
        s.on("click focus keypress", "input,select", function (u) {
            h(s);
            clearInterval(q);
            setTimeout(function () {
                clearInterval(q);
            }, 5);
        });
        s.on("blur", "input,select", function (u) {
            if (!u.isDefaultPrevented()) {
                q = setTimeout(l, 200);
            }
        });
        s.on("click keypress", function (u) {
            u.stopPropagation();
            clearInterval(q);
        });
        jQuery(document.body).on("click", function (u) {
            if (!u.isDefaultPrevented()) {
                q = setTimeout(l, 10);
            }
        });
        s.on("click", ".close-icon", function () {
            s.removeClass("opened");
        });
        s.on("change", "input[name=ps-search-type]", function (u) {
            d(u, s);
        });
        if (typeof bindEscape === "function") {
            bindEscape();
        }
    }

    function j(s, q, r) {
        n = s;
        p = q;
        m = r;
        return {boot: o};
    }

    define("ui/globalsearch", ["jquery", "util/UserPreferences", "util/Analytics"], function (s, r, q) {
        return j(s, r, q);
    });
}());
define("ui/Tabs", ["jqueryExtended", "Constants"], function (c, a) {
    var b = "active";

    function d(f) {
        var h = this.$node = f.getNode();
        var k = this.$tags = h.find("a[href]");
        var e = this.$tabs = [];
        var i = f.parameters.activeClass || b;
        var j = f.parameters.activeNode || false;
        var g = ("true" === f.parameters.persistent);
        k.each(function () {
            var l = c(this).attr("href").split("#");
            if (l.length === 2) {
                var n = l.pop();
                var m = document.getElementById(n);
                e.push(m);
                this.associatedTab = document.getElementById(m);
                if (g) {
                    if (document.location.hash === "#" + n + "/0" || document.location.hash === n + "/0") {
                        c(this).addClass(i + " active-on-boot");
                    } else {
                        c(this).removeClass(i + " inactive-on-boot");
                    }
                }
            }
        });
        f.ready();
        this.$tags.click(function (l) {
            l.preventDefault();
            var m = c(l.currentTarget).closest("a"), o = (m.attr("href") || "").split("#");
            if (m.length === 0) {
                return;
            }
            k.filter("." + i).removeClass(i);
            m.addClass(i);
            var n = "#" + o.pop();
            c(e).hideWithEvent(a.EV_CONTENT_HIDE);
            c(n).showWithEvent(a.EV_CONTENT_SHOW);
            if (g) {
                document.location.hash = n + "/0";
            }
            if (j) {
                k.each(function () {
                    var p = c(this).closest(j);
                    if (p.length === 1) {
                        if (c(this).is("." + i)) {
                            p.addClass(i);
                        } else {
                            p.removeClass(i);
                        }
                    }
                });
            }
        });
        if (this.$tags.filter("." + i).length > 0) {
            this.$tags.filter("." + i).click();
        } else {
            this.$tags.filter("a[href]:first").click();
        }
    }

    return d;
});
define("ui/Form/AjaxForm", ["jqueryExtended", "util/Console", "util/Ajax", "util/QueryString", "Constants"], function (a, h, c, k, d) {
    var n = "change.ui-form-ajaxform,blur.ui-form-ajaxform", f = "input,select,textarea", i = h.getLog("AjaxForm"), g = "data-ajaxform-group", e = "data-ajaxform-synchronize", j = "data-ajaxform-synchronize-always";

    function b(o) {
        var q = o.find("input[type=hidden]"), p = {};
        q.each(function () {
            var r = a(this);
            p[r.attr("name")] = r.val();
        });
        return p;
    }

    function m(o, p) {
        if (!o.attr("name")) {
            return;
        }
        p[o.attr("name")] = o.val() || p[o.attr("name")];
        if (o.is("input[type=checkbox]") && !o.is(":checked")) {
            p[o.attr("name")] = "";
        } else {
            if (o.is("input[type=radio]") && !o.is(":checked")) {
                i.warn("Radio ajax form is not yet implemented");
                return false;
            }
        }
        return true;
    }

    function l() {
        a(document).ready(function () {
            a(document.body).find("form[data-ajax-form]").unbind(n).bind(n, f, function (t) {
                var o = a(t.target), x = o.closest("form"), q = b(x), p = k.parse(x.attr("data-ajax-form") || "");
                var r = o.closest("[" + g + "]");
                var s = x.find("[" + j + "]");
                if (p.include) {
                    var v = {}, w = p.include.split(/\s*,\s*/ig);
                    while (w.length > 0) {
                        var u = w.shift();
                        if (u && q.hasOwnProperty(u)) {
                            v[u] = q[u];
                        }
                    }
                    q = v;
                }
                if (x.length === 0) {
                    i.log("There is no form..", o);
                    return;
                }
                if ((typeof a.fn.valid === "function") && !o.valid() || "" === o.attr("name")) {
                    i.log("Node is not valid..");
                    return;
                }
                if (!m(o, q)) {
                    return;
                }
                o.removeClass("csr-server-error").addClass("csr-input-pending").attr("data-error", "");
                i.log("Doing request", x.attr("action"), q);
                c.post(x.attr("action"), q).then(function (C) {
                    var z = a(C);
                    var y = z.find(".errorMessage");
                    if (y.length > 0) {
                        o.addClass("csr-server-error");
                        o.attr("data-error", y.text());
                    } else {
                        if (a(C).find("h1.pagetitle").text() === "Problem Displaying Page") {
                            o.addClass("csr-server-error");
                            o.attr("data-error", "Unable to save your data.");
                        } else {
                            if (a(C).find(".csr-login-page,.ca-login-form").length > 0) {
                                o.addClass("csr-server-error");
                                o.attr("data-error", "Your session expired. Please refresh the page.");
                                window.adyen && adyen.monitorActiveAccount && adyen.monitorActiveAccount("", true);
                            }
                        }
                    }
                    if (o.is(".csr-server-error")) {
                        var B = {}, D = a.fn.validate && o.parents("form[data-validate]").validate();
                        if (D) {
                            B[o.attr("name")] = o.attr("data-error") + "<br />Please try again later";
                            D.showErrors(B);
                        }
                    }
                    if (r.length > 0) {
                        var E = r.attr(g);
                        var A = r.find("[" + e + "]");
                        if (A.length > 0) {
                            z.find("[" + g + "]").filter(function (F, G) {
                                return a(G).attr(g) === E;
                            }).find("[" + e + "]").each(function () {
                                var F = a(this).attr(e);
                                A.filter(function (G, H) {
                                    return a(H).attr(e) === F;
                                }).html(a(this).html()).trigger(d.EV_CONTENT_MERGED);
                            });
                        } else {
                            i.warn("The group doesn't have fields to synchronize", E);
                        }
                    }
                    if (s.length > 0) {
                        z.find("[" + j + "]").each(function () {
                            var G = a(this).attr(j);
                            var F = a(this).html();
                            s.filter(function (H, I) {
                                return a(I).attr(j) === G && a(I).html() !== F;
                            }).html(F).trigger(d.EV_CONTENT_MERGED);
                        });
                    }
                }, function (y) {
                    o.addClass("csr-server-error");
                }).always(function () {
                    o.removeClass("csr-input-pending").trigger(d.EV_STATE_CHANGE);
                });
            });
            a(document.body).unbind("click.ui-form-ajaxform").on("click.ui-form-ajaxform", "a[rel=reset-all-fields]", function (q) {
                q.preventDefault();
                var r = a(q.target).closest("[data-element], fieldset"), p = r.closest("form"), s = b(p), o = [];
                r.find(f).each(function () {
                    if (this.checked) {
                        this.checked = false;
                    }
                    s[this.name] = "";
                    a(this).val("");
                    o.push(this);
                });
                a(o).addClass("csr-input-pending");
                a.post(p.attr("action"), s).always(function () {
                    a(o).removeClass("csr-input-pending");
                }).then(function () {
                    if (r.is("[data-element]")) {
                        r.fadeOut("fast").trigger(d.EV_CONTENT_HIDE);
                    }
                });
            });
        });
    }

    return {init: l};
});
define("util/XMLParser", ["jquery", "util/Console"], function (f, b) {
    var a, d;
    if (typeof a !== "function" && typeof window.DOMParser !== "undefined") {
        a = function (j) {
            var i = new DOMParser();
            try {
                return i.parseFromString(j, "text/xml");
            } catch (h) {
                b.warn("[XMLParser/parseXml/DOMParser] " + h.message);
                return false;
            }
        };
        a.mode = "DOMParser";
    }
    if (typeof a !== "function" && typeof window.ActiveXObject !== "undefined") {
        try {
            if (new window.ActiveXObject("Microsoft.XMLDOM")) {
                a = function (h) {
                    h = h.replace(/^<!DOCTYPE[^>]*?>/i, "");
                    var e = new window.ActiveXObject("Microsoft.XMLDOM");
                    e.async = "false";
                    e.loadXML(h);
                    return e;
                };
                a.mode = "Microsoft.XMLDOM";
            }
        } catch (g) {
            a = null;
        }
    }
    if (typeof a !== "function" && f.browser.msie && f.browser.version.split(/\D/)[0] < 9) {
        a = function (h) {
            b.warn("Parse XML by XML Data Island: innerHTML hack");
            var e = doc.createElement("div");
            e.style.display = "none";
            doc.body.appendChild(e);
            e.innerHTML = "<xml>" + f.trim(h) + "</xml>";
            return e.firstChild.XMLDocument;
        };
        a.mode = "XMLDataIsland";
    }
    if (typeof a !== "function") {
        a = function () {
            b.warn("[XMLParser/parseXML] No XML parser found");
            throw new Error("No XML parser found");
        };
        a.mode = "NoXMLParser";
    }
    function c(h) {
        try {
            return (new XMLSerializer()).serializeToString(h);
        } catch (j) {
            try {
                return h.xml;
            } catch (i) {
                b.warn("[XMLParser/Xml2Str] " + i.message);
            }
        }
        return false;
    }

    if (typeof window.XMLSerializer !== "undefined") {
        d = c;
        d.mode = "XMLSerializer";
    } else {
        d = function (h) {
            try {
                return h.xml;
            } catch (i) {
                b.warn("[XMLParser/Xml2Str] " + i.message);
            }
            return false;
        };
        d.mode = "XMLNodeXmlAttr";
    }
    return {parseFromString: a, serializeXml: d};
});
define("ui/MultiSelectList", ["jqueryExtended", "Constants", "util/Console"], function (u, E, O) {
    var L = O.getLog("ui/MultiSelectList");
    var Q = "ul", Z = "li", B = "a", x = "i", ab = "div", H = "span", b = "input", t = "label", at = "option", v = "csr-list-container-2", a = "." + v, I = "csr-list-2", S = "." + I, ay = "csr-label-2 checkbox", z = ".csr-label-2.checkbox", aq = "csr-input-2", G = "." + aq, ak = "csr-input-checkbox-2", p = "." + ak, aa = "csr-button-2 secondary", ap = ":visible", r = "checked", A = ":" + r, U = ":last", af = "selected", ac = "initial-value", N = "data-option-item", ai = "data-list-item", h = "data-list-relation-item", Y = "data-list-relation-name", w = "show", ad = "static", m = "clearfix", k = "." + ad, J = "has-toggle", an = "toggle", y = "." + an, R = "Select all", az = "Deselect all", av = "has-icon", n = "Select item", g = "list-placeholder", au = "." + g, d = au + " " + H, C = "has-count", c = "count", W = "." + c, aw = "." + c + " " + H, l = "has-filter", V = "filter", ax = "." + V, ag = "icon-times-circle", ah = "no-items", ar = "." + ah, P = "No items found", o = "has-relation", q = "has-relation-text", K = "has-relation-item", am = "has-relation-value", aj = "." + am, s = "This value has been selected in ", T = "btn-relation-change", D = "." + T, i = "Change", al = "btn-relation-cancel", ae = "." + al, e = "Cancel", F = "csr-list-group-2", X = "group-list-item", j = "." + X, M = "group-label", ao = "." + M;

    function f(aA) {
        this.$node = aA.getNode();
        this.parameterName = aA.parameters.name;
        this.parameterCount = aA.parameters.count;
        this.parameterIcon = aA.parameters.icon;
        this.parameterFilter = aA.parameters.filter;
        this.parameterToggle = aA.parameters.toggle;
        this.parameterRelation = aA.parameters.relation;
        this.parameterRelationName = aA.parameters.relationName;
        this.parameterGroupName = aA.parameters.groupName;
        this.parameterGroupContainer = aA.parameters.groupContainer;
        this.parameterGroup = aA.parameters.group;
        this.parameterCheckSelected = aA.parameters.checkSelected;
        this.parameterListItemId = aA.parameters.listItemId;
        this.parameterInitialValue = aA.parameters.initialValue;
        this.init();
        aA.ready();
    }

    f.prototype.init = function () {
        this.wrapMultiSelect();
        this.generateList();
        this.generateListItem();
        this.generateListItemId();
        this.generateRelationListItemId();
        this.generateInitialValue();
        this.createToggle();
        this.createFilter();
        this.createIcon();
        this.createName();
        this.createCounter();
        this.createGroup();
        this.createGroupItems();
        this.toggleList();
        this.labelChange();
        this.labelChangeToggle();
        this.labelChangeName();
        this.labelChangeCounter();
        this.labelChangeRelation();
        this.labelChangeGroup();
        this.clickGroupItem();
        this.checkSelected();
        this.closeList();
    };
    f.prototype.wrapMultiSelect = function () {
        this.$node.each(function () {
            var aA = u(this);
            aA.hide();
            aA.wrap("<" + ab + ' class="' + v + '"></' + ab + ">");
        });
    };
    f.prototype.generateList = function () {
        this.$node.each(function () {
            var aA = u(this), aB = aA.parent(a);
            aA.hide();
            aB.append("<" + Q + ' class="' + I + '" style="display: none;"></' + Q + ">");
        });
    };
    f.prototype.generateListItem = function () {
        this.$node.each(function () {
            var aB = u(this), aC = aB.parent(a), aA = aC.find(S);
            aB.find(at).each(function () {
                var aF = u(this), aG = aF.text(), aE = aF.attr(af), aD = "";
                if ((aE !== "undefined") && (aE === af)) {
                    aD = r;
                }
                aA.append("<" + Z + "><" + t + ' class="' + ay + '"><input type="checkbox" class="' + ak + '" ' + aD + ">" + aG + "</" + t + "></" + Z + ">");
            });
        });
    };
    f.prototype.generateListItemId = function () {
        var aA = this.parameterListItemId;
        if (aA !== "false") {
            this.$node.each(function (aE) {
                var aG = u(this), aC = aG.find(at), aB = 1, aF = 1, aH = aG.parent(a), aD = aH.find(Z);
                aC.each(function () {
                    u(this).attr(N, aE + "-" + aB++);
                });
                aD.each(function () {
                    var aI = u(this);
                    if (!aI.hasClass(ad)) {
                        aI.attr(ai, aE + "-" + aF++);
                    }
                });
            });
        }
    };
    f.prototype.generateRelationListItemId = function () {
        var aA = this.parameterRelation;
        if (typeof aA !== "undefined") {
            this.$node.each(function () {
                var aF = u(this), aC = aF.find(at), aB = 1, aE = 1, aG = aF.parent(a), aD = aG.find(Z);
                aC.each(function () {
                    u(this).attr(h, aA + "-" + aB++);
                });
                aD.each(function () {
                    var aH = u(this);
                    if (!aH.hasClass(ad)) {
                        aH.attr(h, aA + "-" + aE++);
                    }
                });
            });
        }
    };
    f.prototype.generateInitialValue = function () {
        var aA = this.parameterInitialValue;
        if (aA !== "false") {
            this.$node.each(function () {
                var aC = u(this), aD = aC.parent(a), aB = aD.find(Z);
                aB.each(function () {
                    var aE = u(this);
                    if (aE.find(p).is(A)) {
                        aE.addClass(ac);
                    }
                });
            });
        }
    };
    f.prototype.createToggle = function () {
        var aA = this.parameterToggle;
        if (aA === "true") {
            this.$node.each(function () {
                var aC = u(this), aD = aC.parent(a), aB = aD.find(S);
                aD.addClass(J);
                aB.prepend("<" + Z + ' class="' + an + " " + ad + '"><' + t + ' class="' + ay + '"><' + b + ' type="checkbox" class="' + ak + '"><' + H + ">" + R + "</" + H + "></" + t + "></" + Z + ">");
                aB.find(y + " " + p).change(function () {
                    var aK = u(this), aG = aK.parents(S), aH = aG.find(Z).not(k), aE = aG.find(y + " " + H), aI = aG.find(p), aF = aG.find(Z + U + " " + z), aJ = aK.parents(a).find(at);
                    if (aK.is(A)) {
                        aJ.attr(af, af);
                        aI.prop("checked", true);
                        aH.addClass(af);
                        aE.text(az);
                        aK.parents(a).find(d).text(aF.text());
                    } else {
                        aJ.removeAttr(af);
                        aI.prop("checked", false);
                        aH.removeClass(af);
                        aE.text(R);
                    }
                });
            });
        }
    };
    f.prototype.createFilter = function () {
        var aA = this.parameterFilter;
        if (aA === "true") {
            this.$node.each(function () {
                var aC = u(this), aD = aC.parent(a), aB = aD.find(S);
                aD.addClass(l);
                aB.prepend("<" + Z + ' class="' + ah + " " + ad + '"><' + ab + ">" + P + "</" + ab + "></" + Z + ">");
                aB.prepend("<" + Z + ' class="' + V + " " + ad + '"><' + b + ' type="text" autocomplete="off" class="' + aq + '"><' + x + ' class="' + ag + '"></' + x + "></" + Z + ">");
                aD.find(ax + " " + G).on("keyup change", function () {
                    var aE = u(this).val();
                    aB.find(Z).each(function () {
                        if ((u(this).find(z).text().search(aE) > -1) || u(this).hasClass(ad)) {
                            u(this).show();
                        } else {
                            u(this).hide();
                        }
                    });
                    if (aB.find(Z).not(k).is(ap)) {
                        aB.find(ar).hide();
                    } else {
                        aB.find(ar).show();
                        aB.find(Z).show();
                    }
                    if (aE === "") {
                        u(this).next(x).hide();
                        if (aA === "true") {
                            aD.find(y).show();
                        }
                    } else {
                        u(this).next(x).show();
                        if (aA === "true") {
                            aD.find(y).hide();
                        }
                    }
                    u(this).next(x).click(function () {
                        u(this).prev(G).val("");
                        u(this).hide();
                        aB.find(Z).show();
                        aB.find(ar).hide();
                    });
                });
            });
        }
    };
    f.prototype.createIcon = function () {
        var aA = this.parameterIcon;
        if (typeof aA !== "undefined") {
            this.$node.each(function () {
                var aB = u(this), aC = aB.parent(a);
                aC.addClass(av);
                aC.prepend("<" + ab + ' class="' + g + '"><' + x + ' class="' + aA + '"></' + x + "></" + ab + ">");
            });
        }
    };
    f.prototype.createName = function () {
        var aA = this.parameterName;
        this.$node.each(function () {
            var aB = u(this), aC = aB.parent(a);
            if (typeof aA !== "undefined") {
                aC.prepend("<" + ab + ' class="' + g + '"><' + H + ">" + aA + "</" + H + "></" + ab + ">");
            } else {
                if (!aC.find(au).length) {
                    aC.prepend("<" + ab + ' class="' + g + '"><' + H + ">" + n + "</" + H + "></" + ab + ">");
                }
            }
        });
    };
    f.prototype.createCounter = function () {
        var aA = this.parameterCount;
        this.$node.each(function () {
            var aC = u(this), aB = parseInt(aC.find(p + A).size()), aD = aC.parent(a);
            if (aA === "bottom") {
                aD.addClass(C);
                aD.append("<" + ab + ' class="' + c + '"><' + H + ">" + aB + "</" + H + ">" + af + "</" + ab + ">");
                if (aB === 0) {
                    aC.next(W).hide();
                }
            }
            if (aA === "placeholder") {
                aD.addClass(C);
                aC.parents(a).find(d).text(aB + " " + af);
            }
        });
    };
    f.prototype.createGroup = function () {
        var aB = this.parameterGroup, aA = this.parameterGroupContainer;
        if (typeof aA !== "undefined") {
            this.$node.each(function () {
                var aE = u(this), aC = aE.find(p + A).length, aD = aB.split(","), aF = u("#" + aA);
                if (aF.length > 0) {
                    if (typeof aB !== "undefined") {
                        u.each(aD, function () {
                            if (u("#" + this).find(ao).length < 1) {
                                aF.append("<" + ab + ' id="' + this + '" class="' + F + '"></' + ab + ">");
                            }
                            if (aC > 0) {
                                u("#" + this).show();
                            }
                        });
                    }
                }
            });
        }
    };
    f.prototype.createGroupItems = function () {
        var aB = this.parameterGroupName, aA = this.parameterGroup;
        if (typeof aA !== "undefined") {
            this.$node.each(function () {
                var aE = u(this), aD = aE.find(p + A).parent(t), aC = aA.split(",");
                u.each(aC, function () {
                    var aF = u("#" + this);
                    if ((aF.find(ao).length < 1) && (typeof aB !== "undefined")) {
                        aF.append("<" + ab + ' class="' + M + '">' + aB + "</" + ab + ">");
                    }
                    aD.each(function () {
                        var aG = u(this);
                        setTimeout(function () {
                            aF.prepend("<" + ab + ' class="' + X + '" ' + ai + '="' + aG.parent(Z).attr(ai) + '">' + aG.text() + "</" + ab + ">");
                        }, 50);
                    });
                });
            });
        }
    };
    f.prototype.toggleList = function () {
        this.$node.each(function () {
            var aA = u(this), aB = aA.parent(a);
            aB.find(au).click(function (aC) {
                u(S).hide();
                aB.toggleClass(w);
                if (aB.hasClass(w)) {
                    aB.find(S).show();
                } else {
                    aB.find(S).hide();
                }
                aC.stopPropagation();
            });
        });
    };
    f.prototype.labelChange = function () {
        this.$node.each(function () {
            var aB = u(this), aA = aB.parent(a).find(z);
            aA.change(function () {
                var aF = u(this), aH = aF.parents(a), aG = aF.parent(Z).attr(ai), aE = aH.find(p + A).last(), aD = aH.find(d), aC = u("[" + N + '="' + aG + '"]').map(function () {
                    return u(this)[0];
                });
                if (aF.find(p).is(A)) {
                    aC.attr(af, af);
                    aF.parent(Z).addClass(af);
                    if (!aF.parent(Z).hasClass(an)) {
                        aD.text(aF.text());
                    }
                } else {
                    aC.removeAttr(af);
                    aF.parent(Z).removeClass(af);
                    if (!aF.parent(Z).hasClass(an)) {
                        aD.text(aE.parent(z).text());
                    }
                }
            });
        });
    };
    f.prototype.labelChangeToggle = function () {
        var aA = this.parameterToggle;
        if (typeof aA !== "undefined") {
            this.$node.each(function () {
                var aC = u(this), aB = aC.parent(a).find(z);
                aB.change(function () {
                    var aE = u(this), aI = aE.parents(a), aD = aE.parents(S), aH = aD.find(y + " " + p), aK = aD.find(y), aG = aD.find(y + " " + z + " " + H), aF = parseInt(aI.find(p).size() - 1), aJ = parseInt(aI.find(p + A).not(aI.find(Z + k + " " + p)).size());
                    if (aE.find(p).is(A)) {
                        if (aA === "true") {
                            if (aF === aJ) {
                                aH.prop("checked", true);
                                aG.text(az);
                                aK.addClass(af);
                            }
                        }
                    } else {
                        if (aA === "true") {
                            aH.prop("checked", false);
                            aG.text(R);
                            aK.removeClass(af);
                        }
                    }
                });
            });
        }
    };
    f.prototype.labelChangeName = function () {
        var aA = this.parameterName, aB = this.parameterIcon;
        this.$node.each(function () {
            var aD = u(this), aC = aD.parent(a).find(z);
            aC.change(function () {
                var aF = u(this), aG = aF.parents(a), aE = aG.find(d), aH = parseInt(aG.find(p + A).not(aG.find(Z + k + " " + p)).size());
                if (aH === 0) {
                    if (typeof aA !== "undefined") {
                        aE.text(aA);
                    } else {
                        if (typeof aB === "undefined") {
                            aE.text(n);
                        }
                    }
                }
            });
        });
    };
    f.prototype.labelChangeCounter = function () {
        var aA = this.parameterName, aB = this.parameterCount;
        this.$node.each(function () {
            var aD = u(this), aC = aD.parent(a).find(z);
            aC.change(function () {
                var aF = u(this), aG = aF.parents(a), aE = aG.find(d), aH = parseInt(aG.find(p + A).not(aG.find(Z + k + " " + p)).size());
                if (aB === "bottom") {
                    aG.find(aw).html(aH);
                    if (aH === 0) {
                        aG.find(W).hide();
                        aE.text(aA);
                    } else {
                        aG.find(W).show();
                    }
                }
                if (aB === "placeholder") {
                    if (aH > 0) {
                        aE.text(aH + " " + af);
                    } else {
                        aE.text(aA || n);
                    }
                }
            });
        });
    };
    f.prototype.labelChangeRelation = function () {
        var aB = this.parameterRelation, aA = this.parameterRelationName;
        if ((typeof aB !== "undefined") && (typeof aA !== "undefined")) {
            this.$node.each(function () {
                var aC = u(this), aD = aC.parent(a);
                aD.addClass(o);
                aC.attr(Y, aA);
                aC.find(Z).each(function () {
                    var aE = u(this);
                    aE.find(z).change(function () {
                        var aG = u(this), aH = aG.parent(Z), aJ = aG.parent(Z).attr(h), aF = u("[" + h + '="' + aJ + '"]').map(function () {
                            if (u(this).hasClass(af)) {
                                return u(this);
                            }
                        }), aI = u("[" + h + '="' + aJ + '"]').map(function () {
                            if ((u(this).hasClass(af)) && (!u(this).is(ap))) {
                                return u(this).parent(Q).attr(Y);
                            }
                        });
                        if (aF.length > 1) {
                            aH.addClass(K);
                            aG.find(p).prop("checked", false);
                            if (aH.find(aj).length === 0) {
                                aH.append("<" + ab + ' class="' + am + " " + m + '"><' + ab + ' class="' + q + '">' + s + aI[0] + "</" + ab + "><" + ab + ' class="' + aa + " " + al + '">' + e + "</" + ab + "><" + ab + ' class="' + aa + " " + T + '">' + i + "</" + ab + "></" + ab + ">");
                            }
                            aH.find(ae).click(function () {
                                aH.removeClass(K);
                                aH.removeClass(af);
                                aH.find(aj).remove();
                            });
                            aH.find(D).click(function () {
                                u("[" + h + '="' + aJ + '"]').each(function () {
                                    var aK = u(this);
                                    if (aK.find(p).is(A)) {
                                        aK.find(z).trigger("click");
                                    }
                                });
                                aG.find(z).trigger("click");
                                aG.find(p).prop("checked", true);
                                aH.removeClass(K);
                                aH.find(aj).remove();
                            });
                        } else {
                            aG.find(z).trigger("click");
                        }
                    });
                });
            });
        }
    };
    f.prototype.labelChangeGroup = function () {
        var aA = this.parameterGroup;
        if (typeof aA !== "undefined") {
            this.$node.each(function () {
                var aB = u(this);
                aB.find(z).change(function () {
                    var aE = u(this), aF = aE.parents(Z).attr(ai), aD = aE.find(p + A).parent(t), aC = aA.split(",");
                    if (aE.find(p).is(A)) {
                        if (typeof aA !== "undefined") {
                            u.each(aC, function () {
                                var aG = u("#" + this);
                                aD.each(function () {
                                    var aH = u(this), aJ = aH.parent(Z).attr(ai), aI = [];
                                    aG.find(ab).each(function () {
                                        aI.push(u(this).attr(ai));
                                    });
                                    if (u.inArray(aJ, aI) === -1) {
                                        aG.prepend("<" + ab + ' class="' + X + '" ' + ai + '="' + aH.parent(Z).attr(ai) + '">' + aH.text() + "</" + ab + ">");
                                    }
                                });
                            });
                        }
                    } else {
                        if (typeof aA !== "undefined") {
                            u.each(aC, function () {
                                u(j).each(function () {
                                    var aG = u(this).attr(ai);
                                    if (aG === aF) {
                                        u(this).remove();
                                    }
                                });
                            });
                        }
                    }
                    if (typeof aA !== "undefined") {
                        u.each(aC, function () {
                            var aH = u("#" + this), aG = aH.find(j).size();
                            if (aG > 0) {
                                aH.show();
                                aH.addClass(w);
                            } else {
                                aH.hide();
                                aH.removeClass(w);
                            }
                        });
                    }
                });
            });
        }
    };
    f.prototype.clickGroupItem = function () {
        var aA = this.parameterGroup;
        if (typeof aA !== "undefined") {
            this.$node.each(function () {
                var aB = u(this);
                aB.parent(a).find(Z).each(function () {
                    var aC = u(this);
                    u(document).on("click", j, function () {
                        var aF = u(this), aD = aF.attr(ai), aE = aC.attr(ai);
                        aF.remove();
                        if (aE === aD) {
                            aC.find(z).trigger("click");
                        }
                    });
                });
            });
        }
    };
    f.prototype.checkSelected = function () {
        var aA = this.parameterName, aB = this.parameterCount, aC = this.parameterCheckSelected;
        if (aC !== "false") {
            this.$node.each(function () {
                var aD = u(this);
                aD.parent(a).find(Z).each(function () {
                    var aH = u(this), aG = aH.hasClass(af), aJ = aH.parents(a), aI = parseInt(aJ.find(p + A).not(aJ.find(Z + k + " " + p)).size()), aF = aJ.find(d), aE = aJ.find(W + " " + H);
                    if (aH.find(p).is(A)) {
                        aH.addClass(af);
                        if (typeof aA !== "undefined") {
                            aF.text(aH.find(z).text());
                        }
                    } else {
                        if ((typeof aA !== "undefined") && (aG === true) && (aH.has(B).length > 0)) {
                            aF.text(aH.find(B).text());
                        } else {
                            if (aB === "placeholder") {
                                aF.text(aI + " " + af);
                            } else {
                                if (aB === "bottom") {
                                    aE.text(aI);
                                }
                            }
                        }
                    }
                });
            });
        }
    };
    f.prototype.closeList = function () {
        this.$node.parent(a).find(S).click(function (aA) {
            aA.stopPropagation();
        });
        u("html").click(function () {
            u(S).hide();
            u(a).removeClass(w);
        });
    };
    return f;
});
define("ui/Form/Editor/TextArea", ["jqueryExtended", "json", "ace/ace"], function (e, d, c) {
    var a = {css: /\.css$/i, javascript: /\.js$/i, html: /(inc\/(.*)\.txt$)|\.html$/i};

    function b() {
        e(function () {
            e("textarea[data-editor]").filter(":not(.editor-bound)").addClass("editor-bound").each(function () {
                var k = e(this), f = d.parse(k.attr("data-editor"));
                if (!f.syntax && f.filename) {
                    for (var i in a) {
                        if (a.hasOwnProperty(i)) {
                            if (f.filename.match(a[i])) {
                                f.syntax = i;
                                break;
                            }
                        }
                    }
                }
                if (!f.syntax) {
                    return;
                }
                var j = e("<div></div>").height(k.height()).insertBefore(k);
                f.id = j.getOrGenerateId();
                var h = c.edit(f.id), g = h.getSession();
                h.setTheme("ace/theme/eclipse");
                g.setMode("ace/mode/" + f.syntax);
                g.setTabSize(4);
                g.setUseSoftTabs(true);
                g.setUseWorker(false);
                g.on("change", function (m) {
                    var l = "" + h.getValue();
                    if (f.syntax === "css") {
                        l = l.replace(/&nbsp;/g, " ");
                    }
                    k.val(l).change();
                });
                g.setValue(k.val());
                k.hide();
            });
        });
    }

    return {init: b};
});
define("ui/Form/FormInForm", ["jqueryExtended", "Constants"], function (e, c) {
    var b = c.getNamespaced([c.EV_CONTENT_MERGED, c.EV_CONTENT_SHOW, c.EV_CONTENT_HIDE].join(" "), "ui-form-forminform");

    function d() {
        e("[data-form-in-form]").each(function () {
            var i = e(this), f = i.attr("data-form-in-form"), g = e(f);
            i.height(g.height()).width(g.width());
            if (i.is(":visible")) {
                var h = i.offset();
                if (typeof h === "undefined") {
                    if (!g.is(":hidden")) {
                        g.hideWithEvent(c.EV_CONTENT_HIDE);
                    }
                } else {
                    if (!g.is(":visible")) {
                        g.offset(h).showWithEvent(c.EV_CONTENT_SHOW);
                    }
                }
            } else {
                g.hideWithEvent(c.EV_CONTENT_HIDE);
            }
        });
    }

    function a() {
        e(document).ready(d);
        e(document).on(b, d);
    }

    return {init: a};
});
define("service/AuthorisationsPerDay", ["jquery"], function (c) {
    var a = {};

    function b(d) {
        if (typeof d === "boolean" && d) {
            delete a.getItemsPromise;
        } else {
            if (typeof a.getItemsPromise === "function") {
                return a.getItemsPromise;
            }
        }
        a.getItemsPromise = (function () {
            var f = new c.Deferred(), g = new c.Deferred(), e = new c.Deferred();
            c.get(adyen.config.speedometerUrl).then(function (h) {
                g.resolve(parseInt(jQuery(h).find("dials dial").attr("value") || "0", 10));
            }, function (j, i, h) {
                g.reject(j);
            });
            c.get(adyen.config.weekHistoryUrl).then(function (j) {
                var n = [], m = [], h = c(j), k = h.find("categories category"), p = h.find('dataset[seriesName="last week"] set'), l = h.find('dataset[seriesName="week before"] set');
                k.each(function () {
                    m.push(jQuery(this).attr("label"));
                });
                var i = false, o = false;
                l.each(function (q, r) {
                    var s = parseInt(jQuery(r).attr("value") || "0", 10);
                    if (s < i || i === false) {
                        i = s;
                    }
                    if (s > o || o === false) {
                        o = s;
                    }
                    n.push({week: 1, index: q, totalIndex: q, name: m[q], value: s});
                });
                p.each(function (q, r) {
                    var s = parseInt(jQuery(r).attr("value") || "0", 10);
                    if (s < i || i === false) {
                        i = s;
                    }
                    if (s > o || o === false) {
                        o = s;
                    }
                    n.push({week: 2, index: q, totalIndex: q + 7, name: m[q], value: s});
                });
                e.resolve({items: n, meta: {min: i, max: o}});
            }, function (j, i, h) {
                e.reject(j, i, h);
            });
            c.when(g.promise(), e.promise()).then(function (k, j) {
                var i = j.items, h = j.meta;
                f.resolve({TPD: k, history: i, max: (h.max < k ? k : h.max), min: (h.min > k ? k : h.min)});
            }, function () {
                f.reject("Something went wrong");
            });
            return f.promise();
        }());
        return a.getItemsPromise;
    }

    return {getItems: b};
});
define("fraud/customriskfields/customRiskFields", ["jquery", "hogan", "lodash", "text!fraud/customriskfields/messageBox.html", "text!fraud/customriskfields/tableRow.html"], function (g, c, d, e, f) {
    function a(k, j) {
        var h = this;
        this.init = function () {
            this.allFields = j;
            g("#message-overlay").click(function () {
                g(this).hide();
            });
            g(".activate-risk-field").change(h.activationAction);
            this.setupNewFieldCreationAction();
            g("[id^=delete]").click(h.fieldDeletionAction);
            g("#showInactive").change(function () {
                var l = g(this);
                if (l.attr("checked") === "checked") {
                    g("[id^=activate-input]").filter(":not(:checked)").each(function () {
                        var m = g(this).attr("id").replace("activate-input-", "");
                        g("#row-" + m).show();
                    });
                } else {
                    g("[id^=activate-input]").filter(":not(:checked)").each(function () {
                        var m = g(this).attr("id").replace("activate-input-", "");
                        g("#row-" + m).hide();
                    });
                }
            });
            g("#searchInput").on("keyup focus blur change", function () {
                var l = g(this).val();
                if (l.length < 3) {
                    g("[id^=row-]").show();
                    return;
                }
                d.each(j, function (n) {
                    var m = n.fieldName;
                    if (m.toLowerCase().indexOf(l.toLowerCase()) === -1) {
                        g("#row-" + m).hide();
                    } else {
                        g("#row-" + m).show();
                    }
                });
            });
        };
        this.fieldDeletionAction = function () {
            var n = g(this);
            var l = n.attr("id").replace("delete-", "");
            var m = n.find(".icon-times").hasClass("disabled");
            if (m) {
                h.showEnabledDeletionMessageBox();
            } else {
                h.showDeletionMessageBox(l);
            }
        };
        this.showEnabledDeletionMessageBox = function () {
            var l = {
                title: "Cannot Delete Custom Risk Field",
                attentionMessage: "Warning!",
                message: "You cannot delete a custom risk field while it is enabled.",
                abortButtonText: "Cancel"
            };
            this.renderMessagebox(l);
        };
        this.showDeletionMessageBox = function (m) {
            var l = {
                title: "Delete Custom Risk Field",
                attentionMessage: "Warning!",
                message: "You are about to delete a custom risk field, this action cannot be undone.",
                abortButtonText: "Cancel",
                confirmButtonText: "Delete Field"
            };
            this.renderMessagebox(l);
            g("#message-container").find("#confirm-button").click(function () {
                var o = {fieldName: m};
                var n = k.deleteField;
                b(n, o, function (p) {
                    if (d.has(p, "fieldName") && p.success) {
                        g("#row-" + p.fieldName).remove();
                        g("#message-overlay").hide();
                        h.allFields = d.filter(h.allFields, function (q) {
                            return q.fieldName !== m;
                        });
                    } else {
                        i();
                    }
                }, i);
            });
        };
        function i() {
            g("#attention-message").text("Error!");
            g("#message-text").text("Deletion of this field failed! Please contact the development team!");
            g("#confirm-button").val("Try Again");
        }

        this.setupNewFieldCreationAction = function () {
            g("#newFieldName").on("keyup focus blur change", function (m) {
                var n = g(this);
                var o = n.val();
                if (m.which === 32) {
                    n.val(o.replace(/\s/g, ""));
                    g("#availabilityErrorMessage").text("You cannot Use Spaces in a CustomRisk Field Name").show().fadeOut(2000);
                    g(".icon-exclamation-triangle").show().fadeOut(2000);
                    return false;
                }
                if (o.length === 0) {
                    g("#createField").attr("disabled", true).addClass("disabled");
                    return;
                }
                var l = d.find(h.allFields, function (p) {
                    return p.fieldName.toLowerCase() === o.toLowerCase();
                });
                if (l) {
                    g("#newFieldName").addClass("disabled").removeClass("enabled");
                    g("#availabilityErrorMessage").text("Field with fieldName " + o + " already exists!").show().fadeOut(2000);
                    g(".icon-exclamation-triangle").show().fadeOut(2000);
                    g("#createField").attr("disabled", true).addClass("disabled");
                } else {
                    g("#newFieldName").addClass("enabled").removeClass("disabled");
                    g("#availabilityErrorMessage").hide();
                    if (g("#fieldType option:selected").val() === "default") {
                        g("#availabilityErrorMessage").text("Please select a Field Type").show().fadeOut(2000);
                        g(".icon-exclamation-triangle").show().fadeOut(2000);
                        g("#createField").attr("disabled", false).addClass("disabled");
                    } else {
                        g("#createField").attr("disabled", false).removeClass("disabled");
                    }
                }
            });
            g("#fieldType").change(function () {
                var l = g(this);
                if (g("#newFieldName").hasClass("enabled") && l.val() !== "default") {
                    g("#createField").attr("disabled", false);
                    g("#createField").removeClass("disabled");
                } else {
                    g("#createField").attr("disabled", true).addClass("disabled");
                }
            });
            g("#createField").click(function () {
                var l = g("#fieldType").val();
                var o = g("#newFieldName").val();
                var m = g("#descriptionField").val() || "No Description";
                var n = {fieldName: o, fieldType: l, description: m};
                b(k.saveNewField, n, function (p) {
                    h.addNewFieldInTable(p);
                }, function () {
                    g("#availabilityErrorMessage").text("Couldn't Save this field!").show().fadeOut(2000);
                });
            });
        };
        this.addNewFieldInTable = function (m) {
            var l = c.compile(f);
            g("#tableBody").append(l.render(m));
            var n = m.fieldName;
            g("#activate-input-" + n).change(h.activationAction);
            g("#delete-" + n).click(h.fieldDeletionAction);
            h.allFields.push(m);
        };
        this.activationAction = function () {
            event.stopPropagation();
            var q = g(this);
            var r = q.attr("id").replace("activate-input-", "");
            var p = {fieldName: r};
            var o = k.activate;
            var l = function (s) {
                var t = s.fieldName;
                if (!s || !s.success) {
                    n();
                    return;
                }
                g("#message-overlay").hide();
                if (s.newActiveStatus === true) {
                    g("#activate-" + t).find(".switch.switch-off").removeClass("switch-off").addClass("switch-on");
                    g("#row-" + t).find(".icon-times").removeClass("enabled").addClass("disabled");
                } else {
                    g("#activate-" + t).find(".switch.switch-on").removeClass("switch-on").addClass("switch-off");
                    g("#row-" + t).find(".icon-times").removeClass("disabled").addClass("enabled");
                    if (g("#showInactive:visible").length > 0 && g("#showInactive").attr("checked") !== "checked") {
                        g("#row-" + t).hide();
                    }
                }
            };
            var n = function () {
                g("#attention-message").text("Error!");
                g("#message-text").text("DeActivation of this field failed! Please contact the development team!");
                g("#availabilityErrorMessage").text("DeActivation of this field failed! Please contact the development team!").show().fadeOut(2000);
                g("#confirm-button").val("Try Again");
            };
            if (q.attr("checked") === "checked") {
                p.newActiveStatus = true;
                b(o, p, l, n);
                return;
            }
            var m = Number.parseInt(q.val());
            if (m === 0) {
                b(o, {fieldName: r, newActiveStatus: false}, l, n);
            } else {
                h.showDeactivationMessageBox(q.val(), r, l, n);
            }
        };
        this.renderMessagebox = function (m) {
            var l = c.compile(e);
            g("#message-container").html(l.render(m));
            g("#message-overlay").show();
        };
        this.showDeactivationMessageBox = function (o, p, l, n) {
            var m = {
                title: "DeActivate Custom Risk Field",
                attentionMessage: "Warning!",
                message: "You are about to deactivate this field for all " + o + " accounts that currently use it! This action cannot be undone.",
                abortButtonText: "Cancel",
                confirmButtonText: "Deactivate Field"
            };
            this.renderMessagebox(m);
            g("#message-container").find("#confirm-button").click(function () {
                event.stopPropagation();
                b(k.activate, {fieldName: p, newActiveStatus: false}, l, n);
            });
        };
    }

    function b(j, k, h, i) {
        g.ajax({type: "POST", url: j, data: k, success: h, error: i});
    }

    return a;
});
define("ui/Form/Audited", ["jqueryExtended"], function (b) {
    function a(c) {
        var g = this.$node = c.getNode();
        var i = this.auditUser = c.parameters.auditUser;
        var e = this.auditTime = c.parameters.auditTime;
        var j = g.val();
        var f = this.$edit = b("<textarea></textarea>").hide().insertBefore(g);
        f.attr("cols", g.attr("cols") || 50);
        f.attr("rows", g.attr("rows") || 50);
        g.css("border", "solid 1px red");
        g.hide();
        if (j !== "") {
            var h = this.previous = b('<div><textarea disabled="disabled"></textarea><input type="button" class="csr-button-2 secondary" value="Update" />').insertBefore(g);
            h.css("position", "relative");
            h.findOne("textarea").attr("cols", g.attr("cols") || 50).attr("rows", g.attr("rows") || 50).val(j);
            h.findOne("[type=button]").click(function () {
                f.show();
                h.remove();
            }).css({position: "absolute", bottom: "10px", left: "5px"});
            var d = j.split("\n");
            if (d.length > 0 && d[0].match(/^By\s*[\w@\.\-]+\s*on\s*[\d\-\w\:]*?:/)) {
                d.shift();
            }
            f.val(d.join("\n").replace(/^[\s\r\n\t]*|[\s\r\n\t]*$/g, ""));
        } else {
            f.show();
        }
        f.change(function () {
            g.val("By " + i + " on " + e + ":\n" + this.value).change();
        });
        c.ready();
    }

    return a;
});
define("ui/ValueGroup", ["jqueryExtended", "Constants", "util/Console"], function (l, d, k) {
    var n = k.getLog("ui/ValueGroup");
    var e = "input[type=text]", p = ":checkbox", f = ":checked", g = ":last-child", r = ":first-child", o = "data-value-group", c = "data-value-initial", i = "data-value-separator", q = ".csr-input-checkbox-2", b = ".csr-label-2.checkbox", j = "show-next-element", a = "." + j, s = ".csr-list-container-2.has-toggle .toggle input", h = ",";

    function m(t) {
        this.$node = t.getNode();
        this.parameterGroup = t.parameters.group;
        this.parameterContainer = t.parameters.container;
        this.parameterButton = t.parameters.button;
        this.parameterTemplate = t.parameters.template;
        this.parameterSeparator = t.parameters.separator;
        this.init();
        t.ready();
    }

    m.prototype.init = function () {
        this.addTemplate();
        this.setInitialValues();
        this.updateChangedValues();
    };
    m.prototype.setInitialValues = function () {
        var w = this.parameterGroup, t = this.parameterContainer, v = this.parameterButton, u = this.parameterTemplate, x = this.parameterSeparator;
        this.$node.each(function () {
            var z = l(this), y = z.val(), A = y.split(",");
            if (y !== "") {
                l.each(A, function (B, F) {
                    l("[" + o + '="' + w + '"]').each(function () {
                        if (l(this).val() === F) {
                            if (l(this).is(p)) {
                                l(this).parent(b).trigger("click");
                                if (typeof l(this).attr(c) !== "undefined") {
                                    l(this).attr(c, "true");
                                }
                            }
                        }
                    });
                    if ((typeof t !== "undefined") && (typeof u !== "undefined")) {
                        if (typeof v !== "undefined") {
                            l("#" + v).trigger("click");
                            var E = l("." + t + " " + g), C = E.find(e + r), G = E.find(e);
                            if (E.find(a).length) {
                                if (x !== "undefined") {
                                    var D = F.split(x);
                                    if (F.indexOf(x) > -1) {
                                        E.find(a).trigger("click");
                                        G.each(function (H) {
                                            l(this).val(D[H]);
                                        });
                                    } else {
                                        C.val(F);
                                    }
                                }
                            } else {
                                C.val(F);
                            }
                        } else {
                            l("." + t).each(function () {
                                l(this).append(l("#" + u).contents().clone());
                                var H = l(this).find("li" + g), J = H.find(b), I = H.find(q);
                                I.val(F);
                                J.append(F);
                                J.trigger("click");
                            });
                        }
                    }
                });
            } else {
                if ((typeof t !== "undefined") && (typeof u !== "undefined") && (typeof v !== "undefined")) {
                    l("." + t).each(function () {
                        l(this).append(l("#" + u).contents().clone());
                    });
                }
            }
        });
    };
    m.prototype.addTemplate = function () {
        var t = this.parameterContainer, v = this.parameterButton, u = this.parameterTemplate;
        this.$node.each(function () {
            l("#" + v).on("click", function () {
                if ((t !== "undefined") && (u !== "undefined")) {
                    l("." + t).append(l("#" + u).contents().clone());
                }
            });
        });
    };
    m.prototype.updateChangedValues = function () {
        var u = this.parameterGroup, v = this.parameterSeparator, t = this.parameterTemplate;
        this.$node.each(function () {
            var w = l(this), x = l("[" + o + '="' + u + '"]');
            l(document).on("change keyup", x, function () {
                setTimeout(function () {
                    var D = [], z, A, C = l("[" + o + '="' + u + '"]').not(l("#" + t).find(l("[" + o + '="' + u + '"]'))), B = new RegExp(h + "|\\" + v, "g"), y = new RegExp(h + "\\" + v, "g");
                    C.each(function () {
                        var H = l(this), F = H.attr(i), G = H.val(), E = G.replace(B, "");
                        if (H.is(p)) {
                            if (H.is(f)) {
                                if (H.not(s)) {
                                    D.push(G);
                                }
                            }
                        } else {
                            if (G !== "") {
                                H.val(E);
                                if (F === "true") {
                                    D.push(v + G);
                                } else {
                                    D.push(G);
                                }
                            }
                        }
                    });
                    A = w.val();
                    z = D.join(h);
                    w.val(z.replace(y, v));
                    if (A !== w.val()) {
                        w.trigger("valueGroupChange");
                    }
                }, 50);
            });
        });
    };
    return m;
});
define("ui/SavePreference", ["jqueryExtended"], function (b) {
    function a(c) {
        var d = c.getNode();
        c.parameters.autoSubmit = (c.parameters.autoSubmit || "").match(/true|yes/i);
        d.on("submit", function (e) {
            e.preventDefault();
            var g = d.attr("action");
            var f = d.serialize();
            d.fadeTo("slow", 0.5);
            require(["util/Ajax", "ui/Notification"], function (h, i) {
                h.post(g, f).then(function (j) {
                    if (j.indexOf("login-form") > -1 && j.indexOf("j_username") > -1) {
                        document.location.href = g;
                        return;
                    }
                    if (!c.parameters.autoSubmit) {
                        i.info("Your preference has been saved");
                    }
                    d.stop(true, true).fadeTo("fast", 1);
                    d.trigger("capreferencesaved", f);
                }, function (j) {
                    if (!c.parameters.autoSubmit) {
                        i.warn("Your preference could not be saved");
                    }
                    d.stop(true, true).fadeTo("fast", 1);
                });
            });
        });
        if (c.parameters.autoSubmit) {
            d.submit();
        }
        c.ready();
    }

    return a;
});
define("service/Bookmark", ["jquery", "util/Ajax"], function (e, c) {
    var b;

    function a(f) {
        if (f || typeof b === "undefined") {
            b = new e.Deferred();
            c.getJSON(adyen.config.bookmarksUrl).then(function (g) {
                b.resolve(g);
            }, function (j, i, h) {
                b.reject(j);
            });
        }
        return b.promise();
    }

    function d(g) {
        var f = new e.Deferred();
        c.getJSON(adyen.config.bookmarksUrlWithVolumes).then(function (h) {
            f.resolve(h);
        }, function (j, i, h) {
            f.reject(j);
        });
        return f.promise();
    }

    return {getBookmarks: a, getVolumes: d};
});
define("ui/Form/RadioButton", ["jquery"], function (e) {
    var c = ".csr-radio-button", b = "change.ui-form-radiobutton";

    function d() {
        var f = e(this);
        if (f.is(":checked")) {
            f.closest(c).addClass("active");
        } else {
            f.closest(c).removeClass("active");
        }
    }

    function a() {
        e(document.body).off(b).on(b, c + " input", function (g) {
            var h = e(g.target).closest("input"), f = h.attr("name");
            if (f && f.match(/^\w+$/)) {
                h.closest("form,body").find(c + " input[name=" + f + "]").each(d);
            }
        });
        e(c + " input").each(d);
    }

    return {init: a};
});
define("ui/Form/Data/InputAsSelect", ["jqueryExtended"], function (a) {
    return function (b) {
        var d = b.getNode();
        var e = b.parameters.service;
        if (e) {
            var c = d.val();
            d.attr("disabled", "disabled").addClass("csr-disabled");
            require([e], function (f) {
                f.listAll().then(function (k) {
                    var i = a('<select class="csr-selectbox-2"></select>').attr("name", d.attr("name")).insertBefore(d);
                    var h = k.slice(0), g = false;
                    while (h.length > 0) {
                        var j = h.shift();
                        var l = a("<option></option>").text(j.label || j.text || j.value).val(j.value);
                        if (d.val() === j.value) {
                            l.attr("selected", "selected");
                            g = true;
                        }
                        l.appendTo(i);
                    }
                    if (!g) {
                        a('<option selected="selected"></option>').text(d.val()).val(d.val()).prependTo(i);
                    }
                    d.remove();
                });
            }, function (f) {
                d.addClass("csr-error");
            });
        }
        b.ready();
    };
});
define("util/Zip", ["compat/TypedArray", "jqueryExtended", "jszip", "jszip-utils"], function (d, a, f, j) {
    var c = 0;

    function i(k, l) {
        this.id = c++;
        this.zipFile = k;
        this.promiseCache = {};
        this.resetChanges(l);
    }

    i.prototype.resetChanges = function (o) {
        var n = this.zipFile.files, k = this.zipFile.files.length;
        this.changed = {};
        for (var l in n) {
            if (n.hasOwnProperty(l)) {
                var m = g(n[l].asBinary());
                this.changed[l] = {first: m, last: m};
            }
        }
    };
    i.prototype.getChanges = function () {
        var l = 0;
        for (var k in this.changed) {
            if (this.changed.hasOwnProperty(k) && this.changed[k].first !== this.changed[k].last) {
                l++;
            }
        }
        return l;
    };
    i.prototype.getEntries = function () {
        var m = new a.Deferred();
        if (!this.zipFile || !this.zipFile.files) {
            m.reject("ZipFile has no files");
        } else {
            var l = [];
            for (var k in this.zipFile.files) {
                if (this.zipFile.files.hasOwnProperty(k)) {
                    l.push(k);
                }
            }
            m.resolve(l);
        }
        return m.promise();
    };
    i.prototype.addFile = function (k, l) {
        this.zipFile.file(k, l || "");
        return this.getFile(k);
    };
    i.prototype.assureFile = function (k, m) {
        var l = this;
        l.getFile(k).fail(function () {
            l.addFile(k, m);
        });
    };
    i.prototype.getFile = function (m) {
        var l = this, k = this.zipFile;
        var n = this.promiseCache[m] || (function () {
                var p = new a.Deferred();
                if (!k || !k.file) {
                    p.reject("ZipFile is not ready");
                } else {
                    var o = k.file(m);
                    if (!o) {
                        p.reject("File does not exist: " + m);
                    } else {
                        if (o.dir) {
                            p.reject("File is a directory");
                        } else {
                            p.resolve(new e(l, o));
                        }
                    }
                }
                return p.promise();
            }());
        return n;
    };
    i.prototype.invalidate = function (l) {
        var m = this.zipFile.file(l);
        if (m) {
            if (!this.changed.hasOwnProperty(l)) {
                var k = g(m.asText());
                this.changed[l] = {first: "", last: k};
            } else {
                this.changed[l].last = g(m.asText());
            }
        }
        delete this.promiseCache[l];
    };
    i.prototype.getAllFiles = function () {
        var m = new a.Deferred(), k = {};
        if (!this.zipFile || !this.zipFile.files) {
            m.reject("ZipFile has no files");
        } else {
            for (var l in this.zipFile.files) {
                if (this.zipFile.files.hasOwnProperty(l)) {
                    k[l] = new e(this, this.zipFile.file(l));
                }
            }
            m.resolve(k);
        }
        return m.promise();
    };
    i.prototype.getBlob = function () {
        this.getEntries().then(function (k) {
        });
        return this.zipFile.generate({type: "blob", compression: "DEFLATE"});
    };
    function e(k, l) {
        this.zipWrap = k;
        this.zipFile = k.zipFile;
        this.file = l;
        this.cache = {};
    }

    e.prototype.getText = function () {
        return this.file.asText();
    };
    e.prototype.getBinary = function () {
        return this.file.asBinary();
    };
    e.prototype.getBase64 = function (k) {
        var n = "base64" + k ? "-p" : "";
        if (!this.cache.hasOwnProperty(n)) {
            this.compileCount = this.compileCount || 0;
            this.compileCount++;
            var m = "", l = this.file.name || "";
            if (k) {
                if (l.match(/\.css$/i)) {
                    m = "data:text/css;base64,";
                } else {
                    if (l.match(/\.gif$/i)) {
                        m = "data:image/gif;base64,";
                    } else {
                        if (l.match(/\.jpg$/i)) {
                            m = "data:image/jpeg;base64,";
                        } else {
                            if (l.match(/\.png$/i)) {
                                m = "data:image/png;base64,";
                            }
                        }
                    }
                }
            }
            this.cache[n] = m + h(this.getBinary());
        }
        return this.cache[n];
    };
    e.prototype.getName = function () {
        return this.file.name;
    };
    e.prototype.getSize = function () {
        return this.file.uncompressedSize;
    };
    e.prototype.setText = function (l) {
        this.cache = {};
        var k = this.file.name;
        this.zipFile.file(k, l);
        this.file = this.zipFile.file(k);
        this.zipWrap.invalidate(this.file.name);
    };
    function b(k) {
        if (!k) {
            throw new Error("[Util/Zip] Url is required");
        }
        var l = new a.Deferred();
        j.getBinaryContent(k, function (n, o) {
            if (n) {
                l.reject(n);
            }
            try {
                var m = new f(o, l);
                l.resolve(new i(m));
            } catch (p) {
                l.reject(p.message);
            }
        });
        return l.promise();
    }

    function h(t) {
        var o = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
        var n, m, l, x, w, v, u, y, s = 0, z = 0, q = "", p = [];
        if (!t) {
            return t;
        }
        do {
            n = t.charCodeAt(s++);
            m = t.charCodeAt(s++);
            l = t.charCodeAt(s++);
            y = n << 16 | m << 8 | l;
            x = y >> 18 & 63;
            w = y >> 12 & 63;
            v = y >> 6 & 63;
            u = y & 63;
            p[z++] = o.charAt(x) + o.charAt(w) + o.charAt(v) + o.charAt(u);
        } while (s < t.length);
        q = p.join("");
        var k = t.length % 3;
        return (k ? q.slice(0, k - 3) : q) + "===".slice(k || 3);
    }

    function g(n) {
        if (Array.prototype.reduce) {
            return n.split("").reduce(function (p, o) {
                p = ((p << 5) - p) + o.charCodeAt(0);
                return p & p;
            }, 0);
        }
        var m = 0;
        if (n.length === 0) {
            return m;
        }
        for (var k = 0; k < n.length; k++) {
            var l = n.charCodeAt(k);
            m = ((m << 5) - m) + l;
            m = m & m;
        }
        return m;
    }

    return {open: b};
});
define("util/Legacy", ["jqueryExtended", "util/QueryString"], function (a, g) {
    var e = "data-legacy", i = "[" + e + "]", b = "ca-legacy-component-activated";

    function c() {
        var n = a(this);
        var m = n.attr(e).split("?"), j = m.shift(), l = m.join("?"), k = g.parse(l || "");
        switch (j) {
            case"calendar":
                return f(n, k);
        }
    }

    function f(j, l) {
        var k = a('<a href="#"><i class="icon-calendar"></i></a>').insertAfter(j).before(" ");
        if (l.max_date) {
            l.maxDate = new Date(l.max_date);
        } else {
            l.maxDate = null;
        }
        if (l.min_date) {
            l.minDate = new Date(l.min_date);
        } else {
            l.minDate = null;
        }
        k.click(function () {
            var m = {};
            m.valid_date_check = function (n) {
                var o = true;
                if (l.maxDate) {
                    o = o && n < l.maxDate;
                }
                if (l.minDate) {
                    o = o && n > l.minDate;
                }
                return o;
            };
            if (l.fixPosition) {
                m.after_show = d;
            }
            if (l.time) {
                m.time = (l.time === "true");
            }
            if (l.year_range) {
                m.year_range = parseInt(l.year_range, 10);
            }
            return new CalendarDateSelect(j[0], m);
        });
    }

    function d() {
        var k = this;
        var j = k.calendar_date_select.calendar_div;
        var m = a(k).offset(), l = a(j).offset();
        var n = l.left - m.left;
        if (n > 0) {
            a(j).css("left", a(j).position().left - n + "px");
        }
    }

    function h() {
        a(function () {
            a(i).not("." + b).addClass(b).each(c);
        });
    }

    return {init: h};
});
window.adyen = window.adyen || {};
adyen.jsChartBase = adyen.jsChartBase || "chart/";
require.config({
    baseUrl: adyen.jsbase,
    paths: {
        d3v4: adyen.jsbase + "/lib/d3/d3.v4_2_6.min.js",
        chartlib: adyen.jsChartBase + "chartlib",
        charts: adyen.jsChartBase + "charts",
        chartutil: adyen.jsChartBase + "util",
        map: adyen.jsChartBase + "charts/mapchart",
        pmc: adyen.jsChartBase + "charts/paymentMethods/js/app",
        timeline: adyen.jsChartBase + "charts/timeline",
        conversion: adyen.jsChartBase + "charts/mainConversion/js/app",
        risk: adyen.jsChartBase + "charts/mainRisk/js/app",
        chargeback: adyen.jsChartBase + "charts/chargeBack/app",
        responsetimes: adyen.jsChartBase + "charts/responseTimes/app",
        mfp: adyen.jsChartBase + "charts/merchantFraud/js/app",
        ecp: adyen.jsChartBase + "charts/excessiveChargeback/js/app",
        baselinerates: adyen.jsChartBase + "charts/baselineRates/app",
        topmerchants: adyen.jsChartBase + "charts/topMerchants/app",
        sysmonpowertool: adyen.jsChartBase + "charts/sysmonPowerTool/app",
        transactionsReport: adyen.jsChartBase + "charts/transactionsReport/app",
        harp: adyen.jsChartBase + "charts/harp/js/",
        harpReportBuilder: adyen.jsChartBase + "charts/harpReportBuilder/js",
        shopperDna: adyen.jsChartBase + "charts/shopperDna",
        timelineTest: adyen.jsChartBase + "charts/timelineTest/js/app",
        moment: adyen.jsbase + "/lib/momentjs/moment.min.js",
        "moment-timezone": adyen.jsbase + "/lib/momentjs/moment-timezone-with-data.min.js",
        jasmine: "test/lib/jasmine-2.0.0/jasmine",
        jasmineHtml: "test/lib/jasmine-2.0.0/jasmine-html",
        "jasmine-boot": "test/lib/jasmine-2.0.0/boot",
        store: adyen.jsbase + "/lib/store.min.js",
        hogan: adyen.jsbase + "/lib/hogan-3.0.1.min.js",
        "jquery.validate": adyen.jsbase + "/lib/jquery.validate.min.js",
        "jquery.ui": adyen.jsbase + "/jquery-ui-1.10.3.min.js",
        "jquery.fileupload": adyen.jsbase + "/lib/jquery.fileupload.js",
        "jquery.placeholder": adyen.jsbase + "/lib/jquery.placeholder.js",
        jszip: adyen.jsbase + "/lib/jszip/jszip.min.js",
        "jszip-utils": adyen.jsbase + "/lib/jszip/jszip-utils.js",
        ace: "/lib/ace-edit"
    },
    shim: {
        store: {exports: "store"},
        hogan: {exports: "Hogan"},
        jszip: {exports: "JSZip"},
        "jszip-utils": {exports: "JSZipUtils"},
        "ace/ace": {exports: "ace"}
    }
});
if (adyen.noamd) {
    require = function () {
    };
    define = function () {
    };
}
define("jquery", [], function () {
    return window.jQuery;
});
if (adyen.csr) {
    define("csr", [], function () {
        return adyen.csr;
    });
}
(function (a) {
    if (window._) {
        define("underscore", [], function () {
            return window._;
        });
        define("lodash", [], function () {
            return window._;
        });
    }
    if (window.JSON) {
        define("json", [], function () {
            return JSON;
        });
    } else {
        define("json", [adyen.jsbase + "/lib/json2.js"], function () {
            return window.JSON;
        });
    }
    if (window.Backbone) {
        define("backbone", [], function () {
            return window.Backbone;
        });
        define("backbonenested", [], function () {
            return window.NestedModel;
        });
        define("backbonesuper", [], function () {
            return;
        });
    }
    if (window.d3) {
        define("d3", [], function () {
            return window.d3;
        });
        define("d3tip", [], function () {
            return;
        });
    }
}(window.console));
(function (f) {
    var h = "ady-tutorial", a = "G", b = "T", c = new Date(), k, e = {
        backofficeUI: {
            url: adyen.jsbase + "/tutorials/backoffice-ui.html?9326",
            mode: a,
            progress: false
        },
        reportsUI: {
            url: adyen.jsbase + "/tutorials/reports-ui.html?9326",
            mode: a,
            progress: false,
            startPage: adyen.base + "/ca/reports/dashboard.shtml"
        }
    }, j = new Date().getTime();
    adyen.tutorial = adyen.tutorial || {};
    adyen.tutorial.findBrokenRefs = true;
    for (var g in e) {
        if (document.location.search === g || document.location.search === "?" + g) {
            adyen.tutorial.active = g;
            adyen.tutorial.startPage = e[g].startPage;
        }
    }
    require(["jquery", "ui/slideshow", "tutorials/Guide", "ui/Conditionals", "ui/ViewPort", "util/Css", "util/UserPreferences", "jqueryExtended"], function (F, x, E, t, l, L, v) {
        if (F(document.body).is(".reset-password-page") || window.name === "myNewWin") {
            return;
        }
        var w = v.getPreference(h, "").match(/(\w+)(\?([\w=\-&]+))?/i), o = {}, p = null, C = null, D = null, d = {}, m = {};

        function A(R) {
            if (R) {
                F(".tutorial-clock").stop().fadeIn("fast");
            } else {
                F(".tutorial-clock").stop().fadeOut("slow");
            }
        }

        function B(S) {
            var R = [];
            F(S).find("a[data-ref][data-start][data-end]").each(function () {
                var T = F(this);
                R.push({
                    start: parseInt(T.attr("data-start"), 10),
                    end: parseInt(T.attr("data-end"), 10),
                    ref: T.attr("data-ref"),
                    pauseAfter: T.attr("data-pause-after") || false,
                    continueOn: T.attr("data-continue-on") || false
                });
            });
            return R;
        }

        function i(V) {
            var U = V.pauseStateItem = V.activeQueueItem, T, Y;
            V.pause();
            V.__message.html("<p>To continue:<br /><a></a></p>").find("a").attr("data-ref", U.ref).text(U.pauseAfter);
            var S = /^(visible|invisible|visible-in-viewport):(.*?)$/, X = U.continueOn, W, R;
            if (X === "next-reference") {
                for (T = 0, Y = V.queueItems.length - 1;
                     T < Y; T++) {
                    if (U === V.queueItems[T]) {
                        W = ("visible:" + V.queueItems[T + 1].ref).match(S);
                        break;
                    }
                }
                if (!W) {
                    clearInterval(R);
                }
            } else {
                if (X === "visible-in-viewport") {
                    W = (X + ":" + U.ref).match(S);
                } else {
                    W = X.match(S);
                }
            }
            R = setInterval(function () {
                if (W[1] === "visible") {
                    if (d.$body.find(W[2]).length > 0) {
                        clearInterval(R);
                        delete V.pauseStateItem;
                        V.__message.html("");
                        V.play();
                    }
                } else {
                    if (W[1] === "visible-in-viewport") {
                        var Z = false;
                        d.$body.find(W[2]).each(function () {
                            if (l.isElementInViewport(this, {bottom: 20})) {
                                Z = true;
                            }
                        });
                        if (Z) {
                            s(W[2]);
                            clearInterval(R);
                            delete V.pauseStateItem;
                            V.__message.html("");
                            V.play();
                        }
                    } else {
                        if (W[1] === "invisible") {
                            if (d.$body.find(W[2]).length === 0) {
                                clearInterval(R);
                                delete V.pauseStateItem;
                                V.__message.html("");
                                V.play();
                            }
                        } else {
                            V.__message.html("Illegal contstraint");
                            clearInterval(R);
                        }
                    }
                }
            }, 200);
        }

        function H() {
            var R = r.find("audio");
            setInterval(function () {
                R.each(function () {
                    var U = false, T, V, S = 1000 * (this.currentTime || 0);
                    if (typeof this.__skip === "undefined") {
                        this.__skip = parseInt(F(this).attr("data-skip") || "0", 10) || 0;
                    }
                    if (typeof this.__message === "undefined") {
                        this.__message = F('<div class="st-audio-message"></div>').insertAfter(this);
                    }
                    if (this.__skip > 0 && this.__skip < this.duration * 1000 && S < this.__skip) {
                        S = this.__skip;
                        this.currentTime = S / 1000;
                    }
                    if (!this.paused) {
                        this.queueItems = this.queueItems || B(this);
                        V = this.queueItems.length;
                        for (T = 0; T < V; T++) {
                            if (this.queueItems[T].start <= S && this.queueItems[T].end >= S) {
                                U = this.queueItems[T];
                                break;
                            }
                        }
                    }
                    if (typeof this.pauseStateItem !== "undefined") {
                        return;
                    }
                    if (this.activeQueueItem && this.activeQueueItem !== U) {
                        if (this.activeQueueItem.pauseAfter) {
                            i(this);
                        }
                    }
                    if (U) {
                        if (this.activeQueueItem !== U) {
                            s(U.ref);
                        }
                        this.activeQueueItem = U;
                    } else {
                        if (this.activeQueueItem) {
                            if (!this.pauseStateItem) {
                                n();
                            }
                            delete this.activeQueueItem;
                        }
                    }
                });
            }, 100);
        }

        function n() {
            if (d.$hoverNode) {
                d.$hoverNode.hide().css({top: "0", left: "50%"});
                if (s.ref === R || true) {
                    delete s.ref;
                }
            }
            var R = s.ref;
            if (d.$body) {
                d.$body.find(".tutorial-arrow-down,.tutorial-arrow-up").fadeOut("fast", function () {
                    delete s.ref;
                });
            }
            r.stop().fadeTo(500, 1);
        }

        function s(S) {
            if (s.ref === S) {
                return;
            }
            s.ref = S;
            var R = d.jquery(S), U = {}, T = R.offset();
            if (R.length === 0) {
                n();
            } else {
                U.top = (T.top - 10) + "px";
                U.left = (T.left - 10) + "px";
                U.height = Math.max(40, 20 + R.height()) + "px";
                U.width = Math.max(60, 20 + R.width()) + "px";
                d.$hoverNode.css({
                    top: U.top,
                    left: U.left,
                    height: 0,
                    width: U.width
                }).stop(true, false).show().animate(U, "slow");
                if (!l.isElementInViewport(R[0])) {
                    P(R[0]);
                } else {
                    d.$body.find(".tutorial-arrow-down,.tutorial-arrow-up").hide();
                    if (l.isElementInViewport(R[0], {left: 50, top: 10, bottom: 0, right: 0})) {
                        r.stop().fadeTo(3000, 0.1);
                    }
                }
            }
        }

        function P(V) {
            var S, U = V.getBoundingClientRect(), R = window.innerHeight || document.documentElement.clientHeight, T = window.innerWidth || document.documentElement.clientWidth, W = frames.controlled.scrollY || d.$body.scrollTop(), X = function () {
                var Y = frames.controlled.scrollY || d.$body.scrollTop();
                if (W === Y) {
                    return setTimeout(X, 300);
                }
                d.$body.find(".tutorial-arrow-down,.tutorial-arrow-up").fadeOut("fast");
            };
            if (U.top < 0) {
                S = d.$body.find(".tutorial-arrow-up");
                if (S.length === 0) {
                    S = d.jquery('<div class="tutorial-arrow-up"><div class="animation-bounce"><i class="icon-arrow-up"></i></div></div>').appendTo(d.$body.find("body"));
                }
                S.show();
                X();
            } else {
                if (U.bottom > R) {
                    S = d.$body.find(".tutorial-arrow-down");
                    if (S.length === 0) {
                        S = d.jquery('<div class="tutorial-arrow-down"><div class="animation-bounce"><i class="icon-arrow-down"></i></div></div>').appendTo(d.$body.find("body"));
                    }
                    S.show();
                    X();
                } else {
                    d.$body.find(".tutorial-arrow-down,.tutorial-arrow-up").hide();
                }
            }
        }

        function q(T) {
            var R = {};
            T.find("[data-fragment-id]").each(function () {
                var U = F(this), V = U.attr("data-fragment-id");
                R[V] = U.remove();
            });
            T.find("[data-fragment-include]").each(function () {
                var U = F(this), W = U.attr("data-fragment-include").split(/\s*,\s*/ig), V;
                while (W.length > 0) {
                    V = W.shift();
                    if (typeof R[V] !== "undefined") {
                        R[V].clone().appendTo(U);
                    }
                }
            });
            for (var S in R) {
                if (R.hasOwnProperty(S)) {
                    delete R[S];
                }
            }
        }

        function N(T) {
            var V = 0, U = 0, W = true, S = T.width(), R;
            T.find("ol:first").children("li").each(function () {
                V++;
                if (W) {
                    U++;
                    if (F(this).is(":visible")) {
                        W = false;
                    }
                }
            });
            R = U + "/" + V;
            if (m.progressHash !== R) {
                clearTimeout(m.progress);
                m.progress = setTimeout(function () {
                    T.find(".tutorial-progress").stop(false, false).animate({borderLeftWidth: 10 + (S - 10) / V * U}, 1000);
                }, 500);
                m.progressHash = R;
                if (U === 1) {
                    T.find("a[rel=previous]").addClass("disabled");
                } else {
                    T.find("a[rel=previous]").removeClass("disabled");
                }
                if (U === V) {
                    T.find("a[rel=next]").addClass("disabled");
                } else {
                    T.find("a[rel=next]").removeClass("disabled");
                }
            }
        }

        document.setTutorial = function (R) {
            v.setPreference(h, R);
            var T = adyen.jsbase + "/tutorials/index.html?" + encodeURIComponent(R);
            try {
                if (top.document.location !== T) {
                    top.document.location = T;
                }
            } catch (S) {
                top.document.location = T;
            }
        };
        if (!F(document.documentElement).is(".st-control")) {
            F(document.body).on("click", "a[data-tutorial]", function (R) {
                var S = F(R.target).attr("data-tutorial");
                require(["util/Analytics"], function (T) {
                    T.event("S_GUIDE", {g: S}).then(function () {
                        document.setTutorial(S, 21);
                    });
                });
            });
        } else {
            if (!w && document.location.search) {
                w = ["", document.location.search.substring(1)];
            }
        }
        if (!w || !w[1] || typeof e[w[1]] === "undefined") {
            if (f && f.warn) {
                f.warn("No tutorial active(" + w + ")");
            }
            if (F(document.documentElement).is(".st-control")) {
                F(document).ready(function () {
                    top.location.href = document.getElementById("controlled").src;
                });
            }
            return;
        }
        adyen.tutorial.active = w[0];
        if (f && f.log) {
            f.log("Active Tutorial(" + w[0] + ")");
        }
        try {
            var z = [], u = new F.Deferred(), r, y;
            z.push(".tutorial{ position:absolute; right: 20px; bottom:5px;  background: #F1F6D8; border: solid 1px #bbb; z-index: " + (csr.layer.tooltip + 1) + ";}");
            z.push(".tutorial.tutorial-mode-tutorial {width: 420px; min-height:80px;}");
            z.push(".tutorial.tutorial-mode-guide .tutorial-footer {padding: 10px}");
            z.push(".tutorial-title h2 {margin: 0; height: 24px; line-height: 24px; padding:0px 4px;background:#4d4d4f; color: #ffffff; font-size: 14px;  font-weight: 600;}");
            z.push(".tutorial-title i {color: #ffffff}");
            z.push(".tutorial-content {background: #F1F6D8; padding: 4px; min-height: 100px}");
            z.push(".tutorial-content ol.slideshow {margin: 0; list-style: none; padding: 4px; }");
            z.push(".tutorial-content ol.slideshow>li {margin: 0; list-style: none; padding: 0px; }");
            z.push(".tutorial-content a {cursor:pointer}");
            z.push(".tutorial-footer {background: #F1F6D8; padding: 4px; }");
            z.push(".tutorial-mode-tutorial .tutorial-footer a {color: #4d4d4f; background: #e0e0e0; margin: 4px; padding: 4px 8px; display: inline-block; vertical-align: middle}");
            z.push(".tutorial-hover {pointer-events:none;background: rgba(241, 191, 67, 0.2); border: solid 4px #0b5e78; position: absolute; width: 100px; height: 100px; z-index:" + csr.layer.maximal + "}");
            z.push(".tutorial-hover.informational {pointer-events:none;}");
            z.push(".tutorial-hover.no-highlight {border:none;background:none}");
            z.push(".tutorial-hover a[rel=tutorial-next] {float:right}");
            z.push(".tutorial-hover a[rel=tutorial-next], .tutorial-hover a[rel=tutorial-previous] {display:inline-block;width:70px}");
            z.push(".tutorial-hover a[data-ref], .tutorial-hover a[data-ref]:hover {color: inherit; font-weight: 300;text-decoration: none}");
            z.push(".tutorial-hover-content {pointer-events:auto;background: white; padding: 10px; border: solid 2px #0b5e78; width: 220px; z-index: " + (csr.layer.maximal + 1) + "}");
            z.push(".tutorial-content a[data-ref] { cursor: pointer;} ");
            z.push(".tutorial audio {width: 210px}");
            z.push(".tutorial .adyen-icon-close span {color: #ffffff;}");
            z.push(".tutorial-arrow-down {position:fixed; bottom:0; left:0; right:0; text-align:center; font-size:80px; color:#F1Bf43; height: 80px;}");
            z.push(".tutorial-arrow-up   {position:fixed; top:0; left:0; right:0; text-align:center; font-size:80px; color:#F1Bf43;}");
            z.push(".tutorial-progress   {border-left: solid 1px #3C8A2E; height: 4px;}");
            z.push(".tutorial .ref-not-found {color: #94120F; cursor: default; text-decoration:line-through}");
            L.addStyle(z);
        } catch (O) {
            if (f && f.warn) {
                f.warn("CSS  Loading error: " + O.message);
            }
        }
        if (!F(document.documentElement).is(".st-control")) {
            var K = 10, M = function () {
                try {
                    if (top && top.document && top.document.tutorial && top.document.tutorial.setDocumentRef) {
                        document.TUTORIAL_REF_WINDOW_ID = j;
                        return top.document.tutorial.setDocumentRef(F, document);
                    } else {
                        if (top && top.document && top.document.setTutorial) {
                            return top.document.setTutorial(w[1]);
                        } else {
                            if (f && f.warn) {
                                f.warn("No recipient available");
                            }
                        }
                    }
                } catch (R) {
                    if (f && f.warn) {
                        f.warn("<< Sender error: ", R.message);
                    }
                }
                if (K-- > 0) {
                    setTimeout(M, 1000);
                }
            };
            M();
            return;
        }
        document.tutorial = {
            setDocumentRef: function (R, S) {
                d.document = S;
                d.jquery = R;
                d.$body = R(S);
                if (R.find(".tutorial-hover").length === 0) {
                    d.$hoverNode = R('<div class="tutorial-hover"></div>').hide().appendTo(d.$body.find("body"));
                } else {
                    d.$hoverNode = R.find(".tutorial-hover");
                }
                r.trigger("contentShow");
            }, message: function (R) {
            }
        };
        o = w[3] || "";
        try {
            if (o) {
                var G = o.split("&");
                o = {};
                while (G.length > 0) {
                    var J = G.shift().split("="), Q = J.shift(), I = J.join("=");
                    o[decodeURIComponent(Q)] = decodeURIComponent(I);
                }
            }
        } catch (O) {
            if (f && f.warn) {
                f.warn("Error processing tutorialConfig: " + O.message);
            }
        }
        w = w[1];
        p = e[w].url;
        C = e[w].mode;
        adyen.tutorial = adyen.tutorial || {};
        adyen.tutorial.load = function (R, S) {
            u.resolve(R, S);
        };
        if (p.match(/\.js$/i)) {
            F.getScript(p);
        } else {
            F.get(p).then(function (S) {
                var R = F("<div>" + S + "</div>");
                adyen.tutorial.load({
                    progress: R.find(".tutorial-progress").length > 0,
                    title: R.find("h1.tutorial-title").text()
                }, R.find(".tutorial-content").html());
            });
        }
        setTimeout(function () {
            u.reject("Loading failed");
        }, 3000);
        require(["text!tutorials/dialog.html"], function (R) {
            F(function () {
                r = F(R);
                F(document.body).addClass("tutorial-active");
                var W = r.find(".tutorial-content"), V = r.find(".tutorial-close"), U = r.find(".tutorial-resume"), Y = r.find(".tutorial-footer"), X = r.find(".tutorial-progress"), S, T = F('<div class="tutorial-hover"></div>').hide().appendTo(document.body);
                V.hide();
                if (o.pause) {
                    U.show();
                    W.hide();
                    Y.hide();
                    X.hide();
                } else {
                    U.hide();
                    W.show();
                    Y.show();
                    X.show();
                }
                r.on("click", "a[rel=close]", function () {
                    V.show();
                    W.hide();
                    U.hide();
                    Y.hide();
                    X.hide();
                });
                r.on("click", "input[data-rel]", function (Z) {
                    switch (F(Z.target).attr("data-rel")) {
                        case"tutorial-end":
                            r.slideUp();
                            v.setPreference(h, "");
                            if (d && d.document) {
                                d.$body.find("a:not([target]),form:not([target])").attr("target", "_top");
                                d.$body.find(".tutorial-hover").fadeOut(3000);
                                d.document.setTutorial("");
                            }
                            break;
                        case"tutorial-close":
                            V.show();
                            W.hide();
                            U.hide();
                            Y.hide();
                            break;
                        case"tutorial-postpone":
                            V.hide();
                            W.hide();
                            Y.hide();
                            U.show();
                            v.setPreferenceParam(h, "pause", "true");
                            break;
                        case"tutorial-resume":
                            V.hide();
                            W.show();
                            Y.show();
                            U.hide();
                            v.setPreferenceParam(h, "pause", "");
                            break;
                        default:
                            if (f && f.warn) {
                                f.warn("Unsupported rel type " + F(Z.target).attr("data-rel"));
                            }
                    }
                });
                r.on("mouseover mouseout", "a[data-ref]", function (ab) {
                    var Z = d.$hoverNode;
                    if (!Z) {
                        return;
                    }
                    if (ab.type === "mouseout") {
                        n();
                    } else {
                        var aa = d.jquery(ab.target).attr("data-ref");
                        s(aa);
                    }
                });
                r.on("contentShow", function (ac) {
                    if (S && S.setDocument) {
                        S.setDocument(d);
                    }
                    A(true);
                    var aa = F(ac.currentTarget), ab = r.width();
                    if (typeof ac.pageNumber !== "undefined") {
                        v.setPreferenceParam(h, "page", "" + ac.pageNumber);
                    }
                    N(r);
                    if (!d.$body || !d.$body.find) {
                        r.addClass("waiting-for-childdocument").find(".tutorial-content,.tutorial-footer").css("visibility", "hidden");
                        return;
                    } else {
                        if (r.hasClass("waiting-for-childdocument")) {
                            r.removeClass("waiting-for-childdocument").find(".tutorial-content,.tutorial-footer").css("visibility", "inherit");
                        }
                    }
                    var Z = false;
                    t.update(r, d.$body, {
                        filter: function (ad, ae) {
                            if (ad.parent().is("*[data-slideshow]")) {
                                if (ae && ad.attr("data-applicable") !== "yes") {
                                    Z = true;
                                    ad.attr("data-applicable", "yes");
                                } else {
                                    if (!ae && ad.attr("data-applicable") !== "no") {
                                        Z = true;
                                        ad.attr("data-applicable", "no");
                                    }
                                }
                                return false;
                            }
                            return true;
                        }
                    });
                    if (S) {
                        if (Z && S && typeof S.updateUI === "function") {
                            S.updateUI();
                        } else {
                            if (adyen.tutorial.findBrokenRefs) {
                                S.getActivePage().find("a[data-ref]").each(function () {
                                    var ae = F(this), ad = ae.attr("data-ref");
                                    if (d.$body.find(ad).length === 0) {
                                        ae.addClass("ref-not-found");
                                    } else {
                                        if (ae.is(".ref-not-found")) {
                                            ae.removeClass("ref-not-found");
                                        }
                                    }
                                });
                            }
                        }
                    }
                    A(false);
                });
                setInterval(function () {
                    r.trigger("contentShow");
                }, 1000);
                u.done(function (Z, aa) {
                    document.title = (Z.title ? Z.title + " - " : "") + "Adyen tutorials";
                    if (Z.progress) {
                        X.show();
                    } else {
                        X.hide();
                    }
                    switch (C) {
                        case a:
                            r.addClass("tutorial-mode-guide");
                            r.find(".tutorial-title h2").text(Z.title ? Z.title : "Tutorial");
                            if (!o.pause) {
                                W.hide();
                            }
                            W.html(aa);
                            q(W);
                            S = new E(r, o);
                            S.setPage(o.page ? parseInt(o.page, 10) : 0, -1);
                            if (!o.pause) {
                            }
                            A(false);
                            break;
                        case b:
                            r.addClass("tutorial-mode-tutorial");
                            S = new x(r, o);
                            r.find(".tutorial-title h2").text(Z.title ? Z.title : "Tutorial");
                            if (!o.pause) {
                                W.hide();
                            }
                            W.html(aa);
                            S.setPage(o.page ? parseInt(o.page, 10) : 0);
                            S.updateUI();
                            if (!o.pause) {
                                W.show();
                            }
                            if (r.findOne("audio")) {
                                F(H);
                            }
                            W.find("a[data-ref]").css("cursor", "zoom-in").append(' <i class="icon-search"></i>');
                            A(false);
                            Y.find("a[rel=close]").hide();
                            break;
                    }
                });
                u.fail(function (Z) {
                    r.find(".tutorial-progress").hide();
                    r.find(".tutorial-content").html("Sorry, we were unable to continue your tutorial");
                    setTimeout(function () {
                        r.slideUp(6000);
                    }, 3000);
                });
                r.appendTo(document.body);
                A(true);
            });
        });
    }, function (d) {
        if (f && f.warn) {
            f.warn("Error: " + d);
        }
    });
}(window.console));
(function (o, t) {
    var d = 2;
    if (t.documentElement && t.documentElement.getAttribute("data-csr-level")) {
        try {
            d = parseInt(t.documentElement.getAttribute("data-csr-level"), 10);
        } catch (y) {
        }
    }
    if (!String.prototype.trim) {
        String.prototype.trim = function () {
            var z = this.replace(/^\s+/, "");
            for (var e = z.length - 1;
                 e >= 0; e--) {
                if (/\S/.test(z.charAt(e))) {
                    z = z.substring(0, e + 1);
                    break;
                }
            }
            return z;
        };
    }
    var w = o.adyen = o.adyen || {}, f = function (z, e) {
        return z && new RegExp(" " + e + " ").test(" " + (z.className || "") + " ");
    }, q = function (z, e) {
        if (!z) {
            return;
        }
        jQuery(z).addClass(e);
    }, r = function (z, e) {
        if (!z) {
            return;
        }
        jQuery(z).removeClass(e);
    };
    w.chartTypeFilter = function (e) {
        switch (e) {
            case"StackedColumn3D":
                return "StackedColumn2D";
            case"Column3D":
                return "Column2D";
            default:
                return e;
        }
    };
    w.monitorActiveAccount = function (z, B) {
        if (f(t.documentElement, "ie7")) {
            return;
        }
        var e = x("activeAccount"), A;
        s("activeAccount", z);
        w.onWindowFocus = function (C) {
            var D = x("activeAccount");
            z = C || z;
            if (z !== D) {
                require(["ui/Notification", "util/Strings"], function (F, G) {
                    var E = "", I, H;
                    if (D === "") {
                        H = "error";
                        E = "Your session has expired. Please refresh the page.";
                        I = {sticky: true, closeIcon: false};
                    } else {
                        if (z === "") {
                            H = "info";
                            E = "Your have signed on in another window.";
                            I = {sticky: true, closeIcon: false};
                        } else {
                            H = "info";
                            E = "The active account has been changed to " + D + ".";
                            E += '<p><a href="#" rel="switchToAccount">Back to ' + G.condense(z, 20, 20) + "</a></p>";
                            I = {sticky: true, closeIcon: true, html: E};
                        }
                    }
                    if (typeof A === "undefined" || A.__text !== E) {
                        A = A && A.hide();
                        A = F[H](E, I);
                        A.__text = E;
                        A.$node.off("click", "[rel=switchToAccount]").on("click", "[rel=switchToAccount]", function () {
                            require(["util/Ajax"], function (J) {
                                J.get(w.base + "/ca/overview/default.shtml?setActiveAccountKey=" + encodeURIComponent(z)).then(function () {
                                    F.info("The active account has been switched back to " + G.condense(z, 20, 20));
                                    A.hide();
                                    s("activeAccount", z);
                                }, function () {
                                    F.warn("Could not switch back the account to " + G.condense(z, 20, 20));
                                });
                            });
                        });
                    }
                });
            } else {
                if (typeof A !== "undefined") {
                    A.hide();
                    A = {}.undefinedProperty;
                }
            }
        };
        if (t.hasFocus) {
            (function () {
                var C = t.hasFocus();
                setInterval(function () {
                    if (!C && t.hasFocus() && w.onWindowFocus) {
                        w.onWindowFocus();
                    } else {
                        if (C && !t.hasFocus && w.onWindowBlur) {
                            w.onWindowBlur();
                        }
                    }
                    C = t.hasFocus();
                }, 200);
            }());
        }
        if (B) {
            w.onWindowFocus(e);
        }
    };
    var i = false;
    addOnLoad(function () {
        i = true;
    });
    function k(e) {
        if (!i) {
            addOnLoad(e);
        } else {
            e();
        }
    }

    function s(z, C, A) {
        var B = new Date();
        B.setTime(B.getTime() + (A * 24 * 60 * 60 * 1000));
        var e = "expires=" + B.toGMTString();
        t.cookie = z + "=" + C + "; " + e + ";path=" + (w && w.base || "/");
    }

    function x(A) {
        var z = A + "=";
        var e = t.cookie.split(";");
        for (var B = 0; B < e.length; B++) {
            var C = e[B].trim();
            if (C.indexOf(z) === 0) {
                return C.substring(z.length, C.length);
            }
        }
        return "";
    }

    k(function () {
        var A = t.getElementsByTagName("h1");
        for (var e = 0; e < A.length; e++) {
            if (A[e].title == "Page Generation Time") {
                q(A[e], "ca-page-generation-time");
            }
        }
        var z = t.getElementById("ca-accountnavigation");
        if (z) {
            q(z, "size-" + Math.min(4, z.getElementsByTagName("a").length));
        }
    });
    function p(e) {
        if (t.body) {
            e();
        } else {
            setTimeout(function () {
                p(e);
            }, 10);
        }
    }

    function b(z, e) {
        if (w.trackRewriteEvents && w.trackRewriteEvents(z, e) && z && o.console && o.console.debug) {
            o.console.debug("RewriteEvent: remark=" + z, e);
        }
    }

    function n() {
        var z = "";
        if (t.forms.length > 0) {
            z = "form-page";
        }
        var A = t.location.pathname.toLowerCase().indexOf("login") > -1;
        var e = t.location.pathname.toLowerCase().indexOf("forgotPassword") > -1;
        if (!f(t.body, "csr-page")) {
            if (t.location.pathname.toLowerCase().indexOf("overview") > -1) {
                z = "overview-page";
            } else {
                if (t.location.pathname.toLowerCase().indexOf("search") > -1) {
                    z = "search-page";
                } else {
                    if (t.location.pathname.match(/show\w*list/i)) {
                        z = "list-page";
                    } else {
                        if (A || e) {
                            z = "form-page login-page";
                        }
                    }
                }
            }
            if (d < 3) {
                q(t.body, z);
            }
        }
        if (f(t.body, "login-page") || f(t.body, "ady-login-page") || f(t.body, "reset-password-welcome-page") || f(t.body, "ady-reset-password-welcome-page")) {
            k(h);
        }
        if (f(t.documentElement, "touch") && !z.match(/login-page/i)) {
            k(l);
        }
    }

    function v() {
        if (d >= 3) {
            return;
        }
        var B = t.getElementsByTagName("table"), F = B.length, C;
        for (; F-- !== 0;) {
            C = B[F];
            if (C.tHead && C.tHead.rows && C.tHead.rows.length == 1 && C.getElementsByTagName("caption").length == 0) {
                var E = C.tHead.rows[0];
                if (E.cells.length == 1 && E.cells[0].colSpan > 1) {
                    b("rewriteTables: move thead into caption", C);
                    var D = t.createElement("caption");
                    while (E.cells[0].childNodes.length > 0) {
                        D.appendChild(E.cells[0].firstChild);
                    }
                    C.insertBefore(D, C.tHead);
                    C.tHead.removeChild(E);
                    var z = C.tBodies[0];
                    if (z && z.rows.length > 0) {
                        E = z.rows[0];
                        if (E.getElementsByTagName("th").length == E.cells.length) {
                            b("rewriteTables: transform th row into header", C);
                            C.tHead.appendChild(z.rows[0]);
                        }
                    }
                }
            }
            if ((C.getAttribute("data-checkboxes-to-toggles") || "").match(/^\w+,\w+$/i)) {
                b("rewriteTables: add toggles class", C);
                q(C, "toggles");
                var e = C.getAttribute("data-checkboxes-to-toggles").split(",");
                u(C, e[0], e[1]);
            }
            if (!f(C, "csr-table") && !f(C, "csr-table-2") && !f(C, "csr-layout-table")) {
                b("rewriteTable: fixing missing crt-table class", C);
                q(C, "csr-table");
                if (C.innerHTML.match(/input|select|textarea/i)) {
                    b("rewriteTable: fixing missing csr-data-input-table class", C);
                    q(C, "csr-data-table csr-data-input-table");
                } else {
                    if (f(C, "data")) {
                        if (C.rows && C.rows[0] && C.rows[0].cells && C.rows[0].cells.length > 5) {
                            b("rewriteTable: fixing missing csr-list-table", C);
                            q(C, "csr-list-table");
                        } else {
                            b("rewriteTable: fixing missing csr-data-table", C);
                            q(C, "csr-data-table");
                        }
                    }
                }
            }
            if (f(C, "csr-list-table")) {
                var A = (C.getElementsByTagName("caption") || [])[0] || {};
                if (A && A.innerHTML && A.innerHTML.match(/<(a|span|input)/i) && !A.innerHTML.match(/<h[1234]/i)) {
                    b("rewriteTables: add list-filter class", C);
                    q(A, "list-filter");
                }
            }
        }
    }

    function u(O, G, N) {
        if (f(t.documentElement, "ie7") || f(t.documentElement, "ie8")) {
            return;
        }
        b("rewriteCheckboxesToToggles", O);
        O.tHead.style.display = "none";
        var A = O.getElementsByTagName("input"), L = 0, P = A.length, H = [], e, D;
        if (A && P > 0) {
            for (; L < P; L++) {
                var F = A[L], I, K, z;
                e = a(F, "tr");
                D = a(F, "td");
                if (F.name === G || F.name === N) {
                    b("rewriteCheckboxesToToggle", O);
                    I = t.createElement("div");
                    K = t.createElement("span");
                    z = t.createElement("em");
                    K.appendChild(z);
                    I.appendChild(K);
                    q(I, "switch");
                    q(K, "switch-bezel");
                    q(z, "switch-bezel-handle");
                    F.parentNode.insertBefore(I, F);
                    z.appendChild(F);
                    H.push({elem: F, container: I});
                    D.colSpan = 2;
                    D.style.textAlign = "right";
                    I.toggle = function () {
                        var S = this, Q = S.getElementsByTagName("input")[0], T = "switch-on", R;
                        Q.checked = !Q.checked;
                        if (f(S, "inverted-switch")) {
                            T = "inverted-switch-on";
                        }
                        if (Q.checked) {
                            q(S, "on");
                            q(S, T);
                            R = t.createElement("span");
                            q(R, "switch-change-notification");
                            R.innerHTML = "Your change has not been saved yet";
                            a(Q, "div").appendChild(R);
                        } else {
                            r(S, "on");
                            r(S, T);
                            R = a(Q, "div").getElementsByClassName("switch-change-notification");
                            if (R[0] && R[0].parentNode) {
                                R[0].parentNode.removeChild(R[0]);
                            }
                        }
                    };
                    jQuery(I).click(function (Q) {
                        jQuery(Q.currentTarget).closest("div")[0].toggle();
                    });
                }
                if (F.name === G) {
                    F.style.border = "solid 1px green";
                    F.style.backgroundColor = "green";
                    if (F.checked) {
                        q(I, "switch-on");
                    }
                    e.removeChild(e.cells[e.cells.length - 1]);
                } else {
                    if (F.name === N) {
                        F.style.border = "solid 1px blue";
                        F.style.backgroundColor = "blue";
                        q(I, "inverted-switch");
                        if (F.checked) {
                            q(I, "inverted-switch-on");
                        }
                        e.removeChild(e.cells[e.cells.length - 2]);
                    }
                }
                e.cells[0].innerHTML = "";
            }
        }
        if (!!O.tHead && !!O.tHead.innerHTML && O.tHead.innerHTML.indexOf("<input") > -1) {
            var J = t.createElement("a"), M = t.createElement("a"), C = t.createElement("div");
            J.innerHTML = "activate all";
            M.innerHTML = "deactivate all";
            q(C, "toggle-all");
            C.appendChild(J);
            C.appendChild(M);
            jQuery(J).click(function (T) {
                var S, U, V, Q, R = H.length;
                for (; R-- > 0;) {
                    U = H[R].elem;
                    Q = H[R].container;
                    if (U.name === G && !U.checked) {
                        Q.toggle();
                    } else {
                        if (U.name === N && U.checked) {
                            Q.toggle();
                        }
                    }
                }
            });
            jQuery(M).click(function (T) {
                var S, U, V, Q, R = H.length;
                for (; R-- > 0;) {
                    U = H[R].elem;
                    Q = H[R].container;
                    if (U.name === N && !U.checked) {
                        Q.toggle();
                    } else {
                        if (U.name === G && U.checked) {
                            Q.toggle();
                        }
                    }
                }
            });
            O.getElementsByTagName("caption")[0].appendChild(C);
        }
        var B = O.getElementsByTagName("td");
        L = 0;
        P = B.length;
        if (B && P > 0) {
            for (; P-- > 0;) {
                B[P].style.fontWeight = "normal";
            }
        }
        var E = O.getElementsByTagName("img");
        L = 0;
        P = E.length;
        if (E && P > 0) {
            for (; P-- > 0;) {
                if (E[P].src.match(/white/)) {
                    e = a(E[P], "tr");
                    E[P].parentNode.innerHTML = "";
                    e.removeChild(e.cells[e.cells.length - 1]);
                    D = e.cells[e.cells.length - 1];
                    D.colSpan = 2;
                    D.innerHTML = '<span class="switch disabled-switch disabled-switch-on"><span class="switch-bezel"><em class="switch-bezel-handle"></em></span></span>';
                }
            }
        }
    }

    function j() {
        if (d >= 3) {
            return;
        }
        var A = t.forms, D = A.length, C, e, B, z;
        jQuery("form input").each(function () {
            var E = this;
            if (E.type === "submit") {
                if (f(E, "csr-button-2")) {
                    return;
                }
                if (!f(E, "csr-button")) {
                    b("rewriteForms: submit buttons", this);
                }
                q(E, "csr-button" + ((E.value || "Submit").match(/submit|save/i) ? " csr-submit-button" : ""));
            } else {
                if ((E.type === "text" || E.type === "password") && (E.parentNode.nodeName || E.parentNode.tagName || "").toLowerCase() === "td") {
                    if (E.parentNode.innerHTML.split("<").length === 2 && !f(E, "csr-input-2")) {
                        b("rewriteForms: no sibblings button", this);
                        q(E, "no-siblings");
                    }
                }
            }
        });
        jQuery("button").not(".csr-button").addClass("csr-button csr-reduce").each(function () {
            b("rewriteForms: button-element", this);
        });
    }

    var c = "open";

    function l() {
        if (f(t.body, "login-page") || f(t.documentElement, "login-page")) {
            return;
        }
        var E = t.createElement("div"), G = t.createElement("label"), z = t.createElement("div"), C = jQuery(z), F = t.createElement("input"), I = t.createElement("span"), D = t.createElement("span"), B = t.createElement("em");
        q(E, "menu-toggle");
        E.innerHTML = '<i class="icon-bars"></i>';
        t.body.appendChild(E);
        jQuery(E).click(function () {
            if (!F.checked && (c === "open" || c === "opening")) {
                g();
            } else {
                if (c !== "open" && c !== "opening") {
                    m();
                }
            }
        });
        G.id = "ca-keep-menu-open";
        F.type = "checkbox";
        D.innerHTML = " always visible";
        G.appendChild(z);
        G.appendChild(D);
        z.appendChild(I);
        I.appendChild(B);
        B.appendChild(F);
        jQuery(I).addClass("switch-bezel");
        jQuery(B).addClass("switch-bezel-handle");
        jQuery(z).addClass("switch");
        t.getElementById("ca-boxleft").appendChild(G);
        var A = x("keepMenuOpen") || "n", e = "on switch-on", H = "off switch-off";
        if (A === "y") {
            F.checked = true;
            t.getElementById("content").style.marginLeft = "162px";
            C.addClass(e).removeClass(H);
            jQuery(E).fadeTo(300, 0.5);
        } else {
            t.getElementById("content").style.marginLeft = "0px";
            C.addClass(H).removeClass(e);
            g();
            jQuery(E).fadeTo(300, 1);
        }
        jQuery(F).change(function () {
            if (F.checked) {
                t.getElementById("content").style.marginLeft = "162px";
                C.addClass(e).removeClass(H);
                jQuery(E).fadeTo(300, 0.5);
            } else {
                t.getElementById("content").style.marginLeft = "0px";
                C.addClass(H).removeClass(e);
                jQuery(E).fadeTo(300, 1);
            }
            s("keepMenuOpen", F.checked ? "y" : "no");
        });
    }

    function g() {
        c = "closing";
        var B = 0, C = 250, A = 162, e = new Date().getTime(), z = setInterval(function () {
            if (c !== "closing") {
                return clearInterval(z);
            }
            var D = new Date().getTime() - e, E = 100 / C * D, F = A / 100 * E;
            if (E >= 100) {
                F = A;
                clearInterval(z);
                c = "closed";
            }
            t.getElementById("ca-boxleft").style.left = "-" + Math.round(F) + "px";
        }, 5);
    }

    function m() {
        c = "opening";
        var B = 0, C = 250, A = 162, e = new Date().getTime(), z = setInterval(function () {
            if (c !== "opening") {
                return clearInterval(z);
            }
            var D = new Date().getTime() - e, E = 100 / C * D, F = A - (A / 100 * E);
            if (E >= 100) {
                F = 0;
                clearInterval(z);
                c = "open";
            }
            t.getElementById("ca-boxleft").style.left = "-" + Math.round(F) + "px";
        }, 5);
    }

    function a(z, e) {
        while ((z.nodeName || "").toLowerCase() !== e && (z.tagName || "").toLowerCase() !== e) {
            if (z === t.body || !z.parentNode) {
                return null;
            }
            z = z.parentNode;
        }
        return z;
    }

    function h() {
        var e = [], A = w.imgbase + "/adyen.png", B = ["touch", "js", "javascript", "flash"], z;
        e.push("sa=" + screen.availHeight + "," + screen.availWidth);
        e.push("sz=" + screen.height + "," + screen.width);
        while (B.length > 0) {
            z = B.shift();
            if (f(t.documentElement, z)) {
                e.push(z + "=y");
            } else {
                if (f(t.documentElement, "no" + z)) {
                    e.push(z + "=n");
                }
            }
        }
        if (o.adyen && w.platform) {
            e.push("os=" + encodeURIComponent(w.platform));
        }
        if (o.adyen && w.browser) {
            e.push("ua=" + encodeURIComponent(w.browser));
        }
        if (navigator && navigator.language) {
            e.push("ln=" + encodeURIComponent(navigator.language));
        }
        if (navigator && navigator.cookieEnabled) {
            e.push("ck=y");
        }
        if (navigator && typeof navigator.standalone !== "undefined") {
            e.push("standalone=" + navigator.standalone ? "y" : "n");
        }
        if (screen && screen.orientation) {
            e.push("so=" + encodeURIComponent(screen.orientation));
        }
        if (self !== parent) {
            e.push("frm=y");
        }
        jQuery.get(A + "?" + e.join("&"));
    }

    require(["util/Browser"], function (e) {
        e.init();
        p(n);
        k(v);
        k(j);
    });
    if (parent !== self) {
        q(t.documentElement, "framed");
    }
    jQuery(t).ready(function () {
        if (jQuery(t.body).is(".reset-password-page")) {
            jQuery(t).on("submit", "form", function (z) {
                z.preventDefault();
                var A = jQuery(z.target).closest("form"), e = A.serializeArray();
                jQuery.post(A.attr("action"), A.serialize(), function (D, C, F) {
                    var B = jQuery(D).find("#subcontent");
                    jQuery("#subcontent").html(B.html());
                    if (B.find("input[name=j_account]").length === 1 && B.find("input[name=j_username]").length === 1 && B.find("input[name=j_password]").length === 1) {
                        while (e.length > 0) {
                            var E = e.shift();
                            if (E.name === "password") {
                                B.find("input[name=j_password]").val(E.value).parents("form").hide().submit();
                                break;
                            }
                        }
                    }
                });
                z.preventDefault();
            });
        }
    });
}(window, document));
