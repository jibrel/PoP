!function(){var l=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["layout-linkframe"]=l({1:function(l,n,t,a,e,s,r){var u,i,o=null!=n?n:l.nullContext||{},c=t.helperMissing,p=l.escapeExpression,d=l.lambda;return"\t<div "+(null!=(u=(t.generateId||n&&n.generateId||c).call(o,{name:"generateId",hash:{context:r[1]},fn:l.program(2,e,0,s,r),inverse:l.noop,data:e}))?u:"")+">\n"+(null!=(u=t.if.call(o,null!=r[1]?r[1]["print-source"]:r[1],{name:"if",hash:{},fn:l.program(4,e,0,s,r),inverse:l.noop,data:e}))?u:"")+'\t\t<p class="btn-group">\n'+(null!=(u=t.if.call(o,(t.and||n&&n.and||c).call(o,null!=r[1]?r[1]["show-frame-in-collapse"]:r[1],null!=n?n["is-link-embeddable"]:n,{name:"and",hash:{},data:e}),{name:"if",hash:{},fn:l.program(6,e,0,s,r),inverse:l.noop,data:e}))?u:"")+'\t\t\t<a href="'+p((i=null!=(i=t.link||(null!=n?n.link:n))?i:c,"function"==typeof i?i.call(o,{name:"link",hash:{},data:e}):i))+'" class="'+p(d(null!=(u=null!=r[1]?r[1].classes:r[1])?u["opennewtab-btn"]:u,n))+'" style="'+p(d(null!=(u=null!=r[1]?r[1].styles:r[1])?u["opennewtab-btn"]:u,n))+'" target="_blank"><i class="fa fa-fw fa-external-link"></i>'+p(d(null!=(u=null!=r[1]?r[1].titles:r[1])?u.opennewtab:u,n))+"</a>\n\t\t</p>\n"+(null!=(u=t.if.call(o,null!=n?n["is-link-embeddable"]:n,{name:"if",hash:{},fn:l.program(8,e,0,s,r),inverse:l.noop,data:e}))?u:"")+"\t</div>\n"},2:function(l,n,t,a,e,s,r){return l.escapeExpression(l.lambda(null!=r[1]?r[1].id:r[1],n))},4:function(l,n,t,a,e,s,r){var u,i,o=null!=n?n:l.nullContext||{},c=t.helperMissing,p=l.escapeExpression;return"\t\t\t<p>\n\t\t\t\t"+(null!=(u=l.lambda(null!=(u=null!=r[1]?r[1].titles:r[1])?u.source:u,n))?u:"")+' <a href="'+p((i=null!=(i=t.link||(null!=n?n.link:n))?i:c,"function"==typeof i?i.call(o,{name:"link",hash:{},data:e}):i))+'" target="_blank">'+p((i=null!=(i=t.link||(null!=n?n.link:n))?i:c,"function"==typeof i?i.call(o,{name:"link",hash:{},data:e}):i))+"</a>\n\t\t\t</p>\n"},6:function(l,n,t,a,e,s,r){var u,i=l.escapeExpression,o=l.lambda;return'\t\t\t\t<a href="#'+i((t.lastGeneratedId||n&&n.lastGeneratedId||t.helperMissing).call(null!=n?n:l.nullContext||{},{name:"lastGeneratedId",hash:{context:r[1]},data:e}))+' > .collapse" class="'+i(o(null!=(u=null!=r[1]?r[1].classes:r[1])?u["loadlink-btn"]:u,n))+'" style="'+i(o(null!=(u=null!=r[1]?r[1].styles:r[1])?u["loadlink-btn"]:u,n))+'" data-toggle="collapse"><i class="fa fa-fw fa-link"></i>'+i(o(null!=(u=null!=r[1]?r[1].titles:r[1])?u.loadlink:u,n))+"</a>\n"},8:function(l,n,t,a,e,s,r){var u;return null!=(u=t.if.call(null!=n?n:l.nullContext||{},null!=r[1]?r[1]["show-frame-in-collapse"]:r[1],{name:"if",hash:{},fn:l.program(9,e,0,s,r),inverse:l.program(12,e,0,s,r),data:e}))?u:""},9:function(l,n,t,a,e,s,r){var u,i=l.lambda,o=l.escapeExpression,c=null!=n?n:l.nullContext||{},p=t.helperMissing;return'\t\t\t\t<div class="collapse '+o(i(null!=(u=null!=r[1]?r[1].classes:r[1])?u.collapse:u,n))+'" style="'+o(i(null!=(u=null!=r[1]?r[1].styles:r[1])?u.collapse:u,n))+'"></div>\n\t\t\t\t<script type="text/javascript">\n\t\t\t\t(function($){\n\t\t\t\t\tvar collapse = $("#'+o((t.lastGeneratedId||n&&n.lastGeneratedId||p).call(c,{name:"lastGeneratedId",hash:{context:r[1]},data:e}))+"\").children('.collapse');\n\t\t\t\t\tcollapse.one('show.bs.collapse', function() { \n\t\t\t\t\t\tcollapse.html('"+(null!=(u=(t.withModule||n&&n.withModule||p).call(c,r[1],"layout",{name:"withModule",hash:{},fn:l.program(10,e,0,s,r),inverse:l.noop,data:e}))?u:"")+"'); \n\t\t\t\t\t});\n\t\t\t\t})(jQuery);\n\t\t\t\t<\/script>\n"},10:function(l,n,t,a,e,s,r){return l.escapeExpression((t.enterModule||n&&n.enterModule||t.helperMissing).call(null!=n?n:l.nullContext||{},r[2],{name:"enterModule",hash:{},data:e}))},12:function(l,n,t,a,e,s,r){var u;return"\t\t\t\t"+(null!=(u=(t.withModule||n&&n.withModule||t.helperMissing).call(null!=n?n:l.nullContext||{},r[1],"layout",{name:"withModule",hash:{},fn:l.program(10,e,0,s,r),inverse:l.noop,data:e}))?u:"")+"\n"},compiler:[7,">= 4.0.0"],main:function(l,n,t,a,e,s,r){var u;return null!=(u=t.with.call(null!=n?n:l.nullContext||{},null!=n?n.dbObject:n,{name:"with",hash:{},fn:l.program(1,e,0,s,r),inverse:l.noop,data:e}))?u:""},useData:!0,useDepths:!0})}();