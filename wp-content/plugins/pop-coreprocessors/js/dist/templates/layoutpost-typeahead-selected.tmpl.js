!function(){var l=Handlebars.template,a=Handlebars.templates=Handlebars.templates||{};a["layoutpost-typeahead-selected"]=l({1:function(l,a,e,n,t,i,h){var s,u,r=e.helperMissing,d="function";return'	<div class="media">\n'+(null!=(s=(e.withSublevel||a&&a.withSublevel||r).call(a,null!=(s=null!=h[1]?h[1].thumb:h[1])?s.name:s,{name:"withSublevel",hash:{},fn:l.program(2,t,0,i,h),inverse:l.noop,data:t}))?s:"")+'		<div class="media-body">\n			<h4 class="media-heading"><a href="'+l.escapeExpression((u=null!=(u=e.url||(null!=a?a.url:a))?u:r,typeof u===d?u.call(a,{name:"url",hash:{},data:t}):u))+'">'+(null!=(u=null!=(u=e.title||(null!=a?a.title:a))?u:r,s=typeof u===d?u.call(a,{name:"title",hash:{},data:t}):u)?s:"")+"</a></h4>\n		</div>\n	</div>\n"},2:function(l,a,e,n,t,i,h){var s,u=l.escapeExpression,r=e.helperMissing,d="function";return'			<div class="pull-left">\n				<a href="'+u(l.lambda(null!=h[1]?h[1].url:h[1],a))+'"><img src="'+u((s=null!=(s=e.src||(null!=a?a.src:a))?s:r,typeof s===d?s.call(a,{name:"src",hash:{},data:t}):s))+'" width="'+u((s=null!=(s=e.width||(null!=a?a.width:a))?s:r,typeof s===d?s.call(a,{name:"width",hash:{},data:t}):s))+'" height="'+u((s=null!=(s=e.height||(null!=a?a.height:a))?s:r,typeof s===d?s.call(a,{name:"height",hash:{},data:t}):s))+'"></a>\n			</div>\n'},compiler:[7,">= 4.0.0"],main:function(l,a,e,n,t,i,h){var s;return null!=(s=e["with"].call(a,null!=a?a.itemObject:a,{name:"with",hash:{},fn:l.program(1,t,0,i,h),inverse:l.noop,data:t}))?s:""},useData:!0,useDepths:!0})}();