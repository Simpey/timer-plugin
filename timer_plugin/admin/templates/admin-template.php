 		<label>Title</label>
 		<input type="text" name="<?php echo $this->get_field_name('title'); ?>"  id="<?php echo $this->get_field_id('title'); ?>"  class="tp-title" value="<?php echo esc_attr($instance['title']); ?>" /><br/><br/>
 		<a class="tp-time-edit" href="javascript:void(0);">[ Edit ]</a><br/><br/>
 		<label>Select a date:</label><br/>
 		<input type="text" name="<?php echo $this->get_field_name('date'); ?>" id="<?php echo $this->get_field_id('date'); ?>" class="tp-date " readonly="true" value="<?php echo esc_attr($instance['date']); ?>" />
 		<p ><div class="tp-time"><label>Hours</label>
 			<input name="<?php echo $this->get_field_name('hour'); ?>" id="<?php echo $this->get_field_id('hour'); ?>" class="tp-hour-val" value="<?php echo esc_attr($instance['hour']); ?>" readonly="true" /><div id="<?php echo $this->get_field_id('hour'); ?>" class="tp-hour"></div>
 		</p>
 		<p ><label>Minutes</label>  
 			<input name="<?php echo $this->get_field_name('minute'); ?>" id="<?php echo $this->get_field_id('minute'); ?>" class="tp-minute-val" readonly="true" value="<?php echo esc_attr($instance['minute']); ?>"><div id="<?php echo $this->get_field_id('minute'); ?>" class="tp-minute"></div>
 		</p>
 			<input type="hidden" name="tp-hidd" value="true" />
 			</div>
 			<?php
 			$rand    = rand( 0, 999 );
 			$ed_id   = $this->get_field_id( 'wp_editor_' . $rand );
 			$ed_name = $this->get_field_name( 'wp_editor_' . $rand );
 			$editor_id = $ed_id;
 			$settings = array(
 				'media_buttons' => false,
 				'textarea_rows' => 3,
 				'textarea_name' => $ed_name
 				);
 			wp_editor($descr, $editor_id, $settings);
 			printf(
 				'<input type="hidden" id="%s" name="%s" value="%d" />',
 				$this->get_field_id( 'the_random_number' ),
 				$this->get_field_name( 'the_random_number' ),
 				$rand
 				); ?>