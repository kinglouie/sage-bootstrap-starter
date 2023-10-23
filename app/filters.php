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

    $customs_vars = file_get_contents(get_template_directory() .'/resources/styles/_variables.scss');
	return $var_content . $customs_vars;
} );