<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-Form Faktur Timbang Kelapa</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Include Required Prerequisites Date Picker-->
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
	
	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


	<style type="text/css">

	/* ::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; } */

	body {
		background-color: #CAE4F3;
		margin: 60px;
		font: 15px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	h1 {
		color: #234ECF;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 25px;
		font-weight: bold;
		text-align: center;
		margin: 0 0 14px 0;
		padding: 30px 30px 30px 30px;
	}

	#body {
		margin: 40px 40px 40px 40px;
		min-height: 96px;
	}

	#container {
		margin: 80px;
		border-radius: 20px;
		background-color: #FFFFFF;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	input {
		width: 98%;
		background-color: #D9D9D9;
		border-radius: 10px;
		border: #4F5155 solid 0px;
		margin: 10px 5px;
		padding: 10px;
	}

	.form-select-kapal, .form-select-supplier {
		margin-left: 5px;
		margin-bottom: 20px;
		width: 98%;
		background-color: #D9D9D9;
		padding: 10px;
		border: none;
		border-radius: 10px;
		font: 15px/20px normal Helvetica, Arial, sans-serif;
	}

	button {
		display: inline-block;
		vertical-align: middle;
		margin: 30px 5px;
		padding: 10px 50px;
		background-color: #0D6EB2;
		border: none;
		cursor: pointer;
		font-weight: bold;
		color: #FFFFFF;
		text-decoration: none;
		border-radius: 10px;
	}

	label {
		display: block;
		float: left;
		clear: both;
		font-weight: 600;
		margin-left: 10px;
	}

	.column {
		float: left;
		width: 50%;
		padding: 10px;
	}

	.row::after {
		content: "";
		clear: both;
		display: table;
	}



	</style>
</head>
<body>

<div id="container">
	<h1>E-Form Faktur Timbang Kelapa</h1>

	<div id="body">

		<form action="fungsiFormInputUser" method="post">		
			<div class="row">
                <div class="column">
                    <label for="supplier">Supplier</label><br>
			        <select class="form-select-supplier" name="supplier" aria-label="Default select example">
						<option selected>Pilih Supplier</option>
						<option value="12534 - Jasiman">12534 - Jasiman</option>
						<option value="12679 - Sugiono">12679 - Sugiono</option>
						<option value="12680 - Suprapti">12680 - Suprapti</option>
						<option value="12685 - Dasiman">12685 - Dasiman</option>
						<option value="12688 - Ningsih">12688 - Ningsih</option>
					</select><br>

					<label for="petani">Nama Petani</label><br>
			        <input type="text" id="petani" name="petani"><br>

					<label for="supervisor">Supervisor</label><br>
			        <input type="text" id="supervisor" name="supervisor"><br>

					<label for="kapal">Kapal</label><br>
			        <select class="form-select-kapal" name="kapal" aria-label="Default select example">
						<option selected>Pilih Kapal</option>
						<option value="Kapal - 12534">Kapal - 12534</option>
						<option value="Kapal - 12679">Kapal - 12679</option>
						<option value="Kapal - 12680">Kapal - 12680</option>
						<option value="Kapal - 12685">Kapal - 12685</option>
						<option value="Kapal - 12688">Kapal - 12688</option>
					</select><br>

					<label for="conveyor">Conveyor</label><br>
			        <input type="text" id="conveyor" name="conveyor"><br>

					<button type="submit">Submit</button>
                </div>

                <div class="column">
					<label for="sortir">Sortir</label><br>
			        <input type="number" id="sortir" name="sortir"><br>

					<label for="tally">Tally</label><br>
			        <input type="number" id="tally" name="tally"><br>

					<label for="bongkar">Bongkar Barang</label><br>
			        <input type="text" id="bongkar" name="bongkar"><br>
						<script type="text/javascript">
						$(function() {

						$('input[name="bongkar"]').daterangepicker({
							autoUpdateInput: false,
							locale: {
								cancelLabel: 'Clear'
							}
						});

						$('input[name="bongkar"]').on('apply.daterangepicker', function(ev, picker) {
							$(this).val(picker.startDate.format('MM/DD/YYYY') + ' s/d ' + picker.endDate.format('MM/DD/YYYY'));
						});

						$('input[name="bongkar"]').on('cancel.daterangepicker', function(ev, picker) {
							$(this).val('');
						});

						});
						</script>

					<label for="area">Area</label><br>
			        <input type="text" id="area" name="area"><br>

					<label for="tanggal">Tanggal</label><br>
					<input type="text" name="tanggal"/><br>
						<script type="text/javascript">
							$(function() {
								$('input[name="tanggal"]').daterangepicker({
									singleDatePicker: true,
									showDropdowns: true,
								});
							});
						</script>

                </div>
				
            </div>
		</form>
	</div>
</div> 

</body>
</html>