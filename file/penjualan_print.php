<?php  
session_start();
if($_SESSION[level]=='beli'||$_SESSION[level]=='manajer') {
include('../config.php');
$sql_tbltransaksi=mysql_query("select * from v_laporan_penjualan
where Tgltransaksi like '$_GET[bln]%' and jumlah>0  order by IDtransaksi desc") or die
(mysql_error());
$hari_ini=date("d-M-Y");

?>
<html>
<head>
<title>Aplikasi Penjualan Barang</title>
<link rel="stylesheet" type="text/css" href="../css/print.css" />
</head>
<body>
<h2 align="center">Laporan Penjualan Barang
<?php echo nama_perusahaan;?><br>
<?php echo alamat_perusahaan;?></h2>
<p><b>Bulan : <?php echo bln_indonesia($_GET[bln]);?></b></p>

<table align="center" class="table">
<tr>
<th width="20"><b>No.</th>
<th width="150"><b>Kode - Nama Barang</th>
<th>Keterangan</th>
<th>Tanggal Transaksi</th>
<th>Harga Beli</th>
<th>Harga Jual</th>
<th>Jumlah Penjualan Barang</th>
<th>Total Harga Penjualan</th>
</tr>
<?php
while($baris_tbltransaksi=mysql_fetch_array($sql_tbltransaksi)) {
$no++;
if($n==0) {$warna="";$n++;} else {$warna="#dedee";$n--;}
?>
<tr valign="top"bgcolor="$warna">
<td><?php echo $no;?>.</td>
<td><?php echo $baris_tbltransaksi[IDBarang]." - ".$baris_tbltransaksi[NamaBarang];?></td>
<td><?php echo $baris_tbltransaksi[Keterangan];?></td>
<td><?php echo $baris_tbltransaksi[TglTransaksi]; ?></td>
<td>Rp. <?php echo str_replace(",",".",number_format($baris_tbltransaksi[Harga],0));?></td>
<td>Rp. <?php echo str_replace(",",".",number_format($baris_tbltransaksi[PhotoBrg],0));?></td>
<td><?php echo str_replace(",",".",number_format($baris_tbltransaksi[Jumlah],0));?> (pcs)</td>

<?php 
$harga = $baris_tbltransaksi[PhotoBrg];
$jumlah = $baris_tbltransaksi[Jumlah];
$Total = $harga*$jumlah;


 ?>

<td>Rp. <?php echo str_replace(",",".",number_format($Total,0));?></td>

</tr>
<?php
}
?>
</table>
<br>
<p align="right">Bekasi, <?php echo $hari_ini;?>
<br>
<br>
<br>
<br>
<u><b><?php echo nama_pimpinan;?><b></u></p>
</body>
</html>

<?php
} else {

echo"Akses di tolak!";
}

?>