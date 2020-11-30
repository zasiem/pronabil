<?php include 'partials/header.php' ?>
<html>

<head>
    <title>FORM DATA PRODUCT VENDOR</title>
    <style type="text/css" media="screen">
        table {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
        }

        input {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
            height: 20px;
        }
    </style>
</head>

<body>
    <div style="border:0; padding:10px; width:760px; height:auto;">
        <form action="actioninputproduct.php" method="POST" name="form-input-data">
            <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr height="46">
                    <td width="10%"> </td>
                    <td width="25%"> </td>
                    <td width="65%">
                        <font color="orange" size="2">Form Input Data Product Vendor</font>
                    </td>
                </tr>

                <tr height="46">
                    <td> </td>
                    <td>Vendor Id</td>
                    <td><input type="text" name="vendor_id" size="35" maxlength="6" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>Barang Id</td>
                    <td><input type="text" name="barang_id" size="35" maxlength="6" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>Price</td>
                    <td><input type="text" name="price" size="35" maxlength="6" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td> </td>
                    <td><input type="submit" name="Submit" value="Submit">
                        <input type="reset" name="reset" value="Cancel"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
<?php include 'partials/footer.php' ?>