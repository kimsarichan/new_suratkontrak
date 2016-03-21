<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_kas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kas_model','kas');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('kas_view');
	}

	public function ajax_list()
	{
		$list = $this->kas->get_datatables();
		$data = array();
		$no = $_POST['start'];
	if($this->session->userdata('logged_in')==true AND $this->session->userdata('username')!=''){
		foreach ($list as $kas) {
			$no++;
			$row = array();
			$row[] = $kas->nim;
            $row[] = $kas->tanggal_pembayaran;
            $row[] = $kas->untuk_bulan;
            $row[] = $kas->untuk_tahun;
            $row[] = $kas->jumlah;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_kas('."'".$kas->id_kas."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_kas('."'".$kas->id_kas."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}
	}
	else{
		foreach ($list as $kas) {
			$no++;
			$row = array();
			$row[] = $kas->nim;
            $row[] = $kas->tanggal_pembayaran;
            $row[] = $kas->untuk_bulan;
            $row[] = $kas->untuk_tahun;
            $row[] = $kas->jumlah;

			$data[] = $row;
		}		
	}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kas->count_all(),
						"recordsFiltered" => $this->kas->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kas->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'nim' => $this->input->post('nim'),
                'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
                'untuk_bulan' => $this->input->post('untuk_bulan'),
                'untuk_tahun' => $this->input->post('untuk_tahun'),
                'jumlah' => $this->input->post('jumlah'),
			);
		$insert = $this->kas->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'nim' => $this->input->post('nim'),
                'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
                'untuk_bulan' => $this->input->post('untuk_bulan'),
                'untuk_tahun' => $this->input->post('untuk_tahun'),
                'jumlah' => $this->input->post('jumlah'),
			);
		$this->kas->update(array('id_kas' => $this->input->post('id_kas')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->kas->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
