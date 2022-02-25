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
     .registration_form {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        margin-top: 50px;
     }
     .registration_form_input_wrapper {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 15px;
     }
     .registration_form_input_label {
          margin-bottom: 5px;
    }
    .registration_form_input_field{
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
    .registration_form_input_fiel::placeholder{
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        font-size: 16px;
        color: black;
    }
    .registration_form_btn {
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
    .registration_form_input_field_title {
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
    </style>
</head>
<body>

    <?php if(isset($_SESSION['register_success'])): ?>
         <span class="register_success_text">You has been registered successfully</span>
    <?php endif;?>

   <form action="/php_lessons/server.php" method="post" class="registration_form">
        <input type="text" hidden name="action" value="registration_form">
        <div class="registration_form_input_wrapper">
            
            <label for="registration_form_input_field1" class="registration_form_input_label">

                <span class="registration_form_input_field_title">First Name</span>
            </label>
            
            
            <?php if(!empty($errors) && isset($errors['firstname'])):?>
                <span class="error_text"><?php echo $errors['firstname'];?></span>
            <?php endif;?>

             <input type="text" name="firstname" class="registration_form_input_field" id="registration_form_input_field1">
        </div>
        <div class="registration_form_input_wrapper">
            <label for="registration_form_input_field2" class="registration_form_input_label">
                <span class="registration_form_input_field_title">Last Name</span>
            </label>
            <?php if(!empty($errors) && isset($errors['lastname'])):?>
               <span class="error_text"><?php echo $errors['lastname'];?></span>
            <?php endif;?>
             <input type="text" name="lastname" class="registration_form_input_field" id="registration_form_input_field2">

        </div>
        <div class="registration_form_input_wrapper">
            <label for="registration_form_input_field3" class="registration_form_input_label">
                <span class="registration_form_input_field_title">Email</span>
            </label>

            <?php if(!empty($errors) && isset($errors['email'])): ?>
                <span class="error_text"><?php echo $errors['email'] ?> </span>
            <?php endif; ?>

             <input type="text" name="email" class="registration_form_input_field" id="registration_form_input_field3">
        </div>
        <div class="registration_form_input_wrapper">
            <label for="registration_form_input_field4" class="registration_form_input_label">
                <span class="registration_form_input_field_title">Password</span>
            </label>
             
            <?php if(!empty($errors) && isset($errors['password'])): ?>
                <span class="error_text"><?php echo $errors['password'] ?> </span>
            <?php endif; ?>


             <input type="password" name="password" class="registration_form_input_field" id="registration_form_input_field4">
        </div>
        <div class="registration_form_input_wrapper">
            <label for="registration_form_input_field5" class="registration_form_input_label">
                <span class="registration_form_input_field_title">Confirm Pasword</span>
            </label>
             
            <?php if(!empty($errors) && isset($errors['confirmpassword'])): ?>
                <span class="error_text"><?php echo $errors['confirmpassword'] ?> </span>
            <?php endif; ?>


             <input type="password" name="confirmpassword" class="registration_form_input_field" id="registration_form_input_field5">
        </div>
        <button class="registration_form_btn">Submit</button>
   </form>
    
</body>
</html>


<?php unset($_SESSION['errors']); ?>

<?php unset($_SESSION['register_success']);?> 