<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
		<style type="text/css">
            ${demo.css}
		</style>
		<script type="text/javascript">
            $(function () {
                $('#one').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Jumlah Karyawan per Bulan ('.concat(new Date().getFullYear() ,')')
                    },
                    xAxis: {
                        type: 'category',
                        categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                        labels: {
                            rotation: 45,
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah Karyawan'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: 'Jumlah Karyawan: <b>{point.y:.0f} Karyawan</b>'
                    },
                    series: [{
                        name: 'Population',
                        data: <?php echo json_encode($grafik); ?>,
                        dataLabels: {
                            enabled: true,
                            rotation: 0,
                            color: '#FFFFFF',
                            align: 'center',
                            format: '{point.y:.0f}', // one decimal
                            y: 0, // 10 pixels down from the top
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
                });
                
                $('#two').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Jumlah Karyawan per Bulan ('.concat(new Date().getFullYear() ,')')
                    },
                    xAxis: {
                        type: 'category',
                        categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                        labels: {
                            rotation: 45,
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah Karyawan'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: 'Jumlah Karyawan: <b>{point.y:.0f} Karyawan</b>'
                    },
                    series: [{
                        name: 'Population',
                        data: <?php echo json_encode($grafik); ?>,
                        dataLabels: {
                            enabled: true,
                            rotation: 0,
                            color: '#FFFFFF',
                            align: 'center',
                            format: '{point.y:.0f}', // one decimal
                            y: 0, // 10 pixels down from the top
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
                });
            });
		</script>
	</head>
	<body>
        <script src="<?php echo base_url('assets/Highcharts/highcharts.js')?>"></script>
        <!--<script src="<?php echo base_url('assets/Highcharts/exporting.js')?>"></script>-->
        <div class="row">
            <div class ="col-lg-4">-->
                <div id="one" style="width: 500px; height: 275px; margin: 0 auto"></div>
            </div>
        </div>
        <div class="row">
            <div class ="col-lg-4">
                <div id="two" style="width: 500px; height: 275px; margin: 0 auto"></div>
            </div>
        </div>
	</body>
</html>