<?php

include './connection.php';
include './api_consumer.php';

$transaction_detail = $_POST['transaction_detail'];
$query = "SELECT * FROM transactions_detail JOIN vendor_products ON transactions_detail.vendor_product_id = vendor_products.id WHERE transactions_detail.id = '$transaction_detail'";
$result_query = mysqli_query($con, $query);

$master = mysqli_fetch_assoc($result_query);

$barang = consume('https://warehouse-tubeseai.herokuapp.com/barang/' . $master['barang_id']);

$name = $barang[0]['name'];
$tanggal = date("Y-m-d");
$amount = $master['price'] * $master['quantity'];

$request = compact('name', 'tanggal', 'amount');

$response = post_good_receipt("http://finabil.000webhostapp.com/post-gr.php", $request);

$query = "UPDATE transactions_detail SET status='paid' WHERE id = '$transaction_detail'";
mysqli_query($con, $query);

$query = "SELECT count(*) as total FROM transactions_detail WHERE status = 'arrived' AND transaction_code = '" . $master['transaction_code'] . "'";
$result_query = mysqli_query($con, $query);
if (mysqli_fetch_assoc($result_query)['total'] <= 0) {
    $query = "UPDATE transactions SET status='paid' WHERE code = '" . $master['transaction_code'] . "'";
    mysqli_query($con, $query);
}

header('Location: good_receipt.php');
