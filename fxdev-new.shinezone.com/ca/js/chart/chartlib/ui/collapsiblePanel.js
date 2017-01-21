define("chartlib/ui/collapsiblePanel",["d3","backbone","jquery","underscore","chartlib/ui/collapsibleview"],function(d,f,e,c,b){var a=b.extend({collapsed:false,constructor:function(){this.collapsible=[];
if(arguments[0].collapsed===true||arguments[0].collapsed==="true"){this.collapsed=true;}b.apply(this,arguments);},initialize:function(){this.header=this.$el.find(".header")[0];
this.collapsible.push(this.$el.find(".content"));this.icon=this.$el.find(".header > .arrow");this.render();}});return a;});
