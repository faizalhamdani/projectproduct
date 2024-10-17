<!DOCTYPE html>
<html lang="en">
<?= $this->include('partials/headbar') ?>
<?= $this->include('partials/sidebar') ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <section class="background" style="padding: 20px; background-color: #f0f0f5;">
  <title>Manage Compressor Warranties</title>

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
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 400px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover, .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
    <!-- Main content -->
    <section class="content" style="margin-left: 290px; padding: 20px; margin-top: 80px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">List of Compressor Warranties</h3>
                <button id="createCompressorWarrantyBtn" class="btn btn-primary ml-auto">+ Create Compressor Warranty</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Compressor Warranty</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($garansi_kompresor as $compressorwarranty): ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= esc($compressorwarranty['value']) ?></td>
                        <td>
                          <button data-id="<?= esc($compressorwarranty['id']) ?>" data-value="<?= esc($compressorwarranty['value']) ?>" class="btn-edit btn btn-primary">
                            <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button data-id="<?= esc($compressorwarranty['id']) ?>" class="btn-delete btn btn-danger">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal for Adding Compressor Warranty -->
      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h3>Add Compressor Warranty</h3>
          <form method="post" action="<?= base_url('/garansi_kompresor/saveGaransiKompresor') ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="value">Compressor Warranty</label>
              <input type="text" class="form-control" name="value" placeholder="Enter Compressor Warranty" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>

      <!-- Modal for Editing Compressor Warranty -->
      <div id="editModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h3>Edit Compressor Warranty</h3>
          <form id="editForm" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
              <label for="value">Compressor Warranty</label>
              <input type="text" id="editValue" class="form-control" name="value" placeholder="Enter Compressor Warranty" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>

      <!-- Modal for Delete Confirmation -->
      <div id="deleteModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h3>Confirm Deletion</h3>
          <p>Are you sure you want to delete this Compressor Warranty?</p>
          <form id="deleteForm" method="post" action="">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <button type="button" class="btn btn-secondary" id="cancelDeleteBtn">Cancel</button>
          </form>
        </div>
      </div>

      <script>
        // Modal for Adding Compressor Warranty
        var addModal = document.getElementById("myModal");
        var addBtn = document.getElementById("createCompressorWarrantyBtn");
        var closeAddModal = document.getElementsByClassName("close")[0];

        addBtn.onclick = function() {
          addModal.style.display = "block";
        }

        closeAddModal.onclick = function() {
          addModal.style.display = "none";
        }

        window.onclick = function(event) {
          if (event.target == addModal) {
            addModal.style.display = "none";
          }
        }

        // Modal for Editing Compressor Warranty
        var editModal = document.getElementById("editModal");
        var closeEditModal = document.getElementsByClassName("close")[1];

        document.querySelectorAll('.btn-edit').forEach(function(button) {
          button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var value = this.getAttribute('data-value');

            // Set the form action and input value dynamically
            document.getElementById('editForm').action = '/garansi_kompresor/updateGaransiKompresor/' + id;
            document.getElementById('editValue').value = value;

            editModal.style.display = "block";
          });
        });

        closeEditModal.onclick = function() {
          editModal.style.display = "none";
        }

        // Modal for Deleting Compressor Warranty
        var deleteModal = document.getElementById("deleteModal");
        var closeDeleteModal = document.getElementsByClassName("close")[2];
        var cancelDeleteBtn = document.getElementById("cancelDeleteBtn");

        document.querySelectorAll('.btn-delete').forEach(function(button) {
          button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');

            // Set the form action dynamically
            document.getElementById('deleteForm').action = '/garansi_kompresor/deleteGaransiKompresor/' + id;

            deleteModal.style.display = "block";
          });
        });

        closeDeleteModal.onclick = function() {
          deleteModal.style.display = "none";
        }

        cancelDeleteBtn.onclick = function() {
          deleteModal.style.display = "none";
        }

        window.onclick = function(event) {
          if (event.target == deleteModal) {
            deleteModal.style.display = "none";
          }
        }
      </script>
    </section>
</body>
</html>
