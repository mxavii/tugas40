CREATE DATABASE daily_activity;
USE daily_activity;
CREATE TABLE activities (id INT(11) PRIMARY KEY AUTO_INCREMENT, tanggal DATE, id_siswa INT(11) NOT NULL, bangun TIME, tidur TIME, qiyamullail VARCHAR(255), qabliyah_shubuh VARCHAR(255), dhuha VARCHAR(255));
CREATE TABLE activities (id INT(11) PRIMARY KEY AUTO_INCREMENT, nama VARCHAR(255), tanggal_lahir DATE, kelas VARCHAR(255), username VARCHAR(255), password VARCHAR(255));
