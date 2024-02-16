<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit E-Form Faktur Timbang Kelapa</title>

	<style type="text/css">

	/* ::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; } */

	body {
		background-color: #CAE4F3;
		margin: 60px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
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
	}

	</style>
</head>
<body>

<div id="container">
	<h1>Edit Data E-Form Faktur Timbang Kelapa</h1>

	<div id="body">

		<form action="<?php echo base_url('index.php/welcome/fungsiEdit');?>" method="post">

			<input type="hidden" id="id" name="id" value="<?php echo $queryDataEdits->id?>"> <br>

			<label for="berat">Berat Brutto (Kg)</label><br>
			<input type="number" id="berat" name="berat" value="<?php echo $queryDataEdits->berat?>"> <br>

			<!-- required -->

			<label for="jaring">Jaring (Kg)</label><br>
			<input type="number" id="jaring" name="jaring" value="<?php echo $queryDataEdits->jaring?>"><br>

			<label for="persen">Persen (Kg)</label><br>
			<input type="number" id="persen" name="persen" value="<?php echo $queryDataEdits->persen?>"><br>

			<label for="beratnet">Berat Net (Kg)</label><br>
			<input type="number" id="beratnet" name="beratnet" value="<?php echo $queryDataEdits->beratnet?>"><br>

			<label for="harga">Harga (@Kg)</label><br>
			<input type="number" id="harga" name="harga" value="<?php echo $queryDataEdits->harga?>"><br>

			<label for="jumlah">Jumlah Kelapa (Butir)</label><br>
			<input type="number" id="jumlah" name="jumlah" value="<?php echo $queryDataEdits->jumlah?>"><br>

			<button type="submit">Submit</button>
		</form>
	</div>
</div> 

</body>
</html>