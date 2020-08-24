  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1> 
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
          <!-- Earnings (Monthly) Card Example -->
            <div class="row">
                       <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Peraturan Daerah</div>
                              </div>
                              <div class="col-auto">
                               <div class="text-center">
                                 <h1><?= $hitungperda; ?></h1>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>


                     <!-- Earnings (Monthly) Card Example -->
                     <div class="col-xl-6 col-md-6 mb-4">
                      <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                              Peraturan Gubernur</div>
                            </div>
                            <div class="col-auto">
                             <div class="text-center">
                               <h1><?= $hitungpergub; ?></h1>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
 
          <!-- Content Row -->

          <div class="row">

            <div class="col-lg-12 ">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <?php if ($this->session->role == 'root' || $this->session->role == 'admin_tu') { ?>
                  <h6 class="m-0 font-weight-bold text-primary"><a href=" <?= base_url('admin/identifikasi/Produk_daerah/add'); ?>" class="btn btn-add btn-primary" ><i class="fa fa-plus"></i> Tambah</a></h6>
                  <?php } ?>


                </div>
                <div class="card-body">
                  <table class="table" id="identifikasi">
                     <thead class="thead-dark  table-striped"> 
                      <tr>
                        <th scope="col" style="width: 1%;">No</th> 
                        <th scope="col" style="width: 200px;">Urusan</th>
                        <th scope="col" style="width: 200px;">Kategori</th>
                        <th scope="col">Judul</th>
                        <th scope="col">keterkaitan</th>
                         <?php if ($this->session->role == 'root') { ?>
                        <th scope="col" style="width: 5%;"></th>
                        <?php } ?>
                      </tr>
                    </thead>

                    <tbody>
                      
                     <!--  <?php $i = 1;
                      foreach ($produk as $p) :  ?>
                      <tr>
                      <th><?= $i++ ?></th>

                      <td><?= $p['name'] ?></td>
                      <td><?= $p['produk'] ?></td>
                      <td><a href="<?= base_url();?>admin/identifikasi/Produk_daerah/detail/<?= $p['id'];?>" title="Ubah"><?= $p['judul'] ?></a></td>
                    
                      <td> 
                      <a href="<?= base_url();?>admin/identifikasi/Produk_daerah/edit/<?= $p['id'];?>" title="Ubah"><i class="fas fa-edit"></i></a>
                      <a href="<?= base_url();?>admin/identifikasi/Produk_daerah/delete/<?= $p['id'];?>" onclick="return confirm('yakin?');" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                      </tr>
                    <?php endforeach; ?> -->
                    </tbody> 
                </table>
           <!--  Jumlah Data : <?= $total_rows; ?>   --> 
             <!--    <?= $this->pagination->create_links();?> --> 
                </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
 </div>
      <!-- End of Main Content -->



      <!-- Footer -->
          <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Biro Hukum dan HAM 2019</span>
              </div>
            </div>
          </footer>
                <!-- End of Footer -->

              </div>
              <!-- End of Content Wrapper -->
           </div>
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
            <script>
            $(function () {
              $('#identifikasi').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                /*'processing': true,
                'serverSide': true,
                'order': [[3, 'asc']],*/
                "ajax": {
                      url : "<?=base_url('admin/identifikasi/Produk_daerah/get_data') ?>",
                      type : 'GET'
                  },
              
              })
            })
          </script>
          

    
</body>

</html>

    