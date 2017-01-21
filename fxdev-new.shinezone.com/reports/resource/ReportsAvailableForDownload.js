define("ca/reports/ReportsAvailableForDownload",["jqueryExtended","util/Ajax","util/Console"],function(f,e,c){var g=window.adyen=window.adyen||{},d={};
g.config=g.config||{};function a(){f("[data-download-available]").each(function(){var j=f(this),i=j.attr("data-download-available");
var h=d&&d[i]&&d[i].available||"";j.html('<span title="'+h+'">'+(h>99?"99+":h)+"</span>");if(h>0){j.show();}else{j.hide();
}});}function b(){if(g.config.downloadableReportsUrl){var h=g.config.downloadableReportsUrl;h+=(h.indexOf("?")>-1?"&_=":"?_=")+new Date().getTime();
e.getJSON(h).then(function(i){d=i;a();}).fail(function(i){c.log("Error: ",i);});}else{c.log("Download URL is not available");
}}return{init:b,updateUI:a};});