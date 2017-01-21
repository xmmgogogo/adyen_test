define("chartlib/vertbarchart",["jquery","underscore","chartlib/barchart","d3"],function(e,a,d,c){var b=d.extend({addListeners:function(){this._super();
if(this.collection){this.listenTo(this.collection,"sort",this.render);}},setYScale:function(){this._super();this.scales.y.rangeRound([this.height,0]);
},calibrateYScale:function(){this.scales.y.domain([0,c.max(this.collection.pluck(this.options.yAttr))]);},renderData:function(){var h=this,f=this.scales.x,k=this.scales.y;
var i=this.svg.selectAll(".bar").data(this.collection.models,this.joinData);i.transition().attr("transform",function(l){return"translate("+f(h.getX(l))+",0)";
});var j=i.enter().append("g").on("click",h.onBarClicked).attr("class","bar full").attr("transform",function(l){return"translate("+f(h.getX(l))+",0)";
}).append("rect").attr("width",function(l){return f.rangeBand();}).attr("y",h.height).attr("height",0);i.select("rect").transition().attr("y",function(l){return k(h.getY(l));
}).attr("height",function(l){return h.height-k(h.getY(l));});if(this.options.tooltip){i.classed("active",true);j.on("mouseenter",function(l){h.showTooltip(l,this,false);
}).on("mouseout",this.tip.hide);}var g=i.exit().transition();g.attr("transform",function(l){return"translate(0,0)";}).select("rect").attr("width",0);
g.remove();}});return b;},function(a){if(window.console&&console.log){console.log("APP JS ERROR =",a);}});