!function(){var n=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["block-bare"]=n({1:function(n,l,e,a,t){var s;return n.escapeExpression((s=null!=(s=e.id||(null!=l?l.id:l))?s:e.helperMissing,"function"==typeof s?s.call(null!=l?l:n.nullContext||{},{name:"id",hash:{},data:t}):s))},3:function(n,l,e,a,t){var s,u=n.escapeExpression;return" "+u((s=null!=(s=e.key||t&&t.key)?s:e.helperMissing,"function"==typeof s?s.call(null!=l?l:n.nullContext||{},{name:"key",hash:{},data:t}):s))+'="'+u(n.lambda(l,l))+'"'},5:function(n,l,e,a,t,s,u){var i;return'\t\t<span class="blocksection-inners clearfix">\n'+(null!=(i=e.each.call(null!=l?l:n.nullContext||{},null!=(i=null!=l?l["settings-ids"]:l)?i["block-inners"]:i,{name:"each",hash:{},fn:n.program(6,t,0,s,u),inverse:n.noop,data:t}))?i:"")+"\t\t</span>\n"},6:function(n,l,e,a,t,s,u){var i;return null!=(i=(e.withModule||l&&l.withModule||e.helperMissing).call(null!=l?l:n.nullContext||{},u[1],l,{name:"withModule",hash:{},fn:n.program(7,t,0,s,u),inverse:n.noop,data:t}))?i:""},7:function(n,l,e,a,t,s,u){var i;return"\t\t\t\t\t"+n.escapeExpression((e.enterModule||l&&l.enterModule||e.helperMissing).call(null!=l?l:n.nullContext||{},u[2],{name:"enterModule",hash:{dbObjectIDs:null!=(i=null!=u[2]?u[2].bs:u[2])?i.dbobjectids:i,dbKey:null!=(i=null!=(i=null!=u[2]?u[2].bs:u[2])?i.dbkeys:i)?i.id:i},data:t}))+"\n"},compiler:[7,">= 4.0.0"],main:function(n,l,e,a,t,s,u){var i,r,o=null!=l?l:n.nullContext||{},c=e.helperMissing,d=n.escapeExpression;return'<span class="'+d((r=null!=(r=e.class||(null!=l?l.class:l))?r:c,"function"==typeof r?r.call(o,{name:"class",hash:{},data:t}):r))+'" style="'+d((r=null!=(r=e.style||(null!=l?l.style:l))?r:c,"function"==typeof r?r.call(o,{name:"style",hash:{},data:t}):r))+'" '+(null!=(i=(e.generateId||l&&l.generateId||c).call(o,{name:"generateId",hash:{addURL:"true"},fn:n.program(1,t,0,s,u),inverse:n.noop,data:t}))?i:"")+' data-settings-id="'+d((r=null!=(r=e["settings-id"]||(null!=l?l["settings-id"]:l))?r:c,"function"==typeof r?r.call(o,{name:"settings-id",hash:{},data:t}):r))+'" '+(null!=(i=e.each.call(o,null!=l?l.params:l,{name:"each",hash:{},fn:n.program(3,t,0,s,u),inverse:n.noop,data:t}))?i:"")+">\n"+(null!=(i=e.if.call(o,null!=(i=null!=l?l["settings-ids"]:l)?i["block-inners"]:i,{name:"if",hash:{},fn:n.program(5,t,0,s,u),inverse:n.noop,data:t}))?i:"")+"</span>"},useData:!0,useDepths:!0})}();