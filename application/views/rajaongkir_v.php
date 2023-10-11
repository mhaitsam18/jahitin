<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API Raja Ongkir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
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

  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <h4>Alamat Pengiriman</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Provinsi asal</label>
                                <select id="provinsi" name="provinsi" class="form-select" aria-label="Default select example">
                                    <option value="">Pilih Provinsi</option>
                                    <?php
                                        if ($provinsi['rajaongkir']['status']['code']='200'){
                                            foreach($provinsi['rajaongkir']['results'] as $pv){
                                                echo "<option value='$pv[province_id]' ".($pv['province_id'] == $this->input->post('provinsi') ? "selected" : " ").
                                                "> $pv[province]</option>";
                                            }
                                        }  
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kota asal</label>
                                <select id="kota" name="kota" class="form-select" aria-label="Default select example">
                                    <option>Pilih Kota</option>
                                    <?php 
                                    if (count($_POST)) {
                                        $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$this->input->post('provinsi'),
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

                                            if ($kota['rajaongkir']['status']['code'] = '200'){

                                                echo"<option value=''>Pilih Kota</option>";
                                                foreach ($kota['rajaongkir']['results'] as $kt){
                                                    echo "<option value='$kt[city_id]' ".($kt['city_id'] == $this->input->post('kota') ? "selected" : "").
                                                    "> $kt[city_name]</option>"; 
                                                }
                                            }
                                        }
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h4>Alamat Penerima</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Provinsi Penerima</label>
                                <select id="provinsi_penerima" name="provinsi_penerima" class="form-select" aria-label="Default select example">
                                    <option value="">Pilih Provinsi Penerima</option>
                                    <?php
                                        if ($provinsi['rajaongkir']['status']['code']='200'){
                                            foreach($provinsi['rajaongkir']['results'] as $pv){
                                                echo "<option value='$pv[province_id]' ".($pv['province_id'] == $this->input->post('provinsi_penerima') ? "selected" : " ").
                                                "> $pv[province]</option>";
                                            }
                                        }  
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kota Penerima</label>
                                <select id="kota_penerima" name="kota_penerima" class="form-select" aria-label="Default select example">
                                    <option>Pilih Kota Penerima</option>
                                    <?php 
                                    if (count($_POST)) {
                                        $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$this->input->post('provinsi_penerima'),
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

                                            if ($kota['rajaongkir']['status']['code'] = '200'){

                                                echo"<option value=''>Pilih Kota</option>";
                                                foreach ($kota['rajaongkir']['results'] as $kt){
                                                    echo "<option value='$kt[city_id]' ".($kt['city_id'] == $this->input->post('kota_penerima') ? "selected" : "").
                                                    "> $kt[city_name]</option>"; 
                                                }
                                            }
                                        }
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h4>Ekspedisi</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Ekspedisi</label>
                                <select id="ekspedisi" name="ekspedisi" class="form-select" aria-label="Default select example">
                                    <option value="">Pilih Ekspedisi</option>
                                    <?php
                                        $eks = ['jne' => 'JNE','pos' => 'POS','tiki' => 'TIKI'];
                                        foreach($eks as $key => $value){
                                            echo "<option value='$key' ".($key == $this->input->post('ekspedisi') ? "selected" : " ").
                                            "> $value</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Berat(gram)</label>
                                <input type="text"  name="berat" value="<?=$this->input->post('berat')?>" class="form-control" id="exampleFormControlInput1" placeholder="gram">
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary mb-2" type="submit" value="Submit">Proses</button>
                </form>

                <div class="card-deck">

                    <?php
                        $biaya = json_decode($ongkir, true);

                        if($biaya['rajaongkir']['status']['code'] == '200') {
                            foreach ($biaya['rajaongkir']['results'][0]['costs']as $by) {
                                ?>
                                <div class="card" style="width: 18rem;">
                                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $by['service']?></h5>
                                        <p class="card-text"><?= $by['description']?></p>
                                        <p class="card-text">Rp. <?= number_format($by['cost'][0]['value'], 0, ',' , '.')?></p>
                                        <p class="card-text"><small class="text-muted">Estimasi Pengiriman <?= $by['cost'][0]['etd'] ?> hari</small></p>
                                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <script>
        document.getElementById('provinsi').addEventListener('change', function(){
            fetch("<?= base_url('rajaongkir/kota/')?>"+this.value, {
                method:'GET',
            }).then((response)=> response.text())
            .then((data) => {
                console.log(data)
                document.getElementById('kota').innerHTML = data
            })
        });

        document.getElementById('provinsi_penerima').addEventListener('change', function(){
            fetch("<?= base_url('rajaongkir/kota/')?>"+this.value, {
                method:'GET',
            }).then((response)=> response.text())
            .then((data) => {
                console.log(data)
                document.getElementById('kota_penerima').innerHTML = data
            })
        });
    </script>
  </body>
</html>