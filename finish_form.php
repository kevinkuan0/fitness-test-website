<?
	session_start();
	if( !isset($_SESSION["sid"]) )
		header("Location:http://localhost/fitness2/index.php");
	if( !isset($_POST["submit"]) )
		header("Location:http://localhost/fitness2/index.php");

	$dbhost = 'dbhome.cs.nctu.edu.tw';
    $dbuser = 'hhkuan_cs';
    $dbpass = '164236';
    $dbname = 'hhkuan_cs_fitness';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
	mysql_query("SET NAMES utf8") or die('query failed!');
	mysql_select_db($dbname)or die("cannot select database!");
	mysql_query( "REPLACE INTO `attitude` ( sid, q1, q2, q3, q4, q5, q6, q7, q8) VALUES( '$_SESSION[sid]', '$_POST[q1]', '$_POST[q2]', '$_POST[q3]', '$_POST[q4]', '$_POST[q5]', '$_POST[q6]', '$_POST[q7]', '$_POST[q8]');" ) or die ("update failed!");
	//mysql_query( "REPLACE INTO `attitude` ( sid, q1, q2, q3, q4, q5, q6, q7, q8) VALUES( '23', '$_POST[q1]', '$_POST[q2]', '$_POST[q3]', '$_POST[q4]', '$_POST[q5]', '$_POST[q6]', '$_POST[q7]', '$_POST[q8]');" ) or die ("update failed!");
	$result = mysql_query("SELECT * FROM `attitude`;") or die('SELECT FAILED!');
	mysql_close();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<title>健康體適能動態評量系統</title>

<link rel="stylesheet" type="text/css" href="base.css" />

<style type="text/css">

.word{
position: absolute; left: 225px; top: 130px;
width:350px; height:150px;
}

.fitman{
position: absolute; left: 225px; top: 280px;
width:350px; height:200px;
}

.button{
position: absolute; left: 225px; top: 480px;
width:350px; height:100px;
}

</style>

<script type="text/javascript">
function close_window()
{
	window.close();
}
</script>
</head>

<body>

<div class="main">
	<img class="heading1"  src="images/heading1.png" />
	<img class="word" src="images/finish_form/word.png"/>
	<img class="fitman" src="images/finish_form/fitman.png" />
	<img class="button" src="images/finish_form/button.png" onclick="close_window()" />

</div>
</body>
</html>
