<?php
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} else {
	$root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	if ( file_exists( $root.'/wp-load.php' ) ) {
    	require_once( $root.'/wp-load.php' );
	}
}
header('Content-type: application/x-javascript');
?>

function ajaxSubmitCommentForm(){
	"use strict";

	var options = { 
		success: function(){
			$j("#commentform textarea").val("");
			$j("#commentform .success p").text("<?php _e('Comment has been sent!','qode'); ?>");
		}
	}; 
	
	$j('#commentform').submit(function() {
		$j(this).find('input[type="submit"]').next('.success').remove();
		$j(this).find('input[type="submit"]').after('<div class="success"><p></p></div>');
		$j(this).ajaxSubmit(options); 
		return false; 
	}); 
}
var header_height = 90;
var min_header_height_scroll = 57;
var min_header_height_sticky = 60;
var scroll_amount_for_sticky = 85;
var min_header_height_fixed_hidden = 45;
var content_height_default = 60;
var default_content_padding = 42; /* padding top 21 + padding bottom 21 */
var default_content_icon_size = 24;
var content_height_with_icon = content_height_default + default_content_icon_size;
var header_bottom_border_weight = 1;
var scroll_amount_for_fixed_hiding = 200;
var menu_item_margin = 0;
var large_menu_item_border = 0;
var element_appear_amount = -150;
var paspartu_width_init = 0.02;
var directionNavArrows = 'arrow_carrot-';
var directionNavArrowsTestimonials = 'fa fa-angle-';
<?php
if(is_admin_bar_showing()){
?>
var add_for_admin_bar = 32;
<?php
}else{
?>
var add_for_admin_bar = 0;
<?php
}
?>
<?php if(isset($qode_options['header_height'])){
	if ($qode_options['header_height'] !== '') { ?>
	header_height = <?php echo esc_attr($qode_options['header_height']); ?>;
<?php } } ?>
<?php if(isset($qode_options['header_height_scroll'])){
	if ($qode_options['header_height_scroll'] !== "") { ?>
	min_header_height_scroll = <?php echo esc_attr($qode_options['header_height_scroll']); ?>;
<?php } } ?>
<?php if(isset($qode_options['header_height_sticky'])){
	if ($qode_options['header_height_sticky'] !== "") { ?>
	min_header_height_sticky = <?php echo esc_attr($qode_options['header_height_sticky']); ?>;
<?php } } ?>
<?php if(isset($qode_options['scroll_amount_for_sticky'])){
	if (!empty($qode_options['scroll_amount_for_sticky'])) { ?>
	scroll_amount_for_sticky = <?php echo esc_attr($qode_options['scroll_amount_for_sticky']); ?>;
<?php } } ?>
<?php if(isset($qode_options['header_height_scroll_hidden'])){
    if (!empty($qode_options['header_height_scroll_hidden'])) { ?>
    min_header_height_fixed_hidden = <?php echo esc_attr($qode_options['header_height_scroll_hidden']); ?>;
<?php } } ?>
<?php if((isset($qode_options['content_menu_text_lineheight']) && $qode_options['content_menu_text_lineheight'] != "")
    ||(isset($qode_options['content_menu_icon_size']) && $qode_options['content_menu_icon_size'] != "")){ ?>
    //get default line-height (height - padding)

    content_height_default -= default_content_padding;
    <?php if(isset($qode_options['content_menu_text_lineheight']) && $qode_options['content_menu_text_lineheight'] != ""){ ?>
        content_height_default = <?php echo esc_attr($qode_options['content_menu_text_lineheight']); ?>;
    <?php } ?>

    content_height_default += default_content_padding;

    <?php if(isset($qode_options['content_menu_icon_size']) && $qode_options['content_menu_icon_size'] != ""){ ?>
        content_height_with_icon = content_height_default + <?php echo esc_attr($qode_options['content_menu_icon_size']); ?>;
    <?php } else{ ?>
        content_height_with_icon = content_height_default + default_content_icon_size;
    <?php } ?>

<?php } ?>
<?php if(isset($qode_options['scroll_amount_for_fixed_hiding'])){
    if (!empty($qode_options['scroll_amount_for_fixed_hiding'])) { ?>
        scroll_amount_for_fixed_hiding = <?php echo esc_attr($qode_options['scroll_amount_for_fixed_hiding']); ?>;
<?php } } ?>

<?php
if(isset($qode_options['enable_manu_item_border']) && $qode_options['enable_manu_item_border']=='yes' && isset($qode_options['menu_item_style']) && $qode_options['menu_item_style']=='large_item'){
    if(isset($qode_options['menu_item_border_style']) && $qode_options['menu_item_border_style']=='all_borders'){ ?>
		large_menu_item_border = <?php echo esc_attr($qode_options['menu_item_border_width'])*2;
	} ?>
	<?php if(isset($qode_options['menu_item_border_style']) && $qode_options['menu_item_border_style']=='top_bottom_borders'){ ?>
		large_menu_item_border = <?php echo esc_attr($qode_options['menu_item_border_width'])*2;
	} ?>
	<?php if(isset($qode_options['menu_item_border_style']) && $qode_options['menu_item_border_style']=='bottom_border'){ ?>
		large_menu_item_border = <?php  echo esc_attr($qode_options['menu_item_border_width']);
	} ?>
<?php } ?>

<?php if(isset($qode_options['element_appear_amount']) && $qode_options['element_appear_amount'] !== "" ){ ?>
    element_appear_amount = -<?php echo esc_attr($qode_options['element_appear_amount']); ?>;
<?php } ?>

<?php if(isset($qode_options['paspartu_width']) && $qode_options['paspartu_width'] !== ""){ ?>
    paspartu_width_init = <?php echo esc_attr($qode_options['paspartu_width'])/100; ?>;
<?php } ?>

var logo_height = 130; // cayman logo height
var logo_width = 280; // cayman logo width
	<?php 
		$logo_width = $qode_options['logo_width'];
		$logo_height = $qode_options['logo_height'];
	?>
    logo_width = <?php echo esc_attr($logo_width); ?>;
    logo_height = <?php echo esc_attr($logo_height); ?>;

<?php if(isset($qode_options['menu_margin_left_right'])){
	if ($qode_options['menu_margin_left_right'] !== '') { ?>
		menu_item_margin = <?php echo esc_attr($qode_options['menu_margin_left_right']); ?>;
<?php } } ?>
var header_top_height = 0;	
<?php if(isset($qode_options['header_top_area'])){
	if ($qode_options['header_top_area'] == "yes") { ?>
	header_top_height = 36;
<?php }}?>
var loading_text;
loading_text = '<?php _e('Loading new posts...', 'qode'); ?>';
var finished_text;
finished_text = '<?php _e('No more posts', 'qode'); ?>';

var piechartcolor;
piechartcolor	= "#e6ae48";

<?php if(isset($qode_options['first_color']) && !empty($qode_options['first_color'])){ ?>
	piechartcolor = "<?php echo esc_attr($qode_options['first_color']); ?>";
<?php } ?>

<?php if(isset($qode_options['navigation_arrows_type']) && $qode_options['navigation_arrows_type'] != '') { ?>
	directionNavArrows = '<?php echo esc_attr($qode_options['navigation_arrows_type']); ?>';
<?php } ?>

<?php if(isset($qode_options['testimonials_arrows_type']) && $qode_options['testimonials_arrows_type'] != '') { ?>
	directionNavArrowsTestimonials = '<?php echo esc_attr($qode_options['testimonials_arrows_type']); ?>';
<?php } ?>

var no_ajax_pages = [];
var qode_root = '<?php echo home_url(); ?>/';
var theme_root = '<?php echo QODE_ROOT; ?>/';
<?php if($qode_options['header_style'] != ''){ ?>
var header_style_admin = "<?php echo esc_attr($qode_options['header_style']); ?>";
<?php }else{ ?>
var header_style_admin = "";
<?php } ?>
if(typeof no_ajax_obj !== 'undefined') {
no_ajax_pages = no_ajax_obj.no_ajax_pages;
}