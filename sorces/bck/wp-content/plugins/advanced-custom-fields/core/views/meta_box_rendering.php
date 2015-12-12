<?php

/*
*  Meta box - rendering
*
*  This template file is used when editing a field group and creates the interface for rendering options.
*
*  @type	template
*  @date	20/08/14
*
* Called by acf_rendering_add_meta_box()
*/


// global
global $post;

	
// vars
$options = apply_filters('acf/field_group/get_options', array(), $post->ID);

?>
<table class="acf_input widefat" id="acf_rendering">
  <tr>
    <td class="label"><label for=""><?php _e("Position",'acf'); ?></label>
    <p class="description"><?php _e("Position where to insert the rendering of the field group values",'acf'); ?></p>
  </td><td><?php 
  do_action('acf/create_field', array(
				      'type'	=>	'select',
				      'name'	=>	'options[rendering_position]',
				      'value'	=>	$options['rendering_position'],
				      'choices' => array(
							 'none'	  => __("None",'acf'),
							 'before' => __("High (after title)",'acf'),
							 'after'  => __("Normal (after content)",'acf'),
							 ),
				      'default_value' => 'none'				      ));
  ?>
  </td></tr>
  <tr>
    <td class="label"><label for=""><?php _e("Pattern",'acf'); ?></label>
    <p class="description"><?php _e("HTML code pattern (using [acf field='field_name'] shortcode to obtain a field value)",'acf'); ?></p>
  </td><td><?php 
  do_action('acf/create_field', array(
				      'type'	=>	'textarea',
				      'name'	=>	'options[rendering_pattern]',
				      'value'	=>	$options['rendering_pattern'],
				      'rows'	=> 6
				      ));
  ?>
  </td></tr>
  <tr>
    <td class="label"><label for=""><?php _e("HTML tags",'acf'); ?></label>
    <p class="description"><?php _e("Whether the field group values have to be rendered as <meta name='field_name' value='field_value'/> tags in the HTML header, or not",'acf'); ?></p>
  </td><td><?php 
    if (!isset($options['html_meta_rendering'])) $options['html_meta_rendering'] = 0;
    do_action('acf/create_field', array(
					'type'	=>	'radio',
					'name'	=>	'options[html_meta_rendering]',
					'value'	=>	$options['html_meta_rendering'],
					'choices'	=>	array(
								      1	=>	__("Yes",'acf'),
								      0	=>	__("No",'acf'),
								      ),
					'layout'	=>	'horizontal'
					));
  ?>
  </td></tr>
</table>
