  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>


    <!-- Content Row -->

    <div class="row">

      <div class="col-lg-12 ">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            Form Tambah Identifikasi Produk Hukum
          </div>

          <div class="card-body">
          <?= form_open_multipart('admin/identifikasi/Produk_daerah/edit'); ?>
          <input type="hidden" name="id" value="<?= $data_identifikasi['id']; ?>">
          <a href="#" class="badge badge-danger" title="Isikan Kategori">Urusan dan Jenis Dokumen</a><br/>
          <div class="form-row">
            <div class="form-group row">
              <label for="Kategori" class="col-sm-12 col-form-label">Urusan  <span class="required" style="color: red;">*</span></label>
              
              <div class="col-sm-10">

                <select name="kat_urusan_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="-- Silahkan Pilih--">
                  <option value="0">-- Silahkan Pilih--</option>
                  <?php foreach ($identifikasis as $urusan) { ?>
                    <?php if ($urusan->id == $data_identifikasi['kat_urusan_id']) { ?>
                    <option value="<?php echo $urusan->id;?>" selected="selected"><?php echo $urusan->name;?></option>
                    <?php } else { ?>
                    <option value="<?php echo $urusan->id;?>"><?php echo $urusan->name;?></option>
                    <?php } ?>
                    <?php } ?>
                </select>

              </div>
              <small class="form-text text-danger"><?= form_error('kat_urusan_id'); ?></small>
            </div>

             <div class="form-group row">
              <label for="Kategori" class="col-sm-12 col-form-label">Kategori Produk Hukum  <span class="required" style="color: red;">*</span></label>
              <div class="col-sm-10">

                <select name="kat_produk_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="-- Silahkan Pilih--">
                  <option value="0">-- Silahkan Pilih--</option>
                  <?php foreach ($identifikasiss as $kategori) { ?>
                    <?php if ($kategori->id == $data_identifikasi['kat_produk_id']) { ?>
                    <option value="<?php echo $kategori->id;?>" selected="selected"><?php echo $kategori->produk;?></option>
                    <?php } else { ?>
                    <option value="<?php echo $kategori->id;?>"><?php echo $kategori->produk;?></option>
                    <?php } ?>
                    <?php } ?>
                </select>

              </div>
              <small class="form-text text-danger"><?= form_error('kat_produk_id'); ?></small>
            </div>

          </div>

        <hr/><a href="#" class="badge badge-primary" title="Isikan Nama Produk Hukum">Nama Produk Hukum</a><br/>
          
           <div class="form-group row">
            <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor ..." value="<?= $data_identifikasi['nomor']; ?>" autocomplete="off">
              <small class="form-text text-danger"><?= form_error('nomor'); ?></small>
            </div>
          </div>

           <div class="form-group row">
            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="tahun" name="tahun" placeholder="tahun ..." value="<?= $data_identifikasi['tahun']; ?>" autocomplete="off">
              <small class="form-text text-danger"><?= form_error('tahun'); ?></small>
            </div>
          </div>

          <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
              <textarea class="form-control" id="judul" name="judul" rows="2" ><?= $data_identifikasi['judul']; ?></textarea>
              <small class="form-text text-danger"><?= form_error('judul'); ?></small>
            </div>
          </div>

          <?php if ($data_identifikasi['kat_produk_id'] == 1) { ?>
          <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Berita Lembaran<span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">

             <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Berita Lembaran Daerah</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Lembaran Daerah</a>
              </li>
             
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <small class="form-text text-danger">Isikan Jika Pergub</small>
                <div class="form-group row">
                  <label for="lembaran_perda" class="col-sm-1 col-form-label">Nomor :</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="lembaran_perda" name="lembaran_perda" placeholder="Berita Lembaran Daerah . . ." value="<?= $data_identifikasi['lembaran_perda']; ?>" autocomplete="off">
                    </div>
                </div>
              </div>

              <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> 
                <small class="form-text text-danger">Isikan Jika Perda</small>
                <div class="form-group row">
                  <label for="lembaran_pergub" class="col-sm-1 col-form-label">Nomor :</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="lembaran_pergub" name="lembaran_pergub" placeholder="Lembaran Daerah . . ." value="<?= $data_identifikasi['lembaran_pergub']; ?>" autocomplete="off">
                    </div>
                </div>
              </div>
            </div>
            </div>
          </div>

          <?php } else if ($data_identifikasi['kat_produk_id'] == 2) { ?>

             <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Berita Lembaran<span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">

             <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Berita Lembaran Daerah</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Lembaran Daerah</a>
              </li>
             
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <small class="form-text text-danger">Isikan Jika Pergub</small>
                <div class="form-group row">
                  <label for="lembaran_perda" class="col-sm-1 col-form-label">Nomor :</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="lembaran_perda" name="lembaran_perda" placeholder="Berita Lembaran Daerah . . ." value="<?= $data_identifikasi['lembaran_perda']; ?>" autocomplete="off">
                    </div>
                </div>
              </div>

              <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> 
                <small class="form-text text-danger">Isikan Jika Perda</small>
                <div class="form-group row">
                  <label for="lembaran_pergub" class="col-sm-1 col-form-label">Nomor :</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="lembaran_pergub" name="lembaran_pergub" placeholder="Lembaran Daerah . . ." value="<?= $data_identifikasi['lembaran_pergub']; ?>" autocomplete="off">
                    </div>
                </div>
              </div>
            </div>
            </div>
          </div>
          <?php } ?>

           <hr/><a href="#" class="badge badge-warning" title="Isikan Abstraksi">Ikhtisar Peraturan</a><br/>
           <div class="form-group row">

               <label for="abstraksi" class="col-sm-2 col-form-label">Ikhtisar Peraturan <span class="required" style="color: red;">*</span></label>
              <div class="col-sm-10">
                 <small class="form-text text-danger"><?= form_error('abstraksi'); ?></small>
                <!-- Jika ingin pake summernote pakai id="summernote" -->
                <textarea type="text" name="abstraksi" id="summernote"> <?= $data_identifikasi['abstraksi']; ?></textarea>

               
                <script>

                  $('#summernote').summernote({
                    tabsize: 3,
                    height: 200,
                    toolsbar: [
                    ['style', ['clear', 'bold']],
                    ],
                  });
                  
                </script>
              </div>
            </div>


          <hr/> <a href="#" class="badge badge-success" title="Isikan Informasi Pelengkap lainnya">Informasi Pelengkap</a><br/>
          <div class="form-group row">
            <label for="opd" class="col-sm-2 col-form-label" >PD Pemrakarsa <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
              <textarea class="form-control" id="opd" name="opd" rows="2" ><?= $data_identifikasi['opd']; ?></textarea>
              <small class="form-text text-danger"><?= form_error('opd'); ?></small>
            </div>
          </div>


          <div class="form-group row">
            <label for="tgl_penetapan" class="col-sm-2 col-form-label">Tanggal Penetapan <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
             <div class='input-group date col-sm-3' id='myDatepicker'>
                <span><i class="fas fa-calendar-alt"></i></span>
              <input type='text' name="tgl_penetapan" id="tgl_penetapan" class="form-control input-group-addon" value="<?= date('d F Y', strtotime($data_identifikasi['created_at'])); ?>">
            </div>
              <small class="form-text text-danger"><?= form_error('tgl_penetapan'); ?></small>
            </div>
          </div>

            <script>
              $('#myDatepicker').datetimepicker({
                format: "DD-MMM-YYYY"
              });
            </script>

            <div class="form-group row">
              <label for="tgl_perundangan" class="col-sm-2 col-form-label">Tanggal Perundangan <span class="required" style="color: red;">*</span></label>
              <div class="col-sm-10">
               <div class='input-group date col-sm-3' id='myDatepicker2'>
                <span><i class="fas fa-calendar-alt"></i></span>
                <input type='text' name="tgl_perundangan" id="tgl_perundangan" class="form-control input-group-addon" value="<?= date('d F Y', strtotime($data_identifikasi['tgl_perundangan'])); ?>">
              </div>
              <small class="form-text text-danger"><?= form_error('tgl_perundangan'); ?></small>
            </div>
          </div>

          <script>
            $('#myDatepicker2').datetimepicker({
              format: "DD-MMM-YYYY"
            });
          </script>
            <br/>
         <div class="form-group row">
                      <label for="file" class="col-sm-2 col-form-label">Upload File</label>
                      <div class="col-sm-10">

                        <input type="file" class="form-control-file" id="file" name="file_upload">
                        <div class="alert alert-danger col-md-4" role="alert" >
                          <small><strong>file harus berformat PDF | DOC | DOCX | JPG | PNG!</strong></small>
                        </div>
                         <div class="alert alert-success" role="alert"> 
                         <small>File yang ada :</small> &nbsp<a href="<?= base_url('assets/produk_hukum/').$data_identifikasi['file'] ?>" class="btn btn-danger" title="download" download><i class="far fa-file-pdf"></i></a>&nbsp&nbsp&nbsp<small>
                          <?= $data_identifikasi['file']; ?></small>
                       
                        </div>
                      </div>
                    </div>

           <hr/><a href="#" class="badge badge-danger" title="Isikan Keterkaitan">Keterkaitan</a><br/>
          
          <div class="form-group row">
            <label for="keterkaitan" class="col-sm-2 col-form-label"> # keterkaitan <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-5">
              

              <input type="text" class="form-control" id="keterkaitan" name="keterkaitan" value="<?= $data_identifikasi['keterkaitan']; ?>" ></textarea>
              <small class="form-text text-danger"><?= form_error('keterkaitan'); ?></small>
            </div>
          </div>

          <div class="form-group row">
            <label for="keterkaitan" class="col-sm-2 col-form-label"> Ikhtisar Per BAB</label>
            <div class="col-sm-10">
              
              <?php 
            foreach($bab as $row)
            {
              echo "<div class='form-group row' id='trow$row->id'><textarea class='form-control' rows='7' name='bab[]'>$row->ket</textarea><a href='#' onclick='hps(\"#trow$row->id\"); return false;'  class='btn btn-sm btn-danger' title='Hapus'> <i class='fa fa-minus'></i> </a> </div>"; 
            }
          ?>
          <div id="fm_bab">
          </div>

          

              
            </div>
          </div>
           <input type="hidden" name="jml_tbs" id="ke1" value="1" />
           
           
          <button type="button" class="btn btn-xs btn-warning" onclick="tbhElemen(); return false;" title="Tambah">
            <i class="fa fa-plus"></i>
            Tambah
          </button>

         
          <script type="text/javascript"><!--

            function tbhElemen() {
              var ke1 = document.getElementById("ke1").value;

              var stre;
              stre = "<div class='form-group row' id='trow" + ke1 + "'><textarea class='form-control' rows='5' name='bab[]' placeholder='Contoh: BAB "+ ke1 +", isi ikhtisar... .'></textarea><a href='#' onclick='hps(\"#trow" + ke1 + "\"); return false;' class='btn btn-sm btn-danger' title='Hapus "+ ke1 +"'> <i class='fa fa-minus'></i> </a> </div>";
              $("#fm_bab").append(stre);
              document.getElementById("ke1").value = ke1;
            }

            function hps(ke1) {
              $(ke1).remove();

              var ke4 = document.getElementById("ke1").value;
              ke5 = ke4-1;
              document.getElementById("ke1").value = ke4;
            }

            //--></script>
                    
          <hr>
          <div class="form-group row float-right">
            <div class="col-lg-12 ">
              <button type="submit" name="add" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              <a href=" <?= base_url('admin/identifikasi/Produk_daerah');?>" class="btn btn btn-danger"><i class="fas fa-undo"></i> Batal</a>
            </div>
          </div>

          <?= form_close(); ?>


        </div>
      </div>
    </div>

  </div>

  <!-- /.container-fluid -->

