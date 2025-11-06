<?php

//The %s must have between 8 and 64 characters and contain at least one number, one upper case letter, one lower case letter and one special character

const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'لطفا مقدار %s را وارد کنید',
    'email' => 'ایمیل %s معتبر نیست !!',
    'min' => 'مقدار %s با حد اقل دارای  %s  کاراکتر باشد',
    'max' => 'مقدار %s با حداکثر دارای  %s  کاراکتر باشد',
    'between' => 'مقدار %s باید بین %d  و %d باشد',
    'same' => 'مقدار %s باید با %s برابر باشد',
    'alphanumeric' => 'مقدار %s باید شامل اعداد و حروف باشد',
    'secure' => 'مقدار %s باید بین 8 و 64 کاراکتر باشد و حداقل دارای یک عدد یک حرف بزرگ و یک حرف کوچک و یک کراکتر خاص [-,?,@,#,$] باشد',
    'unique' => 'The %s already exists',
];


/**
 * Validate
 * @param array $data
 * @param array $fields
 * @param array $messages
 * @return array
 */
function validate(array $data, array $fields, array $messages = []): array
{
    // Split the array by a separator, trim each element
    // and return the array
    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));

    // get the message rules
    $rule_messages = array_filter($messages, fn($message) => is_string($message));
    // overwrite the default message
    $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $rule_messages);

    $errors = [];

    foreach ($fields as $field => $option) {

        $rules = $split($option, '|');

        foreach ($rules as $rule) {
            // get rule name params
            $params = [];
            // if the rule has parameters e.g., min: 1
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
            // by convention, the callback should be is_<rule> e.g.,is_required
            $fn = 'is_' . $rule_name;
     
            if (is_callable($fn)) {
                $pass = $fn($data, $field, ...$params);
                if (!$pass) {
                    // get the error message for a specific field and rule if exists
                    // otherwise get the error message from the $validation_errors
                   
                    $errors[$field] = sprintf(
                        $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                        $field,
                        ...$params
                    );
               
                }
            }
        }
    }

    return $errors;
}

/**
 * Return true if a string is not empty
 * @param array $data
 * @param string $field
 * @return bool
 */
function is_required(array $data, string $field): bool
{
    return isset($data[$field]) && trim($data[$field]) !== '';
}

/**
 * Return true if the value is a valid email
 * @param array $data
 * @param string $field
 * @return bool
 */
function is_email(array $data, string $field): bool
{
    if (empty($data[$field])) {
        return true;
    }

    return filter_var($data[$field], FILTER_VALIDATE_EMAIL);
}

/**
 * Return true if a string has at least min length
 * @param array $data
 * @param string $field
 * @param int $min
 * @return bool
 */
function is_min(array $data, string $field, int $min): bool
{
    if (!isset($data[$field])) {
        return true;
    }

    return strlen($data[$field]) >= $min;
}

/**
 * Return true if a string cannot exceed max length
 * @param array $data
 * @param string $field
 * @param int $max
 * @return bool
 */
function is_max(array $data, string $field, int $max): bool
{
    if (!isset($data[$field])) {
        return true;
    }

    return strlen($data[$field]) <= $max;
}

/**
 * @param array $data
 * @param string $field
 * @param int $min
 * @param int $max
 * @return bool
 */
function is_between(array $data, string $field, int $min, int $max): bool
{
    if (!isset($data[$field])) {
        return true;
    }

    $len = strlen($data[$field]);
    return $len >= $min && $len <= $max;
}

/**
 * Return true if a string equals the other
 * @param array $data
 * @param string $field
 * @param string $other
 * @return bool
 */
function is_same(array $data, string $field, string $other): bool
{
    if (isset($data[$field], $data[$other])) {
        return $data[$field] === $data[$other];
    }

    if (!isset($data[$field]) && !isset($data[$other])) {
        return true;
    }

    return false;
}

/**
 * Return true if a string is alphanumeric
 * @param array $data
 * @param string $field
 * @return bool
 */
function is_alphanumeric(array $data, string $field): bool
{
    if (!isset($data[$field])) {
        return true;
    }

    return ctype_alnum($data[$field]);
}

/**
 * Return true if a password is secure
 * @param array $data
 * @param string $field
 * @return bool
 */
function is_secure(array $data, string $field): bool
{
    if (!isset($data[$field])) {
        return false;
    }

    $pattern = "/^(?=\P{Ll}*\p{Ll})(?=\P{Lu}*\p{Lu})(?=\P{N}*\p{N})(?=[\p{L}\p{N}]*[^\p{L}\p{N}])[\s\S]{8,}$/";
    return preg_match($pattern, $data[$field]);
}




