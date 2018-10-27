<div class="content-wrapper">
  <!-- Javascript sourced data -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_22'); ?></h5>
      <div class="heading-elements">
        <ul class="icons-list">
          <li><a data-action="collapse"></a></li>
          <!-- <li><a data-action="reload"></a></li> -->
          <!-- <li><a data-action="close"></a></li> -->
        </ul>
      </div>
    </div>

    <div class="panel-body">
      <div class="text-left">

        <!-- <label>tahun:</label>  -->
        <select name="tahun" class="yrselectdesc form-control"></select>

      </div>
    </div>

    <canvas id="myChart" ></canvas>
  </div>
  <!-- /javascript sourced data -->

</div>

<script type="text/javascript">
$('.yrselectdesc').yearselect({ order: 'desc'});

// var canvas = document.getElementById('myChart');
// var data = {
//   labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli", "Agustus", "September", "Oktober", "November", "Desember"],
//   datasets: [
//     {
//       label: "Total",
//       fill: false,
//       lineTension: 0.1,
//       backgroundColor: "rgba(75,192,192,0.4)",
//       borderColor: "rgba(75,192,192,1)",
//       borderCapStyle: 'butt',
//       borderDash: [],
//       borderDashOffset: 0.0,
//       borderJoinStyle: 'miter',
//       pointBorderColor: "rgba(75,192,192,1)",
//       pointBackgroundColor: "#fff",
//       pointBorderWidth: 1,
//       pointHoverRadius: 5,
//       pointHoverBackgroundColor: "rgba(75,192,192,1)",
//       pointHoverBorderColor: "rgba(220,220,220,1)",
//       pointHoverBorderWidth: 2,
//       pointRadius: 5,
//       pointHitRadius: 10,
//       data: [
//         <?php foreach ($data as $d): ?>
//         <?php
//         if (empty($d)) {
//           echo $d.',';
//         }else {
//           echo $d.',';
//         }
//         ?>
//         <?php endforeach; ?>
//       ],
//     }
//   ]
// };
//
// var option = {
//   showLines: true,
//   responsive: true,
//   title: {
//     display: true,
//     text: 'Laporan Keuangan '
//   },
//   tooltips: {
//     mode: 'label',
//     label: 'mylabel',
//     callbacks: {
//       label: function(tooltipItem, data) {
//         return 'Rp.'+tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
//       },
//       labelColor: function(tooltipItem, chart) {
//         return {
//           borderColor: 'rgb(255, 0, 0)',
//           backgroundColor: 'rgb(255, 0, 0)'
//         }
//       },
//     },
//   },
//   scales: {
//     yAxes: [{
//       ticks: {
//         callback: function(value, index, values) {
//           value = value.toString();
//           value = value.split(/(?=(?:...)*$)/);
//
//           // Convert the array to a string and format the output
//           value = value.join('.');
//           return 'Rp ' + value;
//         }
//       }
//     }]
//   },
// };
//
// var myLineChart = new Chart(canvas,{
//   type: 'bar',
//   data:data,
//   options:option
// });

// var dat =[];
// $(document).ready(function() {
//   $('select[name="tahun"]').on('change', function() {
//     var tahun = $(this).val();
//     if (tahun) {
//       console.log(tahun);
//       $.ajax({
//         url:'<?php echo base_url("client/laporan_tahun/"); ?>'+tahun,
//         type: "GET",
//         dataType: "json",
//         success: function(data) {
//           $.each(data, function (key, value) {
//
//             dat.push(value);
//
//           })
//         }
//
//       });
//     }
//   });
// });
// var dat1 = dat;
// var ctx = document.getElementById("myChart");
//
// var lineChart = new Chart(ctx, {
//   type: 'line',
//   data: {
//     labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli", "Agustus", "September", "Oktober", "November", "Desember"],
//     //["January", "February", "March", "April", "May", "June", "July"],
//     //$.parseJSON(lbl),
//     datasets: [{
//       label: "My First dataset",
//       backgroundColor: "rgba(38, 185, 154, 0.31)",
//       borderColor: "rgba(38, 185, 154, 0.7)",
//       pointBorderColor: "rgba(38, 185, 154, 0.7)",
//       pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
//       pointHoverBackgroundColor: "#fff",
//       pointHoverBorderColor: "rgba(220,220,220,1)",
//       pointBorderWidth: 1,
//       data: dat1
//     }, ]
//   },
// });

</script>
