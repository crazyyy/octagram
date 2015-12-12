<?php
/*
 *  Author: knaipa | @Saitobaza
 *  URL: saitobaza.ru
 *  Custom functions, support, custom post types and more.
 */

//  Enable styles for WP admin panel
add_action('admin_enqueue_scripts', 'wpeAdminThemeStyle');
function wpeAdminThemeStyle() {
  wp_enqueue_style('wpe-admin-style', get_template_directory_uri() . '/css/admin.css');
  wp_enqueue_style('wpe-admin-script', get_template_directory_uri() . '/js/admin.js');
  wp_enqueue_style('wpe-admin-style', get_template_directory_uri() . '/css/editor-style.css');
}

//  Catch first image from post and display it
function catchFirstImage() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
    $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){
    $first_img = get_template_directory_uri() . '/img/noimage.jpg'; }
    return $first_img;
}

add_action('wp_enqueue_scripts', 'wpeStyles'); // Add Theme Stylesheet
function wpeStyles()  {

  // wp_dequeue_style('fancybox');
  // wp_dequeue_style('wp_dequeue_style');

  wp_register_style('wpeasy-style', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
  wp_enqueue_style('wpeasy-style'); // Enqueue it!
}

add_action('init', 'wpeHeaderScripts'); // Add Scripts to wp_head
function wpeHeaderScripts() {
  if (!is_admin()) {
    wp_deregister_script('jquery'); // Deregister WordPress jQuery   RU: Отключаю стандартный JQuery WordPress'а
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', array(), '1.11.0'); // Google CDN jQuery   RU: Регистрирую JQuery с хостинга Google
    wp_enqueue_script('jquery'); // Enqueue it!    RU: Подключаю его

    wp_register_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.8.3'); // Modernizr
    wp_enqueue_script('modernizr'); // Enqueue it!

    //  Load footer scripts (footer.php)
    wp_register_script('tempsrt', get_template_directory_uri() . '/js/accounting.min.js', array(), '1.0.0', true); // Custom scripts
    wp_enqueue_script('tempsrt'); // Enqueue it!

    //  Load footer scripts (footer.php)
    wp_register_script('wpeScripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true); // Custom scripts
    wp_enqueue_script('wpeScripts'); // Enqueue it!
  }
}

//  Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action('wp_head', array(
    $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
    'recent_comments_style'
  ));
}

add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination() {
  global $wp_query;
  $big = 999999999;
  echo paginate_links(array(
    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages
  ));
}

add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
// Remove Admin bar
function remove_admin_bar() {
  return false;
}

add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ) {
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}

add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults) {
  $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
  $avatar_defaults[$myavatar] = "Custom Gravatar";
  return $avatar_defaults;
}

add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
// Threaded Comments
function enable_threaded_comments() {
  if (!is_admin()) {
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script('comment-reply');
    }
  }
}

add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );
function filter_media_comment_status( $open, $post_id ) {
  $post = get_post( $post_id );
  if( $post->post_type == 'attachment' ) {
    return false;
  }
  return $open;
}


add_filter ( 'wp_tag_cloud', 'tag_cloud_current_tag_highlight' );
function tag_cloud_current_tag_highlight( $return ) {
  $post_tags = array();
  if(is_single()) {
    global $post;
    $post_tags = get_the_terms($post->ID,'post_tag');
  }
  if(is_tag()) {
    $tags = explode( '+', get_query_var('tag') );
  foreach( $tags as $tag ) { $post_tags[] = get_term_by('slug',$tag,'post_tag'); }
  }
  if( $post_tags ) {
    foreach ($post_tags as $pt) {
      $tag = $pt->term_id;
        if(preg_match("#-link-" . $tag . "' #", $return)) {
        $return = str_replace("link-" . $tag . "' ", "link-" . $tag . " current-term' ", $return);
        }
      }
  }
return $return;
}

function post_type_tags( $post_type = 'mydiler' ) {
    global $wpdb;

    if ( empty( $post_type ) ) {
        $post_type = get_post_type();
    }

    return $wpdb->get_results( $wpdb->prepare( "
        SELECT COUNT( DISTINCT tr.object_id )
            AS count, tt.taxonomy, tt.description, tt.term_taxonomy_id, t.name, t.slug, t.term_id
        FROM {$wpdb->posts} p
        INNER JOIN {$wpdb->term_relationships} tr
            ON p.ID=tr.object_id
        INNER JOIN {$wpdb->term_taxonomy} tt
            ON tt.term_taxonomy_id=tr.term_taxonomy_id
        INNER JOIN {$wpdb->terms} t
            ON t.term_id=tt.term_taxonomy_id
        WHERE p.post_type=%s
            AND tt.taxonomy='post_tag'
        GROUP BY tt.term_taxonomy_id
        ORDER BY name ASC
    ", $post_type ) );
}


//  Register Menu
register_nav_menus(
  array (
    'pmenu'=> __( 'Primary Menu', 'octagram' ),
  )
);
//  Register Menu

// Add news Post Type
add_action( 'init', 'create_news_post_type' );
function create_news_post_type() {
  $args = array(
    'description' => 'News Post Type',
    'show_ui' => true,
    'menu_position' => 4,
    'exclude_from_search' => false,
    'labels' => array(
      'name'=> 'Новости',
      'singular_name' => 'Новости',
      'add_new' => 'Добавить новость',
      'add_new_item' => 'Добавить новость',
      'edit' => 'Редактировать',
      'edit_item' => 'Редактировать',
      'new-item' => 'Добавить новость',
      'view' => 'Показать',
      'view_item' => 'Показать',
      'search_items' => 'Искать',
      'not_found' => 'Ничего нет',
      'not_found_in_trash' => 'Ничего нет',
      'parent' => 'Дочерний'
     ),
    'public' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array('title','editor','thumbnail',
    'custom-fields', 'comments'),
    'rewrite' => true
  );
  register_post_type( 'news' , $args );
}

add_action( 'init', 'create_blog_post_type' );
function create_blog_post_type() {
  $args = array(
    'description' => 'blog Post Type',
    'show_ui' => true,
    'menu_position' => 4,
    'exclude_from_search' => false,
    'labels' => array(
      'name'=> 'Блог',
      'singular_name' => 'Блог',
      'add_new' => 'Добавить',
      'add_new_item' => 'Добавить',
      'edit' => 'Редактировать',
      'edit_item' => 'Редактировать',
      'new-item' => 'Добавить',
      'view' => 'Показать',
      'view_item' => 'Показать',
      'search_items' => 'Искать',
      'not_found' => 'Ничего нет',
      'not_found_in_trash' => 'Ничего нет',
      'parent' => 'Дочерний'
     ),
    'public' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array('title','editor','thumbnail',
    'custom-fields', 'comments'),
    'rewrite' => true
  );
  register_post_type( 'blog' , $args );
}

// Add news Post Type
add_action( 'init', 'create_customers_post_type' );
function create_customers_post_type() {
  $args = array(
    'description' => 'customers Post Type',
    'show_ui' => true,
    'menu_position' => 4,
    'exclude_from_search' => false,
    'labels' => array(
      'name'=> 'Клиенты',
      'singular_name' => 'Клиенты',
      'add_new' => 'Добавить клиента',
      'add_new_item' => 'Добавить клиента',
      'edit' => 'Редактировать',
      'edit_item' => 'Редактировать',
      'new-item' => 'Добавить клиента',
      'view' => 'Показать',
      'view_item' => 'Показать',
      'search_items' => 'Искать',
      'not_found' => 'Ничего нет',
      'not_found_in_trash' => 'Ничего нет',
      'parent' => 'Дочерний'
    ),
     'public' => true,
     'capability_type' => 'post',
     'hierarchical' => false,
     'rewrite' => true
    );
  register_post_type( 'customers' , $args );
}

// Add news Post Type
add_action( 'init', 'create_distr_post_type' );
function create_distr_post_type() {
  $args = array(
    'description' => 'distr Post Type',
    'show_ui' => true,
    'menu_position' => 4,
    'exclude_from_search' => false,
    'labels' => array(
      'name'=> 'Дистрибутивы',
      'singular_name' => 'Дистрибутивы',
      'add_new' => 'Добавить',
      'add_new_item' => 'Добавить',
      'edit' => 'Редактировать',
      'edit_item' => 'Редактировать',
      'new-item' => 'Добавить',
      'view' => 'Показать',
      'view_item' => 'Показать',
      'search_items' => 'Искать',
      'not_found' => 'Ничего нет',
      'not_found_in_trash' => 'Ничего нет',
      'parent' => 'Дочерний'
    ),
     'public' => true,
     'capability_type' => 'post',
     'hierarchical' => false,
     'rewrite' => true
    );
  register_post_type( 'distr' , $args );
}

// Add news Post Type
add_action( 'init', 'create_doc_post_type' );
function create_doc_post_type() {
  $args = array(
    'description' => 'doc Post Type',
    'show_ui' => true,
    'menu_position' => 4,
    'exclude_from_search' => false,
    'labels' => array(
      'name'=> 'Документация',
      'singular_name' => 'Документация',
      'add_new' => 'Добавить документ',
      'add_new_item' => 'Добавить документ',
      'edit' => 'Редактировать',
      'edit_item' => 'Редактировать',
      'new-item' => 'Добавить документ',
      'view' => 'Показать',
      'view_item' => 'Показать',
      'search_items' => 'Искать',
      'not_found' => 'Ничего нет',
      'not_found_in_trash' => 'Ничего нет',
      'parent' => 'Дочерний'
    ),
     'public' => true,
     'capability_type' => 'post',
     'hierarchical' => false,
     'rewrite' => true
    );
  register_post_type( 'doc' , $args );
}

add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
  global $post;
  return '';
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content);
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/*
 * Хлебные крошки для WordPress (breadcrumbs)
*/
function kama_breadcrumbs( $sep=' &gt; ' ){

  global $post, $wp_query, $wp_post_types;
  $l = array(
    'home' => 'Главная'
    ,'paged' => 'Страница %s'
    ,'404' => 'Ошибка 404'
    ,'search' => 'Результаты поиска по запросу - <b>%s</b>'
    ,'author' => 'Архив автора: <b>%s</b>'
    ,'year' => 'Архив за <b>%s</b> год'
    ,'month' => 'Архив за: <b>%s</b>'
    ,'day' => ''
    ,'attachment' => 'Медиа: %s'
    ,'tag' => 'Записи по метке: <b>%s</b>'
    ,'tax_tag' => '%s из "%s" по тегу: <b>%s</b>'
  );

  $w1 = '<div class="kama_breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
  $w2 = '</div>';
  $patt1 = '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">';
  $sep .= '</span>'; // закрываем span после разделителя!
  $patt = $patt1.'%s</a>';

  if( $paged = $wp_query->query_vars['paged'] ){
    $pg_patt = $patt1;
    $pg_end = '</a>'. $sep . sprintf($l['paged'], $paged);
  }

  $out = '';
  if( is_front_page() )
    return print $w1.($paged?sprintf($pg_patt, get_bloginfo('url')):'') . $l['home'] . $pg_end .$w2;

  elseif( is_404() )
    $out = $l['404'];

  elseif( is_search() ){
    $out = sprintf( $l['search'], strip_tags($GLOBALS['s']) );
  }
  elseif( is_author() ){
    $q_obj = &$wp_query->queried_object;
    $out = ($paged?sprintf( $pg_patt, get_author_posts_url($q_obj->ID, $q_obj->user_nicename) ):'') . sprintf($l['author'], $q_obj->display_name) . $pg_end;
  }
  elseif( is_year() || is_month() || is_day() ){
    $y_url = get_year_link( $year=get_the_time('Y') );
    $m_url = get_month_link( $year, get_the_time('m') );
    $y_link = sprintf($patt, $y_url, $year);
    $m_link = sprintf($patt, $m_url, get_the_time('F'));
    if( is_year() )
      $out = ($paged?sprintf($pg_patt, $y_url):'') . sprintf($l['year'], $year) . $pg_end;
    elseif( is_month() )
      $out = $y_link . $sep . ($paged?sprintf($pg_patt, $m_url):'') . sprintf($l['month'], get_the_time('F')) . $pg_end;
    elseif( is_day() )
      $out = $y_link . $sep . $m_link . $sep . get_the_time('l');
  }

  // Страницы и древовидные типы записей
  elseif( $wp_post_types[$post->post_type]->hierarchical ){
    $parent = $post->post_parent;
    $crumbs=array();
    while($parent){
      $page = &get_post($parent);
      $crumbs[] = sprintf($patt, get_permalink($page->ID), $page->post_title);
      $parent = $page->post_parent;
    }
    $crumbs = array_reverse($crumbs);
    foreach ($crumbs as $crumb)
      $out .= $crumb.$sep;
    $out = $out . $post->post_title;
  }
  else // Таксономии, вложения и не древовидные типы записей
  {
    // Определяем термины
    if( is_singular() ){
      if( ! $taxonomies ){
        $taxonomies = get_taxonomies( array('hierarchical' => true, 'public' => true) );
        if( count( $taxonomies ) == 1 ) $taxonomies = 'category';
      }
      if( $term = get_the_terms( $post->post_parent ? $post->post_parent : $post->ID, $taxonomies ) ){
        $term = array_shift( $term );
      }
    }
    else
      $term = &$wp_query->get_queried_object();

    if( ! $term && ! is_attachment() )
      return print "Error: Taxonomy is not defined!";

    $pg_term_start = ($paged && $term->term_id) ? sprintf( $pg_patt, get_term_link( (int)$term->term_id, $term->taxonomy ) ) : '';

    if( is_attachment() ){
      if(!$post->post_parent)
        $out = sprintf($l['attachment'], $post->post_title);
      else
        $out = crumbs_tax($term->term_id, $term->taxonomy, $sep, $patt) . sprintf($patt, get_permalink($post->post_parent), get_the_title($post->post_parent) ).$sep.$post->post_title;
    }
    elseif( is_single() )
      $out = crumbs_tax($term->parent, $term->taxonomy, $sep, $patt) . sprintf($patt, get_term_link( (int)$term->term_id, $term->taxonomy ), $term->name). $sep.$post->post_title;
    // Метки, архивная страница типа записи, произвольные одноуровневые таксономии
    elseif( ! is_taxonomy_hierarchical( $term->taxonomy ) ){
      // метка
      if( is_tag() )
        $out = $pg_term_start . sprintf($l['tag'], $term->name) . $pg_end;
      // архивная страница произвольного типа записи
      elseif( !$term->term_id )
        $home_after = sprintf($patt, '/'. $term->name, $term->label). $pg_end;
      // таксономия
      else {
        $post_label = $wp_post_types[$post->post_type]->labels->name;
        $tax_label = $GLOBALS['wp_taxonomies'][$term->taxonomy]->labels->name;
        $out = $pg_term_start . sprintf($l['tax_tag'], $post_label, $tax_label, $term->name) .  $pg_end;
      }
    }
    // Рубрики и таксономии
    else
      $out = crumbs_tax($term->parent, $term->taxonomy, $sep, $patt) . $pg_term_start . $term->name . $pg_end;
  }

  // ссылка на архивную страницу произвольно типа поста
  if( ! $home_after && ! empty($post->post_type) && $post->post_type != 'post' && !is_page() && !is_attachment() )
    $home_after = sprintf($patt, '/'. $post->post_type, $wp_post_types[$post->post_type]->labels->name ). $sep;

  $home = sprintf($patt, get_bloginfo('url'), $l['home'] ). $sep . $home_after;

  return print $w1. $home . $out .$w2;
}
function crumbs_tax($term_id, $tax, $sep, $patt){
  $termlink = array();
  while( (int)$term_id ){
    $term2 = &get_term( $term_id, $tax );
    $termlink[] = sprintf($patt, get_term_link( (int)$term2->term_id, $term2->taxonomy ), $term2->name). $sep;
    $term_id = (int)$term2->parent;
  }
  $termlinks = array_reverse($termlink);
  return implode('', $termlinks);
}

// remove version info from head and feeds
function complete_version_removal() { return ''; }
add_filter('the_generator', 'complete_version_removal');

remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$nop', "return null;" ) );

// remove wps_admin_bar
function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

// register_sidebar footer
register_sidebar(array(
  'id'=>'sidebar-1',
  'name'=>'Сайдбар',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<div class="footerfid">',
    'after_title' => '</div>',
  ));

register_sidebar(array(
  'id'=>'sidebar-2',
  'name'=>'Сайдбар новостей',
  'before_widget' => '<div>',
  'after_widget' => '</div>',
  'before_title' => '<div class="footerfid">',
  'after_title' => '</div>',
));

register_sidebar(array(
  'id'=>'sidebar-3',
  'name'=>'Сайдбар клиентов',
  'before_widget' => '<div>',
  'after_widget' => '</div>',
  'before_title' => '<div class="footerfid">',
  'after_title' => '</div>',
));

register_sidebar(array(
  'id'=>'sidebar-4',
  'name'=>'Сайдбар Документация',
  'before_widget' => '<div>',
  'after_widget' => '</div>',
  'before_title' => '<div class="footerfid">',
  'after_title' => '</div>',
));

register_sidebar(array(
  'id'=>'sidebar-5',
  'name'=>'Диллер\установщик 1-3',
  'before_widget' => '<div>',
  'after_widget' => '</div>',
  'before_title' => '<div class="footerfid">',
  'after_title' => '</div>',
));

register_sidebar(array(
  'id'=>'sidebar-6',
  'name'=>'Диллер\установщик 2-3',
  'before_widget' => '<div>',
  'after_widget' => '</div>',
  'before_title' => '<div class="footerfid">',
  'after_title' => '</div>',
));

register_sidebar(array(
  'id'=>'sidebar-7',
  'name'=>'Диллер\установщик 3-3',
  'before_widget' => '<div>',
  'after_widget' => '</div>',
  'before_title' => '<div class="footerfid">',
  'after_title' => '</div>',
));

// миниатюр для списка записей
add_filter('manage_posts_columns', 'kolonki_zapisei', 5);
function kolonki_zapisei($po_umolchaniu) {
  $po_umolchaniu['miniaturi_postov'] = 'Миниатюра';
  return $po_umolchaniu;
}

add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
function posts_custom_columns($imya_kolonki, $id) {
  if ($imya_kolonki === 'miniaturi_postov') :
      print the_post_thumbnail('thumbnail');
  endif;
}

$themename = "Octagram";
$shortname = "oct";
$zm_categories_obj = get_categories('hide_empty=0');
$zm_categories = array();
foreach ($zm_categories_obj as $zm_cat) {
  $zm_categories[$zm_cat->cat_ID] = $zm_cat->category_nicename;
}
$categories_tmp = array_unshift($zm_categories, "Select a category:");

$options = array (
// настройки футера
  array( "name" => "Настройки шапки",
    "type" => "title",
  ),

  array(  "type" => "open"),

  array(   "name" => "Логотип компании",
    "desc" => "Это должна быть ссылка на изображение",
    "id" => $shortname."_key8",
    "std" => "",
    "type" => "text"),

  array(   "name" => "Номер телефона в шапки",
    "id" => $shortname."_key6",
    "std" => "",
    "type" => "text"),

  array(   "name" => "Часы работы",
    "id" => $shortname."_key7",
    "std" => "",
    "type" => "text"),

  array(   "name" => "Прайс лист",
    "desc" => "Это должна быть ссылка на прайс",
    "id" => $shortname."_key898",
    "std" => "",
    "type" => "text"),

  array(   "name" => "ЦЕНА ГОТОВОГО РЕШЕНИЯ",
    "desc" => "",
    "id" => $shortname."_key1010",
    "std" => "",
    "type" => "text"),

  array(   "name" => "Произвольный css для кнопок",
    "desc" => "",
    "id" => $shortname."_key89995",
    "std" => "",
    "type" => "textarea"),

  array(   "name" => "Кнопка button1 - Продукт, заказть элемнет, верхняя",
    "desc" => "",
    "id" => $shortname."_button1",
    "std" => "",
    "type" => "textarea"),

  array(   "name" => "Кнопка button2 - Продукт,заказать звонок",
    "desc" => "",
    "id" => $shortname."_button2",
    "std" => "",
    "type" => "textarea"),

  array(   "name" => "Кнопка button3 - Решения, заказать рассчет, верхняя",
    "desc" => "",
    "id" => $shortname."_button3",
    "std" => "",
    "type" => "textarea"),

  array(   "name" => "Кнопка button4 - Решения, заказть звонок",
      "desc" => "",
      "id" => $shortname."_button4",
      "std" => "",
            "type" => "textarea"),

      array(   "name" => "Кнопка button5 - Решения, заказать рассчет, нижняя",
      "desc" => "",
      "id" => $shortname."_button5",
      "std" => "",
            "type" => "textarea"),

      array(   "name" => "Кнопка button6 - Система, заказать , верхняя",
      "desc" => "",
      "id" => $shortname."_button6",
      "std" => "",
            "type" => "textarea"),

      array(   "name" => "Кнопка button7 - Система, задать вопрос",
      "desc" => "",
      "id" => $shortname."_button7",
      "std" => "",
            "type" => "textarea"),

      array(   "name" => "Кнопка button8 - Система, заказть, нижняя",
      "desc" => "",
      "id" => $shortname."_button8",
      "std" => "",
            "type" => "textarea"),

      array(   "name" => "Кнопка button10 - форма Жду звонка",
      "desc" => "",
      "id" => $shortname."_button10",
      "std" => "",
            "type" => "textarea"),

      array(   "name" => "Кнопка button11 = форма Задать вопрос",
      "desc" => "",
      "id" => $shortname."_button11",
      "std" => "",
            "type" => "textarea"),

        array(   "name" => "Кнопка button13 - форма Заказать расчет стоимости",
      "desc" => "",
      "id" => $shortname."_button13",
      "std" => "",
            "type" => "textarea"),

        array(  "type" => "close"),

  // настройки футера

array(  "name" => "Настройки футера",
            "type" => "title",
           ),

array(    "type" => "open"),

  array(   "name" => "Текст копирайта",
      "id" => $shortname."_key4",
      "std" => "",
            "type" => "text"),

  array(   "name" => "Мобильный номер телефона",
      "id" => $shortname."_key1",
      "std" => "",
            "type" => "text"),

  array(   "name" => "Стационарный номер телефона",
      "id" => $shortname."_key2",
      "std" => "",
            "type" => "text"),

  array(   "name" => "Адрес электронной почты",
      "id" => $shortname."_key3",
      "std" => "",
            "type" => "text"),

  array(   "name" => "Дополнительный код в футере",
      "desc" => "Здесь можно вставить метрику, аналитику или другие нужные скрипты",
      "id" => $shortname."_key5",
      "std" => "",
            "type" => "textarea"),


array(    "type" => "close"),

// настройки футера

array(  "name" => "Переименовывать",
            "type" => "title",
           ),

array(    "type" => "open"),

  array(   "name" => "Кнопка Заказать - страница решений",
      "id" => $shortname."_k1",
      "std" => "",
            "type" => "text"),

  array(   "name" => "Кнопка закажите обратный звонок - страница решений",
      "id" => $shortname."_k2",
      "std" => "",
            "type" => "text"),

  array(   "name" => "Кнопка заказать нижняя - страница решений",
      "id" => $shortname."_k3",
      "std" => "",
            "type" => "text"),

array(   "name" => "Рекомендуем вам - страница решений",
      "id" => $shortname."_k9",
      "std" => "",
            "type" => "text"),

  array(   "name" => "Лучшие дилеры - страница решений",
      "id" => $shortname."_k10",
      "std" => "",
            "type" => "text"),


  array(   "name" => "Кнопка Заказать - страница систем",
      "id" => $shortname."_k4",
      "std" => "",
            "type" => "text"),

  array(   "name" => "Кнопка Задать вопрос - страница систем",
      "id" => $shortname."_k5",
      "std" => "",
            "type" => "text"),

    array(   "name" => "Кнопка заказать нижняя - страница систем",
      "id" => $shortname."_k6",
      "std" => "",
            "type" => "text"),


  array(   "name" => "Кнопка Купить - страница продукта",
      "id" => $shortname."_k7",
      "std" => "",
            "type" => "text"),

    array(   "name" => "Кнопка заказать звонок - страница продукта",
      "id" => $shortname."_k8",
      "std" => "",
            "type" => "text"),

array(    "type" => "close"),


array(  "name" => "Текст на странице систем",
            "type" => "title",
           ),

array(    "type" => "open"),

  array(   "name" => "Подзаголовок слева",
      "id" => $shortname."_k1777",
      "std" => "",
            "type" => "text"),
   array(   "name" => "Подзаголовок справа",
      "id" => $shortname."_k27777",
      "std" => "",
            "type" => "text"),

array(    "type" => "close"),

 array(  "name" => "Текст на главной",
            "type" => "title",
           ),

array(    "type" => "open"),

  array(   "name" => "Подзаголовок слева",
      "id" => $shortname."_home1777",
      "std" => "",
            "type" => "text"),
   array(   "name" => "Подзаголовок справа",
      "id" => $shortname."_home27777",
      "std" => "",
            "type" => "text"),

array(    "type" => "close"),

 array(  "name" => "Калькулятор на странице решений",
            "type" => "title",
           ),

array(    "type" => "open"),

  array(   "name" => "Использовать калькулятор на странице решений? ",
      "id" => $shortname."_usekalkforsolution",
      "desc" => "Напиши 'да' для использования или оставь поле пустым, для отмены использования калкулятора.",
      "std" => "",
            "type" => "text"),

array(    "type" => "close"),

);



function mytheme_add_admin() {

  global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] );
                update_option( $value['id'], $value['std'] );}

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

      add_theme_page($themename."", "$themename", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {
    global $themename, $shortname, $options;
?>
<div class="wrap">
<div class="opwrap" style="background:#fff; margin:20px auto; width:80%; padding:30px; border:1px solid #ddd;" >

<h2 class="wraphead" style="margin:10px 0px; padding:15px 10px; font-family:arial; font-style:normal; background:#00468c; color: #fff;"><b>Настройки <?php echo $themename; ?></b></h2>

<?php
   if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Настройки шаблона сохранены. </strong></p></div>';
   if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>Настройки шаблона сброшены. </strong></p></div>';
?>
<form method="post">

<?php foreach ($options as $value) {


switch ( $value['type'] ) {

case "image":
?>


<tr>
<td width="30%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="70%"><img src="<?php echo $value['id']; ?>" /></td>
</tr>
<tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<?php break;

case "open":
?>
<table width="100%" border="0" style="background-color:#ececec; padding:10px;">

<?php break;

case "close":
?>

</table><br />
<?php break;

case "break":
?>
<tr><td colspan="2" style="border-top:1px solid #C2DCEF;">&nbsp;</td></tr>

<?php break;

case "title":
?>

<table width="100%" border="0" style="background-color:#5f91bb; padding:5px 10px;">

<tr>
    <td colspan="2"><h3 style="font-size:18px;font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>

<?php break;

case 'text':
?>

<tr>
    <td width="30%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="70%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes (get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea></td>

</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr>
<tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case "checkbox":
?>
    <tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
        <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                </td>
    </tr>

    <tr>
        <td><small><?php echo $value['desc']; ?></small></td>
   </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php         break;

}
}
?>

<p class="submit">
  <input name="save" type="submit" value="Сохранить настройки шаблона" />
  <input type="hidden" name="action" value="save" />
</p>
</form>
  <form method="post">
    <p class="submit">
      <input name="reset" type="submit" value="Сбросить" />
      <input type="hidden" name="action" value="reset" />
    </p>
  </form>

</div>
<?php
}
add_action('admin_menu', 'mytheme_add_admin');

/** Register Custom Post Type */
add_action('init', 'solutions_register');
function solutions_register() {

  $labels = array(
    'name' => _x('Решения', 'post type general name'),
    'singular_name' => _x('Решения', 'post type singular name'),
    'add_new' => _x('Добавить', 'solutions'),
    'add_new_item' => __('Добавить'),
    'edit_item' => __('Редактировать'),
    'new_item' => __('Добавить'),
    'view_item' => __('Показать'),
    'search_items' => __('Искать'),
    'not_found' =>  __('Не найдено'),
    'not_found_in_trash' => __('Не найдено'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'menu_icon' => get_stylesheet_directory_uri() . '/img/book16x16.png',
    'rewrite' => true,
    'has_archive' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,
    'exclude_from_search' => false,
    'supports' => array('title','editor','thumbnail', 'custom-fields', 'comments')
    );
  register_post_type( 'solutions' , $args );
}


// Fake pages' permalinks and titles
$my_fake_pages = array(
  'components' => 'components',
  'documents' => 'documents',
  'clients' => 'clients',
  'feedback' => 'feedback'
);

add_filter('rewrite_rules_array', 'fsp_insertrules');
// Adding fake pages' rewrite rules
function fsp_insertrules($rules) {
  global $my_fake_pages;
  $newrules = array();
  foreach ($my_fake_pages as $slug => $title)
    $newrules['solutions/([^/]+)/' . $slug . '/?$'] = 'index.php?solutions=$matches[1]&fpage=' . $slug;
  return $newrules + $rules;
}

add_filter('query_vars', 'fsp_insertqv');
// Tell WordPress to accept our custom query variable
function fsp_insertqv($vars) {
  array_push($vars, 'fpage');
  return $vars;
}

/** Register Custom Post Type */
add_action('init', 'systems_register');
function systems_register() {

  $labels = array(
    'name' => _x('Системы', 'post type general name'),
    'singular_name' => _x('Системы', 'post type singular name'),
    'add_new' => _x('Добавить', 'systems'),
    'add_new_item' => __('Добавить'),
    'edit_item' => __('Редактировать'),
    'new_item' => __('Добавить'),
    'view_item' => __('Показать'),
    'search_items' => __('Искать'),
    'not_found' =>  __('Не найдено'),
    'not_found_in_trash' => __('Не найдено'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'menu_icon' => get_stylesheet_directory_uri() . '/img/book16x16.png',
    'rewrite' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array('title','editor','thumbnail', 'custom-fields', 'comments')
    );


  register_post_type( 'systems' , $args );
}

 add_action('init', 'mydiler_register');
   function mydiler_register() {

  $labels = array(
    'name' => _x('Дилер', 'mydiler'),
    'singular_name' => _x('Дилеры', 'post type singular name'),
    'add_new' => _x('Добавить', 'mydiler'),
    'add_new_item' => __('Добавить'),
    'edit_item' => __('Редактировать'),
    'new_item' => __('Добавить'),
    'view_item' => __('Показать'),
    'search_items' => __('Искать'),
    'not_found' =>  __('Не найдено'),
    'not_found_in_trash' => __('Не найдено'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'menu_icon' => get_stylesheet_directory_uri() . '/img/user_online.gif',
    'rewrite' => true,
    'has_archive' => true,
    'taxonomies' => array('post_tag'),
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,
    'exclude_from_search' => false,
    'rewrite' => array('slug' => 'mydiler'),
    'supports' => array('title','editor','thumbnail', 'custom-fields', 'comments')
    );

  register_post_type( 'mydiler' , $args );
}



 add_action('init', 'register_installpost_type');
   function register_installpost_type() {

  $labels = array(
    'name' => __('Инсталятор'),
    'singular_name' => __('Инсталятор'),
    'add_new' => __('Добавить'),
    'add_new_item' => __('Добавить'),
    'edit_item' => __('Редактировать'),
    'new_item' => __('Добавить'),
    'view_item' => __('Показать'),
    'search_items' => __('Искать'),
    'not_found' =>  __('Не найдено'),
    'not_found_in_trash' => __('Не найдено'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'menu_icon' => get_stylesheet_directory_uri() . '/img/user_online.gif',
    'rewrite' => true,
    'has_archive' => true,
    'taxonomies' => array('post_tag'),
    'capability_type' => 'post',
    'hierarchical' => true,
    'exclude_from_search' => false,
    'menu_position' => null,
    'supports' => array('title','editor')
  );
  register_post_type( 'install' , $args );
}

add_filter( 'pre_get_posts', 'wpse28145_add_custom_types' );
function wpse28145_add_custom_types( $query ) {
  if( is_tag() && $query->is_main_query() ) {
    // this gets all post types:
    $post_types = get_post_types();
    // alternately, you can add just specific post types using this line instead of the above:
    // $post_types = array( 'post', 'your_custom_type' );
    $query->set( 'post_type', $post_types );
  }
}

add_filter( 'wpcf7_validate_text', 'drc_wpcf7_validate_text' , 10, 2 );
add_filter( 'wpcf7_validate_text*', 'drc_wpcf7_validate_text' , 10, 2 );
function drc_wpcf7_validate_text( $result, $tag ) {
  $type = $tag['type'];
  $name = $tag['name'];
  $value = $_POST[$name] ;

  if ( strpos( $name , 'tel' ) !== false ){
    $regex = '/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})(?:(?< =\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/';
    $Valid = preg_match($regex,  $value, $matches );
    if ( $Valid > 0 ) {
      $formatted = "($matches[1]) $matches[2]-$matches[3]";
      if ($matches[4]) $formatted .= " x$matches[4]";
      // Replace the value passed in with the cleaned up version.
      $_POST[$name] = $formatted ;
    }
    else {
      $result['valid'] = false;
      $result['reason'][$name] = 'tel field invalid';
    }
  }
}

// Fake pages' permalinks and titles
$my_fake_pages1 = array(
  'component' => 'component',
  'document' => 'document',
  'client' => 'client',
  'feedbac' => 'feedbac'
);

add_filter('rewrite_rules_array', 'fsp_insertrules1');
// Adding fake pages' rewrite rules
function fsp_insertrules1($rules1) {
  global $my_fake_pages1;
  $newrules1 = array();
  foreach ($my_fake_pages1 as $slug => $title)
    $newrules1['systems/([^/]+)/' . $slug . '/?$'] = 'index.php?systems=$matches[1]&fpage1=' . $slug;
  return $newrules1 + $rules1;
}
add_filter('query_vars', 'fsp_insertqv1');
// Tell WordPress to accept our custom query variable
function fsp_insertqv1($vars) {
  array_push($vars, 'fpage1');
  return $vars;
}



$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
function my_option_posts_per_page( $value ) {
  global $option_posts_per_page;
  if ( is_tax( 'portfolio-category') ) {
    return 2;
  } else {
    return $option_posts_per_page;
  }
}

class mainMenuWalker extends Walker_Nav_Menu {
function start_lvl( &$output, $depth ) {
  // depth dependent classes
  $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
  $display_depth = ( $depth + 1); // because it counts the first submenu as 0
  $classes = array(
    'sub-menu',
    ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
    ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
    'menu-depth-' . $display_depth
    );
  $class_names = implode( ' ', $classes );

  // build html
  $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}

function start_el( &$output, $item, $depth, $args ) {
  global $wp_query;
  $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

  // depth dependent classes
  $depth_classes = array(
    ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
    ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
    ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
    'menu-item-depth-' . $depth
  );
  $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

  // passed classes
  $classes = empty( $item->classes ) ? array() : (array) $item->classes;
  $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    // build html
  $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

  // link attributes
  $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
  $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
  $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
  $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
  $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

  $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
    $args->before,
    $attributes,
    $args->link_before,
    apply_filters( 'the_title', $item->title, $item->ID ),
    $args->link_after,

    $args->after
  );

    // build html
  $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}

//Add custom column into Product Page
add_filter('manage_edit-product_columns', 'my_columns_into_product_list');
function my_columns_into_product_list($defaults) {
  $defaults['product_checkbox'] = 'Price ($)';
  return $defaults;
}

//Add rows value into Product Page
add_action( 'manage_product_posts_custom_column' , 'my_custom_column_into_product_list', 10, 2 );
function my_custom_column_into_product_list($column, $post_id ){
  switch ( $column ) {
    case 'product_checkbox':
    echo get_post_meta( $post_id , 'price' , true );
  break;
  }
}

add_filter( "manage_edit-product_sortable_columns", "sortable_columns" );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
  add_theme_support( 'woocommerce' );
}

?>
