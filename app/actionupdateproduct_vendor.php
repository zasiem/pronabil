<?php
include "connection.php";
//cek button    
 if(isset($_POST['Submit'])) {
    $vendor_id         = $_POST['vendor_id'];
    $barang_id        = $_POST['barang_id'];
    $price            = $_POST['price'];

    //Masukan data ke Table
    $input    ="INSERT INTO vendor_products (`id`, `vendor_id`, `barang_id`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '$vendor_id', '$barang_id', '$price', NULL, NULL, NULL)";
    // echo $update;
    // return;
    $query_input= mysqli_query($con, $input);
    if ($query_input) {
    //Jika Sukses
    ?>
        <script language="JavaScript">
        alert('Update Data Product vendor Berhasil');
        document.location='vendor_product.php';
        </script>
    <?php
    } else {
        mysqli_error($con);
    echo "Update Data Product Vendor Gagal!, Silahkan diulangi!";
    }
}
?>