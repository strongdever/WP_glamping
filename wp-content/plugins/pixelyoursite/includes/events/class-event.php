<?php
namespace PixelYourSite;
class EventTypes {
    static public $DYNAMIC = "dyn";
    static public $STATIC = "static";
    static public $TRIGGER = "trigger";
}

abstract class PYSEvent {
    protected $id;
    protected $type;
    protected $category;
    public $args = null;
    /**
     * GroupedEvent constructor.
     * @param String $id // unique id  use in js object like key
     * @param String $type // can be static(fire when open page) or dynamic (fire when some event did)
     * @param String $category // event category like woo, edd signal etc
     */
    public function __construct($id,$type,$category=''){
        $this->id = $id;
        $this->type = $type;
        $this->category = $category;
    }

    function getId() {
        return $this->id;
    }

    function getType() {
        return $this->type;
    }

    function getCategory() {
        return $this->category;
    }
}