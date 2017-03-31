<?
	
	session_start();
	if( !isset($_SESSION["sid"]) )
		header("Location:http://localhost/fitness2/index.php");
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<link rel="stylesheet" type="text/css" href="base.css" />

<style type="text/css">
#question_no
{
background-color: gold;
border: 1px solid black;
position: absolute;  left: 50px;  top: 130px;
width:90px;  height:120px;
}

#question_no p
{
background-color: white;
border: 1px solid black;
position: absolute;  left: 15px;  top: 30px; margin: 0px;
width:60px;  height:60px;
text-align: center; line-height: 60px; font-size: 60px;
}

#question
{
background-color: gold;
border: 1px solid black;
position: absolute;  left: 140px;  top: 130px;
width:460px;  height:120px;
}

#question p
{
background-color: white;
border: 1px solid black;
position: absolute;  left: 10px;  top: 10px; margin:0px;
width:440px;  height:100px;
line-height: 33px; font-size:23px;
font-family: "微軟正黑體","細明體","Times New Roman",monospace;
}

#clock
{
background-image: url('images/q/clock.png'); background-size: 100% 100%;
border: 1px solid black;
position: absolute;  left: 600px;  top: 130px;
width:140px;  height:120px;
}

#clock p
{
border: 1px solid black;
position: absolute;  left: 9px;  top: 60px; margin:0px;
width:120px;  height:50px;
text-align: center; line-height: 50px; font-size:50px;
}

.answer
{
background-color: green;
border: 5px solid black;
width:190px;  height:90px;
}

.answer p
{
//border: 1px solid black;
position: absolute;  left: 10px;  top: 7px; margin:0px;
width:170px;  height:75px;
line-height: 25px;  font-size:20px;
color: white;
font-family: "微軟正黑體","細明體","Times New Roman",monospace;
}

#answerA{ position: absolute;  left: 100px;  top: 290px; }
#answerB{ position: absolute;  left: 100px;  top: 410px; }
#answerC{ position: absolute;  left: 320px;  top: 290px; }
#answerD{ position: absolute;  left: 320px;  top: 410px; }

.cross
{
visibility: hidden;  z-index: 1;
width:120px;  height:120px;
}

#crossA{ position: absolute;  left: 130px;  top: 270px; }
#crossB{ position: absolute;  left: 130px;  top: 390px; }
#crossC{ position: absolute;  left: 350px;  top: 270px; }
#crossD{ position: absolute;  left: 350px;  top: 390px; }

#fitman
{
position: absolute;  left: 530px;  top: 270px;
width:180px;  height:240px;
}

#progress_bar
{
position: absolute;  left: 80px;  top: 530px;
width:640px;  height:30px;
}

#hint
{
visibility: hidden; z-index: 2;
background-color: gold;
border: 1px solid black;
position: absolute;  left: 50px;  top: 180px;
width:700px;  height:240px;
}

#hint_fitman
{
border: 1px solid black;
position: absolute;  left: 30px;  top: 30px;
width:180px;  height:180px;
}

#hint_word
{
background-color: white;
border: 1px solid black;
position: absolute;  left: 210px;  top: 30px; margin: 0px;
width:340px;  height:180px;
line-height: 30px; font-size: 22px;
font-family: "微軟正黑體","細明體","Times New Roman",monospace;
}

#hint_pic
{
border: 1px solid black;
position: absolute;  left: 550px;  top: 30px;
width:120px;  height:120px;
}

#hint_button
{
border: 1px solid black;
position: absolute;  left: 550px;  top: 150px;
width:120px;  height:60px;
}

</style>

<script type="text/javascript" src="qdeclare.js"></script>

<script type="text/javascript">

var qtime = 0;
var time = 0;

var question_number=0;
var dynamic_score=0; 
var real_score=0;
var no_hint=0;

var wrongs=0;
var correct=true;
var hint_visible = false;
var pressed = new Array();
pressed['A'] = false;
pressed['B'] = false;
pressed['C'] = false;
pressed['D'] = false;

function init()
{
	timer();
	load_question();
}

function timer()
{
	document.getElementById("clock").childNodes[0].innerHTML = (Math.round(qtime/60)).toString() + ":" + (qtime%60).toString();
	qtime = qtime + 1;
	setTimeout("timer()",1000);
}

function load_question()
{
	question_number = question_number + 1;
	hint_visible = false;
	correct = false;
	wrongs = 0;
	qtime = 0;
	pressed['A'] = false;
	pressed['B'] = false;
	pressed['C'] = false;
	pressed['D'] = false;
	document.getElementById("question_no").childNodes[0].innerHTML = question_number;
	document.getElementById("question_content").innerHTML = pages[question_number].question;
	document.getElementById("answerA").childNodes[0].innerHTML = pages[question_number].A;
	document.getElementById("answerB").childNodes[0].innerHTML = pages[question_number].B;
	document.getElementById("answerC").childNodes[0].innerHTML = pages[question_number].C;
	document.getElementById("answerD").childNodes[0].innerHTML = pages[question_number].D;
	document.getElementById( "crossA" ).style.visibility = "hidden";
	document.getElementById( "crossB" ).style.visibility = "hidden";
	document.getElementById( "crossC" ).style.visibility = "hidden";
	document.getElementById( "crossD" ).style.visibility = "hidden";
	document.getElementById( "hint" ).style.visibility = "hidden";
	document.getElementById("progress_bar").src = "images/q/progress/progress"+question_number+".png";

}

function eval( x )
{
	if( pressed[x]==true || hint_visible==true )  return ;
	
	if( pages[question_number].answer==x ) correct = true;
	if( correct && wrongs!=3 )
	{
		if( wrongs==0 ){ dynamic_score = dynamic_score + 4; real_score = real_score + 4; }
		else if( wrongs==1 ){ dynamic_score = dynamic_score + 3; }
		else if( wrongs==2 ){ dynamic_score = dynamic_score + 2; }
		else { ; }
		document.getElementById("hint_fitman").src = "images/q/hint_fitman_correct.png";
		document.getElementById("hint_button").src = "images/q/hint_button_correct.png";
		document.getElementById("hint_pic").src = "images/q/hint_pic_correct.png";
		document.getElementById("hint_word").innerHTML = pages[question_number].correct;
		document.getElementById( "hint" ).style.visibility = "visible";
		hint_visible = true;
	}
	else if( wrongs==0 )
	{
		wrongs = wrongs + 1;
		no_hint = no_hint + 1;
		document.getElementById( "cross"+x ).style.visibility = "visible";
		document.getElementById("hint_fitman").src = "images/q/hint_fitman_wrong1.png";
		document.getElementById("hint_button").src = "images/q/hint_button_wrong.png";
		document.getElementById("hint_pic").src = "images/q/hint_pic_wrong1.png";
		document.getElementById("hint_word").innerHTML = pages[question_number].hint1;
		document.getElementById( "hint" ).style.visibility = "visible";
		hint_visible = true;
	}
	else if( wrongs==1 )
	{
		wrongs = wrongs + 1;
		no_hint = no_hint + 1;
		document.getElementById( "cross"+x ).style.visibility = "visible";
		document.getElementById("hint_fitman").src = "images/q/hint_fitman_wrong2.png";
		document.getElementById("hint_button").src = "images/q/hint_button_wrong.png";
		document.getElementById("hint_pic").src = "images/q/hint_pic_wrong2.png";
		document.getElementById("hint_word").innerHTML = pages[question_number].hint2;
		document.getElementById( "hint" ).style.visibility = "visible";
		hint_visible = true;
	}
	else if( wrongs==2 )
	{
		wrongs = wrongs + 1;
		document.getElementById( "cross"+x ).style.visibility = "visible";
	}
	else //correct && wrongs==3
	{
		document.getElementById("hint_fitman").src = "images/q/hint_fitman_wrong3.png";
		document.getElementById("hint_button").src = "images/q/hint_button_correct.png";
		document.getElementById("hint_pic").src = "images/q/hint_pic_wrong3.png";
		document.getElementById("hint_word").innerHTML = pages[question_number].correct;
		document.getElementById( "hint" ).style.visibility = "visible";
		hint_visible = true;
	}
}

function return_or_next()
{
	time = time + qtime;
	if( correct )
		if( question_number<25 )
			load_question();
		else
		{
			document.getElementById("in_time").value = time;
			document.getElementById("in_no_hint").value = no_hint ;
			document.getElementById("in_score").value = real_score;
			document.getElementById("in_dscore").value = dynamic_score;
			//document.location.href = "finish.php";
			//alert("time" + time.toString() + "no_hint" + no_hint.toString() + "real_score" + real_score.toString() + 'dynamic_score' + dynamic_score.toString());
			document.getElementsByTagName("form")[0].submit();
		}
	else
	{
		document.getElementById( "hint" ).style.visibility = "hidden";
		hint_visible = false;
	}
}

</script>

</head>

<body onload="init()">

<div class="main">
	<img class="heading1" src="images/heading1.png" />
	<div id="question_no"><p>25</p></div>
	<div id="question">
		<p id="question_content">如果你看到這段文字，代表你的瀏覽器不支援此系統喔。請更新你的瀏覽器版本，或是與網站負責人連絡。</p>
	</div>
	<div id="clock"><p></p></div>
	<div class="answer" id="answerA" onclick="eval('A')"><p>我是選項</p></div>
	<div class="answer" id="answerB" onclick="eval('B')"><p>我是選項</p></div>
	<div class="answer" id="answerC" onclick="eval('C')"><p>我是選項</p></div>
	<div class="answer" id="answerD" onclick="eval('D')"><p>我是選項</p></div>
	<img class="cross" src="images/q/cross.png" id="crossA" />
	<img class="cross" src="images/q/cross.png" id="crossB" />
	<img class="cross" src="images/q/cross.png" id="crossC" />
	<img class="cross" src="images/q/cross.png" id="crossD" />
	<img id="fitman" src="images/q/fitman.png" />
	<img id="progress_bar" src="images/q/progress/progress.png" />
	
	<div id="hint">
		<img id="hint_fitman" src="images/q/hint_fitman_correct.png" />
		<p id="hint_word">同學們，這題是要說明，當運動時，肌肉的能量來自於醣類、脂肪或蛋白質與氧氣作用後產生能量，所以使用氧氣能力較佳時，代表心臟、肺臟、血管和血液功能是較佳的。</p>
		<img id="hint_pic" src="images/q/hint_pic_correct.png" />
		<img id="hint_button" src="images/q/hint_button_correct.png" onclick="return_or_next()"/>
	</div>
	
	<form name="submit_score" method="post" action="./finish.php">
	<input id="in_time" name="time" type="hidden" />
	<input id="in_no_hint" name="no_hint" type="hidden" />
	<input id="in_score" name="score" type="hidden" />
	<input id="in_dscore" name="dscore" type="hidden" />
	</form>
</div>
</body>
</html>