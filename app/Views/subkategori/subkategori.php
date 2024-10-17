<!DOCTYPE html>
<html lang="en">
<?= $this->include('partials/headbar') ?>
<?= $this->include('partials/sidebar') ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manage Subcategories</title>
    <section class="background" style="padding: 20px; background-color: #f0f0f5;">
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
        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= base_url('plugins/bootstrap/css/bootstrap.min.css') ?>">

    </head>
<body>
    <!-- Main content -->
    <section class="content" style="margin-left: 290px; padding: 20px; margin-top: 80px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">List of Subcategories</h3>
                            <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addSubcategoryModal">+ Create Subcategory</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($subkategori as $subcategory): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= esc($subcategory['category_name']) ?></td> <!-- Display Category Name -->
                                            <td><?= esc($subcategory['subcategory_name']) ?></td> <!-- Display Subcategory Name -->
                                            <td>
                                                <button class="btn-primary btn btn-edit" data-toggle="modal" data-target="#editSubcategoryModal<?= esc($subcategory['id']) ?>">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn-danger btn btn-delete" data-toggle="modal" data-subcategory-id="<?= esc($subcategory['id']) ?>" data-target="#deleteSubcategoryModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit Subcategory Modal -->
                                        <div class="modal fade" id="editSubcategoryModal<?= esc($subcategory['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="editSubcategoryModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editSubcategoryModalLabel">Edit Subcategory</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="<?= base_url('/subkategori/updateSubkategori/' . esc($subcategory['id'])) ?>" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Subcategory Name</label>
                                                                <input type="text" class="form-control" name="name" value="<?= esc($subcategory['subcategory_name']) ?>" placeholder="Enter Subcategory Name">
                                                            </div>
                     <!-- Ensure the categories dropdown is handled safely -->
<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" class="form-control">
        <option value="">Select Category</option>
        <?php if (isset($categories) && !empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <option value="<?= esc($category['id']) ?>">
                    <?= esc($category['name']) ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">No Categories Available</option>
        <?php endif; ?>
    </select>
</div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Add Subcategory Modal -->
<div class="modal fade" id="addSubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="addSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubcategoryModalLabel">Add Subcategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('/subkategori/saveSubkategori') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= esc($category['id']) ?>"><?= esc($category['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Subcategory Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Subcategory Name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Subcategory Modal -->
<div class="modal fade" id="deleteSubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSubcategoryModalLabel">Delete Subcategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this subcategory?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
  // Use event delegation to ensure the modal works for all rows
$(document).on('click', '.btn-delete', function() {
    var subcategoryId = $(this).data('subcategory-id'); // Get the subcategory ID from the button
    var deleteUrl = '/subkategori/deleteSubkategori/' + subcategoryId; // Create the delete URL

    // Update the confirmation delete button's link
    $('#confirmDeleteBtn').attr('href', deleteUrl);

    // Show the modal
    $('#deleteSubcategoryModal').modal('show');
});
</script>

    <!-- jQuery and Bootstrap scripts -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
