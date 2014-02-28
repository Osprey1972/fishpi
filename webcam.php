<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<title>Line Chart</title>
</head>

<div class="drop-shadowwebcam round" align="center">
    <img src="images/webcam/image.jpg" height="480" width="640">
    <br><br>
</div>


</html>
<?php
if (isset($_POST['webcam']))
{
exec('sudo /home/pi/Desktop/scripts/webcamshot.sh');
}
if (isset($_POST['back']))
{header('Location:index.php');}

?>

<div align="center">
<form method="post">
<button name="back">Back</button>
<button name="webcam">Take A Picture</button>
</form>
<div>
