define("chartutil/backbone/r2d3app",["jquery","underscore","backbone","chartlib/chartBaseEvents"],function(b,a,e,d){var c=e.View.extend({defaults:{retryCounter:0},initialize:function(){this.fixIE8();
},fixIE8:function(){if(typeof window.SVGElement==="undefined"){b("#timelineHolder").remove();b("#timelineModeButtonsHolder").remove();
b("#timelineDatesHolder").remove();b("#calendarUI").css("margin","-35px 0 10px 0");a.bindAll(this,"checkDocumentBody","removeRaphaelDiv");
e.on(d.DATA_LOADED,this.checkDocumentBody);}},checkDocumentBody:function(){this.retryCounter=0;this.removeRaphaelDiv();},removeRaphaelDiv:function(){var g=this;
this.retryCounter++;var f=b('body > div[style*="CLIP"]').remove().length;if(f<1&&this.retryCounter<4){setTimeout(function(){g.removeRaphaelDiv();
},500);}}});return c;});