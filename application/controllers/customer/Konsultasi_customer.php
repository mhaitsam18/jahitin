<?php

class Konsultasi_customer extends CI_Controller {
	
	public function index()
	{
		$this->load->view('template_customer/Header');
		$this->load->view('template_customer/Sidebar');
		$this->load->view('customer/Konsultasi_customer');
		$this->load->view('template_customer/Footer');
	}
}
