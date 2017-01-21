define("chart/widgetFramework/composed/funnel/FunnelMediator", ["jqueryExtended", "lodash", "chart/widgetFramework/core/BasicMediator", "util/ObjectSuper", "chart/widgetFramework/core/constants/UIConstants", "chart/widgetFramework/core/constants/DataConstants", "util/Functional", "chartutil/cssutils"], function (a, j, i, g, h, f, d, k) {
    var c = false;
    var e = false;
    var b = function (p) {
        var u;
        u = i(p, true);
        var r = g(u);
        u.init = function () {
            r.init();
            this.$reportItems = this.$el.find(".report-item");
            this.$reportItems.on("mouseover", v);
            this.$reportItems.on("mouseout", o);
        };
        u.getAdditionalDOMElements = function () {
            r.getAdditionalDOMElements();
            this.timelineInstances = [];
            this.$allTimelines = this.$el.find("[data-widget*=Timeline]");
            this.totalDomElements += this.$allTimelines.length;
        };
        u.getWidgets = function () {
            r.getWidgets();
            this.getWidgetInstances(this.$allTimelines, this.timelineInstances, "Timelines");
        };
        u.onNotifiedFetcher = function (x, w) {
            r.onNotifiedFetcher(x, w);
        };
        u.onNotifiedFormatter = function (w, A) {
            r.onNotifiedFormatter(w, A);
            var z = w.changeObject.data.chartData;
            var B = j.filter(z, function (F) {
                return (F.registertype && F.registertype.toLowerCase() === "sessions");
            });
            var C = B.length;
            var D = -18;
            n();
            l();
            q();
            if (window.console && console.log) {
                console.log("### funnelMediator::onNotifiedFormatter:: SESSIONS.LENGTH=", C);
            }
            var x = (6 - C) * D;
            t(x);
            if (B.length < 6) {
                var E = -22 + ((5 - C) * D);
                s(E);
                var y = -18 + ((5 - C) * D);
                m(y);
            }
            if (B.length === 0) {
                s(40);
                m(40);
            }
        };
        u.onNotifiedViewCreator = function (C, A) {
            r.onNotifiedViewCreator(C, A);
            var B, y;
            var z = C.changeObject;
            if (C.changeObject.type === "funnelRolloverData") {
                this.$reportItems.addClass("disabled");
                this.$reportItems.stop(true);
                this.$reportItems.fadeTo(250, 0.3);
                var x = C.changeObject.data.journaltypecode.toLowerCase().replace(/\s/g, "-");
                var w = function (D) {
                    D.removeClass("disabled");
                    D.stop(true);
                    D.fadeTo(350, 1);
                };
                this.$reportItems.each(function (F, E) {
                    var D = a(this);
                    if (D.attr("data-journaltype").indexOf(" ") > -1) {
                        if (D.attr("data-journaltype").indexOf(x) > -1) {
                            w(D);
                        }
                    } else {
                        if (D.attr("data-journaltype") === x) {
                            w(D);
                        }
                    }
                });
            }
            if (C.changeObject.type === "funnelRolloutData") {
                this.$reportItems.removeClass("disabled");
                this.$reportItems.stop(true).delay(300).fadeTo(250, 1);
            }
        };
        function n() {
            a(".sessions-blocker").css("top", "296px");
            a(".conversion-blocker").css("top", "434px");
            a(".authorised-blocker").css("top", "534px");
            a(".settlement-blocker").css("top", "734px");
        }

        function q() {
            a(".funnel-border.conversion-received").css("top", "342px");
            a(".funnel-border.settlement").css("top", "588px");
        }

        function l() {
            a(".conversion-group").css("top", "194px");
            a(".authorised-group").css("top", "315px");
            a(".settlement-group").css("top", "431px");
            a(".final-group").css("top", "568px");
        }

        function t(w) {
            a(".sessions-blocker").css("top", (parseInt(a(".sessions-blocker").css("top")) + w) + "px");
            a(".conversion-blocker").css("top", (parseInt(a(".conversion-blocker").css("top")) + w) + "px");
            a(".authorised-blocker").css("top", (parseInt(a(".authorised-blocker").css("top")) + w) + "px");
            a(".settlement-blocker").css("top", (parseInt(a(".settlement-blocker").css("top")) + w) + "px");
        }

        function s(w) {
            a(".funnel-border.conversion-received").css("top", (parseInt(a(".funnel-border.conversion-received").css("top")) + w) + "px");
            a(".funnel-border.settlement").css("top", (parseInt(a(".funnel-border.settlement").css("top")) + w) + "px");
        }

        function m(w) {
            a(".conversion-group").css("top", (parseInt(a(".conversion-group").css("top")) + w) + "px");
            a(".authorised-group").css("top", (parseInt(a(".authorised-group").css("top")) + w) + "px");
            a(".settlement-group").css("top", (parseInt(a(".settlement-group").css("top")) + w) + "px");
            a(".final-group").css("top", (parseInt(a(".final-group").css("top")) + w) + "px");
        }

        function v() {
            var y = a(this).attr("data-journalType");
            var w = y.split(" ");
            var x = a("#funnelChartRollover").find(".bar.rollover").find("rect");
            x.each(function () {
                var A = a(this).attr("data-id");
                var z = a(this);
                j.each(w, function (C) {
                    if (A === C) {
                        var B = z.parent();
                        B.attr("class", "bar rollover external-hover");
                    }
                });
            });
        }

        function o() {
            var w = a("#funnelChartRollover").find(".bar.rollover");
            w.attr("class", "bar rollover");
        }

        u.getInstance = function () {
            return this;
        };
        u.init();
        p.ready();
        return u;
    };
    return b;
});