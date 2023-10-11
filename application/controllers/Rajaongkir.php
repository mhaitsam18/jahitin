<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller {
    public function index(){
        $data['ongkir']='';
        if(count($_POST)){


            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$this->input->post('kota')."501&destination=".
            $this->input->post('kota_penerima')."&weight=".$this->input->post('berat')."&courier=".
            $this->input->post('ekspedisi'),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: bf6b3314de30037defa7c58d079775e2"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
                $data['ongkir'] = $response;
            }
        }
        $this->load->view('template_customer/Header');
		$this->load->view('template_customer/Sidebar');
        $this->load->view('customer/rajaongkir_v', $data);
        $this->load->view('template_customer/Sidebar');
    }

    public function kota($provinsi){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi,
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
                    echo "<option value='$kt[city_id]'> $kt[city_name]</option>"; 
                }
            }
        }
    }

    // private $api_key='bf6b3314de30037defa7c58d079775e2';

    // public function provinsi() 
    // {
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
    //         CURLOPT_SSL_VERIFYHOST => 0,
    //         CURLOPT_SSL_VERIFYPEER => 0,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => array(
    //             "key: $this->api_key"
    //         ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //     } else {
    //         // echo $response;
    //         $array_response = json_decode($response, true);
    //         // echo '<pre>';
    //         // print_r($array_response['rajaongkir']['results']);
    //         // echo '</pre>';

    //         $data_provinsi = $array_response['rajaongkir']['results'];
    //         echo "<option value='' >Pilih Provinsi</option>";
    //         foreach ($data_provinsi as $key => $value) {
    //             echo "<option value='" . $value['province_id'] . "'>" . $value['province'] . "</option>";
    //         }
    //     }
    // }

    // public function kota()
    // {
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=5",
    //         CURLOPT_SSL_VERIFYHOST => 0,
    //         CURLOPT_SSL_VERIFYPEER => 0,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => array(
    //             "key: $this->api_key"
    //         ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //     } else {
            // echo $response;
            // $array_response = json_decode($response, true);
            // echo '<pre>';
            // print_r($array_response['rajaongkir']['results']);
            // echo '</pre>';

            // $data_kota = $array_response['rajaongkir']['results'];
            // echo "<option value='' >Pilih Provinsi</option>";
            // foreach ($data_kota as $key => $value) {
            //     echo "<option value='" . $value['province_id'] . "'>" . $value['province'] . "</option>";
            // }
//         }
//     }
	
}
