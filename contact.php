<?php
    define('A','localhost');
    define('B','root');
    define('C','');
    define('D','udaipurTrendz');

    $conn = mysqli_connect(A,B,C); 
        if(!$conn){
            echo "connection failed";
        }
    $db_select=mysqli_select_db($conn,D);

    $dbName ="udaipurTrendz";
    $sql="CREATE DATABASE $dbName";
    if(mysqli_query($conn,$sql)){
        echo "DATABASE CREATED";
    }

    $sql = "CREATE TABLE contact_form( ".
    "id INT NOT NULL AUTO_INCREMENT, ".
    "name VARCHAR(20) NOT NULL, ".
    "email VARCHAR(20) NOT NULL, ".
    "number VARCHAR(15) NOT NULL, ".
    "Message VARCHAR(200) NOT NULL, ".
    "PRIMARY KEY ( id )); ";
    if(mysqli_query($conn,$sql)){
        echo "contact tabel created";
    }

    $full_name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    $sql="INSERT INTO `contact_form`(`id`, `name`, `email`, `number`, `message`) VALUES ('','$full_name','$email','$number','$message')";
    $res = mysqli_query($conn,$sql);
    if($res){
      header('location:contactsucc.html');
    }
?>