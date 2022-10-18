<?php
session_start();
if($_SESSION[level]=='beli'||$_SESSION[level]=='manajer') {
include('../config.php');
$sql_tbltransaksi=mysql_query("select * from v_laporan_pembelian
where Tgltransaksi like '$_GET[bln]%' order by IDtransaksi desc") or die
(mysql_error());
$hari_ini=date("M-Y");

?>
<html>
<head>
<title><?php echo nama_perusahaan;?></title>
<link rel="stylesheet" type="text/css" href="../css/print.css" />
</head>
<body>
<h2 align=center>Laporan Pembelian Barang
<?php echo nama_perusahaan;?>
<br>
<?php echo alamat_perusahaan;?></h2>
<p><b>Bulan : <?php echo bln_indonesia($_GET[bln]);?></b></p>

<table align="center" class="table">
<tr>
<th width="20"><b>No.</th>
<th width="120"><b>Tanggal Transaksi</th>
<th width="200"><b>Kode - Nama Barang</th>
<th>Supplier</th>
<th>Keterangan</th>
<th>Jumlah Pembelian</th>
<th>Harga Beli Satuan</th>
<th>Total Harga</th>
</tr>

<?php
if(mysql_num_rows($sql_tbltransaksi)>0){
	while($baris_tbltransaksi=mysql_fetch_array($sql_tbltransaksi)) {
	$no++;
	if($n==0) {$warna="";$n++;} else {$warna="#dedee";$n--;}
	?>
	<tr valign="top"bgcolor="$warna">
	<td><?php echo $no;?>.</td>
	<td><?php echo $baris_tbltransaksi[TglTransaksi];?></td>
	<td><?php echo $baris_tbltransaksi[IDBarang]." - ".$baris_tbltransaksi[NamaBarang];?></td>
	<td><?php echo $baris_tbltransaksi[NamaSupplier] ?></td>
	<td><?php echo $baris_tbltransaksi[Keterangan];?></td>
	<td><?php echo str_replace(",",".",number_format($baris_tbltransaksi[Jumlah],0));?> (pcs)</td>
	<td>Rp. <?php echo number_format($baris_tbltransaksi[Harga],0,',','.');?></td>
	<td>Rp. <?php echo number_format(($baris_tbltransaksi[Jumlah]*$baris_tbltransaksi[Harga]),0,',','.');?></td>
<?php	
}
} else {
?>
	<tr align="center"><td colspan="6"><b><font color="red">Tidak Ada Transaksi Pembelian !</font></b></td></tr>
<?php } ?>
</table>
<br>
<p align="right">Bekasi, 01-<?php echo $hari_ini;?>
<br>
<br>
<br>
<br>
<u><b><?php echo nama_pimpinan;?><b></u></p>

<input type="button" value="Print" OnClick="javascript:window.print();">
<input type="button" value="Tutup" OnClick="javascript:window.close();">

</body>
</html>

<?php
} else {

echo"Akses di tolak! anda login sebagai $_SESSION[level]";
}

?>
