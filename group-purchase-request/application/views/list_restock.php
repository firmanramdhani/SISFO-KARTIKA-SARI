<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" src="">
	<link rel="stylesheet" type="text/css" href="<?=base_url('');?>assets/css/bootstrap.min.css" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('');?>assets/purchase request.css">
    <link href="<?=base_url('');?>assets/css/bootstrap-4.0.0.css" rel="stylesheet">
    <link href="<?=base_url('');?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?=base_url('');?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
	<script type="text/javascript" src="<?=base_url('');?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url('');?>assets/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url('');?>assets/js/bootstrap.bundle.min.js"></script>
	<link href="<?=base_url('');?>assets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<style type="text/css">
        body{
        background-image: url(<?=base_url('');?>assets/images/Bakery-Background.png);
        background-size: auto;
        background-repeat: no-repeat;
    }
</style>
<body>
    <header>
        <!-- <?=$user['iduser']; ?> -->

    </header> 
      <nav class="navbar fixed-top navbar-expand-md navbar-new-bottom">
            <div class="navbar-collapse collapse pt-2 pt-md-0" id="navbar2">

               <ul class="navbar-nav w-100 justify-content-center px-3">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('karyawanpur/index');?>">List Barang</a></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('purchase_request1/index');?>">Proposal</a></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('c_proposal_buy_list/index');?>">Proposal Buy List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('c_status/index');?>">Status</a>
                    </li>
                    <li class="nav-item">
                        <a  href="<?=base_url('auth/logout');?>" class="nav-link ">Sign Out</a>
                    </li>
                </ul>   
                
            </div>
        </nav>

     <div class="row">
      <div class="col-lg-8 ml-auto mr-auto">
       <center><h3>List Barang</h3></center>
    <table id="example" class="display" style="width:100%">
        <thead>
            <th>Id Barang</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>QTY</th>
            <th>Harga</th>
            <!-- <th></th> -->
        </thead>
        <tbody>
            <?php foreach ($barangs as $barang){?>
                <tr>
                    <td><?=$barang['idbarang'];?></td>
                    <td><?=$barang['nama'];?></td>
                    <td><?=$barang['kodebarang'];?></td>
                    <td><?=$barang['qty']?></td>
                    <td><?=$barang['harga']?></td>
                    <!-- <td></td>                -->
                    <!-- <td></td> -->
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="<?=base_url('');?>assets/js/jquery-3.2.1.min.js"></script>
        <script src="<?=base_url('');?>assets/js/jquery.dataTables.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="<?=base_url('');?>assets/js/popper.min.js"></script>
  <script src="<?=base_url('');?>assets/js/bootstrap-4.0.0.js"></script>
  <script src="<?=base_url('');?>assets/js/popper.min.js"></script>
      <script>
          $(document).ready(function() {
    $('#example').DataTable({
        "columns": [
            { "width": "1%"},
            null,
            null,
            null,
            { "width": "10%"}
            
            
  ]
    });
} );
      </script>
    </body>
</html>