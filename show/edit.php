<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Admin;

if (isset($_GET['id'])){
$act = new Admin();
$data = $act->getData($_GET['id']);
$edit = $data->fetch(PDO::FETCH_OBJ);
echo '
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Data</title>
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
      <div class="form-style-10">
          <h1>Daftar Kegiatan Harian<br><span> Edit Data </span></h1>
          <form action="edit.php" method="POST" class="form-group">
          <label>Tanggal : <input type="text" name="tgl" value="'.$edit->tanggal.'" ></label>
          <label>ID siswa : <input type="text" name="idsis" value="'.$edit->id_siswa.'" ></label>
          <label>Bangun : <input type="text" name="bangun" value="'.$edit->bangun.'" ></label>
          <label>Tidur : <input type="text" name="tidur" value="'.$edit->tidur.'" ></label>
          <label>Qiyamullail : <input type="text" name="qiyam" value="'.$edit->qiyamullail.'" ></label>
          <label>Qabliyah Shubuh : <input type="text" name="qabli" value="'.$edit->qabliyah_shubuh.'" ></label>
          <label>Dhuha : <input type="text" name="dhuha" value="'.$edit->dhuha.'" ></label>
          <input type="hidden" name="id" value="'.$edit->id.'"></label>
          <input type="submit" name="update" value="Update" class="btn btn-primary">
          </form>
    </div>
</body>
</html>
';
}

if(isset($_POST['update'])){

    $act= new Admin();
    $upd = $act->editActivity($_POST['id'], $_POST['tgl'], $_POST['idsis'],$_POST['bangun'],
                              $tidur = $_POST['tidur'],$_POST['qiyam'], $qabli = $_POST['qabli'],
                              $qabli = $_POST['dhuha']);

    header('location: data_show.php');
}

?>
