define("charts/mobileConversion/js/models/mobile",["jquery","underscore","backbone"],function(c,a,d){var b=d.NestedModel.extend({idAttribute:"name",defaults:{name:"",total:0,conversionRates:[],percentage:0}});
return b;});