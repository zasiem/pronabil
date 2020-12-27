<?php

include './connection.php';
include './api_consumer.php';   

session_start();
if(isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];

$request = compact('email', 'password');

$response = post_login("https://penabil-api.herokuapp.com/api/login", $request);

if ($response->status == true){
    $_SESSION["login"] = $response->token;
    header('Location: index.php');    
} else {
    echo 'Gagal Login';
    }
}
?>