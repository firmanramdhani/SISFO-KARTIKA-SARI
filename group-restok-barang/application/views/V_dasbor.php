<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/favicon2.png">
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/favicon2.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Daftar Bahan Baku</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?=base_url()?>assets/fa/css/all.css">
    
    <!-- CSS Files -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/datatables.css" rel="stylesheet" />
    <style>
        th, td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php $this->load->view('template/V_sidebar')?>
        <div class="main-panel">
            <?php $this->load->view('template/V_navbar')?>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Daftar Barang</h5>
                                <!-- <p class="card-category">24 Hours performance</p> -->
                            </div>
                            <div class="card-body">
                                <!-- <div class="table-responsive"> -->
                                    <table class="table" id="bahanbaku">
                                        <thead>
                                            <tr>
                                                <th>ID Bahan Baku</th>
                                                <th>Nama Barang</th>
                                                <th>Nama Bahan Baku</th>
                                                <th>Stok Bahan Baku</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($bahanbaku->result_array() as $bahanbakux) { ?>
                                                <?php if ($bahanbakux['qty'] < 20) {?>
                                                <tr style="background: #FFBDBD;">
                                                <?php } else { ?>
                                                <tr>
                                                <?php } ?>
                                                    <td><?=$bahanbakux['idbahanbaku']?></td>
                                                    <td><?=$bahanbakux['nama']?></td>
                                                    <td><?=$bahanbakux['namabahanbaku']?></td>
                                                    <td><?=$bahanbakux['qty']?></td>
                                                    <td>
                                                        <button data-toggle="modal" data-target="#tambah-stok<?=$bahanbakux['idbahanbaku']?>" class="btn btn-primary btn-round">Tambah Stok</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <!-- </div> -->
                                <button data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-round">
                                    Tambah Bahan Baku
                                </button>
                            </div>
                            <!-- <div class="card-footer">
                                <div class="stats">
                                    <button class="btn btn-primary">Tambah Siswa</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('template/V_footer')?>
        </div>
    </div>

    <!-- Modal Tambah Bahan Baku -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?=base_url()?>bahanbaku/add_bahanbaku" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Bahan Baku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Bahan Baku</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Barang</label>
                            <select class="form-control" name="idbarang">
                                <?php foreach($barang->result_array() as $barangx) { ?>
                                    <option value="<?=$barangx['idbarang']?>"><?=$barangx['nama']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Stok Bahan Baku</label>
                            <input type="number" class="form-control" name="stok" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Barang -->

    <!-- Modal Tambah Stok -->
    <?php foreach($bahanbaku->result_array() as $bahanbakux) { ?>
        <div class="modal fade" id="tambah-stok<?=$bahanbakux['idbahanbaku']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?=base_url()?>bahanbaku/add_stok" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ID Bahan Baku</label>
                                <input type="text" class="form-control" name="id" value="<?=$bahanbakux['idbahanbaku']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Bahan Baku</label>
                                <input type="text" class="form-control" name="nama" value="<?=$bahanbakux['namabahanbaku']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" name="stok" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- End Modal Tambah Stok -->

    <!-- Modal Notifikasi -->
    <?php if ($this->session->flashdata("notification")) { ?>
        <div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Notifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?=$this->session->flashdata("notification")?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- End Modal Notifikasi -->

    <!-- Core JS Files -->
    <script src="<?=base_url()?>assets/js/core/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
    <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Chart JS -->
    <script src="<?=base_url()?>assets/js/plugins/chartjs.min.js"></script>
    <!-- Notifications Plugin -->
    <script src="<?=base_url()?>assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?=base_url()?>assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Datatables Plugin -->
    <script src="<?=base_url()?>assets/js/datatables.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {            
            $('#bahanbaku').DataTable();
            $('#daftar-bahanbaku').addClass("active");
            $('#notification').modal('show');
        })
    </script>
</body>
</html>
