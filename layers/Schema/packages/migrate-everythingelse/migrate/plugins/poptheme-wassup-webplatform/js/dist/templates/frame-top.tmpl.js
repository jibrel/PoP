!function(){var t=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["frame-top"]=t({1:function(t,l,n,a,e,s,i){var o;return null!=(o=n.if.call(null!=l?l:t.nullContext||{},null!=(o=null!=l?l.bs:l)?o.dbobjectids:o,{name:"if",hash:{},fn:t.program(2,e,0,s,i),inverse:t.noop,data:e}))?o:""},2:function(t,l,n,a,e,s,i){var o,u=null!=l?l:t.nullContext||{},d=n.helperMissing,r=t.lambda,c=t.escapeExpression;return'\t\t\t<li class="dropdown nav-sponsors nav-dropdown visiblesearch-visible">\n\t\t\t\t<a href="#" class="dropdown-toggle" '+(null!=(o=(n.generateId||l&&l.generateId||d).call(u,{name:"generateId",hash:{group:"void-link",module:null!=i[1]?i[1].module:i[1],targetId:null!=(o=null!=i[1]?i[1].pss:i[1])?o.pssId:o},fn:t.program(3,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' title="'+c(r(null!=(o=null!=i[1]?i[1].titles:i[1])?o.sponsors:o,l))+'">\n\t\t\t\t\t<span class="glyphicon '+c(r(null!=(o=null!=i[1]?i[1].icons:i[1])?o.sponsors:o,l))+'"></span>\n\t\t\t\t</a>\n\t\t\t\t<div class="dropdown-menu pull-right" role="menu">\n\t\t\t\t\t<div class="col-xs-12" id="'+c(r(null!=i[1]?i[1].id:i[1],l))+'-sponsors">\n\t\t\t\t\t\t<p>'+(null!=(o=r(null!=(o=null!=i[1]?i[1].titles:i[1])?o["sponsors-description"]:o,l))?o:"")+"</p>\n\t\t\t\t\t\t"+c((n.enterModule||l&&l.enterModule||d).call(u,l,{name:"enterModule",hash:{},data:e}))+'\n\t\t\t\t\t\t<hr/>\n\t\t\t\t\t\t<div><span class="pull-right">'+(null!=(o=r(null!=(o=null!=i[1]?i[1].titles:i[1])?o.sponsorus:o,l))?o:"")+"</a></span>"+(null!=(o=r(null!=(o=null!=i[1]?i[1].titles:i[1])?o.viewallsponsors:o,l))?o:"")+"</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</li>\n"},3:function(t,l,n,a,e,s,i){return t.escapeExpression(t.lambda(null!=i[1]?i[1].id:i[1],l))+"-sponsors"},5:function(t,l,n,a,e){var s;return t.escapeExpression((s=null!=(s=n.id||(null!=l?l.id:l))?s:n.helperMissing,"function"==typeof s?s.call(null!=l?l:t.nullContext||{},{name:"id",hash:{},data:e}):s))+"-info"},7:function(t,l,n,a,e){var s,i=null!=l?l:t.nullContext||{},o=n.helperMissing,u=t.escapeExpression;return'\t\t\t\t\t\t<img src="'+u((s=null!=(s=n.src||(null!=l?l.src:l))?s:o,"function"==typeof s?s.call(i,{name:"src",hash:{},data:e}):s))+'" class="img-responsive" alt="'+u((s=null!=(s=n.title||(null!=l?l.title:l))?s:o,"function"==typeof s?s.call(i,{name:"title",hash:{},data:e}):s))+'">\n\t\t\t\t\t'},9:function(t,l,n,a,e,s,i){var o,u,d=null!=l?l:t.nullContext||{},r=n.helperMissing,c=t.escapeExpression,p=t.lambda;return'\t\t\t\t\t\t<a href="'+c((u=null!=(u=n.link||(null!=l?l.link:l))?u:r,"function"==typeof u?u.call(d,{name:"link",hash:{},data:e}):u))+'" class="'+c(p(null!=(o=null!=i[1]?i[1].classes:i[1])?o.socialmedia:o,l))+'" style="'+c(p(null!=(o=null!=i[1]?i[1].styles:i[1])?o.socialmedia:o,l))+'" title="'+c((u=null!=(u=n.name||(null!=l?l.name:l))?u:r,"function"==typeof u?u.call(d,{name:"name",hash:{},data:e}):u))+'">\n\t\t\t\t\t\t\t'+(null!=(u=null!=(u=n.title||(null!=l?l.title:l))?u:r,o="function"==typeof u?u.call(d,{name:"title",hash:{},data:e}):u)?o:"")+"\n\t\t\t\t\t\t</a><br/>\n"},11:function(t,l,n,a,e){return"\t\t\t\t\t\t"+t.escapeExpression((n.enterModule||l&&l.enterModule||n.helperMissing).call(null!=l?l:t.nullContext||{},l,{name:"enterModule",hash:{},data:e}))+"\n"},13:function(t,l,n,a,e){var s,i=null!=l?l:t.nullContext||{},o=n.helperMissing,u=t.escapeExpression;return'\t\t\t\t\t\t\t\t\t<img src="'+u((s=null!=(s=n.src||(null!=l?l.src:l))?s:o,"function"==typeof s?s.call(i,{name:"src",hash:{},data:e}):s))+'" class="img-responsive" alt="'+u((s=null!=(s=n.title||(null!=l?l.title:l))?s:o,"function"==typeof s?s.call(i,{name:"title",hash:{},data:e}):s))+'">\n'},15:function(t,l,n,a,e,s,i){var o,u,d=null!=l?l:t.nullContext||{},r=n.helperMissing,c=t.escapeExpression,p=t.lambda;return'\t\t\t\t\t\t\t\t\t<a href="'+c((u=null!=(u=n.link||(null!=l?l.link:l))?u:r,"function"==typeof u?u.call(d,{name:"link",hash:{},data:e}):u))+'" class="'+c(p(null!=(o=null!=i[1]?i[1].classes:i[1])?o.socialmedia:o,l))+'" style="'+c(p(null!=(o=null!=i[1]?i[1].styles:i[1])?o.socialmedia:o,l))+'" title="'+c((u=null!=(u=n.name||(null!=l?l.name:l))?u:r,"function"==typeof u?u.call(d,{name:"name",hash:{},data:e}):u))+'">\n\t\t\t\t\t\t\t\t\t\t'+(null!=(u=null!=(u=n.title||(null!=l?l.title:l))?u:r,o="function"==typeof u?u.call(d,{name:"title",hash:{},data:e}):u)?o:"")+"\n\t\t\t\t\t\t\t\t\t</a><br/>\n"},17:function(t,l,n,a,e){var s;return t.escapeExpression((s=null!=(s=n.id||(null!=l?l.id:l))?s:n.helperMissing,"function"==typeof s?s.call(null!=l?l:t.nullContext||{},{name:"id",hash:{},data:e}):s))},19:function(t,l,n,a,e,s,i){var o,u,d=t.escapeExpression;return'\t\t\t\t<img src="'+d((u=null!=(u=n.src||(null!=l?l.src:l))?u:n.helperMissing,"function"==typeof u?u.call(null!=l?l:t.nullContext||{},{name:"src",hash:{},data:e}):u))+'" alt="'+d(t.lambda(null!=(o=null!=i[1]?i[1].titles:i[1])?o.home:o,l))+'">\n'},21:function(t,l,n,a,e){var s;return t.escapeExpression((s=null!=(s=n.id||(null!=l?l.id:l))?s:n.helperMissing,"function"==typeof s?s.call(null!=l?l:t.nullContext||{},{name:"id",hash:{},data:e}):s))+"-addcontent"},23:function(t,l,n,a,e){var s,i=t.escapeExpression;return" "+i((s=null!=(s=n.key||e&&e.key)?s:n.helperMissing,"function"==typeof s?s.call(null!=l?l:t.nullContext||{},{name:"key",hash:{},data:e}):s))+'="'+i(t.lambda(l,l))+'"'},25:function(t,l,n,a,e){return"user-avatar"},27:function(t,l,n,a,e){var s,i=t.lambda,o=t.escapeExpression;return'\t\t\t\t<img src="'+o(i(null!=(s=null!=(s=null!=l?l.sessionmeta:l)?s.user:s)?s.avatar:s,l))+'" class="pop-user-avatar '+o(i(null!=(s=null!=l?l.tls:l)?s["domain-id"]:s,l))+' img-thumbnail">\n'},29:function(t,l,n,a,e){var s;return'\t\t\t\t<span class="glyphicon '+t.escapeExpression(t.lambda(null!=(s=null!=l?l.icons:l)?s.account:s,l))+'"></span>\n'},31:function(t,l,n,a,e){var s;return t.escapeExpression((s=null!=(s=n.id||(null!=l?l.id:l))?s:n.helperMissing,"function"==typeof s?s.call(null!=l?l:t.nullContext||{},{name:"id",hash:{},data:e}):s))+"-useraccount-loggedin"},33:function(t,l,n,a,e){var s,i=t.lambda,o=t.escapeExpression;return'\t\t\t\t\t\t<div class="top-useravatar-container">\n\t\t\t\t\t\t\t<a title="'+o(i(null!=(s=null!=l?l.titles:l)?s.myprofile:s,l))+'" href="'+o(i(null!=(s=null!=(s=null!=l?l.sessionmeta:l)?s.user:s)?s.url:s,l))+'" class="pop-user-url '+o(i(null!=(s=null!=l?l.tls:l)?s["domain-id"]:s,l))+' user-avatar thumbnail">\n\t\t\t\t\t\t\t\t<img src="'+o(i(null!=(s=null!=(s=null!=l?l.sessionmeta:l)?s.user:s)?s.avatar:s,l))+'" class="pop-user-avatar '+o(i(null!=(s=null!=l?l.tls:l)?s["domain-id"]:s,l))+'">\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t<a href="'+o(i(null!=(s=null!=l?l.links:l)?s.useravatar:s,l))+'" class="'+o(i(null!=(s=null!=l?l.classes:l)?s.useravatar:s,l))+' useravatar-link" style="'+o(i(null!=(s=null!=l?l.styles:l)?s.useravatar:s,l))+'">\n\t\t\t\t\t\t\t\t'+(null!=(s=i(null!=(s=null!=l?l.titles:l)?s.useravatar:s,l))?s:"")+"\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t</div>\n"},35:function(t,l,n,a,e){var s;return'\t\t\t\t\t\t<div class="top-iconleft-container">\n\t\t\t\t\t\t\t'+(null!=(s=t.lambda(null!=(s=null!=l?l.titles:l)?s["account-left"]:s,l))?s:"")+"\n\t\t\t\t\t\t</div>\n"},37:function(t,l,n,a,e){var s;return t.escapeExpression((s=null!=(s=n.id||(null!=l?l.id:l))?s:n.helperMissing,"function"==typeof s?s.call(null!=l?l:t.nullContext||{},{name:"id",hash:{},data:e}):s))+"-useraccount-notloggedin"},39:function(t,l,n,a,e,s,i){var o,u=null!=l?l:t.nullContext||{},d=n.helperMissing,r=t.lambda,c=t.escapeExpression;return'\t\t<li class="dropdown nav-notifications nav-dropdown">\n\t\t\t<a href="#" class="dropdown-toggle" '+(null!=(o=(n.generateId||l&&l.generateId||d).call(u,{name:"generateId",hash:{group:"notification-link",module:null!=i[1]?i[1].module:i[1],targetId:null!=(o=null!=i[1]?i[1].pss:i[1])?o.pssId:o},fn:t.program(40,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' title="'+c(r(null!=(o=null!=i[1]?i[1].titles:i[1])?o.notifications:o,l))+'" '+(null!=(o=n.each.call(u,null!=(o=null!=i[1]?i[1].params:i[1])?o["notifications-link"]:o,{name:"each",hash:{},fn:t.program(23,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'>\n\t\t\t\t<span class="glyphicon '+c(r(null!=(o=null!=i[1]?i[1].icons:i[1])?o.notifications:o,l))+'"></span>\n\t\t\t\t<span id="'+c(r(null!=(o=null!=i[1]?i[1].ids:i[1])?o["notifications-count"]:o,l))+'" class="hidden '+c(r(null!=(o=null!=i[1]?i[1].classes:i[1])?o["notifications-count"]:o,l))+'" style="'+c(r(null!=(o=null!=i[1]?i[1].styles:i[1])?o["notifications-count"]:o,l))+'"></span>\n\t\t\t</a>\n\t\t\t<div class="dropdown-menu" role="menu">\n\t\t\t\t<div class="col-xs-12" id="'+c(r(null!=i[1]?i[1].id:i[1],l))+'-notifications">\n\t\t\t\t\t<div '+(null!=(o=(n.generateId||l&&l.generateId||d).call(u,{name:"generateId",hash:{group:"notifications",module:null!=i[1]?i[1].module:i[1],targetId:null!=(o=null!=i[1]?i[1].pss:i[1])?o.pssId:o},fn:t.program(42,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' class="'+c(r(null!=(o=null!=i[1]?i[1].classes:i[1])?o.notifications:o,l))+'" style="'+c(r(null!=(o=null!=i[1]?i[1].styles:i[1])?o.notifications:o,l))+'">\n\t\t\t\t\t\t'+c((n.enterModule||l&&l.enterModule||d).call(u,l,{name:"enterModule",hash:{},data:e}))+'\n\t\t\t\t\t</div>\n\t\t\t\t\t<hr/>\n\t\t\t\t\t<div><span class="pull-right">'+(null!=(o=r(null!=(o=null!=i[1]?i[1].titles:i[1])?o.viewallnotifications:o,l))?o:"")+"</a></span></div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</li>\n"},40:function(t,l,n,a,e,s,i){return t.escapeExpression(t.lambda(null!=i[1]?i[1].id:i[1],l))+"-notificationslink"},42:function(t,l,n,a,e,s,i){return t.escapeExpression(t.lambda(null!=i[1]?i[1].id:i[1],l))},44:function(t,l,n,a,e){return"\t\t\t"+t.escapeExpression((n.enterModule||l&&l.enterModule||n.helperMissing).call(null!=l?l:t.nullContext||{},l,{name:"enterModule",hash:{},data:e}))+"\n"},compiler:[7,">= 4.0.0"],main:function(t,l,n,a,e,s,i){var o,u,d=null!=l?l:t.nullContext||{},r=n.helperMissing,c=t.lambda,p=t.escapeExpression,g="function";return'<ul class="nav navbar-nav navbar-right visiblesearch-visible-right" role="menu">\n'+(null!=(o=(n.withModule||l&&l.withModule||r).call(d,l,"block-oursponsors",{name:"withModule",hash:{},fn:t.program(1,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'\t<li class="dropdown nav-about nav-dropdown visiblesearch-visible">\n\t\t<a title="'+p(c(null!=(o=null!=l?l.titles:l)?o.about:o,l))+'" href="#" '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"void-link",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(5,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'>\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.about:o,l))+'"></span>\n\t\t</a>\n\t\t<div class="dropdown-menu dropdown-menu-right" role="menu">\n\t\t\t<div class="row">\n\t\t\t\t<div class="col-sm-6 col-logo hidden-xs">\n'+(null!=(o=n.with.call(d,null!=l?l["logo-large-white"]:l,{name:"with",hash:{},fn:t.program(7,e,0,s,i),inverse:t.noop,data:e}))?o:"")+"<br/>\n"+(null!=(o=n.each.call(d,null!=l?l.socialmedias:l,{name:"each",hash:{},fn:t.program(9,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'\t\t\t\t</div>\n\t\t\t\t<div class="col-sm-6" id="'+p((u=null!=(u=n.id||(null!=l?l.id:l))?u:r,typeof u===g?u.call(d,{name:"id",hash:{},data:e}):u))+'-menu-about">\n'+(null!=(o=(n.withModule||l&&l.withModule||r).call(d,l,"menu-about",{name:"withModule",hash:{},fn:t.program(11,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'\t\t\t\t\t<div class="hidden-sm hidden-md hidden-lg">\n\t\t\t\t\t\t<hr/>\n\t\t\t\t\t\t<div class="row">\n\t\t\t\t\t\t\t<div class="col-xs-6 col-logo">\n'+(null!=(o=n.with.call(d,null!=l?l["logo-large-white"]:l,{name:"with",hash:{},fn:t.program(13,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class="col-xs-6">\t\t\t\t\t\t\t\t\n'+(null!=(o=n.each.call(d,null!=l?l.socialmedias:l,{name:"each",hash:{},fn:t.program(15,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\t\t\t\t\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<hr/>\n\t\t\t<div class="text-padded text-center"><small>'+(null!=(o=c(null!=(o=null!=l?l.titles:l)?o.footer:o,l))?o:"")+'</small></div>\n\t\t</div>\n\t</li>\n\t<li class="nav-settings visiblesearch-visible">\n\t\t<a title="'+p(c(null!=(o=null!=l?l.titles:l)?o.settings:o,l))+'" href="'+p(c(null!=(o=null!=l?l.links:l)?o.settings:o,l))+'">\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.settings:o,l))+'"></span>\n\t\t</a>\n\t</li>\n\t<li class="hidden-sm hidden-md hidden-lg pop-toggle-search">\n\t\t<a '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"togglesearch-xs",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(17,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' href="#" class="toggle-side" title="'+p(c(null!=(o=null!=l?l.titles:l)?o.togglesearch:o,l))+'" data-target="'+p((u=null!=(u=n["togglesearch-target"]||(null!=l?l["togglesearch-target"]:l))?u:r,typeof u===g?u.call(d,{name:"togglesearch-target",hash:{},data:e}):u))+'" data-mode="toggle" data-class="pop-search-visible">\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.togglesearch:o,l))+'"></span>\n\t\t</a>\n\t</li>\n</ul>\n\n<ul class="nav navbar-nav framesection-navbar-left visiblesearch-hidden" role="menu">\n\t<li class="activeside-hidden">\n\t\t<a '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"logo",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(17,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' class="logo" href="'+p(c(null!=(o=null!=l?l.links:l)?o.home:o,l))+'" target="'+p(c(null!=(o=null!=l?l.targets:l)?o.home:o,l))+'" title="'+p(c(null!=(o=null!=l?l.titles:l)?o.home:o,l))+'" data-tooltip-placement="bottom">\n'+(null!=(o=n.with.call(d,null!=l?l["logo-small"]:l,{name:"with",hash:{},fn:t.program(19,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'\t\t</a>\n\t</li>\n\t<li class="dropdown nav-addcontent nav-dropdown activeside-hidden">\n\t\t<a title="'+p(c(null!=(o=null!=l?l.titles:l)?o.addcontent:o,l))+'" href="#" '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"void-link",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(21,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'>\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.addcontent:o,l))+'"></span>\n\t\t</a>\n\t\t<div class="dropdown-menu" role="menu">\n\t\t\t<div class="media">\n\t\t\t\t<div class="media-left">\n\t\t\t\t\t<div class="top-iconleft-container">\n\t\t\t\t\t\t'+(null!=(o=c(null!=(o=null!=l?l.titles:l)?o["addcontent-left"]:o,l))?o:"")+'\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class="media-body" id="'+p((u=null!=(u=n.id||(null!=l?l.id:l))?u:r,typeof u===g?u.call(d,{name:"id",hash:{},data:e}):u))+'-menu-addcontent">\n\t\t\t\t\t<h3 class="media-heading">'+p(c(null!=(o=null!=l?l.titles:l)?o["addcontent-right"]:o,l))+"</h3>\n"+(null!=(o=(n.withModule||l&&l.withModule||r).call(d,l,"menu-addnew",{name:"withModule",hash:{},fn:t.program(11,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'\t\t\t\t</div>\t\t\t\t\n\t\t\t</div>\n\t\t</div>\n\t</li>\n</ul>\n<ul class="nav navbar-nav navbar-nav-togglenav visiblesearch-hidden" role="menu">\n\t<li class="hidden-sm hidden-md hidden-lg">\n\t\t<a '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"togglenav-xs",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(17,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' href="#" class="toggle-side" title="'+p(c(null!=(o=null!=l?l.titles:l)?o.togglenavigation:o,l))+'" data-target="'+p((u=null!=(u=n["offcanvas-sidenav-target"]||(null!=l?l["offcanvas-sidenav-target"]:l))?u:r,typeof u===g?u.call(d,{name:"offcanvas-sidenav-target",hash:{},data:e}):u))+'" data-toggle="offcanvas-toggle" data-mode="xs">\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.togglenavigation:o,l))+'"></span>\n\t\t</a>\n\t</li>\n\t<li class="hidden-xs">\n\t\t<a '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"togglenav",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(17,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' href="#" class="toggle-side activenavigator-hidden" title="'+p(c(null!=(o=null!=l?l.titles:l)?o.togglenavigation:o,l))+'" data-target="'+p((u=null!=(u=n["offcanvas-sidenav-target"]||(null!=l?l["offcanvas-sidenav-target"]:l))?u:r,typeof u===g?u.call(d,{name:"offcanvas-sidenav-target",hash:{},data:e}):u))+'" data-toggle="offcanvas-toggle" data-tooltip-placement="bottom" '+(null!=(o=n.each.call(d,null!=l?l["togglenav-params"]:l,{name:"each",hash:{},fn:t.program(23,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'>\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.togglenavigation:o,l))+'"></span>\n\t\t</a>\n\t\t<a '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"togglenavigator",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(17,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' href="#" class="toggle-side activenavigator-visible" title="'+p(c(null!=(o=null!=l?l.titles:l)?o.togglenavigation:o,l))+'" data-target="'+p((u=null!=(u=n["offcanvas-navigator-target"]||(null!=l?l["offcanvas-navigator-target"]:l))?u:r,typeof u===g?u.call(d,{name:"offcanvas-navigator-target",hash:{},data:e}):u))+'" data-toggle="offcanvas-toggle" data-tooltip-placement="bottom">\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.togglenavigation:o,l))+'"></span>\n\t\t</a>\n\t</li>\n\t<li class="hidden-sm hidden-md hidden-lg">\n\t\t<a '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"togglepagetabs-xs",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(17,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' href="#" class="toggle-side" title="'+p(c(null!=(o=null!=l?l.titles:l)?o.togglepagetabs:o,l))+'" data-target="'+p((u=null!=(u=n["offcanvas-pagetabs-target"]||(null!=l?l["offcanvas-pagetabs-target"]:l))?u:r,typeof u===g?u.call(d,{name:"offcanvas-pagetabs-target",hash:{},data:e}):u))+'" data-toggle="offcanvas-toggle" data-mode="xs">\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.togglepagetabs:o,l))+'"></span>\n\t\t</a>\n\t</li>\n\t<li class="hidden-xs">\n\t\t<a '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"togglepagetabs",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(17,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' href="#" class="toggle-side" title="'+p(c(null!=(o=null!=l?l.titles:l)?o.togglepagetabs:o,l))+'" data-target="'+p((u=null!=(u=n["offcanvas-pagetabs-target"]||(null!=l?l["offcanvas-pagetabs-target"]:l))?u:r,typeof u===g?u.call(d,{name:"offcanvas-pagetabs-target",hash:{},data:e}):u))+'" data-toggle="offcanvas-toggle" data-tooltip-placement="bottom">\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.togglepagetabs:o,l))+'"></span>\n\t\t</a>\n\t</li>\n</ul>\n<div id="account-loading-msg" class="hidden visiblesearch-hidden">'+(null!=(o=c(null!=(o=null!=l?l.titles:l)?o["account-loading-msg"]:o,l))?o:"")+'</div>\n<ul class="nav navbar-nav navbar-nav-account visiblesearch-hidden" role="menu">\n\t<li class="dropdown nav-account nav-dropdown visible-loggedin-localdomain">\n\t\t<a title="'+p(c(null!=(o=null!=l?l.titles:l)?o.myprofile:o,l))+'" href="'+p(c(null!=(o=null!=(o=null!=l?l.sessionmeta:l)?o.user:o)?o.url:o,l))+'" class="pop-user-url '+p(c(null!=(o=null!=l?l.tls:l)?o["domain-id"]:o,l))+" "+(null!=(o=n.if.call(d,null!=(o=null!=l?l.titles:l)?o.useravatar:o,{name:"if",hash:{},fn:t.program(25,e,0,s,i),inverse:t.noop,data:e}))?o:"")+' hidden-xs hidden-sm">\n'+(null!=(o=n.if.call(d,null!=(o=null!=l?l.titles:l)?o.useravatar:o,{name:"if",hash:{},fn:t.program(27,e,0,s,i),inverse:t.program(29,e,0,s,i),data:e}))?o:"")+'\t\t</a>\n\t\t<a title="'+p(c(null!=(o=null!=l?l.titles:l)?o.myprofile:o,l))+'" href="#" class="user-avatar hidden-md hidden-lg" '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"void-link",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(31,e,0,s,i),inverse:t.noop,data:e}))?o:"")+">\n"+(null!=(o=n.if.call(d,null!=(o=null!=l?l.titles:l)?o.useravatar:o,{name:"if",hash:{},fn:t.program(27,e,0,s,i),inverse:t.program(29,e,0,s,i),data:e}))?o:"")+'\t\t</a>\n\t\t<div class="dropdown-menu" role="menu">\n\t\t\t<div class="media">\n\t\t\t\t<div class="media-left">\n'+(null!=(o=n.if.call(d,null!=(o=null!=l?l.titles:l)?o.useravatar:o,{name:"if",hash:{},fn:t.program(33,e,0,s,i),inverse:t.program(35,e,0,s,i),data:e}))?o:"")+'\t\t\t\t</div>\n\t\t\t\t<div class="media-body" id="'+p((u=null!=(u=n.id||(null!=l?l.id:l))?u:r,typeof u===g?u.call(d,{name:"id",hash:{},data:e}):u))+'-menu-userloggedin">\n\t\t\t\t\t<h3 class="media-heading"><a title="'+p(c(null!=(o=null!=l?l.titles:l)?o.myprofile:o,l))+'" href="'+p(c(null!=(o=null!=(o=null!=l?l.sessionmeta:l)?o.user:o)?o.url:o,l))+'" class="pop-user-url '+p(c(null!=(o=null!=l?l.tls:l)?o["domain-id"]:o,l))+' user-avatar"><span class="pop-user-name '+p(c(null!=(o=null!=l?l.tls:l)?o["domain-id"]:o,l))+'">'+(null!=(o=c(null!=(o=null!=(o=null!=l?l.sessionmeta:l)?o.user:o)?o.name:o,l))?o:"")+"</span></a></h3>\n"+(null!=(o=(n.withModule||l&&l.withModule||r).call(d,l,"menu-userloggedin",{name:"withModule",hash:{},fn:t.program(11,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'\t\t\t\t</div>\t\t\t\t\n\t\t\t</div>\n\t\t</div>\n\t</li>\n\t<li class="dropdown nav-account nav-dropdown visible-notloggedin-localdomain">\n\t\t<a title="'+p(c(null!=(o=null!=l?l.titles:l)?o.loginaddprofile:o,l))+'" href="'+p(c(null!=(o=null!=l?l.links:l)?o.login:o,l))+'" class="hidden-xs hidden-sm">\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.account:o,l))+'"></span>\n\t\t</a>\n\t\t<a title="'+p(c(null!=(o=null!=l?l.titles:l)?o.loginaddprofile:o,l))+'" href="#" class="hidden-md hidden-lg" '+(null!=(o=(n.generateId||l&&l.generateId||r).call(d,{name:"generateId",hash:{group:"void-link",targetId:null!=(o=null!=l?l.pss:l)?o.pssId:o},fn:t.program(37,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'>\n\t\t\t<span class="glyphicon '+p(c(null!=(o=null!=l?l.icons:l)?o.account:o,l))+'"></span>\n\t\t</a>\n\t\t<div class="dropdown-menu" role="menu" id="'+p((u=null!=(u=n.id||(null!=l?l.id:l))?u:r,typeof u===g?u.call(d,{name:"id",hash:{},data:e}):u))+'-menu-usernotloggedin">\n\t\t\t<div class="media">\n\t\t\t\t<div class="media-left">\n\t\t\t\t\t<div class="top-iconleft-container">\n\t\t\t\t\t\t'+(null!=(o=c(null!=(o=null!=l?l.titles:l)?o["account-left"]:o,l))?o:"")+'\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class="media-body" id="'+p((u=null!=(u=n.id||(null!=l?l.id:l))?u:r,typeof u===g?u.call(d,{name:"id",hash:{},data:e}):u))+'-menu-addcontent">\n\t\t\t\t\t<h3 class="media-heading">'+p(c(null!=(o=null!=l?l.titles:l)?o["account-right"]:o,l))+"</h3>\n"+(null!=(o=(n.withModule||l&&l.withModule||r).call(d,l,"menu-usernotloggedin",{name:"withModule",hash:{},fn:t.program(11,e,0,s,i),inverse:t.noop,data:e}))?o:"")+"\t\t\t\t</div>\t\t\t\t\n\t\t\t</div>\n\t\t</div>\n\t</li>\n"+(null!=(o=(n.withModule||l&&l.withModule||r).call(d,l,"block-notifications",{name:"withModule",hash:{},fn:t.program(39,e,0,s,i),inverse:t.noop,data:e}))?o:"")+'</ul>\n<ul class="nav navbar-nav visiblesearch-visible" role="menu">\n\t<li class="nav-quicklink" id="'+p((u=null!=(u=n.id||(null!=l?l.id:l))?u:r,typeof u===g?u.call(d,{name:"id",hash:{},data:e}):u))+'-quicklink-everything">\n'+(null!=(o=(n.withModule||l&&l.withModule||r).call(d,l,"search",{name:"withModule",hash:{},fn:t.program(44,e,0,s,i),inverse:t.noop,data:e}))?o:"")+"\t</li>\n</ul>"},useData:!0,useDepths:!0})}();