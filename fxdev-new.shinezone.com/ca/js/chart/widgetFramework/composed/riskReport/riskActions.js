define("chart/widgetFramework/composed/riskReport/riskActions",["jqueryExtended","underscore"],function(e,b){var f=e;var g=window.adyen||{};
var a=g.config||{};var c=["riskReportFetcher","riskChecksFetcher"];if(a.riskHistogramEnabled){c.push("fraudScoreFetcher");
}if(a.chargebackLineEnabled){c.push("chargebackRateFetcher");}var d={actions:[{source:"issuerCountry",event:"change",target:c,callMethod:"fetchNewDataAction",getterMethod:function(h){f("#timeline1").find("#timelineLoader").css("display","block");
var i=h.val();return{countryFilter:i};}},{source:"paymentMethod",event:"change",target:c,callMethod:"fetchNewDataAction",getterMethod:function(h){f("#timeline1").find("#timelineLoader").css("display","block");
var i=h.val();return{paymentMethod:i};}},{source:"shopperInteraction",event:"change",target:c,callMethod:"fetchNewDataAction",getterMethod:function(h){f("#timeline1").find("#timelineLoader").css("display","block");
var i=h.val();return{shopperInteraction:i};}}]};return d;});