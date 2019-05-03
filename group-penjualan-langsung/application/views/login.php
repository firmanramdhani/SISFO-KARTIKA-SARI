<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
      <link rel="stylesheet" href="<?php echo base_url()?>assets/Login/css/style.css">
      <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.ico" />
  
</head>

<body>

  
<!-- Form-->
<div class="form" >
  <div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Account Login</h1>
    </div>
    <div class="form-content">
      <form action="<?php echo base_url() ?>welcome/loginkan" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password"/>
        </div>
        <div class="form-group">
          <button type="submit">Log In</button>
        </div>
      </form>
    </div>
  </div>
  <script src='<?php echo base_url()?>assets/bootstrap/js.jquery.min.js'></script>

  

    <script  src="<?php echo base_url()?>assets/Login/js/index.js"></script>




</body>

</html>
