<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-Form Faktur Timbang Kelapa</title>

	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
	</script>

	<style type="text/css">

		.section-container {
			width: 100%;
			background-color: #ffffff;
		}


		.header-container{
			width: 100%;
			display: flex;
			justify-content: space-between; 
			/* margin-left: 0px;
			margin-right: 50px; */
		} 

		.item-logo {
			padding: 10px;
			margin-left: 110px;
			margin-top: 50px;
		}

		.item-header {
			padding: 10px;
		}

		.item-invoice {
			padding: 10px;
			text-align: left;
			margin-right: -180px;
			margin-top: 50px;
			/* background-color: #ccc; */
			/* border: 1px solid #333; */
		}

		.item-invoice-data {
			padding: 10px;
			text-align: left;
			margin-right: 100px;
			margin-top: 50px;
			/* background-color: #ccc; */
			/* border: 1px solid #333; */
		}


		.section-info {
			/* width: 100%; */
			background-color: #D9D9D9;
			margin: 30px;
			border-radius: 20px;
		}


		.info-container{
			width: 100%;
			display: flex;
			justify-content: space-between; 
			margin-left: 30px;
			margin-right: 30px;
		} 

		.item-1 {
			padding: 10px;
			margin-left: 50px;
			margin-top: 20px;
			margin-bottom: 20px
		}

		.item-1-data {
			padding: 10px;
			margin-left: -50px;
			margin-top: 20px;
			margin-bottom: 20px
		}

		.item-2 {
			padding: 10px;
			margin-left: 60px;
			margin-top: 20px;
			margin-bottom: 20px;
		}

		.item-2-data {
			padding: 10px;
			margin-top: 20px;
			margin-bottom: 20px
		}

		.item-3 {
			padding: 10px;
			text-align: left;
			margin-right: -250px;
			margin-top: 20px;
			margin-bottom: 20px
			/* background-color: #ccc; */
			/* border: 1px solid #333; */
		}

		.item-3-data {
			padding: 10px;
			text-align: left;
			margin-right: 100px;
			margin-top: 20px;
			margin-bottom: 20px
			/* background-color: #ccc; */
			/* border: 1px solid #333; */
		}

		.table-1 {
			margin: 30px;
			font-family: sans-serif;
			color: #444;
			border-collapse: collapse;
			width: 97%;
			border: 1px solid #f2f5f7;
		}
		
		.table-1 tr th{
			background: #35A9DB;
			color: #fff;
			font-weight: normal;
		}
		
		.table-1, th, td {
			padding: 8px 20px;
			text-align: center;
		}
		
		.table-1 tr:hover {
			background-color: #f5f5f5;
		}
		
		.table-1 tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		tfoot{
			background-color: #35A9DB;
			font-weight: bold;
			color: #fff;
		}

		.section-footer {
			/* width: 100%; */
			background-color: #D9D9D9;
			margin: 30px;
			border-radius: 20px;
		}


		.footer-container{
			width: 100%;
			display: flex;
			justify-content: space-between; 
			margin-left: 30px;
			margin-right: 30px;
		} 

		.item-1 {
			padding: 10px;
			margin-left: 50px;
			margin-top: 20px;
			margin-bottom: 20px
		}

		.item-ttd-1 {
			margin-left: -450px;
		}

		.item-2 {
			padding: 10px;
			margin-top: 20px;
			margin-bottom: 20px
		}

		.item-ttd-2 {
			margin-left: -450px;
		}

		.item-3 {
			padding: 10px;
			text-align: left;
			margin-right: 200px;
			margin-top: 20px;
			margin-bottom: 20px
			/* background-color: #ccc; */
			/* border: 1px solid #333; */
		}

		/* .section-footer-2 {
			background-color: #fff;
			margin: -30px;
			border-radius: 20px;
		} */

		.footer-2-container{
			background-color: #C9C9C9;
			width: 100%;
			display: flex;
			justify-content: space-between; 
			border: 1px;
			border-radius: 20px;
			/* margin-left: 30px; */
			/* margin-right: 30px; */
		} 

		.item-masa {
			padding: 10px;
			margin-left: 50px;
			margin-top: 20px;
			margin-bottom: 20px
		}

		.item-kode {
			padding: 10px;
			text-align: left;
			margin-right: 200px;
			margin-top: 20px;
			margin-bottom: 20px
		}

		button {
			float: right;
			display: inline-block;
			vertical-align: middle;
			margin: 30px;
			padding: 15px 50px;
			background-color: #FF7272;
			border: none;
			cursor: pointer;
			font-weight: bold;
			color: #FFFFFF;
			text-decoration: none;
			border-radius: 10px;
		}

		body { 
			font: normal 13pt Arial;
		}

		h1 { 
			font: bold 18pt Arial; 
			text-align: center; 
			margin: 30pt; 
			color: #234ECF;
		}

		span {
			text-align: right;
		}

		






	</style>
</head>
<body>

	<section class="section-container">
		<div class="header-container">
			<div class="item-logo">
				<img src="<?php echo base_url('assets/logo.png')?>" alt="Logo" width="150">
			</div>
			<div class="item-header">
								<h1>PT PULAU SAMBU<br>
								FAKTUR TIMBANG KELAPA BULAT JAMBUL PANCANG<br>
								COCONUT PURCHASE INVOICE</h1>
			</div>
			<div class="item-invoice">
								Tanggal <span id="tgl_transaksi"></span><br>
								No. Invoice  <span id="no_invoice"></span><br>
								Page 
			</div>
								<div class="item-invoice-data">
											: Marina 123<span id="tgl_transaksi"></span><br>
											: PCG Sungai Guntung<span id="no_invoice"></span><br>
											: 1/1
			</div>
		</div>
	</section>

	<section class="section-info">
	<div class="info-container">
        <div class="item-1">
							Supplier    <br>
							Nama Petani <br>
							Supervisor	
						</div>
						<div class="item-1-data">
							: PCG19 - Eko Cahyo<br>
							: Sujono<br>
							: Saiman
						</div>
        <div class="item-2">
							Sortir<br>
							Tally<br>
							Bongkar
						</div>
						<div class="item-2-data">
							: 32<br>
							: 88039<br>
							: 12.06.2023 s/d 15.06.2023
						</div>
        <div class="item-3">
							Kapal<br>
							Area<br>
							Conveyor
						</div>
						<div class="item-3-data">
							: Marina 123<br>
							: PCG Sungai Guntung<br>
							: C61
						</div>
    </div>	
	</section>

	<section class="section-table">
		<table class="table-1">
			<thead>
				<tr>
					<th>No.</th>
					<th>Berat Brutto (Kg)</th>
					<th>Jaring (Kg)</th>
					<th>Persen (Kg)</th>
					<th>Berat Net (Kg)</th>
					<th>Harga (@Kg)</th>
					<th>Jumlah Kelapa (Butir)</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$count = 0;
				$grade_total = 0;
				$berat_total = 0;
				foreach ($queryDataForms as $row) {
					$total = $row->beratnet*$row->harga;
					$grade_total += $total;
					$berat_total += $row->beratnet;
					$count = $count + 1;
					?>
						<tr>
							<td><?php echo $count ?></td>
							<td><?php echo $row->berat ?></td>
							<td><?php echo $row->jaring ?></td>
							<td><?php echo $row->persen ?></td>
							<td><?php echo $row->beratnet ?></td>
							<td><?php echo $row->harga ?></td>
							<td><?php echo $row->jumlah ?></td>
							<td><?php echo $total ?></td>
						<tr>
					<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4">Berat Total</td>
					<td><?php echo $berat_total?></td>
					<td colspan="2">Total</td>
					<td><?php echo $grade_total?></td>
				</tr>
			</tfoot>
		</table>
	</section>

	<section class="section-footer">
		<div class="footer-container">
			<div class="item-1">
								Dibuat Oleh <br><br>
								Nama : Abdan R <br>
								Tanggal : 12 Juni 2023
							</div>
							<div class="item-ttd-1">
								<img src="<?php echo base_url('assets/ttd.png')?>" alt="ttd-1" width="150">
							</div>
			<div class="item-2">
								Dibuat Oleh <br><br>
								Nama : Abdan R <br>
								Tanggal : 12 Juni 2023
							</div>
							<div class="item-ttd-2">
								<img src="<?php echo base_url('assets/ttd.png')?>" alt="ttd-2" width="150">
							</div>
			<div class="item-3">
								<br>
								<br>
								Di Cetak Pada : 12 Juni 2023 19:23:30 <br>
								Oleh                 : Abdan
							</div>
		</div>	

		<div class="footer-2-container">
			<div class="item-masa">
				Masa Berlaku: 12 Juni 2023
			</div>
			<div class="item-kode">
				FQM-0192384958603995
			</div>
		</div>
	</section>

	<form action="export" class="button-excel">
		<button type="submit">Unduh Excel</button>
	</form>

  </div>
</body>
</html>