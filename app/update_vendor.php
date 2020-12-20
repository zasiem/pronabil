<?php 
 include 'partials/header.php';
    // update user data
	$kode = $_GET['id'];
    $query = "SELECT * from vendors WHERE id =". $kode;

$update=mysqli_query($con, $query);
?>

   <br>
    <div class="card">
  <div class="card-header bg-primary text-white">
      Update data vendor
  </div>

  <div class="card-body">

  	<?php while($data = mysqli_fetch_assoc($update)){ ?>
<!-- form baru -->
<form action="proses_update.php" method="POST" name="form-input-data">
<div class="form-group">
	<label for="name">Name</label>
	<input type="text" name="name" value="<?php echo $data ['name'] ?>" class="form-control">
</div>

<div class="form-group">
	<label for="rating">Rating</label>
	<input type="text" name="rating" value="<?php echo $data ['rating'] ?>" class="form-control">
</div>

<div class="form-group">
	<label for="address">Adress</label>
	<input type="text" name="address" value="<?php echo $data ['address'] ?>" class="form-control">
</div>

 <div class="row">
    <div class="col">
       <div> <label for="phone">Phone</label> </div>
        <input type="text" name="phone" value="<?php echo $data ['phone'] ?>" class="form-control">
    </div>
    <div class="col">
        <div> <label for="email">Email</label> </div>
        <input type="text" name="email" value="<?php echo $data ['email'] ?>" class="form-control">
    </div>
  </div>
  <br>

   <td><center>
        <input type="hidden" name="id" value="<?php echo $data ['id'] ?>" >
        <input class="btn btn-success text-white" type="submit" name="Submit" value="Update">
        <a href="vendor.php" class="btn btn-danger">Cancel</a>
    </center></td>




<!-- form baru -->
   

                </tr>
            </table>
        <?php } ?>
        </form>
    </div>
</div>
</div>
<?php include 'partials/footer.php' ?>
