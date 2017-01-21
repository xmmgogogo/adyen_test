define("chart/widgetFramework/core/ViewCreator", ["jqueryExtended", "chart/widgetFramework/core/constants/DataConstants", "chart/widgetFramework/core/constants/UIConstants", "underscore", "util/Functional", "chart/widgetFramework/core/drivers/observableCode", "chart/widgetFramework/core/uiComponentsFetcher", "chartutil/domUtils"], function (a, l, n, p, h, b, c, m) {
    var e = false;
    var o = "color:blue;font-size:1em";
    var d = false;
    var j = "color:green;font-size:1em";
    var k = false;
    var g = false;
    var f = "color:red;font-size:1em";
    var i = function (q) {
        var r = {};
        b(r, "viewCreator");
        r.init = function () {
            p.bindAll(this, "onNotifiedDataFormatted");
            this.$el = q.getNode();
            this.id = this.$el.attr("id");
            if (!this.id) {
                this.id = this.$el.attr("data-id");
            }
            var x = this.parameters = this.getParameters(q);
            this.chartOptions = this.parameters.options || {};
            var t = x.formatterName;
            var y = a("#" + t);
            y.widget().then(function (z) {
                r.Formatter = z.instance;
                if (window.console && console.log && g) {
                    console.log("### ViewCreator2:: registering observer on formatter:: ");
                }
                r.Formatter.registerObserver(r.onNotifiedDataFormatted, false, r.id);
            }, function () {
                if (window.console && console.warn) {
                    console.warn("VizComp:: Error loading dataFormatter", arguments);
                }
            });
            var w = x.timeline;
            var v = (w && w.indexOf("#") === -1) ? a("#" + w) : a(w);
            if (v.length) {
                if (window.console && console.log && g) {
                    console.log("### ViewCreator2::init:: getting timeline promise----");
                }
                v.widget().then(function (z) {
                    var A = z.instance;
                    A.renderPromise.done(function () {
                        r.timeline = A.timeline;
                    });
                }, function () {
                    if (window.console && console.warn) {
                        console.warn("VizComp:: Error loading timelineObject", arguments);
                    }
                });
            }
            var u = this.parameters.options.type;
            var s = (this.parameters.options.template || "defaultTemplate") + ".html";
            r.resolvedRequire = false;
            r.hasData = false;
            if (h.notFalsy(u)) {
                r.requireChartType(u, s);
            } else {
                if (window.console && console.log) {
                    console.log("%c\n################", f);
                    console.warn("%c### ViewCreator::init:: you have failed, failed I tell you! to specify a valid **type** for this ViewCreator", f);
                    console.log("%c\n################", f);
                }
            }
        };
        r.requireChartType = function (t, s) {
            this.chartType = t.substring(t.lastIndexOf("/") + 1);
            require(["chart/widgetFramework/" + t, "text!chart/widgetFramework/" + s], function (u, v) {
                r.ChartRef = u;
                r.TemplateRef = v;
                r.resolvedRequire = true;
                r.checkReady("require");
            }, function (u) {
                if (window.console && console.log) {
                    console.log("VizComp:: widget Require error: ", u);
                }
            });
        };
        r.checkReady = function (s) {
            if (this.resolvedRequire && this.hasData) {
                this.createChart();
            }
        };
        r.onNotifiedDataFormatted = function (t, s) {
            if (window.console && console.log && d) {
                console.log("%c\n################", j);
                console.log("%c### START STAGE :: VizComp::" + this.id + ":: onNotifiedDataFormatted pId=" + s + " pData.type= " + t.changeObject.type + " pData.stopRender= " + t.changeObject.stopRender, j);
                console.log("%c################", j);
            }
            switch (t.changeObject.type) {
                case l.DATA_FORMATTED:
                case l.RETRIEVED_DATA:
                case l.SORTED_DATA:
                case l.REFORMATTED_DATA:
                case l.NEW_DATA_AVAILABLE:
                    if (h.falsy(t.changeObject.silentFormat)) {
                        this.data = t.changeObject.data;
                        this.hasData = true;
                        this.checkReady("data");
                    }
                    break;
            }
        };
        r.createChart = function () {
            var s;
            if (!h.existy(this.chart)) {
                if (window.console && console.log && d) {
                    console.log("%c\n################", j);
                    console.log("%c### START STAGE :: VizComp::" + this.id + ":: createChart:: CREATE NEW CHART type:" + this.parameters.options.type, j);
                    console.log("%c################", j);
                }
                var t = h.existy(this.timeline) ? this.timeline : null;
                this.chart = new this.ChartRef(this.chartOptions, this.$el[0], t, this.TemplateRef);
                this.chart.chartType = this.chartType;
                this.chart.init(this.chartOptions, this.$el[0]);
                s = this.chart.feedData(this.data);
                this.$el.on(n.CHART_TO_VIEW_EVENT, p.bind(this.onChartToWidgetEvent, this));
                this.setProperty("changeObject", {type: n.CHART_INITIALISED, data: this.chart});
                this.chart.initRender();
                if (s !== l.HALT_RENDER_PROCESS) {
                    this.chart.render();
                }
                this.setProperty("changeObject", {type: n.CHART_FIRST_RENDER, data: this.chart});
                var u = c(this.chartOptions, this.$el[0], function (y) {
                    for (var x = 0;
                         x < y.length; x++) {
                        if (y[x] && y[x].type === "tooltip") {
                            var w = y[x].module;
                            var v = y[x].options;
                            r.chart.setupTooltip(w, v);
                        }
                    }
                });
                m.removeDataAtrributes(this.$el, ["options"]);
            } else {
                if (window.console && console.log && d) {
                    console.log("%c\n################", j);
                    console.log("%c### START STAGE :: VizComp::" + this.id + ":: createChart:: UPDATING EXISTING CHART type:" + this.parameters.options.type, j);
                    console.log("%c################", j);
                }
                s = this.chart.feedData(this.data);
                if (s !== l.HALT_RENDER_PROCESS) {
                    this.chart.render();
                    if (typeof this.chart.setTooltipsOnElements === "function") {
                        this.chart.setTooltipsOnElements();
                    }
                }
                this.setProperty("changeObject", {type: n.CHART_UPDATED, data: this.chart});
            }
        };
        r.getInstance = function () {
            return this.chart;
        };
        r.onChartToWidgetEvent = function (t, s) {
            if (window.console && console.log && k) {
                console.log("\n################ ");
                console.log("### ViewCreator::" + this.id + " onChartEvent:: e=", t);
                console.log("### ViewCreator::" + this.id + " onChartEvent:: pData=", s);
                console.log("################ ");
            }
            this.$el.trigger(s.type, s);
            this.setProperty("changeObject", s);
        };
        r.getParameters = function (s) {
            var v = s.getNode().data();
            var t;
            if (p.keys(v).length) {
                t = v;
            } else {
                s.parameters.options = a.parseJSON(s.parameters.options);
                t = s.parameters;
            }
            var u = {};
            if (p.keys(t).length) {
                u.formatterName = t.formatter;
                u.options = t.options;
                if (!h.existy(u.options.margin)) {
                    u.options.margin = {};
                }
                u.timeline = t.timeline;
            } else {
                throw"The parameters are not well defined" + t;
            }
            return u;
        };
        r.init();
        if (window.console && console.log && g) {
            console.log("\n### ViewCreator2::constructor:: calling pWidgetApi.ready()");
        }
        q.ready();
        return r;
    };
    return i;
});