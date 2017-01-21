define("chart/widgetFramework/core/Dataset",["jqueryExtended","underscore","chart/widgetFramework/core/constants/DataConstants"],function(g,c,e){var d="color:darkolivegreen;font-size:1em";
var a=false;var b=false;var f=function(h){var i={};i.init=function(){this.url=h;this.loadCount=0;};i.fetchData=function(k){if(window.console&&console.log&&a){console.log("%c\n################",d);
console.log("%c### START STAGE :: Dataset::fetchData",d);console.log("### Dataset::fetchData:: urlParams=",k);console.log("%c################",d);
}this.loadCount++;var j=this.url;if(b&&this.loadCount>1){var m=j.split(".");j=m[0]+this.loadCount+"."+m[1];}if(k&&k.type&&k.type.toLowerCase()==="post"){var l="?cb=";
if(j.indexOf("?")>-1){l="&cb=";}j+=l+k.cb;}return g.ajax({type:(k&&k.type)||"GET",url:j,data:k});};i.init();return i;};return f;
});