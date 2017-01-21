var console = console;
define("chartlib/models/appstate", ["jquery", "underscore", "backbone", "d3", "chartlib/models/state", "chartlib/events/appstateevents", "chartutil/arrayutils"], function (f, b, h, c, a, d, e) {
    var g = h.Model.extend({
        defaults: {
            stub: false,
            baseURL: adyen.base + "ca/reports/chartxml.php?",
            stateMap: [],
            targetStat: "MAP_WORLD_8REGION"
        }, timeline: null, config: null, hasMap: false, requestDuringSetup: false, initialize: function () {
            b.bindAll(this, "changeState");
            h.on(d.CHANGE_REQUESTED, this.changeState);
        }, addConfig: function (j) {
            var i = (typeof j.callAtStart !== "undefined") ? j.callAtStart : true;
            this.timeline = j.timeline;
            this.config = j.config;
            this.hasMap = j.hasMap;
            if (this.requestDuringSetup && i === true) {
                this.changeState();
            }
        }, changeState: function (k, i, j) {
            if (!this.timeline && !this.config) {
                this.requestDuringSetup = true;
                return;
            }
            if (!this.timeline.getHasConfig) {
                this.timeline = {
                    getHasConfig: function () {
                        return null;
                    }, getGranularity: function () {
                        return "day";
                    }
                };
                this.addTimeValues = function () {
                };
            }
            var l = new a();
            if (this.hasMap) {
                l = this.addMapValues(k, i, j);
            }
            if (this.config) {
                this.addConfigValues(l, this.config.getConfigObject());
            }
            this.addTimeValues(l);
            if (this.timeline.getHasConfig()) {
                l.set("granularity", this.timeline.getChartGranularity());
            } else {
                l.set("granularity", this.timeline.getGranularity());
            }
            l.set("url", this.get("baseURL"));
            this.setStubValues(l);
            this.notifyStateChange(l);
        }, notifyStateChange: function (i) {
            h.trigger(d.STATE_CHANGED, i);
        }, addMapValues: function (l, i, k) {
            if (!l && !i) {
                var m = this.retrieveState();
                var j = m[0];
                var n = m[1];
                var o = m[2];
                return this.setRegion(j, n, o);
            } else {
                return this.setRegion(l, i, k);
            }
        }, addConfigValues: function (j, i) {
        }, addTimeValues: function (j) {
            var i;
            i = this.timeline.getDates();
            j.set("bdate", c.time.format("%Y-%m-%d")(i[0]));
            j.set("edate", c.time.format("%Y-%m-%d")(i[1]));
        }, setStubValues: function (i) {
        }, setRegion: function (i, k, l) {
            e.removeFrom(this.get("stateMap"), "label", i);
            var j = new a({label: i, statsType: k});
            this.get("stateMap").push(j);
            if (l) {
                if (b.size(this.get("stateMap")) > 2) {
                    j.set("ccs", l);
                } else {
                    j.set("region", l);
                }
            }
            return j;
        }, retrieveState: function () {
            var j, i, k, l;
            if (this.get("stateMap").length > 0) {
                j = this.get("stateMap")[(this.get("stateMap").length - 1)];
                i = j.get("label");
                k = j.get("statsType");
                l = j.get("region");
            } else {
                i = "world";
                k = this.get("targetStat");
            }
            return [i, k, l];
        }
    });
    return g;
}, function (a) {
    if (window.console && console.log) {
        console.log("APP JS ERROR =", a);
    }
});