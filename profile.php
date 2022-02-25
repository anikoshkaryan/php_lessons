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
</head>
<body>
    <h1>You logged successfully</h1>

    <form action="server.php" method="post" class="update_form">
        <div class="update_form_input_wrapper">
            <input type="text" class="update_form_input" value="<?php echo $user_data["firstname"]; ?> ">
        </div>
        <div class="update_form_input_wrapper">
            <input type="text" class="update_form_input" value="<?php echo $user_data["lastname"];?> ">
        </div>
        <div class="update_form_input_wrapper">
            <input type="text" class="update_form_input" value="<?php echo $user_data['email']; ?> ">
        </div>
        
    </form>
</body>
</html>