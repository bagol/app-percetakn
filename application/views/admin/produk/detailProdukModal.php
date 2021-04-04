<!-- modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Hapus Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghaspu (<em><?=$produk[0]['nama_produk']?></em>) dari daftar Produk</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="<?=base_url("Produk/deleteProduk/")?><?=$produk[0]['kode_produk']?>"
                    class="btn btn-primary">Iya</a>
            </div>
        </div>
    </div>
</div>

<!-- modal Tambah Bahan -->
<div class="modal fade" id="addBahan" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Tambah Bahan Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url("Produk/createBahan/")?><?=$produk[0]['kode_produk'] ?>" method="post">
                <div class="modal-body">

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="bahan" class=" form-control-label">Nama Bahan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="bahan" name="bahan" placeholder="Jenis Bahan..."
                                class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="berat" class=" form-control-label">Berat Bahan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" min="1" id="berat" name="berat" placeholder="Berat bahan per gram"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="lebar" class=" form-control-label">Lebar Bahan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" min="1" id="lebar" name="lebar" placeholder="Lebar bahan per cm"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="panjang" class=" form-control-label">Panjang Bahan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" min="1" id="panjang" name="panjang" placeholder="Panjang bahan per cm"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="harga" class=" form-control-label">Harga Bahan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="harga" name="harga" placeholder="Harga Bahan..."
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-primary">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- modal ubah produk -->
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Perbaharui Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data"
                action="<?=base_url("Produk/updateProduk/")?><?=$produk[0]['kode_produk']?>" method="POST">
                <div class="modal-body">
                    <!-- nama Produk -->
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama
                                Produk</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nama" name="nama_produk" value="<?=$produk[0]['nama_produk']?>"
                                placeholder="Produk...." class="form-control">
                            <small class="form-text text-muted">Masukan Nama Produk beserta jenisnya</small>
                        </div>
                    </div>
                    <!-- Kategori produk -->
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="kategori" class=" form-control-label">Kategori</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="kategori" id="kategori" class="form-control">
                                <?php foreach ($kategori as $k): ?>
                                <option value="<?=$k['kode_kategori']?>"
                                    <?=$k["kode_kategori"]===$produk[0]['kode_kategori']?'selected':'';?>>
                                    <?=$k['nama_kategori']?> </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <!-- Satuan Produk -->
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="satuan" class=" form-control-label">Satuan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="satuan" id="satuan" class="form-control">
                                <option <?=$produk[0]['satuan']==='meter'?'selected':''?>>meter</option>
                                <option <?=$produk[0]['satuan']==='lembar'?'selected':''?>>lembar</option>
                            </select>
                        </div>
                    </div>
                    <!-- gambar produk -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="gambar" class=" form-control-label">Gambar Produk</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <label for="gambar" class="btn btn-success">Gambar</label>
                            <input type="file" id="gambar" style="visibility:hidden;" name="gambar_produk"
                                class="form-control-file">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12">
                            <div class="container">

                                <img class="img-thumbnail" id="preview"
                                    src="<?=base_url("assets/images/produk/")?><?=$produk[0]['gambar']?>"
                                    alt="Gambar <?=$produk[0]["nama_produk"]?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
const gambar = document.querySelector("#gambar");
const preview = document.querySelector("#preview");
console.log(gambar.value);
gambar.addEventListener("change", () => {
    preview.src = URL.createObjectURL(gambar.files[0]);
    console.log(preview.src);
    preview.onload = () => {
        URL.revokeObjectURL(preview.src);
    }
})
</script>