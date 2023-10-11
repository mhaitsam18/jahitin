<?php

class Layanan_admin extends CI_Controller {

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
        $data['layanan'] = $this->Model_layanan->get_layanan()->result();
		$this->load->view('template_Desainer/Header');
		$this->load->view('template_Desainer/Sidebar');
		$this->load->view('Desainer/Layanan_admin', $data);
        $this->load->view('template_Desainer/Footer');
	}

    public function tambah_aksi()
    {
        $nama_layanan = $this->input->post('nama_layanan');
        $deskripsi_layanan = $this->input->post('deskripsi_layanan');

        $data = array (
            'nama_layanan' => $nama_layanan,
            'deskripsi_layanan' => $deskripsi_layanan,
        );

        $this->Model_layanan->tambah_layanan($data, 'layanan');
        redirect('Desainer/Layanan_admin/index');
    }

    public function edit($id)
	{
        $where = array('id_layanan' =>$id);
        $data['layanan'] = $this->Model_layanan->edit_layanan($where, 'layanan')->result();
		$this->load->view('template_Desainer/Header');
		$this->load->view('template_Desainer/Sidebar');
		$this->load->view('Desainer/Edit_layanan', $data);
        $this->load->view('template_Desainer/Footer');
	}

    public function update()
	{
        $id                 = $this->input->post('id_layanan');
        $nama_layanan        = $this->input->post('nama_layanan');
        $deskripsi_layanan   = $this->input->post('deskripsi_layanan');

        $data = array (
            'nama_layanan' => $nama_layanan,
            'deskripsi_layanan' => $deskripsi_layanan,
        );

        $where = array (
            'id_layanan' => $id
        );

        $this->Model_layanan->update_layanan($where,$data, 'layanan');
        redirect('Desainer/Layanan_admin/index');
	}

    public function hapus($id)
	{
        $where = array ('id_layanan' => $id);
        $this->Model_layanan->hapus_layanan($where, 'layanan');
        redirect('Desainer/Layanan_admin/index');
	}
}
