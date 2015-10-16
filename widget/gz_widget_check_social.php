<?php
/**
* Lib custom by GiaLinh
**/
// Creating the widget 
class gz_widget_social extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'gz_widget_social', 

// Widget name will appear in UI
__('Thông tin mạng xã hội ', 'gz'), 

// Widget description
array( 'description' => __( 'Hiển thị một số thông tin về mạng xã hội', 'gz' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$fbdk = apply_filters( 'widget_text', $instance['fbdk'] );
$twdk = apply_filters( 'widget_text', $instance['twdk'] );
$ggdk = apply_filters( 'widget_text', $instance['ggdk'] );
$ytdk = apply_filters( 'widget_text', $instance['ytdk'] );


// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
?>

<?php
	$get_options_gz = get_theme_options_gz(); 
?>

<div class="social-ul-gl">
	<ul>
	<?php  if( $fbdk AND $fbdk == '1' ) 
		{
			echo '<li class="social-facebook-ft-gl"><a href="'.esc_attr($get_options_gz['fb']).'"><i class="fa fa-facebook"></i></a></li>';
		}
	?>	
	<?php  if( $twdk AND $twdk == '1' ) 
		{
			echo '<li class="social-twitter-ft-gl"><a href="'.esc_attr($get_options_gz['tw']).'"><i class="fa fa-twitter"></i></a></li>';
		}
	?>
	<?php  if( $ggdk AND $ggdk == '1' ) 
		{
			echo '<li class="social-google-ft-gl"><a href="'.esc_attr($get_options_gz['gg']).'"><i class="fa fa-google"></i></a></li>';
		}
	?>
	<?php  if( $ytdk AND $ytdk == '1' ) 
		{
			echo '<li class="social-youtube-ft-gl"><a href="'.esc_attr($get_options_gz['ytb']).'"><i class="fa fa-youtube"></i></a></li>';
		}
	?>
			</ul>
</div>







<?php
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {

if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Tiêu đề widget', 'gz' );
}



if ( isset( $instance[ 'fbdk' ] ) ) {
     $fbdk = esc_attr($instance['fbdk']); 
}
else {
$fbdk = __('', 'gz' );
}

if ( isset( $instance[ 'twdk' ] ) ) {
     $twdk = esc_attr($instance['twdk']); 
}
else {
$twdk = __('', 'twdk' );
}

if ( isset( $instance[ 'ggdk' ] ) ) {
     $ggdk = esc_attr($instance['ggdk']); 
}
else {
$ggdk = __('', 'gz' );
}

if ( isset( $instance[ 'ytdk' ] ) ) {
     $ytdk = esc_attr($instance['ytdk']); 
}
else {
$ytdk = __('', 'gz' );
}




// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Tiêu đề widget:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>


<p>
<input id="<?php echo $this->get_field_id('fbdk'); ?>" name="<?php echo $this->get_field_name('fbdk'); ?>" type="checkbox" value="1" <?php checked( '1', $fbdk ); ?> />
<label for="<?php echo $this->get_field_id('fbdk'); ?>"><?php _e('Hiển thị icon Facebook', 'gz'); ?></label>
</p>

<p>
<input id="<?php echo $this->get_field_id('twdk'); ?>" name="<?php echo $this->get_field_name('twdk'); ?>" type="checkbox" value="1" <?php checked( '1', $twdk ); ?> />
<label for="<?php echo $this->get_field_id('twdk'); ?>"><?php _e('Hiển thị icon Twitter', 'gz'); ?></label>
</p>

<p>
<input id="<?php echo $this->get_field_id('ggdk'); ?>" name="<?php echo $this->get_field_name('ggdk'); ?>" type="checkbox" value="1" <?php checked( '1', $ggdk ); ?> />
<label for="<?php echo $this->get_field_id('ggdk'); ?>"><?php _e('Hiển thị icon Google+', 'gz'); ?></label>
</p>

<p>
<input id="<?php echo $this->get_field_id('ytdk'); ?>" name="<?php echo $this->get_field_name('ytdk'); ?>" type="checkbox" value="1" <?php checked( '1', $ytdk ); ?> />
<label for="<?php echo $this->get_field_id('ytdk'); ?>"><?php _e('Hiển thị icon Youtube', 'gz'); ?></label>
</p>

<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance =  $old_instance;
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['fbdk'] = strip_tags($new_instance['fbdk']);
$instance['twdk'] = strip_tags($new_instance['twdk']);
$instance['ggdk'] = strip_tags($new_instance['ggdk']);
$instance['ytdk'] = strip_tags($new_instance['ytdk']);

return $instance;
}
} // Class gz_widget ends here

// Register and load the widget
function gz_load_widget_social() {
	register_widget( 'gz_widget_social' );
}
add_action( 'widgets_init', 'gz_load_widget_social' );

?>
