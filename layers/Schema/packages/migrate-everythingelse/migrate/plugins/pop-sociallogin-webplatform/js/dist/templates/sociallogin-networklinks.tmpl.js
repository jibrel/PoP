!function(){var l=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["sociallogin-networklinks"]=l({1:function(l,a,n,e,t,s,o){var u,i,r=null!=a?a:l.nullContext||{},c=n.helperMissing,h="function",d=l.escapeExpression,p=l.lambda;return"\t\t<a "+(null!=(u=(n.generateId||a&&a.generateId||c).call(r,{name:"generateId",hash:{group:"links",context:o[1]},fn:l.program(2,t,0,s,o),inverse:l.noop,data:t}))?u:"")+' rel="nofollow" href="#" title="'+d((i=null!=(i=n.title||(null!=a?a.title:a))?i:c,typeof i===h?i.call(r,{name:"title",hash:{},data:t}):i))+'" data-provider="'+d((i=null!=(i=n.id||(null!=a?a.id:a))?i:c,typeof i===h?i.call(r,{name:"id",hash:{},data:t}):i))+'" data-url="'+(null!=(i=null!=(i=n.url||(null!=a?a.url:a))?i:c,u=typeof i===h?i.call(r,{name:"url",hash:{},data:t}):i)?u:"")+'" class="'+d(p(null!=(u=null!=o[1]?o[1].classes:o[1])?u.link:u,a))+" socialmedia-"+d((i=null!=(i=n["short-name"]||(null!=a?a["short-name"]:a))?i:c,typeof i===h?i.call(r,{name:"short-name",hash:{},data:t}):i))+'" style="'+d(p(null!=(u=null!=o[1]?o[1].styles:o[1])?u.link:u,a))+'">\n\t\t\t<i class="fa '+d((i=null!=(i=n.fontawesome||(null!=a?a.fontawesome:a))?i:c,typeof i===h?i.call(r,{name:"fontawesome",hash:{},data:t}):i))+'"></i>'+d((i=null!=(i=n.title||(null!=a?a.title:a))?i:c,typeof i===h?i.call(r,{name:"title",hash:{},data:t}):i))+"\n\t\t</a>\n"},2:function(l,a,n,e,t,s,o){return l.escapeExpression(l.lambda(null!=o[1]?o[1].id:o[1],a))},compiler:[7,">= 4.0.0"],main:function(l,a,n,e,t,s,o){var u,i,r=null!=a?a:l.nullContext||{},c=n.helperMissing,h=l.escapeExpression;return'<div class="'+h((i=null!=(i=n.class||(null!=a?a.class:a))?i:c,"function"==typeof i?i.call(r,{name:"class",hash:{},data:t}):i))+'" style="'+h((i=null!=(i=n.style||(null!=a?a.style:a))?i:c,"function"==typeof i?i.call(r,{name:"style",hash:{},data:t}):i))+'">\n'+(null!=(u=n.each.call(r,null!=a?a.networklinks:a,{name:"each",hash:{},fn:l.program(1,t,0,s,o),inverse:l.noop,data:t}))?u:"")+"</div>"},useData:!0,useDepths:!0})}();