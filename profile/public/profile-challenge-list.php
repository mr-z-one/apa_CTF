<?php require_once __DIR__ . '/../../src/bootstrap.php'  ?>

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
                                <i class="bi bi-flag-fill" style="color:rgb(59, 185, 97);"></i>
                            </span>
                            <span style="color:rgb(59, 185, 97);">لیست چالش ها</span>
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
                                <i class="bi bi-person-badge fs-4    "></i>
                            </span>
                            <span>مشاهده پروفایل</span>
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
    <!--off canvas-->

    <main class="mt-5 pt-4 ">
        <div class="container-fluid ">
            <!--error-->
            <div class="row d-flex p-3 ">
                <div class="alert alert-warning alert-dismissible my-2 fade show " role="alert">
                    <span>حساب کاربری شما تکمیل نیس :) </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <!--error-->
            <!--challenge card-->
            <div class="row  ">

                <div class="col col-xs-12  col-md-3 py-3 ">
                    <div class="card h-65 bg-dark text-white " style="width: 10rem;">
                        <img src="https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/48000/ss_a62bc173abb93fbc12dbb6b8d366524a43c1356f.1920x1080.jpg?t=1761819450"
                            class="card-img-top" style="width:159px ; height: 159px;" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center ">
                            <h5 class="card-title text-center  fw-semibold text-danger "> گریز</h5>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">ورود</a>
                        </div>
                    </div>
                </div>

                <div class="col col-xs-12  col-md-3 py-3 ">
                    <div class="card h-65 bg-dark text-white " style="width: 10rem;">
                        <img src="https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/48000/ss_a62bc173abb93fbc12dbb6b8d366524a43c1356f.1920x1080.jpg?t=1761819450"
                            class="card-img-top" style="width:159px ; height: 159px;" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center ">
                            <h5 class="card-title text-center  fw-semibold text-danger "> گریز</h5>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">ورود</a>
                        </div>
                    </div>
                </div>


                <div class="col col-xs-12  col-md-3 py-3 ">
                    <div class="card h-65 bg-dark text-white " style="width: 10rem;">
                        <img src="https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/48000/ss_a62bc173abb93fbc12dbb6b8d366524a43c1356f.1920x1080.jpg?t=1761819450"
                            class="card-img-top" style="width:159px ; height: 159px;" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center ">
                            <h5 class="card-title text-center  fw-semibold text-danger "> گریز</h5>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">ورود</a>
                        </div>
                    </div>
                </div>


                <div class="col col-xs-12  col-md-3 py-3 ">
                    <div class="card h-65 bg-dark text-white " style="width: 10rem;">
                        <img src="https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/48000/ss_a62bc173abb93fbc12dbb6b8d366524a43c1356f.1920x1080.jpg?t=1761819450"
                            class="card-img-top" style="width:159px ; height: 159px;" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center ">
                            <h5 class="card-title text-center  fw-semibold text-danger "> گریز</h5>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">ورود</a>
                        </div>
                    </div>
                </div>

                <div class="col col-xs-12  col-md-3 py-3 ">
                    <div class="card h-65 bg-dark text-white " style="width: 10rem;">
                        <img src="https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/48000/ss_a62bc173abb93fbc12dbb6b8d366524a43c1356f.1920x1080.jpg?t=1761819450"
                            class="card-img-top" style="width:159px ; height: 159px;" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center ">
                            <h5 class="card-title text-center  fw-semibold text-danger "> گریز</h5>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">ورود</a>
                        </div>
                    </div>
                </div>

                <div class="col col-xs-12  col-md-3 py-3 ">
                    <div class="card h-65 bg-dark text-white " style="width: 10rem;">
                        <img src="https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/48000/ss_a62bc173abb93fbc12dbb6b8d366524a43c1356f.1920x1080.jpg?t=1761819450"
                            class="card-img-top" style="width:159px ; height: 159px;" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center ">
                            <h5 class="card-title text-center  fw-semibold text-danger "> گریز</h5>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">ورود</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!--challenge card-->

        <!--challenge modal-->
        <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <ul class="nav nav-pills mb-3 " id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active fw-bold" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">توضیحات</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link  fw-bold" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#writeup" type="button" role="tab" aria-controls="home-tab-pane"
                                    aria-selected="true">ثبت رایتاپ</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold " id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false"><span ">ثبت
                                        فلگ</span></button>
                            </li>

                        </ul>
                        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <div class="tab-content text-white" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون
                                و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف
                                بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت
                                فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه
                                ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان
                                امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان
                                مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                                اساسا مورد استفاده قرار گیرد.
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                                فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                                کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می
                                طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و
                                فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری
                                موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی
                                دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                                گیرد.
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                <form action="#" method="post">
                                    <label for="formFile" class="form-label">ثبت فلگ :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="flag_*****"
                                            aria-label="Recipient’s username" aria-describedby="button-addon2">

                                        <button class="btn btn-outline-danger fw-bolder" type="submit"
                                            id="button-addon2">ثبت</button>
                                    </div>

                                </form>
                            </div>

                            <div class="tab-pane fade" id="writeup" role="tabpanel" aria-labelledby="profile-tab"
                                tabindex="0">
                                <form action="#" method="post">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">بارگذاری رایتاپ :</label>
                                        <div class="input-group mb-3">

                                            <input class="form-control" type="file" id="formFile">
                                            <button class="btn btn-outline-danger fw-bolder" type="submit"
                                                id="button-addon2">ثبت</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">متوجه
                                شدم</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--challenge modal-->

     <?php view("profile_footer") ?>
