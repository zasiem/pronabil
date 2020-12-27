<?php include 'partials/header.php' ?>

<?php
if (!(isset($_SESSION["login"]))) {
    echo "<script>window.location.href='login.php'</script>";
    exit;
}
include './connection.php';
?>

<!-- ngoding dibawah sini -->
<div class="container p-5 text-center">
    <h1 class="text-center">Menu</h1>
    <a href="vendor.php" class="btn btn-light w-50 my-2">Data Vendor</a>
    <a href="transaksi.php" class="btn btn-light w-50 my-2">Transaksi</a>
    <a href="history.php" class="btn btn-light w-50 my-2">History Transaksi</a>
    <a href="good_receipt.php" class="btn btn-light w-50 my-2">Pelaporan GR</a>
    <a href="logout.php" class="btn btn-danger w-50 my-2">Logout</a>
</div>
<!-- ngoding diatas sini -->

<?php include 'partials/footer.php' ?>