<?php

include './connection.php';

$transaction_code = $_POST['transaction_code'];
$detail_id = $_POST['transactions_detail_id'];
$barang_id = $_POST['barang_id'];
$gudangs = $_POST['gudangs'];
$vendors = $_POST['vendors'];

for ($i = 0; $i < count($barang_id); $i++) {
    $query = "UPDATE transactions_detail SET 
                status='purchase',
                destination='$gudangs[$i]',
                vendor_product_id='$vendors[$i]'
                
                WHERE id = '$detail_id[$i]'";
    mysqli_query($con, $query);
}

$amount = 0;
for ($i = 0; $i < count($barang_id); $i++) {
    $query = "SELECT * from transactions_detail WHERE id = '$detail_id[$i]'";
    $transaction = mysqli_query($con, $query);
    $query = "SELECT * from vendor_products WHERE id='$vendors[$i]'";
    $vendor = mysqli_query($con, $query);
    $amount += (mysqli_fetch_assoc($vendor)['price'] * mysqli_fetch_assoc($transaction)['quantity']);
}

$query = "UPDATE transactions SET 
                status='purchase',
                amount='$amount'
                WHERE code = '$transaction_code'";
mysqli_query($con, $query);

header('Location: transaksi.php');
