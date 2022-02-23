<?php

// $servername = "localhost";
// $username   = "root";
// $password   =  "";
// $dbname     = "MyGuests";


// $conn = new mysqli($servername, $username, $password, $dbname);

// if($conn->connect_error){
//     die("Connection failed:" . $conn->connect_error);
// }

// // $insert_sql = "INSERT INTO myguest (firstname,  lastname, email, reg_date) VALUE()";
// // $select_sql = "SELECT * FROM myguest"

// // INSERT

// $reg_date   = date('Y-m-d');
// $insert_sql = "INSERT INTO myguest (firstname, lastname, email, reg_date) 
//     VALUE('Ani', 'Koshkaryan', 'koshkaryan@gmail.com', '$reg_date'),
//     ('Ani', 'Koshkaryan', 'koshkaryan@gmail.com', '$reg_date') ";

// if ($conn->query($insert_sql) === TRUE){
//     // echo "inserted";
// }


// // SELECT 

// $select_sql = "SELECT * FROM myguest";
// $result = $conn->query($select_sql);

// if ($result->num_rows > 0) {
//     echo "<pre>";
//     print_r($result->fetch_all());
// }



$servername = "localhost";
$username   =  "root";
$password   =   "";
$dbname     =   "myuser";


$conn  =  new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
   die ("Connection failed:" . $conn->connect_error);
}

$reg_date  = date('Y-m-d');
$insert_sql  =  "INSERT INTO myusersinfo (firstname, lastname, email, reg_date) VALUE('Ani', 'Koshkaryan', 'koshkaryanani@gmail.com','$reg_date'),
('Artem', 'Hakobjanyan', 'hakobjanyanartem@gmail.com','$reg_date'), ('Vitali', 'Hakobjanyan', 'hakobjanyanvitali@gmail.com','$reg_date')";

if($conn->query($insert_sql) === TRUE){
    echo "inserted";
}


$select_sql  = "SELECT * FROM myusersinfo";
$result      =  $conn->query($select_sql);

if($result->num_rows > 0){
    echo "<pre>";
    print_r($result->fetch_all(MYSQLI_ASSOC));
}


?>