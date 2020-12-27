
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
      Transaksi
  </div>

  <form action="beli.php" method="POST">

  <div class="card-body">

   <table class="table table-bordered table-striped">
   <tr style="text-align: center">
          <th>id</th>
          <th>Kode</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Jumlah</th>
          <th>Status</th>
          <th>Transaksi</th>
          <th>Update tanggal</th>
          <th>Dibuat oleh</th>
          <th>Diperbarui oleh</th>
          <th>Action</th>
  </tr>

  <?php 
        $tampil = mysqli_query($con, "SELECT * from transactions");
        while($data = mysqli_fetch_assoc($tampil)) :
   ?>

  <tr>
          <td><?=$data['id']?> </td>
          <td><?=$data['code']?></td>
          <td><?=$data['name']?></td>
          <td><?=$data['description']?></td>
          <td><?=$data['amount']?></td>
          <td><?=$data['status']?></td>
          <td><?=$data['created_at']?></td>
          <td><?=$data['updated_at']?></td>
          <td><?=$data['created_by']?></td>
          <td><?=$data['updated_by']?></td>
          <td>

            <?php
            echo '<a href="proses-kirim.php?id='. $data['id'] .'" class="btn btn-warning text-white" name="bkirim" style="width: 65px">Kirim</a>'
            ?>
            <br>
            <br>
            <?php
            echo '<a href="beli.php?code='. $data['code'] .'" class="btn btn-primary text-white" name="bbeli" style="width: 65px">Beli</a>'
            ?>
          </td>
  </tr>
      <?php endwhile; ?>
        
      </table>
      
      </div>

      </form>
      
</div>

<?php include 'partials/footer.php' ?>