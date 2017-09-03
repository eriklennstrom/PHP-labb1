<?php
    class PasswordField extends Field{
        public $value2;

        public function confirmation($value2){
            $this->value2 = $_POST[$value2];
            return $this;
        }
        public function validate(){
            $this->errorMessage = 'Password doesnt match';
            return (!empty($this->value)) && (!empty($this->value2)) && $this->value === $this->value2;
        }
    }
