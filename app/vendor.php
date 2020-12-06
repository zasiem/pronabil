<?php include 'partials/header.php' ?>

<!-- ngoding dibawah sini -->
<?php
$con = mysqli_connect($serviceName,$user,$password,$database);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>
<html>
<h2 style="text-align:center;">Data Vendor </h2>
 <center><a href="createvendor.php" class="btn btn-primary">Create</a></center>

<br>
<div style="margin:auto;">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Rating</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Deleted At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$ambildata = mysqli_query($con, "SELECT * FROM vendors");
while ($data = mysqli_fetch_array($ambildata)) {
    echo "<tr>";
    echo "<td>";
    echo $data['id'];
    echo "</td>";
    echo "<td>";
    echo $data['name'];
    echo "</td>";
    echo "<td>";
    echo $data['rating'];
    echo "</td>";
    echo "<td>";
    echo $data['address'];
    echo "</td>";
    echo "<td>";
    echo $data['phone'];
    echo "</td>";
    echo "<td>";
    echo $data['email'];
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
    <a href="<?php echo "vendor_product.php?id=".$data['id']; ?>" class="btn btn-primary" style="width: 85px">Product</a>
   <!-- <a href='form-edit.php?id_mahasiswa=$row[id_mahasiswa]'>Edit</a> -->
   <br>
   <br>

   <a href="<?php echo "update_vendor.php?id=".$data['id']; ?>" class="btn btn-warning" style="width: 85px">Update</a>
   <br>
   <br>

   <a href="<?php echo "delete_vendor.php?id=".$data['id']; ?>" class="btn btn-danger" style="width: 85px">Delete</a>
   <br>
   <br>
   
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