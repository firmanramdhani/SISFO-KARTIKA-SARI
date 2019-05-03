<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" src="">
	<link rel="stylesheet" type="text/css" href="<?=base_url('');?>assets/css/bootstrap.min.css" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('');?>assets/purchase_request.css">
	<script type="text/javascript" src="<?=base_url('');?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url('');?>assets/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url('');?>assets/js/bootstrap.bundle.min.js"></script>
	<link href="<?=base_url('');?>assets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<style type="text/css">
        body{
        background-image: url(<?=base_url('');?>assets/images/brote_10001.jpg);
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
<center>  
 <div class="container">   
<div id="fullscreen_bg" class="fullscreen_bg"/>
<form action="<?= base_url('purchase_request1/purchase_request');?>" method="POST">   
                <div id="signupbox" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="card"id="boxlogin">
                            <div class="card-tittle" >Proposal</div>
                        <div class="card-body ">
                            
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                            <div class="form-group col-md-12">
                                	
                                <label for="idproposal" class="control-label col-md-3">Id Proposal</label>
                                    <div class=" col-md-9">
                                        <input type="text" class="form-control" name="idproposal" placeholder="Id Proposal">
                                    </div>     
                            </div>      
                            <div class="form-group col-md-12">
                                    <label for="judul" class="col-md-3 control-label ">Judul</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="judul" placeholder="Judul">
                                    </div>
                            </div>  
                            <?php 
                            $idkaryawanpengaju= $this->session->userdata('iduser');
                            ?>                     
                            <div class="form-group col-md-12">
                                    <label for="idkaryawanpengaju" class="col-md-3 control-label ">Id Karyawan Pengaju</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="idkaryawanpengaju" placeholder="<?php echo $this->session->userdata('iduser')?>" value="<?=$idkaryawanpengaju?>" readonly="">
                                    </div>
                            </div>                 
                    
                           <div class="form-group col-md-12">
                            <label for="idmanager" class="col-md-3 control-label">Id Manager</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control " name="idmanager" placeholder="1" value="1" readonly="">
                                    </div>
                            </div>         
                           <div class="form-group col-md-12">
                                    <label for="status" class="col-md-3 control-label">Status</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="status" placeholder="0" value="0" readonly="">
                                    </div>
                            </div> 
                            <div class="form-group col-md-12">
                                    <label for="idbuktilist" class="col-md-3 control-label">Id Bukti List</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="idbuktilist" placeholder="0">
                                    </div>
                            </div>                               
                            <div class="form-group col-md-12">
                                    <label for="deadline" class="col-md-3 control-label">Deadline</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="deadline"  placeholder="date">
                                    </div>
                            </div>                               
                            <div class="form-group col-md-12">
                                    <label for="created" class="col-md-3 control-label">Created</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="created"  placeholder="date">
                                    </div>
                            </div>                            
                            <div class="form-group col-md-12">
                                    <label for="idsupplier" class="col-md-3 control-label">Id Supplier</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="idsupplier"  placeholder="Id Supplier">
                                    </div>
                            </div>                                       
                            <div class="form-group col-md-12">
                                    <label for="budget" class="col-md-3 control-label">Budget</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="budget"  placeholder="0">
                                    </div>
                            </div>                                   
                                <div class="form-group col-md-12">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" class="btn btn-info btn-block" name="request">Request</button>
                                    </div>
                              </div>
                          
                          </div>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  </div>

</center>
</body>
</html>