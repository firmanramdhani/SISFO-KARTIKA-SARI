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
        <h2 style="margin-top:0px">Listbarang Read</h2>
        <table class="table">
	    <tr><td>Idbarangdibeli</td><td><?php echo $idbarangdibeli; ?></td></tr>
	    <tr><td>Idbarang</td><td><?php echo $idbarang; ?></td></tr>
	    <tr><td>Qty</td><td><?php echo $qty; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('listbarang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>