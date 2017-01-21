adyen=window.adyen||{};adyen.jsbase=adyen.jsbase||"";var chartbase=(adyen.jsbase.length)?"/chart/":"";define("charts/mobileConversion/js/views/app",["d3","jquery","underscore","backbone","chartlib/chartLoadQueue","map/views/ui/mappanel","map/views/ui/mapui","map/views/charts/mapchart","map/collections/mapdata","charts/mobileConversion/js/models/appstate","charts/mobileConversion/js/collections/channelVolumeData","charts/mobileConversion/js/collections/deviceVolumeData","charts/mobileConversion/js/collections/mobileAuthorisationsData","chartlib/ui/collapsiblePanel","charts/mobileConversion/js/views/ui/mobileUI","charts/mobileConversion/js/views/charts/mobileVolume","charts/mobileConversion/js/views/charts/mobileConversion","charts/mobileConversion/js/views/charts/mobileDeviceRollover","charts/mobileConversion/js/views/charts/deviceShare","charts/mobileConversion/js/views/charts/atvPerDevice","charts/mobileConversion/js/views/ui/deviceShareUI","charts/mobileConversion/js/views/ui/mobileAuthorisationUI","charts/mobileConversion/js/views/charts/mobileAuthorisationsOverTime","chartlib/events/appstateevents","chartlib/chartBaseEvents","map/events/worldevents","charts/mobileConversion/js/events/mobileEvents","timeline/views/timelineFacade","timeline/util/timelineConstants","chartlib/ui/csvdownload","chartutil/backbone/CollectionUtils"],function(D,h,E,b,F,u,j,x,g,n,s,w,a,m,B,k,e,f,A,r,p,y,q,C,t,d,v,c,o,i,l){var z=b.View.extend({el:h("#d3canvas"),uid:"mobConv",deferredArray:null,clickedMapBarValue:0,atCountryLevel:false,hasMapData:0,hasChannelData:0,hasMobileData:0,hasNumDevices:0,hasLoadQueue:true,initialize:function(){this._super();
this.channelDisplay=this.$("#channelVolumeTotalText");this.mobileDisplay=this.$("#deviceVolumeTotalText");if(typeof window.SVGElement==="undefined"){var G=h("#ie8_d3CanvasCover");
G.css("height",this.$el.height());G.css("display","block");}b.on(t.REGISTER_DEFERRED,this.registerDeferred,this);b.on(C.CHANGE_REQUESTED,this.changeState,this);
b.on(d.TOTAL_SESSIONS,this.setTotal,this);b.on(v.MOBILE_CHANNELS_TOTAL,this.setTotal,this);b.on(v.MOBILE_DEVICES_TOTAL,this.setTotal,this);
b.on(d.AT_COUNTRY_LEVEL,this.setCountryLevel,this);b.on(d.BAR_CLICKED,this.mapBarClicked,this);if(this.hasLoadQueue){b.on(C.RENDER_CHARTS,this.hideCover,this);
}this.initModels();this.initCollections();this.initViews();},initModels:function(){this.appState=new n();},initCollections:function(){if(this.hasLoadQueue){this.loadQueue=new F();
}this.mapData=new g();this.channelData=new s();this.deviceData=new w({omitOtherDevices:true});this.deviceData2=new w({omitOtherDevices:false});
this.authorisationData=new a();},initViews:function(){var M;var O=new m({el:this.$(".panel.sales-channel")});var J=new B({collection:this.channelData});
var L=new k({collection:this.channelData});var I=new e({collection:this.channelData});M=new i({el:".sales-channel-csvdownload",collection:this.channelData});
O=new m({el:this.$(".panel.device")});var K=new B({collection:this.deviceData,el:"#deviceUI"});var N=new k({collection:this.deviceData,el:".device-volume-chart"});
var G=new e({collection:this.deviceData,el:".device-conversion-chart"});M=new i({el:".device-csvdownload",collection:this.deviceData});
this.deviceShareUI=new p({collection:this.deviceData2,el:'[data-view="atvDeviceUI"]'});this.mobileDeviceRollover=new f({collection:this.deviceData2,el:'[data-view="MobileDeviceRollover"]'});
this.deviceShare=new A({collection:this.deviceData2,el:'[data-view="MobileDeviceChart"]'});this.AtvPerDevice=new r({collection:this.deviceData2,el:'[data-view="AtvPerDevice"]'});
var H=new y();this.mobileAuthorisations=new q({collection:this.authorisationData});M=new i({el:".authorisations-csvdownload",collection:this.authorisationData});
this.timeline=new c({version:7,timeCollectionMode:o.__LAST_FULL,formatPeriod:o.__DAY_FORMAT,baseGranularity:o.__DAY_GRANULARITY,calendar:true,controls:true,loadQueue:this.hasLoadQueue,config:false,chartGranularity:o.__MINUTE_FORMAT,forceCET:false});
this.appState.addConfig({timeline:this.timeline,config:this.configUI,hasMap:true});},changeState:function(){this.$el.css("pointer-events","none");
this.$("svg rect").css("pointer-events","none");this.$("svg text").css("pointer-events","none");this.$el.fadeTo(0,0.35);if(typeof window.SVGElement==="undefined"){var G=h("#ie8_d3CanvasCover");
G.css("height",this.$el.height());G.css("display","block");}this.deferredArray=[];this.hasMapData=0;this.hasChannelData=0;
this.hasMobileData=0;this.hasNumDevices=0;this.channelDisplay.html("");this.mobileDisplay.html("");},registerDeferred:function(I,G,H){I.collection=H;
var K=this.deferredArray;K.push(I);var J=this;I.done(function(M,L){J.checkDeferredsCallback(K);}).fail(function(M,L){J.checkDeferredsCallback(K);
});},checkDeferredsCallback:function(G){var H=E.every(G,function(I){return I.state()==="resolved"||I.state()==="rejected";
});if(H){this.dataAttempted(G);}},hideCover:function(G){this.$el.css("pointer-events","auto");this.$("svg rect").css("pointer-events","auto");
this.$("svg text").css("pointer-events","auto");this.$el.fadeTo(500,1);if(typeof window.SVGElement==="undefined"){var H=h("#ie8_d3CanvasCover");
H.css("display","none");}},dataAttempted:function(G){if(window.console&&window.console.log){window.console.log("### ALL DATA LOADS HAVE REPORTED BACK pDefArray=",G);
}var H=this;if(!this.hasLoadQueue){setTimeout(function(){b.trigger(t.DATA_LOADED);H.hideCover();},10);}else{b.trigger(t.DATA_LOADED);
}if(this.hasChannelData>0&&this.hasMobileData>0){this.deviceData.setPercentages(this.hasChannelData);this.deviceData2.setPercentages(this.hasChannelData);
this.deviceShare.update(true,this.deviceData2);}},setTotal:function(G,J,I){var K;if(I==="mapdata"){this.hasMapData=G;}if(I==="channelVolumeData"){this.hasChannelData=G;
}if(I==="deviceVolumeData"){this.hasMobileData=G;this.hasNumDevices=J;}var H;if(this.hasMapData>0&&this.hasChannelData>0){H=((this.hasChannelData*100)/this.hasMapData).toFixed(1)+"%";
K="Mobile sessions (Browser & App) = <strong>"+H+"</strong>";K+=" of total <span>("+D.format("0,000")(this.hasChannelData)+" of "+D.format("0,000")(this.hasMapData)+" sessions)</span>";
this.channelDisplay.html(K);}else{if(this.hasMapData===0&&this.hasChannelData>0){if(this.atCountryLevel){H=((this.hasChannelData*100)/this.clickedMapBarValue).toFixed(1)+"%";
K="Mobile sessions (Browser & App) account for <strong>"+H+"</strong>";K+=" of total <span>("+D.format("0,000")(this.hasChannelData)+" of "+D.format("0,000")(this.clickedMapBarValue)+" sessions)</span>";
this.channelDisplay.html(K);}}}if(this.hasMobileData>0&&this.hasChannelData>0){H=((this.hasMobileData*100)/this.hasChannelData).toFixed(1)+"%";
K=this.hasNumDevices+" Device Types: <b>"+D.format("0,000")(this.hasMobileData)+"</b>  sessions = <strong>"+H+"</strong>";
K+=" of total <span>("+D.format("0,000")(this.hasChannelData)+" Mobile Sessions)</span>";this.mobileDisplay.html(K);}},setCountryLevel:function(G){this.atCountryLevel=G;
},mapBarClicked:function(G){this.clickedMapBarValue=G.get("total");}});return z;},function(a){if(window.console&&window.console.log){window.console.log("APP JS ERROR =",a);
}});