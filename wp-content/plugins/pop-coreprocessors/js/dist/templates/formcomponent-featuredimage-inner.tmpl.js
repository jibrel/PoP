!function(){var n=Handlebars.template,l=Handlebars.templates=Handlebars.templates||{};l["formcomponent-featuredimage-inner"]=n({1:function(n,l,e,a,s){var t;return n.escapeExpression((t=null!=(t=e.id||(null!=l?l.id:l))?t:e.helperMissing,"function"==typeof t?t.call(l,{name:"id",hash:{},data:s}):t))},3:function(n,l,e,a,s){var t,r=n.lambda,i=n.escapeExpression;return'			<img src="'+i(r(null!=(t=null!=l?l.img:l)?t.src:t,l))+'" width="'+i(r(null!=(t=null!=l?l.img:l)?t.width:t,l))+'" height="'+i(r(null!=(t=null!=l?l.img:l)?t.height:t,l))+'" class="'+i(r(null!=(t=null!=l?l.classes:l)?t.img:t,l))+'">\n'},5:function(n,l,e,a,s){var t,r=n.lambda,i=n.escapeExpression;return'			<img src="'+i(r(null!=(t=null!=l?l["default-img"]:l)?t.src:t,l))+'" width="'+i(r(null!=(t=null!=l?l["default-img"]:l)?t.width:t,l))+'" height="'+i(r(null!=(t=null!=l?l["default-img"]:l)?t.height:t,l))+'" class="'+i(r(null!=(t=null!=l?l.classes:l)?t.img:t,l))+'">\n'},7:function(n,l,e,a,s){var t,r=n.lambda,i=n.escapeExpression;return"			<a "+(null!=(t=(e.generateId||l&&l.generateId||e.helperMissing).call(l,{name:"generateId",hash:{group:"remove"},fn:n.program(1,s,0),inverse:n.noop,data:s}))?t:"")+' href="#" class="loggedin-btn pop-featuredimage-btn remove '+i(r(null!=(t=null!=l?l.classes:l)?t["remove-btn"]:t,l))+'"><span class="glyphicon glyphicon-remove-sign"></span> '+i(r(null!=(t=null!=l?l.titles:l)?t["btn-remove"]:t,l))+"</a>\n"},compiler:[7,">= 4.0.0"],main:function(n,l,e,a,s){var t,r,i,o=e.helperMissing,u="function",d=n.lambda,m=n.escapeExpression,p='<div class="featuredimage-container pull-left" ';return r=null!=(r=e.generateId||(null!=l?l.generateId:l))?r:o,i={name:"generateId",hash:{},fn:n.program(1,s,0),inverse:n.noop,data:s},t=typeof r===u?r.call(l,i):r,e.generateId||(t=e.blockHelperMissing.call(l,t,i)),null!=t&&(p+=t),p+">\n	<a "+(null!=(t=(e.generateId||l&&l.generateId||o).call(l,{name:"generateId",hash:{group:"set"},fn:n.program(1,s,0),inverse:n.noop,data:s}))?t:"")+' href="#" class="visible-loggedin">\n'+(null!=(t=e["if"].call(l,null!=l?l.value:l,{name:"if",hash:{},fn:n.program(3,s,0),inverse:n.program(5,s,0),data:s}))?t:"")+'	</a>\n	<span class="visible-notloggedin">\n'+(null!=(t=e["if"].call(l,null!=l?l.value:l,{name:"if",hash:{},fn:n.program(3,s,0),inverse:n.program(5,s,0),data:s}))?t:"")+'	</span>\n	<div class="'+m(d(null!=(t=null!=l?l.classes:l)?t.options:t,l))+' visible-loggedin">\n		<a '+(null!=(t=(e.generateId||l&&l.generateId||o).call(l,{name:"generateId",hash:{group:"set"},fn:n.program(1,s,0),inverse:n.noop,data:s}))?t:"")+' href="#" class="loggedin-btn pop-featuredimage-btn set '+m(d(null!=(t=null!=l?l.classes:l)?t["set-btn"]:t,l))+'"><span class="glyphicon glyphicon-upload"></span> '+m(d(null!=(t=null!=l?l.titles:l)?t["btn-add"]:t,l))+"</a>\n"+(null!=(t=e["if"].call(l,null!=l?l.value:l,{name:"if",hash:{},fn:n.program(7,s,0),inverse:n.noop,data:s}))?t:"")+'	</div>\n	<div class="'+m(d(null!=(t=null!=l?l.classes:l)?t.options:t,l))+' visible-notloggedin">\n		'+(null!=(t=d(null!=(t=null!=l?l.titles:l)?t.usernotloggedin:t,l))?t:"")+'\n	</div>\n</div>\n<input type="hidden" value="'+m((r=null!=(r=e.value||(null!=l?l.value:l))?r:o,typeof r===u?r.call(l,{name:"value",hash:{},data:s}):r))+'" name="'+m((r=null!=(r=e["formcomponent-name"]||(null!=l?l["formcomponent-name"]:l))?r:o,typeof r===u?r.call(l,{name:"formcomponent-name",hash:{},data:s}):r))+'" id="'+m((r=null!=(r=e.lastGeneratedId||(null!=l?l.lastGeneratedId:l))?r:o,typeof r===u?r.call(l,{name:"lastGeneratedId",hash:{},data:s}):r))+"-"+m((r=null!=(r=e["formcomponent-name"]||(null!=l?l["formcomponent-name"]:l))?r:o,typeof r===u?r.call(l,{name:"formcomponent-name",hash:{},data:s}):r))+'" class="form-control">\n<div class="clearfix"></div>'},useData:!0})}();