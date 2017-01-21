define("chart/widgetFramework/components/basicTooltip",["jquery","underscore","hogan"],function(e,b,a){var c=null;var d=function(f,h){var g={};
g.init=function(){this.name=f.name;if(!c){var i="position:absolute; display:none;";if(f.sticky!==true){i+="pointer-events:none;";
}c=this.$container=e("<div id='chartRolloverHolder' class='widget-tooltip' style='"+i+"'></div>");h.append(this.$container);
}else{this.$container=c;}require(["text!chart/widgetFramework/"+f.template],function(j){g.template=a.compile(j);});};g.render=function(i,j){if(!this.template){return;
}var k=this.template.render(j);this.$container.html(k);if(i){i.opacity=1;this.$container.stop(true);this.$container.animate(i,100,"linear");
}return this.$container;};g.hide=function(){this.$container.stop();this.$container.fadeTo(150,0);};g.show=function(){this.$container.stop();
this.$container.fadeTo(200,1);};g.setPosition=function(i){this.$container.css(i);this.hide();};g.init();return g;};return d;
});