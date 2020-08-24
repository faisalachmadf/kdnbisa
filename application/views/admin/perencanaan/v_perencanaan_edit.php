 <div class="container-fluid"><!-- Page Heading -->
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
        </div>

<div class="col-lg-12 ">

          		<!-- Illustrations -->
          		<div class="card shadow mb-4">
          			<div class="card-header py-3">
          				<div class="form float-left" data-wow-delay="0.3s">
                    Form Rubah Data Perencanaan Produk Hukum
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
                    <?= form_open_multipart('admin/identifikasi/Perencanaan/edit'); ?>
                    <input type="hidden" name="id" value="<?= $data_perencanaan['id']; ?>">
                      <div class="form-row">

            <?php if ($data_perencanaan['status'] =='Menunggu Persetujuan') { ?>
            <div class="form-group row">
              <label for="Kategori" class="col-sm-12 col-form-label">Urusan  <span class="required" style="color: red;">*</span></label>
              
              <div class="col-sm-10">

                <select name="kat_urusan_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="-- Silahkan Pilih--">
                  <option value="0">-- Silahkan Pilih--</option>
                  <?php foreach ($identifikasis as $urusan) { ?>
                    <?php if ($urusan->id == $data_perencanaan['kat_urusan_id']) { ?>
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
                    <?php if ($kategori->id == $data_perencanaan['kat_produk_id']) { ?>
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

                   

          <div class="form-group row">
            <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk Hukum <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
              <textarea class="form-control" id="nama_produk" name="nama_produk" rows="2"><?= $data_perencanaan['nama_produk']; ?></textarea>
           
            </div>
          </div>

          <div class="form-group row">
            <label for="opd" class="col-sm-2 col-form-label">PD Pemrakarsa <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
              <textarea class="form-control" id="opd" name="opd" rows="2" ><?= $data_perencanaan['opd']; ?></textarea>
            </div>
          </div>
          <?php }  else if ($data_perencanaan['status'] !='Menunggu Persetujuan') { ?>
                
            <div class="form-group row">
              <label for="Kategori" class="col-sm-12 col-form-label">Urusan  <span class="required" style="color: red;">*</span></label>
                
              <div class="col-sm-10">

                <select name="kat_urusan_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="-- Silahkan Pilih--">
                  <option value="0">-- Silahkan Pilih--</option>
                  <?php foreach ($identifikasis as $urusan) { ?>
                    <?php if ($urusan->id == $data_perencanaan['kat_urusan_id']) { ?>
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
                    <?php if ($kategori->id == $data_perencanaan['kat_produk_id']) { ?>
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

                   

          <div class="form-group row">

            <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk Hukum <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
              <small class="form-text text-danger float-right">Perencanaan Produk Hukum anda telah disetujui, anda tidak bisa merubah data</small>
              <textarea class="form-control" id="nama_produk" name="nama_produk" rows="2" readonly=""><?= $data_perencanaan['nama_produk']; ?></textarea>
           
            </div>
          </div>

          <div class="form-group row">
            <label for="opd" class="col-sm-2 col-form-label">PD Pemrakarsa <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
              <textarea class="form-control" id="opd" name="opd" rows="2" readonly=""><?= $data_perencanaan['opd']; ?></textarea>
            </div>
          </div>
          <?php } ?>



          <?php if ($this->session->role == 'root') { ?>
          <div class="form-group row">
            <label for="opd" class="col-sm-2 col-form-label">Reviu </label>
            <div class="col-sm-10">

              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="optradio1" value="Menunggu Persetujuan" <?php echo ($data_perencanaan['status'] =='Menunggu Persetujuan')?'checked':'' ?> ><span class='badge badge-danger'>Menunggu Persetujuan</span>
                </label>
              </div>

              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="optradio1" value="Sedang Disusun" <?php echo ($data_perencanaan['status'] =='Sedang Disusun')?'checked':''?>><span class='badge badge-info'>Setujui dan Proses</span>
                </label>
              </div>
          </div>
        </div>

        <div class="form-group row">
            <label for="opd" class="col-sm-2 col-form-label">Selesai? </label>
            <div class="col-sm-10">

              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="selesai" value="1" <?php echo ($data_perencanaan['selesai']==1)?'checked':'' ?> ><span class='badge badge-primary'>Selesai</span>
                </label>
              </div>

               <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="selesai" value="2" <?php echo ($data_perencanaan['selesai']==2)?'checked':'' ?> ><span class='badge badge-danger'>dibatalkan</span>
                </label>
              </div>

             
              </div>
          </div>

        </div>
        <?php }  else if ($this->session->role != 'root') { ?>
           <div class="form-group row">
            <label for="opd" class="col-sm-2 col-form-label">Reviu </label>
            <div class="col-sm-10">
              <small class="form-text text-danger">Persetujuan Admin Utama</small>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="optradio1" value="Menunggu Persetujuan" <?php echo ($data_perencanaan['status']=='Menunggu Persetujuan')?'checked':'' ?> disabled><span class='badge badge-danger'>Menunggu Persetujuan</span>
                </label>

              </div>

              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="optradio1" value="Sedang Disusun" <?php echo ($data_perencanaan['status']=='Sedang Disusun')?'checked':'' ?> disabled><span class='badge badge-info'>Setujui dan Proses</span>
                </label>
              </div>
          </div>
        </div>

        <div class="form-group row">
            <label for="opd" class="col-sm-2 col-form-label">Selesai? </label>
            <div class="col-sm-10">
              <small class="form-text text-danger">Persetujuan Admin Utama</small>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="selesai" value="1" <?php echo ($data_perencanaan['selesai']==1)?'checked':'' ?> disabled><span class='badge badge-primary'>Selesai</span>
                </label>
              </div>

               <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="selesai" value="2" <?php echo ($data_perencanaan['selesai']==2)?'checked':'' ?> disabled><span class='badge badge-danger'>dibatalkan</span>
                </label>
              </div>

             
              </div>
          </div>
        <?php } ?>


         <?php if ($this->session->role == 'root') { ?>
           <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">

              <textarea class="form-control" id="keterangan" name="keterangan" rows="2"><?= $data_perencanaan['keterangan']; ?></textarea>
           
            </div>
          </div>
          <?php }  else if ($this->session->role != 'root') { ?>
          <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">

              <textarea class="form-control" id="keterangan" name="keterangan" rows="2" readonly=""><?= $data_perencanaan['keterangan']; ?></textarea>
           
            </div>
          </div>
          <?php } ?>
         

          <!-- selesai -->

          <hr>
          <div class="form-group row float-left">
            <div class="ol-sm-10 ">
               
              <?php if ($data_perencanaan['status'] !='Menunggu Persetujuan' && $this->session->role == 'root') { ?>
                <button type="submit" name="index" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <?php }  else if ($data_perencanaan['status'] =='Menunggu Persetujuan') { ?>
              <button type="submit" name="index" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              <a href=" <?= base_url('admin/identifikasi/Perencanaan');?>" class="btn btn btn-danger"><i class="fas fa-undo"></i> Batal</a>
            <?php } ?>

            </div>
          </div>

          <?= form_close(); ?>
        </div>
        <a href=" <?= base_url('admin/identifikasi/Perencanaan');?>" class="btn btn btn-danger"><i class="fas fa-angle-left"></i> Kembali</a>
      </div>
    </div>


            </div>