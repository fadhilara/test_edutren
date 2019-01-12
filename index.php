<?php 	
$Host = "localhost";
$username = "root";
$password = "";
$database = "edutren";
$koneksi = new mysqli( $Host, $username, $password, $database );
if ($koneksi->connect_error){
echo 'Gagal koneksi ke database';
} else {
}

 $carikode = mysqli_query($koneksi, "select max(kode) from wali_kelas") or die (mysql_error());
  
  $datakode = mysqli_fetch_array($carikode);
  
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   
   $kode = (int) $nilaikode;
   
   $kode_otomatis = "WK".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "WK0001";
  }
  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Data Wali Kelas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="card">
    <div class="card-header bg-light text-dark">Tambah Data Wali Kelas</div>
    <div class="card-body">
      <form action="" method="post" role="form">
      	<div class="form-group">
          <label for="kode_wali_kelas" class="font-weight-bold">Kode Wali Kelas:</label>
           <input type="text" class="form-control" readonly name="kode" value="<?php echo $kode_otomatis; ?>">
        </div>
        <div class="form-group">
          <label for="nama" class="font-weight-bold">Nama Guru</label>
         	<select name="nama" class="custom-select">
   				<option selected>--PILIH--</option>
    			<option value="Fadhila">Fadhila</option>
    			<option value="Rizki">Rizki</option>
    			<option value="Anindita">Anindita</option>
  			</select>
        </div>
        <div class="form-group">
          <label for="kelas" class="font-weight-bold">Kelas</label>
          <select name="kelas" class="custom-select">
   				<option selected>--PILIH--</option>
    			<option value="7 SMP"> SMP</option>
    			<option value="8 SMP">8 SMP</option>
    			<option value="9 SMP">9 SMP</option>
  			</select>
        </div>
        <div class="form-group">
          <label for="tahun_ajaran" class="font-weight-bold">Tahun Ajaran</label>
           <input type="text" name="tahun" readonly class="form-control"value="2019">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
      </form>
       <?php
  if(isset($_POST['simpan'])){
  	$Host = "localhost";
	$username = "root";
	$password = "";
	$database = "edutren";
	$koneksi = new mysqli( $Host, $username, $password, $database );
if ($koneksi->connect_error){
echo 'Gagal koneksi ke database';
} else {
} 
  $simpan = mysqli_query($koneksi, "INSERT INTO wali_kelas (kode, nama, kelas, tahun) VALUES (
  	'".$_POST['kode']."',
    '".$_POST['nama']."',
    '".$_POST['kelas']."',
    '".$_POST['tahun']."')")or die(mysqli_error($koneksi));
    if($simpan){
    echo "<script>alert('Data anda berhasil disimpan!');history.go(-1);</script>";
    } else{
    echo "<script>alert('Data gagal disimpan!');history.go(-1);</script>";
    }
  }
   ?>
    </div>
  </div>
</div>
</body>
</html>

