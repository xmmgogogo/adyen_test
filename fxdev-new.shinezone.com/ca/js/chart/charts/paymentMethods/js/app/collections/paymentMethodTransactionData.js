define("pmc/collections/paymentMethodTransactionData",["jquery","underscore","backbone","pmc/models/paymentMethod_Tx","chartlib/events/appstateevents","pmc/events/pmEvents","chartlib/chartBaseEvents"],function(f,c,h,a,e,b,g){var d=h.Collection.extend({model:a,reverseDirection:false,hasParsedData:false,hasData:false,addAbandonedFlag:false,localURL:"average_all.xml",statsType:"ATV_PER_PAYMENTMETHOD",initialize:function(j,i){this.isLinked=i.isLinked;
c.bindAll(this,"parse","getReverseDirection","loadPM_TxData","reorderCollection","onLoaded","onError");h.on(e.STATE_CHANGED,this.loadPM_TxData);
h.on(b.COLLECTION_SORTED,this.reorderCollection);this.on("sort",function(){if(arguments[0].sortKey!=="order"){h.trigger(b.COLLECTION_SORTED,this.models,this);
}});this.listenTo(this,"error",function(){this.trigger(g.DATA_FAILED);});this.comparator=this.compareFunction;this.sortKey="total";
},loadPM_TxData:function(l){this.loaded=f.Deferred();this.hasParsedData=false;this.hasData=false;this.addAbandonedFlag=false;
var i=c.pick(l.attributes,"statsType","region","ccs","granularity","bdate","edate");i.statsType=this.statsType;var j=l.get("label").toLowerCase();
if(j.length){j=j+"/";}var k=l.get("stubURL")?l.get("stubURL"):"/chart/charts/paymentMethods/dummy-data/";this.url=(l.get("stub"))?adyen.jsbase+k+j+this.localURL+"?"+new Date().getTime():l.get("url")+f.param(i)+"&cb="+new Date().getTime();
this.fetch({reset:true});},fetch:function(i){i||(i={});i.dataType="xml";i.success=this.onLoaded;i.error=this.onError;this._super(i);
h.trigger(g.REGISTER_DEFERRED,this.loaded,"paymentMethodTransactionData",this);},parse:function(m){this.pmTxDict={};this.xmlData=m;
var l;var j=[];var k=f(this.xmlData).find("categories");var i=f(this.xmlData).find("dataset");k.children().each(f.proxy(function(n,o){l=f(o);
j.push(l.attr("label"));},this));i.children().each(f.proxy(function(o,p){l=f(p);var n=j[o];if(n.toLowerCase()==="no_pmm"){n="no selection";
}this.pmTxDict[n]||(this.pmTxDict[n]=new a());this.pmTxDict[n].set("pmName",n);this.pmTxDict[n].set("total",Number(l.attr("value")));
this.pmTxDict[n].set("order",0);},this));this.pmTxDict=c.toArray(this.pmTxDict);this.hasParsedData=true;if(this.pmTxDict.length){this.hasData=true;
}else{this.trigger(g.DATA_FAILED);return null;}return this.pmTxDict;},onLoaded:function(){this.loaded.resolve();},onError:function(k,i,j){if(window.console&&window.console.log){window.console.log("paymentMethodTransactionData load error: ",k,i.getResponseHeader("content-type"),j);
}this.loaded.reject(i);},addDroppedOutItem:function(){if(!this.addAbandonedFlag){this.addAbandonedFlag=true;var i="no selection";
var j=new a();j.set("pmName",i);j.set("total",0);j.set("order",0);this.add(j);}},reorderCollection:function(k,j){if(j===this){return;
}else{h.trigger(g.RENDER_BUTTONS,null);}var i=0;var l=this;k.forEach(function(m){l.forEach(function(n){if(n.get("pmName")===m.get("pmName")){i++;
n.set("order",i);}});});this.sortByOrder();},getReverseDirection:function(){return this.reverseDirection;},sortByOrder:function(){this.comparator=this.compareFunction;
this.reverseDirection=false;this.sortKey="order";this.sort();},sortByPaymentMethod:function(){this.comparator=this.compareFunction;
this.reverseDirection=!this.reverseDirection;this.sortKey="pmName";this.sort();},sortByTransaction:function(){this.comparator=this.compareFunction;
this.reverseDirection=!this.reverseDirection;this.sortKey="total";this.sort();},compareFunction:function(j,i){var l=j.get(this.sortKey),k=i.get(this.sortKey);
if(this.reverseDirection){if(l>k){return -1;}if(k>l){return 1;}return 0;}else{if(l<k){return -1;}if(k<l){return 1;}return 0;
}}});return d;});