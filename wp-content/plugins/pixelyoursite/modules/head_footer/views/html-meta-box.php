<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$meta = get_post_meta( $post->ID, '_pys_head_footer', true );

if ( ! is_array( $meta ) ) {

	$meta = array(
		'disable_global' => false,
		'head_any'       => '',
		'head_desktop'   => '',
		'head_mobile'    => '',
		'footer_any'     => '',
		'footer_desktop' => '',
		'footer_mobile'  => '',
	);

}

?>

<style type="text/css">
	.pys-head-footer label {
		display: block;
		margin-top: 15px;
		margin-bottom: 5px;
		font-weight: bold;
	}

	.pys-head-footer textarea {
		width: 100%;
		font-family: monospace;
	}
</style>

<div class="pys-head-footer">
	<p>Add any script in the Head or Footer section of your pages. You can also add custom per page scripts
		by editing each page.</p>
</div>

<div class="pys-head-footer" style="margin: 15px 0;">
	<label for="pys_head_footer_disable_global" style="font-weight: normal;">
		<input name="pys_head_footer[disable_global]"
		       type="checkbox"
			<?php checked( $meta['disable_global'] ); ?>
			   id="pys_head_footer_disable_global"
			   value="1"> Disable <a href="<?php echo admin_url( 'admin.php?page=pixelyoursite&tab=head_footer' ); ?>"
		                             target="_blank">global</a>	head and footer scripts.
	</label>
</div>

<hr>

<div class="pys-head-footer">

	<label for="pys_head_footer_head_any" class="control-label">Head (any device type):</label>
	<textarea name="pys_head_footer[head_any]" id="pys_head_footer_head_any"
	          rows="10"><?php @esc_html_e( $meta['head_any'] ); ?></textarea>

	<label for="pys_head_footer_head_desktop" class="control-label">Head - Desktop Only:</label>
	<textarea name="pys_head_footer[head_desktop]" id="pys_head_footer_head_desktop"
	          rows="5"><?php @esc_html_e( $meta['head_desktop'] ); ?></textarea>

	<label for="pys_head_footer_head_mobile" class="control-label">Head - Mobile Only:</label>
	<textarea name="pys_head_footer[head_mobile]" id="pys_head_footer_head_mobile"
	          rows="5"><?php @esc_html_e( $meta['head_mobile'] ); ?></textarea>

	<hr style="margin-top: 15px;">

	<label for="pys_head_footer_footer_any" class="control-label">Footer (any device type):</label>
	<textarea name="pys_head_footer[footer_any]" id="pys_head_footer_footer_any"
	          rows="10"><?php @esc_html_e( $meta['footer_any'] ); ?></textarea>

	<label for="pys_head_footer_footer_desktop" class="control-label">Footer - Desktop Only:</label>
	<textarea name="pys_head_footer[footer_desktop]" id="pys_head_footer_footer_desktop"
	          rows="5"><?php @esc_html_e( $meta['footer_desktop'] ); ?></textarea>

	<label for="pys_head_footer_footer_mobile" class="control-label">Footer - Mobile Only:</label>
	<textarea name="pys_head_footer[footer_mobile]" id="pys_head_footer_footer_mobile"
	          rows="5"><?php @esc_html_e( $meta['footer_mobile'] ); ?></textarea>

	<hr style="margin-top: 15px;">

	<?php include 'html-variables-help.php'; ?>

</div>

<script type="application/javascript">
    // collapse meta box by default
    jQuery('#pys-head-footer').addClass('closed');
</script>
