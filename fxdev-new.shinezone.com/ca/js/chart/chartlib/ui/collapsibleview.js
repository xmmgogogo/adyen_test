define("chartlib/ui/collapsibleview",["jquery","underscore","backbone","chartutil/cssutils"],function(d,c,e,b){var a=e.View.extend({header:null,collapsible:[],collapsed:true,icon:null,speed:"",defaultSpeed:"slow",initialize:function(){c.bindAll(this,"disable","setSpeed");
this.setSpeed(this.defaultSpeed);},render:function(){var g=this,f=d(this.collapsible);this.setCollapsed(this.collapsed);d(this.header).on("click",d.proxy(function(h){this.collapsed=!this.collapsed;
if(this.collapsed){d(this).trigger("close");d.each(f,function(j,k){d(k).stop(false,true);d(k).slideUp({duration:g.speed,complete:function(){d(this).trigger("closed");
g.setSpeed(g.defaultSpeed);}});});}else{d(this).trigger("open");d.each(f,function(j,k){d(k).stop(false,true);d(k).slideDown({duration:g.speed,complete:function(){d(this).trigger("opened");
g.setSpeed(g.defaultSpeed);}});});}if(this.icon){this.updateIcon(this.collapsed);}},this));},setCollapsed:function(g){var f=d(this.collapsible);
if(g){d.each(f,function(h,j){d(j).hide();});}if(this.icon){this.updateIcon(this.collapsed);}},updateIcon:function(g){var f=(g)?0:180;
b.rotateElement(this.icon,f,0.5,0.5);},disable:function(){d(this.header).css("cursor","default");d(this.header).off();d(this.icon).hide();
},setSpeed:function(f){this.speed=f;}});return a;});