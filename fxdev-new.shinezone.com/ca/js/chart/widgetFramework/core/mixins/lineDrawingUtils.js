define("chart/widgetFramework/core/mixins/lineDrawingUtils",["jquery","underscore","d3"],function(e,a,b){var d={};d.defined=function(f){return true;
};d.lineCreator=function(o,v,q,g,m,i,l){var u,k,p,t;if(!v){v="linear";}if(l){u=l.attr("d");}if(u){k=u.split(o);var j=q.length;
p=k.length;if(j>p){if(i!=="end"){i="mixin";}}else{return u;}}var h=b.svg.line().interpolate(v).defined(this.defined).x(g);
if(i==="enter"||i==="end"){h.y(function(w){return 0;});}else{if(i==="update"){h.y(m);}else{if(i==="mixin"){h.y(function(w){return 0;
});t=h(q);var s=t.split(o);var r=a.drop(s,p);var n=k.concat(r);var f=n.join(o);l.style("opacity",0.000001);return f;}}}t=h(q);
return t;};var c=0;d.checkLabelPos=function(f,h,j,m){var l=h.length;for(var k=0;k<l;k++){var g=h[k].targetY;var r=h[k].order;
var q=h[k].who;var o=Math.floor(g-f);if(c===0){if(o<0){c=1;}else{c=-1;}}var n=4*c;var p=o;if(p<0){p*=-1;}if(p<12){f+=n;return d.checkLabelPos(f,h,j,m);
}}c=0;h.push({targetY:f,order:j,who:m});return f;};return function(){return Object.create(d);};},function(a){if(window.console&&console.log){console.log("APP JS ERROR =",a);
}});