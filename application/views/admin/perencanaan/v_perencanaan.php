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

 
          <!-- Content Row -->

          <div class="row">

          	<div class="col-lg-12 ">

          		<!-- Illustrations -->
          		<div class="card shadow mb-4">
          			<div class="card-header py-3">
          				<div class="form float-left" data-wow-delay="0.3s">
                    Form Rencana Pembuatan Produk Hukum
          					<!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?= base_url('permendagri/Permendagri/search');?>" method="post">
          						<div class="input-group"><i class="fas fa-search fa-sm"></i>
          							<input class="form-control bg-light border-0 small" type="text" placeholder="ketik disini ..." name="keyword" aria-label="Search" aria-describedby="basic-addon2">
          							<input class="btn btn-primary" type="submit" name="submit" value="Carikan" > 
	          
                 				</div>
                 	</form> -->
                 </div>
             </div>
        
             <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-body">
                    <?= form_open_multipart('admin/identifikasi/Perencanaan'); ?>

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

                    <div class="form-group row">
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
                      <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk Hukum <span class="required" style="color: red;">*</span></label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="nama_produk" name="nama_produk" rows="2" ><?= set_value('nama_produk'); ?></textarea>
                        <small class="form-text text-danger"><?= form_error('nama_produk'); ?></small>
                      </div>
                    </div>

                     <div class="form-group row">
                      <label for="opd" class="col-sm-2 col-form-label">PD Pemrakarsa<span class="required" style="color: red;">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="opd" name="opd" placeholder="Masukan PD Pemrakarsa . . ." value="<?= set_value('opd'); ?>">
                        <small class="form-text text-danger"><?= form_error('opd'); ?></small>
                      </div>
                    </div>

                    <!-- Status -->
                    <input type="hidden" class="form-control" id="status" name="status" placeholder="Masukan PD Pemrakarsa . . ." value="Menunggu Persetujuan">

                    <hr>
                    <div class="form-group row float-left">
                      <div class="ol-sm-10 ">
                        <button type="submit" name="index" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        
                      </div>
                    </div>

                    <?= form_close(); ?>
                  </div>
                </div>
              </div>


            </div>

         </div>
     </div>
     <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <?php if ($this->session->role == 'root') { ?>
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><i class="fas fa-file"></i> Daftar Rencana Produk Hukum</div>

                       <form action="<?= base_url('admin/Cetak/cetak');?>" class="alert"  method="post" target="_blank">
                        <input class="btn btn-danger" type="submit" name="submit" value="Print Keseluruhan">
                      </form>
                    </div>
                    <?php } ?>

                 
                  </div>
                   <div class="card-body">
                   <table class="table" id="perencanaan">
                     <thead class="thead-light table table-bordered dataTable"> 
                      <tr>
                       <!--  <th scope="col" style="width: 1%;">No</th> -->
                        <th scope="col" style="width: 15%;">Urusan</th>
                        <th scope="col" style="width: 15%;">Kategori</th>
                        <th scope="col" style="width: 20%;">Nama Produk</th>
                        <th scope="col" style="width: 20%;">PD Pemrakarsa</th>
                        <th scope="col" class="text-xs" style="width: 5%;">Diajukan oleh</th>
                        <th scope="col" class="text-xs" style="width: 5%;">Status</th>
                        <th scope="col" class="text-xs" style="width: 5%;">Selesai</th>
                        <th scope="col" style="width: 5%;"></th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    </tbody> 
                    
                </table>
                </div>

                </div>
              </div>
            </div>

            <!-- Cetak Modifikasi -->
            <!-- <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><i class="fas fa-print"></i> Cetak Daftar Rencana Produk Hukum</div>
                    </div>


                  </div>
                   <div class="card-body">
                  <div class="form-row">
                       <div class="form-group col-md-5">
                        <label for="inputState">Urusan</label>
                        <select name="kat_urusan_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="-- Silahkan Pilih--">
                          <option value="">Semua Urusan</option>
                          <?php foreach ($identifikasis as $kk) { ?>
                            <option value="<?=$kk->id;?>" data-tokens="<?= $kk->name;?>"><?= $kk->name;?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-5">
                        <label for="inputState">Kategori</label>
                        <select name="kat_produk_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="-- Silahkan Pilih--">
                          <option value="">Semua Produk Hukum</option>
                          <?php foreach ($identifikasiss as $kk) { ?>
                            <option value="<?=$kk->id;?>" data-tokens="<?= $kk->produk;?>"><?= $kk->produk;?></option>
                          <?php } ?>
                        </select>
                      </div>
                     
                       <div class="form-group col-md-3">
                        <label for="inputState">Tanggal Awal</label>
                        <select id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputState">Tanggal Akhir</label>
                        <select id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>

                      <form action="<?= base_url('admin/Cetak/');?>" class="alert"  method="post">
                        <input class="btn btn-danger" type="submit" name="submit" value="Cetak">
                      </form>

                       <div class="form-group col-md-2">
                        <label for="inputState"><i class="fas fa-print"></i></label>
                  
                         <button type="submit" name="index" class="btn btn-danger form-control"><i class="fas fa-print"></i> Cetak</button>
                    
                      </div> 
                    </div>
                </div>
                </div>
              </div>
            </div> -->



 </div>
        <!-- /.container-fluid -->
 </div>
      <!-- End of Main Content -->
      <!-- Footer -->
          <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Biro Hukum dan Hak Asasi Manusia @2019</span>
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
            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>  
           



            <!-- Page level plugins -->
            <script src="<?= base_url('assets/back') ?>/vendor/chart.js/Chart.min.js"></script>

            <!-- Sweetalert -->
            <script src="<?= base_url('assets/back') ?>/sweetalert/sweetalert2.all.min.js"></script>
            <script src="<?= base_url('assets/back') ?>/js/myscript.js"></script>

           <!-- Tabel Provinsi --> 
         <script>
           
          $(document).ready(function() {
            var table = $('#perencanaan').DataTable( {
              
              lengthChange: true,
              paging      : true,
              searching   : true,
              ordering    : false,
              info       : true,
              autoWidth   : false,
              dom : 'Bfrtip',
              buttons: [ 'print', 'excel', 'pdf', 'colvis' ],
              ajax: {
                      'url' : "<?=base_url('admin/identifikasi/Perencanaan/get_data') ?>",
                      'type' : 'GET'
                     
                  },
            } );

            table.buttons().container()
            .appendTo( '#perencanaan .col-md-6:eq(0)' );
          } );

           
          </script>

          <!-- <script >
            $(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };


    //DataTable
    table = $('#perencanaan').DataTable({
      oLanguage: {
        sProcessing: "Memproses Data . . ."
      },
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: {
        "url": "<?= base_url('admin/identifikasi/Perencanaan/datatable') ?>",
        "type": "POST"
      },

      columns: [{
          "data": "id_perencanaan",
          "orderable": false,
          "searchable": false,
        },
        {
          "data": "kat_urusan_id",
          "render": function(data, type, row) {
            var html = "Non Urusan";
            if (row.kat_urusan_id) {
              html = "<span class='badge bg-green'>" + row.kat_urusan_id + "</span>";
            } else {
              html = "<span class='badge bg-red'>Non Urusan</span>";
            }
            return html;
          }
        },
        {
          "data": "kat_produk_id",
          "render": function(data, type, row) {
            var html = "";
            if (row.kat_produk_id) {
              html = "<span class='badge bg-secondary'>" + row.kat_produk_id + "</span>";
            } else {
              html = "<span class='badge bg-red'></span>";
            }
            return html;
          }
        },
        {
          "data": "nama_produk"
        },
        {
          "data": "opd"
        },
        {
          "data": "status",
          "render": function(data, type, row) {
            if (data != 0) {
              return " <span class='badge bg-green'>Selesai</span>";
            } else {
              return "<span class='badge bg-red'>Masih Proses</span>";
            }

          }
        },
       /* {
          "data": "tanggal",
          "orderable": false,
          "searchable": false,
          "visible": false,
          "render": function(data, type, row) {
            var html = "";
            if (row.tanggal == '0000-00-00') {
              var tgladded = "<span class='badge bg-red'>draft</span>";
            } else {
              var tgladded = moment(data).format("DD-MMM-YYYY");
            }
            return html = tgladded;
          }

        },*/
        {
          "data": "view",
          "orderable": false,
          "searchable": false
        }
      ],
      order: [
        [3, 'desc']
      ],
      rowId: function(a) {
        return a;
      },
      rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        $('td:eq(0)', row).html(index);
      }
    });
          </script>
           -->

    
</body>

</html>

    