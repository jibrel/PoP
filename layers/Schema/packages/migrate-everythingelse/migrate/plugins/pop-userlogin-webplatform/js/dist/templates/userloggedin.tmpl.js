!function(){var l=Handlebars.template;(Handlebars.templates=Handlebars.templates||{}).userloggedin=l({1:function(l,n,a,t,e){var s;return l.escapeExpression((s=null!=(s=a.id||(null!=n?n.id:n))?s:a.helperMissing,"function"==typeof s?s.call(null!=n?n:l.nullContext||{},{name:"id",hash:{},data:e}):s))},3:function(l,n,a,t,e){var s;return'\t\t\t<div class="media-left">\n\t\t\t\t<div class="top-useravatar-container">\n'+(null!=(s=a.if.call(null!=n?n:l.nullContext||{},null!=n?n["add-link"]:n,{name:"if",hash:{},fn:l.program(4,e,0),inverse:l.program(6,e,0),data:e}))?s:"")+"\t\t\t\t</div>\n\t\t\t</div>\n"},4:function(l,n,a,t,e){var s,u=l.lambda,r=l.escapeExpression;return'\t\t\t\t\t\t<a href="'+r(u(null!=(s=null!=(s=null!=n?n.sessionmeta:n)?s.user:s)?s.url:s,n))+'" class="pop-user-url user-avatar thumbnail '+r(u(null!=(s=null!=n?n.tls:n)?s["domain-id"]:s,n))+'">\n\t\t\t\t\t\t\t<img src="'+r(u(null!=(s=null!=(s=null!=n?n.sessionmeta:n)?s.user:s)?s.avatar:s,n))+'" class="pop-user-avatar '+r(u(null!=(s=null!=n?n.tls:n)?s["domain-id"]:s,n))+'">\n\t\t\t\t\t\t</a>\n'},6:function(l,n,a,t,e){var s,u=l.lambda,r=l.escapeExpression;return'\t\t\t\t\t\t<img src="'+r(u(null!=(s=null!=(s=null!=n?n.sessionmeta:n)?s.user:s)?s.avatar:s,n))+'" class="pop-user-avatar '+r(u(null!=(s=null!=n?n.tls:n)?s["domain-id"]:s,n))+'">\n'},8:function(l,n,a,t,e){var s,u=l.lambda,r=l.escapeExpression;return'\t\t\t\t\t<a href="'+r(u(null!=(s=null!=(s=null!=n?n.sessionmeta:n)?s.user:s)?s.url:s,n))+'" class="pop-user-url '+r(u(null!=(s=null!=n?n.tls:n)?s["domain-id"]:s,n))+'">\n\t\t\t\t\t\t<span class="pop-user-name '+r(u(null!=(s=null!=n?n.tls:n)?s["domain-id"]:s,n))+'">'+(null!=(s=u(null!=(s=null!=(s=null!=n?n.sessionmeta:n)?s.user:s)?s.name:s,n))?s:"")+"</span>\n\t\t\t\t\t</a>\n"},10:function(l,n,a,t,e){var s,u=l.lambda;return'\t\t\t\t\t<span class="pop-user-name '+l.escapeExpression(u(null!=(s=null!=n?n.tls:n)?s["domain-id"]:s,n))+'">'+(null!=(s=u(null!=(s=null!=(s=null!=n?n.sessionmeta:n)?s.user:s)?s.name:s,n))?s:"")+"</span>\n"},compiler:[7,">= 4.0.0"],main:function(l,n,a,t,e){var s,u,r,i=null!=n?n:l.nullContext||{},m=a.helperMissing,o="function",d=l.escapeExpression,p=l.lambda,c='<div class="'+d((u=null!=(u=a.class||(null!=n?n.class:n))?u:m,typeof u===o?u.call(i,{name:"class",hash:{},data:e}):u))+" visible-loggedin-"+d(p(null!=(s=null!=n?n.tls:n)?s["domain-id"]:s,n))+'" style="'+d((u=null!=(u=a.style||(null!=n?n.style:n))?u:m,typeof u===o?u.call(i,{name:"style",hash:{},data:e}):u))+'" ';return u=null!=(u=a.generateId||(null!=n?n.generateId:n))?u:m,r={name:"generateId",hash:{},fn:l.program(1,e,0),inverse:l.noop,data:e},s=typeof u===o?u.call(i,r):u,a.generateId||(s=a.blockHelperMissing.call(n,s,r)),null!=s&&(c+=s),c+'>\n\t<div class="media">\n'+(null!=(s=a.if.call(i,null!=n?n["add-useravatar"]:n,{name:"if",hash:{},fn:l.program(3,e,0),inverse:l.noop,data:e}))?s:"")+'\t\t<div class="media-body">\n\t\t\t<'+d((u=null!=(u=a["name-htmlmarkup"]||(null!=n?n["name-htmlmarkup"]:n))?u:m,typeof u===o?u.call(i,{name:"name-htmlmarkup",hash:{},data:e}):u))+' class="media-heading">\n\t\t\t\t<small>'+(null!=(s=p(null!=(s=null!=n?n.titles:n)?s.top:s,n))?s:"")+"</small><br/>\n"+(null!=(s=a.if.call(i,null!=n?n["add-link"]:n,{name:"if",hash:{},fn:l.program(8,e,0),inverse:l.program(10,e,0),data:e}))?s:"")+"\t\t\t</"+d((u=null!=(u=a["name-htmlmarkup"]||(null!=n?n["name-htmlmarkup"]:n))?u:m,typeof u===o?u.call(i,{name:"name-htmlmarkup",hash:{},data:e}):u))+">\n\t\t\t"+(null!=(s=p(null!=(s=null!=n?n.titles:n)?s.bottom:s,n))?s:"")+"\n\t\t</div>\n\t</div>\n</div>"},useData:!0})}();