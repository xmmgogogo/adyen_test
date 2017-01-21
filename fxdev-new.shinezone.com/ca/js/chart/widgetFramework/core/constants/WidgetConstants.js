define("chart/widgetFramework/core/constants/WidgetConstants",["jquery"],function(b){var a={HORIZONTAL:"horizontal",VERTICAL:"vertical",STACKED_HORIZONTAL:"stackHorizonta;",STACKED_VERTICAL:"stackVertical",FULL_HORIZONTAL:"fullHorizontal",FULL_VERTICAL:"fullVertical"};
a.getNamespaced=function(d,c){if(typeof d!=="string"){return d;}return d.split(/\s+/g).join("."+c+" ")+"."+c;};return a;});
