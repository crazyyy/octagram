<div class="content">
<ul class="triple">
<li>

<span class="sub-menu-title"><?php the_field('topleftname', 9 ); ?></span>

<?php 
$topleftlink = get_field('topleftlink', 9);
?>
<?php if( $topleftlink ): ?>
<?php foreach( $topleftlink as $topleft ): ?>
<a href="<?php echo get_permalink( $topleft->ID ); ?>" title="<?php echo get_the_title( $topleft->ID ); ?>" class="system-link"><?php echo get_the_title( $topleft->ID ); ?></a>
<?php endforeach; ?>
<?php endif; ?>
</li>

<li class="sub-middle">
<span class="sub-menu-title"><?php the_field('middlename', 9); ?></span>
<?php 
$middlenamet1 = get_field('middlenamet1', 9);
?>
<?php if( $middlenamet1 ): ?>
<?php foreach( $middlenamet1 as $midd1 ): ?>
<a href="<?php echo get_permalink( $midd1->ID ); ?>" title="<?php echo get_the_title( $midd1->ID ); ?>" class="system-link"><?php echo get_the_title( $midd1->ID ); ?></a>
<?php endforeach; ?>
<?php endif; ?>
</li>

<li>
<span class="sub-menu-title"><?php the_field('rightcol', 9 ); ?></span>
<?php 
$rightcoltov = get_field('rightcoltov', 9);
?>
<?php if( $rightcoltov ): ?>
<?php foreach( $rightcoltov as $rightcoltov ): ?>
<a href="<?php echo get_permalink( $rightcoltov->ID ); ?>" title="<?php echo get_the_title( $rightcoltov->ID ); ?>"><img src="<?php the_field('images', $rightcoltov->ID ); ?>" alt="<?php the_title(); ?>"  width="150" height="150" /></a>
<a href="<?php echo get_permalink( $rightcoltov->ID ); ?>" title="<?php echo get_the_title( $rightcoltov->ID ); ?>"  class="product-link"><?php echo get_the_title( $rightcoltov->ID ); ?></a>
<?php endforeach; ?>
<?php endif; ?>


</li>

</ul>
</div>
