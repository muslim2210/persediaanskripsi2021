<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );

if($_SESSION[level]=='beli') {

	if(!empty($_POST[keterangan])||!empty($_POST[jumlah])||$_POST[kode]=='-'){
	$jumlah_yg_diretur=-1*$_POST[jumlah];
	if ((sisa_barang($_POST[kode])+$_POST[jumlah])>jml_max($_POST[kode])) {
	echo "<h3>Error</h3><p>Penjualan melebihi persediaan barang</p>";
		} 
		
		else if(jml_barang($_POST[kode],'K')<$jumlah_yg_diretur) {
		echo "Jumlah retur melebiihi jumlah yang dijual ";	
		exit;	
		}

		else 
		{
		
		$sql_simpan=mysql_query("insert into tbltransaksi (
		IDBarang,TglTransaksi,Keterangan,Jumlah,Status ) 
		values
		('$_POST[kode]','$_POST[tanggal]',
		'$_POST[keterangan]','$jumlah_yg_diretur','K')") ; 
		echo("<META HTTP-EQUIV=Refresh CONTENT=\"0.1;URL=index.php?file=retur_jual_form&tgl=$_POST[tanggal]\">");
	    
	    }
	} else {
		echo "Keterangan dan Jumlah Tidak boleh kosong!";
		}
	
	} else {
echo "Akses ditolak!";
}
?>
