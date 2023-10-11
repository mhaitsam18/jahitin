<?php

use Google\Client as GoogleClient;
	use Google\Service\Oauth2;

class Auth extends CI_Controller {

    public function __construct()
		{	
			parent::__construct();
			$this->load->database();
			$this->load->model('user_model');
			$this->load->helper('url');
			$this->load->library('session');
		}

	public function login()
	{
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Login');
        } else {
            $auth = $this->Model_auth->cek_login();

            if($auth == FALSE){
                $this->session->set_flashdata('pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password Anda Salah!
                </div>');
                redirect('auth/Login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('id_role', $auth->id_role);

                switch($auth->id_role){
                    case 1 : redirect('admin/Dashboard_admin');
                    break;
                    case 2 : redirect('customer/Dashboard_customer');
                    break;
                    case 3 : redirect('penjahit/Dashboard_penjahit');
                    break;
                    default : break;
                }
            }
        }
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function dashboard(){
        if($this->session->has_userdata('user')){
            redirect('customer/Dashboard_customerr', array('user'=>$user));
            // $user = $this->session->userdata('user');
            // $this->load->view('template_customer/Header');
            // $this->load->view('template_customer/Sidebar');
            // $this->load->view('customer/Dashboard_customer',array('user'=>$user));
            // $this->load->view('template_customer/Header');
        }else{
            redirect('customer/Dashboard_customerr');
        }
        
    }

    public function google_login(){
        $client = new GoogleClient();
        $client->setApplicationName('Ijahit');
        $client->setClientId('709691456679-aijah682atfff0udsokb28ecqpj1pn84.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri('http://localhost/jahitin/auth/google_login');
        $client->addScope(['https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/userinfo.profile']);
        if($code = $this->input->get('code')){
            $token = $client->fetchAccessTokenWithAuthCode($code);
            $client->setAccessToken($token);
            $oauth = new Oauth2($client);
            $user_info = $oauth->userinfo->get();
            $data['name'] = $user_info->name;
            $data['email'] = $user_info->email;
            $data['image'] = $user_info->picture;
            $data['id_role'] = '2';
            
            if($user = $this->user_model->getUser($user_info->email)){
                $this->session->set_userdata('user',$user);
            }else{
                $this->user_model->createUser($data);
            }
            
            redirect('auth/dashboard');;


        }else{
        
            

            $url = $client->createAuthUrl();
            header('Location:'.filter_var($url,FILTER_SANITIZE_URL));
        }
        

        
    }
}
