
<?php
function view(string $filename, array $data = []): void
{
    // create variables from the associative array
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require_once __DIR__ . '/../inc/' . $filename . '.php';
}

function is_post_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}

function is_get_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
}

function redirect_to(string $url): void
{
    header('Location:' . $url);
    exit;
}

function redirect_with(string $url, array $items): void
{
    foreach ($items as $key => $value) {
        $_SESSION[$key] = $value;
    }

    redirect_to($url);
}

function redirect_with_message(string $url, string $message, string $type=FLASH_SUCCESS)
{
    flash('flash_' . uniqid(), $message, $type);
    redirect_to($url);

}

function redirect_with_messages(string $url, array $messages, string $type=FLASH_SUCCESS)
{

    foreach ($messages as $message) {
 
        flash('flash_' . uniqid(), $message, $type);
    }
    redirect_to($url);

}

/**
 * Return a mime type of file or false if an error occurred
 *
 * @param string $filename
 * @return string | bool
 */
function get_mime_type(string $filename)
{
    $info = finfo_open(FILEINFO_MIME_TYPE);
    if (!$info) {
        return false;
    }

    $mime_type = finfo_file($info, $filename);
    finfo_close($info);

    return $mime_type;
}

function create_date_dir(string $dir): string{


$oldmask = umask(0);



    if (!is_dir($dir)){
        if (!mkdir($dir,0777, true)){
            return "upload no exist";
       
        }
    }


     $year_dir = date('Y');
     $month_dir = date('m');
     $day_dir = date('d');
     

     if (!is_dir($dir . "/".$year_dir)){

        $final_dir = $dir . "/" . $year_dir ."/". $month_dir . "/" . $day_dir;
        $result = mkdir($final_dir,0777, true);

        umask($oldmask);
        if (!$result)
            return "";

        return $final_dir;
     }else if (!is_dir($dir . "/".$year_dir ."/". $month_dir)){

        $final_dir = $dir . "/" . $year_dir ."/". $month_dir . "/" . $day_dir;
        $result = mkdir($final_dir,0777, true);

        umask($oldmask);
            if (!$result)
                return "";

        return $final_dir;
     }else if (!is_dir($dir . "/".$year_dir ."/". $month_dir . "/" . $day_dir )){

        $final_dir = $dir . "/" . $year_dir ."/". $month_dir . "/" . $day_dir;
        $result = mkdir($final_dir,0777, true);

        umask($oldmask);
            if (!$result)
                return "";
        return $final_dir;
     }

        return $dir . "/" . $year_dir ."/". $month_dir . "/" . $day_dir;
     

   
}


function upload_file($file_name,array $allowed_file=["image/png"=>"png"],$base_dire='/../../uploads',$max_size = 5 * 1024 * 1024):string
{

    
    
    $base_dire = __DIR__ . $base_dire;
    $upload_dir = create_date_dir($base_dire);
    
    $has_file = isset($_FILES[$file_name]);
    
    
    if (!$has_file){
        
        return "error:file dont exist";
    }
    $file = $_FILES[$file_name];


    $status = $_FILES[$file_name]['error'];
    $filename = $_FILES[$file_name]['name'];
    $tmp = $_FILES[$file_name]['tmp_name'];

    if ($status !== UPLOAD_ERR_OK) {
     return " error:$status upload error";
    }
     // validate the file size
    $filesize = filesize($tmp);
    if ($filesize > $max_size) {
        return "error:file size";
    }

    // validate the file type
    $mime_type = get_mime_type($tmp);
    if (!in_array($mime_type, array_keys($allowed_file))) {
        return 'error:The file type is not allowed to upload';
    }


    // set the filename as the basename + extension
    $upload_file = time();
    $uploaded_file = $upload_file. '.' . $allowed_file[$mime_type];

    $filepath = $upload_dir . '/' . $uploaded_file;
    
    $success = move_uploaded_file($tmp, $filepath);
    if ($success) {
       return  substr($filepath,strpos($filepath,"uploads"),strlen($filepath));
       
    }

    return "error: upload file" . $filepath;

}

    function sformat($template, $params) {
        return str_replace(
            array_map(function($v){return '{'.$v.'}';},array_keys($params)),
            $params,
            $template
        );
    }

// function session_flash(...$keys): array
// {
//     $data = [];
//     foreach ($keys as $key) {
//         if (isset($_SESSION[$key])) {
//             $data[] = $_SESSION[$key];
//             unset($_SESSION[$key]);
//         } else {
//             $data[] = [];
//         }
//     }
//     return $data;
// }