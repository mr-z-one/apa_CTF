<?php require_once __DIR__ . '/../../src/bootstrap.php' ?>


<?php view('header',['title'=>'login']) ?>

    <?php
    //  var_dump($_SESSION['username']);
            if (is_post_request()) {
            [$inputs, $errors] = filter($_POST, [
            'username' => 'string | required',
            'password' => 'string | required'
        ]);

            if (!empty($errors)){
                    $all_errors_message = [];
                    foreach ($errors as $error=> $message) {
                        array_push($all_errors_message,$message) ;
                        break;
                    }
                    //var_dump($all_errors_message);
                    redirect_with_messages('/auth/login.php',$all_errors_message,);
                }

                try {
                      $user = find_user_by_username($inputs['username']);
                        var_dump($user);    
                        if ($user && !is_user_active($user)){
                              redirect_with_message('/auth/login.php',"اکانت شما فعال نیست!");
                        }
                    if (!login($inputs['username'], $inputs['password'])) {
                    
                    redirect_with_message('/auth/login.php',"نام کاربری یا رمز اشتباه هست");

                    }else{
                        redirect_with_message('/profile/profile-challenge-list.php',"نام کاربری یا رمز درست هست");
                        //go to profile
                    }
                } catch (Exception $e) {
                      redirect_with_message('/auth/login.php',"مشکلی هنگام انجام عملیات به وجود آمد به پشتیبانی اطلاع دهید");
                }



        }
    ?>


        <form class="needs-validation" action="login.php" method="post" novalidate>
            <div class="row p-3">

                <div class="col-12">

                    <label class="text-white fs-4 fw-bold">آپا </label>

                </div>

                <div class="col-12 d-flex justify-content-center">

                    <h1 class="h3 mb-3 fw-bolder">لطفا وارد شوید</h1>
                </div>

                <div class="col-12">
                    <div class="form-floating fw-bold   ">
                        <input type="text" class="form-control" name="username" id="username" placeholder="username"
                            required>
                        <label for="username"> نام کاربری  </label>

                        <div class="valid-feedback">
                            عالیه
                        </div>
                    </div>


                </div>
                <div class="col-12">
                    <div class="form-floating fw-bold my-4">
                        <input type="password" name="password" class="form-control" pattern="[a-zA-Z0-9\W]{8,}" id="password" placeholder="Password"
                            required>
                        <label for="password">رمز ورود</label>
                        <div class="valid-feedback">
                            عالیه
                        </div>
                        <div class="invalid-feedback">
                            رمز ورود باید حداقل 8 رقم باشذ
                        </div>
                    </div>
                </div>

   

            </div>
            <div class="row p-1">
                         <div class="col-12  d-flex justify-content-center">
                    <!-- <div class="form-check text-start my-3"> <input class="form-check-input" type="checkbox"
                            value="remember-me" id="checkDefault"> <label class="form-check-label" for="checkDefault">
                            مرا به یاد بیاور
                        </label>  -->
                        <button class="btn  btn-primary w-50 py-2" type="submit">ورود</button>
                    </div > 

                </div>

                <div class="col-12 d-flex fs-6 fw-bold justify-content-center my-2 gap-2">
                    <p>  <p>اکانت ندارید؟</p> <a class="link-primary" href="./register.php">ساخت اکانت</a></p>
                </div>
            </div>
        </form>
    <?php view('footer') ?>