!function(){var l=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["layout-tag"]=l({1:function(l,n,a,t,e,u,s){var o,r,i=null!=n?n:l.nullContext||{},m=a.helperMissing,c=l.escapeExpression,p=l.lambda;return'\t<a href="'+c((r=null!=(r=a.url||(null!=n?n.url:n))?r:m,"function"==typeof r?r.call(i,{name:"url",hash:{},data:e}):r))+'" class="'+c(p(null!=s[1]?s[1].class:s[1],n))+'" style="'+c(p(null!=s[1]?s[1].style:s[1],n))+'">\n\t\t<'+c(p(null!=s[1]?s[1]["html-tag"]:s[1],n))+">\n\t\t\t"+(null!=(r=null!=(r=a.symbol||(null!=n?n.symbol:n))?r:m,o="function"==typeof r?r.call(i,{name:"symbol",hash:{},data:e}):r)?o:"")+(null!=(r=null!=(r=a.namedescription||(null!=n?n.namedescription:n))?r:m,o="function"==typeof r?r.call(i,{name:"namedescription",hash:{},data:e}):r)?o:"")+"\n\t\t</"+c(p(null!=s[1]?s[1]["html-tag"]:s[1],n))+">\n\t</a>\n"},compiler:[7,">= 4.0.0"],main:function(l,n,a,t,e,u,s){var o;return null!=(o=a.with.call(null!=n?n:l.nullContext||{},null!=n?n.dbObject:n,{name:"with",hash:{},fn:l.program(1,e,0,u,s),inverse:l.noop,data:e}))?o:""},useData:!0,useDepths:!0})}();