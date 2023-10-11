<div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container">
        <a href="<?= base_url('customer/Dashboard_customerr')?>" class="navbar-brand">Jahit.<span class="text-primary">In</span></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item">
              <a href="<?= base_url('customer/Produk_customer')?>" class="nav-link">Order</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('customer/cek_pesanan')?>" class="nav-link">Riwayat</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('customer/About_customer')?>" class="nav-link">About</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('penjahit/Registrasi_penjahit')?>" class="nav-link">Menjadi Mitra</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('customer/Konsultasi_chat')?>" class="nav-link">Promo</a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?= base_url('rajaongkir')?>" class="nav-link">Cek Ongkir</a>
            </li> -->
            <!-- <li class="nav-item">
              <a href="profil_customer.php" class="nav-link">Profil</a>
            </li> -->
          </ul>
          
          <div class="ml-auto">
            <?php
            $keranjang = 'Keranjang : '. $this->cart->total_items(). ' items'
            ?>
            <?= anchor('customer/Produk_customer/detail_keranjang', $keranjang) ?> 
          </div>

          <div class="ml-auto row">
            <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
                <a href="<?=base_url('auth/logout')?>">Logout</a>
            </ul>
          </div>

        </div>
      </div>
    </nav>
  </header>