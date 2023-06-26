<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/*
 * Notice structure
        [
            'order' => '1', // message display order
            'wait' => 0, // timeout after closing the previous message
            'type' => 'event chain', // Message type, if included in the message sequence then type MUST be 'event chain'
            'enabelYoutubeLink' => false, // enables or disables the link to the channel at the bottom of the block
            'enabelLogo' => false, // enable or disable the logo on the left in the block
            'enabelDismiss' => false, // enable or disable dismiss button, default enable
            'color' => 'orange', // color can be 'orange', 'green', 'blue'
            'multiMessage' => [
                [
                    'slug'  => 'new_message_1_v1', // unique slug for message "new_message_1" - unique title, '_v1' - version message
                    'message' => 'Hello I message 1 V 1',
                    'title' => 'Title V1',
                    'button_text' => 'Watch',
                    'button_url' => 'https://www.youtube.com/watch?v=snUKcsTbvCk'
                ],
                [
                    'slug'  => 'new_message_2_v1',
                    'message' => 'Hello I message 2 V 1',
                    'button_text' => 'Watch',
                    'button_url' => 'https://www.youtube.com/watch?v=snUKcsTbvCk',
                ],
                [
                    'slug'  => 'new_message_3_v1',
                    'title' => 'Title V1',
                    'message' => 'Hello I message 3 V 1',
                    'button_text' => 'Watch',
                    'button_url' => 'https://www.youtube.com/watch?v=snUKcsTbvCk',
                ]
            ]
        ],

If need fixed message
        [
            'type' => 'promo',
            'enabelDismiss' => false, // enable or disable dismiss button, default enable
            'plugins' =>[], // can be "woo","wcf","edd" or empty array
            'slug'  => '',// unique id
            'message' => '', // message with html tags
        ]
 * */

function adminGetFixedNotices() {
    return [
        [
            'order' => '1',
            'wait' => 0,
            'type' => 'event chain',
            'enabelYoutubeLink' => true,
            'enabelLogo' => true,
            'enabelDismiss' => true,
            'color' => 'orange',
            'multiMessage' => [
                [
                    'slug'  => 'free_block_1_message_1_v1',
                    'message' => 'Learn how to configure Meta Conversion API with your PixelYourSite plugin.',
                    'title' => 'Meta Conversion API',
                    'button_text' => 'Watch video',
                    'button_url' => 'https://www.youtube.com/watch?v=uXTpgFu2V-E'
                ],
                [
                    'slug'  => 'free_block_1_message_2_v1',
                    'title' => 'Verify your domain on Meta',
                    'message' => 'Learn how you can verify your domain on Meta (Facebook)',
                    'button_text' => 'Watch video',
                    'button_url' => 'https://www.youtube.com/watch?v=lLXZW5eZt4o',
                ],
                [
                    'slug'  => 'free_block_1_message_3_v1',
                    'title' => 'Google Analytics 4 (GA4)',
                    'message' => 'How to install GA4 on WordPress and WooCommerce and how to test your tag',
                    'button_text' => 'Watch video',
                    'button_url' => 'https://www.youtube.com/watch?v=fwegcsO-yrc',
                ]
            ],
            'optoutEnabel' => true,
            'optoutMessage' => "This is message 1 of a series of 9 notifications containing tips and tricks about how to use our plugin.",
            'optoutButtonText' => "Don't show me more tips"
        ],
        [
            'order' => '2',
            'wait' => 12,
            'type' => 'event chain',
            'enabelYoutubeLink' => true,
            'enabelLogo' => true,
            'color' => 'green',
            'multiMessage' => [
                [
                    'slug'  => 'free_block_2_message_1_v1',
                    'message' => 'Learn how to create Custom Conversions on Meta using your pixel events. Use them to optimize your ads and track your ads results.',
                    'title' => 'Meta Custom Conversions using Events',
                    'button_text' => 'Watch video',
                    'button_url' => 'https://www.youtube.com/watch?v=w97FATUy7ok'
                ],
                [
                    'slug'  => 'free_block_2_message_2_v1',
                    'message' => 'Build Meta Custom Audiences with events and parameters. Retarget key segments of your audience, or find new potential customers with Lookalikes.',
                    'title' => 'Meta Custom Audiences using Events',
                    'button_text' => 'Watch video',
                    'button_url' => 'https://www.youtube.com/watch?v=EvzGMAvBnbs',
                ],
            ],
            'optoutEnabel' => true,
            'optoutMessage' => "This is message 2 of a series of 9 notifications containing tips and tricks about how to use our plugin.",
            'optoutButtonText' => "Don't show me more tips"
        ],
        [
            'order' => '3',
            'wait' => 24,
            'type' => 'event chain',
            'enabelYoutubeLink' => true,
            'enabelLogo' => true,
            'color' => 'blue',
            'multiMessage' => [
                [
                    'slug'  => 'free_block_3_message_1_v1',
                    'message' => 'Improve META (Facebook) Event Match Quality (EMQ) score with form automatic data detection.',
                    'title' => 'Improve your Meta EMQ score',
                    'button_text' => 'Watch video',
                    'button_url' => 'https://www.youtube.com/watch?v=snUKcsTbvCk',
                ],

            ],
            'optoutEnabel' => true,
            'optoutMessage' => "This is message 3 of a series of 9 notifications containing tips and tricks about how to use our plugin.",
            'optoutButtonText' => "Don't show me more tips"

        ],
        [
            'order' => '4',
            'wait' => 24,
            'type' => 'event chain',
            'enabelYoutubeLink' => true,
            'enabelLogo' => true,
            'multiMessage' => [
                [
                    'slug'  => 'free_block_4_message_1_v1',
                    'title' => 'What WooCommerce products your ads sold',
                    'message' => 'Meta (Facebook) doesn"t show you what products your ads sold, but there is an easy way to find out.',
                    'button_text' => 'Watch this video',
                    'button_url' => 'https://www.youtube.com/watch?v=b-eYdx9QK0Q',
                ],
            ],
            'optoutEnabel' => true,
            'optoutMessage' => "This is message 4 of a series of 9 notifications containing tips and tricks about how to use our plugin.",
            'optoutButtonText' => "Don't show me more tips"

        ],


        [
            'order' => '5',
            'wait' => 12,
            'type' => 'event chain',
            'enabelYoutubeLink' => true,
            'enabelLogo' => true,
            'multiMessage' => [
                [
                    'slug'  => 'free_block_5_message_1_v1',
                    'title' => 'WooCommerce First-Party Reports',
                    'message' => 'Discover what generates your WooCommerce orders with PixelYourSite Professional first-party reports. You can track Meta, Google, TikTok or any other campaigns with UTMs.',
                    'button_text' => 'Watch this video',
                    'button_url' => 'https://www.youtube.com/watch?v=4VpVf9llfkU',
                ],
            ],
            'optoutEnabel' => true,
            'optoutMessage' => "This is message 5 of a series of 9 notifications containing tips and tricks about how to use our plugin.",
            'optoutButtonText' => "Don't show me more tips"

        ],


        [
            'order' => '6',
            'wait' => 24,
            'type' => 'event chain',
            'enabelYoutubeLink' => true,
            'enabelLogo' => true,
            'multiMessage' => [
                [
                    'slug'  => 'free_block_6_message_1_v1',
                    'title' => 'Install the TikTok Tag',
                    'message' => 'Learn how you can install the TikTok Tag with PixelYourSite Professional. WooCommerce and Easy Digital Downloads support with e-commerce events tracking.',
                    'button_text' => 'Watch video',
                    'button_url' => 'https://www.youtube.com/watch?v=zkb67djRnd0',
                ],
                [
                    'slug'  => 'free_block_6_message_2_v1',
                    'title' => 'Test your TikTok Tag',
                    'message' => 'Learn how you can test your TikTok tag.',
                    'button_text' => 'Watch video',
                    'button_url' => 'https://www.youtube.com/watch?v=WRFRsjXuyMY',
                ],
            ],
            'optoutEnabel' => true,
            'optoutMessage' => "This is message 6 of a series of 9 notifications containing tips and tricks about how to use our plugin.",
            'optoutButtonText' => "Don't show me more tips"

        ],



        [
            'order' => '7',
            'wait' => 24,
            'type' => 'event chain',
            'enabelYoutubeLink' => true,
            'enabelLogo' => true,
            'multiMessage' => [
                [
                    'slug'  => 'free_block_7_message_1_v1',
                    'title' => 'Multiple Meta tags with CAPI support',
                    'message' => 'Learn how you can add multiple Meta (Facebook) tags with Conversion API support.',
                    'button_text' => 'Watch video',
                    'button_url' => 'https://www.youtube.com/watch?v=HM98mGZshvc',
                ],
                [
                    'slug'  => 'free_block_7_message_2_v1',
                    'title' => 'Multiple GA4 tags',
                    'message' => 'Learn how you can implement multiple Google Analytics 4 (GA4) tags on your site.',
                    'button_text' => 'Watch video',
                    'button_url' => 'https://www.youtube.com/watch?v=JUuss5sewxg',
                ],
            ],
            'optoutEnabel' => true,
            'optoutMessage' => "This is message 7 of a series of 9 notifications containing tips and tricks about how to use our plugin.",
            'optoutButtonText' => "Don't show me more tips"

        ],


        [
            'order' => '8',
            'wait' => 24,
            'type' => 'event chain',
            'enabelYoutubeLink' => true,
            'enabelLogo' => true,
            'multiMessage' => [
                [
                    'slug'  => 'free_block_8_message_1_v1',
                    'title' => 'Don"t make this mistake when
using a consent plugin!',
                    'message' => 'Most sites have a consent plugin as required by GDPR, CCPA, or other regulations. But there is a common mistake that can ruin your tracking. Find out what it is and how to fix it.',
                    'button_text' => 'Watch this video',
                    'button_url' => 'https://www.youtube.com/watch?v=eo-dpuAqZNg',
                ],
            ],
            'optoutEnabel' => true,
            'optoutMessage' => "This is message 8 of a series of 9 notifications containing tips and tricks about how to use our plugin.",
            'optoutButtonText' => "Don't show me more tips"
        ],

		[
            'order' => '9',
            'wait' => 24,
            'type' => 'event chain',
            'enabelYoutubeLink' => true,
            'enabelLogo' => true,
            'multiMessage' => [
                [
                    'slug'  => 'free_block_9_message_1_v1',
                    'title' => 'Google Consent Mode',
                    'message' => 'Google Consent Mode can improve traking. It allows Google to track anonymus data for opted-out users and it works for Google Analytics and Google Ads tag.',
                    'button_text' => 'Watch this video',
                    'button_url' => 'https://www.youtube.com/watch?v=70oV41V7IIU',
                ],
            ],
            'optoutEnabel' => false,
            'optoutMessage' => "This is message 9 of a series of 9 notifications containing tips and tricks about how to use our plugin.",
            'optoutButtonText' => "Don't show me more tips"
        ],



        /*
            [
                'type' => 'promo',
                'plugins' => [],
                'slug'  => 'wcf_and_woo_promo_v1',
                'enabelDismiss' => true,
                'message' => 'HOT: Improve CartFlows tracking with PixelYourSite Professional: <a target="_blank" href="https://www.youtube.com/watch?v=-rA3rxq812g">CLICK TO LEARN MORE</a>'
            ]

              */

    ];
}
