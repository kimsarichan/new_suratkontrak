<html>
<head>
	<style type="text/css" media="print">
		table {border: solid 1px #000; border-collapse: collapse; width: 100%}
		tr { border: solid 1px #000; page-break-inside: avoid;}
		td { padding: 7px 5px; font-size: 10px}
		th {
			font-family:Arial;
			color:black;
			font-size: 11px;
			background-color:lightgrey;
		}
		thead {
			display:table-header-group;
		}
		tbody {
			display:table-row-group;
		}
		h3 { margin-bottom: -17px }
		h2 { margin-bottom: 0px }
	</style>
	<style type="text/css" media="screen">
		table {border: solid 1px #000; border-collapse: collapse; width: 100%}
		tr { border: solid 1px #000}
		th {
			font-family:Arial;
			color:black;
			font-size: 11px;
			background-color: #999;
			padding: 8px 0;
		}
		td { padding: 7px 5px;font-size: 10px}
		h3 { margin-bottom: -17px }
		h2 { margin-bottom: 0px }
	</style>
<title>Cetak Data Karyawan</title>
</head>
<body onload="window.print()">
	<center><b style="font-size: 20px">Data Karyawan</b><br>
	<table>
		<thead>
			<tr>
				<th width="5%">No</td>
				<th width="22.5%">Nomor Surat</td>
				<th width="22.5%">Tanggal Mulai</td>
				<th width="22.5%">Tanggal Berakhir</td>
				<th width="22.5%">Tugas</td>
				<th width="5%">Perusahaan</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (!empty($data_surat)) {
				$no = 0;
				foreach ($data_surat as $surat) {
					$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $surat->nomor; ?></td>
				<td><?php echo $surat->tglMulai; ?></td>
				<td><?php echo $surat->tglBerakhir; ?></td>
				<td><?php echo $surat->tugas; ?></td>
				<td><?php echo $surat->idPerusahaan; ?></td>
			</tr>
			<?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>


<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>

<script type="text/javascript">
	  $(document).ready(function() {
        var printContents = document.innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
  });
</script>