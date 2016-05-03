<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Con_karyawan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		#$this->load->model('karyawan_model','karyawan');
		$this->load->helper('url');
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
	public function lihat($id) {
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
		$config['upload_path'] = './assets/';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
        $config['max_size'] = 1024 * 8;
         $data['errors'] = '';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload("image")){
	        //$data = $this->upload->data();
	        //$file_id = $data['file_name'];
	        $data['errors'] = $this->upload->display_errors();
	       
    	}
    	else{
    		$data = $this->upload->data();
	        $file_id = $data['file_name'];
    		$data['errors'] = "huray";
    	}
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
                //'Image'=>$file_id,
                'NomorTelp'=>$data['errors'] 
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
	public function tambah_karyawan(){
		$this->data['content']="tambahkaryawan";   
		$this->load->view('index',$this->data);

	}
	public function tambah(){
		if($this->input->post('bpjs')=='none'){
			$Nomorbpjs="belum ada";
		}
		elseif ($this->input->post('bpjs')=='dalam proses') {
			$Nomorbpjs="dalam proses";
		}
		else{
			$Nomorbpjs=$this->input->post('Nomorbpjs');
		}
		$hasil= $this->karyawan->count_row();
		$data_karyawan = array(
				'idKaryawan'=>((int)$hasil->NUM+1),
				'nama' =>$this->input->post('nama') ,
				'tempatLahir' =>$this->input->post('tempatLahir'),
				'tglLahir' =>$this->input->post('tglLahir'),
				'pendidikan'=>$this->input->post('pendidikan'),
				'idPerusahaan'=>$this->input->post('idPerusahaan'),
				'Nomorbpjs'=>$this->input->post('bpjs'),
				'NomorbpjsKetenagaKerjaan'=>$this->input->post('NomorbpjsKetenagaKerjaan'),
				'Norek'=>$this->input->post('Norek'),
				'NomorTelp'=>$this->input->post('NomorTelp'),
				'unitKerja'=>$this->input->post('unitKerja'),
				'alamat'=>$this->input->post('alamat')
		 );
		$data_surat = array('nomor' =>$this->input->post('nomor') ,
			'idPerusahaan'=>$this->input->post('idPerusahaan'),
			'idKaryawan'=>((int)$hasil->NUM+1),
	        'tglMulai' => Date('Y-m-d'),
	        'tglBerakhir'=>$this->input->post('tglBerakhir'),
	        'tugas'=>$this->input->post('tugas'),
	        'penempatanKaryawan'=>$this->input->post('penempatanKaryawan')

		 );
		if($this->input->post('action')=='tambah'){
		
		$this->karyawan->save($data_karyawan);
		$this->surat->save($data_surat);
		echo "<script>
             alert('data berhasil dimasukan');
             </script>";
        $this->lihat($data_karyawan['idKaryawan']);
    	}
    	elseif ($this->input->post('action')=='print') {
    	$this->data['data_karyawan']=$data_karyawan;
		$this->data['data_surat']=$data_surat;
		$data_perusahaan=$this->perusahaan->get_by_id($data_surat['idPerusahaan']);
		$this->data['data_perusahaan']=$data_perusahaan;
		$this->load->view("print_surat_generate_preview",$this->data);
    	}

	}
}
?>