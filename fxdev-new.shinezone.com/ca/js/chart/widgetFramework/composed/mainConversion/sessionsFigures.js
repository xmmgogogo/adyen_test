define("chart/widgetFramework/composed/mainConversion/sessionsFigures", ["jquery", "underscore", "d3", "hogan", "util/Functional", "chartutil/d3utils", "util/ObjectSuper", "chart/widgetFramework/core/drivers/basicChartDriver"], function (b, f, h, d, a, i, e, c) {
    var g = function (p, j, n, l) {
        var m;
        var o = {};
        var k = f.defaults(o, p);
        m = c(k, j);
        var q = e(m);
        m.init = function () {
            q.init();
            this.totalTxt = this.$el.find("#actualTotalText");
        };
        m.feedData = function (t) {
            this.data = t.formattedData;
            var s = this;
            var r = f.filter(this.data, function (u) {
                return u[s.options.joinAttr].toLowerCase() === "hpp";
            });
            this.totalTransactions = r[0].count;
        };
        m.renderData = function () {
            if (b(".world-button").length > 1) {
                return;
            }
            var r = h.format("0,000");
            var s = r(this.totalTransactions);
            b("#worldVolumeTotalText").html("Total Sessions : <b>" + s + "</b>");
        };
        return m;
    };
    return g;
});
