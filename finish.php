<?
	session_start();
	if( !isset($_SESSION["sid"]) )
		header("Location:http://localhost/fitness2/index.php");

	$dbhost = 'dbhome.cs.nctu.edu.tw';
    $dbuser = 'hhkuan_cs';
    $dbpass = '164236';
    $dbname = 'hhkuan_cs_fitness';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
	mysql_query("SET NAMES utf8") or die('query failed!');
	mysql_select_db($dbname);
	mysql_query( "UPDATE `user` SET `time`='$_POST[time]', no_hint='$_POST[no_hint]', score='$_POST[score]', dscore='$_POST[dscore]' WHERE sid='$_SESSION[sid]'" ) or die ("update failed!");
	mysql_close();

	if( $_POST['dscore']>80 )
		$grade_src = 'images/finish/grade1.png';
	else if( $_POST['dscore']>60 && $_POST['dscore']<80 )
		$grade_src = 'images/finish/grade2.png';
	else if( $_POST['dscore']>40 && $_POST['dscore']<60 )
		$grade_src = 'images/finish/grade3.png';
	else
		$grade_src = 'images/finish/grade4.png';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<link rel="stylesheet" type="text/css" href="base.css" />
<style type="text/css">

#bubble
{
z-index: 1;
position: absolute;  left: 90px;  top: 110px;
width:620px;  height:170px;
}

#fitman
{
position: absolute;  left: 40px;  top: 260px;
width:230px;  height:300px;
}

#time_hint
{
background-color: green;
border: 1px solid black;
position: absolute;  left: 290px;  top: 300px;
width: 180px; height: 240px;
}

.time_hint_block
{
border: 1px solid black;
margin: 0px; padding: 0px;
}

.caption
{
border: 1px solid black;
margin: 0px; padding: 0px;
text-align: center; line-height: 30px; font-size: 26px;
color: white;
font-family: "微軟正黑體","細明體","Times New Roman",monospace;
}

.value
{
border: 1px solid black;
margin: 0px; padding: 0px;
text-align: center; line-height: 60px; font-size: 50px;
color: white;
font-family: "微軟正黑體","細明體","Times New Roman",monospace;
}

#score_table
{
background-color: gold;
border: 4px solid red;
position: absolute;  left: 500px;  top: 300px;
width:260px;  height:260px;
}

#score_table div{
border: 3px solid red;
width:120px; height:120px;
}

#dynamic_score { position: absolute; left: 3px; top: 3px; background: url("images/finish/dynamic_score.png");}
#real_score    { position: absolute; left: 131px; top: 3px; background: url("images/finish/real_score.png");}
#grade         { position: absolute; left: 3px; top: 131px; background: url("images/finish/grade.png");}
#button        { position: absolute; left: 131px; top: 131px;}

#score_table div p{
position: absolute; left: 42px; top: 54px; margin:0px;
width: 70px; height: 60px;
line-height: 60px; font-size: 60px;
color: red;
font-family: "微軟正黑體","細明體","Times New Roman",monospace;
}

#grade img{
border: 3px solid red;
position: absolute; left: 30px; top: 30px; margin:0px;
width: 80px; height: 80px;
}

#button div{
background-image: url('images/finish/button.png'); background-size: 100% 100%;
position: absolute; left: 7px; top: 35px; margin:0px;
width: 100px; height: 50px;
}
</style>

<script type="text/javascript">

var b2_visible = true;

function shine()
{
	if( b2_visible )
		document.getElementById("button").childNodes[0].style.backgroundImage = "none";
	else
		document.getElementById("button").childNodes[0].style.backgroundImage = "url(images/finish/button.png)";
	b2_visible = !b2_visible;
	setTimeout("shine()",1000);
}

function go_to_form()
{
	document.location.href = "form.php";
}
</script>
</head>

<body onload="shine()">

<div class="main">
	<img class="heading1" src="images/heading1.png" />
	<img id="bubble" src="images/finish/bubble.png" />
	<img id="fitman" src="images/finish/fitman.png" />
	<table id="time_hint">
		<tr class="time_hint_block" id="timev">
			<td class="caption">每題<br />時間</td>
			<td class="value"><? echo round( $_POST["time"]/25 ) ?><span style="font-size:20px;line-height:20px;">秒</span></td>
		</tr>
		<tr class="time_hint_block" id="timet">
			<td class="caption">總<br />時間</td>
			<td class="value"><? echo round( $_POST["time"]/60 )  ?><span style="font-size:20px;line-height:20px;">分</span></td>
		</tr>
		<tr class="time_hint_block" id="hintv">
			<td class="caption">每題<br />提示</td>
			<td class="value"><? echo $_POST["no_hint"] / 25 ?></td>
		</tr>
		<tr class="time_hint_block" id="hintt">
			<td class="caption">總<br />提示</td>
			<td class="value"><? echo $_POST["no_hint"]?> </td>
		</tr>
	</table>
	<div id="score_table">
		<div id="dynamic_score"><p><? echo $_POST["dscore"] ?></p></div>
		<div id="real_score"><p><? echo $_POST["score"] ?></p></div>
		<div id="grade"><img src="<? echo $grade_src; ?>" /></div>
		<div id="button"><div onclick="go_to_form()"></div></div>
	</div>

</div>

</body>

</html>
