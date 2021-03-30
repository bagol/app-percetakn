<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products kategori-sidebar" id="accordian">
                        <!--category-productsr-->

                    </div>
                    <!--/category-products-->



                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?= base_url("assets/images/produk/") ?><?= $produk['gambar'] ?>"
                                alt="Gambar untuk produk <?= $produk['nama_produk'] ?>" />
                            <h3>Best</h3>
                        </div>


                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <!--/product-information-->
                            <br>
                            <h2>
                                <?= $produk['nama_produk'] ?>
                                <input type="hidden" name="kode_produk" value="<?= $produk['kode_produk'] ?>"
                                    id="kode_produk">
                            </h2>
                            <p>Kode Produk: <?= $produk['kode_produk'] ?></p>
                            <img src="<?= base_url("assets/template/") ?>images/product-details/rating.png" alt="" />
                            <p><b>Deskripsi Produk</b> : <?= $produk['deskripsi'] ?></p>
                            <br>
                            <form action="<?= base_url("Pesanan/test") ?>" method="post">
                                <div id="app">
                                    <div class="row ">
                                        <div class="col col-sm-3">
                                            <b>Jenis Bahan </h4>
                                        </div>
                                        <div class="col col-sm-7">
                                            <select name="bahan" class="form-control" @change="handleChange">
                                                <template v-for="b in bahan">
                                                    <option :data-harga="b.harga">{{b.bahan}}
                                                    </option>
                                                </template>
                                            </select>
                                        </div>
                                        </span>
                                    </div>
                                    <br>
                                    <!-- table -->
                                    <div class="row">
                                        <div class="col col-md-11">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Harga Bahan</th>
                                                    <td id="harga-bahan">{{rupiah(harga)}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Satuan</th>
                                                    <td>{{satuan}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row" style="margin:0 0 10px 0;">
                                        <div class="col col-md-3 text-left"
                                            style="padding:0 !important; text-align:left;">
                                            <p>Size</p>
                                        </div>
                                        <div class="col col-md-7 row" style="padding:0 !important;">

                                            <div class="col col-md-6"
                                                style="margin:0 !important; padding:0 5px 0 0 !important;">
                                                <input type="number" name="lebar" v-model="lebar" class="form-control"
                                                    placeholder="Lebar" min="1">
                                            </div>
                                            <div class="col col-md-6" style="margin:0 !important;padding:0 !important;">
                                                <input type="number" v-model="tinggi" class="form-control"
                                                    placeholder="tinggi" name="tinggi" min="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-11 row">
                                            <div class="col col-sm-3">
                                                Kuantitas
                                            </div>
                                            <div class="col col-sm-8" style="padding: 0;">
                                                <input type="number" v-model="kuantitas" name="kuantitas"
                                                    placeholder="berapa banyak " class="form-control" min="1">
                                            </div>
                                        </div>
                                    </div>
                                    <template v-if="total != 0">

                                        <div class="row" style="margin-top:10px;">
                                            <div class="col col-md-11">
                                                <div class="alert alert-success " role="alert">
                                                    <strong>Total Pesanan anda
                                                    </strong> {{rupiah(total)}}
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <div class="row" style="margin-top:10px;">
                                        <div class="col col-md-11">
                                            <input type="hidden" name="total" :value="total">
                                            <button type="submit" id="btn-submit" class="btn btn-warning"
                                                :disabled="disabled"
                                                style="width:100%;padding:0;line-height:0 !important;">

                                                <h3 style="margin: 0; padding:0; display:inline;"><span
                                                        class="glyphicon glyphicon-shopping-cart"
                                                        aria-hidden="true"></span>
                                                    Masukan Ke Keranjang
                                                </h3>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->

                </div>
            </div>
        </div>
</section>

<script src="<?= base_url("assets/js/") ?>vue.js"></script>
<script>
const vm = new Vue({
    el: "#app",
    data: {
        bahan: <?= json_encode($bahan) ?>,
        harga: <?= $bahan[0]->harga ?>,
        satuan: `<?= $produk['satuan'] ?>`,
        lebar: "",
        tinggi: "",
        total: 0,
        kuantitas: "",
        disabled: true
    },
    methods: {
        handleChange(e) {
            if (e.target.options.selectedIndex > -1) {
                this.harga = e.target.options[e.target.options.selectedIndex].dataset.harga
            }
        },
        rupiah(uang) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(uang)
        },
        getDisabled() {
            if (this.total == 0) return this.disabled = true;
            this.disabled = false;
        }
    },
    watch: {
        lebar() {
            this.total = (this.lebar * this.tinggi) * this.harga * this.kuantitas;
            this.getDisabled();
        },
        tinggi() {
            this.total = (this.lebar * this.tinggi) * this.harga * this.kuantitas;
            this.getDisabled();
        },
        kuantitas() {
            this.total = (this.lebar * this.tinggi) * this.harga * this.kuantitas;
            this.getDisabled();
        },
    }
})
</script>