!function(){var e=Handlebars.template,a=Handlebars.templates=Handlebars.templates||{};a.content=e({1:function(e,a,n,l,t,s,r){return e.escapeExpression((n.applyLightTemplate||a&&a.applyLightTemplate||n.helperMissing).call(a,a,{name:"applyLightTemplate",hash:{context:r[1]},data:t}))},3:function(e,a,n,l,t){var s;return e.escapeExpression((s=null!=(s=n.id||(null!=a?a.id:a))?s:n.helperMissing,"function"==typeof s?s.call(a,{name:"id",hash:{},data:t}):s))},5:function(e,a,n,l,t,s,r){var i,p=n.helperMissing,o=e.escapeExpression;return" "+o((i=null!=(i=n.key||t&&t.key)?i:p,"function"==typeof i?i.call(a,{name:"key",hash:{},data:t}):i))+'="#'+o((n.lastGeneratedId||a&&a.lastGeneratedId||p).call(a,{name:"lastGeneratedId",hash:{template:a,context:r[1]},data:t}))+'"'},7:function(e,a,n,l,t,s,r){return"		"+e.escapeExpression((n.enterModule||a&&a.enterModule||n.helperMissing).call(a,r[1],{name:"enterModule",hash:{items:null!=r[1]?r[1].items:r[1],itemDBKey:null!=r[1]?r[1].itemDBKey:r[1]},data:t}))+"\n"},compiler:[7,">= 4.0.0"],main:function(e,a,n,l,t,s,r){var i,p,o,c=n.helperMissing,u="function",d=e.escapeExpression,h=(null!=(p=null!=(p=n.description||(null!=a?a.description:a))?p:c,i=typeof p===u?p.call(a,{name:"description",hash:{},data:t}):p)?i:"")+'\n<div class="content '+(null!=(i=n.each.call(a,null!=(i=null!=a?a["template-ids"]:a)?i["class-extensions"]:i,{name:"each",hash:{},fn:e.program(1,t,0,s,r),inverse:e.noop,data:t}))?i:"")+" "+d((p=null!=(p=n["class"]||(null!=a?a["class"]:a))?p:c,typeof p===u?p.call(a,{name:"class",hash:{},data:t}):p))+" "+d((p=null!=(p=n["class-merge"]||(null!=a?a["class-merge"]:a))?p:c,typeof p===u?p.call(a,{name:"class-merge",hash:{},data:t}):p))+'" ';return p=null!=(p=n.generateId||(null!=a?a.generateId:a))?p:c,o={name:"generateId",hash:{},fn:e.program(3,t,0,s,r),inverse:e.noop,data:t},i=typeof p===u?p.call(a,o):p,n.generateId||(i=n.blockHelperMissing.call(a,i,o)),null!=i&&(h+=i),h+" "+(null!=(i=n.each.call(a,null!=a?a["previoustemplates-ids"]:a,{name:"each",hash:{},fn:e.program(5,t,0,s,r),inverse:e.noop,data:t}))?i:"")+">\n"+(null!=(i=(n.withModule||a&&a.withModule||c).call(a,a,"inner",{name:"withModule",hash:{},fn:e.program(7,t,0,s,r),inverse:e.noop,data:t}))?i:"")+"</div>"},useData:!0,useDepths:!0})}();