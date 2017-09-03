<?php
abstract class Field{
    public $name;
    public $value;
    public $errorMessage;
    public function __construct($value) {
        $this->name = $value;
        $this->value = (string) $_POST[$value];
    }
    abstract function validate();
}
