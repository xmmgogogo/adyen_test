define("charts/acquirerConversion/js/models/appstate",["jquery","underscore","backbone","chartlib/models/appstate","chartlib/events/appstateevents"],function(d,b,f,e,c){var a=e.extend({defaults:{targetStat:"MAP_WORLD_8REGION"},initialize:function(){this.set("stub",e.prototype.defaults.stub);
this.set("baseURL",e.prototype.defaults.baseURL);this.set("stateMap",e.prototype.defaults.stateMap);this._super();},notifyStateChange:function(g){f.trigger(c.REQUEST_STATE_CHANGE,g);
},addConfigValues:function(h,g){if(g.paymentMethod!==""){h.set("pmms",g.paymentMethod);}if(g.shopperInteraction!==""){h.set("sis",g.shopperInteraction);
}if(g.threeDSecure!==""){h.set("threed",g.threeDSecure);}},setStubValues:function(g){g.set("stub",this.get("stub"));g.set("stubURL","/chart/charts/acquirerConversion/dummy-data/");
}});return a;},function(a){if(window.console&&console.log){console.log("APP JS ERROR =",a);}});