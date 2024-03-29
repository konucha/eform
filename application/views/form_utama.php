<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-Form Faktur Timbang Kelapa</title>

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

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
<?php endif;?> 

<div id="container">
	<h1>E-Form Faktur Timbang Kelapa</h1>

	<div id="body">

		<form action="formInput" method="post">
			<label for="berat">Berat Brutto (Kg)</label><br>
			<input type="number" id="berat" name="berat" required><br>

			<!-- required -->

			<label for="jaring">Jaring (Kg)</label><br>
			<input type="number" id="jaring" name="jaring" required><br>

			<label for="persen">Persen (Kg)</label><br>
			<input type="number" id="persen" name="persen" required min="0" max="100"><br>

			<label for="beratnet">Berat Net (Kg)</label><br>
			<input type="number" id="beratnet" name="beratnet" required><br>

			<label for="harga">Harga (@Kg)</label><br>
			<input type="number" id="harga" name="harga" required><br>

			<label for="jumlah">Jumlah Kelapa (Butir)</label><br>
			<input type="number" id="jumlah" name="jumlah" required><br>

			<button type="submit">Submit</button>
		</form>
	</div>
</div> 

</body>
</html>