define("charts/mobileConversion/js/views/ui/deviceShareUI",["jquery","underscore","backbone","chartlib/ui/baseui","chartlib/chartBaseEvents"],function(d,b,f,c,e){var a=c.extend({events:{"click .sort-device-button":"sortOnDevice","click .sort-share-button":"sortOnShare","click .sort-atv-button":"sortOnAtv"},initialize:function(){this.listenTo(this.collection,"reset",this.render);
f.on(e.RENDER_BUTTONS,this.renderButtons,this);this.deviceButton=this.$(".sort-device-button");this.shareButton=this.$(".sort-share-button");
this.atvButton=this.$(".sort-atv-button");this.buttons.push(this.deviceButton);this.buttons.push(this.shareButton);this.buttons.push(this.atvButton);
},sortOnDevice:function(g){this.collection.sortByName();this.renderButtons(d(g.currentTarget));},sortOnShare:function(g){this.collection.sortByPerc();
this.renderButtons(d(g.currentTarget));},sortOnAtv:function(g){this.collection.sortByAtv();this.renderButtons(d(g.currentTarget));
}});return a;});