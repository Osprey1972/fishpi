<?php
  class MyDB extends SQLite3 {
    function __construct() {
      $this->open( '/var/www/fishpi/code/database.db' );
    }
  }
  
  $db = new MyDB();
  if( !$db ) { 
    echo $db->lastErrorMsg();
  }
   
  $query = "SELECT * FROM temperature WHERE id > 1 ORDER BY id DESC LIMIT 30";

  $ret = $db->query( $query );
  $cpu = [];
  while( $row = $ret->fetchArray( SQLITE3_ASSOC ) ) {
    $cpu[]=$row['cpu'];
  }
  
  $results=json_encode($cpu);
         
  $db->close();
?>

<!doctype html>
<html>
  <head>  
    <title>Line Chart</title>
    <meta name= "viewport" content="initial-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="style.css" media="screen">

    <script src="Chart.js"></script>
    <script src="js/vendor/lodash.js"></script>
  </head>
  <body>
   <div class="drop-shadowgraph round">
	<div align="center">
      <h3>Current CPU Temperature Trend Last 30 min - Latest Left</h3>
    </div>
    <div align="center"><canvas id="canvas" height="300" width="800"></canvas></div>
    <div align="center">
      <button value="123" onClick="parent.location='index.php'">Home</button>
      <button value="123" onClick="parent.location='line.php'">Water Temperature</button>
      
    </div>
	</div>

    <script>
      window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        var data = <?php echo $results; ?>;
		console.log(data);
        
        var lineChartData = {
          labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"],
          datasets : [
            {
              fillColor : "rgba(220,220,220,0.5)",
              strokeColor : "rgba(20,20,20,1)",
              pointColor : "rgba(120,120,120,1)",
              pointStrokeColor : "#fff",
              data : data
            }
          ]
        }
        
        var min = _.max(lineChartData.datasets[0].data) 
        var max = _.min(lineChartData.datasets[0].data) 

        if( max === min ) {
          var options = {
            scaleOverride : true,
            scaleSteps : 3,
            scaleStepWidth : 0.1,
            scaleStartValue : max - 0.2
          }
          var myLine = new Chart( ctx ).Line( lineChartData, options );
        }
        else {
          var myLine = new Chart( ctx ).Line( lineChartData );
        }
      }
    </script>
  </body>
</html>
