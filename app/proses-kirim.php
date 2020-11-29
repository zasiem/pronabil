<?php 
 include 'partials/header.php';
    // update user data
	$kode = $_GET['id'];
    $query = "UPDATE transactions SET status = 'delivery' WHERE id = ".$kode;

$update=mysqli_query($con, $query);
if ($update){
	header('Location: transaksi.php');
}else{
	echo "gagal update";
}


?>