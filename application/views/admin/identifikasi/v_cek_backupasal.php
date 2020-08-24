  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

      <h1 class="h3 mb-0 text-gray-800"></h1>

      <!--   <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->


      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <?php if( $this->session->flashdata('flash') ) : ?>


        <!-- Flash Data Biasa-->
              <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> -->
            <?php endif; ?>

            <!--   <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>


          <!-- Content Row -->

          <div class="row">

          	<div class="col-lg-12 ">

          		<!-- Illustrations -->
          		<div class="card shadow mb-4">
                    <div class="container-fluid">
                      <div id="filter-box" class="collapse">
                        <div class="card card-no-border">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-12">
                               
                                <div class="" role="alert">
                                  <a href="<?= base_url() ?>admin/identifikasi/Perencanaan" class="btn btn-primary float-right">
                                    Daftar perencanaan Pembuatan Produk Hukum? <i class="fa fa-forward"></i></a>
                                  </div>
                                <!--   <div class="form-group row">
                                    <label for="Kategori" class="col-sm-2 col-form-label">Kategori Produk Hukum</label>
                                    <div class="col-sm-5 float-right">
                                      <select name="kat_produk_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="-- Silahkan Pilih--">
                                        <option value="">-- Silahkan Pilih--</option>
                                        <?php foreach ($identifikasiss as $kk) { ?>
                                          <option value="<?=$kk->id;?>" data-tokens="<?= $kk->produk;?>"><?= $kk->produk;?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('kat_produk_id'); ?></small>
                                  </div>

                                  <div class="form-group row">
                                    <label for="Kategori" class="col-sm-2 col-form-label">Urusan</label>
                                    <div class="col-sm-5 float-right">
                                      <select name="kat_urusan_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="-- Silahkan Pilih--">
                                        <option value="">-- Silahkan Pilih--</option>
                                        <?php foreach ($identifikasis as $kk) { ?>
                                          <option value="<?=$kk->id;?>" data-tokens="<?= $kk->name;?>"><?= $kk->name;?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('kat_urusan_id'); ?></small>
                                  </div>
 -->
                               
                              </div>
                            </div>
                           <!--  <div class="row">
                              <div class="col-sm">
                                <div class="float-right">
                                  <button type="button" id="button-filter" class="btn btn-outline-primary"><i class="fa fa-search"></i> Carikan</button>
                                </div>
                              </div>
                            </div> -->
                          </div>
                        </div>
                      </div>
              <a class="btn btn-secondary float-right collapsed" id="button-filter-box" data-toggle="collapse" href="#filter-box" role="button" aria-expanded="false" aria-controls="filter-box">
                Perencanaan Produk Hukum <i class="fa fa-forward"></i></i>
              </a> 
            </div>

            <div class="card-body">
            <div class="row">
             <!--     <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  Produk Hukum</div>
                                </div>
                                <div class="col-auto">
                                 <div class="text-center">
                                  <h1><?= $hitung; ?></h1>
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div> -->

                       


                   <!-- Earnings (Monthly) Card Example -->
                <!--    <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Keputusan Gubernur</div>
                          </div>
                          <div class="col-auto">
                           <div class="text-center">
                            <h1><?= $hitungkepgub; ?></h1>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
            </div>
            <hr/>
                         
              <div class="form-group row">

             
                <label for="judul" class="col-sm-12 col-form-label text-center"><strong><img src="<?= base_url('assets/back')?>/img/logojabar.PNG" style="width:50px; height: 50px;"><br/><br/>Kata Kunci</strong></label>
                <div class="col-sm-12">

                      <form action="<?= base_url('admin/identifikasi/Cek/search');?>" class="alert btn-outline-primary"  method="post" >
                        <input class="col-sm-12 text-center" type="text" placeholder="Masukan Kata Kunci..." name="keyword" autocomplete="off" minlength="3" required>
                        <input class="col-sm-12 text-center float-center btn btn-primary" type="submit" name="submit" value="Carikan" minlength="3" required>
                      </form>
                      
                      </div>
                    </div>

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                      <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                          <span class="text-danger">KDN BISA</span> || <span>Biro Hukum dan Hak Asasi Manusia @2019</span>
                        </div>
                      </div>
                       
                    </footer>
                    <!-- End of Footer -->

                  </div>

                  <!-- End of Content Wrapper -->
                </div>
                   <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-12">
                      <div class="card border-left shadow h-100 py-2">
                        <div class="card-body">

                          <?= $this->pagination->create_links();?>

                          <h5>  <?= $produk_hukum; ?> <!-- : <?= $total_rows; ?> --> </h5>
                          <div class="box-info">
                            <div class="alert alert-success text-left" role="alert">
                              Kata Kunci : <strong><?= set_value('keyword'); ?></strong>
                            </div>
                            <a href="<?= base_url() ?>admin/identifikasi/Cek" class="btn btn-danger btn-icon-split">

                              <span class="text-xs"><i class="fas fa-sync"></i> Reset</span>
                            </a> 

                          </div>
                          <br/>

                          <?php  foreach ($cek as $p) :  ?>
                            <div class="row">
                              <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                  <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <!-- <div class="text-xl font-weight-bold text-success text-uppercase mb-1">Urusan : <strong><?= $p['name']; ?></strong></div> -->
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          <!-- <?= $p['produk']; ?> --></div>
                                          <div class="col-sm-1">
                                            <?php if( $p['file'] != '') : ?>
                                             <div class="alert" role="alert"> 
                                              <a href="<?= base_url('assets/produk_hukum/').$p['file'] ?>" target="_blank" class="btn btn-danger" title="download" download><i class="far fa-file-pdf"></i><small>download file</small></a>

                                            </div>

                                            <?php else : ?>
                                              <div class="alert alert-danger" role="alert">
                                                <small>File Peraturan tidak ada !</small>
                                              </div>
                                            <?php endif; ?>
                                          </div>
                                          <p class="text-xs">OPD Pemrakarsa : <?= $p['opd']; ?></p>
                                          <hr/>
                                          <span class="text-xs btn-danger"><i class="fas fa-file"></i> nama produk hukum</span>
                                          <p><strong><?= $p['judul']; ?></strong></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-8 col-md-6 mb-4">
                                  <div class="card  shadow h-100 py-2">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xl font-weight-bold text-info text-uppercase mb-1">Ikhtisar Peraturan</div>
                                        </div>

                                      </div>

                                      
                                      <p class="text-xs"><?= html_entity_decode($p['abstraksi'], ENT_QUOTES, 'UTF-8'); ?></p>
                                      <span class="text-xs btn-primary"><i class="fas fa-star"></i> Keterkaitan</span>  <p class="text-xs"><?= $p['keterkaitan']; ?></p>

                                      <span class="text-xs btn-secondary"><i class="fas fa-gavel"></i> Ikhtisar Per BAB</span>
                                     
                                        <!-- <?php foreach ($bab as $b) { ?>
                                          <?php if ($b->id_identifikasi == $p['bbidentifikasi']) { ?>
                                          <div class="alert alert-warning" role="alert"> 
                                            <textarea class="form-control" rows="5" readonly><?= html_entity_decode($b->ket, ENT_QUOTES, 'UTF-8');  ?></textarea>
                                          </div>
                                          <?php } ?>
                                        <?php } ?> -->
                                  

                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php endforeach; ?>
                            <?php if (empty($cek)) : ?>
                              <div class="box-info">
                                <div class="alert alert-danger text-center" role="alert">
                                  Tidak ada Data terkait : <strong><?= set_value('keyword'); ?></strong>
                                </div>
                              </div>
                            <?php endif; ?>


                          </div>
                        </div>


                      </div>
                      <!-- /.container-fluid -->
                    </div>
                    <!-- End of Main Content -->
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                  <i class="fas fa-angle-up"></i>
                </a>



                <!-- Moment -->
                <script src="<?= base_url('assets/back') ?>/moment/moment.min.js"></script>

                <!-- Bootstrap core JavaScript-->
                <script src="<?= base_url('assets/back') ?>/vendor/jquery/jquery.min.js"></script>
                <script src="<?= base_url('assets/back') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="<?= base_url('assets/back') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="<?= base_url('assets/back') ?>/js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="<?= base_url('assets/back') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="<?= base_url('assets/back') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="<?= base_url('assets/back') ?>/js/demo/datatables-demo.js"></script>

                <!-- Page level plugins -->
                <script src="<?= base_url('assets/back') ?>/vendor/chart.js/Chart.min.js"></script>

                <!-- Sweetalert -->
                <script src="<?= base_url('assets/back') ?>/sweetalert/sweetalert2.all.min.js"></script>
                <script src="<?= base_url('assets/back') ?>/js/myscript.js"></script>

                <!-- Tabel Provinsi --> 
         <!--    <script>
            $(function () {
              $('#identifikasi').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
               /* 'processing': true,
                'serverSide': true,
                'order': [[3, 'asc']],*/
                "ajax": {
                      url : "<?=base_url('admin/identifikasi/Produk_daerah/get_data') ?>",
                      type : 'GET'
                  },
              
              })
            })
          </script> -->
          


        </body>

        </html>

