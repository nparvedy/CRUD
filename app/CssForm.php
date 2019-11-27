<?php 

    namespace App;

    class CssForm extends \App\Form {

        public function surround($html){
            return "<div class=\"form-label\">{$html}</div>";
        }

        public function input($name, $value){
            return $this->surround(
                '<label>' . $name . '</label>
                <input type="text" name="' . $name . '" value="' . $value . '" class="form-input-text">'
            );
        }

        public function submit(){
            return $this->surround('<button type="submit" class="form-button">Envoyer</button>');
        }

        

    }