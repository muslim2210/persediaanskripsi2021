<?php 
		include ('../fpdf/fpdf.php');
include ('../config.php');

  $no=0;

		$pdf = new FPDF('L','cm','Legal');
		$pdf->AddPage();
		$pdf->SetFont('Helvetica','',14);
		$pdf->Write(0.5, nama_perusahaan);$pdf->Ln();
		$pdf->SetFontSize(10);
		$pdf->Write(0.5, 'DAFTAR Pembelian bulan : '.$_GET[bln]);$pdf->Ln();
		$pdf->Write(0.5, alamat_perusahaan);$pdf->Ln();

		$pdf->Ln();
		$pdf->SetFont('Helvetica','B',12);
		$pdf->cell(1,2, 'No.',1,0,'C');
		$pdf->cell(2.5,2, 'Kode',1,0,C);
		$pdf->cell(2.5,2, 'Tanggal',1,0,C);
		$pdf->cell(6,2, 'Nama Barang',1,0,C);
		$pdf->cell(13,2, 'Supplier',1,0,C);
		$pdf->cell(3,2, 'Jenis',1,0,C);
		$pdf->cell(2,2, 'Jml',1,0,C);
		$pdf->cell(2,2, 'Harga',1,0,C);
		$pdf->Ln();

		$sql=mysql_query("select * from v_laporan_pembelian where TglTransaksi like '$_GET[bln]%' order by IDTransaksi desc") or die (mysql_error());
		while ($data=mysql_fetch_array($sql)) {$no++;
		$pdf->SetFont('Helvetica','',10);
		$pdf->cell(1,0.5, $no.'.',1,0,'L');
		$pdf->cell(2.5,0.5, $data['IDBarang'],1);
		$pdf->cell(2.5,0.5, $data['TglTransaksi'],1);
//		$pdf->SetFont('Helvetica','',11);
		$nama=str_replace("\\","",$data['NamaBarang']);
		$pdf->cell(6,0.5, $nama,1);
		$pdf->cell(13,0.5, $data['NamaSupplier'],1);
		$pdf->cell(3,0.5, $data['Jenis'],1);
		$pdf->cell(2,0.5, $data['Jumlah'],1,'L');
		$pdf->cell(2,0.5, number_format($data['Harga'],0,",","."),1,'L');

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
