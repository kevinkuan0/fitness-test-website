<?
	session_start();
	if( !isset($_SESSION["sid"]) )
		header("Location:http://localhost/fitness2/index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>健康體適能動態評量系統</title>

<link rel="stylesheet" type="text/css" href="base.css" />

<style type="text/css">

table {
position: absolute; left: 100px; top: 280px;
background: white;
border: 1px solid black;
width: 600px; height: 300px;
}

.word{
position: absolute; left: 100px; top: 180px; 
width:600px; height:100px;
}

table th {
background: yellow;
border: 1px solid black;
}
table td {
border: 1px solid black;
}
table td.num {
text-align: center;
}


#warning
{
visibility:hidden; z-index: 1;
background-color: yellow; 
border: 1px solid black;
position: absolute; left: 150px; top: 250px; 
width:500px; height:100px;
}


#warning p
{
visibility:inherit; 
background-color: white; 
border: 1px solid black;
position: absolute; left: 25px; top: 20px; margin: 0px;
width:450px; height:60px;
text-align: center; line-height: 60px; font-size: 35px; 
color: red; text-decoration:blink;
font-family: "微軟正黑體","細明體","Times New Roman",monospace;
}

</style>

<script type="text/javascript">

function hide_warning()
{
	document.getElementById("warning").style.visibility="hidden" ;
}

function check()
{
	var x = document.getElementsByTagName("select");
	for( var i=0; i<8; i=i+1 )
		if( x[i].value==100 )
		{
			document.getElementById( "warning" ).style.visibility = "visible";
			return false;
		}
	return true;
}

</script>

</head>
<body>

<div class="main" onclick="hide_warning()" >
	<img class="heading1"  src="images/heading1.png" />
	
	<img class="heading2" src="images/form/heading2.png" />
	
	<img class="word" src="images/form/word.png" />
	
	<div id="warning">
		<p>請好好填完表格窩~</p>
	</div>
	
	<form name="student_info" action="./finish_form.php" method="post" onsubmit="return check()">
	<table>
	<tr>
	<th>題號</th>
	<th>項目</th>
	<th>回應</th>
	</tr>
	<tr>
	<td class="num">一</td>
	<td>我覺得軟體系統的畫面設計與顏色搭配看起來很舒服。</td>
	<td>
		<select type="radio" name="q1" >
			<option value="100"></option>
			<option value="2">非常讚同</option>
			<option value="1">部分贊同</option>
			<option value="0">有時贊同</option>
			<option value="-1">大部分不贊同</option>
			<option value="-2">非常不贊同</option>
		</select>	
	</td>
	</tr>
	<tr>
	<td class="num">二</td>
	<td>這套軟體操作十分方便。</td>
	<td>
		<select type="radio" name="q2" >
			<option value="100"></option>
			<option value="2">非常讚同</option>
			<option value="1">部分贊同</option>
			<option value="0">有時贊同</option>
			<option value="-1">大部分不贊同</option>
			<option value="-2">非常不贊同</option>
		</select>	
	</td>
	</tr>
	<tr>
	<td class="num">三</td>
	<td>我喜歡利用電腦來進行考試的方式。</td>
	<td>
		<select type="radio" name="q3" >
			<option value="100"></option>
			<option value="2">非常讚同</option>
			<option value="1">部分贊同</option>
			<option value="0">有時贊同</option>
			<option value="-1">大部分不贊同</option>
			<option value="-2">非常不贊同</option>
		</select>	
	</td>
	</tr>
	<tr>
	<td class="num">四</td>
	<td>我喜歡回答錯誤時給我提示語的考試方式。</td>
	<td>
		<select type="radio" name="q4">
			<option value="100"></option>
			<option value="2">非常讚同</option>
			<option value="1">部分贊同</option>
			<option value="0">有時贊同</option>
			<option value="-1">大部分不贊同</option>
			<option value="-2">非常不贊同</option>
		</select>	
	</td>
	</tr>
	<tr>
	<td class="num">五</td>
	<td>使用這個軟體，讓我更有信心學習自然、比較不會感到挫折。</td>
	<td>
		<select type="radio" name="q5" >
			<option value="100"></option>
			<option value="2">非常讚同</option>
			<option value="1">部分贊同</option>
			<option value="0">有時贊同</option>
			<option value="-1">大部分不贊同</option>
			<option value="-2">非常不贊同</option>
		</select>	
	</td>
	</tr>
	<tr>
	<td class="num">六</td>
	<td>使用了這個軟體，使我更喜歡健康體適能的概念。</td>
	<td>
		<select type="radio" name="q6">
			<option value="100"></option>
			<option value="2">非常讚同</option>
			<option value="1">部分贊同</option>
			<option value="0">有時贊同</option>
			<option value="-1">大部分不贊同</option>
			<option value="-2">非常不贊同</option>
		</select>	
	</td>
	</tr>
	<tr>
	<td class="num">七</td>
	<td>使用了這個教材，使我的健康體適能觀念更清楚。</td>
	<td>
		<select type="radio" name="q7" >
			<option value="100"></option>
			<option value="2">非常讚同</option>
			<option value="1">部分贊同</option>
			<option value="0">有時贊同</option>
			<option value="-1">大部分不贊同</option>
			<option value="-2">非常不贊同</option>
		</select>	
	</td>
	</tr>
	<tr>
	<td class="num">八</td>
	<td>我覺得使用這套軟體對我在健康體適能的學習有很大的幫助。</td>
	<td>
		<select type="radio" name="q8" >
			<option value="100"></option>
			<option value="2">非常讚同</option>
			<option value="1">部分贊同</option>
			<option value="0">有時贊同</option>
			<option value="-1">大部分不贊同</option>
			<option value="-2">非常不贊同</option>
		</select>	
	</td>
	</tr>
	<tr align="right">
	<td colspan="7">
	<input type="submit" name="submit" value="填寫完畢" />
	</td>
	</tr>

	</table>
	</form>
</div>
</body>