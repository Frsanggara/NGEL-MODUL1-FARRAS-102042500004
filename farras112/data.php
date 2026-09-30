<?php
// Data produk disajikan menggunakan Array PHP
$produk = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "Display",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "Komputer",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "Aksesoris",
        "harga" => 250000,
        "stok" => 10
    ],
    [
        "nama" => "Keyboard Mekanikal",
        "kategori" => "Aksesoris",
        "harga" => 750000,
        "stok" => 0
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "Audio",
        "harga" => 1200000,
        "stok" => 5
    ],
    [
        "nama" => "USB Flashdisk 64GB",
        "kategori" => "Penyimpanan",
        "harga" => 150000,
        "stok" => 0
    ]
];

// Hitung total produk secara otomatis
$total_produk = count($produk);

// Fungsi Hitung Diskon 10%
function hitungDiskon($harga) {
    if ($harga >= 1000000) {
        $potongan = $harga * 0.10;
        return [
            "diskon" => true,
            "harga_akhir" => $harga - $potongan
        ];
    }
    return [
        "diskon" => false,
        "harga_akhir" => $harga
    ];
}
?>