<?php 

class Customer_admin extends CI_Controller {

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
	
	public function customer()
	{
        $data['customer'] = $this->Model_user->get_customer()->result();
		$this->load->view('template_taylor/Sidebar');
		$this->load->view('template_taylor/Header');
		$this->load->view('Taylor/Customer_admin', $data);
        $this->load->view('template_taylor/Footer');
	}

	// public function detail($id_invoice)
	// {
    //     $data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
	// 	$data['invoice'] = $this->Model_invoice->ambil_id_pesanan($id_invoice);
	// 	$this->load->view('template_penjahit/Header');
	// 	$this->load->view('template_penjahit/Sidebar');
	// 	$this->load->view('penjahit/Detail_invoice', $data);
    //     $this->load->view('template_penjahit/Footer');
	// }

    public function hapus($id_user)
	{
        $where = array ('id_user' => $id_user);
        $this->Model_user->hapus_user($where, 'user');
        redirect('Taylor/Customer_admin/customer');
	}
}