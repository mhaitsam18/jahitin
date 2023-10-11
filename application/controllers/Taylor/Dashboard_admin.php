<?php

class Dashboard_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('id_role') != '1')
		{
			$this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belom Login !
            </div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		$this->load->view('template_taylor/Header');
		$this->load->view('template_taylor/Sidebar');
		$this->load->view('Taylor/Dashboard_admin');
        $this->load->view('template_taylor/Footer');
	}
}
