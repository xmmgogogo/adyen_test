define("pmc/collections/paymentMethodCountryData",["jquery","underscore","backbone","d3","pmc/models/paymentMethod_Session","pmc/models/paymentMethod_Country","chartlib/events/appstateevents","pmc/events/pmEvents","chartlib/chartBaseEvents"],function(b,h,g,j,a,i,e,c,f){var d=g.Collection.extend({model:a,reverseDirection:false,conversionTypes:["Authorised","Completed","Abandoned"],hasParsedData:false,hasData:false,localURL:"pieChart.xml",statsType:"PAYMENT_METHODS_MAIN_COUNTRIES",initialize:function(l,k){this.isLinked=(k)?k.isLinked||false:false;
h.bindAll(this,"parse","getReverseDirection","loadPmSessData","reorderCollection","onLoaded","onError");g.on(e.STATE_CHANGED,this.loadPmSessData);
this.listenTo(this,"error",function(){this.trigger(f.DATA_FAILED);});this.comparator=this.compareFunction;this.sortKey="total";
},loadPmSessData:function(n){this.loaded=b.Deferred();this.hasParsedData=false;this.hasData=false;var k=h.pick(n.attributes,"statsType","region","ccs","granularity","bdate","edate");
k.statsType=this.statsType;var l=n.get("label").toLowerCase();if(l.length){l=l+"/";}var m=n.get("stubURL")?n.get("stubURL"):"/chart/charts/paymentMethods/dummy-data/";
this.url=(n.get("stub"))?adyen.jsbase+m+l+"pieChart.xml?"+new Date().getTime():n.get("url")+b.param(k)+"&cb="+new Date().getTime();
this.fetch({reset:true});},fetch:function(k){k||(k={});k.dataType="xml";k.success=this.onLoaded;k.error=this.onError;this._super(k);
g.trigger(f.REGISTER_DEFERRED,this.loaded,"PaymentMethodCountryData",this);},parse:function(m){this.pmSessDict={};this.xmlData=m;
var k=b(b(this.xmlData).find("category")[0]);var l=Number(k.attr("value"));h.each(k.children(),h.bind(this.parsePM,this));
this.pmSessDict=h.toArray(this.pmSessDict);if(window.console&&window.console.log){window.console.log("### this.pmSessDict=",this.pmSessDict);
}g.trigger(c.COUNTRIES_TOTAL,l,this.pmSessDict.length,"PaymentMethodCountryData");this.hasParsedData=true;if(this.pmSessDict.length){this.hasData=true;
}else{this.trigger(f.DATA_FAILED);return null;}this.calculateTotalPercentages(this.pmSessDict);return this.pmSessDict;},parsePM:function(m,q){var p=b(m);
var o=p.attr("label");var k=Math.max(0,Number(p.attr("hoverText").match(/>([^)]+)sessions/)[1]));var n=j.format("0,000");
this.pmSessDict[o]||(this.pmSessDict[o]=new a());this.pmSessDict[o].set("pmName",o);this.pmSessDict[o].set("total",n(k));
this.pmSessDict[o].set("countries",[]);h.each(p.children(),h.bind(this.parseCountry,this,o));var l=this.pmSessDict[o].get("countries");
var s=0;var r=0;h.each(l,function(y,x,u){var w=y.get("total");s+=w;var v=y.get("percentage");r+=v;r=Number(r.toFixed(3));
});var t=new i();t.set("parentPmName",o);t.set("country","RoR");t.set("total",k-s);t.set("order",l.length);t.set("numCountries",l.length+1);
t.set("percentage",Number((1-r).toFixed(3)));l.push(t);},parseCountry:function(n,s,k,o){var m=b(s);var p=m.attr("label");
var t=m.attr("value");var r=Number(m.attr("hoverText").match(/\(([^)]+)%/)[1])/100;var l=this.pmSessDict[n].get("countries");
var q=new i();q.set("parentPmName",n);q.set("country",p);q.set("total",Math.max(0,Number(t)));q.set("order",k);q.set("numCountries",o.length+1);
q.set("percentage",Number(r.toFixed(3)));l.push(q);h.each(m.children(),h.bind(this.parseConversion,this,q));l.forEach(function(v){var u=0;
b.each(v.get("conversionRates"),function(w,x){x.pmName=v.get("parentPmName");x.country=v.get("country");x.totalSessions=v.get("total");
x.startX=u/v.get("total");x.width=x.value/v.get("total");if(x.value<0){window.console.log(x.value);}u+=x.value;});});},parseConversion:function(n,m){var p=b(m);
var l=n.get("conversionRates");var k=p.attr("label").toLowerCase();var o=Math.max(0,Number(p.attr("value")));l.push({name:k,value:o});
},calculateTotalPercentages:function(k){h.each(k,function(o,m){var n=0;var l=o.get("percentages");var p=0;h.each(o.get("countries"),function(t,s,q){var r=t.get("percentage");
l.push({country:t.get("country"),percentage:r,order:s,numValues:q.length+2});n+=r;p=s;});l.push({country:"Total",percentage:1,order:p+1,numValues:l.length+2});
});},onLoaded:function(){this.loaded.resolve();},onError:function(m,k,l){if(window.console&&window.console.log){window.console.log("PaymentMethodCountryData load error: ",m,k.getResponseHeader("content-type"),l);
}this.loaded.reject(k);},reorderCollection:function(m,l){if(l===this){return;}else{g.trigger(f.RENDER_BUTTONS,null);}var k=0;
var n=this;m.forEach(function(o){n.forEach(function(p){if(p.get("pmName")===o.get("pmName")){k++;p.set("order",k);}});});
this.sortByOrder();},getReverseDirection:function(){return this.reverseDirection;},sortByOrder:function(){this.comparator=this.compareFunction;
this.reverseDirection=false;this.sortKey="order";this.sort();},sortByVolume:function(){this.comparator=this.compareFunction;
this.reverseDirection=!this.reverseDirection;this.sortKey="total";this.sort();},sortByAuth:function(){this.comparator=this.comparePercentage;
this.reverseDirection=!this.reverseDirection;this.sortKey="conversionRates";this.sortSubKey="authorised";b(this.models).each(b.proxy(function(m,l){var n=l.get(this.sortKey);
var o=h.findWhere(n,{name:this.sortSubKey});var k=n.indexOf(o);n.splice(0,0,n.splice(k,1)[0]);},this));this.sort();},sortByComp:function(){this.comparator=this.comparePercentage;
this.reverseDirection=!this.reverseDirection;this.sortKey="conversionRates";this.sortSubKey="completed";b(this.models).each(b.proxy(function(m,l){var n=l.get(this.sortKey);
var o=h.findWhere(n,{name:this.sortSubKey});var k=n.indexOf(o);n.splice(0,0,n.splice(k,1)[0]);},this));this.sort();},sortByAban:function(){this.comparator=this.comparePercentage;
this.reverseDirection=!this.reverseDirection;this.sortKey="conversionRates";this.sortSubKey="abandoned";b(this.models).each(b.proxy(function(m,l){var n=l.get(this.sortKey);
var o=h.findWhere(n,{name:this.sortSubKey});var k=n.indexOf(o);n.splice(0,0,n.splice(k,1)[0]);},this));this.sort();},compareFunction:function(l,k){var n=l.get(this.sortKey),m=k.get(this.sortKey);
if(this.reverseDirection){if(n>m){return -1;}if(m>n){return 1;}return 0;}else{if(n<m){return -1;}if(m<n){return 1;}return 0;
}},comparePercentage:function(m,k){var q=m.get(this.sortKey),o=k.get(this.sortKey);var r=h.findWhere(q,{name:this.sortSubKey});
var p=h.findWhere(o,{name:this.sortSubKey});var n=r.value/m.get("total");var l=p.value/k.get("total");if(this.reverseDirection){if(n>l){return -1;
}if(l>n){return 1;}return 0;}else{if(n<l){return -1;}if(l<n){return 1;}return 0;}}});return d;});