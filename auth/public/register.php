
<?php require_once __DIR__ . '/../../src/bootstrap.php' ?>


    <?php view('header',['title'=>'register']) ?>
    

    <?php 
                    //         var_dump(is_user_exist_by_email("nr5391894@gmail.com") );
                    //         echo"<br>";
                    //  var_dump(is_user_exist_by_username("navid81") );

        if (is_post_request()) {
                $fields = [
                    'username' => 'string | required | alphanumeric | between: 3, 25',
                    'email' => 'email | required | email',
                    'password' => 'string | required | secure',
                    'password2' => 'string | required | same: password'
                ];

                // custom messages
                $messages = [
                    'password2' => [
                        'required' => 'لطفا رمز را دوباره وارد کنید',
                        'same' => 'رمز وارد شده یکسان نیست'
                    ]
                ];

                [$inputs, $errors] = filter($_POST, $fields, $messages);
                try {
                 
                    if (!empty($errors)){
                        $all_errors_message = [];
                        foreach ($errors as $error=> $message) {
                            array_push($all_errors_message,$message) ;
                            break;
                        }
                        //var_dump($all_errors_message);
                        redirect_with_messages('/auth/register.php',$all_errors_message,);
                    }else{
    
                        if (is_user_exist_by_email($inputs['email']) || is_user_exist_by_username($inputs['username'])) {
    
                             redirect_with_message('/auth/login.php',"این حساب کاربری با مشخصات ایمیل یا نام کاربری موجود است" );
                        }

                        //TDO : Send mail
                        $activation_code = generate_activation_code();
                        $email = $inputs["email"];
                        $aCode =APP_URL . "/activate.php?email=$email&activation_code=$activation_code";

                        $result = register_user($inputs["email"],$inputs["username"],$inputs["password"],$activation_code);
                        
                        if ($result){
                             redirect_with_message('/auth/login.php','  اکانت شما با موفقیت ساخته شد برای فعال سازی ایمیل را برسی کنید' . $aCode);
                        }else{
                             redirect_with_message('/auth/register.php',"مشکلی در ساخت اکانت به وجود آمد");
                        }
                    
                    }
                } catch (Exception $e) {
                  redirect_with_message('/auth/register.php',"مشکلی هنگام انجام عملیات به وجود آمد به پشتیبانی اطلاع دهید");
                }
                 
        }
    
    ?>



    
        <form class="needs-validation" action="register.php" method="post" novalidate>
            <div class="row p-3">

                <div class="col-12">

                    <label class="text-white fs-4 fw-bold">آپا </label>

                </div>

                <div class="col-12 d-flex justify-content-center">

                    <h1 class="h3 mb-3 fw-bolder">ساخت اکانت</h1>
                </div>
                <div class="col-12">
                    <div class="form-floating fw-bold   ">
                        <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com"
                            required>
                        <label for="username">نام کاربری</label>

                        <div class="valid-feedback">
                            عالیه
                        </div>
                        <div class="invalid-feedback">
                            نام کاربری  را وارد کنید
                        </div>
                    </div>


                </div>
                <div class="col-12">
                    <div class="form-floating fw-bold my-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com"
                            required>
                        <label for="email">نشانی ایمیل</label>

                        <div class="valid-feedback">
                            عالیه
                        </div>
                        <div class="invalid-feedback">
                            نشانی ایمیل را وارد کنید
                        </div>
                    </div>


                </div>




            </div>

            <div class="row d-flex flex-row p-3 ">
                <div class="col col-6 ">
                    <div class="form-floating fw-bold ">
                        <input type="password" class="form-control" pattern="[a-zA-Z0-9\W]{8,}" name="password" id="password"
                            placeholder="Password" required>
                        <label for="password">رمز ورود</label>
                        <div class="valid-feedback">
                            عالیه
                        </div>
                        <div class="invalid-feedback">
                            رمز ورود با تکرار رمز برابر نیست
                        </div>
                    </div>
                </div>

                <div class="col col-6">
                    <div class="form-floating fw-bold my-0">
                        <input type="password" class="form-control " pattern="[a-zA-Z0-9\W]{8,}" name="password2" id="password2"
                            placeholder="Password" required>
                        <label for="password2"> تکرار رمز ورود </label>
                        <div class="valid-feedback">
                            عالیه
                        </div>
                        <div class="invalid-feedback">
                            رمز ورود با تکرار رمز برابر نیست
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12 my-5">
                    <button class="btn btn-outline-danger w-100 py-2" type="submit">ساخت اکانت</button>
                </div>
            </div>
        </form>
             <div class="col-12 d-flex fs-6 fw-bold justify-content-center my-2 gap-2">
                    <p>  <p>اکانت دارید؟</p> <a class="link-primary" href="./login.php">ورود اکانت</a></p>
                </div>
        </div>
    
    
        <?php view('footer') ?>