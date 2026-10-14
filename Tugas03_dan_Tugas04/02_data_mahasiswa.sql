-- Tahap 4: Mengisi tabel prodi

USE akademik;

INSERT INTO prodi (nama_prodi)
VALUES
('Teknik Informatika'),
('Sistem Informasi'),
('Teknik Elektro');

-- Tahap 5: Mengisi tabel mahasiswa

INSERT INTO mahasiswa
(nim, nama, tanggal_lahir, ipk, id_prodi)
VALUES
('230001', 'Budi Santoso', '2002-05-15', 3.75, 1),
('230002', 'Siti Aminah', '2003-08-20', 3.90, 1),
('230003', 'Rian Hidayat', '2002-12-01', 3.20, 2),
('230004', 'Dewi Lestari', '2003-03-10', 3.65, 3);
