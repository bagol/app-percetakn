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
						<td></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="cart_product text-center">
							<a href=""><img src="<?=base_url("assets/images/produk/")?><?=$pesanan['gambar']?>" alt="Gambar Produk" style="width: 100px;"></a>
						</td>
						<td class="cart_description">
							<h4><a href=""><?=$pesanan['nama_produk']?></a></h4>
							<p>kode pesanan: <?=$pesanan['kode_pesanan']?> </p>
						</td>
						<td class="cart_price">
							<p><?=rupiah($pesanan["harga"])?></p>
						</td>
						<td class="cart_price">
							<p><?=$pesanan['ukuran']?></p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="<?=$pesanan['kuantitas']?>" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price"><?=rupiah($pesanan['harga_total'])?></p>
						</td>
						<td class="">
							<a class="btn btn-danger" href="<?=base_url("Pesanan/delete/")?><?=$pesanan['kode_pesanan']?>"><i class="fa fa-times"></i> Batal</a>
							<a class="btn btn-success" href="<?=base_url("Web/checkout/")?>"><i class="fa fa-check"></i> Beli</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

	