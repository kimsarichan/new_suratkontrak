<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct(){
		parent::__construct();
	    $this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		if ($this->form_validation->run() == FALSE){
            $this->load->view('login');
        }
	}
	#karyawan
	public function login(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$login=$this->Login_model->login($username,$password);
		if($login>0){
			$sessiondata = array(
                        	'username' => $username,
                        	'logged_in' => TRUE
                        );
            $this->session->set_userdata($sessiondata);
            #redirect('Welcome/index');
			$this->home();
		}
		else{
			$this->load->view('login');
		}
		
	}

	public function logout()
	{
		$sessiondata = array(
                        	'username' => '',
                        	'logged_in' => FALSE
                        );
            $this->session->set_userdata($sessiondata);
            #redirect('Welcome/index');
			$this->load->view('login');
	}
	public function karyawan(){
		$this->data['content']="karyawan_view";
		$this->load->view('index',$this->data);
	}
	public function home(){
		$this->data['content']="home";
		$this->load->view('index',$this->data);
	}
}

