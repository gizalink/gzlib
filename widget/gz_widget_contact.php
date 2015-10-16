<?php
/**
* Lib custom by GiaLinh
**/
// Creating the widget 
class gz_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'gz_widget', 

// Widget name will appear in UI
__('Thông tin liên hệ ', 'gz'), 

// Widget description
array( 'description' => __( 'Hiển thị một số thông tin liên hệ', 'gz' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$phone = apply_filters( 'widget_text', $instance['phone'] );
$adds = apply_filters( 'widget_text', $instance['adds'] );
$mail = apply_filters( 'widget_text', $instance['mail'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
?>
<ul class="social-footer-gl">
								<li>
									<i class="fa fa-map-marker"></i>
									<div>Địa chỉ: <?php echo $adds; ?></div>
								</li>
								<li>
									<i class="fa fa-phone"></i>
									<div>Số điện thoại: <?php echo $phone; ?></div>
								</li>
								<li>
									<i class="fa fa-envelope"></i>
									<div>Email: <?php echo $mail; ?></div>
								</li>
</ul>

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


if ( isset( $instance[ 'adds' ] ) ) {
$adds = $instance[ 'adds' ];
}
else {
$adds = __( 'Số 123, Đường ABC, Quận ABC, Thành Phố Hồ Chí Minh', 'gz' );
}


if ( isset( $instance[ 'phone' ] ) ) {
$phone = $instance[ 'phone' ];
}
else {
$phone = __( '0123 456 789', 'gz' );
}


if ( isset( $instance[ 'mail' ] ) ) {
$mail = $instance[ 'mail' ];
}
else {
$mail = __( 'taikhoan@tenmiencuaban', 'gz' );
}


// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Tiêu đề widget:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'adds' ); ?>"><?php _e( 'Địa chỉ công ty' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'adds' ); ?>" name="<?php echo $this->get_field_name( 'adds' ); ?>" type="text" value="<?php echo esc_attr( $adds ); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Điện thoại công ty' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'mail' ); ?>"><?php _e( 'Email công ty' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'mail' ); ?>" name="<?php echo $this->get_field_name( 'mail' ); ?>" type="text" value="<?php echo esc_attr( $mail ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['adds'] = ( ! empty( $new_instance['adds'] ) ) ? strip_tags( $new_instance['adds'] ) : '';
$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
$instance['mail'] = ( ! empty( $new_instance['mail'] ) ) ? strip_tags( $new_instance['mail'] ) : '';

return $instance;
}
} // Class gz_widget ends here

// Register and load the widget
function gz_load_widget() {
	register_widget( 'gz_widget' );
}
add_action( 'widgets_init', 'gz_load_widget' );

?>
