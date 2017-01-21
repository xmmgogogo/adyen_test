define("chart/widgetFramework/composed/baseline/BaselineSessionsAggMediator",["jqueryExtended","lodash","d3","chart/widgetFramework/core/BasicMediator","util/ObjectSuper","chart/widgetFramework/core/constants/UIConstants","chart/widgetFramework/core/constants/DataConstants","util/Functional","chartutil/cssutils"],function(a,j,l,i,g,h,f,d,k){var c=false;
var e=false;var b=function(m){var n;n=i(m,true);var o=g(n);n.init=function(){o.init();this.actionCommanderExclusionArray=["actioncommander","viewcreator","timeline"];
};n.getAdditionalDOMElements=function(){o.getAdditionalDOMElements();};n.getWidgets=function(){o.getWidgets();};n.onNotifiedFetcher=function(q,p){o.onNotifiedFetcher(q,p);
};n.onNotifiedFormatter=function(t,r){o.onNotifiedFormatter(t,r);if(r==="sessionsAggregateDataFormatter"){if(t.changeObject.type===f.SORTED_DATA){var u=this.$sortButtonRef.find(".arrow")[0];
var s=this.getInstanceById("#sessionsAggregateDataFormatter");var w=s.getSortDirection();var v=(w)?180:0;var q=(w)?0.5:0;
var p=(w)?0.5:0;k.rotateElement(u,v,q,p);}}};n.onNotifiedViewCreator=function(s,q){o.onNotifiedViewCreator(s,q);var p=s.changeObject;
var r=p.type;};n.getInstance=function(){return this;};n.sortData=function(p,q){this.$sortButtonRef=q;};n.init();m.ready();
return n;};return b;});