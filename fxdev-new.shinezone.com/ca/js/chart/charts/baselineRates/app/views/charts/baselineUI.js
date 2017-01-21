define("baselinerates/views/ui/baselineUI",["jquery","underscore","backbone","chartlib/ui/baseui","baselinerates/events/baselineevents"],function(e,b,f,d,a){var c=d.extend({el:'[data-view="baselineUI"]',events:{"click .type-total-button":"onTotalClick","click .type-zoom-button":"onZoomClick"},initialize:function(){var g=this;
b.bindAll(this,"onTotalClick","onZoomClick");this.listenTo(this.collection,"change",this.render);this.totalButton=e(".type-total-button");
this.zoomButton=e(".type-zoom-button");this.totalButton.addClass("active");this.buttons.push(this.totalButton);this.buttons.push(this.zoomButton);
},onTotalClick:function(g){this.totalButton.addClass("active");this.zoomButton.removeClass("active");f.trigger(a.CHART_TYPE_SELECTED,"total");
},onZoomClick:function(g){this.totalButton.removeClass("active");this.zoomButton.addClass("active");f.trigger(a.CHART_TYPE_SELECTED,"zoom");
}});return c;},function(a){if(window.console&&console.log){console.log("APP JS ERROR = "+a);}});