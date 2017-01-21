define("chartlib/linechart",["jquery","underscore","chartlib/basicChart","d3"],function(e,c,b,d){var a=b.extend({setYScale:function(){this._super();
this.scales.y.rangeRound([this.height,0]);},renderData:function(){var h=this,f=this.scales.x,j=this.scales.y;var g=d.svg.line().interpolate("linear").x(function(k){return f(h.getX(k))+f.rangeBand()/2;
}).y(function(k){return j(h.getY(k));});this.line=this.line||this.svg.append("g").append("path").attr("class","line");this.line.datum(this.collection.models).transition().attr("d",g);
var i=this.svg.selectAll(".circle").data(this.collection.models);i.enter().append("svg:circle").attr("class","circle").attr("cx",function(k){return f(h.getX(k))+f.rangeBand()/2;
}).attr("cy",function(k){return j(h.getY(k));}).attr("r",5);i.attr("cx",function(k){return f(h.getX(k))+f.rangeBand()/2;}).attr("cy",function(k){return j(h.getY(k));
});i.exit().remove();if(this.options.tooltip){i.on("mouseover",function(k){h.showTooltip(k,this,false);}).on("mouseout",function(k){h.hideTooltip(false);
});}}});return a;});