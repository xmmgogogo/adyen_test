define("timeline/views/timelineFacade",["jquery","underscore","backbone","timeline/views/timeline_v7","timeline/models/timelineState","timeline/collections/timelineData","timeline/views/ui/timelineUI_v7","timeline/views/ui/calendarUI_v7"],function(a,h,g,d,b,c,e,f){var i=g.View.extend({initialize:function(){this._super();
this.initModels(arguments[0]);this.initCollections();this.initViews();},initModels:function(j){this.timelineState=new b(j);
},initCollections:function(){this.timelineData=new c([this.timelineState]);},initViews:function(){this.timelineUI=new e({collection:this.timelineData,loadQueue:this.timelineState.get("loadQueue")});
if(this.timelineState.get("calendar")){this.calendarUI=new f({collection:this.timelineData});}this.timeline=new d({collection:this.timelineData});
},getDates:function(){return this.timelineData.getValue("extent");},getDatesUTC:function(){return this.timelineData.getValue("extentUTC");
},getDatesAMS:function(){return this.timelineData.getValue("extentAMS");},getGranularity:function(){return this.timelineData.getValue("formatPeriod");
},getChartGranularity:function(){return this.timelineData.getValue("chartGranularity");},getForceCET:function(){return this.timelineData.getValue("forceCET");
},getHasConfig:function(){return this.timelineData.getValue("config");}});return i;},function(a){if(window.console&&window.console.log){window.console.log("APP JS ERROR =",a);
}});