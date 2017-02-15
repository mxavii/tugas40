<?php

namespace App;

use App\Config;

class Siswa
{
    private $db;

    public function __construct()
    {
        $this->db = new Config();
    }

    public function addActivity($tgl, $idSiswa, $bangun, $tidur, $qiyamullail, $qabliyahShubuh, $dhuha)
    {
        $query = "INSERT INTO activities (tanggal, id_siswa, bangun, tidur,
                  qiyamullail, qabliyah_shubuh, dhuha)  VALUES (:tanggal, :id_siswa,
                  :bangun, :tidur, :qiyamullail, :qabliyah_shubuh, :dhuha)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tanggal', $tgl);
        $stmt->bindParam(':id_siswa', $idSiswa);
        $stmt->bindParam(':bangun', $bangun);
        $stmt->bindParam(':tidur', $tidur);
        $stmt->bindParam(':qiyamullail', $qiyamullail);
        $stmt->bindParam(':qabliyah_shubuh', $qabliyahShubuh);
        $stmt->bindParam(':dhuha', $dhuha);
        $stmt->execute();
    }

    public function getDataSiswa($id)
    {
        $query = "SELECT * FROM activities WHERE id_siswa=:id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt;
    }

    public function getData($id)
    {
        $query = "SELECT * FROM activities WHERE id=:id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt;
    }

    public function editActivity($id, $tgl, $idSiswa, $bangun, $tidur, $qiyamullail, $qabliyahShubuh, $dhuha)
    {
        $query = "UPDATE activities SET tanggal=:tanggal, id_siswa=:id_siswa, bangun=:bangun, tidur=:tidur,
                  qiyamullail=:qiyamullail, qabliyah_shubuh=:qabliyah_shubuh, dhuha=:dhuha WHERE id=:id";

        $stmt  = $this->db->prepare($query);
        $stmt->bindParam(':tanggal', $tgl);
        $stmt->bindParam(':id_siswa', $idSiswa);
        $stmt->bindParam(':bangun', $bangun);
        $stmt->bindParam(':tidur', $tidur);
        $stmt->bindParam(':qiyamullail', $qiyamullail);
        $stmt->bindParam(':qabliyah_shubuh', $qabliyahShubuh);
        $stmt->bindParam(':dhuha', $dhuha);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }

    public function delActivity($id)
    {
    $query = "DELETE FROM activities WHERE id=:id";
    $stmt  = $this->db->prepare($query);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    }
}
