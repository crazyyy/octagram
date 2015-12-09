<?php get_header();$current_fp1 = get_query_var('fpage1'); ?>
 <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<ul id="moments">

<li class="left-block">
<h2><?php $oct_k1777 = get_option('oct_k1777'); echo stripslashes($oct_k1777); ?></h2>
<?php 
$goodsolutionsleft = get_field('goodsolutionsleft');
?>
<?php if( $goodsolutionsleft ): ?>
<?php foreach( $goodsolutionsleft as $goodsolutionsleft ): ?>
<a href="<?php echo get_permalink( $goodsolutionsleft->ID ); ?>" title="<?php echo get_the_title( $goodsolutionsleft->ID ); ?>" class="moment-link">
<div class="moment-ico"><img src="<?php the_field('icon', $goodsolutionsleft->ID); ?>" width="53" height="53" alt="<?php echo get_the_title( $goodsolutionsleft->ID ); ?>"/></div>
<h2><?php echo get_the_title( $goodsolutionsleft->ID ); ?></h2>
</a>
<?php endforeach; ?>
<?php endif; ?>
<span id="order-phone" class="phone"><?php $oct_key6 = get_option('oct_key6'); echo stripslashes($oct_key6); ?></span>
</li>

<li class="middle-block">
<img src="<?php the_field('images'); ?>" alt="<?php the_title(); ?>" width="270" height="180" />
<h1><?php the_title(); ?></h1>
<p><?php the_field('shortinfo'); ?></p>
<a href="#order" title="Купить" class="order-btn blue  button6" id="buy"  onclick="getElementById('wpcf7-f197-o3').style.display = 'block'; getElementById('order').style.display = 'block'"><?php $oct_k4 = get_option('oct_k4'); echo stripslashes($oct_k4); ?></a>
 </li>

<li class="right-block">
<h2><?php $oct_k27777 = get_option('oct_k27777'); echo stripslashes($oct_k27777); ?></h2>
<?php 
$goodsolutionsright = get_field('goodsolutionsright');
?>
<?php if( $goodsolutionsright ): ?>
<?php foreach( $goodsolutionsright as $goodsolutionsright ): ?>
<a href="<?php echo get_permalink( $goodsolutionsright->ID ); ?>" title="<?php echo get_the_title( $goodsolutionsright->ID ); ?>" class="moment-link">
<div class="moment-ico"><img src="<?php the_field('icon', $goodsolutionsright->ID); ?>" alt="<?php echo get_the_title( $goodsolutionsright->ID ); ?>" width="53" height="53"  /></div>
<h2><?php echo get_the_title( $goodsolutionsright->ID ); ?></h2>
</a>
<?php endforeach; ?>
<?php endif; ?>
 
<a href="#answer" title="Ask a Question" class="order-btn white  button7" id="question" onclick="getElementById('wpcf7-f1034-o2').style.display = 'block'; getElementById('answer').style.display = 'block'"><?php $oct_k5 = get_option('oct_k5'); echo stripslashes($oct_k5); ?></a>
 
</li>
</ul><div class="clear"></div>



<div class="tab-menu five-links">
 <a class="menu-item tab-link one <?php if ($current_fp1 == '') { echo ' active'; } ?>" href="<?php echo get_permalink(); ?>#about"><?php _e('Description', 'octa'); ?></a> 
 <a class="menu-item tab-link two<?php if ($current_fp1 == 'component') { echo ' active'; } ?>" href="<?php echo get_permalink() ?>component/#product"><?php _e('Elements', 'octa'); ?></a> 
 <a class="menu-item tab-link three<?php if ($current_fp1 == 'document') { echo ' active'; } ?>" href="<?php echo get_permalink() ?>document/#doc"><?php _e('Documentation', 'octa'); ?></a> 
 <a class="menu-item tab-link four<?php  if ($current_fp1 == 'client') { echo ' active'; }  ?>" href="<?php echo get_permalink() ?>client/#customers"><?php _e('Who Uses', 'octa'); ?></a> 
 <a class="menu-item tab-link five<?php if ($current_fp1 == 'feedbac') { echo ' active'; } ?>" href="<?php echo get_permalink() ?>feedbac/#comments"><?php _e('Reviews', 'octa'); ?></a> 
 <div class="clear"></div>
 
				<?php while ( have_posts() ) : the_post(); ?>

		<?php 
		if (!$current_fp1) {
				get_template_part( 'single', 'systems-index' );
			} else if ($current_fp1 == 'component') {
				get_template_part( 'single', 'systems-components' );
			} else if ($current_fp1 == 'document') {
				get_template_part( 'single', 'systems-documents' );
				} else if ($current_fp1 == 'client') {
				get_template_part( 'single', 'systems-clients' );
			} else if ($current_fp1 == 'feedbac') {
				get_template_part( 'single', 'systems-feedback' );
			}; ?>
 

				<?php endwhile; // end of the loop. ?>
 


 </div> 
<a href="#order" title="Купить" class="order-btn blue  button8" id="order-bottom"  onclick="getElementById('wpcf7-f197-o3').style.display = 'block'; getElementById('order').style.display = 'block'"><?php $oct_k6 = get_option('oct_k6'); echo stripslashes($oct_k6); ?></a>
 
<span class="phone" id="phone-bottom"><?php $oct_key6 = get_option('oct_key6'); echo stripslashes($oct_key6); ?></span>
<div class="clear"></div>
<?php get_footer(); ?>