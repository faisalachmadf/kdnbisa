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
        <div class="form wow fadeInLeft float-right" data-wow-delay="0.3s">
          <form id="chimp-form" class="subscribe-form wow zoomIn" action="#" method="post" accept-charset="UTF-8" enctype="application/x-www-form-urlencoded" autocomplete="off" novalidate>
            <input class="mail" id="chimp-#" type="#" name="#" placeholder="Cari" autocomplete="off"><input class="submit-button" type="submit" value="Carikan">
          </form>
          <div id="response"></div>
        </div>
      </div>
    </div>

    <div id="main" class="main" style="margin-top: 50px;">
     <div class="boxed-intro wow fadeInDown text-center">
      <h1> <strong>Segmen Batas Kabupaten dan Kota di Jawa Barat</strong></h1><br>
      
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

          <div class="card">

<!-- 
            <ul class="list-group list-group-flush">
              
              <?php foreach($katkabkota as $k) { ?>
                <li class="list-group-item text-center">
       
           <img src="<?= base_url('assets/logo/').$k->logo ?>" style="width:50px; height:50px;">
             
                <p><?= $k->kabkot ?></p>
              </li>
              <?php } ?>
          
            </ul> -->
          </div>
        </div>


        <div class="col-7" style="margin-left: 25px;">
          <div class=" wow fadeInDown">
            <div class="row">
              <p class="h2 float-right"> Kab/Kota ...</p>
            </div>
            <br>
            <hr>
            <br>
            <br>


            <?php foreach ($kategori as $kat) { ?>
            <div class="row">
              <div class="card" style="width: 100%;">
                <div class="card-header card text-white bg-success">
                  <b><?= $kat->katkabkot_id ?></b>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?= $kat->batas ?></h5>
                  <p class="card-text"><?= $kat->aturan ?></p>
                  <hr>
                  <a href="#" class="btn float-right"><i class="far fa-file-pdf"></i>
                    <p><?= $kat->file ?></p>
                  </a>
                </div>
              </div>
            </div>
            <br>
            <?php } ?>
          
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