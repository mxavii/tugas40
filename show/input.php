<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Input</title>
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
      <div class="form-style-10">
            <h1>Daftar Kegiatan Harian <br><span> Input Data </span></h1>
            <form action="input.php" method="POST">
                <label>Tanggal (YYYYMMDD) : <input type="date" name="tgl"></label>
                <label>ID siswa : <input type="text" name="idsis"></label>
                <label>Bangun : <input type="time" name="bangun"></label>
                <label>Tidur : <input type="time" name="tidur"></label>
                <label>Qiyamullail :<select name="qiyam">
                                        <option value="YA">YA</option>
                                        <option value="TIDAK">TIDAK</option>
                                    </select></label>
                <label>Qabliyah Shubuh :<select name="qabli">
                                            <option value="YA">YA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select></label>
                <label>Dhuha : <select name="dhuha">
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                </select></label>
            <div class="button-section">
                <input type="submit" name="submit" />
            </div>
            </form>
        </div>
     </body>
</html>

<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

use App\Admin;

if(isset($_POST['submit'])){
    if (empty($_SESSION['user'])){
        $idsis=$_POST['idsis'];
        $loc='admin.php';
    }
    else {
        $idsis=$_SESSION['user'];
        $loc='siswa.php';
    }

    $act = new Admin();
    $add = $act->addActivity($_POST['tgl'], $idsis, $_POST['bangun'],
                             $_POST['tidur'], $_POST['qiyam'], $_POST['qabli'], $_POST['dhuha']);

header("location:$loc");

}

?>
