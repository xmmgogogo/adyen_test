define("chart/widgetFramework/composed/riskReport/rollovers/refusalRateChargebackLineRollover",["jqueryExtended","underscore","d3","chart/widgetFramework/core/mixins/widgetScales","util/Functional","chartutil/domUtils","chart/widgetFramework/core/constants/WidgetConstants","util/ObjectSuper","chart/widgetFramework/chartTypes/rollover","chart/widgetFramework/core/constants/DataConstants"],function(c,i,m,j,b,f,d,g,h,e){var l=adyen.config||{};
var a=0;var k=function(t,n,r,p){var q;var s={};var o=i.defaults(s,t);q=h(o,n);var u=g(q);q.thinBarWidth=3;q.init=function(){u.init();
this.barUtils.setBarSelectorStr(".bar.refusal-rate-line-rollover");if(a===0){a=this.$el.height();}};q.resizeRollover=function(w){var x=this.$el.width();
var v;if(w.state==="hidden"){v=w.height;}else{v=a;}this.$el.height(v);this.topSVG.attr("width",x+"px").attr("height",v+"px");
u.update();};q.renderData=function(){var v=this.options.centerBars;this.barUtils.chartWidth=this.width;this.barUtils.chartHeight=this.height;
var w;w=this.barUtils.barPosition(v,this.bandSize,this.getXScale(),this.options.joinAttr);this.barUtils.containerBarsVertical(this.chartGroup,this.getData(),this.getPrimaryDataJoin(),w,true).fullBarVertical(this.thinBarWidth,"thin-bar one",null,200).fullBarVertical(this.thinBarWidth,"thin-bar two",null,140).fullBarVertical(this.barSize,"dateStr");
};q.tooltipOnMouseoverAction=function(w,v){this.sharedMouseAction(v,0.25,1);};q.tooltipOnMouseoutAction=function(w,v){this.sharedMouseAction(v,0,0);
};q.sharedMouseAction=function(D,B,E){var x=D.find(".dateStr");var A=x.attr("data-id");var C=D.find(".thin-bar");m.selectAll(C).style("opacity",B);
var y=D.find(".thin-bar.two");m.select(y[0]).attr("transform","translate("+(-(this.thinBarWidth/2))+",300)");var z=["chargeback","refused-by-revenueprotect","refused-by-bank"],w,v;
i.each(z,function(F){if(F==="chargeback"){w="#chargebackLineChartWidget ."+F+' .line-holder-dot[data-id*="'+A+'"]';}else{w="#refusalRateLine ."+F+' .line-holder-dot[data-id*="'+A+'"]';
}v=m.select(w).style("fill-opacity",E).style("stroke-opacity",E);});};q.positionTooltip=function(z,B,y,A,v,w,C){var x=z.top+y-v;
var D=((z.left+B+10)-A)+(w/2);return{top:x,left:D};};q.enhanceTooltipData=function(x){var w=m.format(".2f");var v=m.format("0,000");
x.refusedBankTT=w(x.refusedByBankPercent);x.refusedRevProTT=w(x.refusedByRevProPercent);x.chargebacksTT=w(x.chargebackPercent);
x.chargebackVisClassTT=l.chargebackRowVis;x.refusedByBankCountTT=v(x.refusedByBankCount);x.refusedByBankAmountTT=v(x.refusedByBankAmount);
x.refusedByRevProCountTT=v(x.refusedByRiskCount);x.refusedByRevProAmountTT=v(x.refusedByRiskAmount);};return q;};return k;
});