!function(){var e=Handlebars.template,n=Handlebars.templates=Handlebars.templates||{};n["script-append"]=e({1:function(e,n,a,t,l,r,o){var p,s,i=e.lambda,d=e.escapeExpression,u=a.helperMissing,c="function";return"	<script type=\"text/javascript\">\n	(function($){\n		$(document).one('template:merged', function() {\n			var destination = $('div.pop-append-"+d(i(null!=o[1]?o[1].itemObjectDBKey:o[1],n))+"-"+d((s=null!=(s=a.id||(null!=n?n.id:n))?s:u,typeof s===c?s.call(n,{name:"id",hash:{},data:l}):s))+"."+d(i(null!=(p=null!=o[1]?o[1].classes:o[1])?p.appendable:p,n))+"');\n			var controlClass = 'pop-appended-"+d(i(null!=o[1]?o[1].itemDBKey:o[1],n))+"-"+d((s=null!=(s=a.id||(null!=n?n.id:n))?s:u,typeof s===c?s.call(n,{name:"id",hash:{},data:l}):s))+"';\n			destination = destination.not('.'+controlClass);\n"+(null!=(p=a["if"].call(n,null!=o[1]?o[1]["do-append"]:o[1],{name:"if",hash:{},fn:e.program(2,l,0,r,o),inverse:e.noop,data:l}))?p:"")+"			destination.addClass(controlClass);\n		});\n	})(jQuery);\n	</script>\n"},2:function(e,n,a,t,l,r,o){var p,s=a.helperMissing;return"				var current = $('#"+e.escapeExpression((a.lastGeneratedId||n&&n.lastGeneratedId||s).call(n,{name:"lastGeneratedId",hash:{template:null!=o[1]?o[1]["frame-template"]:o[1],context:o[1]},data:l}))+"');	\n				var target = current.closest('.pop-lazyloaded-layout');\n"+(null!=(p=(a.withModule||n&&n.withModule||s).call(n,o[1],"layout",{name:"withModule",hash:{},fn:e.program(3,l,0,r,o),inverse:e.noop,data:l}))?p:"")+(null!=(p=(a.compare||n&&n.compare||s).call(n,null!=o[1]?o[1].operation:o[1],"append",{name:"compare",hash:{},fn:e.program(5,l,0,r,o),inverse:e.noop,data:l}))?p:"")+(null!=(p=(a.compare||n&&n.compare||s).call(n,null!=o[1]?o[1].operation:o[1],"replace",{name:"compare",hash:{},fn:e.program(7,l,0,r,o),inverse:e.noop,data:l}))?p:"")},3:function(e,n,a,t,l,r,o){return"					"+e.escapeExpression((a.enterModule||n&&n.enterModule||a.helperMissing).call(n,o[2],{name:"enterModule",hash:{},data:l}))+"\n"},5:function(e,n,a,t,l){return"					target.appendTo(destination);\n"},7:function(e,n,a,t,l){return"					destination.html(target);\n"},compiler:[7,">= 4.0.0"],main:function(e,n,a,t,l,r,o){var p;return null!=(p=a["with"].call(n,null!=n?n.itemObject:n,{name:"with",hash:{},fn:e.program(1,l,0,r,o),inverse:e.noop,data:l}))?p:""},useData:!0,useDepths:!0})}();