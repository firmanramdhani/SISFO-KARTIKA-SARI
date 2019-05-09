<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets">
	<link rel="stylesheet" href="assets/css/all.css">
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<div class="container">
		<h2>Daftar Invoice</h2>
		<table id="tabel_pesanan" class="table table-stripped table-bordered">
			<thead>
				<th>No</th>
				<th>ID Customer</th>
				<th>Tanggal</th>
				<th>Aksi</th>
			</thead>
			<tbody></tbody>
		</table>
	</div>

	<!-- The Modal -->
	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Detail Pesanan</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div class="form-group">
					<label for="nama-pelanggan">ID Customer</label>
					<input type="text" id="id-customer" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="pesanan">Pesanan</label>
					<input type="text" id="pesanan" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="harga">Harga</label>
					<input type="text" id="harga" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="jumlah">Jumlah</label>
					<input type="text" id="jumlah" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="total-harga">Total Harga</label>
					<input type="text" id="total-harga" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="tanggal">Tanggal</label>
					<input type="text" id="tanggal" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="invoice">Invoice</label>
					<input type="text" id="invoice" class="form-control" readonly>
				</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<a id="print-url" href="" target="_blank"><button type="button" class="btn btn-primary">Cetak</button></a>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>

			</div>
		</div>
	</div>
	
</body>
<script>
	var tabel = $("#tabel_pesanan").DataTable();
	var data = [];
	$.ajax({
		url: 'home/getPesanan',
		success: function(result){
			data = $.parseJSON(result);
			let i = 1;
			$.each(data, function(key, value){
				tabel.row.add([
					i++,
					value.idcustomer,
					value.tanggaltransaction,
					'<button class="btn btn-primary" onClick="setModal('+(i-2)+')" data-toggle="modal" data-target="#myModal">Lihat Detail</button>'
				]).draw(false);
			});
		}
	})
	function setModal(id){
		$("#id-customer").val(data[id].idcustomer);
		$("#pesanan").val(data[id].nama);
		$("#jumlah").val(data[id].qty);
		$("#harga").val(data[id].harga);
		$("#total-harga").val(data[id].harga*data[id].qty);
		$("#tanggal").val(data[id].tanggaltransaction);
		$("#invoice").val(data[id].idonlinetranscation);
		$("#print-url").attr("href", "<?php echo base_url()?>home/cetak/"+data[id].idonlinetranscation)
	}	
</script>
</html>