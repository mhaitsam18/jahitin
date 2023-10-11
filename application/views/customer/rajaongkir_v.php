<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: bf6b3314de30037defa7c58d079775e2"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $provinsi = json_decode($response, true);
}
?>
<br>
<div class="page-section">
  <div class="container"><br>
    <h4 class="title-section">PILIH ONGKOS KIRIM</h4>
    <div class="divider"></div>

    <form method="post">
      <div class="row">

        <div class="col-lg-6 py-3">
          <label>
            <h6 class="title-section">Alamat Pengiriman</h6>
          </label>
          <div class="py-2">
            <select class="form-control" name="provinsi" id="provinsi">
              <option value="">Pilih Provinsi Asal</option>
              <?php
              if ($provinsi['rajaongkir']['status']['code'] = '200') {
                foreach ($provinsi['rajaongkir']['results'] as $pv) {
                  echo "<option value='$pv[province_id]' " . ($pv['province_id'] == $this->input->post('provinsi') ? "selected" : " ") .
                    "> $pv[province]</option>";
                }
              }
              ?>
            </select>
          </div>
          <div class="py-2">
            <select class="form-control" name="kota" id="kota">
              <option>Pilih Kota Asal</option>
              <?php
              if (count($_POST)) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=" . $this->input->post('provinsi'),
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                  CURLOPT_HTTPHEADER => array(
                    "key: bf6b3314de30037defa7c58d079775e2"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  $kota = json_decode($response, true);

                  if ($kota['rajaongkir']['status']['code'] = '200') {

                    echo "<option value=''>Pilih Kota</option>";
                    foreach ($kota['rajaongkir']['results'] as $kt) {
                      echo "<option value='$kt[city_id]' " . ($kt['city_id'] == $this->input->post('kota') ? "selected" : "") .
                        "> $kt[city_name]</option>";
                    }
                  }
                }
              }
              ?>
            </select>
          </div><br>

          <label>
            <h6 class="title-section">Ekspedisi</h6>
          </label>
          <div class="py-2">
            <select class="form-control" name="ekspedisi" id="ekspedisi">
              <option value="">Pilih Ekspedisi</option>
              <?php
              $eks = ['jne' => 'JNE', 'pos' => 'POS', 'tiki' => 'TIKI'];
              foreach ($eks as $key => $value) {
                echo "<option value='$key' " . ($key == $this->input->post('ekspedisi') ? "selected" : " ") .
                  "> $value</option>";
              }
              ?>
            </select>
          </div>

        </div>

        <div class="col-lg-6 py-3">
          <label>
            <h6 class="title-section">Alamat Penerima</h6>
          </label>
          <div class="py-2">
            <select class="form-control" name="provinsi_penerima" id="provinsi_penerima">
              <option value="">Pilih Provinsi Tujuan</option>
              <?php
              if ($provinsi['rajaongkir']['status']['code'] = '200') {
                foreach ($provinsi['rajaongkir']['results'] as $pv) {
                  echo "<option value='$pv[province_id]' " . ($pv['province_id'] == $this->input->post('provinsi_penerima') ? "selected" : " ") .
                    "> $pv[province]</option>";
                }
              }
              ?>
            </select>
          </div>

          <div class="py-2">
            <select class="form-control" name="kota_penerima" id="kota_penerima">
              <option>Pilih Kota Tujuan</option>
              <?php
              if (count($_POST)) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=" . $this->input->post('provinsi_penerima'),
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                  CURLOPT_HTTPHEADER => array(
                    "key: bf6b3314de30037defa7c58d079775e2"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  $kota = json_decode($response, true);

                  if ($kota['rajaongkir']['status']['code'] = '200') {

                    echo "<option value=''>Pilih Kota</option>";
                    foreach ($kota['rajaongkir']['results'] as $kt) {
                      echo "<option value='$kt[city_id]' " . ($kt['city_id'] == $this->input->post('kota_penerima') ? "selected" : "") .
                        "> $kt[city_name]</option>";
                    }
                  }
                }
              }
              ?>
            </select>
          </div><br>

          <label>
            <h6 class="title-section">Berat Barang</h6>
          </label>
          <div class="py-2">
            <input type="text" name="berat" class="form-control" placeholder="Berat (gram)" value="<?= $this->input->post('berat') ?>">
          </div>

          <div align="right"><br>
            <button type="submit" name='submit' value="submit" class="btn btn-primary">Cek Ongkir</button>
          </div>

        </div>

      </div>
    </form>

    <div class="card-deck">

      <?php
      if (isset($_POST['submit'])) {

        $biaya = json_decode($ongkir, true);

        if ($biaya['rajaongkir']['status']['code'] == '200') {
          foreach ($biaya['rajaongkir']['results'][0]['costs'] as $by) {
      ?>
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"><?= $by['service'] ?></h5>
                <p class="card-text"><?= $by['description'] ?></p>
                <p class="card-text">Rp. <?= number_format($by['cost'][0]['value'], 0, ',', '.') ?></p>
                <p class="card-text"><small class="text-muted">Estimasi Pengiriman <?= $by['cost'][0]['etd'] ?> hari</small></p>
                <a href="<?= base_url('customer/Pembayaran_customer/index/' . $by['cost'][0]['value']) ?>" class="btn btn-primary">Pilih</a>
              </div>
            </div>
      <?php
          }
        }
      }
      ?>
    </div>

  </div> <!-- .container -->
</div> <!-- .page-section -->

<footer class="page-footer">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-3 py-3">
        <h3>Jahit.<span class="text-primary">In</span></h3>
        <p>Penyedia Jasa Penjahit Terbaik Untuk Anda</p>

        <p><a href="#">jahitin@gmail.com</a></p>
        <p><a href="#">+62 878 8427 2060</a></p>
      </div>
      <div class="col-lg-3 py-3">
        <h5>Quick Links</h5>
        <ul class="footer-menu">
          <li><a href="#">Order</a></li>
          <li><a href="#">Layanan</a></li>
          <li><a href="#">Product</a></li>
          <li><a href="#">Tentang Kami</a></li>
          <li><a href="#">Profil</a></li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6 py-2">
        <p id="copyright">&copy; 2021 Jahit.In</p>
      </div>
      <div class="col-sm-6 py-2 text-right">
        <div class="d-inline-block px-3">
          <a href="#">Credit</a>
        </div>
        <div class="d-inline-block px-3">
          <a href="#">License</a>
        </div>
      </div>
    </div>
  </div> <!-- .container -->
</footer> <!-- .page-footer -->

<script>
  document.getElementById('provinsi').addEventListener('change', function() {
    fetch("<?= base_url('rajaongkir/kota/') ?>" + this.value, {
        method: 'GET',
      }).then((response) => response.text())
      .then((data) => {
        console.log(data)
        document.getElementById('kota').innerHTML = data
      })
  });

  document.getElementById('provinsi_penerima').addEventListener('change', function() {
    fetch("<?= base_url('rajaongkir/kota/') ?>" + this.value, {
        method: 'GET',
      }).then((response) => response.text())
      .then((data) => {
        console.log(data)
        document.getElementById('kota_penerima').innerHTML = data
      })
  });
</script>