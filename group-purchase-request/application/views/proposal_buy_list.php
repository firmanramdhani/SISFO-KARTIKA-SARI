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
<form action="<?= base_url('c_proposal_buy_list/proposal_buy_list');?>" method="POST">   
                <div id="signupbox" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="card"id="boxlogin">
                            <div class="card-tittle" >Proposal Buy List</div>
                        <div class="card-body ">
                            
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                            <div class="form-group col-md-12">
                                <label for="idproposalbuylist" class="control-label col-md-3">Id Proposal Buy List</label>
                                    <div class=" col-md-9">
                                        <input type="text" class="form-control" name="idproposal" placeholder="Id Proposal Buy List">
                                    </div>     
                            </div>      
                            <div class="form-group col-md-12">
                                    <label for="idbarang" class="col-md-3 control-label ">Id Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="idbarang" placeholder="Id Barang">
                                    </div>
                            </div>                 
                           <div class="form-group col-md-12">
                            <label for="qty" class="col-md-3 control-label">QTY</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control " name="qty" placeholder="0">
                                    </div>
                            </div>         
                           <div class="form-group col-md-12">
                                    <label for="idproposal" class="col-md-3 control-label">Id Proposal</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="idproposal" placeholder="Id Proposal">
                                    </div>
                            </div>                        
                                <div class="form-group col-md-12">                                   
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