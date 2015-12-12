<?php get_header(); ?>
<div class="breadcrumbs">
<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Octagram." href="http://www.octagram.ru" class="home"><?php _e('Home', 'octa'); ?></a></span> &gt; 
<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Установщик" href="http://www.octagram.ru/install/"><?php _e('Installer', 'octa'); ?></a></span> &gt; 
<span typeof="v:Breadcrumb"><span property="v:title"><?php the_title(); ?></span></span></div>
<div id="left-menu">
<?php 
$val = get_field( "виджеты" );
if( $val == 1 )
{ ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?><?php 
}
elseif( $val == 2 )
{ ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?><?php }?><?php 
}
elseif( $val == 3 )
{ ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?><?php }?><?php 
}
elseif( $val == 4 )
{ ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?><?php }?><?php 
}
else
{ ?> <?php 
}
 ?>
</div>
<div id="right-content">
<h1 STYLE="font-size: 24px; margin-top: 10px; "><?php _e('OCTAGRAM BESIDE', 'octa'); ?></h1>
<div style="background: #f2f5f8;border-radius: 5px;display: block;margin: auto;float: left;padding: 15px 0;">
<div style="float: right; color: #000; border: 2px solid #c6ccd2; border-radius: 10px;padding: 5px 15px; font-size: 11px; margin: 0px 20px 10px;"><?php the_tags('','',''); ?></div>
<div class="clear"></div>
<div style="width: 45%; padding: 0 20px;float: left; display:block;position: relative; "><?php  $val = get_field( "Iframe" );
if( $val )
{ ?>
<iframe src="<?php the_field('Iframe'); ?>" width="320" height="350" frameborder="0" style="border:0"></iframe>
<?php }
else
{ ?>
<img style="border-radius: 5px;" src="<?php the_field('фотодилера'); ?>" width="320" height="320" border="0" alt="">
<?php 
}
 ?></div>
<div style="width: 45%; padding: 0 20px 0 0;float: right; display:block;position: relative; "><h2 style="font-size:18px; color: #383737;"><?php the_title(); ?></h2>
<span style="color: #b4bbc2; font-size: 12px; margin-top:15px;"><?php the_content('Читать полностью &raquo;'); ?></span>
<div style="font-size:17px; color: #383737;width: 80px; text-align: right; display: block;float: left; "><?php _e('Phone:', 'octa'); ?></div> <span style="color: #b4bbc2; font-size: 14px;width: 220px; text-align: left;display: block;float: left;line-height: 23px;padding-left: 10px;"><?php the_field('телефон'); ?></span><div style="clear: both; height: 10px; "></div>
<div style="font-size:12px; color: b4bbc2;width: 80px; text-align: right; display: block;float: left; "><?php _e('Rating', 'octa'); ?></div> <span style="color: #b4bbc2; font-size: 14px;width: 220px; text-align: left;display: block;float: left;line-height: 0px;margin-top: -4px;">
<?php 
$value = get_field( "rating" );
if( $value == 1 )
{ ?><img src="http://www.octagram.ru/wp-content/uploads/2014/10/1.png" width="101" height="26" border="0" alt=""><?php 
}
elseif( $value == 2 )
{ ?><img src="http://www.octagram.ru/wp-content/uploads/2014/10/2.png" width="101" height="26" border="0" alt=""><?php 
}
elseif( $value == 3 )
{ ?><img src="http://www.octagram.ru/wp-content/uploads/2014/10/3.png" width="101" height="26" border="0" alt=""><?php 
}
elseif( $value == 4 )
{ ?><img src="http://www.octagram.ru/wp-content/uploads/2014/10/4.png" width="101" height="26" border="0" alt=""><?php 
}
elseif( $value == 5 )
{ ?><img src="http://www.octagram.ru/wp-content/uploads/2014/10/5.png" width="101" height="26" border="0" alt=""><?php 
}
else
{ ?> <?php 
}
 ?>
</span><div style="clear: both; height: 10px; "></div>
<div style="font-size:17px; color: #383737;width: 80px; text-align: right; display: block;float: left; "><?php _e('Address:', 'octa'); ?></div> <span style="color: #b4bbc2; font-size: 14px;width: 220px; text-align: left;display: block;float: left;line-height: 23px;padding-left: 10px;"><?php the_field('адрес'); ?></span><div style="clear: both; height: 10px; "></div>
<div style="font-size:17px; color: #383737;width: 80px; text-align: right; display: block;float: left; "><?php _e('Site:', 'octa'); ?></div> <span style="color: #b4bbc2; font-size: 14px;width: 220px; text-align: left;display: block;float: left;line-height: 23px;padding-left: 10px;"><a href="<?php the_field('сайтдилера'); ?>"><?php the_field('сайтдилера'); ?></a></span><div style="clear: both; height: 10px; "></div>
<div style="font-size:17px; color: #383737;width: 80px; text-align: right; display: block;float: left; "><?php _e('Status:', 'octa'); ?></div> <span style="color: #b4bbc2; font-size: 14px;width: 220px; text-align: left;display: block;float: left;line-height: 23px;padding-left: 10px;"><a href="http://www.octagram.ru/install/"><?php _e('installer', 'octa'); ?></a></span><div style="clear: both; height: 10px; "></div>
</div>
</div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>