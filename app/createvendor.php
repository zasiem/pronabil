<?php include 'partials/header.php' ?>
<html>

<head>
    <title>FORM DATA VENDOR</title>
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
        <form action="actioninput.php" method="POST" name="form-input-data">
            <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr height="46">
                    <td width="10%"> </td>
                    <td width="25%"> </td>
                    <td width="65%">
                        <font color="orange" size="2">Form Input Data Vendor</font>
                    </td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>Name</td>
                    <td><input type="text" name="name" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>Rating</td>
                    <td><input type="text" name="rating" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>address</td>
                    <td><input type="text" name="address" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>phone</td>
                    <td><input type="text" name="phone" size="20" maxlength="12" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>email</td>
                    <td><input type="text" name="email" size="20" maxlength="12" /></td>
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