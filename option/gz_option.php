<?php
/**
* Lib custom by GiaLinh
**/
function gz_customize_register($wp_customize) {

	/***** Register Custom Controls *****/

    class gz_Customize_Header_Control extends WP_Customize_Control {
        public function render_content() { ?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span> <?php
        }
    }

	class gz_Customize_Text_Control extends WP_Customize_Control {
        public function render_content() { ?>
			<span class="textfield"><?php echo esc_html($this->label); ?></span> <?php
        }
    }

    class gz_Customize_Button_Control extends WP_Customize_Control {
        public function render_content() {  ?>
			<p>
				<a href="<?php echo esc_url('http://google.com'); ?>" target="_blank" class="button button-secondary"><?php echo esc_html($this->label); ?></a>
			</p> <?php
        }
    }

	/***** Add Panels *****/

	$wp_customize->add_panel('gz_theme_options', array('title' => __('Thông tin thêm', 'gz'), 'description' => '', 'capability' => 'edit_theme_options', 'theme_supports' => '', 'priority' => 1,));

	/***** Add Sections *****/

	$wp_customize->add_section('gz_general', array('title' => __('Số điện thoại và Email ở header', 'gz'), 'priority' => 1, 'panel' => 'gz_theme_options'));
	$wp_customize->add_section('gz_social', array('title' => __('Liên kết mạng xã hội', 'gz'), 'priority' => 1, 'panel' => 'gz_theme_options'));

    /***** Add Settings *****/

	$wp_customize->add_setting('gz_options[phone]', array('default' => '0123 456 789', 'type' => 'option', 'sanitize_callback' => 'gz_sanitize_integer'));
    $wp_customize->add_setting('gz_options[mail]', array('default' => __('mailcuaban@gmail.com', 'gz'), 'type' => 'option', 'sanitize_callback' => 'gz_sanitize_text'));
    $wp_customize->add_setting('gz_options[fb]', array('default' => __('#', 'gz'), 'type' => 'option', 'sanitize_callback' => 'gz_sanitize_text'));
    $wp_customize->add_setting('gz_options[tw]', array('default' => __('#', 'gz'), 'type' => 'option', 'sanitize_callback' => 'gz_sanitize_text'));
    $wp_customize->add_setting('gz_options[gg]', array('default' => __('#', 'gz'), 'type' => 'option', 'sanitize_callback' => 'gz_sanitize_text'));
    $wp_customize->add_setting('gz_options[ytb]', array('default' => __('#', 'gz'), 'type' => 'option', 'sanitize_callback' => 'gz_sanitize_text'));

    /***** Add Controls *****/

    $wp_customize->add_control('phone', array('label' => __('Số điện thoại', 'gz'), 'section' => 'gz_general', 'settings' => 'gz_options[phone]', 'priority' => 1, 'type' => 'text'));
    $wp_customize->add_control('mail', array('label' => __('Email của bạn', 'gz'), 'section' => 'gz_general', 'settings' => 'gz_options[mail]', 'priority' => 2, 'type' => 'text'));
    $wp_customize->add_control('fb', array('label' => __('Liên kết Facebook của bạn', 'gz'), 'section' => 'gz_social', 'settings' => 'gz_options[fb]', 'priority' => 2, 'type' => 'text'));
    $wp_customize->add_control('tw', array('label' => __('Liên kết Twitter của bạn', 'gz'), 'section' => 'gz_social', 'settings' => 'gz_options[tw]', 'priority' => 2, 'type' => 'text'));
    $wp_customize->add_control('gg', array('label' => __('Liên kết Google+ của bạn', 'gz'), 'section' => 'gz_social', 'settings' => 'gz_options[gg]', 'priority' => 2, 'type' => 'text'));
    $wp_customize->add_control('ytb', array('label' => __('Liên kết Youtube của bạn', 'gz'), 'section' => 'gz_social', 'settings' => 'gz_options[ytb]', 'priority' => 2, 'type' => 'text'));
	
}
add_action('customize_register', 'gz_customize_register');

/***** Data Sanitization *****/

function gz_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}
function gz_sanitize_integer($input) {
    return strip_tags(intval($input));
}
function gz_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}
function gz_sanitize_select($input) {
    $valid = array(
        'enable' => __('Enable', 'gz'),
        'disable' => __('Disable', 'gz'),
        'right' => __('Right Sidebar', 'gz'),
        'left' => __('Left Sidebar', 'gz')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

/***** Return Theme Options / Set Default Options *****/

if (!function_exists('gz_theme_options')) {
	function gz_theme_options() {
		$theme_options = wp_parse_args(
			get_option('gz_options', array()),
			gz_default_options()
		);
		return $theme_options;
	}
}

if (!function_exists('gz_default_options')) {
	function gz_default_options() {
		$default_options = array(
			'phone' => '0123 456 789',
			'mail' => __('mailcuaban@gmail.com', 'gz'),
			'fb' =>'#',
			'tw' =>'#',
			'gg' =>'#',
			'ytb' =>'#',		
		);
		return $default_options;
	}
}

/***** Enqueue Customizer CSS *****/

function gz_customizer_css() {
	wp_enqueue_style('gz-customizer-css', get_template_directory_uri() . '/admin/customizer.css', array());
}
add_action('customize_controls_print_styles', 'gz_customizer_css');

?>
