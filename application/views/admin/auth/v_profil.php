  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Profile</h1>
          <!--   <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->

          <div class="row">


            <div class="col-lg-8">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Profile</h6>
                </div>

                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/back') ?>/img/undraw_posting_photo.svg" alt="">
                  </div>
                  
                    <?= form_open_multipart('admin/auth/Profil/update'); ?>
                        <div class="form-group row">
                            <label for="input-username"class="col-sm-2 col-form-label">Username <span class="required">*</span></label>
                            <div class="col-sm-10">
                             <input type="text" placeholder="Username" name="username" id="input-username" value="<?= $users->username;?>" class="form-control  col-xs-12" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-password" class="col-sm-2 col-form-label">Password  <span class="required">*</span></label>
                            <div class="col-sm-10">
                               <input type="password" placeholder="Password" name="password" id="input-password" value="" class="form-control"/>
                              <i class="notif_pass"><font color="red"> Kosongkan jika tidak akan mengubah password!</font></i>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="input-nama" class="col-sm-2 col-form-label">Nama Lengkap <span class="required">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="input-nama" value="<?= $users->nama;?>" >
                              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="input-email" class="col-sm-2 col-form-label">Email <span class="required">*</span></label>
                            <div class="col-sm-10">
                              <input class="form-control" type="text" placeholder="Email" name="email" id="input-email" value="<?= $users->email;?>">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="input-telepon" class="col-sm-2 col-form-label">No. Telp / HP<span class="required">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="No. Telp / HP" name="telepon" id="input-telepon" value="<?= $users->telepon;?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="input-jabatan"class="col-sm-2 col-form-label">Jabatan <span class="required">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" id="input-jabatan" value="<?= $users->jabatan;?>">
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                          <div class=" col-sm-10">
                            <button type="submit" name="add"  class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                 
                    <?= form_close(); ?>
    
             
                </div>
              </div>

            

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


 <script src="<?= base_url('assets/back') ?>/popper/popper.min.js"></script> 

<script>
$(document).ready(function() {
    $('#btnSave').on('click', function(e)
    {
        e.preventDefault();
        $('#btnSave').text('Menyimpan Data...');

        $.ajax({
            url : "<?=base_url('admin/auth/Profil/update')?>",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "json",
            beforeSend :function () {
                swal({
                    title: 'Loading',
                    html: 'Memproses data',
                    closeOnConfirm: true,
                    onOpen: () => {
                        swal.showLoading()
                    }
                });     
            },
            success: function(data)
            {
                swal.close();

                console.log(data);

                if(data.status)
                {
                    Swal({
                        showCloseButton: true,
                        timer: 2000,
                        title: 'Sukses',
                        text: 'Data berhasil diubah!',
                        type: 'success'
                    });

                    $('input[name="password"]').val('');
                }
                else {
                  swal({
                    showCloseButton: true,
                    type: 'error',
                    title: 'Oops...',
                    text: 'Periksa kembali form isian!'
                  }).then((result) => {
                    if (result.value) {
                        Swal(
                            '',
                            '<b>' + data.error + '</b>',
                            'info'
                        )
                    }
                  });
                }

                $('#btnSave').text('Simpan');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {   
                swal({
                    showCloseButton: true,
                    type: 'error',
                    title: 'Oops...',
                    text: 'Segarkan halaman atau Silahkan hubungi Administrator!'
                })
                .then((result) => {
                    if (result.value) {
                      //location.reload();
                    }
                });
                $('#btnSave').text('Simpan');
            }
        });
        
        return false;
    });
});
</script>
<!-- /page content -->