<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />

<link rel="stylesheet" type="text/css" href="base.css" />

<style type="text/css">

#bubble
{
position: absolute; left: 70px; top: 210px;
width:250px; height:80px;
}

#fitman
{
position: absolute; left: 80px; top: 270px; 
width:250px; height:280px;
}

#board
{
background-image: url('images/index/board.gif'); background-size: 100% 100%;
border: 4px solid brown;
position: absolute; left: 350px; top: 230px; 
width:400px; height:260px;
}

#board p
{
position: absolute; left: 10px; top: 15px; margin: 0px;
width:380px; height:220px;
line-height: 44px;
font-size: 27px; color: white;
font-family: "微軟正黑體","細明體","Times New Roman",monospace;
}

#board p input
{
background-color: green;
border: 2px solid white; padding: 1px;
font-size: 25px; color: white;
font-family: "微軟正黑體","細明體","Times New Roman",monospace;
}

#board p select
{
background-color: green;
border: 2px solid white; padding: 1px;
font-size: 25px; color: white;
font-family: "微軟正黑體","細明體","Times New Roman",monospace;
}

#button
{
position: absolute; left: 360px; top: 500px; 
width:370px; height:50px;
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
var flag_warn_visible =false;

function hide_warning()
{
	if( flag_warn_visible==1 )
		flag_warn_visible = flag_warn_visible - 1;
	else
		document.getElementById("warning").style.visibility="hidden" ;
}

function submit()
{
	var city = document.getElementById("city").value;
	var school = document.getElementById("school").value;
	var class_ = Number(document.getElementById("class").value);
	var seat_no = Number(document.getElementById("seat_no").value);
	var height = Number(document.getElementById("height").value);
	var weight = Number(document.getElementById("weight").value);
	
	var chi_test = /^[\u0391-\uFFE5]+$/;
	
	if( isNaN(class_) || class_<=0 || class_>50 )
	{
		document.getElementById("warning").childNodes[1].innerHTML = "不要亂填你的班級喔~";
		document.getElementById("warning").style.visibility="visible" ;
		flag_warn_visible = 1;
	}
	else if( isNaN(seat_no) || seat_no<=0 || seat_no>50 )
	{
		document.getElementById("warning").childNodes[1].innerHTML = "不要亂填你的座號窩~";
		document.getElementById("warning").style.visibility="visible" ;
		flag_warn_visible = 1;
	}
	else if( isNaN(height) || height<=80 || height>200 )
	{
		document.getElementById("warning").childNodes[1].innerHTML = "不要亂填你的身高窩~";
		document.getElementById("warning").style.visibility="visible" ;
		flag_warn_visible = 1;
	}
	else if( isNaN(weight) || weight<=0 || weight>150 )
	{
		document.getElementById("warning").childNodes[1].innerHTML = "不要亂填你的體重窩~";
		document.getElementById("warning").style.visibility="visible" ;
		flag_warn_visible = 1;
	}
	else if(  !chi_test.test(city)  )
	{
		document.getElementById("warning").childNodes[1].innerHTML = "不要亂填你住的城市窩~";
		document.getElementById("warning").style.visibility="visible" ;
		flag_warn_visible = 1;
	}
	else if(  !chi_test.test(school)  )
	{
		document.getElementById("warning").childNodes[1].innerHTML = "不要亂填你的學校窩~";
		document.getElementById("warning").style.visibility="visible" ;
		flag_warn_visible = 1;
	}
	else
		document.getElementById("board").submit();

}
</script>
</head>

<body>

<div class="main" onclick="hide_warning()">
	<img class="heading1"  src="images/heading1.png" />
	<img class="heading2" src="images/index/heading2.png" />
	<img id="bubble" src="images/index/bubble.png"/>
	<img id="fitman" src="images/index/fitman.png"/>
	<form id="board" name="student_info" action="./about.php" method="post">
		<p>	
			我住
			<select id="region" name="region">
				<option value="基隆市">基隆市</option>
				<option value="台北市">台北市</option>
				<option value="新北市">新北市</option>
				<option value="桃園縣">桃園縣</option>
				<option value="新竹市">新竹市</option>
				<option value="新竹縣">新竹縣</option>
				<option value="苗栗縣">苗栗縣</option>
				<option value="台中市">台中市</option>
				<option value="彰化縣">彰化縣</option>
				<option value="雲林縣">雲林縣</option>
				<option value="嘉義市">嘉義市</option>
				<option value="嘉義縣">嘉義縣</option>
				<option value="台南縣">台南縣</option>
				<option value="台南市">台南市</option>
				<option value="高雄縣">高雄縣</option>
				<option value="高雄市">高雄市</option>
				<option value="屏東縣">屏東縣</option>
				<option value="南投縣">南投縣</option>
				<option value="宜蘭縣">宜蘭縣</option>
				<option value="花蓮縣">花蓮縣</option>
				<option value="台東縣">台東縣</option>
				<option value="澎湖縣">澎湖縣</option>
				<option value="金門縣">金門縣</option>
				<option value="連江縣">連江縣</option>
			</select>
			<input id="city" type="text" name="city" size="6" />
			<select id="city_type" name="city_type">
				<option value="鄉">鄉</option>
				<option value="鎮">鎮</option>
				<option value="市">市</option>
				<option value="區">區</option>
			</select>
		<br />
			我讀
			<input id="school" type="text" name="school" size="10" />
			國中
		<br />
			<select id="year" name="year">
				<option value="7">七年級</option>
				<option value="8">八年級</option>
				<option value="9">九年級</option>
			</select>
			<input id="class" type="text" name="class" size="2" maxlength="2" />
			班
			<input id="seat_no" type="text" name="seat_no" size="2" maxlength="2" />
			號
		<br />
			我是
			<input type="radio" value="male" name="sex" > 男生
			<input type="radio" value="female" name="sex" checked="true"> 女生
			<br />
				　　　
				<input id="height" type="text" name="height" size="4" maxlength="3" />cm　
				<input id="weight" type="text" name="weight" size="4" maxlength="3"/>kg
		</p>
	</form>
	<img id="button" src="images/index/button.png" onclick="submit();" />
	<div id="warning">
		<p>身高太高囉~不要亂填窩~</p>
	</div>
</div>
