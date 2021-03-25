<?php

class RequiredValidator extends CustomValidator {
    public function runValidation() {
        $value = trim($this->_model->{$this->field});
        return ($value != '' && isset($value));
    }
}
