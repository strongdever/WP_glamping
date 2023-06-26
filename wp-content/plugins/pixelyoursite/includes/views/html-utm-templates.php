<?php
namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$utms = [
    "utm_source",
    "utm_medium",
    "utm_campaign",
    "utm_content",
    "utm_term",
];
?>

<div class="wrap" id="pys">
    <h1><?php _e( 'UTM Templates', 'pys' ); ?></h1>
    <div class="pys_utm_templates container">


        <div class="row">
            <div class="col">
                <div class="mb-2" >Meta (Facebook) - <a target="_blank" href="https://www.youtube.com/watch?v=aAJcjurzp-Q">watch video:</a></div>

                <div class="utm_template mt-2 copy_text">utm_source=facebook&utm_medium=paid&utm_campaign={{campaign.name}}&utm_term={{adset.name}}&utm_content={{ad.name}}&fbadid={{ad.id}}</div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="mb-2" >Google Ads - <a target="_blank" href="https://www.youtube.com/watch?v=j1TlbKYNZk4">watch video:</a></div>

                <div class="utm_template mt-2 copy_text">{lpurl}?utm_source=google&utm_medium=paid&utm_campaign={campaignid}&utm_content={adgroupid}&utm_term={keyword}&gadid={creative}</div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="mb-2" >TikTok - <a target="_blank" href="https://www.youtube.com/watch?v=bB2OVtlpQ5g">watch video:</a></div>

                <div class="utm_template mt-2 copy_text">?utm_source=tiktok&utm_medium=paid&utm_campaign=__CAMPAIGN_NAME__&utm_term=__AID_NAME__&utm_content=__CID_NAME__&ttadid=__CID__</div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="mb-2" >Pinterest - <a target="_blank" href="https://www.youtube.com/watch?v=MKdS0PiND7M">watch video:</a></div>

                <div class="utm_template mt-2 copy_text">?utm_source=pinterest&utm_medium=paid&utm_campaign={campaign_name}&utm_term={adgroup_name}&utm_content={creative_id}&padid={adid}</div>
            </div>
        </div>

        <div class="row mt-4">
            <div  class="col">
                <div class="mb-2" >Bing - <a target="_blank" href="https://www.youtube.com/watch?v=lC6c-Pt5fxM">watch video:</a></div>

                <div class="utm_template mt-2 copy_text">{lpurl}?utm_source=bing&utm_medium=paid&utm_campaign={campaign}&utm_content={AdGroupId}&utm_term={AdGroup}&bingid={CampaignId}</div>
            </div>
        </div>
    </div>

    <h1><?php _e( 'UTM Builder', 'pys' ); ?></h1>

    <div class="pys_utm_builder container">

        <div class="bg-gray">
            <h4 class="label">Your URL:</h4>
            <input type="text" class="site_url form-control mt-2" value="<?=get_site_url();?>"/>
        </div>
        <?php
        foreach ($utms as $utm) : ?>
            <div >
                <h4 class="label"><?=$utm?>:</h4>
                <input type="text" class="utm form-control  mt-2 <?=$utm?>" value="" data-type="<?=$utm?>"/>
            </div>
        <?php endforeach; ?>

        <div class="">
            <h4 class="label">URL with UTMs:</h4>
            <div class="copy_text build_utms_with_url mt-2 bg-gray" ></div>
        </div>
        <div class="">
            <h4 class="label">UTMs:</h4>
            <div class="copy_text build_utms mt-2 bg-gray" ></div>
        </div>
    </div>
</div>