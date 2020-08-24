// tombol sukses 
// {F} Sweet Alert untuk sukses global
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal({
		showCloseButton: true,
        timer: 2000,
		title: 'Data',
		text: 'Berhasil ' + flashData,
		type: 'success'
	});
}

// {F} tombol hapus global
$('.tombol-hapus').on('click', function(e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal({
	  title: 'Apakah anda Yakin?',
	  text: "Data akan dihapus",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya!'
	}).then((result) => {
	  if (result.value) {
	   	document.location.href = href;
	  }
	})
});

// {F} Sweet Alert untuk Logout
$('.tombol-logout').on('click', function(e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal({
    title: 'Apakah anda ingin keluar ?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Saya ingin keluar!'
  }).then((result) => {
    if (result.value) {
     document.location.href = href;

    }
  })
});

// Chart Pie di Beranda

//font 
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart 
var ctx = document.getElementById("myPieChart2");
var myPieChart2 = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Direct", "Referral", "Social"],
    datasets: [{
      data: [100, 30, 15],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

 $('#myDatepicker').datetimepicker({
    format: "DD-MMMM-YYYY"
  });
