<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli'||$_SESSION[level]=='sales'||$_SESSION[level]=='manajer') {
?>


<div class="container-fluid">
	<h3 align="center">Daftar Persediaan Stok Barang</h3>
		<br>
	<div class="card shadow mb-4">


<p>[<a href="index.php">Kembali Ke Dashboard</a>]</p>


<table class="table">

<thead class="thead-dark">
<tr valign="center" align="center">
<th width="10" rowspan="2">No.</th>
<th width="150" rowspan="2">Nama Barang - Supplier</th>
<th colspan="4">Jumlah</th>
</tr>
<tr valign="center" align="center">
<th width="55">Masuk</th>
<th width="55">Keluar</th>
<th width="55">Retur</th>
<th width="55">Sisa ((M-K)+R)</th>	
</tr>
</thead>
<?php
$sql_tblbarang=mysql_query("SELECT * FROM  v_barang_supplier ") or die(mysql_error());
while($baris_barang=mysql_fetch_array($sql_tblbarang)) {
if (jml_barang($baris_barang[IDBarang],'M')>0){
$no++;
if ($n==0) {$warna="";$n++;} else {$warna="#dedee";$n--;}
if (sisa_barang($baris_barang[IDBarang])!=null) {$sisa=sisa_barang($baris_barang[IDBarang]);
$keluar=jml_barang($baris_barang[IDBarang],'K');} else {$sisa=jml_barang($baris_barang[IDBarang],'M');$keluar=0;}

if($sisa<=jml_min($baris_barang[IDBarang])) {
	$nama_barang="<font color=\"red\"><b>$baris_barang[NamaBarang] - $baris_barang[NamaSupplier]</b></font>";
	} else {$nama_barang="$baris_barang[NamaBarang] - $baris_barang[NamaSupplier]";}
?>
<tbody>
<tr valign="top" bgcolor="<?php echo $warna;?>">
<td><?php echo $no;?>.</td>
<td><?php echo $nama_barang;?></td>
<td align="right"><?php echo jml_barang($baris_barang[IDBarang],'M');?></td>
<td align="right"><?php echo $keluar;?></td>
<td align="right"><?php echo jml_retur($baris_barang[IDBarang]);?></td>
<td align="right"><?php echo $sisa;?></td></tr>
<?php
$total_masuk=$total_masuk+jml_barang($baris_barang[IDBarang],'M');
$total_retur=$total_retur+jml_retur($baris_barang[IDBarang]);
$total_keluar=$total_keluar+jml_barang($baris_barang[IDBarang],'K');
}
$total=($total_masuk+$total_retur)-$total_keluar;
}
?>
</tbody>

<thead class="thead-dark">
<tr align="center">
<th colspan="2" class="th2">Jumlah</th>
<th><?php echo str_replace(",",".",number_format($total_masuk,0));?> (Zak)</th>
<th><?php echo str_replace(",",".",number_format($total_keluar,0));?> (Zak)</th>
<th><?php echo str_replace(",",".",number_format($total_retur,0));?> (Zak)</th>
<th><?php echo str_replace(",",".",number_format($total,0));?> (Zak)</th>
</tr>
</thead>

</table>

<p align="center">Ket : Warna merah menunjukan persediaan telah mencapai Jumlah minimum <br/>
[<a href="./file/persediaan_print.php" target="_blank">Tampilan Cetak</a>]</p>

</div>
</div>

<?php
} else {
echo "Akses ditolak ! ";
}
?>
