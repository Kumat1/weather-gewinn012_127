<?php
//dev.mysql.com/downloads/connector --> Connector/] --> tar.gz

require_once('class/getweather.php');

$getWeather = new GetWeather();
$weather = $getWeather->getData($_POST['kota']);
$input=$_POST['kota'];

$kelvin = $weather->main->temp;
$celcius=$kelvin-273;
$degree= $weather->wind->deg;
$foto=$degree+90;
//var_dump($weather);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>info cuaca <?=$weather->name?></title>
        <link href="style.css" rel="stylesheet">
	<head>
	<style>
	div {
		transform: rotate(<?php echo"$foto";?>deg);
	}
	</style>
	<body class="pertama">
		<form method="post" action="index.php">
	    <center><table width="32%">
               <tr>
                   <td colspan="2" class="header"><h1 style="margin: 0 0 0 0;"><center>Choose Your City</center></h1></td>
               </tr>
               <tr>
                   <td colspan="2" class="a1"><input class="data" type="text" name="kota" value="<?php echo "$input";?>"></td>
               </tr>
               <tr>
                   <td colspan="2"><center><input class="btn" type="submit" name="check" value="CHECK"></center></td>
               </tr>
			   <tr>
					<td colspan="2" height="50px"><center><h1><?= $weather->name?></h1></center></td>
			   </tr>
			   <tr>
					<td colspan="2" height="100px"><center><h1> <?= $weather->weather[0]->main?></h1>
					<?php
					if($weather->weather[0]->main == "Haze"){
						echo "<img src=picture/kabut.png width=100px height=100px>";
					}
					else if($weather->weather[0]->main == "Thunderstorm"){
						echo "<img src=picture/hujanpetir.png width=100px height=100px>";
					}
					else if($weather->weather[0]->main == "Clouds"){
						echo "<img src=picture/berawan.png width=100px height=100px>";
					}
					else if($weather->weather[0]->main == "Rain"){
						echo "<img src=picture/hujan.png width=100px height=100px>";
					}
					else if($weather->weather[0]->main == "Clear"){
						echo "<img src=picture/matahari.png width=100px height=100px>";
					}
					else if($weather->weather[0]->main == "Drizzle"){
						echo "<img src=picture/drizzle.png width=100px height=100px>";
					}					
					?>
					</center></td>
			   </tr>
			   <tr>
					<td class="left" height="150px" width="50%"><center>
						<p>Temperature ==> <?= $celcius?> Celcius</p>
						<p>visibility ==> <?= @$weather->visibility?> m</p>
						<p>pressure ==> <?= $weather->main->pressure?> Pa</p>
						<p>humidity ==> <?= $weather->main->humidity?> RH</p>
					</center></td>
					<td height="150px" width="50%"><center>
						Wind<br>
						<?= $weather->wind->speed?> kmph<br><br>
						<div><img src="picture/panah.png" width="75px" height="75px"></div>
					</center></td>
			   </tr>
           </table></center>
	</body>
</html>