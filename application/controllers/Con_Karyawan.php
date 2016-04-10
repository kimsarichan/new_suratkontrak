<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Con_karyawan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		#$this->load->model('karyawan_model','karyawan');
		$models = array(
		    'karyawan_model' => 'karyawan',
		    'surat_model' => 'surat',
		);

		foreach ($models as $file => $object_name)
		{
		    $this->load->model($file, $object_name);
		}
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
            if (new DateTime() < new DateTime($karyawan->tglBerakhir)) {
   				 $row[]="aktif";
			}
			else{
				$row[]="closed";
			}
		
			$row[]=$this->karyawan->get_nama_perusahaan($karyawan->idPerusahaan);
            $row[] = $karyawan->unitKerja;
            $row[] = $karyawan->pendidikan;
            $row[] = '<a class="btn btn-sm btn-info" href="'. site_url("Con_karyawan/lihat/".$karyawan->idKaryawan).'" title="Lihat"><i class="glyphicon glyphicon-user"></i> lihat </a> <a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_karyawan('."'".$karyawan->idKaryawan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_karyawan('."'".$karyawan->idKaryawan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
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
		$this->load->view('index',$this->data);
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
	public function ajax_update(){
		$data = array(
				'idKaryawan' => $this->input->post('idKaryawan'),
				'nama' => $this->input->post('nama'),
                'tempatLahir' => $this->input->post('tempatLahir'),
                'tglLahir' => $this->input->post('tglLahir'),
                'unitKerja' => $this->input->post('unitKerja'),
                'pendidikan'=>$this->input->post('pendidikan'),
                'Norek'=>$this->input->post('Norek'),
                'Nomorbpjs'=>$this->input->post('Nomorbpjs')
			);
		$this->karyawan->update(array('idKaryawan' => $this->input->post('idKaryawan')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function print_data_personal_karyawan(){
		$id=$this->uri->segment(3);
		$data_karyawan=$this->karyawan->get_by_id($id);
		$this->data['data_karyawan']=$data_karyawan;
		$data_normal='';
		$data_surat = $this->surat->get_datatables_normal($id);
		$this->data['data_surat']=$data_surat;
		$this->load->view("print_surat",$this->data);
	}
	public function ajax_list_surat()
	{
		$id=$this->uri->segment(3);
		$list = $this->surat->get_datatables($id);
		$data = array();
		$no = $_POST['start'];
    	if($this->session->userdata('logged_in')==true AND $this->session->userdata('username')!=''){
    		foreach ($list as $surat) {

					$no++;
					$row = array();
					$row[] = $surat->nomor;
		            $row[] = $surat->tglMulai;
					$row[]=	 $surat->tglBerakhir;
		            $row[] = $surat->tugas;
		            $row[]=	$this->karyawan->get_nama_perusahaan($surat->idPerusahaan);
		            $row[] = '<a class="btn btn-sm btn-info" href="" title="Lihat"><i class="glyphicon glyphicon-user"></i> lihat </a> <a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick=""><i class="glyphicon glyphicon-trash"></i> Delete</a>';
					$data[] = $row;
				}
    	}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->surat->count_all($id),
						"recordsFiltered" => $this->surat->count_filtered($id),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_delete_surat($idSurat)
	{
		$this->surat->delete_by_id($idSurat);
		echo json_encode(array("status" => TRUE));
	}
}
?>