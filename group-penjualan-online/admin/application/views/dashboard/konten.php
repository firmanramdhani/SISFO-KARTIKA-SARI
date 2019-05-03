<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kartika Sari</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/css/vendor.bundle.addons.css">
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
  <!-- endinject -->

  <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.ico" />
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "navbar.php"?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include "sidebar.php"?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Pemesanan</h4>
                  <div class="table-responsive">
                    <table class="table table-{color} yuhu">
                    <thead class="thead-light">
                      <tr>
                        <th>ID Transaksi</th>
                          <th>ID Customer</th>
                          <th>Nama Customer</th>
                          <th>Tanggal Transaksi</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($list['transaksi']->result_array() as $data): ?>
                          <tr>
                            <td><?php echo $data['idonlinetransaction'] ?></td>
                            <td><?php echo $data['idcustomer'] ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo $data['tanggaltransaction'] ?></td>
                            <?php if ($data['status'] == 0){ ?>
                              <td><a href="<?php echo base_url('admin/accept/'.$data['idonlinetransaction']) ?>" class="btn btn-success" name="accept" > Accept </a></td>
                            <?php }else if($data['status'] == 1) {?>
                              <td><button type="button" class="btn btn-secondary" name="button" disabled> Accepted </button></td>
                            <?php } ?>
                          </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

      </div>
    </div>
        <!-- partial -->
<div class="modal fade" id="peringatan" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $this->session->flashdata("message")?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-fill btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>








      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url()?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url()?>assets/vendors/js/vendor.bundle.addons.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url()?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url()?>assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url()?>assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript">
  $(document).ready(function(){
    $('.yuhu').DataTable({
      "lengthMenu": [[10], [10]],
      "lengthChange": false
    });
  });
</script>
</body>

</html>
