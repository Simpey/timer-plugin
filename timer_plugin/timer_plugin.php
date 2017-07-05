<?php
/*
 Plugin Name: Task timer
 Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 Description: Test task
 Version: 0.2
 Author: Okhmat Aleksey
 Author URI: http://URI_Of_The_Plugin_Author
 License: none

 */

 define( 'WP_Timer_PLUGIN', __FILE__ );
 define( 'WP_Timer_PLUGIN_DIR', untrailingslashit( dirname( WP_Timer_PLUGIN ) ) );
 define( 'WP_Timer_THEME_TEMPLATE_DIR', (get_stylesheet_directory() . '/' . 'countdown/layout.php') );

 class Countdown_Timer extends WP_Widget {

 	public function Countdown_Timer()
 	{
 		$widget_ops = array('classname' => 'Countdown_Timer', 'description' => 'Timer for the test task' );
 		$this->WP_Widget('Countdown_Timer', 'Timer', $widget_ops);
 	}

 	public function form($instance) {
 		if( $instance) {
 			$title = esc_attr($instance['title']);
 			$descr=$instance['descr'];
 			$date = esc_attr($instance['date']);
 			$hour = esc_attr($instance['hour']);
 			$minute = esc_attr($instance['minute']);
 		} else {
 			$title = '';
 			$date = '';
 			$hour = '';
 			$descr='';
 			$minute = '';
 		}
 		require_once WP_Timer_PLUGIN_DIR . '/admin/templates/admin-template.php';
 	}

 	public function update($new_instance, $old_instance) {
 		$instance = $old_instance;
 		$rand = (int)$new_instance['the_random_number'];
 		$instance['descr'] =$new_instance[ 'wp_editor_' . $rand ];
 		$instance['title'] = strip_tags($new_instance['title']);
 		$instance['date'] = strip_tags($new_instance['date']);
 		$instance['hour'] = strip_tags($new_instance['hour']);
 		$instance['minute'] = strip_tags($new_instance['minute']);
 		return $instance;
 	}

 	public function widget($args, $instance) {
 		
 		$temp_date = explode("/", $instance['date']);
 		$instance['date'] = $temp_date[2] . "/" . $temp_date[0] . "/" . $temp_date[1];
 		extract($args);
 		$title = apply_filters('widget_title', $instance['title']);
 		echo $args['before_widget'];
 		if (file_exists( WP_Timer_THEME_TEMPLATE_DIR)) {
 			include WP_Timer_THEME_TEMPLATE_DIR;
 		} else {
 			if (!empty($title)){
 				?>
 				<div class="tp-title">
 					<?php
 					echo $before_title . $title . $after_title;
 				}
 				?>
 			</div>
 			<p class="clockTitle">Description:</p>
 			<p><?php echo $instance['descr']; ?></p>
 			<?php
 			echo do_shortcode('[tp_shortcode date="' . $instance['date'] . '" time="'. $instance['hour'] . ':' . $instance['minute'] . '"]');
 		} 
 		echo $after_widget;
 	}
 }

 require_once WP_Timer_PLUGIN_DIR . '/includes/shortcodes.php';
 require_once WP_Timer_PLUGIN_DIR . '/includes/functions.php';
 ?>
 