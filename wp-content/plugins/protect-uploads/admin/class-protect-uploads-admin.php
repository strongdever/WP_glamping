<?php

class Alti_ProtectUploads_Admin
{

	private $plugin_name;
	private $version;
	private $messages = array();

	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	public function add_submenu_page()
	{
		add_submenu_page('upload.php', $this->plugin_name, 'Protect Uploads <span class="dashicons dashicons-shield-alt" style="font-size:15px;"></span>', 'manage_options', $this->plugin_name . '-settings-page', array($this, 'render_settings_page'));
	}

    public function verify_settings_page() {
        if(!isset($_POST['protect-uploads_nonce'])) {
            return;
        }
        if(!wp_verify_nonce($_POST['protect-uploads_nonce'], 'submit_form')) {
            return;
        }
        if(!current_user_can('manage_options')) {
            return;
        }
        if(!check_admin_referer('submit_form', 'protect-uploads_nonce')) {
            return;
        }
        if (isset($_POST['submit']) && isset($_POST['protection'])) {
            $this->save_form(sanitize_text_field($_POST['protection']));
        }
    }

	public function render_settings_page()
	{
		?>
<div class="wrap <?php echo $this->plugin_name ?>">
	<?php
	echo $this->display_messages();
	?>
	<h1>Protect Uploads</h1>
	<div class="protect-uploads-main-container">
		<form method="POST" action="">
			<?php wp_nonce_field('submit_form', 'protect-uploads_nonce'); ?>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for=""><?php _e('Status', $this->plugin_name); ?></label>
						</th>
						<td>
							<fieldset>
								<p>
									<strong>
										<?php if ($this->check_uploads_is_protected() === true) { ?>
											<span class="dashicons dashicons-yes-alt" style="color:#46b450"></span> <?php _e('Uploads directory is protected.', $this->plugin_name); ?>
										<?php } else { ?>
											<span style="color:#dc3232" class="dashicons dashicons-dismiss"></span> <?php _e('Uploads directory is not protected!', $this->plugin_name); ?>
										<?php } ?>
									</strong>
								</p>
								<p>
									<?php
									$file_messages = $this->get_uploads_protection_message_array();
									foreach ($file_messages as $file_message) {
									?>
										<?php echo $file_message; ?> <br />
									<?php
									}	?>
								</p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="size"><?php _e('Protection', $this->plugin_name); ?></label>
						</th>
						<td>
							<fieldset>
								<legend class="screen-reader-text">
									<span><?php _e('Protection', $this->plugin_name); ?></span>
								</legend>
								<?php if ($this->check_uploads_is_protected() === false) { ?>
									<!--  -->
									<label for="protection_1">
										<input type="radio" value="index_php" name="protection" id="protection_1">
										<strong><?php _e('Protect with index.php files', $this->plugin_name); ?></strong>
										<p class="description"><?php _e('Create an index.php file on the root of your uploads directory and subfolders (two levels max).', $this->plugin_name); ?></p>
									</label><br />
									<!--  -->
									<label for="protection_2">
										<input type="radio" value="htaccess" name="protection" id="protection_2">
										<strong><?php _e('Protect with .htaccess file', $this->plugin_name); ?></strong>
										<p class="description"><?php _e('Create .htaccess file at root level of uploads directory and returns 403 code (Forbidden Access).', $this->plugin_name); ?></p>
									</label><br />
								<?php } ?>
								<!--  -->
								<?php if ( $this->check_protective_file_removable() && $this->check_uploads_is_protected() ) { ?>
									<label for="protection_3">
										<input type="radio" value="remove" name="protection" id="protection_3">
										<strong><?php _e('Remove protection files', $this->plugin_name); ?></strong>
										<p>
											<?php if ($this->check_protective_file('index.php') === true) {
												echo '<span class="dashicons dashicons-flag"></span> index.php ';
												_e('will be removed', $this->plugin_name);
											} ?>
											<?php if ($this->check_protective_file('.htaccess') === true) {
												echo '<span class="dashicons dashicons-flag"></span> .htaccess ';
												_e('will be removed', $this->plugin_name);
											} ?>
										</p>
									</label><br />
								<?php } ?>
								<?php if ($this->check_protective_file('index.html') === true) { ?>
									<p class="description">
										<span class="dashicons dashicons-search"></span> <?php _e('A index.html file is already here and has not been created by this plugin. It will not be removed. If you want to use this plugin, you first have to remove manually the index.html file.', $this->plugin_name) ?>
									</p>
								<?php } ?>
							</fieldset>

						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for=""><?php _e('Check', $this->plugin_name); ?></label>
						</th>
						<td>
							<p><?php _e('Visit your', $this->plugin_name); ?> <a href="<?php echo $this->get_uploads_url(); ?>" target="_blank"><strong><?php _e('uploads directory', $this->plugin_name); ?></strong><span style="text-decoration:none;" class="dashicons dashicons-external"></span></a> <?php _e('to check the current protection', $this->plugin_name); ?>.</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
						</th>
						<td>
                            <?php submit_button(__('Update', $this->plugin_name), 'primary') ?>
						</td>
					</tr>
				</tbody>
			</table>

		</form>

	</div>
    <div class="alti-watermark-sidebar">
        <div class="alti_promote_widget">
            <div class="alti_promote_title">Like this plugin?</div>
            <p><a target="_blank" class="alti_promote_btn" href="https://wordpress.org/support/view/plugin-reviews/<?php echo $this->plugin_name; ?>?rate=5#postform"><strong>Rate it</strong></a> to show your support!</p>
        </div>
    </div>

</div>

<style>
    .protect-uploads-error {
        border: 2px solid #dc3232;
        display: inline-block;
        padding: 10px;
    }
    .protect-uploads-success {
        border: 1px solid #46b450;
    }

    /* container left and right */
    .protect-uploads .protect-uploads-main-container {
        float: left;
        width: 66%;
    }
    .protect-uploads .protect-uploads-sidebar {
        float: left;
        width: 31%;
        margin-left: 2%;
    }

    .protect-uploads-disabled {
        opacity: 0.75 !important;
    }
    .alti_promote_widget {
        background-color: #fff;
        padding: 10px;
        margin: 15px 0;
        border: 1px solid #E5E5E5;
        position: relative;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }

    .alti_promote_widget .dashicons {
        color: #238ECB !important;
    }

    .alti_promote_plugin {
        margin: 5px 0 5px -5px;
        clear: both;
        overflow: hidden;
        font-size: 14px;
    }

    .alti_promote_plugin a {
        position: relative;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);
        float: left;
        display: block;
        margin-right: 5px;
        width: 100%;
        text-decoration: none;
        border: 5px solid transparent;
    }

    .alti_promote_plugin a:hover {
        background-color: #eee;
        border: 5px solid #eee;
    }

    .alti_promote_plugin img {
        width: 50px;
        height: 50px;
        margin-right: 10px;
        display: block;
        float: left;
    }

    .alti_promote_plugin .alti_promote_copy {
        color: #555;
    }

    .alti_promote_plugin .alti_promote_copy strong {
        display: block;
        color: #333;
    }

    .alti_promote_title {
        font-size: 1.2em;
        font-weight: bold;
        color: #222;
        margin-bottom: 12.5px;
    }

    .alti_promote_title span:before {
        color: #222;
    }

    .alti_promote_btn {
        background: rgba(35, 142, 203, 0.3);
        display: inline-block;
        padding: 2.5px 5px;
        border-radius: 2.5px;
        text-decoration: none;
        color: #333;
    }

    .alti_promote_paypal {
        color: #021E73;
        font-weight: bold;
        text-shadow: 2px 2px 0 #1189D6;
        display: inline-block;
        background-color: #fff;
        padding: 0 5px;
        border-radius: 15px;
        font-size: 1.2em;
        line-height: 1.3em;
        font-family: sans-serif;
        border: 1px solid #ccc;
    }

    .alti_promote_paypal_svg svg {
        height: 15px;
        width: 65px;
        vertical-align: middle;
    }
    </style>
        <?php
	}

	public function enqueue_styles()
	{
	}

	public function add_settings_link($links)
	{
		$settings_link = '<a href="upload.php?page=' . $this->plugin_name . '-settings-page">' . __('Settings') . '</a>';
		array_unshift($links, $settings_link);
		return $links;
	}

	public function get_uploads_dir()
	{
		$uploads_dir = wp_upload_dir();
		return $uploads_dir['basedir'];
	}

	public function get_uploads_url()
	{
		$uploads_dir = wp_upload_dir();
		return $uploads_dir['baseurl'];
	}

	public function get_uploads_subdirectories()
	{

		return [self::get_uploads_dir()];
	}

	public function save_form($protection)
	{
		if ($protection == 'index_php') {
			$this->create_index();
		}
		if ($protection == 'htaccess') {
			$this->create_htaccess();
		}
		if ($protection == 'remove') {
			$this->remove_index();
			$this->remove_htaccess();
		}
	}

	// used to check if the current htaccess has been generated by the plugin
	public function get_htaccess_identifier()
	{
		return "[plugin_name=" . $this->plugin_name . "]";
	}

	public function create_index()
	{
		// check if index php does not exists
		if (self::check_protective_file('index.php') === false) {

			$indexContent = "<?php // Silence is golden \n // " . self::get_htaccess_identifier() . " \n // protect-uploads \n // date:" . date('d/m/Y') . "\n // .";
			$i = 0;
			foreach (self::get_uploads_subdirectories() as $subDirectory) {

				if (!file_put_contents($subDirectory . '/' . 'index.php', $indexContent)) {
					self::register_message('Impossible to create or modified the index.php file in ' . $subDirectory, 'error');
				} else {
					$i++;
				}
			}

			if ($i == count(self::get_uploads_subdirectories())) {
				self::register_message('The index.php file has been created in main folder and subfolders (two levels max).');
			}
		}
		// if index php already exists
		else {
			self::register_message('The index.php file already exists', 'error');
		}
	}

	public function create_htaccess()
	{
		// Content for htaccess file
		$date             = date('Y-m-d H:i.s');
		$phpv             = phpversion();

		$htaccessContent  = "\n# BEGIN " . $this->get_plugin_name() . " Plugin\n";
		$htaccessContent  .= "\tOptions -Indexes\n";
		$htaccessContent  .= "# [date={$date}] [php={$phpv}] " . self::get_htaccess_identifier() . " [version={$this->version}]\n";
		$htaccessContent  .= "# END " . $this->get_plugin_name() . " Plugin\n";

		// if htaccess does NOT exist yet
		if (self::check_protective_file('.htaccess') === false) {
			// try to create and save the new htaccess file
			if (!file_put_contents(self::get_uploads_dir() . '/' . '.htaccess', $htaccessContent)) {
				self::register_message('Impossible to create or modified the htaccess file.', 'error');
			} else {
				self::register_message('The htaccess file has been created.');
			}
		}
		else {
			// if content added to existing htaccess
			if (file_put_contents(self::get_uploads_dir() . '/.htaccess', $htaccessContent, FILE_APPEND | LOCK_EX)) {
				self::register_message('The htaccess file has been updated.');
			} else {
				self::register_message('The existing htaccess file couldn\'t be updated. Please check file permissions.', 'error');
			}
		}
	}

	public function remove_index()
	{
		$i = 0;
		foreach (self::get_uploads_subdirectories() as $subDirectory) {
			if (file_exists($subDirectory . '/index.php')) {
				unlink($subDirectory . '/index.php');
				$i++;
			}
		}
		if ($i == count(self::get_uploads_subdirectories())) {
			self::register_message('The index.php file(s) have(has) been deleted.');
		}
	}

	public function remove_htaccess()
	{
		if (file_exists(self::get_uploads_dir() . '/.htaccess')) {

			$htaccessContent = file_get_contents(self::get_uploads_dir() . '/.htaccess');
			$htaccessContent = preg_replace('/(# BEGIN protect-uploads Plugin)(.*?)(# END protect-uploads Plugin)/is', '', $htaccessContent);
			file_put_contents(self::get_uploads_dir() . '/.htaccess', $htaccessContent, LOCK_EX);

			// if htaccess is empty, we remove it.
			if (strlen(preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "", file_get_contents(self::get_uploads_dir() . '/.htaccess'))) == 0) {
				unlink(self::get_uploads_dir() . '/.htaccess');
			}


			//
			self::register_message('The htaccess file has been updated.');
		}
	}

	public function get_protective_files_array()
	{
		$uploads_files = ['index.php', 'index.html', '.htaccess'];
		$response = [];
		foreach ($uploads_files as $file) {
			if (file_exists(self::get_uploads_dir() . '/' . $file)) {
				$response[] = $file;
			}
		}
		return $response;
	}

	public function check_protective_file($file)
	{
		if (in_array($file, self::get_protective_files_array())) {
			return true;
		} else {
			return false;
		}
	}

	public function get_uploads_root_response_code()
	{
        $response = wp_remote_get( self::get_uploads_url() );
        $code = wp_remote_retrieve_response_code($response);
        return $code;
	}

	public function get_htaccess_content()
	{
		return file_get_contents(self::get_uploads_dir() . '/.htaccess');
	}

	public function check_htaccess_is_self_generated()
	{
		if (self::check_protective_file('.htaccess') && preg_match('/' . self::get_htaccess_identifier() . '/', self::get_htaccess_content())) {
			return true;
		} else {
			return false;
		}
	}

	// heart? <3
	public function check_uploads_is_protected()
	{
		foreach (self::get_protective_files_array() as $file) {
			if ($file === 'index.html') {
				return true;
				break;
			}
			if ($file === 'index.php') {
				return true;
				break;
			}
			if ($file === '.htaccess' && self::get_uploads_root_response_code() === 200) {
					return false;
					break;
			}
		}
		if (self::get_uploads_root_response_code() === 403) {
			return true;
		}
		else {
			return false;
		}
	}

	public function check_protective_file_removable() {
		if( self::check_protective_file('index.html') ) {
			return false;
		}
		elseif( self::check_protective_file('.htaccess') === false && self::get_uploads_root_response_code() === 403 ) {
			return false;
		}
		else {
			return true;
		}
	}

	public function get_uploads_protection_message_array()
	{
		$response = [];
		foreach (self::get_protective_files_array() as $file) {
			if ($file === '.htaccess' && self::get_uploads_root_response_code() === 403) {
				$response[] = '<span class="dashicons dashicons-yes"></span> ' . __('.htaccess file is present and access to uploads directory returns 403 code.', $this->plugin_name);
			}
			if ($file === 'index.php') {
				$response[] = '<span class="dashicons dashicons-yes"></span> ' . __('index.php file is present.', $this->plugin_name);
			}
			if ($file === 'index.html') {
				$response[] = '<span class="dashicons dashicons-yes"></span> ' . __('index.html file is present.', $this->plugin_name);
			}
		}
		if (self::check_protective_file('.htaccess') === true && self::get_uploads_root_response_code() === 200) {
			$response[] = '<span class="dashicons dashicons-search"></span> ' . __('.htaccess file is present but not protecting uploads directory.', $this->plugin_name);
		}
		if (self::check_protective_file('.htaccess') === false && self::get_uploads_root_response_code() === 403) {
			$response[] = '<span class="dashicons dashicons-yes"></span> ' . __('Access to uploads directory is protected (403) with a global .htaccess or another global declaration.', $this->plugin_name);
		}
		return $response;
	}

	public function check_apache()
	{

		if (!function_exists('apache_get_modules')) {
			self::register_message('The Protect Uploads plugin cannot work without Apache. Yourself or your web host has to activate this module.');
		}
	}


	public function register_message($message, $type = 'updated', $id = 0)
	{
		$this->messages['apache'][] = array(
			'message' => __($message, $this->plugin_name),
			'type' => $type,
			'id' => $id
		);
	}

	public function display_messages()
	{

		foreach ($this->messages as $name => $messages) {
			foreach ($messages as $message) {
				return '<div id="message" class="' . $message['type'] . '"><p>' . $message['message'] . '</p></div>';
			}
		}
	}
}
