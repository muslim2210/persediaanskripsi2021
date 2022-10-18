<?php
session_start();
if($_SESSION[level]=='beli'||$_SESSION[level]=='manajer') {
include('../config.php');
$hari_ini=date("d-M-Y");
$sql_tblsuplier=mysql_query("select * from tblsupplier order by IDSupplier asc");
?>
<html>
<head>
<title><?php echo nama_perusahaan;?></title>
<link rel="stylesheet" type="text/css" href="../css/print.css" />
</head>
<body>
<h2 align=center>Laporan Data Supplier<br>
<?php echo nama_perusahaan;?><br>
<?php echo alamat_perusahaan;?></h2>
<br/>

<table class="table">
<tr>
<th width="2">No.</th>
<th width="60">Kode Suplier</th>
<th>Nama Suplier</th>
<th>Alamat Suplier</th>
<th>No. Telp</b></th>
</tr>
<?php
while($baris_tblsuplier=mysql_fetch_array($sql_tblsuplier)) {
$no++;
if($n==0){$warna="";$n++;} else {$warna="#dedee";$n--;}
?>
<tr valign="top">
<td><?php echo $no;?>.</td>
<td><?php echo $baris_tblsuplier[IDSupplier];?>&nbsp;</td>
<td><?php echo $baris_tblsuplier[NamaSupplier];?>&nbsp;</td>
<td><?php echo $baris_tblsuplier[AlamatSupplier];?>&nbsp;</td>
<td><?php echo $baris_tblsuplier[Telepon];?>&nbsp;</td>
</tr>
<?php } ?>
</table>
<br>
<p align="right">Kuningan, <?php echo $hari_ini;?>
<br>
<br>
<br>
<br>
<u><b><?php echo nama_pimpinan;?><b></u></p>
</body>
</html>

<?php 
} else {
echo"Akses ditolak ! ";
}
?>
