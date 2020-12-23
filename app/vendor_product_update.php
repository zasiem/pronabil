<?php include 'partials/header.php';

    $kode = $_GET['id'];
    $query = "SELECT * from vendor_products WHERE id =". $kode;

    $update=mysqli_query($con, $query); ?>
<html>

<head>
    
</head>

<body>
    <br>
    <div class="card">
  <div class="card-header bg-primary text-white">
        Form Update Data Product Vendor
  </div>

  <div class="card-body">
  <?php while($data = mysqli_fetch_assoc($update)){ ?>
  
    <div style="border:0; padding:10px; width:760px; height:auto;">
        <form action="prosesupdateproduct.php" method="POST" name="form-update-data">
            <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr height="46">
                    <td width="10%"> </td>
                    <td width="25%"> </td>
                    <td width="65%">                       
                    </td>
                </tr>

                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">Vendor Id</td>
                    <td><input type="text" name="vendor_id" value="<?php echo $data ['vendor_id'] ?>" size="35" maxlength="6" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">Barang Id</td>
                    <td><input type="text" name="barang_id" value="<?php echo $data ['barang_id'] ?>" size="35" maxlength="6" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">Price</td>
                    <td><input type="text" name="price" value="<?php echo $data ['price'] ?>" size="35" maxlength="6" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td> </td>
                    <td> <input type="hidden" name="id" value="<?php echo $data ['id'] ?>" >
                        <input class="btn btn-warning text-white" type="submit" name="Submit" value="Update">
                        <a href="vendor.php" class="btn btn-danger">Cancel</a> </td>
                </tr>
            </table>
            <?php } ?>
        </form>
    </div>
</body>

</html>
<?php include 'partials/footer.php' ?>