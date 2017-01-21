define("charts/mobileConversion/js/collections/deviceVolumeData",["jquery","underscore","backbone","charts/mobileConversion/js/models/mobile","chartlib/events/appstateevents","chartlib/chartBaseEvents","charts/mobileConversion/js/events/mobileEvents"],function(f,c,h,b,e,g,d){var a=h.Collection.extend({model:b,reverseDirection:false,conversionTypes:["Authorised","Completed","Abandoned"],hasParsedData:false,hasData:false,initialize:function(i){c.bindAll(this,"parse","getReverseDirection","loadVolData","loadAtvData","parseAtvData","onLoaded","onError");
if(i.omitOtherDevices){this.omitOtherDevices=i.omitOtherDevices;}h.on(e.STATE_CHANGED,this.loadAtvData);this.listenTo(this,"error",function(){this.trigger(g.DATA_FAILED);
});this.comparator=this.compareFunction;this.sortKey="total";},getUrl:function(m,k){var i=c.pick(m.attributes,"statsType","region","ccs","granularity","bdate","edate");
var j=m.get("label").toLowerCase();if(j.length){j=j+"/";}var l=m.get("stubURL")?m.get("stubURL"):"/chart/charts/mobileConversion/dummy-data/";
if(k==="volData"){i.statsType="CONVERSION_MOBILE_DEVICETYPE_NORMALISED";this.localURL="conversionDevice.xml?";}if(k==="atvData"){i.statsType="MOBILE_ATV_PER_DEVICETYPE";
this.localURL="atvPerDevice.xml?";}if(m.get("stub")){return adyen.jsbase+l+j+this.localURL+new Date().getTime();}else{return m.get("url")+f.param(i)+"&cb="+new Date().getTime();
}},loadAtvData:function(j){this.trgtState=j;var i=this;f.ajax({url:i.getUrl(j,"atvData"),dataType:"xml",success:i.parseAtvData,error:i.onError});
},parseAtvData:function(m){var l=this;this.parsedAtvData=[];var j=f(m);var i=j.find("category");var k=j.find("set");c.each(i,function(n){l.parsedAtvData.push({category:f(n).attr("label")});
});c.each(k,function(n,o){l.parsedAtvData[o].avgTxVal=f(n).attr("value");});this.loadVolData();},loadVolData:function(){this.loaded=f.Deferred();
this.hasParsedData=false;this.hasData=false;this.url=this.getUrl(this.trgtState,"volData");this.fetch({reset:true});},fetch:function(i){i||(i={});
i.dataType="xml";i.success=this.onLoaded;i.error=this.onError;this._super(i);h.trigger(g.REGISTER_DEFERRED,this.loaded,"deviceVolumeData",this);
},parse:function(l){var k=this;this.total=0;this.volDict={};this.xmlData=l;f(this.conversionTypes).each(f.proxy(this.parseItem,this));
c.forEach(this.volDict,function(i){k.total+=i.get("total");});c.each(this.volDict,function(i){c.each(k.parsedAtvData,function(m){if(i.get("name")===m.category){i.set("avgTxVal",m.avgTxVal);
}});});if(!this.omitOtherDevices){for(var j in this.parsedAtvData){if(this.parsedAtvData[j].category==="Other"){this.volDict.Other=new b({name:"Other Devices",avgTxVal:this.parsedAtvData[j].avgTxVal});
}}}this.volDict=c.toArray(this.volDict);this.hasParsedData=true;if(this.volDict.length){this.hasData=true;}else{this.trigger(g.DATA_FAILED);
return null;}h.trigger(d.MOBILE_DEVICES_TOTAL,this.total,this.volDict.length,"deviceVolumeData");return this.volDict;},parseItem:function(l,k){var n;
var j=f(this.xmlData).find('[seriesName="'+k+'"]');var m=this;k=k.toLowerCase();j.children().each(f.proxy(function(q,r){n=f(r);
var o=n.attr("toolText").match(/,\s([^)]+),/)[1];this.volDict[o]||(this.volDict[o]=new b());this.volDict[o].set("name",o);
var p=n.attr("toolText").match(/\(([^)]+)\)/)[1];this.volDict[o].set("total",this.volDict[o].get("total")+Math.max(0,+parseInt(p)));
this.volDict[o].get("conversionRates").push({name:k,value:Math.max(0,+parseInt(p))});},this));},setPercentages:function(i){var j=this;
this.absTotPercent=0;c.forEach(this.volDict,function(k){k.set("percentage",Number((k.get("total")/i).toFixed(4)));j.absTotPercent+=k.get("percentage");
});c.forEach(this.volDict,function(k){if(k.get("name")==="Other Devices"){k.set("total",i-j.total);k.set("percentage",Number((1-j.absTotPercent).toFixed(4)));
}});this.sortByPerc(true);this.trigger("reset");},onError:function(k,i,j){if(window.console&&window.console.log){window.console.log("channelVolumeData load error: ",k,i.getResponseHeader("content-type"),j);
}this.loaded.reject(i);},onLoaded:function(){this.loaded.resolve();},getReverseDirection:function(){return this.reverseDirection;
},sortByOrder:function(){this.comparator=this.compareFunction;this.reverseDirection=false;this.sortKey="order";this.sort();
},sortByVolume:function(){this.comparator=this.compareFunction;this.reverseDirection=!this.reverseDirection;this.sortKey="total";
this.sort();},sortByName:function(){this.comparator=this.compareFunction;this.reverseDirection=!this.reverseDirection;this.sortKey="name";
this.sort();},sortByPerc:function(i){if(i){this.reverseDirection=this.reverseDirection;}else{this.reverseDirection=!this.reverseDirection;
}this.comparator=this.compareFunction;this.sortKey="percentage";this.sort();},sortByAtv:function(){this.comparator=this.compareFunction;
this.reverseDirection=!this.reverseDirection;this.sortKey="avgTxVal";this.sort();},sortByAuth:function(){this.comparator=this.comparePercentage;
this.reverseDirection=!this.reverseDirection;this.sortKey="conversionRates";this.sortSubKey="authorised";f(this.models).each(f.proxy(function(l,k){var m=k.get(this.sortKey);
var n=c.findWhere(m,{name:this.sortSubKey});var j=m.indexOf(n);m.splice(0,0,m.splice(j,1)[0]);},this));this.sort();},sortByComp:function(){this.comparator=this.comparePercentage;
this.reverseDirection=!this.reverseDirection;this.sortKey="conversionRates";this.sortSubKey="completed";f(this.models).each(f.proxy(function(l,k){var m=k.get(this.sortKey);
var n=c.findWhere(m,{name:this.sortSubKey});var j=m.indexOf(n);m.splice(0,0,m.splice(j,1)[0]);},this));this.sort();},sortByAban:function(){this.comparator=this.comparePercentage;
this.reverseDirection=!this.reverseDirection;this.sortKey="conversionRates";this.sortSubKey="abandoned";f(this.models).each(f.proxy(function(l,k){var m=k.get(this.sortKey);
var n=c.findWhere(m,{name:this.sortSubKey});var j=m.indexOf(n);m.splice(0,0,m.splice(j,1)[0]);},this));this.sort();},compareFunction:function(j,i){var l=j.get(this.sortKey),k=i.get(this.sortKey);
if(typeof l==="string"){l=l.toLowerCase();}if(typeof k==="string"){k=k.toLowerCase();}if(this.reverseDirection){if(l>k){return -1;
}if(k>l){return 1;}return 0;}else{if(l<k){return -1;}if(k<l){return 1;}return 0;}},comparePercentage:function(k,i){var o=k.get(this.sortKey),m=i.get(this.sortKey);
var p=c.findWhere(o,{name:this.sortSubKey});var n=c.findWhere(m,{name:this.sortSubKey});var l=p.value/k.get("total");var j=n.value/i.get("total");
if(this.reverseDirection){if(l>j){return -1;}if(j>l){return 1;}return 0;}else{if(l<j){return -1;}if(j<l){return 1;}return 0;
}}});return a;});