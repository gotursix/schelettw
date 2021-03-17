<?php


class Validate {
    private $_passed = true, $_errors = [], $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function check($source, $items = []) {
        $this->_errors = [];
        foreach ($items as $item => $rules) {
            $item = sanitise($item);
            $display = $rules['display'];
            foreach ($rules as $rule => $rule_value) {
                $value = Input::sanitize(trim($source[$item]));
                if ($rule === 'required' && empty($value)) {
                    $this->addError(["{$display} is required", $item]);
                } else if (!empty($value)) {
                    switch ($rules) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError(["{$display} must be a minimum of {$rule_value} characters.", $item]);
                            }
                            break;

                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError(["{$display} must be a maximum of {$rule_value} characters.", $item]);
                            }
                            break;

                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $matchDisplay = $items[$rule_value]['display'];
                                $this->addError(["{$matchDisplay} and {$display} must match.", $item]);
                            }
                            break;

                        case 'unique':
                            $check = $this->_db->query("SELECT {$item} FROM {$rule_value} WHERE {$item} = ?", [$value]);
                            if ($check->count()) {
                                $this->addError(["{$display} already exists. Please choose another {$display}", $item]);
                            }
                            break;

                        case 'is_numeric':
                            if (!is_numeric($value)) {
                                $this->addError(["{$display} has to be a number. Please use a numeric value.", $item]);
                            }
                            break;

                        case 'valid_email':
                            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                                $this->addError(["{$display} must be a valid email address.", $item]);
                            }
                            break;
                    }
                }
            }
        }
    }

    public function addError($error) {
        $this->_errors[] = $error;
        $this->_passed = false;
    }

    public function errors() {
        return $this->_errors;
    }

    public function passed() {
        return $this->_passed;
    }

    public function displayErrors() {
        $html = '<ul class="bg-danger">';
        foreach ($this->_errors as $error)
            if (is_array($error)) {
                $html .= '<li class="text-danger">' . $error[0] . '</li>';
            } else {
                $html .= '<li class="text-danger">' . $error . '</li>';
            }
        $html .= '</ul>';
        return $html;
    }
}