<?php
class Validate {
    private $_passed = false,
            $_erros = array(),
            $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function check($source, $items = array()) {
        foreach($items as $item => $rules) {
            foreach($rules as $rule => $rule_value) {
                //echo "{$item} {$rule} must be {$rule_value}<br>"; //print rules

                $value = trim($source[$item]); //trim to not end up with any whitespace
                $item = escape($item);
                
                if($rule === 'required' && empty($value)) {
                    $this->addError("{$item} is required");
                } else if(!empty($value)) {
                    switch($rule) {
                        case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError("Error: {$item} must be a minimum of {$rule_value} characters.");
                            }
                        break;
                        case 'max':
                            if(strlen($value) > $rule_value) {
                                $this->addError("Error: {$item} must be a maximum of {$rule_value} characters.");
                            }
                        break;
                        case 'matches':
                            if($value != $source[$rule_value]) {
                                $this->addError("Error: {$rule_value} did not match. Try again.");
                            }
                        break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            if($check->count()) {
                                $this->addError("Sorry, {$item} already exists.");
                            }
                        break;
                    }
                }
            }
        }

        if(empty($this->_errors)) {
            $this->_passed = true;
        }

        return $this;
    }

    private function addError($error) {
        $this->_errors[] = $error;
    }

    public function errors() {
        return $this->_errors;
    }

    public function passed() {
        return $this->_passed;
    }
}