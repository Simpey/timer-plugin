<?php
function TP_widgets_init() {
 		register_widget("Countdown_Timer");
 	}

function TP_admin_register_scripts() {
 		wp_register_script('tp-admin-script', plugins_url('/admin/js/admin-script.js', WP_Timer_PLUGIN));
 		wp_enqueue_script('jquery-ui-core');
 		wp_enqueue_script('jquery-ui-datepicker');
 		wp_enqueue_script('jquery-ui-slider');
 		wp_enqueue_script('tp-admin-script');
 	}

 	function TP_admin_register_styles() {
 		wp_register_style('jquery-ui-theme', plugins_url('/admin/css/jquery-ui.css', WP_Timer_PLUGIN));
 		wp_register_style('tp-admin-style', plugins_url('/admin/css/admin-style.css', WP_Timer_PLUGIN));
 		wp_enqueue_style('jquery-ui-theme');
 		wp_enqueue_style('tp-admin-style');
 	}

 	function TP_widget_script(){
 		global $pagenow;
 		if ( 'widgets.php' === $pagenow )
 			wp_enqueue_script( 'widget-script', plugins_url( '/js/widget_script.js', WP_Timer_PLUGIN), array( 'jquery' ), false, true );
 	}

 	function TP_register_scripts() {
 		wp_register_script('tp-script', plugins_url('/js/script.js', WP_Timer_PLUGIN));
 		wp_enqueue_script('jquery');
 		wp_enqueue_script('tp-script');
 	}

 	function TP_register_styles() {
 		wp_register_style('tp-style', plugins_url('/css/style.css', WP_Timer_PLUGIN));
 		wp_enqueue_style('tp-style');
 	}

 		add_action('widgets_init', 'TP_widgets_init');
 		add_action('admin_print_scripts', 'TP_admin_register_scripts');
 		add_action('admin_print_styles', 'TP_admin_register_styles');
 		add_action('wp_print_scripts', 'TP_register_scripts');
 		add_action('wp_print_styles', 'TP_register_styles');
 		add_action( 'admin_init', 'TP_widget_script' );
?>