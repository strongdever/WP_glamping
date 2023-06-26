<?php


namespace PixelYourSite;

/**
 * Class FDPEvent
 * @property string event_name
 * @property string content_type
 * @property string trigger_type
 * @property string trigger_value
 * */
class FDPEvent
{
    private $data = array();
    
    public function __get( $key ) {
        if(isset($this->data[$key])) return $this->data[$key];
        return "";
    }

    public function __set( $key,$value ){
        $this->data[$key] = $value;
    }

    public function hasTimeWindow() {
        return false;
    }

    public function getTimeWindow() {
        return 0;
    }
}