<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

	var $table = 'suratkontrak';
	var $column = array('idSurat','idKaryawan','idPerusahaan','nomor','tglMulai','tglBerakhir','tugas','PenempatanKaryawan');
	var $order = array('idSurat' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($idKaryawan)
	{
		
		$this->db->from($this->table);
		$this->db->where('idKaryawan',$idKaryawan);
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

	function get_datatables($idKaryawan)
	{
		$this->_get_datatables_query($idKaryawan);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function get_datatables_normal($idKaryawan)
	{
		$this->db->from($this->table);
		$this->db->where('idKaryawan',$idKaryawan);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered($idKaryawan)
	{
		$this->_get_datatables_query($idKaryawan);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($idKaryawan)
	{
		$this->db->from($this->table);
		$this->db->where('idKaryawan',$idKaryawan);
		return $this->db->count_all_results();
	}

	public function get_by_id($idSurat)
	{
		$this->db->from($this->table);
		$this->db->where('idSurat',$idSurat);
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

	public function delete_by_id($idSurat)
	{
		$this->db->where('idSurat', $idSurat);
		$this->db->delete($this->table);
	}
}
?>