<?php
    class EmailField extends Field{
        public function validate(){
            if(filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            $this->errorMessage = 'Email is wrong';
            return false;
        }
    }
