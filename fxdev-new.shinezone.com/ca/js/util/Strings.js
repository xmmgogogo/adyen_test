define("util/Strings",[],function(){function a(e){if(typeof e==="boolean"){return e;}else{if(typeof e==="string"){return e.match(/^(yes|1|true)$/i);
}}return false;}function b(e){if(typeof e==="boolean"){return !e;}else{if(typeof e==="string"){return e.match(/^(no|0|-1|false)$/i);
}}return false;}function d(e){if(typeof e!=="string"){return e;}return e.replace(/(^|\s+)\w/ig,function(f){return f.substring(0,f.length-1)+f.substring(f.length-1).toUpperCase();
});}function c(i,h,g,f){if(typeof i!=="string"||h<1||g<1){return null;}var e=f||"..";var j=i.trim();if(j.length<=h+g+e.length){return j;
}return j.substring(0,h)+e+j.substring(j.length-g);}return{isTrue:a,isFalse:b,capitalizeWords:d,condense:c};});