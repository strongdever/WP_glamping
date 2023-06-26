<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div class="wrap" id="pys">
	<h1><?php _e( 'PixelYourSite', 'pys' ); ?></h1>
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="section-title">Licenses</h2>

				<form method="post" enctype="multipart/form-data">

					<?php wp_nonce_field( 'pys_save_settings' ); ?>
     
					<?php foreach ( PYS()->getRegisteredPlugins() as $plugin ) : /** @var Plugin|Settings $plugin */ ?>

                        <?php if ( $plugin->getSlug() == 'head_footer' ) { continue; } ?>
                        
                        <div class="card card-static">
                            <div class="card-header">
                                <?php esc_html_e( $plugin->getPluginName() ); ?>
                            </div>
                            <div class="card-body">
	                            <?php renderLicenseControls( $plugin ); ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
				</form>
			</div>
		</div>
	</div>
</div>
