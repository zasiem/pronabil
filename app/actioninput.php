<?php
include "connection.php";
//cek button    
if (isset($_POST['Submit'])) {
    $name         = $_POST['name'];
    $rating        = $_POST['rating'];
    $address            = $_POST['address'];
    $phone        = $_POST['phone'];
    $email        = $_POST['email'];

    //Masukan data ke Table
    $input    = "INSERT INTO vendors (id,name,rating,address,phone,email) VALUES (NULL,'$name','$rating','$address','$phone', '$email')";
    $query_input = mysqli_query($con, $input);
    if ($query_input) {
        //Jika Sukses
?>
        <script language="JavaScript">
            alert('Input Data vendor Berhasil');
            document.location = 'vendor.php';
        </script>
<?php
    } else {
        //Jika Gagal
        echo "Input Data vendor Gagal!, Silahkan diulangi!";
    }
}
?>