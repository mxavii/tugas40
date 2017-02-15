<?php

namespace App;

use App\Config;

class Admin
{
    private $db;
     private $error;

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

    public function getAll()
    {
        $query = "SELECT * FROM activities";
        $stmt  = $this->db->query($query);
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

    public function addSiswa($id, $nama, $tgl_lahir, $kelas, $username, $password)
    {
        $query = "INSERT INTO siswa (id, nama, tanggal_lahir, kelas, username,
                  password,)  VALUES (:id, :nama, :tgl_lahir, :kelas, :username, :password)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':tgl_lahir', $tgl_lahir);
        $stmt->bindParam(':kelas', $kelas);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    public function getSiswa()
    {
        $query = "SELECT * FROM siswa";
        $stmt  = $this->db->query($query);
        return $stmt;
    }

    public function login($username, $password)
    {
        $query = "SELECT * FROM siswa WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $data = $stmt->fetch();

        if($stmt->rowCount() > 0){
            if($password == $data['password']){
                $_SESSION['user'] = $data['id'];
                return true;
            }else{
                $this->error = "Username atau Password Salah";
                return false;
            }
        }else{
            $this->error = "Username atau Password Salah";
            return false;
        }
    }
}
