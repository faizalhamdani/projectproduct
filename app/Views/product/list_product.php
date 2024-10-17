<!DOCTYPE html>
<html lang="en">
<?= $this->include('partials/headbar')?>
<?= $this->include('partials/sidebar')?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <section class="background" style="padding: 20px; background-color: #f0f0f5;">
  <title>Manage Products</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>
    <!-- Main content -->
    <section class="content" style="margin-left: 290px; padding: 20px; margin-top: 80px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title">List of Products</h3>
              <a href="/product/addProduct" class="btn btn-primary ml-auto">+ Create Product</a>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Capacity</th>
                    <th>Compressor Warranty</th>
                    <th>Sparepart Warranty</th>
                    <th>Color</th>
                    <th>Product Type</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php $i = 1; ?>
                <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= esc($product['brand_name']) ?></td> <!-- Display Brand Name -->
                <td><?= esc($product['category_name']) ?></td> <!-- Display Category Name -->
                <td><?= esc($product['subcategory_name']) ?></td> <!-- Display Subcategory Name -->
                <td><?= esc($product['capacity']) ?></td> <!-- Display Capacity -->
                <td><?= esc($product['compressor_warranty']) ?></td> <!-- Display Compressor Warranty -->
                <td><?= esc($product['sparepart_warranty']) ?></td> <!-- Display Sparepart Warranty -->
                <td><?= esc($product['color']) ?></td> <!-- Display Color -->
                <td><?= esc($product['product_type']) ?></td> <!-- Display Product Type -->
                <td>
                    <a href="/product/editProduct/<?= esc($product['id']) ?>" class="btn-edit">
                        <i class="fas fa-pencil-alt"></i> <!-- Pencil icon from Font Awesome -->
                    </a>
                    <a href="/product/deleteProduct/<?= esc($product['id']) ?>" class="btn-delete">
                        <i class="fas fa-trash"></i> <!-- Trash icon from Font Awesome -->
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</body>
