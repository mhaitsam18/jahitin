<?php

class Dashboard_customerr extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	if($this->session->userdata('id_role') != '2')
	// 	{
	// 		$this->session->set_flashdata('pesan',
    //         '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //         Anda Belom Login !
    //         </div>');
	// 		redirect('auth/login');
	// 	}
	// }
	
	public function index()
	{
		$this->load->view('template_customer/Header');
		$this->load->view('template_customer/Sidebarr');
		$this->load->view('customer/Dashboard_customerr');
		$this->load->view('template_customer/Footer');
	}

}
