<?php
namespace ScriptaVolent\Model;

class Scriptum {

    public $id;
    public $ref;
    public $label;
    public $content;

    function __construct($ref = null, $label = null, $content = null) {
        $this->ref = $ref == null ? $this->ref : $ref;
        $this->label = $label == null ? $this->label : $label;
        $this->content = $content == null ? $this->content : $content;
    }

}
