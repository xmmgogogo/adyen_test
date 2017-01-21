define("chartutil/numberutils",["jqueryExtended"],function(b){var a={};a.decimalFormatter=function(e,c){c=typeof c!=="undefined"?c:1;
return(e.toFixed(c)%1)!==0?e.toFixed(c):Math.round(e);};a.zeroPad=function(c){var d=(typeof c==="number")?c:parseInt(c,10);
if(isNaN(d)){return c;}if(d>=10){return""+c;}if(d===0){return"00";}return"0"+c;};a.animateValue=function(h,m,j,g){var f=h.text(),e;
e=Number(f.replace(/[^0-9\-\.]/gi,""));var k={total:e};var l={total:m};var d;var c;c=function(){d=j(this.total);h.html(d);
};b(k).animate(l,{duration:1000,step:c,done:function(){d=j(l.total);h.html(d);}});};return a;},function(a){if(window.console&&typeof window.console.log==="function"){window.console.log("[Chart/Util/NumberUtils] Initialization error ",a);
}});