!function(){var e=Handlebars.template,a=Handlebars.templates=Handlebars.templates||{};a["em-map-addmarker"]=e({1:function(e,a,n,r,l,t,s){return"	"+e.escapeExpression((n.enterModule||a&&a.enterModule||n.helperMissing).call(a,s[1],{name:"enterModule",hash:{},data:l}))+"\n"},compiler:[7,">= 4.0.0"],main:function(e,a,n,r,l,t,s){var i,o=n.helperMissing;return(null!=(i=(n.withModule||a&&a.withModule||o).call(a,a,"map-script-resetmarkers",{name:"withModule",hash:{},fn:e.program(1,l,0,t,s),inverse:e.noop,data:l}))?i:"")+"\n"+(null!=(i=(n.withModule||a&&a.withModule||o).call(a,a,"map-script-markers",{name:"withModule",hash:{},fn:e.program(1,l,0,t,s),inverse:e.noop,data:l}))?i:"")},useData:!0,useDepths:!0})}();