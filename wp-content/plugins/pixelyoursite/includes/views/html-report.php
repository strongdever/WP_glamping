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

				<h2 class="section-title">System Report</h2>

				<?php foreach ( get_system_report_data() as $section_name => $section_report ) : ?>

				<div class="card card-static">
					<div class="card-header">
						<?php esc_html_e( $section_name ); ?>
					</div>
					<div class="card-body">
						<table class="table system-report">
							<tbody>

							<?php foreach ( $section_report as $name => $value ) : ?>

								<tr>
									<td style="width: 50%;"><?php echo $name; ?></td>
									<td style="width: 50%;"><?php echo $value; ?></td>
								</tr>

							<?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>

				<?php endforeach; ?>

			</div>
		</div>

		<hr>
		<div class="row justify-content-center">
			<div class="col-4">
				<form method="post">
					<?php wp_nonce_field( 'pys_download_system_report_nonce' ); ?>
					<input type="hidden" name="pys_action" value="download_system_report"/>
					<button type="submit" class="btn btn-block btn-sm btn-primary">Download System Report</button>
				</form>
			</div>
		</div>
	</div>
</div>
