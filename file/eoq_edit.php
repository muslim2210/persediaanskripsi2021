<?php   
defined("VALIDASI") or die ('Tidak diperkenankan mengakses file ini secara langsung !');
if($_SESSION[level]=='beli'||$_SESSION[level]=='manajer') {
$data_eoq=mysql_fetch_array(mysql_query("select * from tbleoq where IDEoq='$_GET[id]'"));
$kode_barang=$data_eoq[IDBarang];
?>

<div class="container-fluid">
	<!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800">Edit Data EOQ : <?php echo nama_barang($kode_barang);?></h1>
 <br>
 <div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary"><p>Untuk mengedit Data EOQ, silahkan isi pada kolom yang disediakan.</p>.</h6>
    </div>
     <div class="card-body">

		<form name="f1"method=post action="index.php?file=eoq_update">

			<div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Kode Barang</label>
			  <div class="col-sm-4">
				<input class="form-control" type="text" name="kode_barang" value="<?php echo $data_eoq[IDBarang];?>" readonly="yes">
							      
			  </div>
			</div>

			                  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Barang</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="text" name="nama_barang" size="50" value="<?php echo $data_eoq[NamaBarang];?>" maxlength="100" readonly="yes">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Satuan Barang</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="text" name="harga_barang" value="<?php echo $data_eoq[Harga];?>" maxlength="100" readonly="yes">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Kebutuhan Per Tahun</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="keb_tahun" maxlength="110" value="<?php echo $data_eoq[KebTahun];?>">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Biaya Simpan</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="biy_simpan" maxlength="110" value="<?php echo $data_eoq[BiySimpan];?>">
					
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 col-form-label">Biaya Pesan</label>
							    <div class="col-sm-4">
							      <input class="form-control" type="numeric" name="biy_pesan" maxlength="110" value="<?php echo $data_eoq[BiyPesan];?>">
					
							    </div>
							  </div>
							  <br>

							  <div class="form-group row">
							    <div class="col-sm-4">
							      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
							    </div>
							  </div>
		</form>
<p>[<a href="index.php">Kembali Ke Dashboard</a>]</p>
    </div>
  </div>

<?php
include('eoq_view.php');

} else {
	
echo "Akses ditolak !";	
}	
?>

</div>

