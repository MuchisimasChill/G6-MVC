<?php

namespace app\basic;

abstract class Model
{

    public const RULE_REQ = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MAX_LENGTH = 'max';
    public const RULE_MIN_LENGTH = 'min';
    public const RULE_MATCH = 'match';

    public function loadData($data)
    {
       foreach ($data as $key => $value) 
       {
           if(property_exists($this, $key))
           {
                $this->{$key} = $value;
           }
       }
    }

    abstract public function rules(): array;

    public array $errors = [];

    public function validate()
    {
       foreach ($this->rules() as $attr => $rules) {
           $value = $this->{$attr};
           foreach ($rules as $rule) {
                $ruleName = $rule;
                
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQ && !$value) {
                    $this->addError($attr, self::RULE_REQ);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attr, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN_LENGTH && strlen($value) < $rule['min']) {
                    $this->addError($attr, self::RULE_MIN_LENGTH, $rule);
                }
                if ($ruleName === self::RULE_MAX_LENGTH && strlen($value) > $rule['max']) {
                    $this->addError($attr, self::RULE_MAX_LENGTH, $rule);
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addError($attr, self::RULE_MATCH, $rule);
                }
           }
       }

       return empty($this->errors);
    }

    public function addError(string $attr, string $rule, $params = [])
    {
        $message = $this->eMessages()[$rule] ?? '';
        foreach ($params as $key => $param) {
            $message = str_replace("{{$key}}", $param, $message);
        }

        $this->errors[$attr][] = $message;
    }

    public function eMessages()
    {
        return [
            self::RULE_REQ => 'Field is required',
            self::RULE_EMAIL => 'Invalid email adress',
            self::RULE_MATCH => 'Field is not same as {match}',
            self::RULE_MIN_LENGTH => 'Min length is {min}',
            self::RULE_MAX_LENGTH => 'Max length is {max}',
        ];
    }

    public function hasError($attr)
    {
        return $this->errors[$attr] ?? false;
    }

    public function getFirstError($attr)
    {
        return $this->errors[$attr][0] ?? false;
    }
}