<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/bootstrap-5.3.8-dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/style.css">
</head>

<body class="d-flex align-items-center p-5 bg-dark text-white  ">
    <main class="form-signin w-100 m-auto ">
        <form class="needs-validation" novalidate>
            <div class="row p-3">

                <div class="col-12">

                    <label class="text-white fs-4 fw-bold">آپا </label>

                </div>

                <div class="col-12 d-flex justify-content-center">

                    <h1 class="h3 mb-3 fw-bolder">ساخت اکانت</h1>
                </div>
                <div class="col-12">
                    <div class="form-floating fw-bold   ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                            required>
                        <label for="floatingInput">نام کاربری</label>

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
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                            required>
                        <label for="floatingInput">نشانی ایمیل</label>

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
                        <input type="password" class="form-control" pattern="[a-zA-Z0-9]{8,}" id="floatingPassword"
                            placeholder="Password" required>
                        <label for="floatingPassword">رمز ورود</label>
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
                        <input type="password" class="form-control " pattern="[a-zA-Z0-9]{8,}" id="floatingPassword"
                            placeholder="Password" required>
                        <label for="floatingPassword"> تکرار رمز ورود </label>
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
             <div class="col-12 d-flex justify-content-center my-2 gap-2">
                    <p>  <p>اکانت دارید؟</p> <a class="link-primary" href="./signin.html">ورود اکانت</a></p>
                </div>
        </div>
    </main>

    <script src="/bootstrap-5.3.8-dist/js/bootstrap.bundle.js"></script>
    <script src="./script.js"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>