<?
	$dbhost = 'dbhome.cs.nctu.edu.tw';
    $dbuser = 'hhkuan_cs';
    $dbpass = '164236';
    $dbname = 'hhkuan_cs_fitness';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');

	mysql_query("SET NAMES utf8") or die('query failed!');
	mysql_select_db($dbname);
	$result = mysql_query("SELECT * FROM `user`;") or die('SELECT FAILED!');
	mysql_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
<title>健康體適能動態評量系統--學生資料</title>
</head>

<body>
<table>
	<tr>
		<th>所在縣市</th>
		<th>鄉鎮市區</th>
		<th>就讀學校</th>
		<th>就讀年級</th>
		<th>班級</th>
		<th>座號</th>
		<th>性別</th>
		<th>身高</th>
		<th>體重</th>
		<th>完成時間(分鐘)</th>
		<th>使用提示</th>
		<th>實際分數</th>
		<th>動態分數</th>
		<th>ID</th>

	</tr>

<? while( $row = mysql_fetch_array($result) ) {?>
	<tr>
		<td><? echo $row["region"]; ?></td>
		<td><? echo $row["city"]; ?></td>
		<td><? echo $row["school"]; ?></td>
		<td><? echo $row["year"]; ?></td>
		<td><? echo $row["class"]; ?></td>
		<td><? echo $row["seat_no"]; ?></td>
		<td><? echo $row["sex"]; ?></td>
		<td><? echo $row["height"]; ?></td>
		<td><? echo $row["weight"]; ?></td>
		<td><? echo $row["time"]; ?></td>
		<td><? echo $row["no_hint"]; ?></td>
		<td><? echo $row["score"]; ?></td>
		<td><? echo $row["dscore"]; ?></td>
		<td><? echo $row["sid"]; ?></td>
	</tr>
<? } ?>

</table>


</body>
</html>
