<?php
    include 'connection.php';
    $kode = $_GET['id'];
    $query = "DELETE FROM vendors WHERE id = ".$kode;

$delete=mysqli_query($con, $query);
if ($delete){
	header('Location: vendor.php');
}else{
	echo "gagal delete";
}

?>