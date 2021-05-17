<?php
	require_once __DIR__ . '../../../mpdf/vendor/autoload.php';

	$mpdf = new \Mpdf\Mpdf();
	$html = '<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Barang</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<h1 align="center">Laporan Data Barang</h1>
	<table border="1" cellpadding="10" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kode Barang</th>
				<th align="left">Nama Barang</th>
				<th>Harga</th>
				<th align="left">Satuan</th>
			</tr>
		</thead>
		<tbody>';
			$no = 0;
			$query = $con->query("SELECT * FROM barang ORDER BY kode_barang ASC");
			$bgcolor = "";
			foreach ($query as $barang) {
				if ($no % 2 == 0) {
					$bgcolor = "#ddd";
				} else {
					$bgcolor = "white";
				}

				$html .= 
					'<tr bgcolor='.$bgcolor.'>
						<td align="center">'.++$no.'.</td>
						<td align="center">'.$barang["kode_barang"].'</td>
						<td>'.$barang["nama_barang"].'</td>
						<td align="center">Rp. '.number_format($barang["harga"]).'</td>
						<td>'.$barang["satuan"].'</td>
					</tr>';
			}

			

	$html .=	'</tbody>
	</table>

	<p>
		Pemilik <br><br><br><br>

		Suripah
	</p>
</body>
</html>'; 
	$mpdf->WriteHTML($html);
	date_default_timezone_set('Asia/Jakarta');
	$date = date("d - m - Y H-i-s");
	$mpdf->Output('Laporan Data Barang - '.$date.'.pdf', 'I');

?>