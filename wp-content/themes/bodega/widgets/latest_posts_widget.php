<?php

class Qode_Latest_Posts extends WP_Widget {
	private $params;
	public function __construct() {
		parent::__construct(
			'qode_latest_posts_widget', // Base ID
			'Select Blog', // Name
			array( 'description' => __( 'Display posts from your blog', 'qode' ), ) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name' => 'type',
				'type' => 'dropdown',
				'title' => 'Type',
				'options' => array(
					"image_in_box" => "Image in left box",
					"boxes" => "Boxes",
					"post_over_image" => "Post Over Image",
					"image_with_date" => "Image With Date",
					"minimal" => "Minimal",
					"split_column" => "Split column",
					"date_in_left_section" => "Date in Left Section"
				)
			),
			array(
				'name' => 'number_of_posts',
				'type' => 'textfield',
				'title' => 'Number of posts'
			),
			array(
				'name' => 'image_size',
				'type' => 'dropdown',
				'title' => 'Image size',
				'options' => array(
					'original' => 'Original',
					'landscape' => 'Landscape'
				)
			),
			array(
				'name' => 'number_of_columns',
				'type' => 'dropdown',
				'title' => 'Number of columns',
				'options' => array(
					'1' => 'One',
					'2' => 'Two',
					'3' => 'Three',
					'4' => 'Four'
				)
			),
			array(
				'name' => 'overlay_color',
				'type' => 'textfield',
				'title' => 'Overlay Color'
			),
			array(
				'name' => 'overlay_icon',
				'type' => 'dropdown',
				'title' => 'Display Overlay Icon',
				'options' => array(
					'0' => 'No',
					'1' => 'Yes'
				)
			),
			array(
				'name' => 'order_by',
				'type' => 'dropdown',
				'title' => 'Order By',
				'options' => array(
					'title' => 'Title',
					'date' => 'Date'
				)
			),
			array(
				'name' => 'order',
				'type' => 'dropdown',
				'title' => 'Order',
				'options' => array(
					'ASC' => 'ASC',
					'DESC' => 'DESC'
				)
			),
			array(
				'name' => 'category',
				'type' => 'textfield',
				'title' => 'Category Slug'
			),
			array(
				'name' => 'vertical_align_text',
				'type' => 'dropdown',
				'title' => 'Vertical Alignment of text',
				'options' => array(
					'middle' => 'Default/middle',
					'top' => 'Top',
					'bottom' => 'Bottom'
				)
			),
			array(
				'name' => 'text_length',
				'type' => 'textfield',
				'title' => 'Number of characters'
			),
			array(
				'name' => 'title_tag',
				'type' => 'dropdown',
				'title' => 'Title Tag',
				'options' => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6"
				)
			),
			array(
				'name' => 'title_size',
				'type' => 'textfield',
				'title' => 'Title Size (px)'
			),
			array(
				'name' => 'title_color',
				'type' => 'textfield',
				'title' => 'Title Color'
			),
			array(
				'name' => 'display_excerpt',
				'type' => 'dropdown',
				'title' => 'Display Excerpt',
				'options' => array(
					'' => 'Default',
					'0' => 'No',
					'1' => 'Yes'
				)
			),
			array(
				'name' => 'excerpt_color',
				'type' => 'textfield',
				'title' => 'Excerpt Color'
			),
			array(
				'name' => 'info_position',
				'type' => 'dropdown',
				'title' => 'Info Position',
				'options' => array(
					'' => 'Default',
					'top' => 'Top',
					'bottom' => 'Bottom'
				)
			),
			array(
				'name' => 'post_info_font_size',
				'type' => 'textfield',
				'title' => 'Post info font size (px)'
			),
			array(
				'name' => 'post_info_color',
				'type' => 'textfield',
				'title' => 'Post info color'
			),
			array(
				'name' => 'post_info_link_color',
				'type' => 'textfield',
				'title' => 'Post info link color'
			),
			array(
				'name' => 'post_info_font_family',
				'type' => 'textfield',
				'title' => 'Post info font family'
			),
			array(
				'name' => 'post_info_text_transform',
				'type' => 'dropdown',
				'title' => 'Post info text transform',
				'options' => array(
					'' => 'Default',
					'none' => 'None',
					'capitalize' => 'Capitalize',
					'uppercase' => 'Uppercase',
					'lowercase' => 'Lowercase'
				)
			),
			array(
				'name' => 'post_info_font_weight',
				'type' => 'dropdown',
				'title' => 'Post info font weight',
				'options' => array(
					'' => 'Default',
					'100' => 'Thin 100',
					'200' => 'Extra-Light 200',
					'300' => 'Light 300',
					'400' => 'Regular 400',
					'500' => 'Medium 500',
					'600' => 'Semi-Bold 600',
					'700' => 'Bold 700',
					'800' => 'Extra-Bold 800',
					'900' => 'Ultra-Bold 900'
				)
			),
			array(
				'name' => 'post_info_font_style',
				'type' => 'dropdown',
				'title' => 'Post info font style',
				'options' => array(
					'' => 'Default',
					'normal' => 'Normal',
					'italic' => 'Italic'
				)
			),
			array(
				'name' => 'post_info_letter_spacing',
				'type' => 'textfield',
				'title' => 'Post info letter spacing (px)'
			),
			array(
				'name' => 'display_category',
				'type' => 'dropdown',
				'title' => 'Display Category',
				'options' => array(
					'' => 'Default',
					'1' => 'Yes',
					'0' => 'No'
				)
			),
			array(
				'name' => 'display_date',
				'type' => 'dropdown',
				'title' => 'Display Date',
				'options' => array(
					'' => 'Default',
					'1' => 'Yes',
					'0' => 'No'
				)
			),
			array(
				'name' => 'date_size',
				'type' => 'textfield',
				'title' => 'Date Size (px)'
			),
			array(
				'name' => 'date_position',
				'type' => 'dropdown',
				'title' => 'Date Position',
				'options' => array(
					'in_icon' => 'In icon',
					'down_in_info_section' => 'Down in info section'
				)
			),
			array(
				'name' => 'display_author',
				'type' => 'dropdown',
				'title' => 'Display Author',
				'options' => array(
					'' => 'Default',
					'1' => 'Yes',
					'0' => 'No'
				)
			),
			array(
				'name' => 'display_comments',
				'type' => 'dropdown',
				'title' => 'Display Comments',
				'options' => array(
					'' => 'Default',
					'1' => 'Yes',
					'0' => 'No'
				)
			),
			array(
				'name' => 'background_color',
				'type' => 'textfield',
				'title' => 'Box Background Color'
			),
			array(
				'name' => 'separator',
				'type' => 'dropdown',
				'title' => 'Separator',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				)
			),
			array(
				'name' => 'separator_color',
				'type' => 'textfield',
				'title' => 'Separator Color'
			),
			array(
				'name' => 'separator_border_style',
				'type' => 'dropdown',
				'title' => 'Separator Border Style',
				'options' => array(
					'' => 'Default',
					'dashed' => 'Dashed',
					'solid' => 'Solid'
				)
			),
			array(
				'name' => 'border_color',
				'type' => 'textfield',
				'title' => 'Separator Between Item Color'
			),
			array(
				'name' => 'border_width',
				'type' => 'textfield',
				'title' => 'Separator Between Item Thickness (px)'
			),
			array(
				'name' => 'display_like',
				'type' => 'dropdown',
				'title' => 'Display Like',
				'options' => array(
					'' => 'Default',
					'1' => 'Yes',
					'0' => 'No'
				)
			),
			array(
				'name' => 'display_share',
				'type' => 'dropdown',
				'title' => 'Display Share',
				'options' => array(
					'' => 'Default',
					'1' => 'Yes',
					'0' => 'No'
				)
			),
			array(
				'name' => 'display_button',
				'type' => 'dropdown',
				'title' => 'Display Button',
				'options' => array(
					'' => 'Default',
					'1' => 'Yes',
					'0' => 'No'
				)
			),
			array(
				'name' => 'button_size',
				'type' => 'dropdown',
				'title' => 'Button Size',
				'options' => array(
					"" => "Default",
					"small" => "Small",
					"medium" => "Medium",
					"large" => "Large",
					"big_large" => "Extra Large"
				)
			),
			array(
				'name' => 'button_style',
				'type' => 'dropdown',
				'title' => 'Button Style',
				'options' => array(
					"" => "Default",
					"white" => "White",
					"mid_transparent" => "Mid-Transparent",
					"top_and_bottom_border" => "Top-and-bottom-border"
				)
			),
			array(
				'name' => 'button_text',
				'type' => 'textfield',
				'title' => 'Button Text'
			),
			array(
				'name' => 'button_color',
				'type' => 'textfield',
				'title' => 'Button Text Color'
			),
			array(
				'name' => 'button_hover_color',
				'type' => 'textfield',
				'title' => 'Button Text Hover Color'
			),
			array(
				'name' => 'button_background_color',
				'type' => 'textfield',
				'title' => 'Button Background Color'
			),
			array(
				'name' => 'button_hover_background_color',
				'type' => 'textfield',
				'title' => 'Button Hover Background Color'
			),
			array(
				'name' => 'button_border_color',
				'type' => 'textfield',
				'title' => 'Button Border Color'
			),
			array(
				'name' => 'button_border_width',
				'type' => 'textfield',
				'title' => 'Button Border Width'
			),
			array(
				'name' => 'button_hover_border_color',
				'type' => 'textfield',
				'title' => 'Button Hover Border Color'
			),
			array(
				'name' => 'button_border_radius',
				'type' => 'textfield',
				'title' => 'Button Border Radius (px)'
			)
		);
	}

	public function getParams() {
		return $this->params;
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = '';

		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params .= " $key = '$value' ";
			}
		}

		echo '<div class="widget qode-latest-posts-widget">';

		//finally call the shortcode
		echo do_shortcode("[no_blog_list $params]");

		echo '</div>'; //close div.qode-latest-posts-widget
	}

	public function form($instance) {
		foreach ($this->params as $param_array) {
			$param_name = $param_array['name'];
			${$param_name} = isset( $instance[$param_name] ) ? esc_attr( $instance[$param_name] ) : '';
		}

		foreach ($this->params as $param) {
			switch($param['type']) {
				case 'textfield':
					?>
					<p>
						<label for="<?php echo esc_attr($this->get_field_id( $param['name']) ); ?>"><?php _e( $param['title'].':','qode' ); ?></label>
						<input class="widefat" id="<?php echo esc_attr($this->get_field_id( $param['name']) ); ?>" name="<?php echo esc_attr($this->get_field_name( $param['name'] )); ?>" type="text" value="<?php echo esc_attr( ${$param['name']} ); ?>" />
					</p>
					<?php
					break;
				case 'dropdown':
					?>
					<p>
						<label for="<?php echo esc_attr($this->get_field_id( $param['name']) ); ?>"><?php _e( $param['title'].':','qode'); ?></label>
						<?php if(isset($param['options']) && is_array($param['options']) && count($param['options'])) { ?>
							<select class="widefat" name="<?php echo esc_attr($this->get_field_name( $param['name'] )); ?>" id="<?php echo esc_attr($this->get_field_id( $param['name'] )); ?>">
								<?php foreach ($param['options'] as $param_option_key => $param_option_val) {
									$option_selected = '';
									if(${$param['name']} == $param_option_key) {
										$option_selected = 'selected';
									}
									?>
									<option <?php echo esc_attr($option_selected); ?> value="<?php echo esc_attr($param_option_key); ?>"><?php echo esc_html($param_option_val); ?></option>
								<?php } ?>
							</select>
						<?php } ?>
					</p>

					<?php
					break;
			}
		}
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		foreach ($this->params as $param) {
			$param_name = $param['name'];

			$instance[$param_name] = sanitize_text_field($new_instance[$param_name]);
		}

		return $instance;
	}
}

function qode_latest_posts_widget_load(){
	register_widget('Qode_Latest_Posts');
}

add_action('widgets_init', 'qode_latest_posts_widget_load');
