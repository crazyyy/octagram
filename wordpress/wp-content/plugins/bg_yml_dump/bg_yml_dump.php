<?php
/*
 * Version: 2.0
 * Plugin Name: bg_yml_dump
 * Plugin URI: http://www.stseprounof.org/yml-dump-wordpress-woocommerce-on-line-shop-content/
 * Description: Creates file with woocommerce categories and products YML dump 
 * Author URI: http://www.stseprounof.org
 * Author: Sergios Tseprounof 
 * Text Domain: bg_yml_dump
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @package WordPress
 * @author stseprounof
 * @since 1.0.0
*/
/*  Copyright 2015  S.Tseprounof  (email : tsg@bugalux.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

$bg_yml_plugin_dir = __FILE__;

if ( is_admin()) {
    include_once( plugin_dir_path( __FILE__ ) . 'includes/admin.php' );
}

function bg_do_this_daily() {
    bg_yml_dump ();
}
add_action('bg_ymldump_daily_event', 'bg_do_this_daily');

// Shortcode [bg-wc-uml-dump] to create categories and products dump in YML
add_shortcode('bg-wc-uml-dump','bg_yml_dump');

function  bg_yml_dump () {

if ( ! class_exists('Woocommerce') ) return; //Woocommerce is NOT active, we are not able to dump anything

    /*
     * Getting file name from site URL and open it to write a new content
     * if file exists, it'll be deleted
    */

    $dir_name = ABSPATH . '/yml/';
    $dir_name = apply_filters('bg_yml_dir_name', $dir_name);
    if ( ! file_exists ( $dir_name ) ) {
        mkdir( $dir_name, 0700);
    } else {
       if ( ! is_writable  ( $dir_name ) ) chmod ( $dir_name, 0700 );
    }  
    $file_name = str_replace( '.', '_', str_replace(array('http://', 'https://'), '', site_url()));
    $file_path = $dir_name . $file_name . '.xml';
    $fl = fopen ( $file_path, 'w' );
    /*
     * XML header
    */
    fwrite ($fl, '<?xml version="1.0" encoding="UTF-8" ?>' . "\n");
    fwrite ($fl, '<!DOCTYPE yml_catalog SYSTEM "shops.dtd">' . "\n");
    fwrite ($fl, '<yml_catalog date="' . date("Y-m-d H:i") . '">' . "\n" . '<shop>' . "\n");
    /*
     *   Shop section
    */
    fwrite ($fl, '<name>' . get_option( 'shop_name', '' ) . "</name>\n");
    fwrite ($fl, '<company>' . get_option( 'company_name', '' ) . "</company>\n");
    fwrite ($fl, '<url>' . site_url() . "</url>\n");
    fwrite ($fl, '<agency>' . get_option( 'agency_name', '' ) . "</agency>\n");
    fwrite ($fl, '<email>' . get_option( 'email_addr', '' ) . "</email>\n");
    /*
     * Currency section
    */
    fwrite ($fl, '<currencies>' . "\n");
    fwrite ($fl, '  <currency id="' . get_woocommerce_currency() . '" rate="1"/>' . "\n");
    create_currency_strings ( $fl );
    fwrite ($fl, '</currencies>' . "\n");
    /*
     * Product categories section
    */
    fwrite ($fl, '<categories>' . "\n");
    $needed_cats = create_cats ( $fl);
    fwrite ($fl, '</categories>' . "\n");
    /*
     * Offers section (products list)
    */
    fwrite ($fl, '<offers>' . "\n");
    create_prods ( $fl, $needed_cats );
    fwrite ($fl, '</offers>' . "\n");
    /*
     * Close XML and file
    */
    fwrite ($fl, '</shop>' . "\n" . '</yml_catalog>' . "\n");fclose ( $fl );
}

function create_currency_strings ( $fl ) {
    $main_currency = get_woocommerce_currency();
    $cb = 'CB';
    switch ( $main_currency ) {
        case 'RUR' : $cb = 'CBRF'; break;
        case 'UAH' : $cb = 'NBU'; break;
        case 'KZT' : $cb = 'NBK'; break;
        break;
    }
    $avail_contries = get_option ( 'woocommerce_specific_allowed_countries');
    foreach ( $avail_contries as $country ) {
        $currency = ''; 
        switch ( $country ) {
            case 'BY' : $currency = 'BYR'; break;
            case 'RU' : $currency = 'RUB'; break;
            case 'UA' : $currency = 'UAH'; break;
            case 'KZ' : $currency = 'KZT'; break;
            break;
        }
        if ( $currency != $main_currency ) {
            fwrite ($fl, '  <currency id="' . $currency . '" rate="' . $cb . '"/>' . "\n");
        }
    }
}

function create_prods ( $fl, $needed_cats ) {
    $temp_post = $post;
    wp_reset_postdata();
    global $post;

    $bg_args = array( 
            'orderby' => 'ID', 
            'post_type' => 'product', 
            'cache_results'  => false,
            'posts_per_page' => -1,
            'post_status' => 'publish' 
    );
    $products = new WP_Query( $bg_args );
    if ( $products->have_posts() ) { 
        while ( $products->have_posts() ) : $products->the_post();
            $product = new WC_Product( $post->ID );
            dump_product( $fl, $product, $needed_cats ); //creates product YML structure
        endwhile;
    }
    wp_reset_postdata();
    $post = $temp_post; 
}

function dump_product( $fl, $product, $needed_cats ) {

    ( get_option('check-restrict') == 'yes' ) ? $restrict = true : $restrict = false; 

    $categories = get_the_terms( $product->id, 'product_cat');
    foreach ( $categories as $key => $cat ) {
        if ( ! in_array( $cat->term_id, $needed_cats)) unset( $categories[$key] );
    }

    if  ( $restrict  &&  empty( $categories )) return;
    $currency = get_woocommerce_currency();
    $avl = $product->is_in_stock( ) ? 'true' : 'false';
    fwrite ( $fl, '<offer id="' . $product->id . '" type="vendor.model" available="' . $avl . '">' . "\n"); 

    fwrite ( $fl, '<url>' . get_permalink() . '</url>' . "\n");
    make_price ( $fl, $product );
    fwrite ( $fl, '<currencyId>' . $currency . '</currencyId>' . "\n");
    if ( ! empty( $categories )) {
        $cats = array_shift( $categories ) ;
        fwrite ( $fl, '<categoryId>' . $cats->term_id . "</categoryId>\n");
        $type_prefix = create_type_prefix( $cats, $needed_cats ) ;
    } else {
        fwrite ( $fl, "<categoryId>0</categoryId>\n");
        $type_prefix = '';
    }
    fwrite ( $fl, '<picture>' . wp_get_attachment_url( get_post_thumbnail_id($product->post->ID, 'full' ) ) . '</picture>' . "\n");
    (( get_option( 'max_imgs' ) - 1 ) > 1 ) ? $max_imgs = get_option( 'max_imgs' ) - 1 : $max_imgs = 1; 
    $pictIDs =  array_slice( $product->get_gallery_attachment_ids( ), 0, $max_imgs );
    foreach ( $pictIDs as $picID ) {
        fwrite ( $fl, '<picture>' . wp_get_attachment_url( $picID ) . '</picture>' . "\n");
    }
    $title = strip_tags($product->get_title());
    $title =  str_replace( '&nbsp;', '', $title);
    $type_prefix = apply_filters('bg_yml_type_prefix', $type_prefix, $product);
    fwrite ( $fl, '<typePrefix>' . $type_prefix . "</typePrefix>\n");
    fwrite ($fl, '<vendor>' . bg_get_brand($fl, $product) . "</vendor>\n");
    fwrite ( $fl,  '<model> ' . $title  . ' </model>' . "\n");
    $prod_str = $product->post->post_excerpt . "\n" . $product->post->post_content;
    $prod_str = strip_tags($prod_str);
    $prod_str =  str_replace( '&nbsp;', '', $prod_str);

    $product_extra_tags = '';
    $product_extra_tags = apply_filters('bg_yml_extra_tags', $product_extra_tags, $product);
    if ( $product_extra_tags != '' ) {
        fwrite ( $fl, $product_extra_tags );
    }

    fwrite ( $fl, '<description>' . strip_tags($prod_str) . '</description>' . "\n");

    make_params ( $fl, $product );

    fwrite ( $fl, '</offer>' . "\n");
}

function  create_type_prefix( $cat, $cats ) {
    if ( get_option( 'hierarhical_cats' ) == 'no' ) return $cat->name;

    $parent = $cat;
    $prefix = $cat->name;
    $i = 1;
    while ( $i != 0 ) {
        $i = 0;
        if (( $parent->parent != 0 ) && ( in_array($parent->parent, $cats ))) {
            $parent = get_term_by ( 'id', $parent->parent, 'product_cat' );
            $prefix = $parent->name . '/' . $prefix;
            array_push( $parents, $parent );
            $i++;
        }
    }
    return $prefix;   
}

function bg_get_brand($fl, $product) {

    $attrs = $product->get_attributes( );
    foreach ( $attrs as $attr ) {
        $attr_name = $attr['name'];
        if ( str_replace('pa_', '', $attr_name) == 'brand' ) {
            $terms = get_the_terms( $product->id, $attr['name'] );
            if ( $terms[0]->name != '' ) return $terms[0]->name;
        }
    }
    return get_option( 'vendor_name', '' );
}

function make_params ( $fl, $product ) {
    global $wpdb;

    $all_attrs = array ();

    $terms = wp_get_object_terms( $product->id, 'product_type'); 
    $product_type = sanitize_title( current( $terms )->name );
    switch ($product_type) {
    case 'variable' :
        $product_attributes = $wpdb->get_results( "SELECT attribute_label,attribute_name FROM {$wpdb->prefix}woocommerce_attribute_taxonomies");
        foreach ( $product_attributes as $attribute ) {
            $attr_name = 'pa_' . $attribute->attribute_name;
            $all_attrs[$attr_name] = $attribute->attribute_label;
        }
        $attrs = $product->get_attributes( );
        foreach ( $attrs as $attr ) {
            if ( $attr['is_variation'] == '1') {
                $terms = get_the_terms( $product->id, $attr['name'] );
                $term_str = '';
                foreach ( $terms as $term ) {
                    if ( $term_str != '' ) $term_str = $term_str . ',';
                    $term_str = $term_str . $term->name;
                }
                if (  $term_str != '' )  {
                    $term_str = '<param name="' . $all_attrs[$attr['name']] . '">' . $term_str . "</param>\n";
                    fwrite ( $fl, $term_str);
                }
            }
        }
        break;
    case 'simple':
        break;
    break;
    }
}

function make_price ( $file, $prod ) {
    if ( $prod->get_price() !== '' ) {
        if ( $prod->is_on_sale() ) {  // The product is on sale, We need two prices
            fwrite ( $file, '<price>' . $prod->get_sale_price() . '</price>' . "\n");
            fwrite ( $file, '<oldprice>' . $prod->get_regular_price() . '</oldprice>' . "\n");
        } elseif ( $prod->get_price() > 0 ) {  // The product is not on sale, only regular price
            fwrite ( $file, '<price>' . $prod->get_price() . '</price>' . "\n");
        } else {  // The product has negative or zero price, We assume it's free and put zero
            fwrite ( $file, "<price>0</price>\n"); 
        }
    } else {
        fwrite ( $fl, "<price>0</price>\n");  // No price -> We put zero
    }
}

function create_cats ( $fl) {
    $taxonomy     = 'product_cat';
    $orderby      = 'id';  
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no  
    $title        = '';  
    $empty        = 0;
    $args = array(
      'taxonomy'     => $taxonomy,
      'orderby'      => $orderby,
      'show_count'   => $show_count,
      'pad_counts'   => $pad_counts,
      'hierarchical' => $hierarchical,
      'title_li'     => $title,
      'hide_empty'   => $empty
    );
    $all_categories = get_categories( $args );
    $needed_categories =  bg_yml_check_category( $all_categories );
    foreach ($needed_categories as $cat) {
        $cat_str = '  <category id="' . $cat->term_id . '"';
        if ($cat->parent != '0' ) {
            $cat_str = $cat_str . ' parentId="' . $cat->parent . '"';
        }
        fwrite ($fl, $cat_str . '>' . $cat->name . '</category>' . "\n");
    }
    return wp_list_pluck( $needed_categories, 'term_id' );
}

function bg_yml_check_category( $cats ) {

    if ( get_option('check-restrict') == 'no' ) return $cats;
     
    $needed_cats = array();
    $list_cats = get_option('categories');
    $action = get_option('action');
    foreach ( $cats as $cat ) {
        if ( $action == 'include' ) {
            if ( in_array( $cat->term_id, $list_cats )) array_push( $needed_cats, $cat );
        } elseif ( $action == 'exclude' ) {
            if ( !in_array( $cat->term_id, $list_cats)) array_push( $needed_cats, $cat );
        }
    }
    if ( $action == 'include' ) {
        $i = 1;
        while ( $i != 0 ) {
            $i = 0;
            foreach ( $needed_cats as $needed ) {
                foreach ( $cats as $cat ) {
                    if ( $cat->parent == $needed->term_id ) {
                        if ( ! in_array( $cat, $needed_cats )) {
                            array_push( $needed_cats, $cat );
                            $i++;
                        }
                    }
                }
            }
        }
        $needed_ids = wp_list_pluck( $needed_cats, 'term_id' );
        foreach ( $needed_cats as $needed ) {
            if ( ! in_array( $needed->parent, $needed_ids )) $needed->parent = 0; 
        }
    } elseif ( $action == 'exclude' ) {
        $i = 1;
        while ( $i != 0 ) {
            $i = 0;
            $needed_ids = wp_list_pluck( $needed_cats, 'term_id' );
            foreach ( $needed_cats as $key => $needed ) {
                if (( $needed->parent != 0 ) && ( !in_array($needed->parent, $needed_ids ))) {
                    unset( $needed_cats[$key]);
                    $i++;
                }
            }
        }
    }
    return $needed_cats;
}

function dx_log($msg){
    $logfile = '/tmp/dump_xml.log';
    file_put_contents($logfile,date("Y-m-d H:i:s")." | ".$msg."\n",FILE_APPEND);
}

?>
