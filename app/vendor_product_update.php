<?php include 'partials/header.php' ?>
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

    <div style="border:0; padding:10px; width:760px; height:auto;">
        <form action="actionupdateproduct_vendor.php" method="POST" name="form-update-data">
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
                    <td><input type="text" name="vendor_id" size="35" maxlength="6" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">Barang Id</td>
                    <td><input type="text" name="barang_id" size="35" maxlength="6" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">Price</td>
                    <td><input type="text" name="price" size="35" maxlength="6" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td> </td>
                    <td><input class="btn btn-warning text-white" type="submit" name="Submit" value="Submit">
                        <a href="vendor.php" class="btn btn-danger">Cancel</a> </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
<?php include 'partials/footer.php' ?>