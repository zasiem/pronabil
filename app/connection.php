<?php
$serviceName = 'remotemysql.com';
$user = 'lPmJ6SfUsA';
$password = 'GHRSQI1Xy2';
$database = 'lPmJ6SfUsA';

$con = mysqli_connect($serviceName,$user,$password,$database);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>