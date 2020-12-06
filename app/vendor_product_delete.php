<?php
    include 'connection.php';
    $kode = $_GET['id'];
    $query = "DELETE FROM vendor_products WHERE id = ".$kode;

$delete=mysqli_query($con, $query);
if ($delete){
	header('Location: vendor.php');
}else{
	echo "gagal delete";
}

?>