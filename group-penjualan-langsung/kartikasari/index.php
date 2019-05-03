<!DOCTYPE HTML>
<?php
include 'connect.php';
session_start();
if (isset($_POST['Login'])) {

  // code.
  $username = $_POST['username'];
  $pass = $_POST['password'];

  $login = mysqli_query($conn,"select username,Pass from akun where username='$username' and Pass='$pass'");
  $cek = mysqli_num_rows($login);

  if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "1";
    echo "<script type='text/javascript'> alert('login berhasil') </script>";
  }
}

 ?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy">

<title>Kartika Sari </title>

<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">

<!-- plugin: owl carousel  -->
<link href="plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
<script src="plugins/owlcarousel/owl.carousel.min.js"></script>

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

});
// jquery end
</script>

</head>
<body>
<header class="section-header">
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
  	<a class="navbar-brand" href="#"><img class="logo" src="images/logos/kartikasari-logo.png" alt="Kartikasari" title="Kartikasari"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--div class="collapse navbar-collapse" id="navbarTop">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">   Sourcing </a>
            <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="#">Top  Suppliers</a></li>
				<li><a class="dropdown-item" href="#">Suppliers by Regions </a></li>
				<li><a class="dropdown-item" href="#">Online Retailer  </a></li>
            </ul>
        </li>
		<li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">   Services </a>
            <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="#">Trade Assurance </a></li>
				<li><a class="dropdown-item" href="#">Arabic</a></li>
				<li><a class="dropdown-item" href="#">Logistics Service </a></li>
				<li><a class="dropdown-item" href="#">Membership Services</a></li>
            </ul>
        </li>
		<li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">   Community </a>
            <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="#">Help Center</a></li>
				<li><a class="dropdown-item" href="#">Submit a Dispute </a></li>
				<li><a class="dropdown-item" href="#">For Suppliers </a></li>
            </ul>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item"><a href="#" class="nav-link" > Multi Request </a></li>
		<li class="nav-item"><a href="http://bootstrap-ecommerce.com/" class="nav-link" > Download  </a></li>

      </ul> <! navbar-nav.// -->
    </div> <!-- collapse.// -->
  </div>
</nav>

<section class="header-main shadow-sm">
	<div class="container">
<div class="row-sm align-items-center">
	<div class="col-lg-4-24 col-sm-3">
	<div class="category-wrap dropdown py-1">
		<button type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-bars"></i> Categories</button>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="#">Bolu </a>
			<a class="dropdown-item" href="#">Kue Kering </a>
			<a class="dropdown-item" href="#">Kue Basah </a>
			<a class="dropdown-item" href="#">Roti </a>
		</div>
	</div>
	</div>
	<div class="col-lg-11-24 col-sm-8">
			<form action="#" class="py-1">
				<div class="input-group w-100">
					<select class="custom-select"  name="category_name">
						<option value="">All type</option>
						<option value="">Special</option>
						<option value="">Only best</option>
						<option value="">Latest</option>
					</select>
				    <input type="text" class="form-control" style="width:50%;" placeholder="Search">
				    <div class="input-group-append">
				      <button class="btn btn-warning" type="submit">
				        <i class="fa fa-search"></i> Search
				      </button>
				    </div>
			    </div>
			</form> <!-- search-wrap .end// -->
	</div> <!-- col.// -->
	<div class="col-lg-9-24 col-sm-12">
		<div class="widgets-wrap float-right row no-gutters py-1">
			<div class="col-auto">
			<div class="widget-header dropdown">
				<a href="#" data-toggle="dropdown" data-offset="20,10">
					<div class="icontext">
						<div class="icon-wrap"><i class="text-warning icon-sm fa fa-user"></i></div>
						<div class="text-wrap text-dark">
              <?php
                if ($_SESSION['status']!="1") {
                  // code...
                  echo "	Sign in <br>";
                }else {
                  echo $_SESSION['username'];
                  echo  "<br>";
                }
               ?>
							My account <i class="fa fa-caret-down"></i>
						</div>
					</div>
				</a>
				<div class="dropdown-menu">
					<form action="" method="post" class="px-4 py-3" id="form">
						<div class="form-group">
						  <label>Username</label>
						  <input type="text" class="form-control" placeholder="Username" name="username" id="username">
						</div>
						<div class="form-group">
						  <label>Password</label>
						  <input type="password" class="form-control" placeholder="Password" name="password" id="password">
						</div>
						<button type="submit" name="Login" value="submit" class="btn btn-primary">Sign in</button>
						</form>

						<hr class="dropdown-divider">
						<a class="dropdown-item" href="#">Have account? Sign up</a>
						<a class="dropdown-item" href="#">Forgot password?</a>
				</div> <!--  dropdown-menu .// -->
			</div>  <!-- widget-header .// -->
			</div> <!-- col.// -->
			<div class="col-auto">
				<a href="#" class="widget-header">
					<div class="icontext">
						<div class="icon-wrap"><i class="text-warning icon-sm fa fa-shopping-cart"></i></div>
						<div class="text-wrap text-dark">
							Order <br> Protection
						</div>
					</div>
				</a>
			</div> <!-- col.// -->
			<div class="col-auto">
				<a href="#" class="widget-header">
					<div class="icontext">
						<div class="icon-wrap"><i class="text-warning icon-sm  fa fa-heart"></i></div>
						<div class="text-wrap text-dark">
							<span class="small round badge badge-secondary">0</span>
							<div>Favorites</div>
						</div>
					</div>
				</a>
			</div> <!-- col.// -->
		</div> <!-- widgets-wrap.// row.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->

<!-- ========================= SECTION MAIN ========================= -->
<section class="section-main bg padding-y-sm">
<div class="container">
<div class="card">
	<div class="card-body">
<div class="row row-sm">
	<aside class="col-md-3">
<h5 class="text-uppercase">My Markets</h5>
	<ul class="menu-category">
		<li> <a href="#">Roti </a></li>
		<li> <a href="#">Cemilan </a></li>
		<li> <a href="#">Bolu </a></li>
		<li> <a href="#">Pastry  </a></li>
		<li class="has-submenu"> <a href="#">More category  <i class="icon-arrow-right pull-right"></i></a>
			<ul class="submenu">
        <li> <a href="#">Roti </a></li>
    		<li> <a href="#">Cemilan </a></li>
    		<li> <a href="#">Bolu </a></li>
    		<li> <a href="#">Pastry  </a></li>
			</ul>
		</li>
	</ul>

	</aside> <!-- col.// -->
	<div class="col-md-6">

<!-- ================= main slide ================= -->
<div class="owl-init slider-main owl-carousel" data-items="1" data-nav="true" data-dots="false">
	<div class="item-slide">
		<img src="images/banners/slide1.jpg">
	</div>
	<div class="item-slide">
		<img src="images/banners/slide2.jpg">
	</div>
	<div class="item-slide">
		<img src="images/banners/slide3.jpg">
	</div>
</div>
<!-- ============== main slidesow .end // ============= -->

	</div> <!-- col.// -->
	<aside class="col-md-3">

<h6 class="title-bg bg-secondary"> Best Seller</h6>
<div style="height:280px;">
  <?php
  $n = 1;
  $result= mysqli_query($conn, "SELECT * FROM barang");
    while($rows = mysqli_fetch_array($result)):
      $pathx = "images/barang/";
   ?>
	<figure class="itemside has-bg border-bottom" style="height: 33%;">
		 <img class="img-bg" src="<?php echo $pathx.$rows["gambar"] ?>" height="80">
		<figcaption class="p-2">
      <h6 class="title"><?php echo "$rows[nama]";  ?> </h6>
      <?php echo $rows['harga']; ?><br>
			<a href="#">Add to Cart</a>
		</figcaption>
	</figure>

<?php
$n++;
if ($n == 4) {
  break;
}
endwhile;
 ?>
</div>
	</aside>
</div> <!-- row.// -->
	</div> <!-- card-body .// -->
</div> <!-- card.// -->

<figure class="mt-3 banner p-3 bg-secondary">
	<div class="text-lg text-center white">Dengan Resep Pilihan</div>
</figure>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION MAIN END// ========================= -->


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y-sm bg">
<div class="container">

<header class="section-heading heading-line">
	<h4 class="title-section bg">Roti</h4>
</header>

<div class="card">
<div class="row no-gutters">
	<div class="col-md-3">

<article href="#" class="card-banner h-100 bg2">
	<div class="card-body zoom-wrap">
		<h5 class="title">Roti Segala Roti</h5>
		<p>Consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, cLorem ipsum dolor sit amet, cLorem ipsum dolor sit amet, cLorem ipsum dolor sit amet, c</p>
		<a href="#" class="btn btn-warning">Explore</a>
		<img src="images/barang/1.jpg" height="200" class="img-bg zoom-in">
	</div>
</article>

	</div> <!-- col.// -->
	<div class="col-md-9">
<ul class="row no-gutters border-cols">
  <?php
  $result= mysqli_query($conn, "SELECT * FROM barang");
    while($rows = mysqli_fetch_array($result)):
      $pathx = "images/barang/";
   ?>
	<li class="col-6 col-md-3">
<a href="#" class="itembox">
	<div class="card-body">
    <img class="img-sm" src="<?php echo $pathx.$rows["gambar"] ?>" height="80">
	  <br><?php echo "$rows[nama]"; ?>
    <br><?php echo "$rows[harga]"; ?>
    <br><a href="#">Add to Cart</a>
	</div>
</a>
	</li>
  <?php
endwhile; ?>
</ul>
<ul class="row no-gutters border-cols">
  <?php
  $result= mysqli_query($conn, "SELECT * FROM barang");
    while($rows = mysqli_fetch_array($result)):
      $pathx = "images/barang/";
   ?>
	<li class="col-6 col-md-3">
<a href="#" class="itembox">
	<div class="card-body">
    <img class="img-sm" src="<?php echo $pathx.$rows["gambar"] ?>" height="80">
	  <br><?php echo "$rows[nama]"; ?>
    <br><?php echo "$rows[harga]"; ?>
    <br><a href="#">Add to Cart</a>
	</div>
</a>
	</li>
  <?php
endwhile; ?>
</ul>
	</div> <!-- col.// -->
</div> <!-- row.// -->

</div> <!-- card.// -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->

<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION REQUEST ========================= -->

<!-- ========================= SECTION ITEMS .END// ========================= -->

<!-- ========================= SECTION LINKS ========================= -->
<!--section class="section-links bg padding-y-sm">
<div class="container">
<div class="row">
	<div class="col-sm-6">
<header class="section-heading heading-line">
	<h4 class="title-section bg text-uppercase">Suppliers by Region</h4>
</header>

<ul class="list-icon row">
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-usa.png"><span>United States</span></a></li>
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-in.png"><span>India</span></a></li>
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-tr.png"><span>Turkey</span></a></li>
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-kr.png"><span>Korea</span></a></li>
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-tr.png"><span>Turkey</span></a></li>
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-kr.png"><span>Korea</span></a></li>
</ul>
	</div> <!-- col // -->

	<!--div class="col-sm-6">
<header class="section-heading heading-line">
	<h4 class="title-section bg text-uppercase">Trade services</h4>
</header>
<ul class="list-icon row">
	<li class="col-md-4"><a href="#"><i class="icon fa fa-comment"></i><span>Trade Assistance</span></a></li>
	<li class="col-md-4"><a href="#"><i class="icon  fa fa-suitcase"></i><span>Business Identity</span></a></li>
	<li class="col-md-4"><a href="#"><i class="icon fa fa-globe"></i><span>Worldwide delivery</span></a></li>
	<li class="col-md-4"><a href="#"><i class="icon fa fa-phone-square"></i><span>Customer support</span></a></li>
	<li class="col-md-4"><a href="#"><i class="icon fa fa-globe"></i><span>Worldwide delivery</span></a></li>
	<li class="col-md-4"><a href="#"><i class="icon fa fa-phone-square"></i><span>Customer support</span></a></li>
</ul>
	</div> <!-- col // -->
<!--/div><!-- row // -->

<!--figure class="mt-3 banner p-3 bg-secondary">
	<div class="text-lg text-center white">Another banner can be here</div>
</figure>

</div><!-- container // -->
<!--/section>
<!-- ========================= SECTION LINKS END.// ========================= -->

<!-- ========================= SECTION SUBSCRIBE ========================= -->
<section class="section-subscribe bg-secondary padding-y-lg">
<div class="container">

<p class="pb-2 text-center white">Delivering the latest product trends and industry news straight to your inbox</p>

<div class="row justify-content-md-center">
	<div class="col-lg-4 col-sm-6">
<form class="row-sm form-noborder">
		<div class="col-8">
		<input class="form-control" placeholder="Your Email" type="email">
		</div> <!-- col.// -->
		<div class="col-4">
		<button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
		</div> <!-- col.// -->
</form>
<small class="form-text text-white-50">We’ll never share your email address with a third-party. </small>
	</div> <!-- col-md-6.// -->
</div>


</div> <!-- container // -->
</section>
<!-- ========================= SECTION SUBSCRIBE END.//========================= -->

<!-- ========================= FOOTER ========================= -->
<footer class="section-footer bg-secondary">
	<div class="container">
		<section class="footer-top padding-top">
			<div class="row">
				<aside class="col-sm-3 col-md-3 white">
					<h5 class="title">Customer Services</h5>
					<ul class="list-unstyled">
						<li> <a href="#">Help center</a></li>
						<li> <a href="#">Money refund</a></li>
						<li> <a href="#">Terms and Policy</a></li>
						<li> <a href="#">Open dispute</a></li>
					</ul>
				</aside>
				<aside class="col-sm-3  col-md-3 white">
					<h5 class="title">My Account</h5>
					<ul class="list-unstyled">
						<li> <a href="#"> User Login </a></li>
						<li> <a href="#"> User register </a></li>
						<li> <a href="#"> Account Setting </a></li>
						<li> <a href="#"> My Orders </a></li>
						<li> <a href="#"> My Wishlist </a></li>
					</ul>
				</aside>
				<aside class="col-sm-3  col-md-3 white">
					<h5 class="title">About</h5>
					<ul class="list-unstyled">
						<li> <a href="#"> Our history </a></li>
						<li> <a href="#"> How to buy </a></li>
						<li> <a href="#"> Delivery and payment </a></li>
						<li> <a href="#"> Advertice </a></li>
						<li> <a href="#"> Partnership </a></li>
					</ul>
				</aside>
				<aside class="col-sm-3">
					<article class="white">
						<h5 class="title">Contacts</h5>
						<p>
							<strong>Phone: </strong> +123456789 <br>
						    <strong>Fax:</strong> +123456789
						</p>

						 <div class="btn-group white">
						    <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i class="fab fa-facebook-f  fa-fw"></i></a>
						    <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i class="fab fa-instagram  fa-fw"></i></a>
						    <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i class="fab fa-youtube  fa-fw"></i></a>
						    <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i class="fab fa-twitter  fa-fw"></i></a>
						</div>
					</article>
				</aside>
			</div> <!-- row.// -->
			<br>
		</section>
		<section class="footer-bottom row border-top-white">
			<div class="col-sm-6">
				<p class="text-white-50"> Made with <3 <br>  by Vosidiy M.</p>
			</div>
			<div class="col-sm-6">
				<p class="text-md-right text-white-50">
	Copyright &copy  <br>
<a href="http://bootstrap-ecommerce.com" class="text-white-50">Bootstrap-ecommerce UI kit</a>
				</p>
			</div>
		</section> <!-- //footer-top -->
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->


</body>
</html>
