define("charts/mobileConversion/js/collections/channelVolumeData",["jquery","underscore","backbone","charts/mobileConversion/js/models/mobile","chartlib/events/appstateevents","chartlib/chartBaseEvents","charts/mobileConversion/js/events/mobileEvents"],function(f,c,h,b,e,g,d){var a=h.Collection.extend({model:b,reverseDirection:false,conversionTypes:["Authorised","Completed","Abandoned"],hasParsedData:false,hasData:false,initialize:function(j,i){c.bindAll(this,"parse","getReverseDirection","loadVolData","onLoaded","onError");
h.on(e.STATE_CHANGED,this.loadVolData);this.listenTo(this,"error",function(){this.trigger(g.DATA_FAILED);});this.comparator=this.compareFunction;
this.sortKey="total";},getUrl:function(m,k){var i=c.pick(m.attributes,"statsType","region","ccs","granularity","bdate","edate");
var j=m.get("label").toLowerCase();if(j.length){j=j+"/";}var l=m.get("stubURL")?m.get("stubURL"):"/chart/charts/mobileConversion/dummy-data/";
if(k==="volData"){i.statsType="CONVERSION_SALES_CHANNEL_NORMALISED";this.localURL="conversionChannel.xml?";}if(m.get("stub")){return adyen.jsbase+l+j+this.localURL+new Date().getTime();
}else{return m.get("url")+f.param(i)+"&cb="+new Date().getTime();}},loadVolData:function(i){this.loaded=f.Deferred();this.hasParsedData=false;
this.hasData=false;this.url=this.getUrl(i,"volData");this.fetch({reset:true});},fetch:function(i){i||(i={});i.dataType="xml";
i.success=this.onLoaded;i.error=this.onError;this._super(i);this.registerDeferred();},parse:function(j){this.volDict={};this.xmlData=j;
f(this.conversionTypes).each(f.proxy(this.parseItem,this));this.volDict=c.toArray(this.volDict);if(window.console&&window.console.log){window.console.log("### conversionVolumeData this.volDict=",this.volDict);
}this.hasParsedData=true;if(this.volDict.length){this.hasData=true;}else{this.trigger(g.DATA_FAILED);return null;}var i=0;
c.forEach(this.volDict,function(k){if(k.get("name").toLowerCase().indexOf("mobile")>-1){i+=k.get("total");}});h.trigger(d.MOBILE_CHANNELS_TOTAL,i,0,"channelVolumeData");
return this.volDict;},parseItem:function(l,k){var m;var j=f(this.xmlData).find('[seriesName="'+k+'"]');k=k.toLowerCase();
j.children().each(f.proxy(function(p,q){m=f(q);var n;n=m.attr("toolText").match(/,\s([^)]+),/)[1];this.volDict[n]||(this.volDict[n]=new b());
this.volDict[n].set("name",n);var o=m.attr("toolText").match(/\(([^)]+)\)/)[1];this.volDict[n].set("total",this.volDict[n].get("total")+Math.max(0,+parseInt(o)));
this.volDict[n].get("conversionRates").push({name:k,value:Math.max(0,+parseInt(o))});},this));},onError:function(k,i,j){if(window.console&&window.console.log){window.console.log("channelVolumeData load error: ",k,i.getResponseHeader("content-type"),j);
}this.loaded.reject(i);},onLoaded:function(){this.loaded.resolve();},registerDeferred:function(){h.trigger(g.REGISTER_DEFERRED,this.loaded,"channelVolumeData",this);
},getReverseDirection:function(){return this.reverseDirection;},sortByOrder:function(){this.comparator=this.compareFunction;
this.reverseDirection=false;this.sortKey="order";this.sort();},sortByName:function(){this.comparator=this.compareFunction;
this.reverseDirection=!this.reverseDirection;this.sortKey="name";this.sort();},sortByVolume:function(){this.comparator=this.compareFunction;
this.reverseDirection=!this.reverseDirection;this.sortKey="total";this.sort();},sortByAuth:function(){this.comparator=this.comparePercentage;
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