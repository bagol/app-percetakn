<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Product Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Produk</td>
						<td class="description">Deskripsi</td>
						<td class="price">Harga</td>
						<td class="quantity">ukuran</td>
						<td class="quantity">Kuantitas</td>
						<td class="total">Total</td>
						<td width="220px"></td>
					</tr>
				</thead>
				<tbody>
					<?php if($pesanan != null){ ?>
						<?php foreach ($pesanan as $p): ?>
							<tr>
								<td class="cart_product text-center">
									<a href=""><img src="<?=base_url("assets/images/pesanan/")?><?=cekPdf($p['file'])?>" alt="Gambar Produk" style="width: 100px;"></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?=$p['nama_produk']?></a></h4>
									<p>kode pesanan: <?=$p['kode_pesanan']?> </p>
								</td>
								<td class="cart_price">
									<p><?=rupiah($p["harga"])?></p>
								</td>
								<td class="cart_price">
									<p><?=$p['ukuran']?></p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<input class="cart_quantity_input" type="text" readonly name="quantity" value="<?=$p['kuantitas']?>" autocomplete="off" size="2">
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price"><?=rupiah($p['harga_total'])?></p>
								</td>
								<?php if($p['status'] === 'di pilih'){?>
									<td class="">
										<a class="btn btn-danger" href="<?=base_url("Pesanan/delete/")?><?=$p['kode_pesanan']?>"><i class="fa fa-times"></i> Batal</a>
										<a class="btn btn-success" href="<?=base_url("Web/checkout/")?><?=$p['kode_pesanan']?>"><i class="fa fa-check"></i> Periksa</a>
									</td>
								<?php }else if($p['status'] === 'di checkout'){ ?>
									<td>
										<a class="btn btn-danger" href="">
											<i class="fa fa-times"></i> hapus
										</a>
										<a class="btn btn-success" href="<?=base_url("web/pembayaran/")?><?=$p['kode_pesanan']?>">
											<i class="fa fa-check"></i> Bayar
										</a>
									</td>
								<?php }else if($p['status'] === 'di bayar'){ ?>
									<td>
										<small class="btn btn-primary">Menunggu Verifikasi admin</small>
									</td>
								<?php }else if($p['status'] === 'diproses'){ ?>
									<td>
										<small class="btn btn-primary">Pesanan Sedang diprosess</small>
									</td>
								<?php }else if($p['status'] === 'selesai'){ ?>
									<td>
										<small class="btn btn-success">Pesanan telah kami kirim. <br> trimakasih telah memilih layanan kami</small>
									</td>
								<?php } ?>
							</tr>
						<?php endforeach; ?>
					<?php }else{ ?>
						<tr>
							<td colspan="6" class="text-center"> Anda tidak memiliki barang dikeranjang </td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->


	