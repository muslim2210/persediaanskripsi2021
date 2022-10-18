<?php
		include ('../fpdf/fpdf.php');
include ('../config.php');

  $no=0;

		$pdf = new FPDF('L','cm','Legal');
		$pdf->AddPage();
		$pdf->SetFont('Helvetica','',14);
		$pdf->Write(0.5, nama_perusahaan);$pdf->Ln();
		$pdf->SetFontSize(10);
		$pdf->Write(0.5, 'DAFTAR SUPPLIER');$pdf->Ln();
		$pdf->Write(0.5, alamat_perusahaan);$pdf->Ln();

		$pdf->Ln();
		$pdf->SetFont('Helvetica','B',12);
		$pdf->cell(1,2, 'No.',1,0,'C');
		$pdf->cell(2.5,2, 'Kode',1,0,C);
		$pdf->cell(6,2, 'Nama Supplier',1,0,C);
		$pdf->cell(13,2, 'Alamat',1,0,C);
		$pdf->cell(3,2, 'No. Telepon',1,0,C);
		$pdf->cell(6,2, 'Web Site',1,0,C);
		$pdf->Ln();

		$sql=mysql_query("select * from tblsupplier order by IDSupplier asc");
		while ($data=mysql_fetch_array($sql)) {$no++;
		$pdf->SetFont('Helvetica','',10);
		$pdf->cell(1,0.5, $no.'.',1,0,'L');
		$pdf->cell(2.5,0.5, $data['IDSupplier'],1);
		$pdf->SetFont('Helvetica','',11);
		$nama=str_replace("\\","",$data['NamaSupplier']);
		$pdf->cell(6,0.5, $nama,1);
		$pdf->cell(13,0.5, $data['AlamatSupplier'],1);
		$pdf->cell(3,0.5, $data['Telepon'],1);
		$pdf->cell(6,0.5, $data['web'],1);

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
