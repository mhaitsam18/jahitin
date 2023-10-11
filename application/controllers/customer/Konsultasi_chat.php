<?php

class Konsultasi_chat extends CI_Controller {
	
	public function index()
	{
		$data['produk'] = $this->Model_produk->get_produk()->result();
		$this->load->view('template_customer/Header');
		$this->load->view('template_customer/Sidebar');
		$this->load->view('customer/Konsultasi_chat', $data);
		$this->load->view('template_customer/Footer');
	}
}
