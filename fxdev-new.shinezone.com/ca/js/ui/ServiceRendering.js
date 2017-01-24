define("ui/ServiceRendering",["jqueryExtended","util/Ajax","util/Template","util/QueryString"],function(e,c,d,b){function a(f){f.ready();
var g=this.$node=f.getNode();var h=this.templates={};g.find('script[type="text/template"]').each(function(){var i=e(this);
var j=i.attr("data-template-id")||"main";h[j]=i.html();});if(typeof h.main!=="string"){throw new Error("At least one template should be defined");
}g.html('<div><i class="icon-clock-o"></i></div>');this._render();}a.prototype._render=function(){var f=this;c.getJSON(f.$node.attr("data-service-url")).then(function(g){f.handleData(g);
},function(g){f.handleError(g);});};a.prototype.handleData=function(f){var g=this;f.adyen=f.adyen||adyen;d.render({template:g.templates.main,partials:g.templates,context:f,node:g.$node}).fail(function(h){g.$node.html("Error rendering template");
}).then(function(){g.$node.trigger("csrcontentmerged");});};a.prototype.getParameters=function(){var f=this.$node.attr("data-service-url").split("?");
var g=f[1]||"";return b.parse(g);};a.prototype.setParameter=function(f,g){var h=this.$node.attr("data-service-url").split("?");
var i=b.parse(h[1]||"");i[f]=g;this.$node.attr("data-service-url",h[0]+"?"+b.stringify(i));this._render();};a.prototype.handleError=function(f){this.$node.html('<div class="csr-notification-message-2 warning">Error loading data</div>');
};return a;});