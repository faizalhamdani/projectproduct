<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration Form</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <img src="<?= base_url('images/logo.png') ?>" alt="AIO Logo" class="logo">
            <h2>Form Registrasi Produk</h2>
        </div>
        <div class="progress-bar">
            <span class="active">General Data</span>
            <span>Spesifikasi Produk</span>
            <span>Keunggulan Produk</span>
            <span>Foto Produk</span>
            <span>Konfirmasi Produk</span>
        </div>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('product/register') ?>" method="post">
    <?= csrf_field() ?>

    <!-- Brand Dropdown -->
    <div class="form-group">
        <label for="brand">Merek</label>
        <select id="brand" name="brand_id" required>
            <option value="" disabled selected>Masukan Merek</option>
            <?php foreach ($brands as $brand): ?>
                <option value="<?= $brand['id'] ?>"><?= esc($brand['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

        <!-- Category Dropdown -->
        <div class="form-group">
        <label for="category">Kategori</label>
        <select id="category" name="category_id" required>
            <option value="" disabled selected>Masukan Kategori</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= esc($category['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- subCategory Dropdown -->
    <div class="form-group">
        <label for="subcategory">Subkategori</label>
        <select id="subcategory" name="subcategory_id" required>
            <option value="" disabled selected>Masukan Subkategori</option>
            <?php foreach ($subcategories as $subcategory): ?>
                <option value="<?= $subcategory['id'] ?>"><?= esc($subcategory['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="product_type">Tipe Produk</label>
        <input type="text" id="product_type" name="product_type" placeholder="Masukan Tipe Produk" required>
    </div>

        <!-- capacity Dropdown -->
        <div class="form-group">
        <label for="capacity">Kapasitas</label>
        <select id="capacity" name="capacity_id" required>
            <option value="" disabled selected>Masukan Kapasitas</option>
            <?php foreach ($capacities as $capacity): ?>
                <option value="<?= $capacity['id'] ?>"><?= esc($capacity['value']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

        <!-- compressor_warranty Dropdown -->
        <div class="form-group">
        <label for="compressor_warranty">Garansi Kompresor</label>
        <select id="compressor_warranty" name="compressor_warranty_id" required>
            <option value="" disabled selected>Masukan Garansi Kompresor</option>
            <?php foreach ($compressor_warranties as $compressor_warranty): ?>
                <option value="<?= $compressor_warranty['id'] ?>"><?= esc($compressor_warranty['value']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="color">Warna</label>
        <input type="text" id="color" name="color" placeholder="Masukan Warna" required>
    </div>

    <!-- sparepart_warranty Dropdown -->
    <div class="form-group">
        <label for="sparepart_warranty">Garansi Sparepart</label>
        <select id="sparepart_warranty" name="sparepart_warranty_id" required>
            <option value="" disabled selected>Masukan Garansi Sparepart</option>
            <?php foreach ($sparepart_warranties as $sparepart_warranty): ?>
                <option value="<?= $sparepart_warranty['id'] ?>"><?= esc($sparepart_warranty['value']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Similar logic for other fields like subsubcategory, capacity, warranties -->

    <button type="submit" class="submit-btn">Selanjutnya</button>
</form>

            
            <button type="submit" class="submit-btn">Selanjutnya</button>
        </form>
        <p class="form-note">*Harap diisi dengan benar</p>
    </div>
</body>
</html>
