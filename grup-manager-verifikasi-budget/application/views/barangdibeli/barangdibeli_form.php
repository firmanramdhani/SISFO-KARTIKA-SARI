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
        <h2 style="margin-top:0px">Barangdibeli <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Managerid <?php echo form_error('managerid') ?></label>
            <input type="text" class="form-control" name="managerid" id="managerid" placeholder="Managerid" value="<?php echo $managerid; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Pegawaiid <?php echo form_error('pegawaiid') ?></label>
            <input type="text" class="form-control" name="pegawaiid" id="pegawaiid" placeholder="Pegawaiid" value="<?php echo $pegawaiid; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Budget <?php echo form_error('budget') ?></label>
            <input type="text" class="form-control" name="budget" id="budget" placeholder="Budget" value="<?php echo $budget; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggalmasuk <?php echo form_error('tanggalmasuk') ?></label>
            <input type="text" class="form-control" name="tanggalmasuk" id="tanggalmasuk" placeholder="Tanggalmasuk" value="<?php echo $tanggalmasuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggaldateline <?php echo form_error('tanggaldateline') ?></label>
            <input type="text" class="form-control" name="tanggaldateline" id="tanggaldateline" placeholder="Tanggaldateline" value="<?php echo $tanggaldateline; ?>" />
        </div>
	    <input type="hidden" name="idbarangdibeli" value="<?php echo $idbarangdibeli; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('barangdibeli') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>