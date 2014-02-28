<html>
<html>
<head>
<!-- <meta http-equiv="Refresh" content="30; url=./index.php"> -->
<title>FISH PI</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>

<?php 
if (isset($_POST['cycleon']))
{
exec('sudo python /var/www/fishpi/code/cycleon_cron.py');
}
if (isset($_POST['cycleoff']))
{
exec('sudo python /var/www/fishpi/code/cycleoff_cron.py');
}
if (isset($_POST['daylighton']))
{
exec('sudo python /var/www/fishpi/code/daylighton.py');
}
if (isset($_POST['daylightoff']))
{
exec('sudo python /var/www/fishpi/code/daylightoff.py');
}
if (isset($_POST['actinicon']))
{
exec('sudo python /var/www/fishpi/code/actinicon.py');
}
if (isset($_POST['actinicoff']))
{
exec('sudo python /var/www/fishpi/code/actinicoff.py');
}
if (isset($_POST['moonlighton']))
{
exec('sudo python /var/www/fishpi/code/moonlighton.py');
}
if (isset($_POST['moonlightoff']))
{
exec('sudo python /var/www/fishpi/code/moonlightoff.py');
}
if (isset($_POST['sumpon']))
{
exec('sudo python /var/www/fishpi/code/sumpon.py');
}
if (isset($_POST['sumpoff']))
{
exec('sudo python /var/www/fishpi/code/sumpoff.py');
}

?>


<body>
<div class="drop-shadow round">

<table>
<tr><td align = "center" width="400"><img src="images/fishpilogo.png" height=""></td>
</tr>
</table>

<div align="center">
	<?php
	  echo "Current Water Weather Conditions "; $therm = file_get_contents('/var/www/fishpi/code/therm.txt');
	  echo "<strong>$therm</strong> c  ____________________________________________________";
?></div>

<div align="center">
<table border="0" width="400">
<tr>
	<td align="center"><a href="line.php"><img border="0" src="images/thermo.png" width="50"></a></td>
	<td align="center"><a href="webcam.php"><img border="0" src="images/webcam.png" width="80"></a></td>
</tr>
</table>

<div align="center">
<form method="post">
<table style="text-left: center;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
	    <td style="text-align: center;"><button name="cycleon">Cycle Lights</button></td>
		<td style="text-align: center;"><button name="cycleoff">Cycle Lights Off</button></td>
</tr>
<tr>
		<td style="text-align: center;"><button name="daylighton">Daylight On</button></td>
		<td style="text-align: center;"><button name="daylightoff">Daylight Off</button></td>
</tr>
<tr>
		<td style="text-align: center;"><button name="actinicon">Actinic On</button></td>
		<td style="text-align: center;"><button name="actinicoff">Actinic Off</button></td>
</tr>
		<td style="text-align: center;"><button name="moonlighton">Moonlight On</button></td>
		<td style="text-align: center;"><button name="moonlightoff">Moonlight Off</button></td>
<tr>
		<td style="text-align: center;"><button name="sumpon">Sump On</button></td>
		<td style="text-align: center;"><button name="sumpoff">Sump Off</button></td>
</tr>
</tbody>
</table>
</div>
</form>

<div align="center">
<?php
	echo exec('sudo sh /var/www/fishpi/code/status.sh');
	$statusa = file_get_contents('/var/www/fishpi/code/cycle_status.txt');
	$statusb = file_get_contents('/var/www/fishpi/code/daylight_status.txt');
	$statusc = file_get_contents('/var/www/fishpi/code/actinic_status.txt');
	$statusd = file_get_contents('/var/www/fishpi/code/moonlight_status.txt');
	$statuse = file_get_contents('/var/www/fishpi/code/sumplight_status.txt');
?>

<table style="text-left: center; border="2" cellpadding="2" cellspacing="2">
<tr>
	<td><?php echo "<img src=\"images/cycle.png\" align=\"center\"";?></td>
	<td><?php echo "<img src=\"images/daylight.png\" align=\"center\"";?></td>
	<td><?php echo "<img src=\"images/actinic.png\" align=\"center\"";?></td>
	<td><?php echo "<img src=\"images/moon.png\" align=\"center\"";?></td>
	<td><?php echo "<img src=\"images/sump.png\" align=\"center\"";?></td>
</tr>
<tr>
	<td align="center"><?php echo "$statusa";?></td>
	<td align="center"><?php echo "$statusb";?></td>
	<td align="center"><?php echo "$statusc";?></td>
	<td align="center"><?php echo "$statusd";?></td>
	<td align="center"><?php echo "$statuse";?></td>
</tr>
</table>
</div>
</body>
</html>

