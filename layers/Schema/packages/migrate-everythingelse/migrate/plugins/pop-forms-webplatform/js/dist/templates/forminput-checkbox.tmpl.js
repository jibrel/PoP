!function(){var a=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["forminput-checkbox"]=a({1:function(a,l,e,n,t){var u;return a.escapeExpression((u=null!=(u=e.id||(null!=l?l.id:l))?u:e.helperMissing,"function"==typeof u?u.call(null!=l?l:a.nullContext||{},{name:"id",hash:{},data:t}):u))},3:function(a,l,e,n,t){var u,o=null!=l?l:a.nullContext||{},r=e.helperMissing;return'\t\t\tvalue="'+a.escapeExpression((e.formatValue||l&&l.formatValue||r).call(o,null!=l?l["checkbox-value"]:l,null!=l?l["value-format"]:l,{name:"formatValue",hash:{},data:t}))+'" \n\t\t\t'+(null!=(u=(e.compare||l&&l.compare||r).call(o,(e.formatValue||l&&l.formatValue||r).call(o,null!=l?l["checkbox-value"]:l,null!=l?l["value-format"]:l,{name:"formatValue",hash:{},data:t}),(e.formatValue||l&&l.formatValue||r).call(o,(e.formcomponentValue||l&&l.formcomponentValue||r).call(o,null!=l?l.value:l,null!=l?l.dbObject:l,null!=l?l["dbobject-field"]:l,null!=l?l["default-value"]:l,{name:"formcomponentValue",hash:{},data:t}),null!=l?l["value-format"]:l,{name:"formatValue",hash:{},data:t}),{name:"compare",hash:{operator:null!=l?l["compare-by"]:l},fn:a.program(4,t,0),inverse:a.noop,data:t}))?u:"")+" \n"},4:function(a,l,e,n,t){return'checked="checked"'},6:function(a,l,e,n,t){var u,o=null!=l?l:a.nullContext||{},r=e.helperMissing;return'\t\t\tvalue="'+a.escapeExpression((e.formatValue||l&&l.formatValue||r).call(o,(e.get||l&&l.get||r).call(o,null!=l?l.dbObject:l,null!=l?l["dbobject-field"]:l,{name:"get",hash:{},data:t}),null!=l?l["value-format"]:l,{name:"formatValue",hash:{},data:t}))+'" \n\t\t\t'+(null!=(u=(e.compare||l&&l.compare||r).call(o,(e.formatValue||l&&l.formatValue||r).call(o,(e.get||l&&l.get||r).call(o,null!=l?l.dbObject:l,null!=l?l["dbobject-field"]:l,{name:"get",hash:{},data:t}),null!=l?l["value-format"]:l,{name:"formatValue",hash:{},data:t}),null!=l?l.value:l,{name:"compare",hash:{operator:null!=l?l["compare-by"]:l},fn:a.program(4,t,0),inverse:a.noop,data:t}))?u:"")+" \n"},8:function(a,l,e,n,t){return"readonly"},10:function(a,l,e,n,t){return'disabled="disabled"'},12:function(a,l,e,n,t){var u,o=a.escapeExpression;return" "+o((u=null!=(u=e.key||t&&t.key)?u:e.helperMissing,"function"==typeof u?u.call(null!=l?l:a.nullContext||{},{name:"key",hash:{},data:t}):u))+'="'+o(a.lambda(l,l))+'"'},14:function(a,l,e,n,t,u,o){var r,s=null!=l?l:a.nullContext||{},c=e.helperMissing,m=a.escapeExpression;return" "+m((r=null!=(r=e.key||t&&t.key)?r:c,"function"==typeof r?r.call(s,{name:"key",hash:{},data:t}):r))+'="#'+m((e.lastGeneratedId||l&&l.lastGeneratedId||c).call(s,{name:"lastGeneratedId",hash:{module:l,context:o[1]},data:t}))+'"'},compiler:[7,">= 4.0.0"],main:function(a,l,e,n,t,u,o){var r,s,c,m=null!=l?l:a.nullContext||{},p=e.helperMissing,h="function",d=a.escapeExpression,i=a.lambda,f="<label>\n\t<input \n\t\t";return s=null!=(s=e.generateId||(null!=l?l.generateId:l))?s:p,c={name:"generateId",hash:{},fn:a.program(1,t,0,u,o),inverse:a.noop,data:t},r=typeof s===h?s.call(m,c):s,e.generateId||(r=e.blockHelperMissing.call(l,r,c)),null!=r&&(f+=r),f+' \n\t\ttype="checkbox" \n\t\tname="'+d((s=null!=(s=e.name||(null!=l?l.name:l))?s:p,typeof s===h?s.call(m,{name:"name",hash:{},data:t}):s))+'" \n'+(null!=(r=e.if.call(m,null!=l?l["checkbox-value"]:l,{name:"if",hash:{},fn:a.program(3,t,0,u,o),inverse:a.program(6,t,0,u,o),data:t}))?r:"")+'\t\tclass="'+d((s=null!=(s=e.class||(null!=l?l.class:l))?s:p,typeof s===h?s.call(m,{name:"class",hash:{},data:t}):s))+" "+d(i(null!=(r=null!=l?l.classes:l)?r.input:r,l))+'" \n\t\tstyle="'+d((s=null!=(s=e.style||(null!=l?l.style:l))?s:p,typeof s===h?s.call(m,{name:"style",hash:{},data:t}):s))+" "+d(i(null!=(r=null!=l?l.styles:l)?r.input:r,l))+'" \n\t\t'+(null!=(r=e.if.call(m,null!=l?l.readonly:l,{name:"if",hash:{},fn:a.program(8,t,0,u,o),inverse:a.noop,data:t}))?r:"")+" \n\t\t"+(null!=(r=e.if.call(m,null!=l?l.disabled:l,{name:"if",hash:{},fn:a.program(10,t,0,u,o),inverse:a.noop,data:t}))?r:"")+" \n\t\t"+(null!=(r=e.each.call(m,null!=l?l.params:l,{name:"each",hash:{},fn:a.program(12,t,0,u,o),inverse:a.noop,data:t}))?r:"")+" \n\t\t"+(null!=(r=e.each.call(m,null!=l?l["previousmodules-ids"]:l,{name:"each",hash:{},fn:a.program(14,t,0,u,o),inverse:a.noop,data:t}))?r:"")+"\n\t> "+(null!=(s=null!=(s=e.label||(null!=l?l.label:l))?s:p,r=typeof s===h?s.call(m,{name:"label",hash:{},data:t}):s)?r:"")+"\n</label>"},useData:!0,useDepths:!0})}();