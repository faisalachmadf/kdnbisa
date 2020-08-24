<!DOCTYPE html>
<html dir="ltr" lang="id">

<head>
  <meta charset="UTF-8" />
  <title>Print Notulen</title>
  <link href="<?= base_url('assets/back') ?> /vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/back') ?> /css/sb-admin-2.min.css" rel="stylesheet">
<!-- <link type="text/css" href="view/stylesheet/stylesheet.css" rel="stylesheet" media="all" />
  <link type="text/css" href="view/stylesheet/global.css" rel="stylesheet" media="screen" /> -->
  <style type="text/css">
  .table-bordered {
   border: 1px solid #dddddd!important;
 }
 .table-bordered > tbody > tr > td,
 .table-bordered > thead > tr > td {
   border: 1px solid #dddddd!important;
 }
 .print-title {
  display: block;
  text-align: center;
  margin-bottom: 20px;
}
@media print {
  a[href]:after {
    content: " (" attr(href) ")";
  }
}

table, tr, td {
  border: 1px solid white;
}
tr.hide_all > td, td.hide_all{
  border-style:hidden;
}

</style>
<script type="text/javascript"><!--
  $(document).ready(function() {
/* window.print();*/
});
//--></script>
</head>


<body style="background: #FFFFFF">
  <div class="container" >
    <div style="page-break-after: always;">
      <div class="print-title" style="border-bottom: double;" >
        <h1><b>
          <img src="<?= base_url('assets/back') ?>/img/kop.png" alt="..." style="max-width: 100%; height: auto;">
        </b></h1> 
      </div><br/> 

      <center><p style="font-size: 1.2em"><b> Daftar Perencanaan Pembuatan Produk Hukum </b></p><br/></center>
      <div class="clearfix">
        <table class="table table-bordered ">
         <thead class="table-bordered bg-light"> 
          <tr>
          
            <th scope="col" ">Urusan</th>
            <th scope="col" ">Kategori</th>
            <th scope="col" ">Nama Produk</th>
            <th scope="col" ">PD Pemrakarsa</th>
            <th scope="col" ">Status</th>
            <th scope="col" ">Status</th>
            <th scope="col" ">Diajukan oleh</th>
          </tr>
        </thead>

        <?php  foreach ($cetak as $c) :  ?>
      

        <?php if ($c->selesai == 0) { ?>
        <?php  $c->selesai = "<span class='badge badge-secondary text-xs'>-</span>"; ?>
        <?php } else if ($c->selesai == 1) { ?>
        <?php  $c->selesai = "<span class='badge badge-success text-xs'>selesai</span></i>"; ?>
        <?php } else if ($c->selesai == 2) { ?>
        <?php  $c->selesai = "<span class='badge badge-danger text-xs'>dibatalkan</span></i>"; ?>
        <?php } ?>

        <tbody>
          <td><p><?= $c->name; ?></p> </td>
          <td><p><?= $c->produk; ?></p>  </td>
          <td><p><?= $c->nama_produk; ?></p>  </td>
          <td><p><?= $c->opd; ?></p>  </td>
          <td><p class="text-xs"><?= $c->status; ?></p>  </td>
          <td><p class="text-xs"><?= $c->selesai; ?></p>  </td>
          <td><p class="text-xs"><?= $c->nama; ?></p> </td>
        </tbody> 
         <?php endforeach; ?>
      </table>
    </div>

    <br/>


    <!--  Disini diisi dengan tandatangan -->
    <table class="table" style="border: hidden;">
      <tr class="hide_all">
        <td style="width: 5px;">
        </td>
        <td style="width: 200px">

        </td>
        <td >

        </td>
        <td style="width: 200px">

        </td>
        <td style="text-align: center;">
         <p style="font-size: 1em">  Kepala Subbagian Perundang-undangan<br>
           <br><br><br><br>
           <span>SHINTA GARSITA FARIDAH SH.,ST.,MSM</span><br/>
           <span>NIP. 19760124 200604 2 004</span>
         </td>
       </tr>
     </table>

   </div>
 </div>
</body>
</html>