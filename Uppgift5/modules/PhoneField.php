<?php
    class PhoneField extends Field{
        public function validate(){
            if(strlen($this->value) >= 5){
                return true;
            }
            $this->errorMessage = 'Telephone not long enough, min 5 char';
            return false;
        }
    }
