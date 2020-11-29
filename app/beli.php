<?php include 'partials/header.php' ?>

<form action="proses_beli.php" method="post">
  <input name="transaction_code" type="text" value="<?= $_GET['code'] ?>" hidden />
  <?php
  $code =  $_GET['code'];
  $gudangs = consume('https://warehouse-tubeseai.herokuapp.com/gudang');
  $tampil = mysqli_query($con, "SELECT * from transactions_detail WHERE transaction_code='$code'");
  while ($data = mysqli_fetch_assoc($tampil)) :
    $barang = consume('https://warehouse-tubeseai.herokuapp.com/barang/' . $data['barang_id']);
  ?>

    <input name="barang_id[]" type="text" value="<?= $data['barang_id'] ?>" hidden />
    <input name="transactions_detail_id[]" type="text" value="<?= $data['id'] ?>" hidden />
    <div class="card my-2">
      <div class="card-header bg-primary text-white">
        Pembelian Barang <?= $barang[0]['name'] ?>
      </div>
      <div class="card-body overflow-auto">
        <table class="table table-bordered table-striped">
          <tr>
            <th>Code Transaksi</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Dibuat oleh</th>
            <th>Diperbarui oleh</th>
          </tr>
          <tr>
            <td><?= $data['transaction_code'] ?></td>
            <td><?= $barang[0]['name'] ?></td>
            <td><?= $barang[0]['id'] ?></td>
            <td><?= $data['quantity'] ?></td>
            <td><?= $data['status'] ?></td>
            <td><?= $data['created_at'] ?></td>
            <td><?= $data['updated_at'] ?></td>
          </tr>
        </table>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="">Pilih Vendor</label>
          <select name="vendors[]" id="" class="form-control">
            <option value="">Pilih Vendor</option>
            <?php
            $barang_id = $barang[0]['id'];
            $query = mysqli_query($con, "SELECT * from vendor_products JOIN vendors ON vendors.id = vendor_products.vendor_id WHERE barang_id='$barang_id'");
            while ($vendor = mysqli_fetch_assoc($query)) :
            ?>
              <option value="<?= $vendor['id'] ?>"><?= $vendor['name'] ?> - <?= $vendor['price'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">Pilih Destinasi Gudang</label>
          <select name="gudangs[]" id="" class="form-control">
            <option value="">Pilih Gudang</option>
            <?php foreach ($gudangs as $gudang) : ?>
              <option value="<?= $gudang['id'] ?>"><?= $gudang['name'] ?> - <?= $gudang['location'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
  <?php endwhile; ?>

  <div class="text-center">
    <button type="submit" class="btn btn-warning w-50 mb-3 mx-auto text-center text-white">Beli Sekarang</button>
  </div>

</form>


<?php include 'partials/footer.php' ?>