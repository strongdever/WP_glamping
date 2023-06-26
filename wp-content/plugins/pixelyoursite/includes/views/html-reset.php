<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div class="card card-static border-danger">
	<div class="card-header bg-danger text-white">
		Reset All Settings To Defaults
	</div>
	<div class="card-body">
		<p><strong>If you continue, all your custom settings will be lost and the plugin will go back to the default
                configuration.</strong> If you use any add-ons, like the Pinterest add-on or the Super Pack, their
            settings will be affected too. Custom events and scripts added with the Head & Footer option won't be
            affected.</p>
		<button type="submit" name="pys[reset_settings]" value="1"
		        class="btn btn-sm btn-danger">Yes, reset settings</button>
		<a href="<?php echo esc_url( buildAdminUrl( 'pixelyoursite' ) ); ?>"
			   class="btn btn-sm btn-light ml-3">No, go back</a>
	</div>
</div>