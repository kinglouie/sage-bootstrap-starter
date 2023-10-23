<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter( 'areoi-overwrite-vars', function( $var_content ) {

	$var_content .= '
		$spacers: (
		  0: 0,
		  1: $spacer * .25,
		  2: $spacer * .5,
		  3: $spacer,
		  4: $spacer * 1.5,
		  5: $spacer * 3,
		  6: $spacer * 4,
		  7: $spacer * 5,
		);
	';
    $customs_vars = file_get_contents(get_template_directory() .'/resources/styles/_variables.scss');
	return $var_content . $customs_vars;
} );