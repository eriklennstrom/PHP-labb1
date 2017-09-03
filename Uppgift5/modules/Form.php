<?php
class Form{
        public $fields = [];
        public $errors = [];
        public function __construct($fields){
            $this->fields = $fields;
        }
        public function validate() {
            foreach($this->fields as $field) {
                if(!$field->validate()) {
                    $data = [
                        'name' => $field->name,
                        'message' => $field->errorMessage
                    ];
                    $this->errors[]= $data;
                }
            }
        }
    }
