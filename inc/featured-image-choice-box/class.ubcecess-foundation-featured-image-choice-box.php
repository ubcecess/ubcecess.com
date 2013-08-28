<?php

/**
 * 
 */
 
class UBCECESS_Foundation_Featured_Post_Choice_Box {

	private $checkboxes = array(
		'type' => 'checkbox',
		'options' => array(
			array( 'name' => 'Featured Image in Post', 'id' => '_ubcecess_featured_image_in_post', 'default' => 'off' ),
			array( 'name' => 'Feature Post in Slider', 'id' => '_ubcecess_featured_image_in_slider', 'default' => 'on' )
		)
	);

	public function __construct() {
		add_action( 'add_meta_boxes_post', array( $this, 'featured_image_checkbox' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}
	
	public function featured_image_checkbox() {
		add_meta_box(
			'ubcecess_featured_post_checkbox',
			'Featured Post Options',
			array( $this, 'render' ),
			'post',
			'side', 
			'default'
		);
	}
	
	public function render(){
		global $post;
		echo '<input type="hidden" name="ubcecess_featured_post_checkbox" value="'. wp_create_nonce( 'UBCECESS_Featured_Post_Checkbox' ) .'" />';
		$meta = get_post_meta( $post->ID );
		$this->the_checkboxes( $meta );
	}
	
	public function the_checkboxes( $meta ) {
		?>
		<?php foreach( $this->checkboxes['options'] as $option ) { ?>
			<?php $confirm = isset( $meta[$option['id']] ) ? esc_attr( $meta[$option['id']][0] ) : esc_attr( $option['default'] ); ?>
			<?php $checked = $confirm === 'on' ? 'checked="checked"' : ''; ?>
			<p class="meta-options">
				<label for="<?php echo $option['id']; ?> class="selctit">
					<input name="<?php echo $option['id']; ?>" type="<?php echo $this->checkboxes['type']; ?>" id="<?php echo $option['id']; ?>" <?php echo $checked; ?>>
					<label for="<?php echo $option['id']; ?>"><?php echo $option['name']; ?></label>
				</label>
			</p>
		<?php
		}
	}
	
	public function save( $post_id ) {
		// verify the nonce
		if( !wp_verify_nonce( $_POST['ubcecess_featured_post_checkbox'], 'UBCECESS_Featured_Post_Checkbox' ) ) {
			return $post_id;
		}
		
		// check autosave
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		
		// check permissions
		if( 'post' == $_POST['post_type'] ) {
			if( !current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}
		
		// saving the checkboxes
		foreach( $this->checkboxes['options'] as $option ) {
			$confirm = isset( $_POST[$option['id']] ) && $_POST[$option['id']] ? 'on' : 'off';
			$this->create_post_meta_fields( $post_id, $options['id'], $confirm );
			update_post_meta( $post_id, $option['id'], $confirm );
		}
	}
	
	private function create_post_meta_fields( $post_id, $key, $value ) {
		add_post_meta( $post_id, $key, $value, true );
	}

}

new UBCECESS_Foundation_Featured_Post_Choice_Box();