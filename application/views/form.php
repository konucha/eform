<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-Form Faktur Timbang Kelapa</title>

	<style type="text/css">

		.container{
			width: 100%;
			display: flex;
			margin-left: 50px;
			margin-right: 50px;
		} 

		div{
			/* margin-left: 100px;
			margin-right: 100px;
			margin-top: 30px; */
			padding: 30px;
			text-align: center;
			background-color: #666666;
		}

		table {
			width: max-content;
			height: auto;
			border: 1px;
		}

		td, th {
			padding: 5px;
		}

		.center {
			display: flex;
			justify-content: center;
		}

		@page { 
			size: A4 landscape 
		}

		body { 
			font: normal 10pt Arial;
		}

		h1 { 
			font: bold 20pt Arial; 
			text-align: left; 
			margin: 30pt; 
			color: #666666;
		}

		/* h2 { font: bold 15pt Arial; text-align: right; margin: 15pt; color: #999999; float: right; } */
		p { 
			margin: 10pt; 
		}


	</style>
</head>
<body>
	<div class="container">
		<div>
			<img src="img/logo.jpeg" alt="Logo" width="20" height="30">
		</div>
		<div>
			PT PULAU SAMBU<br>
        	FAKTUR TIMBANG KELAPA BULAT JAMBUL PANCANG<br>
        	COCONUT PURCHASE INVOICE
		</div>
		<div>
			Tanggal  : <span id="tgl_transaksi"></span><br>
        	No. Invoice : <span id="no_invoice"></span><br>
        	Page : 1/1
		</div>

	<!-- <table width="100%">
    <thead>
      <tr>
        <th><img src="img/logo.jpeg" alt="Logo" width="20" height="30"></th>        
		<th>PTULAU SAMBU<br>
        	FAKTUR TIMBANG KELAPA BULAT JAMBUL PANCANG<br>
        	COCONUT PURCHASE INVOICE</th>
        <th>Tanggal  : <span id="tgl_transaksi"></span><br>
        	No. Invoice : <span id="no_invoice"></span><br>
        	Page : 1/1</th>
      </tr>
    </thead>
  </table> -->
  </div>
</body>
</html>
