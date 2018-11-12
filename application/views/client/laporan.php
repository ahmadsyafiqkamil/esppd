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

var canvas = document.getElementById('myChart');
var data = {
  labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli", "Agustus", "September", "Oktober", "November", "Desember"],
  datasets: [
    {
      label: "Total",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(75,192,192,0.4)",
      borderColor: "rgba(75,192,192,1)",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "rgba(75,192,192,1)",
      pointBackgroundColor: "#fff",
      pointBorderWidth: 1,
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(75,192,192,1)",
      pointHoverBorderColor: "rgba(220,220,220,1)",
      pointHoverBorderWidth: 2,
      pointRadius: 5,
      pointHitRadius: 10,
      data: [
        <?php foreach ($data as $d): ?>
        <?php
        if (empty($d)) {
          echo $d.',';
        }else {
          echo $d.',';
        }
        ?>
        <?php endforeach; ?>
      ],
    }
  ]
};

var option = {
  showLines: true,
  responsive: true,
  title: {
    display: true,
    text: 'Laporan Keuangan '
  },
  tooltips: {
    mode: 'label',
    label: 'mylabel',
    callbacks: {
      label: function(tooltipItem, data) {
        return 'Rp.'+tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      },
      labelColor: function(tooltipItem, chart) {
        return {
          borderColor: 'rgb(255, 0, 0)',
          backgroundColor: 'rgb(255, 0, 0)'
        }
      },
      // labelTextColor:function(tooltipItem, chart){
      //   return '#fffff';
      // }
    },
  },
  scales: {
    yAxes: [{
      ticks: {
        callback: function(value, index, values) {
          value = value.toString();
          value = value.split(/(?=(?:...)*$)/);

          // Convert the array to a string and format the output
          value = value.join('.');
          return 'Rp ' + value;
        }
      }
    }]
  },
};

$(document).ready(function() {
  $('select[name="tahun"]').on('change', function() {
    var tahun = $(this).val();
    if (tahun) {
      console.log(tahun);
      $.ajax({
        url:'<?php echo base_url("client/laporan_tahun/"); ?>'+tahun,
        type: "GET",
        dataType: "json",
        success: function(data) {
          // alert(data);
          myLineChart.clear();
          $('#myChart').html('');
          // alert(data.length);


          var data = {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [
              {
                label: "Total",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [
                  data.januari,
                  data.februari,
                  data.maret,
                  data.april,
                  data.mei,
                  data.juni,
                  data.juli,
                  data.agustus,
                  data.september,
                  data.oktober,
                  data.november,
                  data.desember
                ],
              }
            ]
          };
          var gambar = new Chart(canvas,{
            type: 'bar',
            data:data,
            options:option
          });

        }

      });
    }
  });
});

$('.yrselectdesc').yearselect({ order: 'desc'});


// var chart = new Chart( canvas, {
//           type: "bar",
//           data: {}
//           options: option,
// }

var myLineChart = new Chart(canvas,{
  type: 'bar',
  data:data,
  options:option
});

</script>
