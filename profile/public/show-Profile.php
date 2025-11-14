<?php require_once __DIR__ . '/../../src/bootstrap.php' ; ?>
<?php require_once __DIR__ . '/../inc/show-Profile.model.php'  ?>

    <?php view("profile_header",['title' => "challenge-list"]) ?>


    <?php  require_login() ?>

    <!-- Modal exit -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white  ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">خروج</h5>
                    <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    آیا می خواهید خارج شوید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خیر</button>
                    <button type="button" class="btn btn-primary">بله</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <!--off-canvas trigger-->
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            <!--off-canvas trigger-->
            <a class="navbar-brand me-auto fw-bolder fs-3" href="#">آپا</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">


                    <li class="nav-item ">
                        <button class="btn btn-outline-danger " data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <span>خروج</span>
                            <i class="bi bi-arrow-bar-left"></i>
                        </button>


                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!--navbar-->

    <!--off canvas-->

    <div class="offcanvas bg-dark text-white offcanvas-start sidebar-nav" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <!-- <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5> -->
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li class="">
                        <hr />
                    </li>
                    <li>
                        <div class="text-secondary small fw-bold  px-3">
                            مسابقات
                        </div>
                    </li>

                    <li>
                        <a href="./profile-challenge-list.php" class="nav-link  px-3 active ">
                            <span class="me-2">
                                <i class="bi bi-flag-fill"></i>
                            </span>
                            <span>لیست چالش ها</span>
                        </a>
                    </li>

                    <li class="">
                        <hr />
                    </li>

                    <li>
                        <div class="text-secondary small fw-bold  px-3">
                            پروفایل
                        </div>
                    </li>
                    <li>
                        <a href="./show-Profile.php" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-person-badge fs-4" style="color:rgb(59, 185, 97)"></i>
                            </span>
                            <span style="color:rgb(59, 185, 97)">مشاهده پروفایل</span>
                        </a>
                    </li>
                    <li>
                        <a href="./Profile-submit.php" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-person-check fs-4    "></i>
                            </span>
                            <span>تکمیل پروفایل </span>
                        </a>
                    </li>
                    <li class="">
                        <hr />
                    </li>


                </ul>
            </nav>
        </div>
    </div>

    <?php 
        $user_data = get_user($_SESSION["user_id"]);

        $name = $user_data["name"] ?? "-";
        $last_name = $user_data["last_name"] ?? "-";

        $phone_number = $user_data["phone_number"] ?? "-";

        $username = $user_data["username"] ?? "-";
        $email = $user_data["email"] ??"-";

        $is_male = "";
        $is_female = "";

        $gender = $user_data["gender"] ??"";

        if (strtolower($gender) == "m") {
            $is_male = "checked ";
        }else if (strtolower($gender) == "f") {
            $is_female = "checked ";
        }

    ?>

    

    <!--off canvas-->
    <main class="mt-5 pt-4 ">
        <div class="container-fluid">
            <!--error-->
            <?php flash(); ?>
            <!--error-->
            <form action="/" method="post">



                <div class="row d-flex p-3">

                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value= "<?php echo $name; ?>"  disabled id="name" placeholder="نام">
                            <label for="name">نام</label>
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="l-name" value= "<?php echo $last_name; ?>" disabled placeholder="نام خانوادگی">
                            <label for="l-name">نام خانوادگی</label>
                        </div>
                    </div>
                </div>
                <div class="row d-flex p-3">

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="phone"disabled  value="<?php echo $phone_number; ?>"  >
                            <label for="phone">شماره تماس</label>
                        </div>

                    </div>
                </div>
                <div class="row d-flex p-3">

                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" placeholder="نام" disabled
                                value= "<?php echo $username; ?>">
                            <label for="username">نام کاربری</label>
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="email" disabled value= "<?php echo $email; ?>">
                            <label for="email">ایمیل</label>
                        </div>

                    </div>
                </div>
                <div class="row d-flex flex-row mx-5 px-5 ">
                    <div class="col">
                        <label class="text-light">جنسیت :</label>
                    </div>
                    <div class="col">
                        <div class="form-check text-white">
                            <input class="form-check-input" disabled type="radio" name="radioDefault" id="radioDefault1" <?php echo $is_male ; ?> >
                            <label class="form-check-label" for="radioDefault1">
                                مرد
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check text-white ">
                            <input class="form-check-input" disabled type="radio" name="radioDefault" id="radioDefault2" <?php echo $is_female ; ?> >
                            <label class="form-check-label" for="radioDefault2">
                                زن
                            </label>
                        </div>
                    </div>
                </div>   

            </form>

        </div>
     <?php view("profile_footer") ?>