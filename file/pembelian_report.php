<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli'||$_SESSION[level]=='manajer') {
//query
$sql_tbltransaksi=mysql_query("select * from v_laporan_pembelian
where TglTransaksi like '$_POST[bln]%' order by IDTransaksi desc") or die
(mysql_error());
?>


<div class="container-fluid">
	<h3 align="center">Laporan Pembelian/Barang Masuk<br/>
Bulan : <?php echo bln_indonesia($_POST[bln]);?></h3>
<br>
	<div class="card shadow mb-4">


<p>[<a href="index.php">Kembali Ke Dashboard</a>]</p>

<table align="center" class="table">
<thead class="thead-dark">
<tr>
<th width="20"><b>No.</th>
<th width="120"><b>Tanggal Transaksi</th>
<th width="200"><b>Kode - Nama Barang</th>
<th>Supplier</th>
<th>Keterangan</th>
<th>Jumlah Pembelian</th>
<th>Harga Beli per zak</th>
<th>Total Harga</th>
</tr>
</thead>
<?php
if(mysql_num_rows($sql_tbltransaksi)>0){
	while($baris_tbltransaksi=mysql_fetch_array($sql_tbltransaksi)) {
	$no++;
	if($n==0) {$warna="";$n++;} else {$warna="#dedee";$n--;}
	?>
	<tr>
	<tbody>
	<td><?php echo $no;?>.</td>
	<td><?php echo $baris_tbltransaksi[TglTransaksi];?></td>
	<td><?php echo $baris_tbltransaksi[IDBarang]." - ".$baris_tbltransaksi[NamaBarang];?></td>
	<td><?php echo $baris_tbltransaksi[NamaSupplier] ?></td>
	<td><?php echo $baris_tbltransaksi[Keterangan];?></td>
	<td><?php echo str_replace(",",".",number_format($baris_tbltransaksi[Jumlah],0));?> (Zak)</td>
	<td>Rp. <?php echo number_format($baris_tbltransaksi[Harga],0,',','.');?></td>
	<td>Rp. <?php echo number_format(($baris_tbltransaksi[Jumlah]*$baris_tbltransaksi[Harga]),0,',','.');?></td>
<?php	
}
} else {
?>
	<tr align="center"><td colspan="6"><b><font color="red">Tidak Ada Transaksi Pembelian !</font></b></td></tr>
<?php } ?>
</tbody>
</table>
<br><br>

<p align="center">[<a href="./file/pembelian_print.php?bln=<?php echo $_POST[bln];?>" target="_blank">Tampilan Cetak</a>]</p>
<br>
<p align="center">[<a href="./pdf/pembelian.php" target="_blank">Tampilan Cetak PDF</a>]</p>
</div>
</div>

<?php
} else {

echo"Akses di tolak! anda login sebagai $_SESSION[level]";
}

?>
