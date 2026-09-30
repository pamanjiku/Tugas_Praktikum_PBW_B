# Tugas 01 - Data Mahasiswa

## 1. Kode Asli

```php
<?php

interface identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements identitas
{
    private string $nim;
    private string $nama;
    private string $ipk;

    public function __construct(string $nim, string $nama, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }

        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function getIpk(): string
    {
        return $this->nim . ' - ' . $this->nama . ' - IPK: ' . $this->ipk;
    }
}

$mhs = new Mahasiswa(
    '4524210029',
    'Dzikrullah Surachman',
    '3.75'
);

echo $msh->ringkasan();
```

---

## 2. Kesalahan Kode Asli

### Kesalahan 1: Tipe Data `$ipk`

**Kode awal:**

```php
private string $ipk;
```

**Kode perbaikan:**

```php
private float $ipk;
```

**Penjelasan:**

IPK berupa angka desimal, sehingga tipe data yang sesuai adalah `float`, bukan `string`.

---

### Kesalahan 2: `getIpk()` Dibuat Dua Kali

**Kode awal:**

```php
public function getIpk(): float
{
    return $this->ipk;
}
```

Kemudian terdapat method dengan nama yang sama:

```php
public function getIpk(): string
{
    return $this->nim . ' - ' . $this->nama . ' - IPK: ' . $this->ipk;
}
```

**Masalahnya:**

PHP tidak memperbolehkan dua method dengan nama yang sama dalam satu class.

**Kode perbaikan:**

Method pertama tetap digunakan untuk mengambil nilai IPK:

```php
public function getIpk(): float
{
    return $this->ipk;
}
```

Method kedua diubah menjadi `ringkasan()`:

```php
public function ringkasan(): string
{
    return $this->nim . ' - ' . $this->nama . ' - IPK: ' . $this->ipk;
}
```

---

### Kesalahan 3: `$msh` Salah Penulisan

**Kode awal:**

```php
echo $msh->ringkasan();
```

**Kode perbaikan:**

```php
echo $mhs->ringkasan();
```

**Penjelasan:**

Object yang dibuat menggunakan nama `$mhs`, sehingga saat dipanggil harus menggunakan `$mhs`, bukan `$msh`.

---

### Kesalahan 4: Nilai IPK Menggunakan String

**Kode awal:**

```php
$mhs = new Mahasiswa(
    '4524210029',
    'Dzikrullah Surachman',
    '3.75'
);
```

**Kode perbaikan:**

```php
$mhs = new Mahasiswa(
    '4524210029',
    'Dzikrullah Surachman',
    3.75
);
```

**Penjelasan:**

Karena parameter IPK menggunakan tipe `float`, nilai `3.75` tidak perlu menggunakan tanda petik.

---

## 3. Kode yang Telah Diperbaiki

```php
<?php

interface identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements identitas
{
    private string $nim;
    private string $nama;
    private float $ipk;

    public function __construct(string $nim, string $nama, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }

        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function ringkasan(): string
    {
        return $this->nim . ' - ' . $this->nama . ' - IPK: ' . $this->ipk;
    }
}

$mhs = new Mahasiswa(
    '4524210029',
    'Dzikrullah Surachman',
    3.75
);

echo $mhs->ringkasan();
```

### Tampilan Output Awal

```text
4524210029 - Dzikrullah Surachman - IPK: 3.75
```

---

# 4. File Modifikasi

Pada tahap modifikasi, ditambahkan field baru yaitu **program studi (prodi)** dan tampilan dibuat menggunakan HTML dan CSS.

```php
<?php

interface identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements identitas
{
    private string $nim;
    private string $nama;
    private string $prodi;
    private float $ipk;

    public function __construct(
        string $nim,
        string $nama,
        string $prodi,
        float $ipk
    ) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException(
                'IPK harus 0 sampai 4.'
            );
        }

        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function ringkasan(): string
    {
        return $this->nim
            . ' - ' . $this->nama
            . ' - ' . $this->prodi
            . ' - IPK: ' . $this->ipk;
    }
}

$mhs = new Mahasiswa(
    '4524210029',
    'Dzikrullah Surachman',
    'Teknik Informatika',
    3.75
);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>

    <style>
        body {
            background-color: #111;
            font-family: Arial, sans-serif;
        }

        .card {
            width: 450px;
            margin: 100px auto;
            padding: 30px;
            background-color: #b71c1c;
            color: white;
            text-align: center;
            border: 5px solid #222;
            border-radius: 20px;
            box-shadow: 0 0 20px black;
        }

        h1 {
            font-size: 30px;
        }

        .data {
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="card">

        <h1>🕷️ DATA MAHASISWA 🕷️</h1>

        <div class="data">
            <?= $mhs->ringkasan(); ?>
        </div>

    </div>

</body>

</html>
```

### Tampilan Output Setelah Modifikasi

Data mahasiswa yang ditampilkan menjadi:

```text
🕷️ DATA MAHASISWA 🕷️

4524210029 - Dzikrullah Surachman
- Teknik Informatika
- IPK: 3.75
```

Modifikasi yang dilakukan:

* Menambahkan field `prodi`.
* Menambahkan parameter `prodi` pada constructor.
* Menampilkan program studi pada method `ringkasan()`.
* Menambahkan HTML untuk tampilan halaman.
* Menambahkan CSS untuk membuat tampilan berbentuk card.
* Menampilkan data mahasiswa pada halaman web.

---

# 5. Lima Kode yang Penting

## 1. Interface `identitas`

```php
interface identitas
{
    public function ringkasan(): string;
}
```

**Fungsi:**
Membuat aturan bahwa class `Mahasiswa` harus memiliki method `ringkasan()`.

---

## 2. Deklarasi Atribut/Data Mahasiswa

```php
private string $nim;
private string $nama;
private string $prodi;
private float $ipk;
```

**Fungsi:**
Menyimpan data mahasiswa seperti NIM, nama, program studi, dan IPK.

`prodi` merupakan field baru yang ditambahkan pada tahap modifikasi.

---

## 3. Constructor

```php
public function __construct(
    string $nim,
    string $nama,
    string $prodi,
    float $ipk
) {
    $this->nim = $nim;
    $this->nama = $nama;
    $this->prodi = $prodi;
    $this->setIpk($ipk);
}
```

**Fungsi:**
Mengisi data mahasiswa ketika object `Mahasiswa` dibuat.

---

## 4. Validasi IPK

```php
if ($ipk < 0 || $ipk > 4) {
    throw new InvalidArgumentException(
        'IPK harus 0 sampai 4.'
    );
}
```

**Fungsi:**
Memastikan nilai IPK hanya berada pada rentang 0 sampai 4.

Jika IPK kurang dari 0 atau lebih dari 4, maka program akan memberikan error.

---

## 5. Method `ringkasan()`

```php
public function ringkasan(): string
{
    return $this->nim
        . ' - ' . $this->nama
        . ' - ' . $this->prodi
        . ' - IPK: ' . $this->ipk;
}
```

**Fungsi:**
Menggabungkan seluruh data mahasiswa menjadi satu teks yang kemudian ditampilkan pada halaman.

---

# 6. Error yang Sering Muncul

## Error: Not Found

Error **Not Found** terjadi karena Apache tidak menemukan file PHP pada alamat yang dibuka.

### Penyebab yang mungkin:

* File PHP tidak berada di folder `htdocs`.
* Nama folder tidak sesuai.
* Nama file tidak sesuai.
* URL yang dimasukkan salah.
* Apache belum aktif.

### Cara memperbaiki:

1. Pastikan file PHP berada di dalam folder `htdocs`.
2. Pastikan Apache sudah aktif pada XAMPP.
3. Periksa kembali nama folder dan file.
4. Buka URL sesuai dengan lokasi file.

Contoh:

```text
http://localhost/nama-folder/nama-file.php
```

---

# Kesimpulan

Pada tugas ini dilakukan perbaikan dan modifikasi program PHP berbasis OOP.

Perbaikan dilakukan dengan:

* Memperbaiki tipe data IPK dari `string` menjadi `float`.
* Menghapus method `getIpk()` yang dibuat dua kali.
* Memperbaiki penulisan `$msh` menjadi `$mhs`.
* Memperbaiki nilai IPK agar menggunakan tipe `float`.
* Memperbaiki pemanggilan method `ringkasan()`.

Kemudian dilakukan modifikasi dengan menambahkan data **program studi (`prodi`)** serta membuat tampilan data mahasiswa menggunakan **HTML dan CSS**.

Program akhir dapat menampilkan NIM, nama, program studi, dan IPK mahasiswa dalam bentuk tampilan card pada halaman web.
