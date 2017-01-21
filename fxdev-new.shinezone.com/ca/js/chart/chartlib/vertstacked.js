define("chartlib/vertstacked",["jquery","underscore","chartlib/vertbarchart","d3"],function(e,a,c,b){var d=c.extend({calibrateYScale:function(){if(!this.options.percentile){this.scales.y.domain([0,b.max(this.collection.pluck(this.options.yAttr))]);
}},renderData:function(){var i=this,g=this.scales.x,l=this.scales.y,k=this.options.percentile;i.collection.models.forEach(function(n){var m=0;
e.each(n.get(i.options.yNestAttr),function(o,p){if(!k){p.startY=m;p.endY=(m+p.value);}else{p.startY=m/n.get("total");p.endY=(m+p.value)/n.get("total");
}m+=p.value;});});var j=this.svg.selectAll(".bar").data(i.collection.models,this.joinData);j.enter().append("g").attr("class","bar").attr("transform",function(m){return"translate("+g(i.getX(m))+",0)";
});j.transition().delay(500).attr("transform",function(m){return"translate("+g(i.getX(m))+", 0)";});var f=j.selectAll("rect").data(function(m){return m.get(i.options.yNestAttr);
},function(m){return m.name;});f.enter().append("rect").attr("class",function(m){return"stack "+m.name;}).attr("width",g.rangeBand()).attr("height",0).attr("y",function(m){return l(m.startY);
});if(this.options.tooltip){f.on("mouseover",i.showTooltip).on("mouseout",i.tip.hide);}f.transition().duration(500).delay(function(n,m){return 500+(m*500);
}).attr("y",function(m){return l(m.endY);}).attr("height",function(m){return l(m.startY)-l(m.endY);});f.exit().remove();var h=j.exit().transition();
h.attr("transform",function(m){return"translate(0,0)";}).select("rect").attr("width",0);h.remove();}});return d;});