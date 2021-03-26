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
                            <h2><?= $produk['nama_produk'] ?></h2>
                            <p>Kode Produk: <?= $produk['kode_produk'] ?></p>
                            <img src="<?= base_url("assets/template/") ?>images/product-details/rating.png" alt="" />
                            <p><b>Deskripsi Produk</b> : <?= $produk['deskripsi'] ?></p>
                            <br>
                            <div class="row ">
                                <div class="col col-sm-3">
                                    <b>Jenis Bahan </h4>
                                </div>
                                <div class="col col-sm-7">
                                    <select name="" id="" class="form-control">
                                        <?php foreach ($bahan as $b) : ?>
                                        <option value=""><?= $b['bahan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                </span>

                            </div>
                            <br>
                            <div>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Harga Bahan</th>
                                        <td>Rp.8.0000</td>
                                    </tr>
                                    <tr>
                                        <th>Satuan</th>
                                        <td>Meter</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col col-sm-3">
                                    <b>Kuantitas</b>
                                </div>
                                <div class="col col-sm-7">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->

                </div>
            </div>
        </div>
</section>