define("chart/widgetFramework/composed/chargebackReport/paymentMethodBrushBarChart",["jquery","underscore","d3","chart/widgetFramework/core/mixins/formats","hogan","util/Functional","util/ObjectSuper","chartutil/numberutils","chart/widgetFramework/core/constants/UIConstants","chart/widgetFramework/chartTypes/brushableBarChart"],function(d,i,k,c,e,b,f,j,h,g){function a(q,l,o){var n;
var p={};var m=i.defaults(p,q);n=g(m,l,o);var r=f(n);n.init=function(){r.init();};n.initRender=function(){r.initRender();
};n.renderData=function(){r.renderData();if(n.data.length<=this.options.numBars){k.select("#paymentMethodBrushExplanation").style("display","none");
}else{k.select("#paymentMethodBrushExplanation").style("display","inline");}};n.sortData=function(s){r.sortData(s);};return n;
}return a;});