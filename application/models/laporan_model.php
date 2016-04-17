<?php
/**
* 
*/
class Laporan_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_count_karyawan_per_month(){
		$sql = "SELECT
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y01') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `Januari`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y02') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `Februari`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y03') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `Maret`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y04') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `April`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y05') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `Mei`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y06') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `Juni`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y07') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `Juli`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y08') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `Agustus`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y09') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `September`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y10') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `Oktober`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y11') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `November`,
				(SELECT COUNT(*) FROM `suratkontrak` WHERE DATE_FORMAT(CURDATE(),'%Y12') BETWEEN DATE_FORMAT(tglMulai,'%Y%m') AND DATE_FORMAT(tglBerakhir,'%Y%m')) AS `Desember`
				FROM `suratkontrak` GROUP BY YEAR(CURDATE())";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
}

?>