<?php
//get 2 week-tglBerakhir : SELECT * FROM `karyawankontrak` WHERE curdate() BETWEEN DATE_SUB(tglBerakhir, INTERVAL 2 WEEK) AND tglBerakhir
//get 1 month-2 week : SELECT * FROM `karyawankontrak` WHERE curdate() BETWEEN DATE_SUB(tglBerakhir, INTERVAL 1 MONTH) AND DATE_SUB(DATE_SUB(tglBerakhir, INTERVAL 2 WEEK), INTERVAL 1 DAY)

class Notif_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_end_2_week(){
		$sql = 'SELECT * FROM `karyawankontrak` WHERE curdate() BETWEEN DATE_SUB(tglBerakhir, INTERVAL 2 WEEK) AND tglBerakhir';
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	public function get_end_1_month(){
		$sql = 'SELECT * FROM `karyawankontrak` WHERE curdate() BETWEEN DATE_SUB(tglBerakhir, INTERVAL 1 MONTH) AND DATE_SUB(DATE_SUB(tglBerakhir, INTERVAL 2 WEEK), INTERVAL 1 DAY)';
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

}
?>