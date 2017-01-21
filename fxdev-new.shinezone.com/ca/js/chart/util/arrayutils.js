define("chartutil/arrayutils",[],function(){var a={};a.removeFrom=function(e,c,d){var b=a.findIndexByKeyValue(e,c,d);if(b>-1){return e.splice(b,(e.length-b));
}};a.findIndexByKeyValue=function(f,d,e){var b=f.length;for(var c=0;c<b;c++){if(f[c].get(d)===e){return c;}}return -1;};a.countElements=function(d){var e=[],c=[],g;
d.sort();for(var f=0;f<d.length;f++){if(d[f]!==g){e.push(d[f]);c.push(1);}else{c[c.length-1]++;}g=d[f];}return[e,c];};return a;
});