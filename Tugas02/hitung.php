<?php

interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga
    ) {}

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(
        string $nama,
        float $harga,
        private float $diskon
    ) {
        parent::__construct($nama, $harga);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }

    public function getDiskon(): float
    {
        return $this->diskon;
    }
}

$daftar = [
    new Produk('Keyboard', 250000),
    new ProdukDiskon('Mouse', 150000, 10)
];

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Spider-Man Store</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #0b0b0b;
            color: white;
        }

        .container {
            width: 600px;
            margin: 80px auto;
            padding: 35px;
            background-color: #151515;
            border: 4px solid #e31b23;
            border-radius: 20px;
            box-shadow: 0 0 20px #e31b23;
        }

        h1 {
            text-align: center;
            color: #e31b23;
            font-size: 35px;
            text-shadow: 3px 3px 0 #000;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #cccccc;
            margin-bottom: 30px;
        }

        .product {
            background-color: #182d50;
            border: 2px solid #e31b23;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .product h2 {
            margin-top: 0;
            color: white;
        }

        .price {
            font-size: 22px;
            font-weight: bold;
            color: #ffcc00;
        }

        .discount {
            margin-top: 10px;
            color: #ff4d4d;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #aaa;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>🕷️ SPIDER-MAN STORE 🕷️</h1>

        <div class="subtitle">
            With great products comes great prices!
        </div>

        <?php foreach ($daftar as $produk): ?>

            <div class="product">

                <h2>
                    🕸️ <?= $produk->getNama(); ?>
                </h2>

                <div class="price">
                    Rp <?= number_format(
                        $produk->hargaAkhir(),
                        0,
                        ',',
                        '.'
                    ); ?>
                </div>

                <?php if ($produk instanceof ProdukDiskon): ?>

                    <div class="discount">
                        🕷️ Diskon <?= $produk->getDiskon(); ?>%
                    </div>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

        <div class="footer">
            🕷️ Spider-Man Product Management 🕷️
        </div>

    </div>

</body>

</html>
