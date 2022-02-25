
<?php

    session_start();
    $errors = empty($_SESSION['errors']) ? [] : $_SESSION['errors'];
     
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>

    <style>
        .login_form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
        }
        .login_form_input_wrapper {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 15px;
        }
        .login_form_input_field{
            width: 100%;
            border: 1px solid gray;
            border-radius: 5px;
            padding: 10px 20px;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 16px;
            color: black;
            cursor: pointer;
            outline-color: green;
        }
        .login_form_input_field::placeholder{
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 16px;
            color: black;
        }
        .login_form_label {
            margin-bottom: 5px;
        }
        .login_form_input_title {
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            font-size: 18px;
            color: black;
        }
        .error_text {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            font-weight: 400;
            color: red;
            margin-bottom: 5px;
       }
       .login_form_btn{
            display: block;
            margin: 0 auto;
            background: #00800059;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            outline: none;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 18px;
            color: black;
            margin-top: 20px;
            border-radius: 10px;
       }
    </style>
</head>
<body>
    
    <form action="/php_lessons/server.php" method="post" class="login_form">
        <input type="hidden"   name="action" value="login_form">
         <div class="login_form_input_wrapper">
             <label for="login_form_input_field1" class="login_form_label">
                 <span class="login_form_input_title">Email</span>
             </label>
             <?php if(!empty($errors) && isset($errors['email'])):?>
                    <span class="error_text"><?php echo $errors['email'];?> </span>
            <?php endif;?>
             <input type="text" class="login_form_input_field" id="login_form_input_field1" name="email">
         </div>
         <div class="login_form_input_wrapper">
             <label for="login_form_input_field2" class="login_form_label">
                 <span class="login_form_input_title">Password</span>
             </label>
             <?php if(!empty($errors) && isset($errors['password'])): ?>
                <span class="error_text"> <?php echo $errors['password'] ?>  </span>
             <?php endif; ?>
             <input type="password" class="login_form_input_field" id="login_form_input_field2" name="password">
         </div>
          <button class="login_form_btn" >Login</button>
    </form>

 <?php
    unset($_SESSION['errors']);
  
 ?>

</body>
</html>