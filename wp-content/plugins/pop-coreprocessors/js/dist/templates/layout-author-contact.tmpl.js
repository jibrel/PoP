!function(){var a=Handlebars.template,l=Handlebars.templates=Handlebars.templates||{};l["layout-author-contact"]=a({1:function(a,l,t,n,e,o,s){var r;return null!=(r=t.each.call(l,null!=l?l.contact:l,{name:"each",hash:{},fn:a.program(2,e,0,o,s),inverse:a.noop,data:e}))?r:""},2:function(a,l,t,n,e,o,s){var r,u=a.escapeExpression,c=t.helperMissing,i="function";return'		<div class="'+u(a.lambda(null!=s[2]?s[2]["class"]:s[2],l))+'">\n			<a href="'+u((r=null!=(r=t.url||(null!=l?l.url:l))?r:c,typeof r===i?r.call(l,{name:"url",hash:{},data:e}):r))+'" target="'+u((r=null!=(r=t.target||(null!=l?l.target:l))?r:c,typeof r===i?r.call(l,{name:"target",hash:{},data:e}):r))+'" title="'+u((r=null!=(r=t.tooltip||(null!=l?l.tooltip:l))?r:c,typeof r===i?r.call(l,{name:"tooltip",hash:{},data:e}):r))+'" class="contact-item">\n				<i class="fa '+u((r=null!=(r=t.fontawesome||(null!=l?l.fontawesome:l))?r:c,typeof r===i?r.call(l,{name:"fontawesome",hash:{},data:e}):r))+' fa-lg fa-fw"></i>'+u((r=null!=(r=t.text||(null!=l?l.text:l))?r:c,typeof r===i?r.call(l,{name:"text",hash:{},data:e}):r))+"\n			</a>\n		</div>\n"},compiler:[7,">= 4.0.0"],main:function(a,l,t,n,e,o,s){var r;return null!=(r=t["with"].call(l,null!=l?l.itemObject:l,{name:"with",hash:{},fn:a.program(1,e,0,o,s),inverse:a.noop,data:e}))?r:""},useData:!0,useDepths:!0})}();