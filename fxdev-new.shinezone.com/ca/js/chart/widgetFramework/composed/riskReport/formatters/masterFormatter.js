define("chart/widgetFramework/composed/riskReport/formatters/masterFormatter",["lodash","chartutil/d3utils","chartutil/dateUtils_CET","util/Functional","chart/widgetFramework/composed/riskReport/constants/riskConstants"],function(a,e,f,d,c){function b(i,g,h){this.data=i;
this.timeline=h;this.months=["January","February","March","April","May","June","July","August","September","October","November","December"];
}b.prototype.formatData=function(){var g=[];var m={};if(this.data){if(a.has(this.data,"statistics")){m=this.data.statistics;
}else{if(a.has(this.data,"overall_statistics")){m=this.data.overall_statistics;}}}if(d.falsy(m)){return[];}if(a.isArray(m)){var h=m;
var l=this.timeline.getGranularity();var i=this.timeline.getDates();var j=1;var k=new Date(i[1].getFullYear(),i[1].getMonth(),i[1].getDate()-j);
g=this.parseDates(h,l,[i[0],k]);}return g;};b.prototype.parseDates=function(i,k,j){var h=this;a.map(i,function(n){n.dateStr=n.date;
var l=new Date(n.dateStr);var m=f.convertDateToAMS(l);n.date=f.roundToDay(m);});var g=i;a.each(g,function(l){if(k==="month"){l.formattedTimespan=h.months[l.date.getMonth()]+" "+l.date.getFullYear();
}else{if(k==="week"){l.formattedTimespan="week "+l.date.getWeek();}else{l.formattedTimespan=l.dateStr;}}});return g;};b.prototype.setRawData=function(g){this.data=g;
};return b;});