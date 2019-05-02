<!DOCTYPE html>
<html>
<head>
	<title>Kartika Sari</title>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
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
	<center><div class="container" id="id1">
		<div class="row">
			<div class="col-sm-12">
				<input id="inp" type="text" name="kodetransaksi" placeholder="Enter Order Code . . . .">
                <button id="btn" class="btn btn-success" data-toggle="collapse" data-target="#id2">Submit</button>
                <a href="bukti"><button id="btn" class="btn btn-success">Lihat Bukti</button></a>
			</div>
		</div>
	</div>
	<div class="container  collapse" id="id2">
		<div class="row">
			<div class="col-sm-6">
				<p id="result">
				</p>
			</div>
			<div id="result_cb" class="col-sm-6" style="text-align: right;">
            </div>
            <a href="bukti"><button id="btn" class="btn btn-success">Verifikasi</button></a>
		</div>
    </div>
    
	</center>
</body>
</html>
<script>
    $('#btn').click(function(){
        $.ajax({
            url: 'home/getPesanan/'+$("#inp").val(),
            success: function(result){
                var json = $.parseJSON(result);
                $("#result").html("");
                $("#result_cb").html("");
                $.each(json, function(key, value){
                    $("#result").append(value.nama+' '+value.jumlah+"kg Rp."+value.jumlah*value.harga+' '+value.tanggal+"<br>")
                    $("#result_cb").append('<input type="checkbox" name="bahan1" value=""><br>')
                });
            }
        })
    });
</script>