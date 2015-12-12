=== Custom Post Type Category Pagination Fix ===
Contributors: jdantzer
Tags: custom post type, category, pagination, 404 error
Requires at least: 2.9
Tested up to: 3.0.1
Stable tag: 3.0.1

Fixes 404 error when attempting to view paginated custom post type category listing page greater than one

== Description ==

Adapted from Rahnas 'Category pagination fix', with help from http://www.ballyhooblog.com/add-custom-post-types-wordpress-main-feed/

Fixes a bug in Wordpress 3 ( possibly in lower versions ) when viewing a category listing page pagination, consisting of custom post types, when using the permalink structure %category%/%postname%. After the first page, the URL will be something like cat-name/page/2 and will return a 404 error page. The problem is that the request is only checking for posts with post type 'post', within the specified category. By adding all custom post types to the request, pagination will work as expected.

== Installation ==

1. Upload `cpt-category-pagefix.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Done