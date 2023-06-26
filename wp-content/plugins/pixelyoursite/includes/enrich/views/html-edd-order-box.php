<?php
include_once "function-helper.php";

$payment      = new EDD_Payment( $payment_id );

$meta = $payment->get_meta();

?>
<style>
    table.pys_order_meta {
        width: 100%;text-align:left
    }
    table.pys_order_meta td.border span {
        border-top: 1px solid #f1f1f1;
        display: block;
    }
    table.pys_order_meta th,
    table.pys_order_meta td {
        padding:10px
    }
</style>

    <div class="inside">
        <?php if(isset($meta['pys_enrich_data'])) :
            $data = $meta['pys_enrich_data'];
            ?>
            <table class="pys_order_meta">
                <tr>
                    <td colspan="2" ><strong>FIRST VISIT</strong></td>
                </tr>
                <tr>
                    <td colspan="2" class="border"><span></span></td>
                </tr>
                <tr >
                    <th>Landing Page:</th>
                    <td><a href="<?=$data['pys_landing']?>" target="_blank" ><?=$data['pys_landing']?></a></td>
                </tr>
                <tr>
                    <th>Traffic source:</th>
                    <td><?=$data['pys_source']?></td>
                </tr>
                <?php
                $utms = explode("|",$data['pys_utm']);
                \PixelYourSite\Enrich\printUtm($utms);
                ?>
                <tr>
                    <td colspan="2" class="border"><span></span></td>
                </tr>
                <tr>
                    <td colspan="2" ><strong>LAST VISIT</strong></td>
                </tr>
                <tr>
                    <td colspan="2" class="border"><span></span></td>
                </tr>
                <tr >
                    <?php
                    $lastLanding = isset($data['last_pys_landing']) ? $data['last_pys_landing'] : "";?>
                    <th>Landing Page:</th>
                    <td><a href="<?=$lastLanding?>" target="_blank" ><?=$lastLanding?></a></td>
                </tr>
                <tr>
                    <th>Traffic source:</th>
                    <td><?= isset($data['last_pys_source']) ? $data['last_pys_source'] : ""?></td>
                </tr>
                <?php
                if(!empty($data['last_pys_utm'])) {
                    $utms = explode("|",$data['last_pys_utm']);
                    \PixelYourSite\Enrich\printUtm($utms);
                }

                ?>
                <tr>
                    <td colspan="2" class="border"><span></span></td>
                </tr>
                <?php
                $userTime = explode("|",$data['pys_browser_time']);
                ?>
                <tr >
                    <th>Client's browser time</th>
                    <td></td>
                </tr>
                <tr >
                    <th>Hour:</th>
                    <td><?=$userTime[0]?></td>
                </tr>
                <tr >
                    <th>Day:</th>
                    <td><?=$userTime[1]?></td>
                </tr>
                <tr >
                    <th>Month:</th>
                    <td><?=$userTime[2]?></td>
                </tr>

                <tr>
                    <td colspan="2" class="border"<td><span></span></td>
                </tr>

            </table>

        <?php else: ?>
            <h2>No data</h2>
        <?php endif; ?>
    </div>

