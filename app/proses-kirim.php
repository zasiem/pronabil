<?php 
 include 'partials/header.php';
    // update user data
	$kode = $_GET['id'];
    $query = "UPDATE transactions SET status = 'delivery' WHERE id = ".$kode;

$update=mysqli_query($con, $query);
if ($update){
	echo "<script>window.location.href='transaksi.php'</script>";
}else{
	echo "gagal update";
}


?>