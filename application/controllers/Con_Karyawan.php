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
		     'perusahaan_model' => 'perusahaan',
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
                'Nomorbpjs'=>$this->input->post('Nomorbpjs'),
                 'idPerusahaan'=>$this->input->post('idPerusahaan'),
                 'NomorTelp'=>$this->input->post('NomorTelp')
			);
		$this->karyawan->update(array('idKaryawan' => $this->input->post('idKaryawan')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function print_data_personal_karyawan(){
		$id=$this->uri->segment(3);
		$data_karyawan=$this->karyawan->get_by_id($id);
		$this->data['data_karyawan']=$data_karyawan;
		$data_surat = $this->surat->get_datatables_normal($id);
		$this->data['data_surat']=$data_surat;
		$this->load->view("print_surat",$this->data);
	}
	public function print_surat_personal_karyawan(){
		$id=$this->uri->segment(3);
		$data_surat = $this->surat->get_by_id($id);
		$this->data['data_surat']=$data_surat;
		$data_karyawan=$this->karyawan->get_by_id($data_surat->idKaryawan);
		$this->data['data_karyawan']=$data_karyawan;
		$data_perusahaan=$this->perusahaan->get_by_id($data_surat->idPerusahaan);
		$this->data['data_perusahaan']=$data_perusahaan;
		$this->load->view("print_surat_generate",$this->data);
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
		            $row[] = '<a class="btn btn-sm btn-info" href="'. site_url("Con_karyawan/print_surat_personal_karyawan/".$surat->idSurat).'" title="Lihat"><i class="glyphicon glyphicon-user"></i> lihat </a> <a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_surat('."'".$surat->idSurat."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
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
	public function ajax_add_surat()
	{
		$data = array(
				'nomor' => $this->input->post('nomor'),
				 'idPerusahaan' => $this->input->post('idPerusahaan'),
                'idKaryawan' => $this->input->post('idKaryawan'),
                'tglMulai' => Date('Y-m-d'),
                'tglBerakhir'=>$this->input->post('tglBerakhir'),
                'tugas'=>$this->input->post('tugas'),
                'penempatanKaryawan'=>$this->input->post('penempatanKaryawan')
			);
		$insert = $this->surat->save($data);
		echo json_encode(array("status" => TRUE));
	}
	public function get_tanggalsisa($date_before,$date_after){

		$diff=$date_before-$date_after;
		$days=floor($diff/(60*60*24));

		return $days;
	}
	public function get_pengalaman_kerja($idKaryawan){
		$list = $this->surat->get_datatables($id);
		$pengalaman= 0;
		foreach ($list as $surat) {
			$pengalaman=$pengalaman+$this->get_tanggalsisa(stroftime($surat->tglMulai),stroftime($surat->tglBerakhir));

		}
		return $pengalaman;
	}
	public function get_gaji($idKaryawan,$pengalaman){
		$data_karyawan=$this->karyawan->get_by_id($idKaryawan);
		if($data_karyawan->pendidikan=="S1" and $pengalaman<4*$pengalaman ){
			return 10000;
		}
	}
}
?>