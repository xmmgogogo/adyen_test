define("charts/baselineRates/app/models/appstate",["d3","jquery","underscore","backbone","chartlib/models/appstate","chartlib/models/state","chartlib/events/appstateevents","chartutil/arrayutils","timeline/events/timelineEvents"],function(j,b,f,e,a,g,c,h,i){var d=a.extend({notifyStateChange:function(k){e.trigger(c.REQUEST_STATE_CHANGE,k);
},addMapValues:function(m,k,l){},addConfigValues:function(l,k){},addTimeValues:function(l){var k;k=this.timeline.getDates();
l.set("bdate",j.time.format("%Y-%m-%d %H:%M:%S")(k[0]));l.set("edate",j.time.format("%Y-%m-%d %H:%M:%S")(k[1]));}});return d;
},function(a){if(window.console&&window.console.log){window.console.log("APP JS ERROR =",a);}});