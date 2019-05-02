<!DOCTYPE html>
<html>
<head>
	<title>Kartika Sari</title>
	<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>
<body>
	<center><div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="<?php echo base_url()?>assets/images/logo.jpg" width="20%">
			</div>
		</div>
	</div></center>
	<center>
        <div class="container" id="id1">
            <div class="row">
            <div class="content">
                <table class="table table-dark table-hover" id="tbl">
                    <thead>
                        <th>No</th>
                        <th>Proposal</th>
                        <th>Karyawan Pengaju</th>
                        <th>Deadline</th>
                        <th>Dibuat Pada</th>
                        <th>Supplier</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                       
                    </tbody>
               </table>
            </div>
               
            </div>
        </div>
        
    
	</center>
    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Detail Proposal</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table table-striped" id="table_detail">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
            </thead>
        </table>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="verifikasi" href=""><button type="button" class="btn btn-primary">Verifikasi</button></a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</body>
</html>
<script>
    var table = $("#tbl").DataTable();
    $.ajax({
        url: 'home/getPesanan',
        success: function(result){
            var json = $.parseJSON(result);
            var num = 1;
            $.each(json, function(key, value) {
                table.row.add([
                    num++,
                    value.judul,
                    value.nama,
                    value.deadline,
                    value.created,
                    value.perusahaan,
                    value.budget,
                    value.status == 2 ? "Barang Sedang Dipesan" : "Barang Sudah Diterima",
                    "<button class='btn btn-primary' data-toggle='modal' data-target='#myModal' onClick='setBarang("+value.idproposal+", "+value.status+")'>Lihat Detail</button>"
                ]).draw(false);
            });
        }
    });

    function setBarang(kode, status){
        if(status == 3){
            $("#verifikasi").attr("hidden", true);
        }
        $("#verifikasi").attr("href", "<?php echo base_url() ?>home/verifikasi/"+kode);
        var tbl = $("#table_detail").DataTable();
        $.ajax({
        url: 'home/getBarang/'+kode,
        success: function(result){
            var json = $.parseJSON(result);
            var num = 1;
            $.each(json, function(key, value) {
                tbl.row.add([
                    num++,
                    value.nama,
                    value.qty
                ]).draw(false);
            });
        }
    });
    }
</script>
