<?php include 'partials/header.php' ?>
    <br>
    <div class="card">
  <div class="card-header bg-primary text-white">
      Form data vendor
  </div>

  <div class="card-body">

    <div style="border:0; padding:10px; width:760px; height:auto;">
        <form action="actioninput.php" method="POST" name="form-input-data">
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
                    <td><input type="text" name="name" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">Rating</td>
                    <td><input type="text" name="rating" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">address</td>
                    <td><input type="text" name="address" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">phone</td>
                    <td><input type="text" name="phone" size="20" maxlength="12" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td style="font-weight: bold">email</td>
                    <td><input type="text" name="email" size="20" maxlength="12" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td> </td>
                    <td><input class="btn btn-primary text-white" type="submit" name="Submit" value="Submit">
                        <input class="btn btn-warning text-white" type="reset" name="reset" value="Cancel"></td>

                </tr>
            </table>
        </form>
    </div>
</div>
</div>

<?php include 'partials/footer.php' ?>