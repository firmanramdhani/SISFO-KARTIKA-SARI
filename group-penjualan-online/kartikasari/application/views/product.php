        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?php echo base_url() ?>assets/images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="<?php echo base_url() ?>">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">

                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
                                        <?php
                                        foreach ($data as $d) {?>
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="<?= base_url() ?>produk/produkdetail/<?= $d->idproduk ?>">
                                                        <img src="<?php echo $d->url ?>" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                      <?php
                                                      if ($this->session->userdata('status') != "login") {
                                                      ?>
                                                      <li><a href="#" onclick="myFunction()"><i class="icon-handbag icons"></i></a></li>
                                                        <?php
                                                      }else { if($this->session->userdata('cart') !="cart")
                                                      {?>

                                                        <form class="" action="<?php echo base_url() ?>cart/init" method="post">
                                                          <input type="hidden" name="idcustomer" value="<?php echo $this->session->userdata('id') ?>"/>
                                                          <input type="hidden" name="idbarang" value="<?php echo $d->idproduk ?>"/>
                                                          <input type="hidden" name="stock" value="<?php echo $d->stock  ?>"/>
                                                          </ul>
                                                      </div>
                                                      <div class="fr__product__inner">
                                                          <h4><?php echo $d->nama ?></a></h4>
                                                          <ul>
                                                            <li>Quantity : <input type="number" name="qty" value="1" min="1" max="<?php echo $d->stock ?>"/></li>
                                                          </ul>
                                                          <ul class="fr__pro__prize">
                                                              <li>Rp. <?php echo $d->harga ?></li>
                                                              <li>Stock <?php echo $d->stock ?></li>
                                                          </ul>
                                                          <ul>
                                                          <li><button type="submit" class="btn btn-default"><i class="icon-handbag icons"></i></li></ul>
                                                        </form>

                                                <?php }if($this->session->userdata('cart') == "cart"){?>

                                                  <form class="" action="<?php echo base_url() ?>cart/add_to_cart" method="post">
                                                    <input type="hidden" name="idtransaction" value="<?php echo $this->session->userdata('idtrans'); ?>">
                                                    <input type="hidden" name="idcustomer" value="<?php echo $this->session->userdata('id') ?>"/>
                                                    <input type="hidden" name="idbarang" value="<?php echo $d->idproduk ?>"/>
                                                    <input type="hidden" name="stock" value="<?php echo $d->stock  ?>"/>
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><?php echo $d->nama ?></a></h4>
                                                    <ul>
                                                      <li>Quantity : <input type="number" name="qty" value="1" min="1" max="<?php echo $d->stock ?>"/></li>
                                                    </ul>
                                                    <ul class="fr__pro__prize">
                                                        <li>Rp. <?php echo $d->harga ?></li>
                                                        <li>Stock <?php echo $d->stock ?></li>
                                                    </ul>
                                                    <ul>
                                                    <li><button type="submit" class="btn btn-default"><i class="icon-handbag icons"></i></li></ul>
                                                    </form>
                                                  <?php  }
                                                      } ?>
                                                </div>
                                            </div>
                                        </div>
                                      <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        <!-- Start Pagenation -->
                        <div class="row">
                            <div class="col-xs-12">
                                   <?php echo $pagination; ?>
                            </div>
                        </div>
                        <!-- End Pagenation -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
