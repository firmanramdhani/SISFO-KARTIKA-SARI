
        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h1>Premium Quality</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="<?php echo base_url() ?>assets/images/slider/fornt-img/1.png" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h1>Produk Pilihan</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="<?php echo base_url() ?>assets/images/slider/fornt-img/2.png" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Produk Kami</h2>
                            <p>Harga Terjangkau, Qualitas Tinggi</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <!-- Start Single Category -->
                            <?php
                            $n=1;
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
                                        <input type="hidden" name="idtransaction" value="<?php echo $this->session->userdata('idtrans') ?>">
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
                          <?php $n++;
                          if ($n == 7) {
                            break;
                          }
                        } ?>

                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
