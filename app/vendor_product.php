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
<h2 style="text-align:center;">Data Product Vendor</h2>
<br>
<div style="margin:auto;">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama Vendor</th>
      <th scope="col">Nama</th>
      <th scope="col">Tipe</th>
      <th scope="col">Harga</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Deleted At</th>
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
    <a href="" class="btn btn-primary">Product</a>
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