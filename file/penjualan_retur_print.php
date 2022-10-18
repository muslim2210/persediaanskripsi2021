<?php
if($_SESSION[level]=='beli'|| $_SESSION[level]=='manajer') {
//query
$sql_tbltransaksi=mysql_query("select * from v_laporan_penjualan
where Tgltransaksi like '$_POST[bln]%' and jumlah<0 order by IDtransaksi desc") or die
(mysql_error());
?>
<h3 align="center">Laporan Pengembalian Barang (Retur)<br/>
Bulan : <?php echo bln_indonesia($_POST[bln]);?></h3>

<table align="center" class="table">
<tr>
<th width="20"><b>No.</th>
<th><b>Tanggal</th>
<th width="150"><b>Barang</th>
<th>Keterangan</th>
<th colspan="2">Jml. Barang</th>
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
	<td><?php echo $baris_tbltransaksi[Keterangan];?></td>
	<td align="right"><?php echo abs($baris_tbltransaksi[Jumlah]);?></td>
	<td width="20">
	[<a href="index.php?file=pembelian_hapus&id=<?php echo $baris_tbltransaksi[IDtransaksi];?>">Hapus</a>]</td>
	</tr>
<?php	
}
} else {
?>
	<tr align="center"><td colspan="6"><b><font color="red">Tidak Ada Transaksi Penjualan !</font></b></td></tr>
<?php } ?>
</table>
<p align="center">[<a href="./file/penjualan_print.php?bln=<?php echo $_POST[bln];?>" target="_blank">Tampilan Cetak</a>]</p>

<?php
} else {

echo"Akses di tolak! anda login sebagai $_SESSION[level]";
}

?>
