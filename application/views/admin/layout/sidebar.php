<ul class="nav navbar-nav">
  <li class="active">
    <a href="<?=base_url("admin")?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
  </li>
  <h3 class="menu-title">Prdouk</h3><!-- /.menu-title -->
  <li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-print"></i>Produk</a>
    <ul class="sub-menu children dropdown-menu">
      <li><i class="menu-icon fa fa-tag"></i><a href="<?=base_url("admin/kategori")?>">Kategori</a></li>
      <li><i class="menu-icon fa fa-desktop"></i><a href="<?=base_url("admin/Produk")?>">Produk</a></li>
    </ul>
  </li>
  <h3 class="menu-title">Transaksi</h3><!-- /.menu-title -->
  <li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Pesanan</a>
    <ul class="sub-menu children dropdown-menu">
      <li><i class="menu-icon fa fa-cloud-download"></i><a href="">Pesanan Masuk</a></li>
      <li><i class="menu-icon fa fa-check-circle-o"></i><a href="">Verifikasi Pesanan</a></li>
    </ul>
  </li>
  <li>
    <a href="widgets.html"> <i class="menu-icon fa fa-file"></i>Laporan</a>
  </li>

</ul>