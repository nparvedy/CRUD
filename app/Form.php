<?php

namespace App;

class Form{

    private $data;
    public $surround = 'p';

    public function __construct($data = array()){
        $this->data = $data;
    }

    protected function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }
    
    protected function getValue($index){
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input($name, $value){
        return $this->surround(
            '<input type="text" name="' . $name . '" value="' . $value . '">'
        );
    }

    public function submit(){
        return $this->surround('<button type="submit">Envoyer</button>');
    }

}