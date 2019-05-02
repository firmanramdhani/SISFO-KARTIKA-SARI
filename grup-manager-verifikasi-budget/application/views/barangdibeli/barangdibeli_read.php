<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Barangdibeli Read</h2>
        <table class="table">
	    <tr><td>Managerid</td><td><?php echo $managerid; ?></td></tr>
	    <tr><td>Pegawaiid</td><td><?php echo $pegawaiid; ?></td></tr>
	    <tr><td>Budget</td><td><?php echo $budget; ?></td></tr>
	    <tr><td>Tanggalmasuk</td><td><?php echo $tanggalmasuk; ?></td></tr>
	    <tr><td>Tanggaldateline</td><td><?php echo $tanggaldateline; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barangdibeli') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>