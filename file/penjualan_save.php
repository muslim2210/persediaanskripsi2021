<?php  
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );

if($_SESSION[level]=='beli') {

if (!is_numeric($_POST[jumlah])) {
	echo "<h3>Error</h3><p>Kolom Jumlah Bukan Angka</p>";
	exit;
	}

	if(!empty($_POST[keterangan])||!empty($_POST[jumlah])){

		if (sisa_barang($_POST[kode])==null) {$sisa_barang=jml_barang($_POST[kode],'M');} else {
		$sisa_barang=sisa_barang($_POST[kode]);}

		
		if (($sisa_barang-$_POST[jumlah])<jml_min($_POST[kode])) {
		echo "<h3>Error</h3><p>Penjualan sebanyak <b>$_POST[jumlah]</b> mengakibatkan Jumlah minimum persediaan kurang dari <b>".jml_min($_POST[kode])."<br/>
		<br/><input type=\"button\" OnClick=\"javascript:history.back();\" value=\"[ Kembali ]\"></p>";
		} else {
		$sql_simpan=mysql_query("insert into tbltransaksi (
		IDBarang,TglTransaksi,Keterangan,Jumlah,Status ) 
		values
		('$_POST[kode]','$_POST[tanggal]',
		'$_POST[keterangan]','$_POST[jumlah]','K')") ; 
		echo("<META HTTP-EQUIV=Refresh CONTENT=\"0.1;URL=index.php?file=penjualan_form&tgl=$_POST[tanggal]\">");
	    
	    }
	} else {
		echo "Keterangan dan Jumlah Tidak boleh kosong!";
		}
	} else {
echo "Akses ditolak!";
}
?>
