define("chart/widgetFramework/core/AxisComponent",["jqueryExtended","chart/widgetFramework/core/constants/DataConstants","underscore","util/Functional","chart/widgetFramework/core/constants/UIConstants","chart/widgetFramework/core/mixins/widgetScales","chart/widgetFramework/core/mixins/widgetAxes","chartutil/stringutils"],function(a,i,l,e,j,m,n,f){var c=false;
var k="color:deepskyblue;font-size:1em";var b=false;var g="color:darkseagreen;font-size:1em";var d=false;var h=function(o){var t={};
t.init=function(){l.bindAll(this,"onNotifiedChartCreated");this.$el=o.getNode();this.id=this.$el.attr("data-id");if(window.console&&console.log&&c){console.log("%c\n################",k);
console.log("%c### INIT STAGE :: GraphComp::"+this.id+":: INIT",k);console.log("%c################",k);}this.parameters=this.getParameters(o);
this.graphOptions=this.parameters.options;this.vizCompContainer=this.$el.parent();this.parentID=this.vizCompContainer.attr("id");
if(!this.parentID){this.parentID=this.vizCompContainer.attr("data-id");}if(window.console&&console.log&&d){console.log("### AxisComponent2::init:: getting ViewCreator promise----");
}this.vizCompContainer.widget().then(function(v){t.vizCompInstance=v.instance;if(window.console&&console.log&&c){console.log("%c\n################",k);
console.log("%c### INIT STAGE :: GraphComp::"+t.id+'::ADDING OBSERVER: "onNotifiedChartCreated" - widgetRef= '+v.instance.id,k);
console.log("%c################",k);}t.vizCompInstance.registerObserver(t.onNotifiedChartCreated,false,t.id);});};t.onNotifiedChartCreated=function(x,v){var w=this.vizCompInstance.deregisterObserver(this.onNotifiedChartCreated);
if(v===this.parentID){this.chart=x.changeObject.data;if(window.console&&console.log&&b){console.log("%c\n################",g);
console.log("%c### START STAGE :: GraphComp::"+this.id+":: onNotifiedChartCreated create scale & axis fny on chart",g);console.log("### START STAGE :: GraphComp::"+this.id+":: onNotifiedChartCreated create scale & axis fny on chart:",this.chart);
console.log("%c################",g);}if(this.graphOptions.orientation==="x"){p(this.graphOptions,this.chart.dimensionsXArray,this.chart.dimensionsYArray);
if(!p){return;}this.chart.options.xScale=this.graphOptions.scale;this.graphOptions.nestedXAttr=e.getValueOrDefault(this.chart.options,null,"nestedXAttr");
this.chart.dimensionsXArray.push(this.graphOptions.dimension);this.chart.options.niceScaleX=this.graphOptions.niceScale;this.chart.options.xTicks=this.graphOptions.ticks;
this.chart.options.suffixLastXTickOnly=this.graphOptions.suffixLastTickOnly;this.chart.options.xAxisTranTime=(this.graphOptions.axisTranTime!=="undefined")?this.graphOptions.axisTranTime:500;
e.getValueOrDefault(this.graphOptions,"bottom","align",true);s(this.graphOptions,this.chart);q(this.graphOptions,this.chart);
}else{if(this.graphOptions.orientation==="y"){p(this.graphOptions,this.chart.dimensionsXArray,this.chart.dimensionsYArray);
if(!p){return;}this.chart.options.yScale=this.graphOptions.scale;this.graphOptions.nestedYAttr=e.getValueOrDefault(this.chart.options,null,"nestedYAttr");
this.chart.dimensionsYArray.push(this.graphOptions.dimension);this.chart.options.yTicks=this.graphOptions.ticks;this.chart.options.yAxisIsPercent=false;
if(this.graphOptions.tickFormat&&this.graphOptions.tickFormat.toLowerCase().indexOf("percent")>-1){this.chart.options.yAxisIsPercent=true;
}this.chart.options.suffixLastYTickOnly=this.graphOptions.suffixLastTickOnly;this.chart.options.yAxisTranTime=(typeof this.graphOptions.axisTranTime!=="undefined")?this.graphOptions.axisTranTime:500;
e.getValueOrDefault(this.graphOptions,"left","align",true);r(this.graphOptions,this.chart);u(this.graphOptions,this.chart);
}}this.$el.remove();}};function s(w,v){var x=w.scale;var y=w.dimension;var z=f.capitaliseFirstLetter(x);v.xScaleCreationFns[y]=m["get"+z+"XScale"](y);
v.calibrateXScaleFns[y]=m["getCalibrate"+z+"XScale"](y,w);}function q(w,v){var x=w.scale;var y=w.dimension;var z=f.capitaliseFirstLetter(x);
v.xAxisCreationFns[y]=n["get"+z+"XAxis"](y,w);v.formatXAxisFns[y]=n["getFormat"+z+"XAxis"](y,w);v.renderXAxisFns[y]=n["getRender"+z+"XAxis"](y,w);
}function r(w,v){var x=w.scale;var z=w.dimension;var y=f.capitaliseFirstLetter(x);v.yScaleCreationFns[z]=m["get"+y+"YScale"](z);
v.calibrateYScaleFns[z]=m["getCalibrate"+y+"YScale"](z,w);}function u(w,v){var x=w.scale;var z=w.dimension;var y=f.capitaliseFirstLetter(x);
v.yAxisCreationFns[z]=n["get"+y+"YAxis"](z,w);v.formatYAxisFns[z]=n["getFormat"+y+"YAxis"](z,w);v.renderYAxisFns[z]=n["getRender"+y+"YAxis"](z,w);
}t.getParameters=function(v){var y=v.getNode().data();var w;if(l.keys(y).length){w=y;}else{v.parameters.options=a.parseJSON(v.parameters.options);
w=v.parameters;}var x={};if(l.keys(w).length){x.options=w.options;}else{throw"The parameters are not well defined"+w;}return x;
};function p(y,v,A){var z=e.checker(e.validator("must be a map",e.aMap),e.hasKeysWithTruthyValues("scale","dimension"));var x=z(y);
if(x.length){if(window.console&&console.log){console.log("\n###############");console.error("### AxisComponent::onNotifiedChartCreated:: CHECKED =",x);
console.log("################");}return false;}var w=v.concat(A);if(l.includes(w,y.dimension)){if(window.console&&console.log){console.log("\n###############");
console.error("### AxisComponent::onNotifiedChartCreated:: Dimension values must be unique across both axes:",y.dimension,"already exists");
console.log("################");}return false;}return true;}t.init();if(window.console&&console.log&&d){console.log("\n### AxisComponent2::constructor:: calling pWidgetApi.ready()");
}o.ready();return t;};return h;});