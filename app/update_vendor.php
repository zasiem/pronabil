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

    <div style="border:0; padding:10px; width:760px; height:auto;">
        <form action="proses_update.php" method="POST" name="form-input-data">
            <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr height="46">
                    <td width="10%"> </td>
                    <td width="25%"> </td>
                    <td width="65%">                        
                    </td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">Name</td>
                    <td><input type="text" name="name" value="<?php echo $data ['name'] ?>" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">Rating</td>
                    <td><input type="text" name="rating" value="<?php echo $data ['rating'] ?>" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">address</td>
                    <td><input type="text" name="address" value="<?php echo $data ['address'] ?>" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">phone</td>
                    <td><input type="text" name="phone" value="<?php echo $data ['phone'] ?>" size="20" maxlength="12" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">email</td>
                    <td><input type="text" name="email" value="<?php echo $data ['email'] ?>" size="20" maxlength="12" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td> </td>
                    <td>
                    	<input type="hidden" name="id" value="<?php echo $data ['id'] ?>">
                    	<input class="btn btn-primary text-white" type="submit" name="Submit" value="Update">
                    </td>

                </tr>
            </table>
        <?php } ?>
        </form>
    </div>
</div>
</div>
