!function(){var e=Handlebars.template,a=Handlebars.templates=Handlebars.templates||{};a.alert=e({1:function(e,a,n,l,t,i,s){var r,o,d=n.helperMissing,u=e.escapeExpression;return'	<div class="alert alert-message fade in cookie hidden" data-cookieid="cookie'+u((o=null!=(o=n.id||(null!=a?a.id:a))?o:d,"function"==typeof o?o.call(a,{name:"id",hash:{},data:t}):o))+'" '+(null!=(r=(n.generateId||a&&a.generateId||d).call(a,{name:"generateId",hash:{context:s[1]},fn:e.program(2,t,0,i,s),inverse:e.noop,data:t}))?r:"")+'>\n		<button type="button" class="close close-lg" title="'+u(e.lambda(null!=(r=null!=s[1]?s[1].titles:s[1])?r.dismiss:r,a))+'" data-dismiss="alert" aria-hidden="true">×</button>\n'+(null!=(r=(n.withModule||a&&a.withModule||d).call(a,s[1],"layout",{name:"withModule",hash:{},fn:e.program(4,t,0,i,s),inverse:e.noop,data:t}))?r:"")+"	</div>\n"},2:function(e,a,n,l,t,i,s){var r,o=e.escapeExpression;return o(e.lambda(null!=s[1]?s[1].id:s[1],a))+"-"+o((r=null!=(r=n.id||(null!=a?a.id:a))?r:n.helperMissing,"function"==typeof r?r.call(a,{name:"id",hash:{},data:t}):r))},4:function(e,a,n,l,t,i,s){return"			"+e.escapeExpression((n.enterModule||a&&a.enterModule||n.helperMissing).call(a,s[2],{name:"enterModule",hash:{},data:t}))+"\n"},compiler:[7,">= 4.0.0"],main:function(e,a,n,l,t,i,s){var r;return null!=(r=n["with"].call(a,null!=a?a.itemObject:a,{name:"with",hash:{},fn:e.program(1,t,0,i,s),inverse:e.noop,data:t}))?r:""},useData:!0,useDepths:!0})}();