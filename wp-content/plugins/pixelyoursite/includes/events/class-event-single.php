<?php
namespace PixelYourSite;
class SingleEvent extends PYSEvent{

    public $params = array(
    );
    public $payload = array(
        'delay' => 0
    );

    public function __construct($id,$type,$category=''){
        parent::__construct($id,$type,$category);
        $this->payload['type'] = $type;
    }


    /**
     * Insert Array params for event
     * @param array $data
     */
    function addParams($data) {

        if(is_array($data)) {
            $this->params = array_merge($this->params,$data);
        } else {
            error_log("addParams no array ".print_r($data,true));
        }

    }

    /**
     * Insert additional Array data for event
     * @param array $data
     */
    function addPayload($data) {
        if(is_array($data)) {
            $this->payload = array_merge($this->payload,$data);
        } else {
            error_log("addPayload no array ".print_r($data,true));
        }

    }

    function getData() {
        $data = $this->payload;
        $data['params'] = sanitizeParams($this->params);
        $data['e_id'] = $this->getId();

        $data['delay'] = isset( $this->payload['delay'] ) ? $this->payload['delay'] : 0;
        $data['ids'] = isset( $this->payload['ids'] ) ? $this->payload['ids'] : array();
        $data['hasTimeWindow'] = isset( $this->payload['hasTimeWindow'] )  ? $this->payload['hasTimeWindow'] : false;
        $data['timeWindow'] = isset( $this->payload['timeWindow'] )  ? $this->payload['timeWindow'] : 0;
        $data['pixelIds'] = isset( $this->payload['pixelIds'] ) ? $this->payload['pixelIds'] : array();
        $data['eventID'] = isset( $this->payload['eventID'] ) ? $this->payload['eventID'] : "";
        $data['woo_order'] = isset( $this->payload['woo_order'] ) ? $this->payload['woo_order'] : "";
        $data['edd_order'] = isset( $this->payload['edd_order'] ) ? $this->payload['edd_order'] : "";

        return $data;
    }
}
