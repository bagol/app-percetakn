<div class="card">
    <div class="card-header">
        <strong class="card-title">Detail Produk</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col col-3">
                <figure class="figure">
                    <img src="<?=base_url("assets/images/produk/")?><?=$produk[0]['gambar']?>"
                        alt="gambar <?=$produk[0]['nama_produk']?>" class="img-fluid">
                    <figcaption class="figure-caption text-center">gambar <?=$produk[0]['nama_produk']?></figcaption>
                </figure>
            </div>
            <div class="col col-9">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th class="py-2">Nama Produk</th>
                            <td><?=$produk[0]['nama_produk']?></td>
                        </tr>
                        <tr>
                            <th class="py-2">Kategori Produk</th>
                            <td><?=$produk[0]['nama_kategori']?></td>
                        </tr>
                        <tr>
                            <th class="py-2">Satuan</th>
                            <td><?=$produk[0]['satuan']?></td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <div class=" d-flex justify-content-around" width="100%">
                                    <b class="text-dark">Bahan Produk</b>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addBahan"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table id="bahan" class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Bahan</th>
                                            <th>Harga</th>
                                            <th>Akasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($bahan) < 1){?>
                                        <tr>
                                            <td colspan="4" class="text-center text-danger">Tidak Ada Data</td>
                                        </tr>
                                        <?php }else{ $no = 1; foreach($bahan as $b): ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td class="py-2"><?=$b['bahan']?></td>
                                            <td><?=$b['harga']?></td>
                                            <td><a href="<?=base_url("Produk/deleteBahan/")?><?=$b['kode_bahan']?>"
                                                    class="btn btn-danger"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                        <?php endforeach; } ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-between ">
        <a class="btn btn-primary" href="<?=$_SERVER['HTTP_REFERER']?>"><i class="fa fa-arrow-left"></i> Ubah Produk</a>
        <div>
            <button class="btn btn-success"><i class="fa fa-edit"></i> Ubah Produk</button>
            <button class="btn btn-danger" data-toggle="modal" data-target="#hapusModal"><i class="fa fa-trash"></i>
                Hapus Produk</button>
        </div>
    </div>
</div>