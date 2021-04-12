<section id="daftar_pesanan">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">Daftar Pesanan diterima dan ditolak</div>
			<div class="card-body table-responsive-sm">
				<table id="daftarPesananTable" class="table">
					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>kode Pesanan</th>
							<th>Nama Pelanggan</th>
							<th>Tanggal</th>
							<th>Harga Total</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						  $no=1; 
						  if($daftarPesanan){ 
                          foreach ($daftarPesanan as $pesanan):
						?>
						  <tr>
						  	<td><?=$no++?></td>
						  	<td><?= $pesanan['kode_pesanan'] ?></td>
						  	<td><?= $pesanan['nama_pelanggan'] ?></td>
						  	<td><?= $pesanan['tanggal'] ?></td>
						  	<td class="text-center"><?= rupiah($pesanan['harga_total']) ?></td>
						  	<td class="text-center">
						  		<?php if($pesanan['status'] == 'di proses'){ ?>
							  		<small class="bg-warning text-white btn "><?= $pesanan['status'] ?></small>
							  	<?php }else if($pesanan['status'] == 'di kirim'){ ?>
							  		<small class="bg-info text-white btn "><?= $pesanan['status'] ?></small>
							  	<?php }else if($pesanan['status'] == 'di tolak'){ ?>
							  		<small class="bg-danger text-white btn "><?= $pesanan['status'] ?></small>
							  	<?php }else if($pesanan['status'] == 'selesai'){?>
							  		<small class="bg-primary text-white btn "><?= $pesanan['status'] ?></small>
							  	<?php } ?>
						  	</td>
						  	<td class="text-center">
						  		<?php if($pesanan['status'] == 'di proses'){ ?>
						  			<a href="" class="btn btn-primary">kirim</a>
						  		<?php } ?>
						  		<a href="" class="btn btn-success"><i class="fa fa-eye"></i> Lihat</a>
						  	</td>

						  </tr>
						<?php endforeach; }else{ ?>
							<tr>
								<td colspan="7" class="text-center"> Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>