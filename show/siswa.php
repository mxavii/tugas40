<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

use App\Siswa;

if (empty($_SESSION['user'])){
    header("Location: login.php");
}

$act = new Siswa();
if(isset($_GET['delete'])){
$del = $act->delActivity($_GET['delete']);
echo "<h3 align='center' style='color:#d71c1c'>Data Berhasil dihapus</h3>";
echo "<meta http-equiv='refresh' content='1;url=siswa.php'>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Data Kegiatan</title>
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
      <div class="form-style-10">
          <h1>Daftar Kegiatan Harian <br><span> Semua Data </span></h1>
            <form action='input.php'>
                <input type='submit' value='Add Activity' />
            </form>
          <table width="93%" border="23px" align="center" bgcolor="#bee3bf"  cellpadding="5" style="font-size:13px; color:#002679" bordercolor="#e7f1ec" >
              <tr bgcolor="#9ec430">
                  <th>ID</th>
                  <th>Tanggal</th>
                  <th>ID Siswa</th>
                  <th>Bangun</th>
                  <th>Tidur</th>
                  <th>Qiyamullail</th>
                  <th>Qabliyah Shubuh</th>
                  <th>Dhuha</th>
                  <th colspan="2">Opt</th>
              </tr>

              <?php

              $show = $act->getDataSiswa($_SESSION['user']);
              while($data = $show->fetch(PDO::FETCH_OBJ)){
                  echo "
                  <tr align='center'>
                  <td>$data->id</td>
                  <td>$data->tanggal</td>
                  <td>$data->id_siswa</td>
                  <td>$data->bangun</td>
                  <td>$data->tidur</td>
                  <td>$data->qiyamullail</td>
                  <td>$data->qabliyah_shubuh</td>
                  <td>$data->dhuha</td>
                  <td><a class='btn btn-info' href='edit.php?id=$data->id'>Edit</td>
                  <td><a class='btn btn-danger' href='siswa.php?delete=$data->id'>Delete</a></td>
                  </tr>";
              };
              ?>

          </table>

          <form action='out.php'>
                <input type='submit' value='Logout' />
          </form>

  </body>
</html>
