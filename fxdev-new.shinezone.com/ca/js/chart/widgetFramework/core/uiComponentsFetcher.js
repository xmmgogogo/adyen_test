define("chart/widgetFramework/core/uiComponentsFetcher",["jquery","underscore"],function(c,a){var b=function(e,d,g){var f={};
f.init=function(){var h=this.parseOptions();this.fetchComponents(h,g);};f.parseOptions=function(){var i=[];for(var j in e){if(e.hasOwnProperty(j)){var h=e[j];
if(h&&a.has(h,"type")){i.push({name:h.type,options:h,type:j});}}}return i;};f.fetchComponents=function(h){var j=a.map(h,function(k){return k.name;
});var i=[];require(j,function(){for(var l=0;l<arguments.length;l++){var k=(arguments.length>1)?this[l].amdName:this.amdName;
var m=a.findWhere(h,{name:k});if(m&&m.options){i.push({name:k,module:arguments[l],options:m.options,type:m.type});}}if(!a.isEmpty(i)){g(i);
}},function(k){window.console.log("error: ",k);});};f.init();return f;};return b;});