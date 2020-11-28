
<?php include 'partials/header.php' ?>
  <br>
 
  <div class="card">
  <div class="card-header bg-primary text-white">
      Transaksi
  </div>
  <div class="card-body">
      
   <table class="table table-bordered table-striped">
   <tr>
          <th>id</th>
          <th>Kode</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Jumlah</th>
          <th>Status</th>
          <th>Tanggal transaksi</th>
          <th>Update tanggal transaksi</th>
          <th>Dibuat oleh</th>
          <th>Diperbarui oleh</th>
          <th>Action</th>
  </tr>

  <?php 
        $tampil = mysqli_query($con, "SELECT * from transactions");
        while($data = mysqli_fetch_assoc($tampil)) :
   ?>

  <tr>
          <td><?=$data['id']?></td>
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
            <a href="kirim" class="btn btn-warning" style="width: 65px">Kirim</a>
            <br>
            <br>
            <a href="beli" class="btn btn-danger" style="width: 65px">Beli</a>
          </td>
  </tr>
      <?php endwhile; ?>
        
      </table>

      </div>
</div>

<?php include 'partials/footer.php' ?>