<?php
query_posts('page_id=9');
?>
<div id="menu"><ul>
<li><a href="<?php bloginfo('url'); ?>" title="<?php _e('Products', 'octa'); ?>" id="product-link"><?php _e('Products', 'octa'); ?></a></li>
<li><a href="<?php bloginfo('url'); ?>/contact" title="<?php _e('Contacts', 'octa'); ?>"><?php _e('Contacts', 'octa'); ?></a></li>
<li><a href="<?php bloginfo('url'); ?>/dilleram" title="<?php _e('Dealers', 'octa'); ?>"><?php _e('Dealers', 'octa'); ?></a></li>
<li><a href="<?php bloginfo('url'); ?>/podderzhka/" title="<?php _e('Supports', 'octa'); ?>"><?php _e('Supports', 'octa'); ?></a></li>
</ul>
</div> 
<?php wp_nav_menu(array( 'theme_location' => 'pmenu'  )); ?> 
<?php wp_reset_query(); ?>