define("chart/widgetFramework/composed/riskReport/formatters/lineFormatter",["jqueryExtended","underscore","d3","chartutil/dateUtils_CET","chart/widgetFramework/core/constants/DataConstants","chartutil/domUtils","chartutil/stringutils"],function(h,a,b,g,e,d,f){var c=function(l,i,k,m){var j={};
j.data=l;j.options=i;j.formattedData={};j.comparator=null;j.reverseDirection=false;j.sortKey=null;j.timeline=k;j.id=m;j.formatData=function(){var n={};
this.formattedData=this.calculateMetaData(this.data);if(this.sortKey){this.reverseDirection=!this.reverseDirection;this.sortData(this.sortKey,true);
}if(window.console&&console.log){console.log("### lineFormatter::formatData---------------------:: this.formattedData=",this.formattedData);
}return{config:n,chartData:this.formattedData};};j.calculateMetaData=function(t){var u=[];var q=[];var r=[];var p=[];var o=[];
var s=[];var n=[];a.each(t,function(y){var v=(y.authorisedCount>0)?y.authorisedEurAmount/y.authorisedCount:0;u.push({date:y.date,value:v/100,name:y.dateStr});
var A=(y.refusedByRiskCount>0)?y.refusedByRiskEurAmount/y.refusedByRiskCount:0;p.push({date:y.date,value:A/100,name:y.dateStr});
var x=(y.refusedByBankCount>0)?y.refusedByBankEurAmount/y.refusedByBankCount:0;o.push({date:y.date,value:x/100,name:y.dateStr});
var w=(y.riskTransactionCount>0)?y.refusedByRiskCount/y.riskTransactionCount:0;s.push({date:y.date,value:w*100,name:y.dateStr});
var z=(y.riskTransactionCount>0)?y.refusedByBankCount/y.riskTransactionCount:0;n.push({date:y.date,value:z*100,name:y.dateStr});
r.push({date:y.date,dateStr:y.dateStr,formattedTimespan:y.formattedTimespan,refusedByBankPercent:z*100,refusedByRevProPercent:w*100,chargebackPercent:99999999,refusedByBankCount:y.refusedByBankCount,refusedByBankAmount:(y.refusedByBankEurAmount/100),refusedByRiskCount:y.refusedByRiskCount,refusedByRiskAmount:y.refusedByRiskEurAmount/100});
q.push({date:y.date,dateStr:y.dateStr,formattedTimespan:y.formattedTimespan,authorizedEuroAvg:v/100,refusedByRevProEuroAvg:A/100,refusedByBankEuroAvg:x/100});
});return{refusalRates:[{name:"Refused by bank",lineValues:n},{name:"Refused by RevenueProtect",lineValues:s}],averageTransactionValues:[{name:"All Authorized Transactions",lineValues:u},{name:"Refused by RevenueProtect",lineValues:p},{name:"Refused by bank",lineValues:o}],refusalAndChargebackRolloverData:r,averageTxValuesRolloverData:q};
};j.sortData=function(n,p){this.sortKey=n;this.reverseDirection=!this.reverseDirection;var o=a.sortBy(this.formattedData,n);
if(this.reverseDirection){o.reverse();}this.formattedData=o;if(p===true){return;}this.$el.trigger(e.FORMATTER_INFORM_WIDGET,{type:e.SORTED_DATA,data:this.formattedData});
};j.compareFunction=function(n){return n[this.sortKey];};j.downloadRefusalRateCSV=function(){var p=this.createObjectForCSV("refusalRates","Percent",",.4f");
var n=["dateStr","refusedByRevenueprotectPercent","refusedByBankPercent"];var o=["Date","Refused by RevenueProtect (%)","Refused by bank (%)"];
d.createCSV(p,n,o,"RefusalRates");};j.downloadAtvCSV=function(){var p=this.createObjectForCSV("averageTransactionValues","Amount");
var n=["dateStr","allAuthorizedTransactionsAmount","refusedByRevenueprotectAmount","refusedByBankAmount"];var o=["Date","All Authorized Transactions (EUR)","Refused by RevenueProtect (EUR)","Refused by bank (EUR)"];
d.createCSV(p,n,o,"AverageTransactionValues");};j.createObjectForCSV=function(v,t,o){var p=o||",.2f";var n=b.format(p);var r=this.formattedData[v];
var u=r.length;var y=a.cloneDeep(r[0].lineValues);var w=f.camelCase(r[0].name);y=a.map(y,function(z){var A={dateStr:z.name};
A[w+t]=+n(z.value);return A;});for(var s=1;s<u;s++){var q=r[s];var x=f.camelCase(q.name);a.each(q.lineValues,function(A,z){y[z][x+t]=+n(A.value);
});}return y;};j.getData=function(){return(this.data)?this.data:this.formatData();};j.setRawData=function(n){this.data=n;
};j.retrieveData=function(n){return this.data[n];};j.setOptions=function(n){this.options=n;};return j;};return c;});