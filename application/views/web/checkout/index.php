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
                Tolong Lengkapi biodata anda anggar proses Pembelian lebih mudah, Klik <a href="#">Profile</a>
                untuk melengkapi biodata
            </p>
        </div>
        <!--/register-req-->
         <style>
            td {
                padding: 10px;
            }
        </style>
        <div class="shopper-informations" id="app">
            <form action="<?=base_url("Pesanan/beli/")?><?=$pesanan['kode_pesanan']?>" method="post">
              <div class="row">
                  <div class="col-sm-4">
                      <div class="shopper-info">
                          <p >Pesanan</p>
                          <div class="row">
                              <div class="col-sm-6">
                                   <figure>
                                      <img src="<?=base_url('assets/images/pesanan/')?><?=cekPdf($pesanan['file'])?>" alt="gambar pesanan<?= $pesanan['deskripsi'] ?>" width="100%">
                                  </figure>
                              </div>
                              <div class="col-sm-6" style="margin-top: 10px;">
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
                                  <select id="province" name="province" id="" class="form-control" v-model="provinceSelected" @change="handleProvince">
                                     <option v-for="p in provinces" :value="p.province_id" :data-provinsi="p.province" :key="p.province_id">{{p.province}}</option>
                                  </select>
                                  <label for="city">Kota</label> 
                                  <select name="kota" id="city" class="form-control" v-model="citySelected" @change="handleCity">
                                    <option value="0">Pilih Kota</option>
                                      <option v-for="c in city" :value="c.city_id" :data-kota="c.nama_kota">{{ c.type+' - '+c.nama_kota}}</option>
                                  </select>
                                  <label for="kecamatan">Kecamatan</label> 
                                  <input type="text" v-model="kecamatan" name="kecamatan" class="form-control">
                                  <label for="kelurahan">Kelurahan</label> 
                                  <input type="text" v-model="kelurahan" name="kelurahan" class="form-control">
                                  <label for="kode-pos">Kode Pos</label>
                                  <input type="text" v-model="kode_pos" name="kode_pos" id="kode-pos" placeholder="No Kode Post" class="form-control" >
                           </div>
                           <div class="form-two">
                                 <label for="alamat">Alamat</label>
                                 <textarea cols="30" rows="7" class="form-control" name="alamat" required>{{alamat}}</textarea>
                                 <label for="no_tlpn">No Telpon</label>
                                 <input type="text" v-model="no_tlpn" name="no_tlpn" id="no_tlpn" placeholder="No Kode Post" class="form-control" >
                                 <label for="Kurir">Jasa Pengiriman</label>
                                 <select name="pengiriman" class="form-control" v-model="ekspedisiSelected" @change="handleChange">
                                      <option value="0">Pilih Jasa Pengiriman</option>
                                      <option v-for="e in ekspedisi" :value="e.cost[0].value" :data-service="e.service" :data-etd="e.cost[0].etd">{{ `JNE (${e.service}) - ${e.cost[0].value} (${e.cost[0].etd} Hari)` }}</option>
                                 </select>
                           </div>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="bill-to">
                      <p >Total Tagihan</p>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Item</th>
                            <th> Jumlah</th>
                            <th>Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><?=$pesanan['nama_produk']?> (<?=$pesanan['ukuran']?>)</td>
                            <td>x<?=$pesanan['kuantitas']?></td>
                            <td><?=rupiah($pesanan['harga_total'])?></td>
                          </tr>
                          <tr v-if="hargaPengiriman != 0">
                            <td>{{ekspedisiService}}</td>
                            <td></td>
                            <td>{{hargaPengiriman}}</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="text-center"><b>Total</b></td>
                            <td v-if="hargaPengiriman != 0"> {{hargaTotal}} </td>
                            <td v-else><?=$pesanan['harga_total']?></td>
                          </tr>
                        </tbody>
                      </table>
                      <input type="hidden" name="harga_total" :value="hargaTotal">
                      <input type="hidden" name="berat" :value="weight">
                      <input type="hidden" name="kurir" :value="ekspedisiService">
                      <button :disabled="ekspedisiSelected < 1" type="submit" class="btn btn-success" style="width: 100%;">Bayar</button>
                    </div>
                  </div>          
              </div>
            <!-- </form> -->
        </div>
    </div>
</section>
<!--/#cart_items-->

<script src="<?=base_url("assets/js/vue.js")?>"></script>
<script>
    const vm = new Vue({
        el:"#app",
        data: {
          city: [], //kota per provinsi
          provinces: [],  //provinsi se indonesia
          citySelected:`<?=$user['kota']?>`, //kota yang dipilih
          provinceSelected:`<?=$user['provinsi']?>`, //provinsi yang dipilih
          ekspedisi:0, //jasa kirim 
          weight: `<?=$pesanan['total_berat']?>`, //berat produk yang dibeli
          ekspedisiSelected:0, // 
          ekspedisiService:"", //layanan expedisi yang dipilih
          hargaPengiriman:0, // harga pengiriman produk
          hargaTotal: 0, //harga total dari produk yang dibeli
          hargaBarang: parseInt(`<?=$pesanan['harga_total']?>`), // harga barang sebelum ditambah harga total
          kota:"", 
          propinsi:"",
          alamat:`<?=$user['alamat']?>`,
          kelurahan:`<?=$user['kelurahan']?>`,
          kecamatan: `<?=$user['kecamatan']?>`,
          kode_pos: `<?=$user['kode_pos']?>`,
          no_tlpn: `<?=$user['no_tlpn']?>`,
        },
        methods: {
          async getProvince(){
            const get = await fetch(`<?=base_url('CurlRajaOngkir/province')?>`);
            const response = await get.json();
            this.provinces = response;
          },
          async getCity(province){
            const get = await fetch(`<?=base_url('CurlRajaOngkir/city/')?>${province}`);
            const response = await get.json();
            this.city = response;
          },
          handleChange(e){
            this.ekspedisiService = `JNE ${e.target.options[e.target.selectedIndex].dataset.service}  (${e.target.options[e.target.selectedIndex].dataset.etd} Hari)`;
          },
          handleProvince(e){
            this.provinsi = e.target.options[e.target.selectedIndex].dataset.provinsi;
            console.log(this.provinsi);
          },
          handleCity(e){
            this.kota = e.target.options[e.target.selectedIndex].dataset.kota;
          }
          ,
          async getEkpedisi(destination,weight){
            const get = await fetch(`<?=base_url('CurlRajaOngkir/ongkir/')?>${destination}/${weight}`);
            const response = await get.json();
            const result = response.rajaongkir;
            if(result.status.code === 200){
             this.ekspedisi = result.results[0].costs;
            }
          }
        },
        updated(){
          this.getCity(this.provinceSelected);
        },
        beforeMount(){
          this.getProvince();
          this.getCity(this.provinceSelected);
        },
        mounted(){
          this.getEkpedisi(this.citySelected,this.weight);
        },
        created(){
          
        },
        watch:{
          provinceSelected(){
             this.getCity(this.provinceSelected);
          },
          citySelected(){
            console.log(this.citySelected.id)
            this.getEkpedisi(this.citySelected,this.weight)
          },
          ekspedisiSelected(){
            //this.alamat = this.provinsi + " " + this.kota;
            this.hargaPengiriman = this.ekspedisiSelected;
            this.hargaTotal = this.hargaBarang + this.hargaPengiriman;
          }
        }
    })
</script>