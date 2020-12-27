<?php include 'partials/header.php' ?>
<?php
if(!(isset($_SESSION["login"]))){
    echo "<script>window.location.href='login.php'</script>";
        exit;
}
include './connection.php';
?>

<?php
$con = mysqli_connect($serviceName,$user,$password,$database);

// Check connection  

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>
<br>
<div class="card">
<div class="card-header bg-primary text-white">
      History transaksi
</div>
<div class="card-body">
<table class="table table-bordered table-striped" border="1" cellspacing="3">
<tr>
    <td>Id</td>
    <td>Code</td>
    <td>Name</td>
    <td>Description</td>
    <td>Amount</td>
    <td>Status</td>
    <td>Created at</td>
    <td>Updated at</td>
    <td>Created by</td>
    <td>Updated by</td>
</tr>
<?php
$ambildata = mysqli_query($con, "SELECT * FROM transactions WHERE status='arrived' OR status='paid'"); //gaada koneksi ke database, pake MySQLi, pake assoc, 
while ($data = mysqli_fetch_assoc($ambildata)) {
?>
<tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['code']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['description']; ?></td>
    <td><?php echo $data['amount']; ?></td>
    <td><?php echo $data['status']; ?></td>
    <td><?php echo $data['created_at']; ?></td>
    <td><?php echo $data['updated_at']; ?></td>
    <td><?php echo $data['created_by']; ?></td>
    <td><?php echo $data['updated_by']; ?></td>

</tr>
<?php
}
?>
</table>
</html>
<?php include 'partials/footer.php' ?>