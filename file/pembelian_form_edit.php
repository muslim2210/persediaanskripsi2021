<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli') {
if(!empty($_POST[tgl_transaksi])) {$tgl_transaksi=$_POST[tgl_transaksi];} else {$tgl_transaksi=$_GET[tgl];}
		
		$tgl_hari_ini=date("Y-m-d");
		if ($_POST[tgl_transaksi]<=$tgl_hari_ini){
?>

<h3>Edit Data Barang</h3>
<p>Untuk melakukan transaksi, silahkan isi pada kolom yang disediakan.</p>
<form name="f1" method=post action="index.php?file=pembelian_save">
<table width="100%"align=center>
<tr><td>Kode - Nama Barang</td><td><input type="hidden" value="<?php echo $tgl_transaksi;?>" name="tanggal">
<select name="kode">
<option value="-">--Pilih Barang--</option>
<?php
$sql_tblbarang=mysql_query("SELECT tblbarang.Harga, tblbarang.IDBarang,tblbarang.NamaBarang, tblsupplier.NamaSupplier
FROM tblbarang
JOIN tblsupplier ON tblsupplier.IDSupplier = tblbarang.IDSupplier
ORDER BY Jenis ASC");
while($baris_tblbarang=mysql_fetch_array($sql_tblbarang)) {
echo"<option value=\"$baris_tblbarang[IDBarang]\">$baris_tblbarang[NamaSupplier] | $baris_tblbarang[NamaBarang] | Rp. $baris_tblbarang[Harga] </option>";
}
?>

</select></td></tr>
<tr><td>Keterangan </td><td><input type="text" name="keterangan" maxlength="100"></td></tr>
<tr><td>Jumlah Pembelian</td><td><input type="text" name="jumlah" size="20" maxlength="1000"></td></tr>
<tr><td colspan=2><input type="submit" name="simpan" value="Simpan"></td></tr>
</table>
</form>
<br/>
<?php
include("./file/pembelian_view.php");

} else { 
		echo "Error - Tanggal lebih dari hari ini";
		}


} else {
echo"Akses ditolak!";
}

?>
