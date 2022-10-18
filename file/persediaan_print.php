<?php
session_start();
if($_SESSION[level]=='beli'||$_SESSION[level]=='sales'||$_SESSION[level]=='manajer') {
include("../config.php");
$hari_ini=date("d-M-Y");
?>
<html>
<head>
<title><?php echo nama_perusahaan;?></title>
<link rel="stylesheet" type="text/css" href="../css/print.css" />
</head>
<body>
<h2 align=center>Laporan Persediaan Barang<br>
<?php echo nama_perusahaan;?><br>
<?php echo alamat_perusahaan;?></h2>
<br/>
<table class="table">
<tr>
<th width="20" rowspan="2">No.</th>
<th width="150" rowspan="2">Nama Barang<br>Supplier</th>
<th colspan="4">Jumlah</th>
</tr>
<tr valign="center">
<th width="55">Masuk</th>
<th width="55">Keluar</th>
<th width="55">Retur</th>
<th width="55">Sisa ((M-K)+R)</th>	

</tr>
<?php
$sql_tblbarang=mysql_query("SELECT * FROM  v_barang_supplier ")or die(mysql_error());
while($baris_barang=mysql_fetch_array($sql_tblbarang)) {
if (jml_barang($baris_barang[IDBarang],'M')>0){
if (sisa_barang($baris_barang[IDBarang])!=null) {$sisa=sisa_barang($baris_barang[IDBarang]);
$keluar=jml_barang($baris_barang[IDBarang],'K');} else {$sisa=jml_barang($baris_barang[IDBarang],'M');$keluar=0;}
$no++;
?>
<tr valign="top">
<td><?php echo $no;?>.</td>
<td><?php echo $baris_barang[NamaBarang];?> - <?php echo $baris_barang[NamaSupplier];?></td>
<td align="right"><?php echo jml_barang($baris_barang[IDBarang],'M');?>&nbsp;</td>
<td align="right"><?php echo $keluar;?>&nbsp;</td>
<td align="right"><?php echo jml_retur($baris_barang[IDBarang]);?></td>
<td align="right"><?php echo $sisa;?>&nbsp;</td></tr>
<?php
$total_masuk=$total_masuk+jml_barang($baris_barang[IDBarang],'M');
$total_retur=$total_retur+jml_retur($baris_barang[IDBarang]);
$total_keluar=$total_keluar+jml_barang($baris_barang[IDBarang],'K');
}
$total=($total_masuk+$total_retur)-$total_keluar;
}
?>
<tr align="center">
<th colspan="2">Jumlah</th>
<th align="right"><?php echo $total_masuk;?>&nbsp;</th>
<th align="right"><?php echo $total_keluar;?>&nbsp;</th>
<th align="right"><?php echo $total_retur;?></th>
<th align="right"><?php echo $total;?>&nbsp;</th>
</table>
<br>
<p align="right">Bekasi, <?php echo $hari_ini;?>
<br>
<br>
<br>
<br>
<u><b><?php echo nama_pimpinan;?><b></u>
</p>
</body>
</html>
<?php
}
?>
