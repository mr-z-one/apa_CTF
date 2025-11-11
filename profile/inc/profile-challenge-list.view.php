<?php

require_once __DIR__ . "/../../src/libs/helper.php";
function create_challenge_card(string $img_src,$name,$id_modal = "#staticBackdrop" ,string $is_active = "") {
$template = '        <div class="col col-xs-12  col-md-3 py-3 ">
                    <div class="card h-65 bg-dark text-white " style="width: 10rem;">
                        <img src="%s"
                            class="card-img-top" style="width:159px ; height: 159px;" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center ">
                            <h5 class="card-title text-center  fw-semibold text-danger "> %s</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="%s" %s  >ورود</button>
                        </div>
                    </div>
                </div>';
    

                return sprintf($template,$img_src,$name,$id_modal,$is_active ==0? "disabled" : "aaa");
}

function create_challenge_modal_card(string $id_modal,string $description,string $challenge_id){

    $home_tab_pane =bin2hex(random_bytes(8));
    $writeup = bin2hex(random_bytes(8));
    $profile_tab_pane=bin2hex(random_bytes(8));
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                $template = '
        <div class="modal fade " id="{id_modal}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <ul class="nav nav-pills mb-3 " id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active fw-bold" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#{home-tab-pane}" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">توضیحات</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link  fw-bold" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#{writeup}" type="button" role="tab" aria-controls="home-tab-pane"
                                    aria-selected="true">ثبت رایتاپ</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold " id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#{profile-tab-pane}" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false"><span ">ثبت
                                        فلگ</span></button>
                            </li>

                        </ul>
                        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <div class="tab-content text-white" id="myTabContent">
                            <div class="tab-pane fade show active" id="{home-tab-pane}" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                {description}
                            </div>
                            <div class="tab-pane fade" id="{profile-tab-pane}" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                <form action="/profile/flag-submit.php?id={challenge_id}" method="post">
                                    <label for="formFile" class="form-label">ثبت فلگ :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="txt_flag" class="form-control" placeholder="flag_*****"
                                            aria-label="Recipient’s username" aria-describedby="button-addon2">

                                        <button class="btn btn-outline-danger fw-bolder" type="submit"
                                            id="button-addon2">ثبت</button>
                                    </div>

                                </form>
                            </div>

                            <div class="tab-pane fade" id="{writeup}" role="tabpanel" aria-labelledby="profile-tab"
                                tabindex="0">
                                <form action="/profile/upload_writeup.php?id={challenge_id}" method="post">
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
            </div>';


 //return sprintf($template,$id_modal,$description,$challenge_id,$challenge_id);

 return sformat($template,["id_modal"=>$id_modal,"description"=>$description,
                                            "challenge_id"=>$challenge_id,"home-tab-pane"=>$home_tab_pane,"writeup"=>$writeup,"profile-tab-pane"=>$profile_tab_pane]);
}