define("pmc/views/charts/paymentMethodCountryTotal",["jquery","backbone","underscore","chartlib/basicChart","chartlib/events/appstateevents"],function(d,f,b,a,c){var e=a.extend({el:"#pmCountryTotal",defaults:{yScale:"ordinal",totalLabelOffset:30,margin:{top:0,left:110,bottom:20,right:0},barPadding:0.1,xAttr:"total",yAttr:"pmName",joinAttr:"pmName"},addListeners:function(){f.on(c.RENDER_CHARTS,this.render);
},setXScale:function(){},calibrateXScale:function(){},setXAxis:function(){},formatXAxis:function(){},renderXAxis:function(){},formatYAxis:function(){var g=this.axes.y;
g.tickFormat(function(h){return(h.length>17)?d.trim(h).substring(0,14).trim(this)+"...":h;});}});return e;});