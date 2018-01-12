<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script src="js/jquery.min.js"></script>
<br>
<script>
var queryString = decodeURIComponent(window.location.search);
queryString = queryString.substring(1);
var queries = queryString.split("&");
for (var i = 0; i < queries.length; i++)
{
   document.write("You have selected the "  + queries[i] + "<br>");
}
</script> 
<br>
<br>
<div class="row">
  <div class="col-md-2">
    <!--<a href="/Geo/Lines/payroll" class="btn btn-primary">Payroll</a>-->
    <button id="pie" class="btn btn-primary">Pie Chart</button>
  </div>
  <div class="col-md-2">
   <button id="line" class="btn btn-primary">Line Chart</button>
  </div>
  <div class="col-md-2">
   <button id="bar" class="btn btn-primary">Bar Chart</button>
  </div>
  <div class="col-md-2">
   <button id="water" class="btn btn-primary">Waterfall Chart</button>
  </div>
  <div class="col-md-2">
   <a href="/Geo" class="btn btn-primary">Map</a>
  </div>
</div>

<body>
    <div id="geoChart"></div>
 </body>

//GeoChart
 <script type="text/javascript">
  google.load('visualization', '1', {
    'packages': ['geochart'],
});
google.setOnLoadCallback(drawMarkersMap);

function drawMarkersMap() {

  var arr = [];
      arr = [['City']];
        arr.push(['Mumbai']);
        arr.push(['Delhi']);
        var newInfo = google.visualization.arrayToDataTable(arr);
        console.log(newInfo);
    

    var chart = new google.visualization.GeoChart(document.getElementById('geoChart'));

    chart.draw(newInfo, {
       
        datalessRegionColor: '#3FADD1',
        tooltip: {
            textStyle: {
                color: 'blue'
            },
            showColorCode: false
        },
        displayMode: 'markers',
        //region: 'IN',
        resolution: 'states'
    });

};
$(window).resize(function(){drawMarkersMap();});
 </script>


//PieChart
<script>
    $(document).ready(function() {
  $("#pie").click(function() {
    google.load("visualization", "1", {packages:["corechart"], callback: drawChart});
    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work',     11],
        ['Eat',      2],
        ['Commute',  2],
        ['Watch TV', 2],
        ['Sleep',    7]
      ]);

      var options = {
        //title: 'My Daily Activities'
      };

      var chart = new google.visualization.PieChart(document.getElementById('geoChart'));

      chart.draw(data, options);
    }
  });
});
$(window).resize(function(){drawChart();});
</script>




//LineChart
<script>
  $(document).ready(function() {
  $("#line").click(function() {
    google.load("visualization", "1", {packages:["corechart",'line'], callback: drawBackgroundColor});
    function drawBackgroundColor() {

       var data = new google.visualization.DataTable();
    data.addColumn('number', '');
    data.addColumn('number', '');

    data.addRows([
      [0, 0],   [1, 100],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
      [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
      [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
      [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
      [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
      [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
      [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
      [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
      [48, 72], [49, 68], [50, 66], [51, 100], [52, 67], [53, 70],
      [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
      [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
      [66, 70], [67, 72], [68, 75], [69, 80]
      ]);

    var options = {
      hAxis: {
        title: 'Time'
      },
      vAxis: {
        title: 'Popularity'
      },
      backgroundColor: '#f1f8e9'
    };

      var chart = new google.visualization.LineChart(document.getElementById('geoChart'));

      chart.draw(data, options);
    }
  });
});
$(window).resize(function(){drawBackgroundColor();});
</script>

//BarChart
<script>
  $(document).ready(function() {
  $("#bar").click(function() {
    google.load("visualization", "1", {packages:["corechart",'bar'], callback: drawBasic});
    function drawBasic() {

     var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population',],
        ['New York City, NY', 8175000],
        ['Los Angeles, CA', 3792000],
        ['Chicago, IL', 2695000],
        ['Houston, TX', 2099000],
        ['Philadelphia, PA', 1526000]
      ]);

      var options = {
        title: 'Population of Largest U.S. Cities',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Population',
          minValue: 0
        },
        vAxis: {
          title: 'City'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('geoChart'));

      chart.draw(data, options);
    }
  });
});
$(window).resize(function(){drawBasic();});
</script>

//WaterfallChart
<script>
  $(document).ready(function() {
  $("#water").click(function() {
    google.load("visualization", "1", {packages:["corechart"], callback: drawChart});
    function drawChart() {

     var data = google.visualization.arrayToDataTable([
          ['Mon', 28, 28, 38, 38],
          ['Tue', 38, 38, 55, 55],
          ['Wed', 55, 55, 77, 77],
          ['Thu', 77, 77, 66, 66],
          ['Fri', 66, 66, 22, 22]
          // Treat the first row as data.
        ], true);

        var options = {
          legend: 'none',
          bar: { groupWidth: '100%' }, // Remove space between bars.
          candlestick: {
            fallingColor: { strokeWidth: 0, fill: '#a52714' }, // red
            risingColor: { strokeWidth: 0, fill: '#0f9d58' }   // green
          }
        };

      var chart = new google.visualization.CandlestickChart(document.getElementById('geoChart'));

      chart.draw(data, options);
    }
  });
});
$(window).resize(function(){drawChart();});
</script>