<?php 
include './connection.php';

$id=$_POST['id']; 
$Name=$_POST['name']; 
$Rating=$_POST['rating']; 
$address=$_POST['address']; 
$phone=$_POST['phone'];
$email=$_POST['email'];  

$query="UPDATE vendors SET name='$Name', rating='$Rating', address='$address', phone='$phone', email='$email' WHERE id=$id";

$hasil=mysqli_query($con, $query);

if($hasil){
	header('Location:vendor.php');
}else{
	echo "update data gagal kang!";
}

 ?>