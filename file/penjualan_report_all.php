<?php
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION[level]=='beli' ||$_SESSION[level]=='manajer') {
//query
$sql_tbltransaksi=mysql_query("select * from v_laporan_penjualan where TglTransaksi like '%$_POST[bln]%' and Jumlah>0 order by IDTransaksi desc") or die
(mysql_error());
?>
<div class="container-fluid">
<h3 align="center">Daftar Penjualan Barang Keluar</h3>
<br>
    <div class="card shadow mb-4">
		<p>[<a href="index.php">Kembali Ke Dashboard</a>]</p>
			<table align="center" class="table">
			<thead class="thead-dark">
			<tr>
			<th width="20"><b>No.</th>
			<th width="150"><b>Kode - Nama Barang</th>
			<th>Keterangan</th>
			<th>Tanggal Transaksi</th>
			<th>Harga Beli per Zak</th>
			<th>Harga Jual per Zak</th>
			<th>Jumlah Penjualan Barang</th>
			<th>Total Harga Penjualan</th>
			</tr>
		    </thead>
			<?php
			while($baris_tbltransaksi=mysql_fetch_array($sql_tbltransaksi)) {
			$no++;
			if($n==0) {$warna="";$n++;} else {$warna="#dedee";$n--;}
			?>
			<tbody>
			<tr>
			<td><?php echo $no;?>.</td>
			<td><?php echo $baris_tbltransaksi[IDBarang]." - ".$baris_tbltransaksi[NamaBarang];?></td>
			<td><?php echo $baris_tbltransaksi[Keterangan];?></td>
			<td><?php echo $baris_tbltransaksi[TglTransaksi]; ?></td>
			<td>Rp. <?php echo str_replace(",",".",number_format($baris_tbltransaksi[Harga],0));?></td>
			<td>Rp. <?php echo str_replace(",",".",number_format($baris_tbltransaksi[PhotoBrg],0));?></td>
			<td><?php echo str_replace(",",".",number_format($baris_tbltransaksi[Jumlah],0));?> (Zak)</td>

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
			</tbody>
			</table>
</div>
</div>
<?php
} else {

echo"Akses di tolak! anda login sebagai $_SESSION[level]";
}

?>