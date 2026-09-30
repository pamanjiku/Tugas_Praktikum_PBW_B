<?php

interface identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements identitas
{
    private string $nim;
    private string $nama;
    private string $prodi; // FIELD BARU
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
