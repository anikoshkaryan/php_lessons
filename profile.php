<?php

   
    session_start();
    $user_data = empty($_SESSION['user_data']) ? [] : $_SESSION['user_data'][0];
    $errors = empty($_SESSION['errors']) ? [] : $_SESSION['errors'];
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
        .update_user_info_form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }
        .update_user_info_form_input_wrapper {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            margin-bottom: 12px;
        }
        .update_user_info_form_input {
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
        .update_user_info_form_input::placeholder{
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 16px;
            color: black;
        }
        .update_user_info_form_btn{
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
        .update_form_title {
            text-align: center;
            font-family: 'Roboto', sans-serif;
            font-weight: 600;
            font-size: 25px;
        }
        .error_text {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            font-weight: 400;
            color: red;
            margin-top: 5px;
       }
     </style>
</head>
<body>
    <h1 class="update_form_title">PROFILE</h1>

     <?php if(isset($_SESSION['update_sucess'])):  ?>
        <span class="update_sucess_info">UPDATED SUCCESSFULLY</span>
    <?php endif; ?>

    <form action="server.php" method="post" class="update_user_info_form">
        <input type="hidden" name="action" value="update_user_info_form">
        <div class="update_user_info_form_input_wrapper">
            <input type="text" class="update_user_info_form_input"  name="firstname" value="<?php echo $user_data["firstname"]; ?> ">

            <?php if(!empty($errors) && isset($errors['firstname'])):?>
                <span class="error_text"> <?php echo $errors['firstname']; ?> </span>
            <?php endif; ?>
        </div>
        <div class="update_user_info_form_input_wrapper">
            <input type="text" class="update_user_info_form_input" name="lastname"  value="<?php echo $user_data["lastname"];?> ">
            <?php if(!empty($errors) && isset($errors['lastname'])): ?>
                <span class="error_text"> <?php echo $errors['lastname']; ?> </span>
            <?php endif; ?>
        </div>
        <div class="update_user_info_form_input_wrapper">
            <input type="text" class="update_user_info_form_input" name="email"  value="<?php echo $user_data['email']; ?> ">

            <?php if(!empty($errors) && isset($errors['email'])) : ?>
                <span class="error_text"> <?php echo $errors['email']; ?> </span>
            <?php endif; ?>
        </div>
        <button class="update_user_info_form_btn">Update</button>
    </form>
</body>
</html>


<?php unset($_SESSION['errors']); ?>