var console=console;define("chartlib/linechart2",["jquery","underscore","backbone","chartlib/basicChart","d3"],function(e,b,f,a,c){var d=a.extend({pathDelimiter:"L",pathAdjustDirection:0,allowToggleLine:true,initRender:function(){this._super(arguments);
this.xAxis.attr("transform","translate(0, -10)");},setXScale:function(){this.scales.x=c.scale[this.options.xScale]().range([0,this.width]);
},calibrateXScale:function(){this.scales.x.domain(c.extent(b.pluck(this.collection.scaleDataArray,this.options.xAttr)));},setYScale:function(){this._super();
this.scales.y.rangeRound([this.height,0]);},calibrateYScale:function(){var i=this;var h=c.min(this.collection.models,function(j){return c.min(j.get(i.options.yAttr),function(k){return k.rate.value;
});});var g=c.max(this.collection.models,function(j){return c.max(j.get(i.options.yAttr),function(k){return k.rate.value;
});});this.scales.y.domain([h,g]);this.scales.y.nice();},setXAxis:function(){this._super(arguments);this.axes.x.tickSize((-this.height-10),0).ticks(0);
},formatXAxis:function(){},renderXAxis:function(){var h=this.axes.x,j=this.collection.granularity,k="wk ",g=this;var i=this.scales.x.ticks(c.time[j+"s"],1).length;
if(i>90&&j==="day"){j="month";}if(i>42&&j==="week"){j="month";}if(i>25&&j==="week"){k="";}h.ticks(c.time[j+"s"],1).tickFormat(function(n,l){if(j==="week"){return(l>0)?k+n.getWeek(true):n.getFullYear()+" wk "+n.getWeek(true);
}var m=(l>0)?c.time.format(g.granularityFormats[j]):c.time.format(g.granularityFormats[j+"_start"]);return m(n);});this._super();
this.xAxis.selectAll(".tick").select("text").attr("transform",function(n,m){var l=(m===0)?-11:0;return"translate("+l+",7)";
});},renderYAxis:function(){this._super();this.yAxis.selectAll(".tick").select("text").attr("transform",function(j,g){var h=(g===0)?-3:0;
return"translate(0,"+h+")";});},lineCreator:function(q,i,l){var u,k,o;if(l){u=l.attr("d");}if(u){k=u.split(this.pathDelimiter);
var j=q.length;o=k.length;if(j>o){i="mixin";}else{return u;}}var p=this.scales.x;var n=this.scales.y;var h=c.svg.line().interpolate("linear").x(function(v){return p(v.date);
});if(i==="enter"){h.y(function(v){return 0;});}else{if(i==="update"){h.y(function(v){return n(+v.rate.value);});}else{if(i==="mixin"){h.y(function(v){return 0;
});var t=h(q);var s=t.split(this.pathDelimiter);var r=b.drop(s,o);var m=k.concat(r);var g=m.join(this.pathDelimiter);l.style("opacity",0);
return g;}}}return h(q);},mockJoinData:function(j,h){var g=this.options.joinAttr;if(g&&j instanceof f.Model){return j.get(g);
}else{if(g&&b(j).has(g)){return j[g];}else{return h;}}},renderData:function(){var m=this,r=this.scales.x,p=this.scales.y,h=[],q=500,g,n;
var t=this.svg.selectAll(".chart-program").data(this.collection.models,this.joinData);var l=t.enter().append("g").attr("class",function(u){g=m._getDatumValue(u,"name");
n=m.getClassName(g);return"chart-program "+n;}).append("path").attr("class","line");t.select(".line").attr("d",function(u){return m.lineCreator(u.get(m.options.yAttr),"enter",c.select(this));
}).transition().duration(q).ease("exp-in-out").style("opacity",1).attr("d",function(u){return m.lineCreator(u.get(m.options.yAttr),"update");
});var o=t.selectAll(".chart-program-dot").data(function(u){return u.get(m.options.yAttr);});var s=o.enter().append("circle").attr("class",function(u){n=m.getClassName(u.rate.name);
return"chart-program-dot "+n;}).attr("cx",function(u){return r(u.date);}).attr("cy",function(u){return 0;}).attr("r",3).on("mouseover",function(u){m.showTooltip(u,this,false);
}).on("mouseout",function(u){m.hideTooltip(false);});o.transition().duration(q).ease("exp-in-out").attr("cx",function(u){return r(u.date);
}).attr("cy",function(u){return p(u.rate.value);}).style("opacity",1);var j=o.exit().transition().duration(q).attr("cy",function(u){return m.height+10;
}).style("opacity",0).remove();var k=this.svg.selectAll(".chart-program-label").data(this.collection.models);k.enter().append("text").attr("class",function(u){this.masterD=u;
g=m._getDatumValue(u,"name");n=m.getClassName(g);return"chart-program-label "+n;}).style("cursor",function(u){if(m.allowToggleLine){e(this).attr("data-col",e(this).css("fill"));
return"pointer";}else{return"auto";}}).attr("x",m.width+10).attr("dy",".35em").attr("y",0).on("mousedown",function(u){if(m.allowToggleLine){m.toggleLine(this.masterD,this,m);
}else{return null;}}).text(function(u){if(m.allowToggleLine){return m.getLabel(u)+" \u2611";}else{return m.getLabel(u);}});
k.datum(function(u){g=m._getDatumValue(u,"name");return{name:g,value:u.get(m.options.yAttr)[u.get(m.options.yAttr).length-1].rate.value};
}).transition().duration(q).attr("y",function(u){return m.checkLabelPos(p(u.value),h);});var i=k.exit().transition().duration(q).attr("y",m.height+10).style("opacity",0).remove();
},checkLabelPos:function(g,j){var l=this;var m=j.length;for(var k=0;k<m;k++){var h=j[k];var n=Math.floor(h-g);if(this.pathAdjustDirection===0){if(n<0){this.pathAdjustDirection=1;
}else{this.pathAdjustDirection=-1;}}var o=5*this.pathAdjustDirection;var p=n;if(p<0){p*=-1;}if(p<12){g+=o;return l.checkLabelPos(g,j);
}}this.pathAdjustDirection=0;j.push(g);return g;},getClassName:function(g){var h=g.toLowerCase().replace(" ","");return h;
},getLabel:function(g){return this._getDatumValue(g,"name");},toggleLine:function(m,j,i){var h=e(j).attr("class");var g=h.match(/\s(.*)/)[1];
if(g.length){var l=this.$(".chart-program."+g);var k=l.css("display");if(k==="inline"){l.fadeOut(250);e(j).text(i.getLabel(m)+" \u2610");
e(j).fadeTo(250,0.5,function(){e(j).css("fill","#ccc");});}else{if(k==="none"){l.fadeIn(250);e(j).text(i.getLabel(m)+" \u2611");
e(j).css("fill",e(j).attr("data-col"));e(j).fadeTo(250,1);}}}}});return d;});