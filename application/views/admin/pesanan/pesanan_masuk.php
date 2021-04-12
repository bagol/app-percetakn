<div class="row mt-4">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <strong class="card-title">Daftar Pesanan Masuk</strong>
      </div>
      <div class="card-body">
        <div class="table-responsive ">
          <table id="table_id" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Pesanan</th>
                <th>Harga Total</th>
                <th class="text-center" width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if($daftarPesanan){ ?>
             <?php $no=1; foreach ($daftarPesanan as $pesanan):?>
                <tr>  
                  <td><?=$no++?></td>
                  <td><?=$pesanan['nama_pelanggan']?></td>
                  <td>
                    <small> 
                      <b> <?=$pesanan['nama_produk']?> </b>
                      (kode pesnaan : <?=$pesanan['kode_pesanan']?>)
                  </small>
                  </td>
                  <td><?=rupiah($pesanan['harga_total'])?></td>
                  <td class="text-center">
                    <a class="btn btn-success " href="<?=base_url("admin/detail_pesanan/")?><?=$pesanan['kode_pesanan']?>"><i class="fa fa-eye"></i> Bukti</a>  
                  </td> 
                </tr> 
             <?php endforeach; }else{?>
              <tr>
                <td colspan="5" class="text-center"> Tidak ada Pesnan masuk</td>
              </tr>
             <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>