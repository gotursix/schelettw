<?php


class Validate {
    private $_passed = false, $_errors = [], $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function check($source, $items=[]){
        $this->_errors = [];
        foreach ($items as $item => $rules){
            $item = sanitise($items);
            $display = $rules['display'];
            foreach ($rules as $rule => $rule_data){
                $value = Input::sanitize(trim($source[$item]));

            }
        }
    }
}