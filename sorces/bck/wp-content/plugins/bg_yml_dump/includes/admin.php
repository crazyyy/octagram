<?php

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
$max_images_default = 10;

add_action('bg_ymldump_daily_event', 'bg_do_this_daily');
add_action( 'admin_menu', 'bg_dump_yml_menu' );
add_action( 'admin_init', 'bg_dump_yml_register_settings' );
add_action( 'admin_enqueue_scripts', 'bg_dump_yml_register_scripts' );
add_action('plugins_loaded', 'bg_yml_dump_init');

if ( get_option( 'email_addr' ) == '' ) update_option ( 'email_addr', get_option( 'admin_email' ) );
if ( get_option( 'max_imgs' ) == '' ) update_option ( 'max_imgs', $max_images_default );

function bg_yml_dump_init() {
    load_plugin_textdomain( 'bg_yml_dump', false, dirname( plugin_basename( __FILE__ ) ) . '/../languages/'  );
}

function bg_dump_yml_menu() {
    $page = add_options_page ( __( 'YML Dump', 'bg_yml_dump' ), __( 'Product YML Dump', 'bg_yml_dump' ), 'administrator', 'product-yml-dump', 'yml_dump_menu');

    add_action('load-'.$page, 'bg_yml_help_tab');
    add_action('admin_print_scripts-' . $page, 'bg_dump_yml_enqueue_scripts');
    add_action( 'admin_print_styles-' . $page, 'bg_yml_enqueue_style');
}

function yml_dump_menu () {  //Admin menu for Product YML Dump Plugin
        if ( !is_admin () )  {
                wp_die( __( 'You do not have sufficient permissions to access this page.', 'bg_yml_dump' ) );
        }

        bg_yml_check_settings();
        ?>
        <div class="wrap">
        <?php if ( ! class_exists('Woocommerce') ) {  //Woocommerce is NOT active, we are not able to dump anything
            ?> <h2><?php _e( 'Woocommerce is NOT active', 'bg_yml_dump' ); ?></h2>
        <?php } else { ?>
            <h2><?php _e( 'Product YML Dump Settings', 'bg_yml_dump' ); ?></h2>
            <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general_options'; ?>
            <h2 class="nav-tab-wrapper">
                <a href="options-general.php?page=product-yml-dump&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'General Options', 'bg_yml_dump' ); ?></a>
                <a href="options-general.php?page=product-yml-dump&tab=restrictions" class="nav-tab <?php echo $active_tab == 'restrictions' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Restrictions', 'bg_yml_dump' ); ?></a>
            </h2>
         
            <form method="post" enctype="multipart/form-data" id="bg-yml" action="options-general.php?page=product-yml-dump">
            <?php settings_fields( 'yml_dump_settings' );
            ?>
            <?php wp_nonce_field('bg_yml_dump','_wpnonce') ;?>
            <table class="form-table">
                <?php if( $active_tab == 'general_options' ) { ?>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'Short Shop Name', 'bg_yml_dump' ); ?></th>
                        <td><input type="text" name="shop_name" size="35" value="<?php echo esc_attr( get_option('shop_name') ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'Company Name', 'bg_yml_dump' ); ?></th>
                        <td><input type="text" name="company_name" size="35" value="<?php echo esc_attr( get_option('company_name') ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'Agency Name', 'bg_yml_dump' ); ?></th>
                        <td><input type="text" name="agency_name" size="35" value="<?php echo esc_attr( get_option('agency_name') ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'Contact email', 'bg_yml_dump' ); ?></th>
                        <td><input type="text" name="email_addr" size="35" value="<?php echo esc_attr( get_option('email_addr') ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'Vendor', 'bg_yml_dump' ); ?></th>
                        <td><input type="text" name="vendor_name" size="35" value="<?php echo esc_attr( get_option('vendor_name') ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'Hierarchical Category', 'bg_yml_dump' ); ?></th>
                        <td>
                            <fieldset>
                                <?php
                                    $checked = '';
                                    if ( get_option('hierarhical_cats') == 'yes') $checked = 'checked';
                                ?>
                                <input type="checkbox" name="hierarhical_cats" id="hierarhical_cats" <?php echo $checked; ?> />
                                <p class="description"><?php _e( 'Check this box to print hierarhical categories in <code>typePrefix</code> tag.', 'bg_yml_dump'); ?>.</p>
                            </fieldset>
                        </td>
                    </tr>
                <?php } else { ?>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'Category Restrictions', 'bg_yml_dump' ); ?></th>
                        <td>
                            <fieldset>
                                <?php
                                    $checked = '';
                                    if ( get_option('check-restrict') == 'yes') $checked = 'checked';
                                ?>
                                <legend class="screen-reader-text"><span>Category Restrictions</span></legend>
                                <input class="" type="checkbox" name="check-restrict" id="cats_restrict" <?php echo $checked; ?> />
                                <p class="description"><?php _e( 'Check this box if You want some kind of product category restrictions', 'bg_yml_dump'); ?>.</p>
                            </fieldset>
                        </td>
                    </tr>
                    <tr valign="top" id="enable-disable" class="restrict-cats">
                         <th scope="row"><?php _e( 'Enable/Disable categories', 'bg_yml_dump' ); ?></th>
                        <td>
                            <fieldset>
                                <?php 
                                    $checked = 'checked';
                                    $not_checked = '';
                                    if ( get_option('action') == 'exclude') {
                                         $checked = '';
                                         $not_checked = 'checked'; 
                                     }
                                 ?>
                                 <label><input type="radio" id="action" name="action" value="include" <?php echo $checked; ?> /> <?php _e( 'Include', 'bg_yml_dump' ); ?></label>
                                 <label><input type="radio" id="action" name="action" value="exclude" <?php echo $not_checked; ?> /> <?php _e( 'Exclude', 'bg_yml_dump' ); ?></label>
                                 <p class="description"><?php _e( 'Click corresponding button if You want include or exclude product categories listed below', 'bg_yml_dump'); ?>.</p>
                             </fieldset>
                         </td>
                     </tr>
                     <tr valign="top" id="enable-cats" class="restrict-cats">
                         <th scope="row"><?php _e( 'Product categories', 'bg_yml_dump' ); ?></th>
                             <td>
                             <fieldset>
                                 <div id="placeholter_text" include="<?php _e( 'Any category', 'bg_yml_dump' ); ?>" exclude="<?php _e( 'No category', 'bg_yml_dump' ); ?>"></div>
                                 <?php
                                     $placeholder = __( 'Any category', 'bg_yml_dump' );
                                     if ( get_option ('action') == 'exclude' ) $placeholder = __( 'No category', 'bg_yml_dump' );
                                ?>
                                <select id="product_categories" name="product_categories[]" style="width: 50%; display:none"  class="wc-enhanced-select" multiple="multiple" data-placeholder="<?php echo $placeholder; ?>">
                                    <?php
                                       // $category_ids = (array) get_post_meta( $post->ID, 'product_categories', true );
                                        $category_ids = get_option('categories');
                                        $categories   = get_terms( 'product_cat', 'orderby=name&hide_empty=0' );

                                        if ( $categories ) foreach ( $categories as $cat ) {
                                            echo '<option value="' . esc_attr( $cat->term_id ) . '"' . selected( in_array( $cat->term_id, $category_ids ), true, false ) . '>' . esc_html( $cat->name ) . '</option>';
                                        }
                                    ?>
                                </select>
                                <p class="description"><?php _e( 'Click input field and choose categories You want to be in the list', 'bg_yml_dump'); ?>.</p>
                            </fieldset>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'Max. images per product', 'bg_yml_dump' ); ?></th>
                        <td>
                            <fieldset>
                                <input type="number" step="1" min="1" max="999" name="max_imgs" value="<?php echo (int)get_option('max_imgs'); ?>" />
                                <p class="description"><?php _e( 'Max. number images URL per product in YML dump.', 'bg_yml_dump'); ?>.</p>
                            </fieldset>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <?php submit_button(); ?>
            </form>
        <?php } ?>
        </div><?php
}

function bg_yml_check_settings() {
    if( !(isset($_POST['action'] ) && (( 'include' == $_POST['action'] ) || ( 'exclude' == $_POST['action'] ) || ( 'update' == $_POST['action'] ))))
        return false;

    if( !current_user_can('manage_options') )
        wp_die('');

    check_admin_referer( 'bg_yml_dump','_wpnonce');

    if ( isset( $_POST['shop_name'] ))
        update_option( 'shop_name', sanitize_text_field( strip_tags( stripslashes( $_POST['shop_name']))));
    if ( isset( $_POST['company_name'] ))
        update_option( 'company_name', sanitize_text_field( strip_tags( stripslashes( $_POST['company_name'] ))));
    if ( isset( $_POST['agency_name'] ))
        update_option( 'agency_name', sanitize_text_field( strip_tags( stripslashes( $_POST['agency_name'] ))));
    if ( isset( $_POST['email_addr'] ))
        update_option( 'email_addr', sanitize_email( $_POST['email_addr'] ));
    if ( isset( $_POST['vendor_name'] ))
        update_option( 'vendor_name', sanitize_text_field( strip_tags( stripslashes( $_POST['vendor_name'] ))));
    if ( isset( $_POST['hierarhical_cats'] )) {
        ( $_POST['hierarhical_cats'] == 'on' ) ? $hc = 'yes' : $hc = 'no';
        update_option( 'hierarhical_cats', $hc );
    } else {
        update_option( 'hierarhical_cats', 'no' );
    }
    if ( isset( $_POST['check-restrict'] )) {
        ( $_POST['check-restrict'] == 'on' ) ? $restriction = 'yes' : $restriction = 'no';
        update_option( 'check-restrict', $restriction );
    } else {
        update_option( 'check-restrict', 'no' );
    }
    if ( get_option('check-restrict') == 'yes' ) {
        if ( isset( $_POST['action'] )) {
            ( $_POST['action'] == 'include' ) ? $action = 'include' : $action = 'exclude';
            update_option( 'action', $action );
        }
        if ( isset( $_POST['product_categories'] )) {
            update_option( 'categories', (array) $_POST['product_categories'] );
        } else {
            update_option( 'categories', array() );
        }
    }
    if ( isset( $_POST['max_imgs'] )) {
        update_option( 'max_imgs', (int)$_POST['max_imgs'] );
    }
}

function bg_dump_yml_register_settings () { // Register settings for Product YML Dump plugin
        register_setting( 'yml_dump_settings', 'shop_name' );
        register_setting( 'yml_dump_settings', 'company_name' );
        register_setting( 'yml_dump_settings', 'agency_name' );
        register_setting( 'yml_dump_settings', 'email_addr' );
        register_setting( 'yml_dump_settings', 'vendor_name' );
        register_setting( 'yml_dump_settings', 'check-restrict' );
        register_setting( 'yml_dump_settings', 'action' );
        register_setting( 'yml_dump_settings', 'categories' );
        register_setting( 'yml_dump_settings', 'max_imgs' );
        register_setting( 'yml_dump_settings', 'hierarhical_cats' );
}

// Adding scheduled function to dump woocommerce categories and products
// to YML (Yandex Markup Language) format
register_activation_hook( $bg_yml_plugin_dir, 'bg_ymldump_activation');

// remove scheduled function during plugin deactivation
register_deactivation_hook( $bg_yml_plugin_dir, 'bg_ymldump_deactivation');
register_uninstall_hook( $bg_yml_plugin_dir, 'bg_yml_uninstall' );

function bg_ymldump_activation($networkwide) {

    if (function_exists('is_multisite') && is_multisite()) {
        if ($networkwide) {
            $msg = __( 'Network-wide activation for BG_YML_DUMP plugin does not work. Sorry...</br>', 'bg_yml_dump' );
            $msg .= __( 'You may activate BG_YML_DUMP plugin on site only.', 'bg_yml_dump' );
            wp_die( $msg, 'Site only', array( 'response' => 500, 'back_link' => true ));
        }
    }

    wp_schedule_event( current_time( 'timestamp' ), 'hourly', 'bg_ymldump_daily_event');
}

function bg_ymldump_deactivation() {
    wp_clear_scheduled_hook('bg_ymldump_daily_event');
}

function bg_yml_uninstall() {

    if ( $bg_yml_plugin_dir != WP_UNINSTALL_PLUGIN ) return;

    delete_option( 'shop_name' );
    delete_option( 'company_name' );
    delete_option( 'agency_name' );
    delete_option( 'email_addr' );
    delete_option( 'vendor_name' );
    delete_option( 'check-restrict' );
    delete_option( 'action' );
    delete_option( 'categories' );
    delete_option( 'max_imgs' );
    delete_option( 'hierarhical_cats' );
}

function bg_dump_yml_register_scripts() {
    wp_register_style( 'woocommerce_admin_styles-css', plugins_url() . '/woocommerce/assets/css/admin.css');
    wp_register_script( 'wc-enhanced-select', plugins_url() . '/woocommerce/assets/js/admin/wc-enhanced-select.min.js', array( 'jquery', 'select2' ), WC_VERSION );
    wp_register_script( 'bg_yml_admin', plugins_url('js/script.js', dirname(__FILE__)), array( 'jquery', ));
}

function bg_yml_enqueue_style() {
    global $wp_scripts;

    wp_enqueue_style( 'woocommerce_admin_styles-css' );
    $jquery_version = isset( $wp_scripts->registered['jquery-ui-core']->ver ) ? $wp_scripts->registered['jquery-ui-core']->ver : '1.10.4';

    wp_enqueue_style( 'jquery-ui-style' , '//code.jquery.com/ui/' . $jquery_version . '/themes/smoothness/jquery-ui.css', array(), $jquery_version );
    wp_enqueue_style( 'panel-style' );
}

function bg_dump_yml_enqueue_scripts() {

    wp_enqueue_script( 'wc-enhanced-select' );
    wp_enqueue_script( 'bg_yml_admin' );

}

function bg_yml_help_tab () {
    $screen = get_current_screen();

    $screen->add_help_tab( array(
        'id'            => 'overview',
        'title'         => __( 'Overview', 'bg_yml_dump' ),
        'content'       =>
            '<p>' . __( 'This screen displays settings for BG_YML_Dump plugin. You can customize this settings to suit your workflow.', 'bg_yml_dump' ) . '</p>'
    ) );

    $screen->add_help_tab( array(
        'id'            => 'screen-content',
        'title'         => __( 'Screen Content', 'bg_yml_dump' ),
        'content'       =>
            '<p>' . __( 'This screen contains two tabs. The first  is "<strong>General Settings</strong>" and the second is "<strong>Restrictions</strong>".', 'bg_yml_dump' ) . '</p>'
    ) );

    $screen->add_help_tab( array(
        'id'            => 'general-settings',
        'title'         => __( 'General Settings Tab', 'bg_yml_dump' ),
        'content'       =>
            '<p>' . __( 'You can set up your BG_YML_Dump plugin entering (changing) following:', 'bg_yml_dump' ) . '</p>' .
            '<ul>' .
            '<li>' . __( 'Short shop name is the short name for your online shop, like "<strong>example.com</strong>"','bg_yml_dump' ) . '</li>' .
            '<li>' . __( 'Company name is Owner on-line shop company name, like "<strong>Best Products, Ltd</strong>"','bg_yml_dump' ) . '</li>' .
            '<li>' . __( 'Agency name is WEB-design agency or WEB-master name, like "<strong>Best WEB-Design, Ltd</strong>"','bg_yml_dump' ) . '</li>' .
            '<li>' . __( 'Contact e-mail is WEB-designer email address','bg_yml_dump' ) . '</li>' .
            '<li>' . __( 'Vendor is Products vendor name','bg_yml_dump' ) . '</li>' .
            '<li>' . __( 'Checking "<strong>Hierarchical Category</strong>" You can dump all category tree in <code>typePrefix</code> tag.','bg_yml_dump' ) . '</li>' .
            '</ul>' .
            '<p>' . __( 'As You satisfied what You entered (changed) click "<strong>Save Settings</strong>" button', 'bg_yml_dump' ) . '</p>'
    ) );

    $screen->add_help_tab( array(
        'id'            => 'restrictions',
        'title'         => __( 'Restrictions Tab', 'bg_yml_dump' ),
        'content'       =>
            '<p>' . __( 'You can set up your BG_YML_Dump category restrictions and max. images URL per product here.', 'bg_yml_dump' ) . '</p>' .
            '<ul>' .
            '<li>' . __( 'Checking "<strong>Category Restrictions</strong>" You can open filds to enter product categories to include only or exclude from YML Dump.','bg_yml_dump' ) . '</li>' .
            '<li>' . __( 'Clicking "<strong>Include</strong>" or "<strong>Exclude</strong>" radio button, You choose if You want to include only listed below catecories in YML Dump or exclude them.','bg_yml_dump' ) . '</li>' .
            '<li>' . __( 'Clicking field  "<strong>Product categories</strong>" You can choose categories You want to include/exclude.','bg_yml_dump' ) . '</li>' .
            '<li>' . __( 'In the field  "<strong>Max. images per product</strong>" You can limit max. quantity images URL per product dump.','bg_yml_dump' ) . '</li>' .
            '</ul>' .
            '<p>' . __( 'As You satisfied what You entered (changed) click "<strong>Save Settings</strong>" button', 'bg_yml_dump' ) . '</p>'
    ) );

    $screen->set_help_sidebar(
        '<p><strong>' . __('For more information:', 'bg_yml_dump' ) . '</strong></p>' .
        '<p><a href="http://www.stseprounof.org/bg_yml_dump/" target="_blank">' . __('Documentation on BG_YML_Dump Plugin', 'bg_yml_dump') . '</a></p>' .
        '<p><a href="http://www.stseprounof.org/forum/forum-na-stseprounof-org/bg_yml_dump_support/" target="_blank">' . __('Support Forum', 'bg_yml_dump' ) . '</a></p>'
    );
}

