define("chart/widgetFramework/composed/harpViewer/sessionsAggRollover",["jqueryExtended","underscore","d3","util/Functional","chartutil/domUtils","util/ObjectSuper","chart/widgetFramework/chartTypes/rollover"],function(g,b,e,c,f,d,h){var a=function(o,i,m,k){var l;
var n={};var j=b.defaults(n,o);l=h(j,i);var p=d(l);l.setTooltipsOnElements=function(){p.setTooltipsOnElements(true);};l.enhanceTooltipData=function(r){var q=e.format("0,000"),s=e.format(".1f");
r.dateTT=e.time.format("%m/%Y")(r.date);r.txTT=q(r.tx);r.abandonedTT=q(r.tx-r.auths);r.authorisationsTT=q(r.auths);r.authPercTT=s(r.authRate)+"%";
};l.getYScale=function(){var r=b.pluck(this.data,this.options.joinAttr);var q=e.scale.ordinal().rangeBands([0,this.height],this.options.barPadding).domain(r);
return q;};return l;};return a;});