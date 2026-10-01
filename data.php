<?php

$products = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "Monitor",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "Laptop",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "Aksesoris",
        "harga" => 150000,
        "stok" => 10
    ],
    [
        "nama" => "Keyboard Mechanical",
        "kategori" => "Aksesoris",
        "harga" => 450000,
        "stok" => 0 // Stok Habis
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
        "harga" => 95000,
        "stok" => 8
    ]
];

$total_produk = count($products);

function hitungHargaDiskon($harga_awal) {
    if ($harga_awal >= 1000000) {
        $persentase_diskon = 10;
        $jumlah_diskon = $harga_awal * ($persentase_diskon / 100);
        $harga_akhir = $harga_awal - $jumlah_diskon;
        $is_discount = true;
    } else {
        $persentase_diskon = 0;
        $harga_akhir = $harga_awal;
        $is_discount = false;
    }

    return [
        'is_discount'       => $is_discount,
        'persentase_diskon' => $persentase_diskon,
        'harga_akhir'       => $harga_akhir
    ];
}
?>