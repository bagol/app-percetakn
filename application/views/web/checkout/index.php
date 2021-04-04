<section id="cart_items">
    <div class="container" style="margin-bottom: 10px;">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div>
        <!--/breadcrums-->
        <div class="register-req">
            <p>
                Tolong Lengkapi biodata anda anggar proses pengiriman lebih mudah, Klik <a href="#">Profile</a>
                untuk melengkapi biodata
            </p>
        </div>
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-6">
                    <div class="shopper-info">
                        <p >Pesanan</p>
                        <div class="row">
                            <div class="col-sm-6">
                                 <figure>
                                    <img src="<?=base_url('assets/images/pesanan/')?><?=$pesanan['file']?>" alt="gambar pesanan<?= $pesanan['deskripsi'] ?>" width="100%">
                                </figure>
                            </div>
                            <div class="col-sm-6" style="margin-top: 10px;">
                                <style>
                                    td {
                                        padding: 10px;
                                    }
                                </style>
                                <table width="100%" class="table table-bordered">
                                    <tr>
                                        <th>No Pesanan</th>
                                        <td><?=$pesanan['kode_pesanan']?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <td><?=$pesanan['nama_produk']?></td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td><?=rupiah($pesanan['harga'])?></td>
                                    </tr>
                                    <tr>
                                        <th>Ukuran</th>
                                        <td><?=$pesanan['ukuran']?></td>
                                    </tr>
                                    <tr>
                                        <th>Kuantitas</th>
                                        <td><?=rupiah($pesanan['harga_total'])?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pesanan</th>
                                        <td><?=$pesanan['tanggal']?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="bill-to">
                        <p>Pengiriman</p>
                         <div class="form-one">
                            <form>
                                <label for="province">Provinsi</label>
                                <select id="province" name="province" id="" class="form-control">
                                   <option value="0">Pilih Provisi</option>
                                </select>
                                <label for="city">Kota</label> 
                                <select name="" id="city" class="form-control">
                                    <option value="0">Pilih Kota</option>
                                </select>
                                    <label for="kecamatan">Kecamatan</label> 
                                <select name="kecamatan" id="kecamatan" class="form-control">
                                   <option value="0">Pilih Kecamatan</option>
                                </select>
                                <label for="kelurahan">Kelurahan</label> 
                                <select name="" id="kelurahan" class="form-control">
                                   <option value="0">Pilih Kelurahan</option>
                                </select>
                                    <label for="kode-pos">Kode Pos</label>
                                <input type="text" name="kode-pos" id="kode-pos" placeholder="No Kode Post" class="form-control" >
                            </form>
                        </div>
                        <div class="form-two">
                           
                               <label for="alamat">Alamat</label>
                               <textarea name="" id="" cols="30" rows="10" class="form-control">Maukan alamat dengan lengkap Nama jalan No.rumah 
                               </textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    
                </div>
               <!--  <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Informasi Pembeli</p>
                        <form>
                            <input type="text" placeholder="Display Name">
                            <input type="text" placeholder="User Name">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm password">
                        </form>
                        <a class="btn btn-primary" href="">Get Quotes</a>
                        <a class="btn btn-primary" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Company Name">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="Title">
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Address 1 *">
                                <input type="text" placeholder="Address 2">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form>
                        </div>
                    </div>
                </div> -->            
            </div>
        </div>
    </div>
</section>
<!--/#cart_items-->