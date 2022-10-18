<?php  
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );

if($_SESSION[level]=='beli' ||$_SESSION[level]=='manajer') {
//$kode_eoq=$_POST[kode_barang];

if (!is_numeric($_POST[keb_tahun])||!is_numeric($_POST[biy_simpan])||!is_numeric($_POST[biy_pesan])) {
	echo "<h3>Error</h3><p>form tidak boleh kosong atau form harus diisi dengan angka</p>";
exit;
} 



if(cek_eoq($kode_eoq)<1)
{
	if(!empty($_POST[kode_barang])||!empty($_POST[nama_barang])||!empty($_POST[harga_barang])||!empty($_POST[keb_tahun])||!empty($_POST[biy_simpan])||!empty($_POST[biy_pesan])){
	$sql_simpan=mysql_query("insert into tbleoq (
	IDBarang,NamaBarang,Harga,KebTahun,BiySimpan,BiyPesan ) 
	values
	('$_POST[kode_barang]','$_POST[nama_barang]',
	'$_POST[harga_barang]','$_POST[keb_tahun]','$_POST[biy_simpan]','$_POST[biy_pesan]')") ;
	echo("<META HTTP-EQUIV=Refresh CONTENT=\"0.1;URL=index.php?file=eoq_view2\">");
	} else {
	echo "Keterangan dan Jumlah Tidak boleh kosong!";
	}
} else {
	echo "<h2>Error !!</h2>
	<p></p>Kode Barang $_POST[kode_barang] untuk supplier ".nama_supplier($_POST[kode_supplier])." sudah ada !</p>";
	}

} else {
echo "Akses ditolak!";
}
?>
