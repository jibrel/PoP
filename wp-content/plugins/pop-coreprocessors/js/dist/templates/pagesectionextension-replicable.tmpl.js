!function(){var e=Handlebars.template,t=Handlebars.templates=Handlebars.templates||{};t["pagesectionextension-replicable"]=e({1:function(e,t,a,n,l,r,i){var s;return null!=(s=(a.withBlock||t&&t.withBlock||a.helperMissing).call(t,i[1],t,{name:"withBlock",hash:{},fn:e.program(2,l,0,r,i),inverse:e.noop,data:l}))?s:""},2:function(e,t,a,n,l,r,i){var s,u,p=a.helperMissing,c=e.escapeExpression;return'		<a class="pop-interceptor" '+c((a.interceptAttr||t&&t.interceptAttr||p).call(t,{name:"interceptAttr",hash:{context:i[2]},data:l}))+" "+(null!=(s=(a.generateId||t&&t.generateId||p).call(t,{name:"generateId",hash:{group:"replicate-interceptor",targetId:null!=(s=null!=i[2]?i[2].pss:i[2])?s.pssId:s,context:i[2]},fn:e.program(3,l,0,r,i),inverse:e.noop,data:l}))?s:"")+" "+(null!=(s=a["if"].call(t,null!=i[2]?i[2]["intercept-skipstateupdate"]:i[2],{name:"if",hash:{},fn:e.program(5,l,0,r,i),inverse:e.noop,data:l}))?s:"")+' data-replicate-type="'+c((a.get||t&&t.get||p).call(t,null!=i[2]?i[2]["replicate-types"]:i[2],null!=t?t.template:t,{name:"get",hash:{},data:l}))+'" '+(null!=(s=(a.ifget||t&&t.ifget||p).call(t,null!=i[2]?i[2]["unique-urls"]:i[2],null!=t?t.template:t,{name:"ifget",hash:{},fn:e.program(7,l,0,r,i),inverse:e.noop,data:l}))?s:"")+' data-intercept-url="'+(null!=(s=(a.withSublevel||t&&t.withSublevel||p).call(t,null!=i[2]?i[2].template:i[2],{name:"withSublevel",hash:{context:null!=(s=null!=(s=null!=i[2]?i[2].pss:i[2])?s.feedback:s)?s["intercept-urls"]:s},fn:e.program(9,l,0,r,i),inverse:e.noop,data:l}))?s:"")+'" data-title="'+c((u=null!=(u=a.title||(null!=t?t.title:t))?u:p,"function"==typeof u?u.call(t,{name:"title",hash:{},data:l}):u))+'" data-block-settingsid="'+c(e.lambda(i[1],t))+'"></a>\n		<span class="pop-interceptor-blocksettingsids hidden">\n			'+(null!=(s=(a.withSublevel||t&&t.withSublevel||p).call(t,null!=i[2]?i[2].template:i[2],{name:"withSublevel",hash:{context:null!=(s=null!=(s=null!=i[2]?i[2].pss:i[2])?s.feedback:s)?s["replicate-blocksettingsids"]:s},fn:e.program(11,l,0,r,i),inverse:e.noop,data:l}))?s:"")+"\n		</span>\n"},3:function(e,t,a,n,l,r,i){var s,u=e.lambda,p=e.escapeExpression;return p(u(null!=i[2]?i[2].id:i[2],t))+p(u(null!=(s=null!=(s=null!=i[2]?i[2].tls:i[2])?s.feedback:s)?s["unique-id"]:s,t))+"-"+p(u(i[1],t))},5:function(e,t,a,n,l){return'data-intercept-skipstateupdate="true"'},7:function(e,t,a,n,l){return'data-unique-url="true"'},9:function(e,t,a,n,l,r,i){return e.escapeExpression((a.get||t&&t.get||a.helperMissing).call(t,t,null!=i[1]?i[1].template:i[1],{name:"get",hash:{},data:l}))},11:function(e,t,a,n,l,r,i){var s;return null!=(s=(a.withget||t&&t.withget||a.helperMissing).call(t,t,null!=i[1]?i[1].template:i[1],{name:"withget",hash:{},fn:e.program(12,l,0,r,i),inverse:e.noop,data:l}))?s:""},12:function(e,t,a,n,l){var r;return null!=(r=a.each.call(t,t,{name:"each",hash:{},fn:e.program(13,l,0),inverse:e.noop,data:l}))?r:""},13:function(e,t,a,n,l){var r,i=e.escapeExpression;return'<span data-key="'+i((r=null!=(r=a.key||l&&l.key)?r:a.helperMissing,"function"==typeof r?r.call(t,{name:"key",hash:{},data:l}):r))+'" data-value="'+i(e.lambda(t,t))+'"></span>'},compiler:[7,">= 4.0.0"],main:function(e,t,a,n,l,r,i){var s;return null!=(s=a.each.call(t,null!=(s=null!=t?t["block-settings-ids"]:t)?s["blockunits-replicable"]:s,{name:"each",hash:{},fn:e.program(1,l,0,r,i),inverse:e.noop,data:l}))?s:""},useData:!0,useDepths:!0})}();