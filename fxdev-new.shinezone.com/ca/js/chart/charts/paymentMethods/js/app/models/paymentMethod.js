define("pmc/models/paymentMethod",["jquery","underscore","backbone","backbonenested"],function(c,a,e,d){var b=e.NestedModel.extend({defaults:{pmName:"",total:0,conversionRates:[],order:0}});
return b;});