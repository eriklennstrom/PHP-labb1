<?php
    class TextField extends Field{
        public function validate(){
            if(strlen($this->value) >= 3){
                return true;
            }
            $this->errorMessage = 'Firstname/lastname min length 3 char';
            return false;
        }
    }
