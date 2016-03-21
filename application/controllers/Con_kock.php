<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_kock extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kock_model','kock');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('kock_view');
	}

	public function ajax_list()
	{
		$list = $this->kock->get_datatables();
		$data = array();
		$no = $_POST['start'];

    if($this->session->userdata('logged_in')==true AND $this->session->userdata('username')!=''){
		foreach ($list as $kock) {
			$no++;
			$row = array();
			$row[] = $kock->tanggal_permainan;
            $row[] = $kock->jumlah_terpakai;
            $row[] = $kock->total_bayar;
            $row[] = $kock->status;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_kock('."'".$kock->id_hutang."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-success" href="javascript:void()" title="Detail" onclick="detail_kock('."'".$kock->id_hutang."'".')"><i class="glyphicon glyphicon-new-window"></i> Detail</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_kock('."'".$kock->id_hutang."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}
	}
	else{
		foreach ($list as $kock) {
			$no++;
			$row = array();
			$row[] = $kock->tanggal_permainan;
            $row[] = $kock->jumlah_terpakai;
            $row[] = $kock->total_bayar;
            $row[] = $kock->status;

			//add html for action
			
			$data[] = $row;
		}		
	}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kock->count_all(),
						"recordsFiltered" => $this->kock->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kock->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_detail($id)
	{
		$list = $this->kock->get_detail_by_id($id);
		$data = array();
		/*$no = $_POST['start']; */
		foreach ($list as $detail) {
			//$no++;
			$row = array();
			//$row[] = $detail->id_detail_hutang;
			//$row[] = $detail->id_hutang;
			$row[] = $detail->nim;
		
			$data[] = $row;
		}

		/*$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kock->count_all(),
						"recordsFiltered" => $this->kock->count_filtered(),
						"data" => $data,
				);
		//output to json format
		*/
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'tanggal_permainan' => $this->input->post('tanggal_permainan'),
                'jumlah_terpakai' => $this->input->post('jumlah_terpakai'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status' => $this->input->post('status'),
			);
		$insert = $this->kock->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'tanggal_permainan' => $this->input->post('tanggal_permainan'),
                'jumlah_terpakai' => $this->input->post('jumlah_terpakai'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status' => $this->input->post('status'),
			);
		$this->kock->update(array('id_hutang' => $this->input->post('id_hutang')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->kock->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
