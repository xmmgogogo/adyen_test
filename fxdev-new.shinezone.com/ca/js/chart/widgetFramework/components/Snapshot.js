define("chart/widgetFramework/components/Snapshot",["jqueryExtended","underscore","d3","chartutil/svgutils","timeline/util/timelineConstants","ui/UIConstants"],function(g,c,f,e,b,d){var a=function(h){var i={};
i.init=function(){var j=h.getNode();var n=this.getParameters(h);var k=n.options;this.id=j.attr("id");this.$el=j;this.snapshotEl=k.snapshotEl;
this.styleSheets=k.styleSheets;this.title=(k.title)?k.title:"chartImage";this.htmlStr=(k.htmlStr)?k.htmlStr:"";this.htmlWidth=(k.htmlWidth)?k.htmlWidth:0;
var m=k.timeline;var l=g(m);l.widget().then(function(o){var p=o.instance;p.renderPromise.done(function(){i.timeline=p.timeline;
});});};i.getParameters=function(j){var m=j.getNode().data();var k;if(c.keys(m).length){k=m;}else{j.parameters.options=g.parseJSON(j.parameters.options);
k=j.parameters;}var l={};if(c.keys(k).length){l.options=k.options;}else{throw"The parameters are not well defined"+k;}return l;
};i.setActionCommander=function(j){this.ac=j;};i.getInstance=function(){return this;};i.takeSnapshot=function(l){var k;var m;
var n=this.title;if(this.timeline){k=f.time.format(b.__FORMAT_DATE)(this.timeline.getDates()[0]);var j=new Date(this.timeline.getDates()[1]);
j.setDate(j.getDate()-1);m=f.time.format(b.__FORMAT_DATE)(j);}if(this.timeline){n+=": "+k+" - "+m;}e.svgToPng(this.snapshotEl,this.styleSheets,n,this.title,this.htmlStr,this.htmlWidth);
};i.setHtmlStr=function(j){this.htmlStr=j;};i.init();h.ready();return i;};return a;});