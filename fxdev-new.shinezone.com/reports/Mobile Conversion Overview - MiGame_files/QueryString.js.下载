define("util/QueryString",[],function(){function b(j,c){var g={},f,e,h,d,k;if(typeof j!=="string"){return g;}if(j.substring(0,1)==="?"){j=j.substring(1);
}f=j.split("&");while(f.length>0){e=f.shift();h=e.split("=");d=h.shift();k=h.join("=");try{if(c!==false){d=decodeURIComponent(d);
k=decodeURIComponent(k);}g[d]=k;}catch(i){}}return g;}function a(c,e){var f=[];for(var d in c){if(d&&c.hasOwnProperty(d)){if(e!==false){f.push(encodeURIComponent(d)+"="+encodeURIComponent(c[d]));
}else{f.push(d+"="+c[d]);}}}return f.join("&");}return{parse:b,stringify:a};});