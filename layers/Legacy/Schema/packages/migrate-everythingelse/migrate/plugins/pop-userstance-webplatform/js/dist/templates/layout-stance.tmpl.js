!function(){var l=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["layout-stance"]=l({1:function(l,n,a,t,e,s,u){var r,c,o=l.lambda,i=l.escapeExpression;return'\t<div class="layoutstance '+i(o(null!=u[1]?u[1].class:u[1],n))+'" style="'+i(o(null!=u[1]?u[1].style:u[1],n))+'">\n\t\t'+(null!=(r=o(null!=(r=null!=u[1]?u[1].titles:u[1])?r.stance:r,n))?r:"")+" <strong>"+(null!=(c=null!=(c=a["cat-name"]||(null!=n?n["cat-name"]:n))?c:a.helperMissing,r="function"==typeof c?c.call(null!=n?n:l.nullContext||{},{name:"cat-name",hash:{},data:e}):c)?r:"")+"</strong>\n\t</div>\n"},compiler:[7,">= 4.0.0"],main:function(l,n,a,t,e,s,u){var r;return null!=(r=a.with.call(null!=n?n:l.nullContext||{},null!=n?n.dbObject:n,{name:"with",hash:{},fn:l.program(1,e,0,s,u),inverse:l.noop,data:e}))?r:""},useData:!0,useDepths:!0})}();