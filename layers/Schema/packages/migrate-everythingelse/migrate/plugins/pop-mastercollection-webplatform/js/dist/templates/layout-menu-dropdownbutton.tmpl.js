!function(){var l=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["layout-menu-dropdownbutton"]=l({1:function(l,n,t,a,e){var s;return l.escapeExpression((s=null!=(s=t.id||(null!=n?n.id:n))?s:t.helperMissing,"function"==typeof s?s.call(null!=n?n:l.nullContext||{},{name:"id",hash:{},data:e}):s))},3:function(l,n,t,a,e){var s,u=l.lambda,r=l.escapeExpression;return'\t\t<div class="dropdown-menu"><ul class="'+r(u(null!=(s=null!=n?n.classes:n)?s["dropdown-menu"]:s,n))+'" style="'+r(u(null!=(s=null!=n?n.styles:n)?s["dropdown-menu"]:s,n))+'" role="menu">\n'},5:function(l,n,t,a,e){var s,u=l.lambda,r=l.escapeExpression;return'\t\t<ul class="dropdown-menu '+r(u(null!=(s=null!=n?n.classes:n)?s["dropdown-menu"]:s,n))+'" style="'+r(u(null!=(s=null!=n?n.styles:n)?s["dropdown-menu"]:s,n))+'" role="menu">\n'},7:function(l,n,t,a,e,s,u){var r,o,i=null!=n?n:l.nullContext||{},d=t.helperMissing,c=l.escapeExpression,p=l.lambda;return'\t\t\t<li id="menu-item-'+c((t.lastGeneratedId||n&&n.lastGeneratedId||d).call(i,{name:"lastGeneratedId",hash:{context:u[1]},data:e}))+"-"+c((o=null!=(o=t.id||(null!=n?n.id:n))?o:d,"function"==typeof o?o.call(i,{name:"id",hash:{},data:e}):o))+"\" class='"+c(p(null!=(r=null!=u[1]?u[1].classes:u[1])?r.item:r,n))+" "+c((o=null!=(o=t.classes||(null!=n?n.classes:n))?o:d,"function"==typeof o?o.call(i,{name:"classes",hash:{},data:e}):o))+"' style=\""+c(p(null!=(r=null!=u[1]?u[1].styles:u[1])?r.item:r,n))+'">\n'+(null!=(r=(t.compare||n&&n.compare||d).call(i,null!=n?n.title:n,"divider",{name:"compare",hash:{},fn:l.program(8,e,0,s,u),inverse:l.program(10,e,0,s,u),data:e}))?r:"")+"\t\t\t</li>\n"},8:function(l,n,t,a,e){return"\t\t\t\t\t<hr />\n"},10:function(l,n,t,a,e){var s,u,r=null!=n?n:l.nullContext||{},o=t.helperMissing,i=l.escapeExpression;return'\t\t\t\t\t<a href="'+i((u=null!=(u=t.url||(null!=n?n.url:n))?u:o,"function"==typeof u?u.call(r,{name:"url",hash:{},data:e}):u))+'" title="'+i((u=null!=(u=t.alt||(null!=n?n.alt:n))?u:o,"function"==typeof u?u.call(r,{name:"alt",hash:{},data:e}):u))+'" '+(null!=(u=null!=(u=t["additional-attrs"]||(null!=n?n["additional-attrs"]:n))?u:o,s="function"==typeof u?u.call(r,{name:"additional-attrs",hash:{},data:e}):u)?s:"")+">"+(null!=(u=null!=(u=t.title||(null!=n?n.title:n))?u:o,s="function"==typeof u?u.call(r,{name:"title",hash:{},data:e}):u)?s:"")+"</a>\n"},12:function(l,n,t,a,e){return"\t\t</ul></div>\n"},14:function(l,n,t,a,e){return"\t\t</ul>\n"},compiler:[7,">= 4.0.0"],main:function(l,n,t,a,e,s,u){var r,o,i,d=l.lambda,c=l.escapeExpression,p=null!=n?n:l.nullContext||{},m=t.helperMissing,f='<div class="'+c(d(null!=(r=null!=n?n.classes:n)?r["dropdown-btn"]:r,n))+" "+c((o=null!=(o=t.class||(null!=n?n.class:n))?o:m,"function"==typeof o?o.call(p,{name:"class",hash:{},data:e}):o))+'" style="'+c(d(null!=(r=null!=n?n.styles:n)?r["dropdown-btn"]:r,n))+c((o=null!=(o=t.style||(null!=n?n.style:n))?o:m,"function"==typeof o?o.call(p,{name:"style",hash:{},data:e}):o))+'" ';return o=null!=(o=t.generateId||(null!=n?n.generateId:n))?o:m,i={name:"generateId",hash:{},fn:l.program(1,e,0,s,u),inverse:l.noop,data:e},r="function"==typeof o?o.call(p,i):o,t.generateId||(r=t.blockHelperMissing.call(n,r,i)),null!=r&&(f+=r),f+'>\n\t<button type="button" class="'+c(d(null!=(r=null!=n?n.classes:n)?r.btn:r,n))+' dropdown-toggle" style="'+c(d(null!=(r=null!=n?n.styles:n)?r.btn:r,n))+'" data-toggle="dropdown" aria-expanded="false">\n\t\t'+(null!=(r=d(null!=(r=null!=n?n.titles:n)?r.btn:r,n))?r:"")+"\n\t</button>\n"+(null!=(r=t.if.call(p,null!=n?n["inner-list"]:n,{name:"if",hash:{},fn:l.program(3,e,0,s,u),inverse:l.program(5,e,0,s,u),data:e}))?r:"")+(null!=(r=t.each.call(p,null!=(r=null!=n?n.dbObject:n)?r.items:r,{name:"each",hash:{},fn:l.program(7,e,0,s,u),inverse:l.noop,data:e}))?r:"")+(null!=(r=t.if.call(p,null!=n?n["inner-list"]:n,{name:"if",hash:{},fn:l.program(12,e,0,s,u),inverse:l.program(14,e,0,s,u),data:e}))?r:"")+"</div>"},useData:!0,useDepths:!0})}();