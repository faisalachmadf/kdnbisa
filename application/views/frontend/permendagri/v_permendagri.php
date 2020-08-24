       
<div class="hero-home">
  <div class="container">
    <div class="row text-">
      <div class="col-sm-12 col-lg-6">
        <div class="intro-block">
          <h1>Peraturan Menteri Dalam Negeri mengenai Segmen Batas Daerah</h1>
          <p>Biro Pemerintahan dan Kerja Sama</p>
        </div>
      </div>
    </div>
    <!-- Form Cari -->    
    <div class="form float-right" data-wow-delay="0.3s">
      <form action="<?= base_url('permendagri/Permendagri/search');?>" class="subscribe-form wow zoomIn"  method="post">
        <input class="mail" type="text" placeholder="Cari Kab/Kota" name="keyword" autocomplete="off"  placeholder="Ketik disini">
        <input class="submit-button" type="submit" name="submit" value="Carikan">
      </form>
    </div>
  </div>
</div>

<div id="main" class="main" style="margin-top: 50px;">
  <!-- Services Section --> 
  <div class="boxed-intro wow fadeInDown text-center">
    <h1> <strong>Permendagri tentang Segmen Batas Daerah di Jawa Barat</strong></h1><br>
    
      <?= $this->pagination->create_links();?>

  </div>
  <br><br>


  <div class="yd-boxed-ft">
    <div class="container">

      <h5> Jumlah Data : <?= $total_rows; ?></h5><br/>
      <div class="row text-center">



       <?php  foreach ($permen as $p) :  ?>
         <div class="col-md-6 col-lg-3 wow fadeInDown">
          <div class="box-inner">
            <div class="box-icon">
             <a href="<?= base_url('assets/permendagri/').$p['file'] ?>"> <img src="<?= base_url('assets/front'); ?> /assets/images/pdf.png" alt="Feature" width="30" >
            </div>
            <div class="box-info">
              <small><?= $p['nomor']; ?></small><br>
              <br><small style="color: red;">tentang</small><br>
              <p><?= $p['tentang']; ?></p><br>
              <small><?= $p['segmen']; ?></small>
              <!--        <p><?= $p->file ?></p> -->
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php if (empty($permen)) : ?>
        <div class="box-info">
          <div class="alert alert-danger text-center" role="alert">
            Tidak ada Data
          </div>
        </div>
      <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="container">
      <div class="contact-details text-center">
        <i class="ion-ios-home-outline"></i>
        <hr>
      </div>
    </div>
  </div>



  <!-- Scroll To Top -->
  <div  class="bk-top">
    <div class="bk-top-txt">
      <a class="back-to-top js-scroll-trigger" href="#main">Konten</a>
    </div>
  </div>
<!-- Scroll To Top Ends-->
</div> <!-- Main -->