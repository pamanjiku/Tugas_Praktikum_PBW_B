-- Tahap 1: Membuat database

CREATE DATABASE IF NOT EXISTS akademik;
USE akademik;

-- Tahap 2: Membuat tabel program studi

CREATE TABLE prodi (
id_prodi INT AUTO_INCREMENT PRIMARY KEY,
nama_prodi VARCHAR(100)
);

-- Tahap 3: Membuat tabel mahasiswa

CREATE TABLE mahasiswa (
id INT AUTO_INCREMENT PRIMARY KEY,
nim VARCHAR(15),
nama VARCHAR(100),
tanggal_lahir DATE,
ipk DECIMAL(3,2),
id_prodi INT,
CONSTRAINT chk_ipk
CHECK (ipk BETWEEN 0.00 AND 4.00),
CONSTRAINT fk_mahasiswa_prodi
FOREIGN KEY (id_prodi)
REFERENCES prodi(id_prodi)
);
