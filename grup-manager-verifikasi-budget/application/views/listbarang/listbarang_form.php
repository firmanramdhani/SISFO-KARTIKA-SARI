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
        <h2 style="margin-top:0px">Listbarang <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idbarangdibeli <?php echo form_error('idbarangdibeli') ?></label>
            <input type="text" class="form-control" name="idbarangdibeli" id="idbarangdibeli" placeholder="Idbarangdibeli" value="<?php echo $idbarangdibeli; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idbarang <?php echo form_error('idbarang') ?></label>
            <input type="text" class="form-control" name="idbarang" id="idbarang" placeholder="Idbarang" value="<?php echo $idbarang; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Qty <?php echo form_error('qty') ?></label>
            <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" />
        </div>
	    <input type="hidden" name="no" value="<?php echo $no; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('listbarang') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>