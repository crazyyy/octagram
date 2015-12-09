<?php 
/* Template Name: Дистрибутив */
get_header(); ?><div class="breadcrumbs">
<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Octagram." href="http://www.octagram.ru" class="home"><?php _e('Home', 'octa'); ?></a></span> &gt; 
<span typeof="v:Breadcrumb"><?php the_title(); ?></span></div>
<div id="left-menu"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?></div>
<div id="right-content">
<h1><?php the_title(); ?></h1>
<p><?php the_content('Читать полностью &raquo;'); ?>
<div id="producting"
style="width: 138px; float: left; display:block;height: 50px; line-height: 50px; text-align: center; background: #f2f5f8; -moz-border-radius-topleft: 10px;-webkit-border-top-left-radius: 10px; border-top-left-radius: 10px;"><a id="producting1" style="color: #393635; font-size:16px; font-weight:bold;text-decoration: none;"
href="#" 
onclick="
getElementById('prod').style.display = 'block';
getElementById('prod11').style.display = 'block';
getElementById('syst').style.display = 'none';
getElementById('solu').style.display = 'none';
getElementById('producting').style.background = '#f2f5f8';
getElementById('sistems').style.background = '#00468c';
getElementById('solutiones').style.background = '#00468c';
getElementById('producting1').style.color = '#393635';
getElementById('sistems1').style.color = '#fff';
getElementById('solutiones1').style.color = '#fff';
getElementById('producting1').style.cursor = 'context-menu';
getElementById('sistems1').style.cursor = 'pointer';
getElementById('solutiones1').style.cursor = 'pointer';
" ><?php _e('Utilities', 'octa'); ?></a></div>

<div id="sistems"
style="width: 132px;  float: left; display:block;height: 50px; line-height: 50px; text-align: center; background: #00468c;border-left-width: 1px;
border-left-style: solid;border-left-color: rgb(0, 56, 112)"><a id="sistems1" style="color: #fff; font-size:16px; font-weight:bold;text-decoration: none;"
href="#" 
onclick="
getElementById('syst').style.display = 'block';
getElementById('prod').style.display = 'none';
getElementById('solu').style.display = 'none';
getElementById('producting').style.background = '#00468c';
getElementById('sistems').style.background = '#f2f5f8';
getElementById('solutiones').style.background = '#00468c';
getElementById('producting1').style.color = '#fff';
getElementById('sistems1').style.color = '#393635';
getElementById('solutiones1').style.color = '#fff';
getElementById('producting1').style.cursor = 'pointer';
getElementById('sistems1').style.cursor = 'context-menu';
getElementById('solutiones1').style.cursor = 'pointer';" ><?php _e('Base software', 'octa'); ?></a></div>

<div id="solutiones"
style="width: 192px;  float: left; display:block;height: 50px; line-height: 50px; text-align: center; background: #00468c; -moz-border-radius-topright: 10px;-webkit-border-top-right-radius: 10px;border-top-right-radius: 10px;border-left: 1px solid #003870;"><a id="solutiones1" style="color: #fff; font-size:16px; font-weight:bold;text-decoration: none;" 
href="#" 
onclick="
getElementById('solu').style.display = 'block';
getElementById('prod').style.display = 'none';
getElementById('syst').style.display = 'none';
getElementById('producting').style.background = '#00468c';
getElementById('sistems').style.background = '#00468c';
getElementById('solutiones').style.background = '#f2f5f8';
getElementById('producting1').style.color = '#fff';
getElementById('sistems1').style.color = '#fff';
getElementById('solutiones1').style.color = '#393635';
getElementById('producting1').style.cursor = 'pointer';
getElementById('sistems1').style.cursor = 'pointer';
getElementById('solutiones1').style.cursor = 'context-menu';
" ><?php _e('Additional software', 'octa'); ?></a></div>
<div style="color: #393635; font-size:14px; font-weight:bold;text-decoration: none;text-align: right;height: 50px; line-height: 50px; margin-top: 0px;display: block;  float: left;width: 150px;"></div>
<div style="background: #fff;clear:both;display: block;float: left;width: 700px;padding: 20px 0;" >
<div id="prod">
<div style="clear:both;"></div>
<div id="prod1"><?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'IP концентраторы, пульты управления', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?><div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="" /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php the_field('link'); ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link'); ?>"><?php _e('Посмотреть', 'octa'); ?></a></div><div style="clear:both;width:100%; height:1px; "></div><?php endwhile; endif;  ?></div>
<div id="prod2"><?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Адресные микромодули и датчики', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?><div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71"  /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php the_field('link'); ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link'); ?>">Пос<?php _e('Посмотреть', 'octa'); ?>мотреть</a></div><div style="clear:both;width:100%; height:1px; "></div><?php endwhile; endif;  ?></div>
<div id="prod3"><?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Дополнительное оборудование', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?><div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php the_field('link'); ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link'); ?>"><?php _e('Посмотреть', 'octa'); ?></a></div><div style="clear:both;width:100%; height:1px; "></div><?php endwhile; endif;  ?></div>
<div id="prod4"><?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Источники питания', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?><div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php the_field('link'); ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link'); ?>"><?php _e('Посмотреть', 'octa'); ?></a></div><div style="clear:both;width:100%; height:1px; "></div><?php endwhile; endif;  ?></div>
<div id="prod5"><?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Комплекты оборудования', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?><div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php the_field('link'); ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link'); ?>"><?php _e('Посмотреть', 'octa'); ?></a></div><div style="clear:both;width:100%; height:1px; "></div><?php endwhile; endif;  ?></div>
<div id="prod6"><?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Микропрограммы для A1', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?><div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php the_field('link'); ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link'); ?>"><?php _e('Посмотреть', 'octa'); ?></a></div><div style="clear:both;width:100%; height:1px; "></div><?php endwhile; endif;  ?></div>
<div id="prod7"><?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Платформа A1', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?><div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php the_field('link'); ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link'); ?>"><?php _e('Посмотреть', 'octa'); ?></a></div><div style="clear:both;width:100%; height:1px; "></div><?php endwhile; endif;  ?></div>
<div id="prod8"><?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Software Octagram Flex', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?><div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php the_field('link'); ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link'); ?>"><?php _e('Посмотреть', 'octa'); ?></a></div><div style="clear:both;width:100%; height:1px; "></div><?php endwhile; endif;  ?></div>
<div id="prod9"><?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Считыватели', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?><div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php the_field('link'); ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link'); ?>"><?php _e('Посмотреть', 'octa'); ?></a></div><div style="clear:both;width:100%; height:1px; "></div><?php endwhile; endif;  ?></div>
<div id="prod10"><?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Ход Тест', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?><div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php the_field('link'); ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link'); ?>"><?php _e('Посмотреть', 'octa'); ?></a></div><div style="clear:both;width:100%; height:1px; "></div><?php endwhile; endif;  ?></div>
<div id="prod11">
<?php 
global $wp_query; 
query_posts( array(  
'post_type' => 'distr', 
'meta_key' => 'раздел', 
'meta_value' => 'Products', 
'posts_per_page' =>999 ) ); 
if (have_posts()) : while ( have_posts() ) : the_post(); 
?>
<div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div><div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;"><h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br><a href="<?php $link = get_field('external_link', $p->ID); if (empty($link)) { $link = get_field('link', $p->ID); } echo $link; ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" href="<?php the_permalink(); ?>"><?php _e('Read more', 'octa'); ?></a></div><div style="clear:both;width:100%; height:1px; "></div>
<?php endwhile; endif;  ?></div></div>
</div>
<div id="syst">
<?php 
global $wp_query;
query_posts( array( 
'post_type' => 'distr',
'meta_key' => 'раздел',
'meta_value' => 'Системы',
'posts_per_page' =>999
)  );
if (have_posts()) : while ( have_posts() ) : the_post();
?>
<div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div>
<div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;">
<h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br>
<a href="<?php $link = get_field('external_link', $p->ID); if (empty($link)) { $link = get_field('link', $p->ID); } echo $link; ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a>
 <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" href="<?php the_permalink(); ?>"><?php _e('Read more', 'octa'); ?></a>
</div><div style="clear:both;width:100%; height:1px; "></div>
<?php endwhile; endif;  ?>
</div>
<div id="solu">
<?php 
global $wp_query;
query_posts( array( 
'post_type' => 'distr',
'meta_key' => 'раздел',
'meta_value' => 'Решения',
'posts_per_page' =>999
)  );
if (have_posts()) : while ( have_posts() ) : the_post();
?>
<div style="width: 90px; height: 90px; padding:5px;display:block;float:left;"><img style="border-radius: 10px;" src="http://www.octagram.ru/wp-content/uploads/DOWLOAD.png" alt="<?php the_title(); ?>"  width="71" /></div>
<div style="width: 500px; height: 100px; display:block;float:left;padding-top:10px;">
<h2 style="font-size:14px; color: #383737; font-weight: bold;"><?php the_title(); ?></h2><br>
<a href="<?php $link = get_field('external_link', $p->ID); if (empty($link)) { $link = get_field('link', $p->ID); } echo $link; ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" href="<?php the_permalink(); ?>"><?php _e('Read more', 'octa'); ?></a>
</div><div style="clear:both;width:100%; height:1px; "></div>
<?php endwhile; endif;  ?>
</div>
</div> 
<div class="clear"></div>
<?php get_footer(); ?>