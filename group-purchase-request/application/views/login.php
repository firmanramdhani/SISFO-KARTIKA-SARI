<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" src="">
	<link rel="stylesheet" type="text/css" href="<?=base_url('');?>assets/css/bootstrap.min.css" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('');?>assets/purchase_request.css">
	<script type="text/javascript" src="<?= base_url('');?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url('');?>assets/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?= base_url('');?>assets/js/bootstrap.bundle.min.js"></script>
	<link href="<?= base_url('');?>assets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<style type="text/css">
        body{
        background-image: url(<?= base_url('');?>assets/images/brote_10001.jpg);
        background-size: auto;
        background-repeat: no-repeat;
    }
</style>
<body>
	<header>
	</header>
	      <nav class="navbar fixed-top navbar-expand-md navbar-new-bottom">
            <div class="navbar-collapse collapse pt-2 pt-md-0" id="navbar2">

               <ul class="navbar-nav w-100 justify-content-center px-3">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('auth/index');?>">Login</a></a>
                    </li>
                </ul>

            </div>
        </nav>
    <center>
		<div class="container">
<form action="<?= base_url('auth/login');?>" method="POST"  >
			<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="card"id="boxlogin">
    		<div class="card-header">
                <div>
                    <img src="<?= base_url('');?>assets/images/pegawai.png" style=" width: 175px; margin-bottom: 20px; margin-top: 20px; " class="rounded-circle">
                </div>
					<div>
					</div>
					<div class= "card-boddy">

    				                <div class="input-group form-group col-md-10 ">
    					               <input type="text" name="username" placeholder="Username" class="form-control inpt">
    				                </div>
    				                <div class="input-group form-group col-md-10">
    					               <input type="text" name="password" placeholder="Password" class="form-control inpt">
    				                </div>
    				                <div class="form-group col-md-0">
    						              <button type="submit"class="btn" name="btnlogin" style="" id="tombol">Login
    						              </button>
    		                      </div>
    		              </form>

			     </div>
		      </div>
		   </div>
	       </div>
	       </div>
    </center>


</body>
</html>
