<?php
session_start();
include('config.php'); 
if (!empty($_POST[submit])){

$perintah_query=mysql_query(" SELECT * 
FROM tbluser
WHERE IDUser = '$_POST[username]'
AND Password = md5( '$_POST[password]' ) "); 
	if($hasil_cek=mysql_num_rows($perintah_query))
	{
	//sukess
	$datauser=mysql_fetch_array($perintah_query);
	$_SESSION[user] = $_POST[username];
	$_SESSION[nama] = $datauser[NamaUser];
	$_SESSION[level] = $datauser[Level];
	echo $_SESSION[level];

    header("Location: index.php");
	} else 
	{   
// gagal login
    header("Location: index.php?err=yes");

	}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi EOQ</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

<?php
if (empty($_SESSION[user])) { ?>

<div class="container bg-primary">

        <!-- Outer Row -->
        <div class="row justify-content-center ">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-8 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Aplikasi Persediaan PVC Compound</h1> 
                                        <hr>
                                        <div class="text-center">
                                            <p class="small">Silahkan masukan username dan password</p>
                                        </div>   
                                        <hr>
                                    </div>
                                    <form class="user" method="post" action="index.php">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan username..">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-user btn-block"
                                                id="submit" name="submit" value="LOGIN">
                                        </div>
                                       
                                    
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Jika Belum memiliki akun silahkan hubungi Administrator</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



<?php
} else { 
include('menu.php');

}
if (!empty($_GET[err])){
?>
<p><font color="red"><b>Gagal Login .. !!<br/>Cek Username dan Password</b></font></p>
<?php } ?>

<?php 
if(!empty($_GET[file])) 
{
	if(file_exists("file/$_GET[file].php")) 
	{
	include("file/$_GET[file].php");
	} else 
	{
	echo "<h2>Error !<br/>Halaman tidak ditemukan !</h2>";
	}

    

}
else {

if ($_SESSION[level]=='beli' ||$_SESSION[level]=='manajer'){ 

include('file/intro.php');

}
}
?>

</td>

</tr>







</div>
  <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Bukhori Muslim 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout jika ingin keluar dari Aplikasi !</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>