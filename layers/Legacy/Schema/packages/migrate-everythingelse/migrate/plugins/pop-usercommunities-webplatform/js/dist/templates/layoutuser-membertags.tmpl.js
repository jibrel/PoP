!function(){var l=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["layoutuser-membertags"]=l({1:function(l,n,a,e,t,s,u){var r,i=l.lambda,m=l.escapeExpression,o=null!=n?n:l.nullContext||{};return'\t<span class="'+m(i(null!=u[1]?u[1].class:u[1],n))+'" style="'+m(i(null!=u[1]?u[1].style:u[1],n))+'">\n\t\t'+(null!=(r=a.if.call(o,null!=(r=null!=u[1]?u[1].titles:u[1])?r.description:r,{name:"if",hash:{},fn:l.program(2,t,0,s,u),inverse:l.noop,data:t}))?r:"")+m((a.labelize||n&&n.labelize||a.helperMissing).call(o,null!=n?n["membertags-byname"]:n,null!=(r=null!=u[1]?u[1].classes:u[1])?r.label:r,{name:"labelize",hash:{},data:t}))+"\n\t</span>\n"},2:function(l,n,a,e,t,s,u){var r;return(null!=(r=l.lambda(null!=(r=null!=u[1]?u[1].titles:u[1])?r.description:r,n))?r:"")+" "},compiler:[7,">= 4.0.0"],main:function(l,n,a,e,t,s,u){var r;return null!=(r=a.with.call(null!=n?n:l.nullContext||{},null!=n?n.dbObject:n,{name:"with",hash:{},fn:l.program(1,t,0,s,u),inverse:l.noop,data:t}))?r:""},useData:!0,useDepths:!0})}();