<?php 
/* Template Name: Каталог */
get_header(); ?>
<ul id="moments">
<li class="left-block"><h2><?php _e('Suitable for systems', 'octa'); ?></h2>
<?php 
$posts = get_field('goodsistemleft');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="moment-link">
<div class="moment-ico"><img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>" width="53" height="53"/></div>
<h2><?php echo get_the_title( $p->ID ); ?></h2>
</a>
<?php endforeach; ?>
<?php endif; ?>
</li>

<li class="middle-block">
<?php 
$posts = get_field('homestore');
if( $posts ): ?>
<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
<?php setup_postdata($post); ?>
<img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>" width="267" />
<h1><?php the_title(); ?></h1>

<p><?php the_field('shortinfo'); ?></p>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="more-link"><?php _e('Read more', 'octa'); ?></a>
<?php endforeach; ?>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
</li>

<li class="right-block">
<h2><?php _e('Suitable for systems', 'octa'); ?></h2>
<?php 
$posts = get_field('goodsistemright');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="moment-link">
<div class="moment-ico"><img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>" width="53" height="53"/></div>
<h2><?php echo get_the_title( $p->ID ); ?></h2>
</a>
<?php endforeach; ?>
<?php endif; ?>
</li>
</ul>
<div class="clear"></div>


				<div class="tab-menu">

		     		<a href="<?php bloginfo('url'); ?>" title="About company" class="tab-link one active"><?php _e('About company', 'octa'); ?></a>
		     		<a href="<?php bloginfo('url'); ?>/news" title="NEWS" class="tab-link two"><?php _e('NEWS', 'octa'); ?></a>
		     		<a href="<?php bloginfo('url'); ?>/product" title="SYSTEMS AND SOLUTIONS" class="tab-link three"><?php _e('SYSTEMS AND SOLUTIONS', 'octa'); ?></a>

			<div class="clear"></div> 

				<div id="mask">
<div id="homeinfo">
			       <div class="tab-one open" style="display: block;">
					<?php the_field('home'); ?>
			       </div>
 </div>
			       <div class="tab-two">

             		<ul id="news">
             			<li>
             				<span class="name"><?php _e('Новый офис в Петербурге', 'octa'); ?></span>
             				<span class="date"><?php _e('14.05.2015', 'octa'); ?></span>

             				<p><?php _e('В июне 1989 года был создан МЦ "Контур".   К сентябрю 1991 года, когда в рамках госзаказа для НПО «Научный центр» была разработана первая адресная панель ОПС «Пост 50» с 50-ми адресами.', 'octa'); ?></p>

             				<a href="" title=""><?php _e('Read more', 'octa'); ?> </a>
             			</li>
             			
             		</ul>

             		<div class="clear"></div>

             		<a href="" title="" class="all-news"><?php _e('All news', 'octa'); ?></a>

             		<div class="clear"></div>

			       </div>

			       <div class="tab-three">

					<ul id="news">
             			<li>
             				<b><?php _e('Complete systems', 'octa'); ?></b>

             				<a href="" title="" class="system-link"><?php _e('Комплексные системы безопасности', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Система контроля и управления доступом', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Система охранно пожарной сигнализации', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Управление инженерным оборудованием', 'octa'); ?></a><br />

             				<b><?php _e('Complete solutions', 'octa'); ?></b>

             				<a href="" title="" class="system-link"><?php _e('Система безопасности школы', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Система безопасности в гостиницах', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Системы безопасности банка', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Система платной парковки', 'octa'); ?></a>

             			</li>
             			<li>

             				<a href="" title="" class="system-link"><?php _e('Системы автоматического пожаротушения', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Системы охранной сигнализации', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Система контроля рабочего времени', 'octa'); ?></a><br /><br />

             				<a href="" title="" class="system-link"><?php _e('Пожарная безопасность школы', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Для депозитарных ячеек', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Медицинский центр', 'octa'); ?></a>
             				
             			</li>
             			<li>
             				<a href="" title="" class="system-link"><?php _e('Система умный дом', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Система контроля охраны', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Системы видеонаблюдения', 'octa'); ?></a><br /><br />

             				<a href="" title="" class="system-link"><?php _e('Для Автоцентра', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Для склада', 'octa'); ?></a>
             				<a href="" title="" class="system-link"><?php _e('Для завода', 'octa'); ?></a>           				
             			</li>
             		</ul>

             		<div class="clear"></div>

			       </div>

			  </div>

			  </div>

			 <?php
 include(TEMPLATEPATH.'/page-footer-block.php');
?>

			  </div>

 <?php get_footer(); ?>