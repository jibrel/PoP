!function(){var l=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["layout-postthumb"]=l({1:function(l,n,t,e,a,s,u){var i;return null!=(i=(t.withSublevel||n&&n.withSublevel||t.helperMissing).call(null!=n?n:l.nullContext||{},null!=(i=null!=u[1]?u[1].thumb:u[1])?i.name:i,{name:"withSublevel",hash:{},fn:l.program(2,a,0,s,u),inverse:l.noop,data:a}))?i:""},2:function(l,n,t,e,a,s,u){var i,r,h=l.lambda,o=l.escapeExpression,c=null!=n?n:l.nullContext||{},p=t.helperMissing;return'\t\t<div class="post-thumb '+o(h(null!=u[2]?u[2].class:u[2],n))+'" style="'+o(h(null!=u[2]?u[2].style:u[2],n))+'">\n\t\t\t<a href="'+o((t.get||n&&n.get||p).call(c,u[1],null!=u[2]?u[2]["url-field"]:u[2],{name:"get",hash:{},data:a}))+'" class="'+o(h(null!=(i=null!=u[2]?u[2].classes:u[2])?i.link:i,n))+'" style="'+o(h(null!=(i=null!=u[2]?u[2].styles:u[2])?i.link:i,n))+'" target="'+o(h(null!=u[2]?u[2]["link-target"]:u[2],n))+'" '+(null!=(i=t.each.call(c,null!=u[2]?u[2]["itemobject-params"]:u[2],{name:"each",hash:{},fn:l.program(3,a,0,s,u),inverse:l.noop,data:a}))?i:"")+'>\n\t\t\t\t<img src="'+o((r=null!=(r=t.src||(null!=n?n.src:n))?r:p,"function"==typeof r?r.call(c,{name:"src",hash:{},data:a}):r))+'" class="'+o(h(null!=(i=null!=u[2]?u[2].classes:u[2])?i.img:i,n))+'" style="'+o(h(null!=(i=null!=u[2]?u[2].styles:u[2])?i.img:i,n))+'" alt="'+(null!=(i=h(null!=u[1]?u[1].title:u[1],n))?i:"")+'" width="'+o((r=null!=(r=t.width||(null!=n?n.width:n))?r:p,"function"==typeof r?r.call(c,{name:"width",hash:{},data:a}):r))+'" height="'+o((r=null!=(r=t.height||(null!=n?n.height:n))?r:p,"function"==typeof r?r.call(c,{name:"height",hash:{},data:a}):r))+'">\n\t\t\t</a>\n\t\t\t'+(null!=(i=t.if.call(c,null!=n?n.description:n,{name:"if",hash:{},fn:l.program(5,a,0,s,u),inverse:l.noop,data:a}))?i:"")+"\n"+(null!=(i=t.if.call(c,null!=(i=null!=u[2]?u[2]["template-ids"]:u[2])?i["thumb-extras"]:i,{name:"if",hash:{},fn:l.program(7,a,0,s,u),inverse:l.noop,data:a}))?i:"")+"\t\t</div>\n"},3:function(l,n,t,e,a,s,u){var i,r=null!=n?n:l.nullContext||{},h=t.helperMissing,o=l.escapeExpression;return" "+o((i=null!=(i=t.key||a&&a.key)?i:h,"function"==typeof i?i.call(r,{name:"key",hash:{},data:a}):i))+'="'+o((t.get||n&&n.get||h).call(r,u[2],n,{name:"get",hash:{},data:a}))+'"'},5:function(l,n,t,e,a){var s;return'<p class="post-thumb-description"><small>'+l.escapeExpression((s=null!=(s=t.description||(null!=n?n.description:n))?s:t.helperMissing,"function"==typeof s?s.call(null!=n?n:l.nullContext||{},{name:"description",hash:{},data:a}):s))+"</small></p>"},7:function(l,n,t,e,a,s,u){var i,r=l.lambda,h=l.escapeExpression;return'\t\t\t\t<div class="'+h(r(null!=(i=null!=u[2]?u[2].classes:u[2])?i["thumb-extras"]:i,n))+'" style="'+h(r(null!=(i=null!=u[2]?u[2].styles:u[2])?i["thumb-extras"]:i,n))+'">\n'+(null!=(i=t.each.call(null!=n?n:l.nullContext||{},null!=(i=null!=u[2]?u[2]["template-ids"]:u[2])?i["thumb-extras"]:i,{name:"each",hash:{},fn:l.program(8,a,0,s,u),inverse:l.noop,data:a}))?i:"")+"\t\t\t\t</div>\n"},8:function(l,n,t,e,a,s,u){var i;return null!=(i=(t.withModule||n&&n.withModule||t.helperMissing).call(null!=n?n:l.nullContext||{},u[3],n,{name:"withModule",hash:{},fn:l.program(9,a,0,s,u),inverse:l.noop,data:a}))?i:""},9:function(l,n,t,e,a,s,u){return"\t\t\t\t\t\t\t"+l.escapeExpression((t.enterModule||n&&n.enterModule||t.helperMissing).call(null!=n?n:l.nullContext||{},u[4],{name:"enterModule",hash:{},data:a}))+"\n"},compiler:[7,">= 4.0.0"],main:function(l,n,t,e,a,s,u){var i;return null!=(i=t.with.call(null!=n?n:l.nullContext||{},null!=n?n.itemObject:n,{name:"with",hash:{},fn:l.program(1,a,0,s,u),inverse:l.noop,data:a}))?i:""},useData:!0,useDepths:!0})}();