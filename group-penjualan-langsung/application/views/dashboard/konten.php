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



  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $(".add-row").click(function(){
            var kodebarang = $("#kodebarang").val();
            var namabarang = $("#namabarang").val();
            var harga = $("#harga").val();
            var jumlah = $("#jumlah").val();
            var hargaakhir = harga * jumlah;
            if(jumlah != 0){
                 var markup = "<tr><td>"+kodebarang+"</td><td>"+namabarang+"</td><td>"+harga+"</td><td>"+jumlah+"</td><td>"+hargaakhir+"</td><td><button class='btn btn-danger delete-row' name='record'>Hapus</button></td></tr>";
            
            };
          $('#data').append(markup);
          $("#kodebarang").val("");
          $("#namabarang").val("");
          $("#harga").val("");
          $("#jumlah").val("");

            // var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + email + "</td></tr>";
            // $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":click")){
                    $(this).parents("tr").remove();
                }
            });
        });



        // $(".delete-row").click(function(){
        //     $("table tbody").find('input[name="record"]').each(function(){
        //     	if($(this).is(":checked")){
        //             $(this).parents("tr").remove();
        //         }
        //     });
        // });
    });    
  </script>












  
</head>
<?php if ($this->session->flashdata("message")) { ?>
        <script type="text/javascript">
        $(window).on('load',function(){
            $('#peringatan').modal('show');
        });
        </script>
    <?php } ?>
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
                  <h2 class="card-title">Input Data Pesana</h2>
                  
                  <form>
                  <table class="table col-4" style="margin-top : 20px;">
                    <thead class="thead-light">
                      <tr>
                        <td>No Nota</td>
                        <td>:</td>
                        <td><input type="text"></td>
                      </tr>
                      <tr> 
                        <td>ID Kasir</td>
                        <td>:</td>
                        <td><input type="text"></td>
                      </tr>
                      <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><input type="date" style="width : 172px;"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    
                    </thead>
                  </table>
                  </form>

                  <table class="table table-{color}">
                    <thead class="thead-light">
                      <tr>
                        <td>Kode Barang</td>
                          <td>Nama Barang</td>
                          <td>Harga</td>
						              <td>Jumlah</td>
                      </tr>
                      <tr>
                        <td><input type="text" id="kodebarang" style="width : 170px;"></td>
                        <td><input type="text" id="namabarang"style="width : 170px;"></td>
                        <td><input type="text" id="harga" style="width : 170px;"></td>
                        <td><input type="text" id="jumlah"style="width : 170px;"></td>
                      </tr>
                      <tr>
                        <td colspan = 4><input type ="button" value="SIMPAN"class="add-row" style="width : 100px; height : 30px; margin-bottom : 30px; background-color: #3f89ff; color: white;"></td>
                      </tr>
                    
                  </table>
                  
                  <div class="table-responsive">
                    <table class="table table-{color} ">
                      <thead class="thead-light">
                        <tr>
                          <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Jual</th>
                            <th>Harga Akhir</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                       <tbody id="data">
                       
                       </tbody>
                     
                      
                  </table>
                  <button style="width : 100px; height : 30px; margin-bottom : 30px; background-color: #3f89ff; color: white;">SIMPAN</button>



                 
                    <!-- <tr>
                        <td colspan=4>Total Tagihan</td>
                        <td colspan=2></td>
                        
                      </tr>
                      <tr>
                        <td colspan = 6><button style="width : 900px; height : 30px; margin-bottom : 30px; background-color: #3f89ff; color: white;">SIMPAN</button></td>
                      </tr>
                  -->
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
