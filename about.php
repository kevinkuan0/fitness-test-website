<?
	if( $_POST["region"]==NULL )
		header("Location:index.php");
	session_start();
	$city = $_POST['city'] . $_POST['city_type'];
	$school = $_POST['school'] . "國中";

	$dbhost = 'dbhome.cs.nctu.edu.tw';
    $dbuser = 'hhkuan_cs';
    $dbpass = '164236';
    $dbname = 'hhkuan_cs_fitness';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
	mysql_query("SET NAMES utf8") or die('query failed!');
	mysql_select_db($dbname);
	$query2 = "REPLACE INTO `user` ( region, city, school, year, class ,seat_no ,height ,weight, sex ) VALUES ( '$_POST[region]', '$city', '$school', '$_POST[year]', '$_POST[class]', '$_POST[seat_no]', '$_POST[height]', '$_POST[weight]', '$_POST[sex]' );";
	mysql_query($query2) or die('query2 failed!');
	$result = mysql_query( " SELECT sid FROM `user` WHERE region='$_POST[region]' and city='$city' and school='$school' and year='$_POST[year]' and class='$_POST[class]' and seat_no='$_POST[seat_no]' ;") or die('query3 failed!');
	$row = mysql_fetch_array($result);
	$_SESSION['sid'] = $row["sid"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<link rel="stylesheet" type="text/css" href="base.css" />

<style type="text/css">

#board
{
position: absolute; left: 60px; top: 220px;
width:250px; height:280px;
}

#fitman
{
position: absolute; left: 310px; top: 210px;
width:250px; height:360px;
}

#bubble1
{
position: absolute; left: 530px; top: 220px;
width:230px; height:230px;
}

#bubble2
{
background-image: url('images/about/bubble2.png'); background-size: 100% 100%;
position: absolute; left: 550px; top: 460px;
width:190px; height:90px;
}

</style>

<script type="text/javascript">
var b2_visible = true;
function shine()
{
	if( b2_visible )
		document.getElementById("bubble2").style.backgroundImage = "none";
	else
		document.getElementById("bubble2").style.backgroundImage = "url(images/about/bubble2.png)";
	b2_visible = !b2_visible;
	setTimeout("shine()",1000);

}

function next_page()
{
	document.location.href="instructions.php";
}
</script>
</head>


<body onload="shine()" >

<div class="main">
	<img class="heading1" src="images/heading1.png" />
	<img class="heading2" src="images/about/heading2.png"/>
	<img id="board" src="images/about/board.png"/>
	<img id="fitman" src="images/about/fitman.png"/>
	<img id="bubble1" src="images/about/bubble1.png"/>
	<div id="bubble2" onclick="next_page()"></div>
</div>

</body>

</html>
