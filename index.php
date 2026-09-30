<?php
$produk = [
    ["nama" => "Monitor 24 Inch", "kategori" => "Display", "harga" => 1800000, "stok" => 4],
    ["nama" => "Laptop Productivity", "kategori" => "Komputer", "harga" => 8500000, "stok" => 3],
    ["nama" => "Mouse Wireless", "kategori" => "Aksesoris", "harga" => 250000, "stok" => 10],
    ["nama" => "Keyboard Mekanikal", "kategori" => "Aksesoris", "harga" => 750000, "stok" => 0],
    ["nama" => "Headset Gaming", "kategori" => "Audio", "harga" => 1200000, "stok" => 5],
    ["nama" => "USB Flashdisk 64GB", "kategori" => "Penyimpanan", "harga" => 150000, "stok" => 0]
];

$total_produk = count($produk);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            background-color: #f4f4f9;
            color: #333;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 15px 5%;
            border-bottom: 1px solid #ddd;
        }

        .navbar ul {
            display: flex;
            list-style: none;
            gap: 15px;
        }

        .navbar a {
            text-decoration: none;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 20px auto;
        }

        /* Hero */
        .hero {
            background-color: #222;
            color: #fff;
            padding: 40px 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .hero h1 {
            margin-bottom: 10px;
        }

        /* Catalog Header */
        .header-katalog {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Grid Card Produk */
        .grid-produk {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .kategori {
            font-size: 12px;
            color: #777;
        }

        .harga-asli {
            text-decoration: line-through;
            color: #999;
            font-size: 14px;
        }

        .harga-akhir {
            font-weight: bold;
            font-size: 18px;
            color: #2c3e50;
        }

        .diskon-badge {
            color: red;
            font-size: 12px;
            font-weight: bold;
        }

        .status {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin: 10px 0;
        }

        .tersedia { background-color: #d4edda; color: #155724; }
        .habis { background-color: #f8d7da; color: #721c24; }

        .btn-beli {
            width: 100%;
            padding: 8px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-beli:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            border-top: 1px solid #ddd;
            background: #fff;
        }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .grid-produk { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 480px) {
            .grid-produk { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <div class="navbar">
        <h2>Cia Store</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </div>

    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <p>CIA STORE</p>
            <h1>Simple Tech Store.</h1>
            <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        </div>

        <!-- Info Total Produk -->
        <div class="header-katalog">
            <h3>Katalog Produk</h3>
            <p>Total Produk: <b><?php echo $total_produk; ?></b></p>
        </div>

        <!-- Grid Produk -->
        <div class="grid-produk">
            <?php foreach ($produk as $item): ?>
                <?php 
                    // Hitung Diskon (Challenge)
                    $harga = $item['harga'];
                    $diskon = false;

                    if ($harga >= 1000000) {
                        $diskon = true;
                        $harga_diskon = $harga - ($harga * 0.10);
                    } else {
                        $harga_diskon = $harga;
                    }
                ?>

                <div class="card">
                    <div>
                        <span class="kategori"><?php echo $item['kategori']; ?></span>
                        <h4><?php echo $item['nama']; ?></h4>
                        
                        <!-- Harga & Diskon -->
                        <div style="margin: 10px 0;">
                            <?php if ($diskon): ?>
                                <span class="diskon-badge">DISKON 10%</span><br>
                                <span class="harga-asli">Rp<?php echo number_format($harga, 0, ',', '.'); ?></span><br>
                            <?php endif; ?>
                            <span class="harga-akhir">Rp<?php echo number_format($harga_diskon, 0, ',', '.'); ?></span>
                        </div>
                    </div>

                    <div>
                        <!-- Cek Stok -->
                        <?php if ($item['stok'] > 0): ?>
                            <span class="status tersedia">Tersedia</span>
                            <p>Stok: <?php echo $item['stok']; ?></p>
                            <button class="btn-beli">Beli Sekarang</button>
                        <?php else: ?>
                            <span class="status habis">Stok Habis</span>
                            <p>Stok: 0</p>
                            <button class="btn-beli" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Cia Store</p>
    </footer>

</body>
</html>