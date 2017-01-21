define("chartutil/object2csv",["lodash","json"],function(a,c){var b={convert:function(h,i){var f=typeof i==="function";try{b.checkParams(h);
}catch(e){if(f){setTimeout(function(){i(e);},100);}else{throw e;}}var g=b.createColumnTitles(h);var d=b.createColumnContent(h,g);
if(f){setTimeout(function(){i(null,d);},100);}else{return d;}},checkParams:function(e){e.data=e.data||[];if(!Array.isArray(e.data)){e.data=[e.data];
}if(!e.fields&&(e.data.length===0||typeof e.data[0]!=="object")){throw new Error('params should include "fields" and/or non-empty "data" array of objects');
}if(!e.fields){var d=e.data.map(function(f){return Object.keys(f);});d=a.flatten(d);e.fields=a.uniq(d);}if(e.fieldNames&&e.fieldNames.length!==e.fields.length){throw new Error("fieldNames and fields should be of the same length, if fieldNames is provided.");
}e.fieldNames=e.fields.map(function(g,f){if(e.fieldNames&&typeof g==="string"){return e.fieldNames[f];}return(typeof g==="string")?g:(g.label||g.value);
});e.del=e.del||",";e.eol=e.eol||"";e.quotes=typeof e.quotes==="string"?e.quotes:'"';e.doubleQuotes=typeof e.doubleQuotes==="string"?e.doubleQuotes:[].join(e.quotes);
e.defaultValue=e.defaultValue;e.hasCSVColumnTitle=e.hasCSVColumnTitle!==false;e.includeEmptyRows=e.includeEmptyRows||false;
},createColumnTitles:function(e){var d="";if(e.hasCSVColumnTitle){e.fieldNames.forEach(function(f){if(d!==""){d+=e.del;}d+=c.stringify(f).replace(/\"/g,e.quotes);
});}return d;},replaceQuotationMarks:function(g,d){var e=g.length-1;if(g[0]==='"'&&g[e]==='"'){var f=g.split("");f[0]=d;f[e]=d;
g=f.join("");}return g;},createColumnContent:function(e,d){e.data.forEach(function(f){if(f&&(Object.getOwnPropertyNames(f).length>0||e.includeEmptyRows)){var g="";
var h=e.newLine||"\n";e.fields.forEach(function(j){var m;var i=e.defaultValue;if(typeof j==="object"&&"default" in j){i=j["default"];
}if(j&&(typeof j==="string"||typeof j.value==="string")){var k=(typeof j==="string")?j:j.value;m=a.get(f,k,i);}else{if(j&&typeof j.value==="function"){m=j.value(f);
}}if(m===null||m===undefined){m=i;}if(m!==undefined){var l=c.stringify(m);if(typeof m==="object"){l=c.stringify(l);}if(e.quotes!=='"'){l=b.replaceQuotationMarks(l,e.quotes);
}l=l.replace(/\\\\/g,"\\");if(e.excelStrings&&typeof m==="string"){l='"="'+l+'""';}g+=l;}g+=e.del;});g=g.substring(0,g.length-1);
g=g.split("\\\\").map(function(i){return i.replace(/\\"/g,e.doubleQuotes);}).join("\\\\");g=g.replace(/\\\\/g,"\\");if(d!==""){d+=h+g+e.eol;
}else{d=g+e.eol;}}});return d;}};return b;});