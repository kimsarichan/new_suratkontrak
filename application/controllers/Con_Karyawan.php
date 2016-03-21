<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_karyawan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('karyawan_model','karyawan');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('karyawan_view');
	}
	public function ajax_list()
	{
		$list = $this->karyawan->get_datatables();
		$data = array();

		$no = $_POST['start'];
    	if($this->session->userdata('logged_in')==true AND $this->session->userdata('username')!=''){
    		foreach ($list as $karyawan) {
			$no++;
			$row = array();
			$row[] = $karyawan->idKaryawan;
            $row[] = $karyawan->nama;
            #$row[] = $karyawan->status;
            if ($karyawan->status==0) {
            	$row[]='active';
            }
            else{
            	$row[]='closed';
            }
            $row[] = $karyawan->unitKerja;
            $row[] = $karyawan->pendidikan;
            $row[] = '<a class="btn btn-sm btn-info" href="'. site_url("Con_karyawan/lihat/".$karyawan->idKaryawan).'" title="Lihat"><i class="glyphicon glyphicon-user"></i> lihat </a> <a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_anggota('."'".$karyawan->idKaryawan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_anggota('."'".$karyawan->idKaryawan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
			}
    	}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->karyawan->count_all(),
						"recordsFiltered" => $this->karyawan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function lihat() {
		$id=$this->uri->segment(3);
		$data_karyawan=$this->karyawan->get_by_id($id);
		$this->data['content']="karyawan_view_personal";
		$this->data['data_karyawan']=$data_karyawan;
		$this->load->view('index.html',$this->data);

	}
	public function ajax_delete($idKaryawan)
	{
		$this->karyawan->delete_by_id($idKaryawan);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($idKaryawan)
	{
		$data = $this->karyawan->get_by_id($idKaryawan);
		echo json_encode($data);
	}
}
?>