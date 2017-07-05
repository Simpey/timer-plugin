<?php
function TP_shortcode( $atts )
{
   $filedir = get_stylesheet_directory() . '/' . 'countdown/layout.php';
    extract( shortcode_atts( array(
        'date' => 'NaN',
      'time' => 'NaN',
    ), $atts ) );
      return file_exists(WP_Timer_THEME_TEMPLATE_DIR) ? include(WP_Timer_THEME_TEMPLATE_DIR) :  '<div class="timer-main">
      <input type="hidden" class="tp-widget-date" value="'.$date.'" />
      <input type="hidden" class="tp-widget-time" value="'.$time.':0" />
      <p class="clockTitle">Time remains:</p>
      <div id="clockdiv">
      <div>
      <span id="years"></span>
      <div class="smalltext">Years</div>
      </div>
      <div>
      <span id="days"></span>
      <div class="smalltext">Days</div>
      </div>
      <div>
      <span id="hours"></span>
      <div class="smalltext">Hours</div>
      </div>
      <div>
      <span id ="minutes"></span>
      <div class="smalltext">Minutes</div>
      </div>
      <div>
      <span id="seconds"></span>
      <div class="smalltext">Seconds</div>
      </div>
      </div>
      </div>';
}

add_shortcode('tp_shortcode', 'TP_shortcode' );
?>
