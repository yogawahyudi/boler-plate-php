<?php
namespace App\Validators;
class Validator {
    protected $requestData;
    protected $rules;
    protected $errors = [];

    public function __construct($requestData, $rules) {
        $this->requestData = $requestData;
        $this->rules = $rules;
    }

    public function validate() {
        foreach ($this->rules as $field => $rule) {
            $rulesArray = explode('|', $rule);

            foreach ($rulesArray as $singleRule) {
                list($ruleName, $ruleValue) = array_pad(explode(':', $singleRule, 2), 2, null);

                switch ($ruleName) {
                    case 'required':
                        $this->validateRequired($field);
                        break;
                    
                    case 'min':
                        $this->validateMin($field, $ruleValue);
                        break;
                    // Tambahkan aturan validasi lainnya sesuai kebutuhan.
                }
            }
        }

        return $this->errors;
    }

    protected function validateRequired($field) {
        if (!isset($this->requestData[$field]) || empty($this->requestData[$field])) {
            $this->errors[$field][] = "$field is required.";
        }
    }

    protected function validateMin($field, $minValue) {
        if (strlen($this->requestData[$field]) < $minValue) {
            $this->errors[$field][] = "$field must be at least $minValue characters.";
        }
    }
    // Tambahkan metode validasi lainnya sesuai kebutuhan.

    public function getErrors() {
        return $this->errors;
    }
}

