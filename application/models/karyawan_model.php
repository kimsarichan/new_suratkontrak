<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model {

	var $table = 'karyawankontrak';
	var $column = array('idKaryawan','idPerusahaan','status','nama','alamat','tingkatPekerjaan','unitKerja','tempatLahir','tglLahir','pendidikan','Nomorbpjs','Norek');
	var $order = array('idKaryawan' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($idKaryawan)
	{
		$this->db->from($this->table);
		$this->db->where('idKaryawan',$idKaryawan);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($idKaryawan)
	{
		$this->db->where('idKaryawan', $idKaryawan);
		$this->db->delete($this->table);
	}

	public function get_nama_perusahaan($idPerusahaan){
		$query=$this->db->query("Select * from perusahaan where idPerusahaan= ".$idPerusahaan." limit 1");
		if($query){
		#$r=$query->result_array();
		return $query->row()->namaPerusahaan;
		#return 1;
		}
		else{
			return 0;
		}
	}
}
