<?php
function cek_supplier($kode_supplier) {
$hasil_cek=mysql_num_rows(mysql_query("select IDSupplier from tblsupplier where IDSupplier='$kode_supplier'"));
return $hasil_cek;
}

function cek_barang($kode_barang) {
$hasil_cek=mysql_num_rows(mysql_query("select IDBarang from tblbarang where IDBarang='$kode_barang'"));
return $hasil_cek;
}

//tambah baru function tabel eoq

function cek_eoq($kode_eoq) {
$hasil_cek=mysql_num_rows(mysql_query("select IDEoq from tbleoq where IDEoq='$kode_eoq'"));
return $hasil_cek;
}
// tambah baru tabel transaksi
function cek_transaksi($kode_transaksi) {
$hasil_cek=mysql_num_rows(mysql_query("select IDTransaksi from tbltransaksi where IDTransaksi='$kode_transaksi'"));
return $hasil_cek;
}


function cek_penjualan($tgl_transaksi) {
$hasil_cek=mysql_num_rows(mysql_query("select *  from v_laporan_penjualan where TglTransaksi='$tgl_transaksi'"));
return $hasil_cek;
}

function jml_barang($kode_barang,$status){
$hasil_hitung=mysql_fetch_array(mysql_query("select sum(jumlah) as jumlah from tbltransaksi where IDBarang='$kode_barang' and status='$status' and Jumlah>0"));
return $hasil_hitung[jumlah];
}

function jml_retur($kode_barang){
$hasil_hitung=mysql_fetch_array(mysql_query("select sum(jumlah) as jumlah from tbltransaksi where IDBarang='$kode_barang' and status='K' and Jumlah<0"));
return abs($hasil_hitung[jumlah]);
}

function sisa_barang($kode_barang){
$hasil_sisa=mysql_fetch_array(mysql_query("select tblbarang.IDBarang ,(select sum(jumlah) as jml FROM 
tbltransaksi 
where status='M' and IDBarang='$kode_barang'
group by IDBarang)-(select sum(jumlah) as jml FROM 
tbltransaksi 
where status='K' and IDBarang='$kode_barang'
group by IDBarang)
as sisa from tblbarang where IDBarang='$kode_barang'
"));

return $hasil_sisa[sisa];
}

function ambil_tgl_transaksi($id) {
$sql_tgl=mysql_fetch_array(mysql_query("select * from tbltransaksi where IDTransaksi='$id'"));
return $sql_tgl[TglTransaksi];
}

function ambil_kode_supplier($kode_barang) {
$sql_supplier=mysql_fetch_array(mysql_query("select * from tblbarang where IDBarang='$kode_barang'"));
return $sql_supplier[IDSupplier];
}

function ambil_kode_barang($kode_barang) {
$sql_barang=mysql_fetch_array(mysql_query("select * from tblbarang where IDBarang='$kode_barang'"));
return $sql_supplier[IDSupplier];
}

function bln_indonesia($bulan) {
$array_bulan=array("01"=>"Januari",
"02"=>"Feb",
"03"=>"Mar",
"04"=>"April",
"05"=>"Mei",
"06"=>"Juni",
"07"=>"Juli",
"08"=>"Agustus",
"09"=>"September",
"10"=>"Oktober",
"11"=>"Nopember",
"12"=>"Desember");
$bln_temp=explode("-",$bulan);
$bln=$bln_temp[1];
$thn=$bln_temp[0];
$nama_bulan=$array_bulan[$bln];
return $nama_bulan." ".$thn;
}

function tgl_indonesia($tanggal) {
$array_bulan=array("01"=>"Januari",
"02"=>"Februari",
"03"=>"Maret",
"04"=>"April",
"05"=>"Mei",
"06"=>"Juni",
"07"=>"Juli",
"08"=>"Agustus",
"09"=>"September",
"10"=>"Oktober",
"11"=>"Nopember",
"12"=>"Desember");
$tgl_temp=explode("-",$tanggal);
$tgl=$tgl_temp[2];
$bln=$tgl_temp[1];
$thn=$tgl_temp[0];
$nama_bulan=$array_bulan[$bln];
return $tgl." ".$nama_bulan." ".$thn;
}

function nama_supplier($kode_supplier) {
$sql_supplier=mysql_fetch_array(mysql_query("select * from tblsupplier where IDSupplier='$kode_supplier'"));
$nama_supplier=$sql_supplier[NamaSupplier];
return $nama_supplier;
}

//tambah baru function eoq
function nama_barang($kode_barang) {
$sql_barang=mysql_fetch_array(mysql_query("select * from tblbarang where IDBarang='$kode_barang'"));
$nama_barang=$sql_barang[NamaBarang];
return $nama_barang;
}

function harga_barang($kode_barang) {
$sql_barang=mysql_fetch_array(mysql_query("select * from tblbarang where IDBarang='$kode_barang'"));
$harga_barang=$sql_barang[Harga];
return $harga_barang;
}



function jml_max($kode_barang){
$jml_max=mysql_fetch_array(mysql_query("select Jml_max from tblbarang where IDBarang='$kode_barang' "));
return $jml_max[Jml_max];
}

function jml_min($kode_barang){
$jml_min=mysql_fetch_array(mysql_query("select Jml_min from tblbarang where IDBarang='$kode_barang' "));
return $jml_min[Jml_min];
}
?>
