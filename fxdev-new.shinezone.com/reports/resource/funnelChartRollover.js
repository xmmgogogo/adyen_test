define("chart/widgetFramework/composed/funnel/funnelChartRollover",["jqueryExtended","underscore","d3","util/Functional","chartutil/domUtils","chart/widgetFramework/core/constants/UIConstants","util/ObjectSuper","chart/widgetFramework/chartTypes/axisRollover"],function(b,g,i,a,d,f,e,c){var h=function(p,j,n,l){var m;
var o={};var k=g.defaults(o,p);m=c(k,j);var q=e(m);m.setTooltipsOnElements=function(){q.setTooltipsOnElements(true);};m.enhanceTooltipData=function(r){r.nameTT=r.journaltypecode+":";
r.text1TT="<div>"+r.description+"</div>";};m.tooltipOnMouseoverAction=function(r){this.$el.trigger(f.CHART_TO_VIEW_EVENT,{type:"funnelRolloverData",data:r});
};m.tooltipOnMouseoutAction=function(r){this.$el.trigger(f.CHART_TO_VIEW_EVENT,{type:"funnelRolloutData",data:r});};m.renderData=function(){this.barUtils.containerBarsHorizontal(this.chartGroup,this.getData(),this.getPrimaryDataJoin(),this.barPositioningFn,true).fullBarHorizontal(this.barSize,"journaltypecode");
var r=i.select(this.el).selectAll(".bar");g.each(r[0],function(u,s){var t=i.select(u);if(t.datum()[m.options.yAttr].toLowerCase().indexOf("spacer")>-1){t.style("display","none");
}});};return m;};return h;});