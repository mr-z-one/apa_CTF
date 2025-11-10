<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>فرم چلنج - حالت تاریک</title>
  <style>
    body {
      font-family: "Vazirmatn", sans-serif;
      background-color: #121212;
      color: #eaeaea;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      direction: rtl;
      margin: 0;
    }

    .container {
      width: 360px;
    }

    /* پیام بالا */
    .message {
      display: ;
      background-color: #2a2a2a;
      border-right: 4px solid #4caf50;
      color: #d4edda;
      padding: 10px 15px;
      border-radius: 8px;
      margin-bottom: 15px;
      font-size: 14px;
      animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    form {
      background-color: #1e1e1e;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.6);
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      color: #ddd;
    }

    input[type="text"],
    textarea,
    input[type="url"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 8px;
      border: 1px solid #333;
      background-color: #2a2a2a;
      color: #fff;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    input:focus,
    textarea:focus {
      border-color: #4caf50;
      outline: none;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    button {
      width: 100%;
      background-color: #4caf50;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s;
    }

    button:hover {
      background-color: #45a049;
      transform: translateY(-2px);
    }

    button:active {
      transform: translateY(0);
    }
  </style>
  <?php require_once __DIR__ . '/../../src/bootstrap.php' ?>
</head>
<body>

<?php require_once __DIR__ . "/../inc/admin.model.php" ?>
  <div class="container">
    <!-- پیام موفقیت -->
    <div id="message" class="message">
      <?php 
     
   
     if (is_post_request()){

      $challengeLink = $_POST['challengeLink'];
      $name          = $_POST['name'];
      $description   = $_POST['description'];
      
      $src_image = upload_file("image",["image/jpeg"=>"jpeg"]);
      if (strpos($src_image,"error",0)!==false){
          echo "". $src_image ."";
      
      }else{
         if (add_card($name,$description,$challengeLink,$src_image)){
          echo "با موفقیت اضافه شد";
         }else{
           echo "ثبت چالش با مشکل مواجه شد";
         }
      }
       //echo upload_file("image");
     }
      
    
      ?>
    </div>

    <form id="challengeForm" action="/admin/add-card.php" method="post" enctype="multipart/form-data">
      <label for="name">نام:</label>
      <input type="text" id="name" name="name" placeholder="نام خود را وارد کنید" required>

      <label for="description">توضیحات:</label>
      <textarea id="description" name="description" placeholder="توضیحات را بنویسید..." required></textarea>

      <label for="challengeLink">لینک چلنج:</label>
      <input type="url" id="challengeLink" name="challengeLink" placeholder="https://example.com" required>

      <label for="image">آپلود عکس:</label>
      <input type="file" id="image" name="image" accept="image/*" required>

      <button type="submit">ارسال</button>
    </form>
  </div>


</body>
</html>
