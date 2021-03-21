<button class="btn btn-primary" data-toggle="modal" data-target="#newProduk"><i class="fa fa-plus"></i> Tambah
    Produk</button>

<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Card with switch</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table id="table_produk" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Satuan</th>
                                <th>Gambar</th>
                                <th class="text-center" width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($daftarProduk as $produk): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$produk['nama_kategori']?></td>
                                <td><?=$produk['nama_produk']?></td>
                                <td><?=$produk['satuan']?></td>
                                <td class="text-center"><img
                                        src="<?=base_url("assets/images/produk/")?><?=$produk['gambar']?>"
                                        alt="<?=$produk['nama_produk']?> height=" 50px" width="39px"></td>
                                <td class="d-flex justify-content-around">
                                    <a class="btn btn-primary"
                                        href="<?=base_url("admin/detailProduk/")?><?=$produk['kode_produk']?>">
                                        <i class="fa fa-eye"></i> Lihat
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>