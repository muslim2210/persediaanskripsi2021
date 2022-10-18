<?php
		include ('../fpdf/fpdf.php');
include ('../config.php');

  $no=0;

		$pdf = new FPDF('L','cm','Legal');
		$pdf->AddPage();
		$pdf->SetFont('Helvetica','',14);
		$pdf->Write(0.5, nama_perusahaan);$pdf->Ln();
		$pdf->SetFontSize(10);
		$pdf->Write(0.5, 'DAFTAR DATA BARANG');$pdf->Ln();
		$pdf->Write(0.5, alamat_perusahaan);$pdf->Ln();

		$pdf->Ln();
		$pdf->SetFont('Helvetica','B',12);
		$pdf->cell(1,2, 'No.',1,0,'C');
		$pdf->cell(2.5,2, 'Kode',1,0,C);
		$pdf->cell(5.5,2, 'Nama Barang',1,0,C);
		$pdf->cell(4,2, 'Jenis Barang',1,0,C);
		$pdf->cell(5.5,2, 'Harga Beli Satuan',1,0,C);
		$pdf->cell(5.5,2, 'Harga Jual Satuan',1,0,C);
		$pdf->cell(5,2, 'Jml Min. Penyimpanan',1,0,C);
		$pdf->cell(5,2, 'Jml Max. Penyimpanan',1,0,C);
		$pdf->Ln();

		$sql=mysql_query("select * from tblbarang order by IDBarang asc");
		while ($data=mysql_fetch_array($sql)) {$no++;
		$pdf->SetFont('Helvetica','',10);
		$pdf->cell(1,0.5, $no.'.',1,0,'L');
		$pdf->cell(2.5,0.5, $data['IDBarang'],1);
		$pdf->SetFont('Helvetica','',11);
		$nama=str_replace("\\","",$data['NamaBarang']);
		$pdf->cell(5.5,0.5, $nama,1);
		$pdf->cell(4,0.5, $data['Jenis'],1);
		$hargabeli=str_replace(",",".",number_format($data[Harga],0));
		$pdf->cell(5.5,0.5, 'Rp. '.$hargabeli,1);
		$hargajual=str_replace(",",".",number_format($data[PhotoBrg],0));
		$pdf->cell(5.5,0.5, 'Rp. '.$hargajual,1);
		$jmin=str_replace(",",".",number_format($data[Jml_min],0));
		$pdf->cell(5,0.5, $jmin,1);
		$jmax=str_replace(",",".",number_format($data[Jml_max],0));
		$pdf->cell(5,0.5, $jmax,1);
	


		$pdf->Ln();
		}


		$pdf->Ln();$no=0;
		$pdf->Ln();
		$pdf->SetFont('Helvetica','',12);
		$pdf->cell(0.5,0.5, 'Bekasi, '. date("d M Y"));$pdf->Ln(0.75);
		$pdf->cell(0.5,0.5, 'Pimpinan');$pdf->cell(7);
		$pdf->cell(0.5,0.5, '');$pdf->cell(7);
		$pdf->cell(0.5,0.5, '');$pdf->cell(4);$pdf->Ln(1.5);$pdf->Ln(1.5);
		$pdf->cell(0.5,0.5, nama_pimpinan);$pdf->cell(7);
		$pdf->SetFont('Helvetica','BU',12);
		$pdf->Output();
		exit;

?>
