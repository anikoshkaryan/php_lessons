<?php
session_start();
include "./db_connect.php";

if ($_POST['action'] == 'registration_form'){
    registration();
} elseif ($_POST['action'] == 'login_form') {
   login();
}


function registration () {
    $firtsname       = $_POST["firstname"];
    $lastname        = $_POST["lastname"];
    $email           = $_POST["email"];
    $password        = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    
    $valid  = true;
    $errors = [];
    
    if ($firtsname == ""){
       $valid = false;
       $errors['firstname'] =  "The field is required";
    }
    
    if($lastname == ""){
        $valid = false;
        $errors['lastname'] = "The field is required";
    }
    
    if ($email == ""){
        $valid = false;
        $errors['email'] = "The field is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
        $errors['email'] = "Invalid email format";
    }
    
    
    if($password == "" || $confirmpassword == ""){
        if($password == ""){
            $valid = false;
            $errors['password'] = "The field is required";
        }
        if ($confirmpassword == ""){
            $valid = false;
            $errors['confirmpassword'] = "The field is required";
        }
    
    } else{
        if($password != $confirmpassword){
            $valid = false;
            $errors['password'] = "The passwords fields are not the same";
            $errors['confirmpassword'] = "The passwords fields are not the same";
    
        }
    }
    
    
    $_SESSION['errors'] = $errors;
    
    
    
    if($valid === false){
       header("location: /php_lessons/index.php");
       exit();
    }
    $password   = password_hash($password, PASSWORD_DEFAULT);
    $created    = date("Y-m-d");
    $insert_sql = "INSERT INTO users (firstname, lastname, email, password, created) VALUES('$firtsname', '$lastname', '$email', '$password', '$created')";
    
    if($conn->query($insert_sql) === true){
        $_SESSION['register_success'] = true;
        header("location: /php_lessons/index.php");
        exit();
    }
    
}

function login () {
    global $conn;
   $email    = $_POST["email"];
   $password = $_POST["password"];

   $valid  = true;
   $errors = [];

   if ($email == "") {
       $valid = false;
       $errors["email"] = "The field is required";
   } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $valid = false;
       $errors['email'] = "Invalid email format";
    }

    if ($password == ""){
        $valid  = false;
        $errors["password"] = "The field is required";
    }

    

   if ($valid ===  false) {
        $_SESSION["errors"] = $errors;
        header("location: /php_lessons/login.php");
        exit();
        
    } else{
        
        $select_sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($select_sql);
        
        if ($result->num_rows > 0) {
            $user_data   = $result->fetch_all(MYSQLI_ASSOC);
            $db_password = $user_data[0]['password'];
            
            if(password_verify($password, $db_password)){
                 $_SESSION['user_data'] = $user_data;
                 header("location: /php_lessons/profile.php");
                exit();
            } else{
                $errors['password']   = "Your Password is incorrect";
                $_SESSION['errors'] = $errors;
                header("location: /php_lessons/login.php");
                exit();
            }
        } else {
            $errors['email'] = "The User does not exist";
            $_SESSION["errors"] = $errors;
            header("location: /php_lessons/login.php");
            exit();
        }
    }
    

}

