define("chart/widgetFramework/composed/chargebackReport/cfnBarChart",["jquery","underscore","chart/widgetFramework/core/mixins/formats","util/ObjectSuper","chart/widgetFramework/chartTypes/multiBar"],function(f,c,e,d,a){var b=function(l,g,j){var i;
var k={};var h=c.defaults(k,l);i=a(h,g,j);var m=d(i);i.getLabelName=function(n){return n[this.options.joinAttr];};return i;
};return b;});