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

<!-- modal Hapus -->
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
                        <div class="col col-md-3"><label for="harga" class=" form-control-label">Harga Bahan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="harga" name="harga" placeholder="Harga Bahan..."
                                class="form-control">
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