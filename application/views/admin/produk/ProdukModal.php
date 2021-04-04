<!-- produk Baru -->
<div class="modal fade" id="newProduk" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype='multipart/form-data' action="<?=base_url("Produk/addProduk")?>" method="post">
                <div class="modal-body px-4">
                    <!-- nama Produk -->
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama
                                Produk</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nama" name="nama_produk" placeholder="Produk...."
                                class="form-control">
                            <small class="form-text text-muted">Masukan Nama Produk beserta jenisnya</small>
                        </div>
                    </div>
                    <!-- Kategori produk -->
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="kategori" class=" form-control-label">Kategori</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($daftarKategori as $kategori): ?>
                                <option value="<?=$kategori['kode_kategori']?>"><?=$kategori['nama_kategori']?>
                                </option>
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
                                <option value="">Pilih Satuan</option>
                                <option>meter</option>
                                <option>lembar</option>
                            </select>
                        </div>
                    </div>
                    <!-- gambar produk -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="gambar" class=" form-control-label">Gambar Produk</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="gambar" name="gambar_produk" class="form-control-file">
                        </div>
                    </div>
                    <!-- bagian bahan -->
                    <div class="col-md-12">
                        <div class="d-sm-flex justify-content-between">
                            <h5>Bahan Produk</h5>
                            <button type="button" class="btn btn-primary" id="add"><i class="fa fa-plus"></i></button>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-12" id="bahan">
                        <div class="row form-group bahan-item">
                            <div class="col col-sm-2">
                                <Label>Bahan</Label>
                            </div>
                            <div class="col col-sm-3">
                                <input type="text" name="nama_bahan[]" placeholder="Jenis..." class="form-control">
                            </div>
                            <div class="col col-sm-2">
                                <input type="text" name="berat[]" placeholder="Berat/grm" class="form-control">
                            </div>
                            <div class="col col-sm-3">
                                <input type="number" name="harga[]" placeholder="Harga..." class="form-control">
                            </div>
                            <div class="col col-sm-2">
                                <button class="btn btn-secondary delete" onclick="del(this)"><i
                                        class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- script for -->
<script>
const add = document.querySelector("#add");
const bahan = document.querySelector("#bahan");
const item = `
    <div class="row form-group bahan-item">
        <div class="col col-sm-2">
            <Label>Bahan</Label>
        </div>
        <div class="col col-sm-3">
            <input type="text" name="nama_bahan[]" placeholder="Jenis..." class="form-control">
        </div>
        <div class="col col-sm-2">
            <input type="text" name="berat[]" placeholder="Berat/grm" class="form-control">
        </div>
        <div class="col col-sm-3">
            <input type="number" name="harga[]" placeholder="Harga..." class="form-control">
        </div>
        <div class="col col-sm-2">
            <button class="btn btn-secondary delete" onclick="del(this)"><i class="fa fa-minus"></i></button>
        </div>
    </div>
`;
add.addEventListener("click", () => {
    bahan.insertAdjacentHTML("beforeend", item);
})

const del = (event) => {
    const itemm = event.parentElement;
    const item = itemm.parentElement;
    item.remove();
}
</script>