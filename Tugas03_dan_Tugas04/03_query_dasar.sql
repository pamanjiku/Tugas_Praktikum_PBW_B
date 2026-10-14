-- SQL Query Dasar

USE akademik;

-- 1. SELECT: Menampilkan seluruh data
SELECT * FROM mahasiswa;

-- 2. SELECT: Menampilkan kolom tertentu
SELECT nim, nama, ipk
FROM mahasiswa;

-- 3. INSERT: Menambahkan data mahasiswa
-- Jalankan blok ini hanya jika ingin menambah data baru.
-- INSERT INTO mahasiswa
--     (nim, nama, tanggal_lahir, ipk, id_prodi)
-- VALUES
--     ('230005', 'Andi Pratama', '2003-07-12', 3.85, 1);

-- 4. UPDATE: Mengubah data mahasiswa
UPDATE mahasiswa
SET nama = 'Rian Hidayat, S.Kom.',
ipk = 3.80
WHERE id = 3;

-- 5. WHERE: Menyaring data berdasarkan program studi
SELECT *
FROM mahasiswa
WHERE id_prodi = 2;

-- 6. WHERE: Menyaring IPK minimal 3.50
SELECT nim, nama, ipk
FROM mahasiswa
WHERE ipk >= 3.50;

-- 7. ORDER BY: Mengurutkan nama
SELECT *
FROM mahasiswa
ORDER BY nama ASC;

-- 8. ORDER BY: Mengurutkan IPK tertinggi
SELECT *
FROM mahasiswa
ORDER BY ipk DESC;

-- 9. GROUP BY: Menghitung mahasiswa per prodi
SELECT
id_prodi,
COUNT(*) AS jumlah_mahasiswa
FROM mahasiswa
GROUP BY id_prodi;

-- 10. GROUP BY: Menghitung rata-rata IPK
SELECT
id_prodi,
AVG(ipk) AS rata_rata_ipk
FROM mahasiswa
GROUP BY id_prodi;

-- 11. LIMIT: Membatasi hasil query
SELECT *
FROM mahasiswa
ORDER BY id ASC
LIMIT 2 OFFSET 1;

-- 12. DELETE: Periksa data sebelum dihapus
SELECT *
FROM mahasiswa
WHERE id = 3;

-- Jalankan DELETE hanya jika memang diperlukan.
-- DELETE FROM mahasiswa WHERE id = 3;
