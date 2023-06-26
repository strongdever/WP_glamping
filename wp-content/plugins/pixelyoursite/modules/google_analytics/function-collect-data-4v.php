<?php
use PixelYourSite\GA\Helpers;


function getCompleteRegistrationEventParamsV4() {
    if ( ! PixelYourSite\GA()->getOption( 'complete_registration_event_enabled' ) ) {
        return false;
    }

    return array(
        'name' => 'sign_up',
        'data' => array(
            'content_name'    => get_the_title(),
            'event_url'       => \PixelYourSite\getCurrentPageUrl(true),
            'method'          => \PixelYourSite\getUserRoles(),
            'non_interaction' => PixelYourSite\GA()->getOption( 'complete_registration_event_non_interactive' ),
        ),
    );
}