<?php

require_once __DIR__ . "/validation.php";

require_once __DIR__ . "/sanitization.php";
function filter(array $data, array $fields, array $messages=[]) : array
{
    $sanitization_rules = [];
    $validation_rules  = [];

    foreach ($fields as $field=>$rules) {
        if (strpos($rules, '|')) {
            [$sanitization_rules[$field], $validation_rules[$field] ] =  explode('|', $rules, 2);
        } else {
            $sanitization_rules[$field] = $rules;
        }
    }
    $data = array_map("trim",$data);
    $sanitization_rules = array_map("trim",$sanitization_rules);

    $inputs = sanitize($data, $sanitization_rules);
    $errors = validate($inputs, $validation_rules, $messages);
  
    return [$inputs, $errors];
}