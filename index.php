<?php
require_once 'data.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="logo">Cia Store</div>
        <nav>
            <a href="#">Home</a>
            <a href="#katalog" class="active">Produk</a>
            <a href="#">About</a>
        </nav>
    </header>

    <section class="hero-section">
        <div class="hero-content">
            <span class="sub-title">CIA STORE</span>
            <h1>Simple Tech Store.</h1>
            <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
            <a href="#katalog" class="btn-hero">Lihat Produk</a>
        </div>
    </section>

    <main class="container" id="katalog">
        <div class="catalog-header">
            <div>
                <span class="section-tag">OUR PRODUCTS</span>
                <h2>Katalog Produk</h2>
            </div>
            <div class="total-badge">
                Total Produk: <strong><?php echo $total_produk; ?></strong>
            </div>
        </div>

        <div class="product-grid">
            <?php 
            foreach ($products as $item): 
                $promo = hitungHargaDiskon($item['harga']);
            ?>
                <div class="product-card">
                    <div class="card-top">
                        <div class="category-wrapper">
                            <span class="product-category"><?php echo strtoupper($item['kategori']); ?></span>
                            <?php if ($promo['is_discount']): ?>
                                <span class="badge-discount">DISKON <?php echo $promo['persentase_diskon']; ?>%</span>
                            <?php endif; ?>
                        </div>

                        <h3 class="product-title"><?php echo $item['nama']; ?></h3>

                        <div class="price-section">
                            <?php if ($promo['is_discount']): ?>
                                <span class="original-price">Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></span>
                            <?php endif; ?>
                            <div class="final-price">Rp <?php echo number_format($promo['harga_akhir'], 0, ',', '.'); ?></div>
                        </div>
                    </div>

                    <div class="card-bottom">
                        <div class="stock-info">
                            <span class="stock-count">Stok: <?php echo $item['stok']; ?></span>
                            <?php if ($item['stok'] > 0): ?>
                                <span class="status-badge available">Tersedia</span>
                            <?php else: ?>
                                <span class="status-badge out-of-stock">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <?php if ($item['stok'] > 0): ?>
                            <button class="btn-buy">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="btn-buy disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>