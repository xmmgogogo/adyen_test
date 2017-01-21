define("chart/widgetFramework/composed/chargebackReport/formatters/cfnLineFormatter",["underscore","chart/widgetFramework/core/constants/DataConstants"],function(b,c){var a=function(g,d,f,h){var e={};
e.data=g;e.options=d;e.formattedData={};e.comparator=null;e.reverseDirection=false;e.sortKey=null;e.timeline=f;e.id=h;e.dataType="count";
e.formatData=function(){var j={};var i=this.calculateMetaData(this.data);if(window.console&&console.log){console.log("### cfnLineFormatter::formatData:: formattedData=",i);
}return{config:j,chartData:i};};e.calculateMetaData=function(k){var j=[];var i=[];var l,m;b.each(k,function(q){var n=+q.authorisedEurAmount/100;
var p=+q.chargebackEurAmount/100;var o=+q.fraudNotificationsEurAmount/100;if(e.dataType==="count"){l=(q.chargebackCount>0)?(q.chargebackCount/(q.authorisedCount)*100):0;
j.push({date:q.date,value:l});m=(q.fraudNotificationsCount>0)?(q.fraudNotificationsCount/(q.authorisedCount)*100):0;i.push({date:q.date,value:m});
}else{l=(p>0)?(p/n)*100:0;j.push({date:q.date,value:l});m=(o>0)?(o/n)*100:0;i.push({date:q.date,value:m});}});return{cfnLineData:[{name:"Chargeback",lineValues:j},{name:"Notifications of fraud",lineValues:i}]};
};e.reformatData=function(i){this.dataType=i;var j=this.formatData();this.$el.trigger(c.FORMATTER_INFORM_WIDGET,{type:c.REFORMATTED_DATA,data:j});
};e.setRawData=function(i){this.data=i;};return e;};return a;});