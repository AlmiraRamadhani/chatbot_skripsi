<?php include 'header.php'; ?>

<?php

// koneksi database
include '../koneksi.php';
?>
<div class="container">
	<div class="panel">
		<div class="panel-heading">
			<h4>Transaksi Baru</h4>
		</div>
		<div class="panel-body">



			<div class="col-md-8 col-md-offset-2">
				<a href="transaksi.php" class="btn btn-sm btn-info pull-right">Kembali</a>
				<br />
				<br />
				<form method="post" action="transaksi_aksi.php">
					<div class="form-group">
						<label>Pelanggan</label>
						<select class="form-control" name="id_cust" required="required">
							<option value="">- Pilih Pelanggan</option>
							<?php
							// mengambil data pelanggan dari database
							$data = mysqli_query($koneksi, "select * from tb_customer");
							// mengubah data ke array dan menampilkannya dengan perulangan while
							while ($d = mysqli_fetch_array($data)) {
							?>
								<option value="<?php echo $d['customer_id']; ?>"><?php echo $d['customer_name']; ?></option>
							<?php
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label>Tanggal Pinjam</label>
						<input type="date" class="form-control" name="fdate" required="required">
					</div>

					<div class="form-group">
						<label>Tgl. Selesai</label>
						<input type="date" class="form-control" name="ldate" required="required">
					</div>

					<br>

					<table class="table table-bordered table-striped" id="tbl_barang" onsubmit="return false">
						<thead>
							<tr>
								<th width="40%">Nama Barang</th>
								<!-- <th width="30%">Lama Pinjam</th> -->
								<!-- <th>Proses</th>
								<th width="20%">Harga</th> -->
								<th width="10%">Jumlah</>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<select name="barang[]" class="form-control select-barang" required>
										<?php
										$dataBarang = mysqli_query($koneksi, "SELECT * FROM tb_product");
										while ($db = mysqli_fetch_array($dataBarang)) {
										?>
											<option value="<?= $db['product_id']; ?>"><?= $db['product_name']; ?></option>
										<?php } ?>
									</select>
								</td>
								<!-- <td>
									<select name="select1" id="select1" class="form-control select-harga" required>
										<option value"owp">Satu Minggu</option>
										<option value"twp">Dua Minggu</option>
										<option value"omp">Satu Bulan</option>
									</select>
								</td> -->
								<!-- <td><input type="submit" value="PROSES" onclick="tampilkan()"></td>
								<td>
									<p id="container"></p>
								</td> -->
								<td><input type="number" name="quantity" id="quantity" class="form-control"></td>
							</tr>
						</tbody>
					</table>
					<button type="button" name="add" id="add" class="btn btn-sm btn-success float-right">
						<i class="fas fa-fw fa-plus"></i> Tambah Barang
					</button>
					<br />
					<!-- 
					<input type="submit" class="btn btn-primary" value="Simpan"> -->
				</form>

			</div>

		</div>
	</div>
</div>

<?php include 'footer.php'; ?>

<!-- <script>
	function tampilkan() {

		var kategori = document.getElementById("tbl_barang").select1.value;
		var p_kontainer = document.getElementById("container");

		if (kategori == "owp") {
			p_kontainer.innerHTML = <?php $dataBarang = mysqli_query($koneksi, "SELECT product_owp FROM tb_product where product_id=product_owp"); ?>;
		} else if (kategori == "twp") {
			p_kontainer.innerHTML = "Bandung kota kembang";
		} else if (kategori == "omp") {
			p_kontainer.innerHTML = "Bogor kota hujan";
		}
	}
</script> -->