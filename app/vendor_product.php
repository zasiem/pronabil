<?php include 'partials/header.php' ?>
<?php
session_start();
if(!(isset($_SESSION["login"]))){
    echo "<script>window.location.href='login.php'</script>";
        exit;
}
include './connection.php';
?>


<!-- ngoding dibawah sini -->
<html>
<h2 style="text-align:center;">Data Product Vendor</h2>
<center><a href="createproduct.php" class="btn btn-primary">Create</a></center>
<br>
<div style="margin:auto;">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Vendor ID</th>
      <th scope="col">Barang ID</th>
      <th scope="col">Harga</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Deleted At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
    if(isset($_GET['id'])){
        $id =$_GET['id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "connection.php";
    $ambildata = mysqli_query($con, "SELECT * FROM vendor_products WHERE vendor_id='$id'");
    while ($data = mysqli_fetch_array($ambildata)) {
    echo "<tr>";
    echo "<td>";
    echo $data['id'];
    echo "</td>"; 
    echo "<td>";
    echo $data['vendor_id'];
    echo "</td>";
    echo "<td>";
    echo $data['barang_id'];
    echo "</td>";
    echo "<td>";
    echo $data['price'];
    echo "</td>";
    echo "<td>";
    echo $data['created_at'];
    echo "</td>";
    echo "<td>";
    echo $data['updated_at'];
    echo "</td>";
    echo "<td>";
    echo $data['deleted_at'];
    echo "</td>";
    echo "<td>"; ?>
    <a href="<?php echo "vendor_product_delete.php?id=".$data['id']; ?>" class="btn btn-danger">Delete</a>
    <a href="<?php echo "vendor_product_update.php?id=".$data['id']; ?>" class="btn btn-warning">Update</a>
   <!-- <a href='form-edit.php?id_mahasiswa=$row[id_mahasiswa]'>Edit</a> -->
    <?php

    echo "</td>";
    echo "</tr>";
}
?>
 </tbody>
 </table>
 </div>
</html>
<!-- ngoding diatas sini -->

<?php include 'partials/footer.php' ?>