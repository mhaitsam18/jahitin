<?php

class setting extends CI_Controller {

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
        $data = array(
			'title' => 'setting',
			'isi' => 'v_setting',
		);
		$this->load->view('template_admin/Header');
		$this->load->view('template_admin/Sidebar');
		$this->load->view('admin/v_setting', $data, FALSE);
        $this->load->view('template_admin/Footer');
	}

	// public function setting_lokasi()
	// {
	// 	$data = array(
	// 		'title' => 'setting',
	// 		'isi' => 'v_setting',
	// 	);
	// 	$this->load->view('admin/Dashboard_admin', $data, FALSE);
	// }
}
