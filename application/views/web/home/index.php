<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Dream</span>-Printing</h1>
                                <h2>Banner Indoor & Outdoor</h2>
                                <p>Cetak Banner anda sesuai keinginan anda dengan harga yang terjangkau dan kualiat terbaik</p>
                                <button type="button" class="btn btn-default get">Pesan</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?= base_url('assets') ?>/images/banner/cetak_banner.jfif"
                                    class="girl img-responsive" width="441" height="484" alt="Banner" />
                                <!-- <img src="<?= base_url('assets/template') ?>/images/home/pricing.png" class="pricing"
                                    alt="" /> -->
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Dream</span>-Printing</h1>
                                <h2>Stiker</h2>
                                <p>Yuuk !!! Cetak Stiker Kalian di dream-printing murah dan kuat loooohhh. di Dream-Printing Stiker kamu yang lucu lucu bisa di cetak jadi banyak </p>
                                <button type="button" class="btn btn-default get">Pesan</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?= base_url('assets') ?>/images/banner/stiker.webp"
                                    class="girl img-responsive" width="441" height="484" alt="Banner" />
                                <!-- <img src="<?= base_url('assets/template') ?>/images/home/pricing.png" class="pricing"
                                    alt="" /> -->
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Dream</span>-Printing</h1>
                                <h2>Stiker</h2>
                                <p>nggk cuma cetak banner dan stiker loh !!!. Dream-Printing juga bisa bantuin kamu yang mau bikin merchandise buat komunitas kamu dan bisa juga buat souvenir nikahan mantan juga hehehe. jangan lupa klik pesan</p>
                                <button type="button" class="btn btn-default get">Pesan</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?= base_url('assets') ?>/images/banner/mechendise.jpg"
                                    class="girl img-responsive" width="441" height="484" alt="Banner" />
                                <!-- <img src="<?= base_url('assets/template') ?>/images/home/pricing.png" class="pricing"
                                    alt="" /> -->
                            </div>
                        </div>
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <!-- sidebar -->
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products kategori-sidebar" id="accordian">
                        <!--category-productsr-->

                    </div>

                    <!--/price-range-->

                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="<?= base_url('assets') ?>/images/banner/side.jpg" alt="side banner" />
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <!-- main page -->
            <div class="col-sm-9 padding-right" id="produk">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?php foreach ($daftarProduk as $produk) : ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="<?= base_url('assets/images/produk/') ?><?= $produk['gambar'] ?>"
                                        alt="image produk <?= $produk['nama_produk'] ?>"
                                        style="min-height: 250px; max-height:250px;" />
                                    <h2><?= rupiah($produk['harga']) ?></h2>
                                    <p><?= $produk['nama_produk'] ?></p>
                                    <a href="<?= base_url('web/produk_detail/') ?><?= $produk["kode_produk"] ?>"
                                        class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>tambah ke
                                        keranjang</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2><?= rupiah($produk['harga']) ?></h2>
                                        <p><?= $produk['nama_produk'] ?></p>
                                        <a href="<?= base_url('web/produk_detail/') ?><?= $produk["kode_produk"] ?>"
                                            class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>tambah ke keranjang
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!--features_items-->

                <?php if ($rekomendasi > 0) : ?>
                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= base_url('assets/template') ?>/images/home/recommend1.jpg"
                                                    alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= base_url('assets/template') ?>/images/home/recommend2.jpg"
                                                    alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= base_url('assets/template') ?>/images/home/recommend3.jpg"
                                                    alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= base_url('assets/template') ?>/images/home/recommend1.jpg"
                                                    alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= base_url('assets/template') ?>/images/home/recommend2.jpg"
                                                    alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= base_url('assets/template') ?>/images/home/recommend3.jpg"
                                                    alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <?php endif; ?>
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>