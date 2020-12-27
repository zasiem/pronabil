<?php include 'partials/header.php' ?>
<?php
if(!(isset($_SESSION["login"]))){
    echo "<script>window.location.href='login.php'</script>";
        exit;
}
include './connection.php';
?>

    <br>
    <div class="card">
  <div class="card-header bg-primary text-white">
        Input Data Product Vendor
  </div>

  <div class="card-body">

    <!-- form baru -->
    <form action="actioninputproduct.php" method="POST" name="form-input-data">
  <div class="form-group">
    <label for="vendor_id">Vendor ID</label>
    <input input type="text" name="vendor_id" class="form-control" placeholder="1">
  </div>

  <div class="form-group">
    <label for="barang_id">Barang ID</label>
    <input input type="text" name="barang_id" class="form-control" placeholder="KS0A2">
  </div>

  <div class="form-group">
    <label for="price">Harga</label>
    <input input type="text" name="price" class="form-control" placeholder="666000">
  </div>

  <td>
    <center><input class="btn btn-success text-white" type="submit" name="Submit" value="Submit">
    <a href="vendor.php" class="btn btn-danger">Cancel</a> </center>
</td>


    <!-- form baru -->

   
                
        </form>
    </div>
</body>

</html>
<?php include 'partials/footer.php' ?>