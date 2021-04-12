<button class="btn btn-primary" data-toggle="modal" data-target="#newKategori"><i class="fa fa-plus"></i> Tambah Kategori</button>

<div class="row mt-4">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <strong class="card-title">Daftar Kategori</strong>
      </div>
      <div class="card-body">
        <div class="table-responsive ">
          <table id="table_id" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th class="text-center" width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($daftarKategori as $kategori) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $kategori['nama_kategori'] ?></td>
                  <td class="text-center">
                    <button class="btn btn-success" data-toggle="modal" data-target="#edit<?= $kategori['kode_kategori'] ?>"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $kategori['kode_kategori'] ?>"><i class="fa fa-trash"></i></button>

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