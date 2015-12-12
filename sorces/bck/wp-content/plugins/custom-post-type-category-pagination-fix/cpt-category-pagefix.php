<?php
/**
Plugin Name: Custom Post Type Category Pagination Fix
Description: Fixes 404 error when attemping to view paginated category listing page, consisting of custom post types, greater than one
Version: 1.0
Author: jdantzer

Copyright (C) 2010  jdantzer

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

**/

/**
 * This plugin will fix a 404 error when viewing a paginated category listing of 
 * a custom post type when the custom permalink string is /%category%/%postname%/
 * The problem is the request only checks for items with the 'post' type
 * To fix the problem, add custom post types to the request
 */
function fix_category_pagination($qs){
	if(isset($qs['category_name']) && isset($qs['paged'])){
		$qs['post_type'] = get_post_types($args = array(
			'public'   => true,
			'_builtin' => false
		));
		array_push($qs['post_type'],'post');
	}
	return $qs;
}
add_filter('request', 'fix_category_pagination');
?>
