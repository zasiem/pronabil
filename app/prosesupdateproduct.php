<?php 
include './connection.php';

$id                = $_POST['id']; 
$vendor_id         = $_POST['vendor_id'];
$barang_id         = $_POST['barang_id'];
$price             = $_POST['price']; 

$query="UPDATE vendor_products SET vendor_id='$vendor_id', barang_id='$barang_id', price='$price' WHERE id=$id";

$hasil=mysqli_query($con, $query);

if($hasil){
	header('Location:vendor.php');
}else{
	echo "update data gagal kang!";
}

 ?>