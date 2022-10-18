<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );

if($_SESSION[level]=='beli') {

if (!is_numeric($_POST[jumlah])) {
	echo "<h3>Error</h3><p>Kolom Jumlah Bukan Angka</p>";
exit;

}

 
if ($_POST[jumlah]<0) {
	echo "<h3>Error</h3><pTidak boleh min</p>";
exit;
}
 

	if(!empty($_POST[keterangan])||!empty($_POST[jumlah])){


		if ((sisa_barang($_POST[kode])+abs($_POST[jumlah]))>jml_max($_POST[kode])){
		$kelebihan_kapasitas=abs($_POST[jumlah])-(jml_max($_POST[kode])-sisa_barang($_POST[kode]));	
		echo "<h3>Error</h3><p>Sisa barang ".sisa_barang($_POST[kode])."<br>
		Jml. Barang Over Kapasitas sebanyak <b>$kelebihan_kapasitas</b> </p>
		<p><input type=\"button\" value=\"Batal\" OnClick=\"javascript:history.back();\"></p>";

		}
		
		else 
		if ((sisa_barang($_POST[kode])+abs($_POST[jumlah]))<jml_min($_POST[kode])){

		$kelebihan_kapasitas=abs($_POST[jumlah])-(jml_max($_POST[kode])-sisa_barang($_POST[kode]));	
		echo "<h3>Error</h3><p>Sisa barang ".sisa_barang($_POST[kode])."<br>
		Jml. Barang dibawah kapasitas minimum <b>$kelebihan_kapasitas</b> </p>
		<p><input type=\"button\" value=\"Batal\" OnClick=\"javascript:history.back();\"></p>";
		}
		
	else if ($_POST[jumlah]<0)
		{ echo "JUmlah Tidak boleh minus";}		

		 else	{
		 	
		$sql_simpan=mysql_query("insert into tbltransaksi (
		IDBarang,TglTransaksi,Keterangan,Jumlah,Status ) 
		values
		('$_POST[kode]','$_POST[tanggal]',
		'$_POST[keterangan]',abs('$_POST[jumlah]'),'M')") ;
		echo("<META HTTP-EQUIV=Refresh CONTENT=\"0.1;URL=index.php?file=pembelian_form&tgl=$_POST[tanggal]\">");
	    
		}
		
	} else {
	
	echo "<h3>Error !</h3><p>Keterangan dan Jumlah Tidak boleh kosong !</p>";
	
	}

} else {
echo "Akses ditolak!";
}
?>
