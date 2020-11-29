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
      <th scope="col">Vendor ID</th>
      <th scope="col">Barang ID</th>
      <th scope="col">Harga</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Deleted At</th>
    </tr>
  </thead>
  <tbody>
<?php
$id = $_GET['id'];
$ambildata = mysqli_query($con, "SELECT * FROM vendor_products WHERE vendor_id = '$id' ");
while ($data = mysqli_fetch_assoc($ambildata)) {
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
    echo "</tr>";

}
?>
 </tbody>
 </table>
 </div>
</html>
<!-- ngoding diatas sini -->

<?php include 'partials/footer.php' ?>