<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if(isset($_GET['clear_logs'])) {
    PYS()->getLog()->remove();
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    wp_redirect(remove_query_arg( 'clear_logs',$actual_link ));
    exit;
}

?>

<div class="card card-static">
    <div class="card-header ">
        <?php PYS()->render_switcher_input('pys_logs_enable');?> Plugin Logs
        <div style="float: right;margin-top: 10px;">
            <a style="margin-right: 30px" href="<?php echo esc_url( buildAdminUrl( 'pixelyoursite', 'logs' ) ); ?>&clear_logs=true">Clear Logs</a>
            <a href="<?= PYS_Logger::get_log_file_url() ?>" target="_blank" download>Download Logs</a>
        </div>
    </div>
    <div class="card-body">
        <textarea style="white-space: nowrap;width: 100%;height: 500px;"><?php
            echo PYS()->getLog()->getLogs();
            ?></textarea>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-4">
        <button class="btn btn-block btn-sm btn-save">Save Settings</button>
    </div>
</div>