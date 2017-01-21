define("baselinerates/models/transaction",["jquery","underscore","backbone","backbonenested","d3","chartutil/dateUtils_CET"],function(e,c,g,b,d,f){var a=g.Model.extend({defaults:{authorisations:0,total:0,authRate:0,averageRate:null,averageTotal:null,rates:[]},parse:function(l){var j={};
j.name="merchant";j.timestamp=(l.millisecondsutc)?l.millisecondsutc:l.day;j.date=f.convertUTCTimestampToAMSDate(j.timestamp);
j.utcdate=f.convertToUTC(new Date(j.timestamp));var i=new Date(j.timestamp);var k=f.convertDateToAMS(i);var h=f.roundToDay(k,true);
j.amsDate=h;j.authorisations=l.auths;j.total=l.total;j.authRate=(l.auths/l.total);j.rates=[{name:"authorised",value:l.auths},{name:"abandoned",value:(l.total-l.auths)}];
return j;}});return a;});