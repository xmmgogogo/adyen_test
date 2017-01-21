define("chartlib/ui/snapshot",["jquery","underscore","backbone","d3","chartutil/svgutils","timeline/util/timelineConstants"],function(f,c,g,e,d,a){var b=g.View.extend({events:{click:"onClick"},initialize:function(h){c.bindAll(this,"onClick");
this.snapshotEl=h.snapshotEl;this.styleSheets=h.styleSheets;this.title=(h.title)?h.title:"chartImage";this.timeline=h.timeline;
},onClick:function(j){var i;var k;var l=this.title;if(this.timeline){i=e.time.format(a.__FORMAT_DATE)(this.timeline.getDates()[0]);
var h=new Date(this.timeline.getDates()[1]);h.setDate(h.getDate()-1);k=e.time.format(a.__FORMAT_DATE)(h);}if(this.timeline){l+=": "+i+" - "+k;
}d.svgToPng(this.snapshotEl,this.styleSheets,l,this.title);}});return b;});