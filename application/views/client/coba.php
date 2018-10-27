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
      <div class="text-right">

        <input type="text" class="yearpicker form-control" value="" />
      </div>
    </div>

    <canvas id="myChart" ></canvas>
  </div>
  <!-- /javascript sourced data -->

</div>

<script type="text/javascript">

$('.yearpicker').yearpicker();

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
              <?php
              if (empty($januari->total)) {
                echo "0";
              }else {
                echo $januari->total;
              }; ?>,
              <?php
              if (empty($februari->total)) {
                echo "0";
              }else {
                echo $februari->total;
              }; ?>,
              <?php
              if (empty($maret->total)) {
                echo "0";;
              }else {
                echo $maret->total;
              }; ?>,
              <?php
              if (empty($april->total)) {
                echo "0";;
              }else {
                echo $april->total;
              }; ?>,
              <?php
              if (empty($mei->total)) {
                echo "0";;
              }else {
                echo $mei->total;
              }; ?>,
              <?php
              if (empty($juni->total)) {
                echo "0";;
              }else {
                echo $juni->total;
              }; ?>,
              <?php
              if (empty($juli->total)) {
                echo "0";;
              }else {
                echo $juli->total;
              }; ?>,
              <?php
              if (empty($agustus->total)) {
                echo "0";;
              }else {
                echo $agustus->total;
              }; ?>,
              <?php
              if (empty($september->total)) {
                echo "0";;
              }else {
                echo $september->total;
              }; ?>,

              <?php
              if (empty($oktober->total)) {
                echo "0";;
              }else {
                echo $oktober->total;
              }; ?>,

              <?php
              if (empty($november->total)) {
                echo "0";;
              }else {
                echo $november->total;
              }; ?>,
              <?php
              if (empty($desember->total)) {
                echo "0";;
              }else {
                echo $desember->total;
              }; ?>,
            ],
        }
    ]
};

function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}


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


var myLineChart = new Chart(canvas,{
  type: 'bar',
	data:data,
  options:option
});

</script>
