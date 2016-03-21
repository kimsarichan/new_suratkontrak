<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_inventaris extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('inventaris_model','inventaris');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('inventaris_view');
	}

	public function ajax_list()
	{
		$list = $this->inventaris->get_datatables();
		$data = array();
		$no = $_POST['start'];
		if($this->session->userdata('logged_in')==true AND $this->session->userdata('username')!=''){
		foreach ($list as $inventaris) {
			$no++;
			$row = array();
			$row[] = $inventaris->nama_peminjam;
            $row[] = $inventaris->tanggal_pinjam;
            $row[] = $inventaris->durasi_pinjam;
            $row[] = $inventaris->tanggal_kembali;
            $row[] = $inventaris->status;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_inventaris('."'".$inventaris->id_pinjam."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_inventaris('."'".$inventaris->id_pinjam."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}
	}
	else{
		foreach ($list as $inventaris) {
			$no++;
			$row = array();
			$row[] = $inventaris->nama_peminjam;
            $row[] = $inventaris->tanggal_pinjam;
            $row[] = $inventaris->durasi_pinjam;
            $row[] = $inventaris->tanggal_kembali;
            $row[] = $inventaris->status;

			$data[] = $row;
		}		
	}


		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->inventaris->count_all(),
						"recordsFiltered" => $this->inventaris->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->inventaris->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'nama_peminjam' => $this->input->post('nama_peminjam'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'durasi_pinjam' => $this->input->post('durasi_pinjam'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'status' => $this->input->post('status'),
			);
		$insert = $this->inventaris->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'nama_peminjam' => $this->input->post('nama_peminjam'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'durasi_pinjam' => $this->input->post('durasi_pinjam'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'status' => $this->input->post('status'),
			);
		$this->inventaris->update(array('id_pinjam' => $this->input->post('id_pinjam')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->inventaris->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
