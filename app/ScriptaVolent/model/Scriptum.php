<?php
namespace ScriptaVolent\Model;

class Scriptum {

    public $id;
    public $ref;
    public $label;
    public $content;
    public $creation;
    public $destruction;

    function __construct($ref = null, $label = null, $content = null, $creation = null, $destruction = null) {
        $this->ref = $ref == null ? $this->ref : $ref;
        $this->label = $label == null ? $this->label : $label;
        $this->content = $content == null ? $this->content : $content;
        $this->creation = $creation == null ? $this->creation : $creation;
        $this->destruction = $destruction == null ? $this->destruction : $destruction;
    }

}
