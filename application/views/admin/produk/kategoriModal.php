<!-- Kategori Baru -->
<div class="modal fade" id="newKategori" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="smallmodalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col col-md-12">
            <form action="<?=base_url('Produk/createKategori')?>" method="post">
              <div class="input-group">
                <input type="text" id="input2-group2" name="kategori" placeholder="Masukan Kategori baru" class="form-control">
                <div class="input-group-btn"><button type="submit" class="btn btn-primary">Simpan</button></div>

              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<!-- modal delete kategori -->
<?php foreach ($daftarKategori as $delete): ?>
  <div class="modal fade" id="delete<?=$delete['kode_kategori']?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="smallmodalLabel">Hapus Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Apa anda yakin ingin menghapus kategori <b><em><?=$delete['nama_kategori']?></em></b> ?
          </p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" href="<?=base_url("Produk/deleteKategori")?>/<?=$delete['kode_kategori']?>">Iya</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach;?>

<!-- modal edit kategori -->

<?php foreach ($daftarKategori as $edit): ?>
  <div class="modal fade" id="edit<?=$edit['kode_kategori']?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="smallmodalLabel">ubah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col col-md-12">
              <form action="<?=base_url('Produk/editKategori')?>/<?=$edit['kode_kategori']?>" method="post">
                <div class="input-group">
                  <input type="text" id="input2-group2" name="kategori" value="<?=$edit['nama_kategori']?>" class="form-control">
                  <div class="input-group-btn"><button type="submit" class="btn btn-primary">Simpan</button></div>

                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
<?php endforeach;?>