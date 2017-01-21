define("baselinerates/views/totalsTitle",["jquery","underscore","backbone","d3"],function(c,a,e,b){var d=e.View.extend({initialize:function(){this.listenTo(this.collection,"reset",this.render);
},render:function(){var i=this.$el.find("h2");var f=b.format("n");var g=b.format(".1%");var h='<span class="csr-col nine a"></span>';
h+='<span class="csr-col five a left">Received: <b>'+f(this.collection.getTotalsSum())+"</b></span>";h+='<span class="csr-col five a left">Authorised: <b>'+f(this.collection.getAuthorisationsSum())+"</b></span>";
h+='<span class="csr-col five a left">Auth Rate: <b>'+g(this.collection.getRatesSum())+"</b></span>";i.html(h);}});return d;
});