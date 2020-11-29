<?php include 'partials/header.php' ?>

<!-- ngoding dibawah sini -->

<?php
$query = "SELECT * FROM transactions_detail WHERE status = 'arrived'";
$result = mysqli_query($con, $query);
?>

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <h1 class="text-center">Form Pelaporan Good Receipt</h1>
            <form action="good_receipt_process.php" method="post">
                <div class="form-group">
                    <label for="">Code Barang</label>
                    <select name="transaction_detail" class="form-control">
                        <?php while ($transaction = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?= $transaction['id'] ?>"><?= $transaction['transaction_code'] . " - " . $transaction['barang_id'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary w-100">Laporkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ngoding diatas sini -->

<?php include 'partials/footer.php' ?>