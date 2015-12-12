<?php get_header(); ?>
<div class="breadcrumbs">
<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Octagram." href="http://www.octagram.ru" class="home"><?php _e('Home', 'octa'); ?></a></span> &gt; 
<span typeof="v:Breadcrumb"><?php the_title(); ?></span></div>
<div id="left-menu"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?></div>


<div id="right-content">
<h1 STYLE="font-size: 24px; margin-top: 10px; "><?php _e('OCTAGRAM BESIDE', 'octa'); ?></h1>
<h2><?php $oct_k11 = get_option('oct_k11'); echo stripslashes($oct_k11); ?></h2>
<p><?php $oct_k12 = get_option('oct_k12'); echo stripslashes($oct_k12); ?>
<?php if ($post->post_type == "install"  )   { ?>

<div style="width: 138px; float: left; display:block;height: 50px; line-height: 50px; text-align: center; background: #00468c; -moz-border-radius-topleft: 10px;-webkit-border-top-left-radius: 10px; border-top-left-radius: 10px;"><a style="color: #fff; font-size:16px; font-weight:bold;text-decoration: none;" href="http://www.octagram.ru/install/"><?php _e('Installer', 'octa'); ?></a></div>
<div style="width: 132px;  float: left; display:block;height: 50px; line-height: 50px; text-align: center; background: #f2f5f8; -moz-border-radius-topright: 10px;-webkit-border-top-right-radius: 10px;
border-top-right-radius: 10px;"><a style="color: #393635; font-size:16px; font-weight:bold;text-decoration: none;" href="http://www.octagram.ru/mydiler/"><?php _e('Dealers', 'octa'); ?></a></div>

<?php } elseif ( $post->post_type == "mydiler"  )   { ?>
<div style="width: 138px; float: left; display:block;height: 50px; line-height: 50px; text-align: center; background: #f2f5f8; -moz-border-radius-topleft: 10px;-webkit-border-top-left-radius: 10px; border-top-left-radius: 10px;"><a style="color:#393635 ; font-size:16px; font-weight:bold;text-decoration: none;" href="http://www.octagram.ru/install/"><?php _e('Installer', 'octa'); ?></a></div>
<div style="width: 132px;  float: left; display:block;height: 50px; line-height: 50px; text-align: center; background: #00468c; -moz-border-radius-topright: 10px;-webkit-border-top-right-radius: 10px;
border-top-right-radius: 10px;"><a style="color:#fff; font-size:16px; font-weight:bold;text-decoration: none;" href="http://www.octagram.ru/mydiler/"><?php _e('Dealers', 'octa'); ?></a></div>
<?php }  ?>

 

<div style="background: #f2f5f8;clear:both;display: block;float: left;width: 700px;padding: 20px 0;" >
<span style="padding-left: 30px; color: #b4bbc2; font-size: 14px; "><?php _e('Cities', 'octa'); ?></span><br><br>

<div id="taggest">
	<?php wp_tag_cloud( 'smallest=16&largest=16' ); ?>
</div>

</div><div class="clear"><br><br></div>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div style="padding:20px;display:block;float:left;"><img style="border-radius: 10px;" src="<?php the_field('фотодилера'); ?>" alt="<?php the_title(); ?>"  width="90" height="90" /></div>

<div style="width: 560px; height: 110px; display:block;float:left;padding-top:10px;">
<a style="color: #383737; font-size: 16px; font-weight: bold; text-decoration:none;" href="<?php the_permalink();?>"><?php  the_title(); ?></a><br>
<span style="color: #b4bbc2; font-size: 14px; "><?php the_field('адрес'); ?></span><br><span style="color: #b4bbc2; font-size: 14px; "><?php the_field('телефон'); ?></span><br>
<?php 

$value = get_field( "rating" );
if( $value == 1 )
{ ?><img src="http://www.octagram.ru/wp-content/uploads/2014/10/1.png" style="margin-left:-10px;" width="101" height="26" border="0" alt=""><?php 

}
elseif( $value == 2 )
{ ?><img src="http://www.octagram.ru/wp-content/uploads/2014/10/2.png" style="margin-left:-10px;" width="101" height="26" border="0" alt=""><?php 

}
elseif( $value == 3 )
{ ?><img src="http://www.octagram.ru/wp-content/uploads/2014/10/3.png" style="margin-left:-10px;" width="101" height="26" border="0" alt=""><?php 

}
elseif( $value == 4 )
{ ?><img src="http://www.octagram.ru/wp-content/uploads/2014/10/4.png" style="margin-left:-10px;" width="101" height="26" border="0" alt=""><?php 

}
elseif( $value == 5 )
{ ?><img src="http://www.octagram.ru/wp-content/uploads/2014/10/5.png" style="margin-left:-10px;" width="101" height="26" border="0" alt=""><?php 

}
else
{ ?> <?php 

}
 ?><br>
<a href="<?php the_permalink();?>" title="Read more" style="color:#00468c; font-size: 10px;text-transform: uppercase;text-decoration: none;float: right; text-align: right; display: block;"><?php _e('Read more', 'octa'); ?></a></div>
<div style="clear:both; height:1px; border-bottom: 1px solid #f4f4f4"></div>	
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
<p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></p>

</div>

<div class="clear"></div>
<?php get_footer(); ?>