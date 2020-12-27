<?php
    include 'connection.php';
    $kode = $_GET['id'];
    $query = "DELETE FROM vendor_products WHERE id = ".$kode;

$delete=mysqli_query($con, $query);
if ($delete){
	echo "<script>window.location.href='vendor.php'</script>";
}else{
	echo "gagal delete";
}

?>