define("chart/widgetFramework/composed/chargebackReport/formatters/masterFormatter",["lodash","chartutil/d3utils","chartutil/dateUtils_CET","util/Functional"],function(a,d,e,c){function b(h,f,g){this.data=h;
this.timeline=g;}b.prototype.formatData=function(){var f=[];var l=(this.data&&a.has(this.data,"overall_statistics"))?this.data.overall_statistics:{};
if(window.console&&console.log){console.log("### masterFormatter::formatData:: rawData=",l);}if(c.falsy(l)){return[];}if(a.isArray(l)){var g=l;
var k=this.timeline.getGranularity();var h=this.timeline.getDates();var i=1;var j=new Date(h[1].getFullYear(),h[1].getMonth(),h[1].getDate()-i);
f=this.fillGaps(g,k,[h[0],j]);}return f;};b.prototype.fillGaps=function(f,h,g){a.map(f,function(j){j.dateStr=j.date;var i=new Date(j.dateStr);
j.date=e.trueRoundToDay(i,true);});return f;};b.prototype.setRawData=function(f){this.data=f;};return b;});