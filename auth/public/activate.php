<?php

require __DIR__ . '/../../src/bootstrap.php';

if (is_get_request()) {

    // sanitize the email & activation code
    //TDO FALSE POSITIVE
    [$inputs, $errors] = filter($_GET, [
        'email' => 'string | required | email',
        'activation_code' => 'string | required'
    ]);

    if (!$errors) {

        $user = find_unverified_user($inputs['activation_code'], $inputs['email']);

        // if user exists and activate the user successfully
        if ($user && activate_user($user['id'])) {
            redirect_with_message(
                'login.php',
                'اکانت شما فعال شد لطفا وارد شوید'
            );
        }else{
                redirect_with_message(
                'login.php',
                'ارور در فعال سازی اکانت'
            );
        }
    }else{
            redirect_with_message(
        'login.php',
        'ارور در پردازش داده به پشتبیانی پیام دهید'
        );
    }
}

// redirect to the register page in other cases
redirect_with_message(
    'register.php',
    'لینک فعال سازی منقضی شده مجدد اکانت بسازید'
);