    <div class="hero-home">
      <div class="container">
        <div class="row text-">
          <div class="col-sm-12 col-lg-6">
            <div class="intro-block">
              <h1>Segmen Batas Kabupaten/Kota <br/>di Jawa Barat</h1>
              <p>Biro Pemerintahan dan Kerja Sama</p>
            </div>
          </div>
        </div>
       <!-- Form Cari -->    
        <div class="form float-right" data-wow-delay="0.3s">
          <form action="<?= base_url('segmenbatas/Kabkota/search');?>" class="subscribe-form wow zoomIn"  method="post">
            <input class="mail" type="text" placeholder="Cari Kab/Kota Berbatasan" name="keyword" autocomplete="off"  placeholder="Ketik disini">
            <input class="submit-button" type="submit" name="submit" value="Carikan">
          </form>
        </div>
      </div>
    </div>

    <div id="main" class="main" style="margin-top: 50px;">
     <div class="boxed-intro wow fadeInDown text-center">
      <h1> <strong>Segmen Batas Kabupaten dan Kota di Jawa Barat</strong></h1><br>
         <?= $this->pagination->create_links();?>
    </div>  
    <br><br>
    <div class="yd-boxed-ft">


      <div class="container">

       <div class="row">

        <div class="col-4">


          <strong>
            <p class="text-center">Kabupaten/Kota di Jawa Barat</p>
          </strong><br>
          <img class="mx-auto d-block" style="width: 100px; height: 80px;" src="<?= base_url('assets/front'); ?> /assets/images/petakabkot.png" alt="Card image cap">



          <br>
           <?php foreach($katkabkota as $k) { ?>
          <div class="card">
           
            <button type="button" class="btn btn-light text-justify">
             <?= $k->kabkot ?>
              &nbsp<span class="badge badge-light"> <img src="<?= base_url('assets/logo/').$k->logo ?>" style="width:15px; height:15px;"> </span>
            </button>
                <!-- <a href="<?= base_url('segmenbatas/Kabkota/kategori').$k->katkabkota_id ?>"> 
              
                </a>-->
             
          </div>
           <?php } ?>

       </div>


        <div class="col-7" style="margin-left: 25px;">
          <div class=" wow fadeInDown">
            <div class="row">
             <!--  <p class="h2 float-right"> Kab/Kota ...</p> -->
            </div>
            <br>
            <hr>
            <br>

            <?php foreach($segmenkabkota as $s) : ?>
            <div class="row">
              <div class="card" style="width: 100%;">
               <div class="card-header card text-white bg-danger">
                 <img src="<?= base_url('assets/logo/').$s['logo'] ?>" style="width:50px; height:50px;">
                 <p class="font-weight-bold"><?= $s['kabkot']; ?></p>
               </div>
              <div class="card-body">
                <p class="text-justify">Kab/Kota yang berbatasan:</p>
                <br><h5 class="card-title text-justify text-uppercase"><?= $s['batas']; ?></h5>
                <hr>

                <a href="#" class="btn float-left"><i class="far fa-file-pdf"></i></a>&nbsp&nbsp&nbsp<p class="font-weight-light font-italic text-monospace"><i><?= $s['aturan']; ?></i></p><br/>
               <i class="fas fa-clock text-danger"></i>  <small class="text-monospace">diupload :&nbsp&nbsp<?= date('d F Y', strtotime($s['created_at'])); ?></small>
              </div>
              </div>
            </div>
            <br>
            <?php endforeach; ?>
             <?php if (empty($segmenkabkota)) : ?>
              <div class="box-info">
                <div class="alert alert-danger text-center" role="alert">
                  Tidak ada Data
                </div>
              </div>
            <?php else : ?>
               <h5> Jumlah Data : <?= $total_rows; ?></h5><br/>
            <?php endif; ?>

      

          </div>
        </div>
      </div>
      <div class="contact-details text-center">
        <i class="ion-ios-home-outline"></i>
        <hr>
        
      </div>
    </div>
  </div>



  <!-- Scroll To Top -->
  <div class="bk-top">
    <div class="bk-top-txt">
      <a class="back-to-top js-scroll-trigger" href="#main">Konten</a>
    </div>
  </div>
  <!-- Scroll To Top Ends-->
      </div> <!-- Main -->