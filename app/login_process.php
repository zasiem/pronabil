<?php

include './connection.php';
include './api_consumer.php';   

$email = $_POST['email'];
$password = $_POST['password'];

$request = compact('email', 'password');

$response = post_login("https://penabil-api.herokuapp.com/api/login", $request);

if ($response->status){
    header('Location: index.php');    
} else {
    echo 'Gagal Login';
}

