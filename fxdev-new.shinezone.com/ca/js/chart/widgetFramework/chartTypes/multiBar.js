define("chart/widgetFramework/chartTypes/multiBar",["jquery","underscore","d3","hogan","util/Functional","util/ObjectSuper","chart/widgetFramework/core/drivers/axisBaseView","chart/widgetFramework/core/constants/UIConstants","chart/widgetFramework/core/constants/WidgetConstants","chart/widgetFramework/core/mixins/formats","chartutil/d3utils"],function(d,i,l,f,b,g,j,h,e,c,k){var a=function(s,m,q,o){var p;
var r={};var n=i.defaults(s,r);p=j(n,m);var t=g(p);p.timeline=q;p.subPadding=0;p.init=function(){t.init();if(b.notFalsy(p.options.subBarPadding)){this.subPadding=p.options.subBarPadding;
}};p.feedData=function(u){var v=t.feedData(u);if(this.timeline){this.configData.granularity=this.timeline.getGranularity();
}if(b.falsy(this.data)){this.setNestedAttr("multi-bars",false,true);return;}this.setNestedAttr(this.data,false,true);return v;
};p.renderYAxis=function(){t.renderYAxis();};p.getMultiBarData=function(){return function(v){var u=v[p.nestedAttr];u=i.map(u,function(w){w.barWidth=(p.barSize/u.length);
return w;});return u;};};p.getSecondaryDataJoin=function(){return this.getDataJoin("name");};p.renderData=function(){if(b.falsy(this.data)){this.hideCharts("no data to display");
return;}var w=this.scales[this.options.xAttr],v=this.scales[this.options.yAttr];var u;if(this.options.variation===e.VERTICAL){u=this.barUtils.containerBarsVertical(this.chartGroup,this.getData(),this.getPrimaryDataJoin(),this.barPositioningFn,true).multiBarVertical(this.getMultiBarData(),this.getSecondaryDataJoin(),v,this.barSize,this.subPadding);
}else{u=this.barUtils.containerBarsHorizontal(this.chartGroup,this.getData(),this.getPrimaryDataJoin(),this.barPositioningFn,true).stackHorizontal(this.getStackData(),this.getSecondaryDataJoin(),w,this.barSize);
}};return p;};return a;});