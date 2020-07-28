<?php
/**
 * Template part for displaying a post's title
 *
 * @package kadence
 */

namespace Kadence;

echo wp_kses_post( kadence()->get_breadcrumb() );
