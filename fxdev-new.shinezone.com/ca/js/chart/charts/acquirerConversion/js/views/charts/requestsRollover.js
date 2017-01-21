adyen=window.adyen||{};adyen.jsbase=adyen.jsbase||"";var chartbase=(adyen.jsbase.length)?"/chart/":"";define("charts/acquirerConversion/js/views/charts/requestsRollover",["jquery","underscore","backbone","d3","chartlib/barchart","chartlib/events/appstateevents","chartutil/numberutils"],function(g,b,h,c,e,d,f){var a=e.extend({defaults:{yScale:"ordinal",totalLabelOffset:5,margin:{top:0,left:265,bottom:30,right:10},barPadding:0.2,xAttr:"percentage",yAttr:"name",joinAttr:"name",textAnchor:"start",tooltip:true,showTipFromText:true},FULL_BAR_SIZE:515,addListeners:function(){if(this.collection){this.listenTo(this.collection,"sort",this.render);
}h.on(d.RENDER_CHARTS,this.render);},renderTooltipContent:function(j){var i=this;this.tip.html(function(){var k="<strong>"+i.getY(j)+":</strong> <span>"+f.decimalFormatter(i.getX(j)*100,2)+"%</span><br/><strong>Transactions:</strong> <span>"+c.format("0,000")(j.get("total"))+"</span>";
return k;});this.tip.direction("n");},renderData:function(){var i=this,k=this.scales.y,j=this._super();j.bar.select("rect").transition().attr("class","rollover-bar").attr("width",function(){return i.FULL_BAR_SIZE;
}).attr("height",function(){return k.rangeBand();});},setXAxis:function(){},renderXAxis:function(){},renderYAxis:function(){this._super();
this.yAxis.selectAll("text").style("text-anchor","start").attr("transform",function(i){return"translate("+-240+",0)";});},formatYAxis:function(){var j=this,i=this.axes.y,k=this.axes.x;
i.tickFormat(function(r,n){var p=34,o=(r.length>p),m=j.options.yAttr,q={};q[m]=r;var l=j.collection.findWhere(q);if(o){r=g.trim(r).substring(0,p).trim(this)+"...";
}return r;});},showToolTip_fromText:function(i){var j=this._super(i);if(typeof window.SVGElement==="undefined"){return;}j.select("rect").classed("textTip",true);
},hideToolTip_fromText:function(i){var j=this._super(i);j.select("rect").classed("textTip",false);}});return a;},function(a){if(window.console&&window.console.log){window.console.log("APP JS ERROR =",a);
}});