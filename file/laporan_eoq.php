<?php 
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli'||$_SESSION[level]=='sales'||$_SESSION[level]=='manajer') {
?>



<div class="container-fluid">
	<h3 align="center">Laporan Hasil Hitung Metode EOQ</h3>
		<br>
	<div class="card shadow mb-4">


<p>[<a href="index.php">Kembali Ke Dashboard</a>]</p>


<table class="table">

<thead class="thead-dark">
<tr valign="center" align="center">
<th width="5" rowspan="2">No.</th>
<th width="450" rowspan="2">Kode Barang - Nama Barang</th>

</tr>
<th width="365">Kebutuhan Per Tahun</th>
<th width="365">Pemesanan Economis(EOQ)</th>
<th width="365">Frekuensi Pemesanan EOQ Pertahun</th>
<th width="365">Frekuensi Hari Pemesanan</th>
</thead>	
</tr>

<?php
$sql_tbleoq=mysql_query("select * from tbleoq order by IDBarang asc");
while($baris_tbleoq=mysql_fetch_array($sql_tbleoq)) {
$no++;
if($n==0){$warna="";$n++;} else {$warna="#dedee";$n--;}
?>

<tbody>
<tr valign="top">

<td><?php echo $no;?>.</td>

<td><?php echo $baris_tbleoq[IDBarang];?> - <?php echo $baris_tbleoq[NamaBarang];?></td>

<td><?php echo str_replace(",",".",number_format($baris_tbleoq[KebTahun],0));?> (Zak)</td>

<?php 
// RUMUS EOQ
    $r = $baris_tbleoq[KebTahun];
	$s = $baris_tbleoq[BiyPesan];;
	$p = $baris_tbleoq[Harga];
	$i = $baris_tbleoq[BiySimpan];

	$hasil1 = 2*$r*$s;
	
	$hasil2 = $p*$i;
	
	$hasilttl = $hasil1/$hasil2;
	$hasilakhir = sqrt($hasilttl);
	$hasilbulat = round($hasilakhir,0,0);
	
?>
<td>
	<?php echo $hasilbulat; ?> (Zak)
</td>

<?php 
// RUMUS EOQ F PERTAHUN
$ftahun = $baris_tbleoq[KebTahun]/$hasilbulat;
$ftahunbulat = round($ftahun,0,0);
?>
<td>
	<?php echo $ftahunbulat; ?> kali dalam 1 Tahun
</td>

<?php 
// Rumus EOQ F hari sekali
$fhari = 365/$ftahunbulat;
$fharibulat = round($fhari);

 ?>
<td><?php echo $fharibulat;?> hari sekali melakukan pemesanan</td>
</tr>

<?php } ?>
</tbody>
</table>
<br>

<a href="./file/persediaan_print.php" target="_blank" class="text-center">[Tampilan Cetak]</a></p>


</div>
</div>

<?php
} else {
echo "Akses ditolak ! ";
}
?>
