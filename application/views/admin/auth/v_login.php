
  <div id="particles-js"></div> 
  <div class="container">
    <br><br/>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      
      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">

          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"  
              style="
              background: url(<?= base_url();?>assets/back/img/logo_login.jpg); 
              background-position: center;
              background-size: cover;" >
                
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?= base_url();?>assets/back/img/logojabar.PNG" alt="logo jawa barat" width="90" height="100">
                    <hr/>
                    <h1 class="h4 text-gray-900 mb-4"><b>SISTEM PENGENDALIAN NASKAH DOKUMEN KERJASAMA</b></h1>
                  </div>
                   <form action="<?= base_url();?>admin/auth/Login/auth" method="post" enctype="multipart/form-data"class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user text-center" id="username" placeholder="Masukan username anda" name="username" aria-describedby="emailHelp" value="<?= set_value('username'); ?>">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user text-center" id="password" placeholder="Masukan password anda" name="password" required="" placeholder="Password" value="<?= set_value('password'); ?>">
                    </div>
                
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login <i class="fa fa-sign-in"></i>
                    </button>
               
                  
                  </form>
                   <hr>
               <!--   <p>Kamu lupa password? <font color="red"><b>Segera Hubungi Admin Utama! </b></font></p> -->
                   <div class="row justify-content-center">
                     <p>Kasubag Dalam Negeri -  Biro Pemerintahan dan Kerja Sama@2019</p>
                   </div>
                <!--   <?php echo print_r($this->session->userdata);?> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>


    </div>
<script type="text/javascript">
  particlesJS("particles-js", {"particles":{"number":{"value":160,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":1,"random":true,"anim":{"enable":true,"speed":1,"opacity_min":0,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":4,"size_min":0.3,"sync":false}},"line_linked":{"enable":false,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":1,"direction":"none","random":true,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":600}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"bubble"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":250,"size":0,"duration":2,"opacity":0,"speed":3},"repulse":{"distance":400,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;
</script>
