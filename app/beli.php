
<meta charset="utf-8">
<style type="text/css">
    .beli {
        margin: 100px auto;
        width: 400px;
        padding: 80px;
        border: 0px solid #ccc;
        background: lightblue;
    }
    input[type=text] {
        margin: 5px auto;
        width: 100%;
        padding: 10px;
    }
    .select {
      margin: 5px auto;
        width: 100%;
        padding: 10px;
    }
    input[type=submit] {
        margin 5px auto;
        padding: 5px;
        width: 90px;
        border: 1px solid #fff;
        color: #fff;
        background: red;
        cursor: pointer;
    }
</style>
<?php include 'partials/header.php' ?>

  <br>
  <?php
 include "connection.php";
  $id =  $_POST['custId'];
  $tampil = mysqli_query($con, "SELECT * from transactions_detail WHERE transaction_code='$id'") or die(mysqli_Error());
        while($data = mysqli_fetch_assoc($tampil)) :
   ?>
  <div class="card">
  <div class="card-header bg-primary text-white">
      Pembelian Barang Vendor
  </div>
  <div class="card-body">
    <form action="beli.php" method="GET">  
   <table class="table table-bordered table-striped">
   <tr>
         
        
          <th>Id Transaksi</th>
          <th>Id Vendor Produk</th>
          <th>Destinasi</th>
          <th>Status</th>
          <th>Dibuat oleh</th>
          <th>Diperbarui oleh</th>
        
  </tr>

  
  

  <tr>
          <td><?=$data['id']?></td>
          <td><?=$data['transaction_id']?></td>
          <td><?=$data['vendor_product_id']?></td>
          <td><?=$data['destination']?></td>
          <td><?=$data['status']?></td>
          <td><?=$data['created_at']?></td>
          <td><?=$data['updated_at']?></td>
         
         
  </tr>
     
        
      </table>

      </div>
</div>

  <div class="beli">
 
  <form method="POST">
  <select name="barang_id" id="barang_id"><br>
  <option value="" disabled selected>Pilih id vendor</option>

  <?php
  $sql=mysqli_query("SELECT * from vendor_products JOIN vendors ON vendors.id=vendor_products.vendor_id WHERE barang_id=".$data["barang_id"]);
  while ($data=mysqli_fetch_array($sql)) {
    ?>
  
<option value="" disabled><?=$data['name']?></option>
     
  

  <?php
  }
  ?> 
</select>
</form>
</div>
<br>
 <?php endwhile; ?>
   <center><input type="submit" name="Beli" value="submit"></center> 
</form>
</div>
</form>



<?php include 'partials/footer.php' ?>