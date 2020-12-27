<?php include 'partials/header.php' ?>
<?php
session_start();
if(!(isset($_SESSION["login"]))){
    echo "<script>window.location.href='login.php'</script>";
        exit;
}
include './connection.php';
?>

    <br>
    <div class="card">
  <div class="card-header bg-primary text-white">
      Update data vendor
  </div>

  <div class="card-body">

    <!-- form baru -->
    <form action="actioninput.php" method="POST" name="form-input-data">
  <div class="form-group">
    <label for="name">Nama Vendor</label>
    <input input type="text" name="name" class="form-control" placeholder="PT. Cinta Sejati">
  </div>

  <div class="form-group">
    <label for="rating">Rating</label>
    <input input type="text" name="rating" class="form-control" placeholder="4">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input input type="text" name="address" class="form-control" placeholder="Jl. Cinta">
  </div>


  <div class="row">
    <div class="col">
       <div> <label for="phone">Phone</label> </div>
        <input type="text" name="phone" class="form-control" placeholder="0866666">
    </div>
    <div class="col">
        <div> <label for="email">Email</label> </div>
        <input type="text" name="email" class="form-control" placeholder="haji_lulung@example.com">
    </div>
  </div>
  <br>


   <td >
    <center><input class="btn btn-success ceter-block text-white" type="submit" name="Submit" value="Submit">
    <a href="vendor.php" class="btn btn-danger">Cancel</a>
 </td>



    <!-- form baru -->

   

              
        </form>
    </div>
</div>
</div>

<?php include 'partials/footer.php' ?>