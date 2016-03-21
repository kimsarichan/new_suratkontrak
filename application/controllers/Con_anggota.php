<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model','anggota');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('anggota_view');
	}

	public function ajax_list()
	{
		$list = $this->anggota->get_datatables();
		$data = array();
		$no = $_POST['start'];
    	if($this->session->userdata('logged_in')==true AND $this->session->userdata('username')!=''){
    		foreach ($list as $anggota) {
			$no++;
			$row = array();
			$row[] = $anggota->nim;
			$row[] = $anggota->nama;
            $row[] = $anggota->tempat_lahir;
            $row[] = $anggota->tanggal_lahir;
            $row[] = $anggota->jurusan;
            $row[] = $anggota->tahun_kuliah;
            $row[] = $anggota->tahun_masuk_ukm;
            $row[] = $anggota->no_telp;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_anggota('."'".$anggota->nim."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_anggota('."'".$anggota->nim."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}
    	}

    	else{
    		foreach ($list as $anggota) {
			$no++;
			$row = array();
			$row[] = $anggota->nim;
			$row[] = $anggota->nama;
            $row[] = $anggota->tempat_lahir;
            $row[] = $anggota->tanggal_lahir;
            $row[] = $anggota->jurusan;
            $row[] = $anggota->tahun_kuliah;
            $row[] = $anggota->tahun_masuk_ukm;
            $row[] = $anggota->no_telp;

			//add html for action
			$data[] = $row;
		}

    	}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->anggota->count_all(),
						"recordsFiltered" => $this->anggota->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($nim)
	{
		$data = $this->anggota->get_by_nim($nim);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jurusan' => $this->input->post('jurusan'),
                'tahun_kuliah' => $this->input->post('tahun_kuliah'),
                'tahun_masuk_ukm' => $this->input->post('tahun_masuk_ukm'),
                'no_telp' => $this->input->post('no_telp'),
			);
		$insert = $this->anggota->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jurusan' => $this->input->post('jurusan'),
                'tahun_kuliah' => $this->input->post('tahun_kuliah'),
                'tahun_masuk_ukm' => $this->input->post('tahun_masuk_ukm'),
                'no_telp' => $this->input->post('no_telp'),
			);
		$this->anggota->update(array('nim' => $this->input->post('nim')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($nim)
	{
		$this->anggota->delete_by_nim($nim);
		echo json_encode(array("status" => TRUE));
	}

}
