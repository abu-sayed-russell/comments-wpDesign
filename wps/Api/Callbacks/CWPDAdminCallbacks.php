<?php
/**
 * @package  CommentswpDesign
 * @developer  name : Abu Sayed Russell
 */
namespace CWPD\Api\Callbacks;
class CWPDAdminCallbacks{
	
	public function cwpd_setting_view()
	{
		return require_once( CWPD_PLUGIN_DIR_PATH . 'views/setting_view.php');
	}
	public function cwpd_processSanitize( $input )
	{
		$output = get_option('cwpd_setting_data');

		if ( isset($_POST["remove"]) ) {
			unset($output[sanitize_text_field($_POST["remove"])]);

			return $output;
		}

		if ( count($output) == 0 ) {
			$output['cwpd_settings'] = $input;

			return $output;
		}

		foreach ($output as $key => $value) {
			if ('cwpd_settings' === $key) {
				$output[$key] = $input;
			} else {
				$output['cwpd_settings'] = $input;
			}
		}
		
		return $output;
	}
	
	public function cwpd_setting_sanitize( $input ){
		$output = esc_textarea( $input );
		return $input;
	}
	
	public function cwpd_optionField( $args ) {
		switch ($args['input_type']) {
			case 'text':
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$cwpdSettingOption  = get_option( 'cwpd_setting_data' ) ?: array();
				$data = isset($cwpdSettingOption[1][$name]) ? $cwpdSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				echo '<div class="form-group"><input type="text" class="regular-text form-control" id="' . sanitize_title($name) . '" name="' . $option_name . '[' . sanitize_text_field($name) . ']" value="' . sanitize_text_field($value) . '" placeholder="' . sanitize_text_field($args['placeholder']) . '"></div>';
				break;
				case 'number':
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$cwpdSettingOption  = get_option( 'cwpd_setting_data' ) ?: array();
				$data = isset($cwpdSettingOption[1][$name]) ? $cwpdSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				echo '<div class="form-group"><input type="number" class="regular-text form-control" id="' . sanitize_title($name) . '" name="' . $option_name . '[' . sanitize_text_field($name) . ']" value="' . sanitize_text_field($value) . '" placeholder="' . sanitize_text_field($args['placeholder']) . '"></div>';
				break;
				case 'email':
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$cwpdSettingOption  = get_option( 'cwpd_setting_data' ) ?: array();
				$data = isset($cwpdSettingOption[1][$name]) ? $cwpdSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				echo '<div class="form-group"><input type="email" class="regular-text form-control" id="' . sanitize_title($name) . '" name="' . $option_name . '[' . sanitize_text_field($name) . ']" value="' . sanitize_text_field($value) . '" placeholder="' . sanitize_text_field($args['placeholder']) . '"></div>';
				break;
			case 'password':
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$cwpdSettingOption  = get_option( 'cwpd_setting_data' ) ?: array();
				$data = isset($cwpdSettingOption[1][$name]) ? $cwpdSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				echo '<div class="form-group"><input oncontextmenu="return false;" type="password" class="regular-text form-control" id="' . sanitize_title($name) . '" name="' . $option_name . '[' . sanitize_text_field($name) . ']" value="' . sanitize_text_field($value) . '" placeholder="' . sanitize_text_field($args['placeholder']) . '"></div>';
				break;
			case 'checkbox':
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$cwpdSettingOption  = get_option( 'cwpd_setting_data' ) ?: array();
				$data = isset($cwpdSettingOption[1][$name]) ? $cwpdSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				$checked = isset($value) ? ($value ? true : false) : false;
				echo '<div class="form-group">
				<div class="onoffswitch">
		            <input type="' . $args['input_type'] . '" id="' . sanitize_title($name) . '" class="onoffswitch-checkbox" value="1" name="' . $option_name . '[' . sanitize_text_field($name) . ']" style="display:none;" ' . ( $checked ? 'checked' : '') . '>
		            <label class="onoffswitch-label" for="' . $name . '" data-toggle="tooltip" title="Check this option to turn on the smtp auth."></label>
		        </div></div>';
				break;
			case 'select':
			$html = '';
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$cwpdSettingOption  = get_option( 'cwpd_setting_data' ) ?: array();
				$data = isset($cwpdSettingOption[1][$name]) ? $cwpdSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}
				$select_option        = $args['select_option'];

				$html .= '<div class="form-group">';
				$html .= '<select class="regular-text form-control" id="' . sanitize_title($name) . '" name="' . $option_name . '[' . sanitize_text_field($name) . ']">';
				foreach( $select_option as $s_key => $s_value ) {
				$selected = '';
                    if ( $value == $s_key ) {
                      $selected = 'selected';
                    } 
					$html .= '<option value="'. $s_key.'" '.$selected.'>'.$s_value.'</option>';
				}

				$html .= '</select></div>';
				echo $html;
				break;
			case 'switch':
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$cwpdSettingOption  = get_option( 'cwpd_setting_data' ) ?: array();
				$data = isset($cwpdSettingOption[1][$name]) ? $cwpdSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				$checked = isset($value) ? ($value ? true : false) : false;
				echo '<div class="form-group">
				<div class="onoffswitch">
		            <input type="checkbox" id="' . sanitize_title($name) . '" class="onoffswitch-checkbox" value="1" name="' . $option_name . '[' . sanitize_text_field($name) . ']" style="display:none;" ' . ( $checked ? 'checked' : '') . '>
		            <label class="onoffswitch-label" for="' . $name . '" data-toggle="tooltip" title="Check this option to turn on the smtp auth."></label>
		        </div></div>';
				break;
			
			case 'textarea':
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$cwpdSettingOption  = get_option( 'cwpd_setting_data' ) ?: array();
				$data = isset($cwpdSettingOption[1][$name]) ? $cwpdSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				echo '<div class="form-group"><textarea class="regular-text form-control" id="' . sanitize_title($name) . '" name="' . $option_name . '[' . sanitize_text_field($name) . ']" value="' . sanitize_text_field($value) . '" placeholder="' . sanitize_text_field($args['placeholder']) . '"></textarea></div>';
				break;
			
			
			default:
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$cwpdSettingOption  = get_option( 'cwpd_setting_data' ) ?: array();
				$data = isset($cwpdSettingOption[1][$name]) ? $cwpdSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				echo '<div class="form-group"><input type="' . $args['input_type'] . '" class="regular-text form-control" id="' . sanitize_title($name) . '" name="' . $option_name . '[' . sanitize_text_field($name) . ']" value="' . sanitize_text_field($value) . '" placeholder="' . sanitize_text_field($args['placeholder']) . '"></div>';
				break;
		}
	}
}
