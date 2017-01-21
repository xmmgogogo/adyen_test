define("pmc/views/charts/paymentMethodCountryConversion",["jquery","backbone","underscore","chartlib/stackedbarchart","d3","chartutil/numberutils","chartlib/events/appstateevents"],function(g,h,a,b,d,f,e){var c=b.extend({el:"#pmCountryConversion",defaults:{yScale:"ordinal",totalLabelOffset:70,margin:{top:0,left:40,bottom:20,right:110},barPadding:0.1,xAttr:"total",yAttr:"pmName",joinAttr:"pmName",xNestAttr:"conversionRates",tooltip:true},barSize:11,spacer:2,addListeners:function(){h.on(e.RENDER_CHARTS,this.render);
},renderTooltipContent:function(j){var i=d.format("0,000");this.tip.html(function(k){if(typeof window.SVGElement==="undefined"){return"<strong>"+j.pmName+" ("+j.country+") - "+j.name+":</strong> <span>"+f.decimalFormatter(j.width*100)+"%</span>";
}return"<strong>"+j.name+":</strong> <span>"+f.decimalFormatter(j.width*100,2)+"%</span> <span class='tooltip-text-sml'> ("+i(j.value)+" of "+i(j.totalSessions)+" sessions)</span>";
});this.tip.direction("n");this.tip.offset([-10,0]);},renderXAxis:function(){this._super();this.xAxis.selectAll("text").attr("transform",function(){return"translate(0,7)";
});},formatYAxis:function(){var i=this.axes.y;i.tickFormat(function(j){return(j.length>14)?g.trim(j).substring(0,11).trim(this)+"...":j;
});},setYAxis:function(){this.axes.y=d.svg.axis().scale(this.scales.y).orient("right");},renderYAxis:function(){this._super();
this.yAxis.attr("transform","translate("+(this.width+5)+",0)");},renderData:function(){var p=this,u=this.scales.x,r=this.scales.y,t=500;
var n=this.svg.selectAll(".bar").data(this.collection.models,this.joinData);var m=n.enter().append("g").attr("class","bar").attr("transform",function(w){return"translate(0,"+r(p.getY(w))+")";
});var j=n.transition().duration(t).attr("transform",function(w){return"translate(0,"+r(p.getY(w))+")";});var k=n.exit().transition().duration(t).attr("transform",function(w){return"translate(0,"+p.height+")";
}).remove();k.selectAll("text").attr("fill-opacity",0);k.selectAll("rect").attr("height",0);var i=n.selectAll(".bar-country").data(function(w){return w.get("countries");
},function(w){return w.get("country");});var s=i.enter().append("g").attr("class","bar-country").attr("transform",function(x){var w=p.getYPos(x);
return"translate("+0+","+(w)+")";});s.append("text").attr("class","pm-country-chart-text").attr("x","-30").attr("y",function(w){return p.barSize-1;
}).attr("fill-opacity",0).text(function(w){return w.get("country");});var o=i.transition().duration(t).attr("transform",function(x){var w=p.getYPos(x);
return"translate("+0+","+(w)+")";});o.select(".pm-country-chart-text").attr("fill-opacity",function(w){return(w.get("country")==="RoR")?0:1;
}).text(function(w){return w.get("country");});var l=i.exit().transition().duration(t).attr("transform",function(w){return"translate("+0+","+(r.rangeBand())+")";
}).remove();l.select(".pm-country-chart-text").attr("fill-opacity",0);l.selectAll("rect").attr("height",0);var q=i.selectAll("rect").data(function(w){return w.get(p.options.xNestAttr);
},function(w){return w.name;});var v=q.enter().append("rect").attr("class",function(w){return"stack "+w.name;}).attr("height",this.barSize).attr("x",function(w){return u(w.startX);
}).attr("width",0);q.transition().duration(t).delay(function(x,w){return 500+(w*500);}).attr("x",function(w){return u(w.startX);
}).attr("width",function(w){return u(w.width);});if(this.options.tooltip){q.on("mouseover",function(w){p.showTooltip(w,this,false);
}).on("mouseout",function(w){p.hideTooltip(false);});}},getYPos:function(l,k){var i=l.get("order");var m=i*this.barSize;var j=this.spacer*i;
return m+j;},showTooltip:function(m,j,n){this._super(m,j,n);if(typeof window.SVGElement==="undefined"){var i=g(j)[0].raphaelNode[0];
var l=this.$el.offset().left+(this.width/2)-125;var k=g(".d3-tip");k.css("left",(l+30)+"px");}}});return c;});