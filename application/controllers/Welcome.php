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
		$this->load->model('notif_model');
		$this->data['karyawanlist2minggu'] = $this->notif_model->get_end_2_week();
		$this->data['karyawanlist1bulan'] = $this->notif_model->get_end_1_month();
		$this->load->view('index.html',$this->data);
	}

	public function laporan(){
		$this->data['content']="laporan_view";
		$this->load->model('laporan_model');
		foreach ($this->laporan_model->get_count_karyawan_per_month() as $row) {
			$this->data['grafik'][] = (float)$row['Januari'];
			$this->data['grafik'][] = (float)$row['Februari'];
			$this->data['grafik'][] = (float)$row['Maret'];
			$this->data['grafik'][] = (float)$row['April'];
			$this->data['grafik'][] = (float)$row['Mei'];
			$this->data['grafik'][] = (float)$row['Juni'];
			$this->data['grafik'][] = (float)$row['Juli'];
			$this->data['grafik'][] = (float)$row['Agustus'];
			$this->data['grafik'][] = (float)$row['September'];
			$this->data['grafik'][] = (float)$row['Oktober'];
			$this->data['grafik'][] = (float)$row['November'];
			$this->data['grafik'][] = (float)$row['Desember'];
		}
		$this->load->view('index.html',$this->data);
	}
}

