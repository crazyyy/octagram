<?php
query_posts('page_id=9');
?>

<?php if ( have_posts() ) : ?>
<?php    
while (have_posts()) : the_post(); 
?>
			  <div id="main-bottom">

			  	<div id="presentation">

				  	<a href="#" title="<?php _e('Presentation of the company', 'octa'); ?>" onclick="document.getElementById('bg-black').style.display = 'block';document.getElementById('video-div').style.display = 'block';">

						<div id="hover-presentation"></div>
				  		
				  		<?php $oct_key9 = get_post_meta($post->ID, 'oct_key9', true); if ($oct_key9) { ?>
						<img src="<?php the_field('oct_key9'); ?>" width="640" height="380" alt="<?php echo get_post_meta($post->ID, 'oct_key10', true); ?>"/>
						<?php } else { ?>
						<img src="<?php bloginfo('stylesheet_directory'); ?>/img/presentation.jpg" width="640" height="380"  alt="<?php echo get_post_meta($post->ID, 'oct_key10', true); ?>" />
						<?php } ?>
						
						

				  		<div class="play">

				  <b><?php $oct_key10 = get_post_meta($post->ID, 'oct_key10', true); if ($oct_key10) { ?><?php echo $oct_key10; ?><?php } else { ?><?php _e('Presentation of the company', 'octa'); ?><?php } ?></b>

				  			<hr />

				  			<span><?php $oct_key11 = get_post_meta($post->ID, 'oct_key11', true); if ($oct_key11) { ?><?php echo $oct_key11; ?><?php } else { ?><?php _e('Learn more about how to develop our unique solutions', 'octa'); ?><?php } ?></span>

				  		</div>

				  	</a>

			  	</div>

			  	<div id="products">

			  		<div class="product">
			  			
						<?php $oct_key13 = get_post_meta($post->ID, 'oct_key13', true); if ($oct_key13) { ?>
						<img src="<?php the_field('oct_key13'); ?>" width="320" height="101"  alt="<?php echo get_post_meta($post->ID, 'oct_key14', true); ?>"/>
						<?php } else { ?>
						<img src="<?php bloginfo('stylesheet_directory'); ?>/img/product1.jpg" width="320" height="101" alt="<?php _e('Software', 'octa'); ?>" />
						<?php } ?>

			  			

			  			<div>

				  			<h2><?php $oct_key14 = get_post_meta($post->ID, 'oct_key14', true); if ($oct_key14) { ?><?php echo $oct_key14; ?><?php } else { ?><?php _e('Software', 'octa'); ?><?php } ?></h2>

			  				<a href="<?php echo get_post_meta($post->ID, 'oct_key15', true); ?>" title="<?php echo get_post_meta($post->ID, 'oct_key14', true); ?>" class="more-link"><?php _e('Read more', 'octa'); ?></a>

			  			</div>

			  		</div>

			  		<div class="product">
						<?php $oct_key16 = get_post_meta($post->ID, 'oct_key16', true); if ($oct_key16) { ?>
						<img src="<?php the_field('oct_key16'); ?>"  width="320" height="101"  alt="<?php echo get_post_meta($post->ID, 'oct_key17', true); ?>"/>
						<?php } else { ?>
						<img src="<?php bloginfo('stylesheet_directory'); ?>/img/product2.jpg"  width="320" height="101"  alt="<?php _e('Other products', 'octa'); ?>" />
						<?php } ?>
			  			

			  			<div>

			  				<h2><?php $oct_key17 = get_post_meta($post->ID, 'oct_key17', true); if ($oct_key17) { ?><?php echo $oct_key17; ?><?php } else { ?><?php _e('Other products', 'octa'); ?><?php } ?></h2>

			  				<a href="<?php echo get_post_meta($post->ID, 'oct_key18', true); ?>" title="<?php echo get_post_meta($post->ID, 'oct_key17', true); ?>" class="more-link"><?php _e('Read more', 'octa'); ?></a>

			  			</div>

			  		</div>

			  	</div>
<?php endwhile; //  ?>
<?php else : ?><?php endif; ?>

<?php wp_reset_query(); ?>