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
            Detail Produk Hukum
          </div>

          <div class="card-body">
          <form action="" method="post">

          <a href="#" class="badge badge-danger">Urusan dan Jenis Dokumen</a><br/>
          <div class="form-row">
            <div class="form-group row">
              <label for="Kategori" class="col-sm-12 col-form-label">Urusan </label>
              <div class="col-sm-10">
                 <textarea class="form-control" id="hashtag" name="hashtag" rows="2" readonly=""><?= $data_identifikasi['name']; ?></textarea>
               
              </div>
              
            </div>
             <div class="form-group row">
              <label for="Kategori" class="col-sm-12 col-form-label">Kategori Produk Hukum </label>
              <div class="col-sm-10">
                <textarea class="form-control" id="hashtag" name="hashtag" rows="2" readonly=""><?= $data_identifikasi['produk']; ?></textarea>
              </div>
              
            </div>
          </div>

        <hr/><a href="#" class="badge badge-primary" title="Isikan Nama Produk Hukum">Nama Produk Hukum</a><br/>
           
           <div class="form-group row">
            <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor ..." value="<?= $data_identifikasi['nomor']; ?>" disabled>
            </div>
          </div>

           <div class="form-group row">
            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="tahun" name="tahun" placeholder="tahun ..." value="<?= $data_identifikasi['tahun']; ?>" disabled>
            </div>
          </div>

          <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="judul" name="judul" rows="2" readonly=""><?= $data_identifikasi['judul']; ?></textarea>
            </div>
          </div>
          <?php if ($data_identifikasi['kat_produk_id'] == 2) { ?>
           <div class="form-group row">
            <label for="lembaran_perda" class="col-sm-2 col-form-label">Lembaran Daerah :</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="lembaran_perda" name="lembaran_perda" rows="2" readonly=""><?= $data_identifikasi['lembaran_perda']; ?></textarea>
            </div>
          </div>
           <?php } else if ($data_identifikasi['kat_produk_id'] == 1) { ?>
           <div class="form-group row">
            <label for="lembaran_pergub" class="col-sm-2 col-form-label">Berita Lembaran Daerah :</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="lembaran_pergub" name="lembaran_pergub" rows="2" readonly=""><?= $data_identifikasi['lembaran_pergub']; ?></textarea>
            </div>
          </div>
          <?php } ?>

           <hr/><a href="#" class="badge badge-warning" title="Isikan Abstraksi">Ikhtisar Peraturan</a><br/>
           <div class="form-group row">

               <label for="abstraksi" class="col-sm-2 col-form-label">Ikhtisar Peraturan</label>
              <div class="col-sm-10">
               <p><?= html_entity_decode($data_identifikasi['abstraksi'], ENT_QUOTES, 'UTF-8'); ?></p>
              </div>
            </div>


          <hr/> <a href="#" class="badge badge-success" title="Isikan Informasi Pelengkap lainnya">Informasi Pelengkap</a><br/>
          <div class="form-group row">
            <label for="opd" class="col-sm-2 col-form-label" >PD Pemrakarsa</label>
            <div class="col-sm-10">
             <textarea class="form-control" id="opd" name="opd" rows="2" readonly=""><?= $data_identifikasi['opd']; ?></textarea>
            </div>
          </div>


          <div class="form-group row">
            <label for="tgl_penetapan" class="col-sm-2 col-form-label">Tanggal Penetapan</label>
            <div class="col-sm-10">
             <div class='input-group date col-sm-3' id='myDatepicker'>
              <input type='text' name="tgl_penetapan" id="tgl_penetapan" class="form-control input-group-addon" value="<?= date('d F Y', strtotime($data_identifikasi['tgl_penetapan'])); ?>" disabled>
            </div>
              
            </div>
          </div>
           <div class="form-group row">
            <label for="tgl_perundangan" class="col-sm-2 col-form-label">Tanggal Penetapan</label>
            <div class="col-sm-10">
             <div class='input-group date col-sm-3' id='myDatepicker'>
              <input type='text' name="tgl_perundangan" id="tgl_perundangan" class="form-control input-group-addon" value="<?= date('d F Y', strtotime($data_identifikasi['tgl_perundangan'])); ?>" disabled>
            </div>
              
            </div>
          </div>

           

            <br/>
           <div class="form-group row">
                      <label for="file" class="col-sm-2 col-form-label">File</label>
                      <div class="col-sm-10">

                        <?php if( $data_identifikasi['file'] != '') : ?>
                         <div class="alert alert-success" role="alert"> 
                          <a href="<?= base_url('assets/produk_hukum/').$data_identifikasi['file'] ?>" class="btn btn-danger" title="download" download><i class="far fa-file-pdf"></i></a>&nbsp&nbsp&nbsp<small><?= $data_identifikasi['file']; ?></small>
                        </div>
                        <?php else : ?>
                          <div class="alert alert-danger" role="alert">
                            <small>File Peraturan tidak ada !</small>
                          </div>
                        <?php endif; ?>

                      </div>
                    </div>

           <hr/><a href="#" class="badge badge-danger" title="Isikan Keterkaitan">Keterkaitan</a><br/>

          <div class="form-group row">
            <label for="keterkaitan" class="col-sm-2 col-form-label"> # keterkaitan</label>
            <div class="col-sm-10">
              <div class="alert alert-warning" role="alert">
                <?= $data_identifikasi['keterkaitan']; ?>
              </div>
            </div>
          </div> 
          <div class="form-group row">
            <label for="keterkaitan" class="col-sm-2 col-form-label"> Ikhtisar per Bab</label>
            <div class="col-sm-10">
            <?php foreach ($bab as $b) { ?>
                <div class="alert alert-warning" role="alert"> 
                    <textarea class="form-control" rows="7" readonly><?= html_entity_decode($b->ket, ENT_QUOTES, 'UTF-8');  ?></textarea>

                </div>
            <?php } ?>
            </div>
          </div>                    
          <hr>
        </form>
          

          

 <a href=" <?= base_url('admin/identifikasi/Produk_daerah');?>" class="btn btn btn-danger"><i class="fas fa-angle-left"></i> Kembali</a>
        </div>
      </div>
    </div>

  </div>

  <!-- /.container-fluid -->

