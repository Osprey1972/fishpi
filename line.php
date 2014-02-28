<!doctype html>
<html>
	<head>
		
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<title>Line Chart</title>
		<script src="Chart.js"></script>
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
		<style>
			canvas{
			}
		</style>
	</head>
	<body>
<div class="drop-shadowgraph round">
	<div align="center">
<h3>Current Temperature Trend Last 30 min - Latest Left</h3>
</div>
		<div align="center"><canvas id="canvas" height="300" width="800"></canvas></div>
		<div align="center">
		<button value="123" onClick="parent.location='index.php'">Home</button>
		<button value="123" onClick="parent.location='picputemp.php'">Pi CPU Temp</button>
		</div>
</div>
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('/var/www/fishpi/code/database.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
   }
   
  $sql =<<<EOF
      Select * from temperature Where id > 1 order by id DESC Limit 30;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      $temperature[]=$row['temp'];
	  
   }
   $results=json_encode($temperature);
     
         
  $db->close();
  ?>
<script>
		var str = "1"
		var lineChartData = {
			labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(20,20,20,1)",
					pointColor : "rgba(120,120,120,1)",
					pointStrokeColor : "#fff",
					data : <?php echo $results ?>
				}
				
			]
			
		}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	
</script>
	</body>
</html>
