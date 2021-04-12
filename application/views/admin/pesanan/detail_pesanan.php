
<div class="row">	
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header"><b>Detail Pesanan</b></div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6 col-sm-12">	
						<div class="card">	
							<div class="card-body">
								<h3>Pesanan</h3> <br>
								<div class="row">	
									<div class="col-sm-4">
										<figure class="figure">
										  <img src="<?=base_url('assets/images/pesanan/')?><?=cekPdf($detailPesanan['file'])?>" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
										  <figcaption class="figure-caption"><b><?=$detailPesanan['nama_produk']?></b></figcaption>
										</figure>
									</div>
									<div class="col-sm-8">
										<style>	
												#detail_pesanan tr td, 
												#detail_pesanan tr th
												{
													/*border:none;*/
													padding: 0;
												}
										</style>
										<table class="table" id="detail_pesanan">
											<tr>
												<th>Nama Produk</th>
												<td><?=$detailPesanan['nama_produk']?></td>
											</tr>
											<tr>	
												<th>Ukuran</th>
												<td><?=$detailPesanan['ukuran']?></td>
											</tr>
											<tr>	
												<th>Kuantitas</th>
												<td><?=$detailPesanan['kuantitas']?></td>
											</tr>		
											<tr>	
												<th>Harga Total</th>
												<td><?=$detailPesanan['harga_total']?></td>
											</tr>
											<tr>	
												<th>tanggal</th>
												<td><?=$detailPesanan['tanggal']?></td>
											</tr>		
											
										</table>
									</div>
								</div>	
							</div>	
						</div>	
					</div>
					<div class="col-md-6 col-sm-12">	
						<div class="card">
							<div class="card-body">	
								<h3>Pengiriman</h3> <br>
								<table class="table" id="detail_pesanan">	
									<tr>
										<th style="width: 30%;">Kota Pemesan</th>
										<td><?=city($detailPesanan['kota'])?></td>	
									</tr>
									<tr>
										<th>Alamat Pemesan</th>
										<td><?=$detailPesanan['alamat']?></td>	
									</tr>
									<tr>
										<th>Ekspedisi Pengiriman</th>
										<td><?=$detailPesanan['kurir']?></td>	
									</tr>
									<tr>
										<th>No Telpon</th>
										<td><?=$detailPesanan['no_telpon']?></td>	
									</tr>
								</table>	
							</div>	
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div class="col col-md-12 ">	
		<div class="card">	
			<div class="card-header"><b>Bukti Pembayaran</b></div>
			<div class="card-body">	
					<div class="row">
						<div class="col-sm-6 offset-md-3">
							<div class="card">
								<div class="card-body">
									<figure class="figure">
									  <img src="<?=base_url('assets/images/bukti/')?><?=cekPdf($detailPesanan['bukti'])?>" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure." width="500">
									  <figcaption class="figure-caption">Bukti Pembayaran</figcaption>
									</figure>
									<table class="table" id="detail_pesanan">
										<tr>
											<th>Transfer a/n</th>
											<td><?=$detailPesanan['atas_nama']?></td>
										</tr>
										<tr>
											<th>Nama Pelanggan</th>
											<td><?=$detailPesanan['nama_pelanggan']?></td>
										</tr>
									</table>
								</div>
								<div class="card-footer d-flex justify-content-end">
									<a href="<?=base_url("Pesanan/verifikasiPesanan/")?><?=$detailPesanan['kode_pesanan']?>" class="btn btn-success mr-2">Verifikasi</a>
									<a href="" class="btn btn-danger">Tolak</a>
								</div>
							</div>
						</div>
					</div>
			</div>	
		</div>		
	</div>	
</div>					