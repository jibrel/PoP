<?php

// Override the default PoPTheme Wassup ThemeMode
add_filter('GD_Theme_Wassup:thememode:default', 'organikfundraising_processors_wassupthememode_default');
function organikfundraising_processors_wassupthememode_default($default_thememodename) {

	// Use the Simple ThemeMode instead of the Sliding one
	return GD_THEMEMODE_WASSUP_SIMPLE;
}

// add_filter('GD_Theme_Wassup:themestyle:default', 'organikfundraising_processors_wassupthemestyle_default');
// function organikfundraising_processors_wassupthemestyle_default($default_themestylename) {

// 	return GD_THEMESTYLE_WASSUP_EXPANSIVE;
// }