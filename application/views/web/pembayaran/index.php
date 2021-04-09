<section id="pembayaran">
	<div class="container">
		<div class="row">
			<div class="col col-md-6">
				<figure>
					<img src="<?=base_url("assets/images/pesanan/")?><?=$pesanan['file']?>" alt="Gambar Pesanan" width="100%">
					<figcaption><b><?=$pesanan['nama_produk']?></b></figcaption>
				</figure>
			</div>
			<div class="col col-md-6">
				<table class="table">
					<tr>
						<th colspan="2" class="text-center">Detail Pesanan</th>
					</tr>
					<tr>
						<th>Nama Produk</th>
						<td>
							<div>
								<b><?=$pesanan['nama_produk']?></b> 
								<br>
								kode pesanan : <?=$pesanan['kode_pesanan']?>
							</div>
						</td>
					</tr>
					<tr>
						<th>Tanggal pesanan</th>
						<td><?=$pesanan['tanggal']?></td>
					</tr>
					<tr>
						<th>Ukuran Peroduk</th>
						<td><?=$pesanan['ukuran']?></td>
					</tr>
					<tr>
						<th>Kuantitas</th>
						<td><?=$pesanan['kuantitas']?></td>
					</tr>
					<tr>
						<th>Jasa Pengiriman</th>
						<td><?=$pengiriman['kurir']?></td>
					</tr>
					<tr>
						<th>Alamat Pemesan</th>
						<td><?=$pengiriman['alamat']?></td>
					</tr>
					<tr>
						<th>Total Harga</th>
						<td><?=rupiah($pesanan['harga_total'])?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>

<section id="form-pembayaran">
	<div class="container">
		<div class="row">
			<form action="<?=base_url('Pesanan/uploadBukti/')?><?=$pesanan['kode_pesanan']?>" method="post" enctype="multipart/form-data">
				<div class="col-md-4 col-md-offset-4" style="border: 1px #ccc solid; padding: 20px">
					<label for="nama">Nama Pengirim</label>
					<input type="text" name="nama" id="nama" class="form-control">
					<label >Upload Bukti Transfer</label><br>
					<input type="file" name="bukti" id="bukti" class="form-control" accept=".jpg , .png" required="">
					<button type="submit" class="btn btn-primary" style="width:100%;">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</section>