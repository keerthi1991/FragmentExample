<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script src="js/jquery.min.js"></script>
<body>
    <div id="geoChart"></div>
 </body>

 <script type="text/javascript">
 	google.load('visualization', '1', {
    'packages': ['geochart']
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
        resolution: 'states',
    });
    google.visualization.events.addListener(chart, 'select', function() {
    var selection = chart.getSelection();
        
        // if same city is clicked twice in a row
        // it is "unselected", and selection = []
        if(typeof selection[0] !== "undefined") {
          var value = newInfo.getValue(selection[0].row, 0);
          //alert('City is: ' + value);
          query = '?place '+ value;
          window.location.href = '/Geo/lines' + query;
        }
    });

};
$(window).resize(function(){drawMarkersMap();});
 </script>