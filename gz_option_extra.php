<?php

function gz_customize_register($wp_customize) {

	/***** Register Custom Controls *****/

    class MH_Customize_Header_Control extends WP_Customize_Control {
        public function render_content() { ?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span> <?php
        }
    }

	class MH_Customize_Text_Control extends WP_Customize_Control {
        public function render_content() { ?>
			<span class="textfield"><?php echo esc_html($this->label); ?></span> <?php
        }
    }

    class MH_Customize_Button_Control extends WP_Customize_Control {
        public function render_content() {  ?>
			<p>
				<a href="<?php echo esc_url('http://www.mhthemes.com/themes/mh/newsdesk/'); ?>" target="_blank" class="button button-secondary"><?php echo esc_html($this->label); ?></a>
			</p> <?php
        }
    }

	/***** Add Panels *****/

	$wp_customize->add_panel('mh_theme_options', array('title' => __('Theme Options', 'gz'), 'description' => '', 'capability' => 'edit_theme_options', 'theme_supports' => '', 'priority' => 1,));

	/***** Add Sections *****/

	$wp_customize->add_section('mh_general', array('title' => __('General', 'gz'), 'priority' => 1, 'panel' => 'mh_theme_options'));
	$wp_customize->add_section('mh_upgrade', array('title' => __('Upgrade to Premium', 'gz'), 'priority' => 2, 'panel' => 'mh_theme_options'));

    /***** Add Settings *****/

	$wp_customize->add_setting('gz_options[excerpt_length]', array('default' => '35', 'type' => 'option', 'sanitize_callback' => 'gz_sanitize_integer'));
    $wp_customize->add_setting('gz_options[excerpt_more]', array('default' => __('Read More', 'gz'), 'type' => 'option', 'sanitize_callback' => 'gz_sanitize_text'));
	$wp_customize->add_setting('gz_options[sidebar]', array('default' => 'right', 'type' => 'option', 'sanitize_callback' => 'gz_sanitize_select'));
	$wp_customize->add_setting('gz_options[premium_version_label]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_setting('gz_options[premium_version_text]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_setting('gz_options[premium_version_button]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));

    /***** Add Controls *****/

    $wp_customize->add_control('excerpt_length', array('label' => __('Custom Excerpt Length in Words', 'gz'), 'section' => 'mh_general', 'settings' => 'gz_options[excerpt_length]', 'priority' => 1, 'type' => 'text'));
    $wp_customize->add_control('excerpt_more', array('label' => __('Custom Excerpt More-Text', 'gz'), 'section' => 'mh_general', 'settings' => 'gz_options[excerpt_more]', 'priority' => 2, 'type' => 'text'));
	$wp_customize->add_control('sidebar', array('label' => __('Sidebar', 'gz'), 'section' => 'mh_general', 'settings' => 'gz_options[sidebar]', 'priority' => 3, 'type' => 'select', 'choices' => array('right' => __('Right Sidebar', 'gz'), 'left' => __('Left Sidebar', 'gz'))));
	$wp_customize->add_control(new MH_Customize_Header_Control($wp_customize, 'premium_version_label', array('label' => __('Need more features and options?', 'gz'), 'section' => 'mh_upgrade', 'settings' => 'gz_options[premium_version_label]', 'priority' => 1)));
	$wp_customize->add_control(new MH_Customize_Text_Control($wp_customize, 'premium_version_text', array('label' => __('Check out the premium version of this theme which comes with more features, additional widgets and advanced customization options for your website.', 'gz'), 'section' => 'mh_upgrade', 'settings' => 'gz_options[premium_version_text]', 'priority' => 2)));
	
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
			'excerpt_length' => '35',
			'excerpt_more' => __('Read More', 'gz'),
			'sidebar' => 'right'
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
