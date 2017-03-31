<?
	session_start();
	if( $_SESSION["sid"]==NULL )
		header("Location:index.php");
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
position: absolute;  left: 70px;  top: 130px;
width:90px;  height:120px;
}

#question_no p
{
background-color: white;
border: 1px solid black;
position: absolute;  left: 15px;  top: 30px; margin: 0px;
width:60px;  height:60px;
line-height: 60px; font-size: 60px;
}

#question
{
background-color: gold;
border: 1px solid black;
position: absolute;  left: 160px;  top: 130px;
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
position: absolute;  left: 620px;  top: 130px;
width:100px;  height:120px;
}

#clock p
{
border: 1px solid black;
position: absolute;  left: 15px;  top: 60px; margin:0px;
width:70px;  height:50px;
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
position: absolute;  left: 10px;  top: 7px; margin:0px;
width:170px;  height:75px;
text-align: center; line-height: 75px;  font-size:50px;
color: white;
font-family: "標楷體","細明體","Times New Roman",monospace;
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
position: absolute;  left: 520px;  top: 260px;
width:200px;  height:260px;
}

#progress_bar
{
background white;
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
position: absolute;  left: 210px;  top: 30px; margin: 0px; background-size: 100% 100%;
width:340px;  height:180px;
line-height: 30px; font-size: 22px;font-family: "微軟正黑體","細明體","Times New Roman",monospace;
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


.bubbles
{
visibility: hidden;
z-index:1;
}

#bubble_question      { width: 150px; height: 70px;  position: absolute;  left: 240px;  top: 60px; }
#bubble_question_no   { width: 150px; height: 70px;  position: absolute;  left: 70px;   top: 60px; }
#bubble_clock         { width: 260px; height: 128px; position: absolute;  left: 500px;  top: 250px; }
#bubble_answerA       { width: 150px; height: 70px;  position: absolute;  left: 120px;  top: 220px; }
#bubble_answerB       { width: 150px; height: 70px;  position: absolute;  left: 120px;  top: 340px; }
#bubble_answerC       { width: 150px; height: 70px;  position: absolute;  left: 340px;  top: 220px; }
#bubble_answerD       { width: 150px; height: 70px;  position: absolute;  left: 340px;  top: 340px; }
#bubble_crossA        { width: 236px; height: 130px; position: absolute;  left: 90px;  top: 140px; }
#bubble_crossB        { width: 236px; height: 130px; position: absolute;  left: 90px;  top: 260px; }
#bubble_crossC        { width: 236px; height: 130px; position: absolute;  left: 310px;  top: 140px; }
#bubble_crossD        { width: 236px; height: 130px; position: absolute;  left: 310px;  top: 260px; }
#bubble_fitman        { width: 254px; height: 136px; position: absolute;  left: 500px;  top: 170px; }
#bubble_progress_bar  { width: 480px; height: 91px;  position: absolute;  left: 80px;  top: 440px; }

</style>

<script type="text/javascript">

var pressed = new Array() ;
pressed["A"] = false;
pressed["B"] = false;
pressed["C"] = false;
pressed["D"] = false;

var presses = 0;

var hint_visible = false;

function show( str )
{
	if( hint_visible==false )
		document.getElementById( "bubble_"+str ).style.visibility="visible";
}

function hide( str )
{
	document.getElementById( "bubble_"+str ).style.visibility="hidden";
}

function press( x )
{
	if( pressed[x]==false && hint_visible==false )
	{
		document.getElementById( "cross"+x ).style.visibility = "visible";
		pressed[x] = true;
		presses = presses + 1;
		
		hint_visible = true;
		hint_visible_buff = true;
		
		if( presses==1 )
		{
			document.getElementById("hint_button").src = "images/q/hint_button_wrong.png";
			document.getElementById("hint_pic").src = "images/q/hint_pic_wrong" + presses + ".png";
		}
		else
		{
			document.getElementById("hint_button").src = "images/instructions/hint_button_start.png";
			document.getElementById("hint_pic").src = "images/q/hint_pic_correct.png";
			document.getElementById("hint_word").innerHTML = "如果答對了就會來到這裡。<br />有沒有注意到跟剛剛不同的地方？<br />右邊數字變成了對喔！<br />我在這會講題目要我們學什麼。<br />準備好了嗎？<br />按右下方的按鈕就開始作答囉！";
		}
		document.getElementById( "hint" ).style.visibility = "visible";
	}
}

function hide_hint()
{
	if( presses==1 )
	{
		document.getElementById( "hint" ).style.visibility = "hidden";
		hint_visible = false;
	}
	else
		document.location.href = "q.php";
}
</script>

</head>

<body>

<div class="main">
	<img class="heading1" src="images/heading1.png" />
	<div id="question_no" onmouseover="show('question_no');" onmouseout="hide('question_no');"><p>25</p></div>
	<div id="question"    onmouseover="show('question')"    onmouseout="hide('question')">
		<p>這是這次測驗的介面。<br />
		   大家把滑鼠移到各個東西上面試試看！<br />
		   如果都看完了，就按按看選項吧！</p>
	</div>
	<div                id="clock"   onmouseover="show('clock')" onmouseout="hide('clock')"><p>99</p></div>
	<div class="answer" id="answerA" onmouseover="show('answerA')" onmouseout="hide('answerA')" onclick="press('A')"><p>選項一</p></div>
	<div class="answer" id="answerB" onmouseover="show('answerB')" onmouseout="hide('answerB')" onclick="press('B')"><p>選項二</p></div>
	<div class="answer" id="answerC" onmouseover="show('answerC')" onmouseout="hide('answerC')" onclick="press('C')"><p>選項三</p></div>
	<div class="answer" id="answerD" onmouseover="show('answerD')" onmouseout="hide('answerD')" onclick="press('D')"><p>選項四</p></div>
	<img class="cross"  id="crossA"  src="images/q/cross.png" onmouseover="show('crossA')" onmouseout="hide('crossA')"/>
	<img class="cross"  id="crossB"  src="images/q/cross.png" onmouseover="show('crossB')" onmouseout="hide('crossB')" />
	<img class="cross"  id="crossC"  src="images/q/cross.png" onmouseover="show('crossC')" onmouseout="hide('crossC')" />
	<img class="cross"  id="crossD"  src="images/q/cross.png" onmouseover="show('crossD')" onmouseout="hide('crossD')" />
	<img                id="fitman"  src="images/instructions/fitman.png" onmouseover="show('fitman')" onmouseout="hide('fitman')" />
	<img id="progress_bar"           onmouseover="show('progress_bar')" onmouseout="hide('progress_bar')" src="images/q/progress/progress.png"/>
	
	<div id="hint">
		<img id="hint_fitman" src="images/instructions/hint_fitman.png" />
		<p id="hint_word">如果答錯，就會跑到這個介面。<br />我就會跳出來給你一些提示啦。<br />右上方會顯示你已經錯了幾次。<br />答錯的選項上會出現叉叉喔。<br />看完提示就按右下方的按鈕吧！</p>
		<img id="hint_pic" src="images/q/hint_pic_correct.png"/>
		<img id="hint_button" src="images/q/hint_button_correct.png" onclick="hide_hint()"/>
	</div>
	
	<img class="bubbles" id="bubble_question" src="images/instructions/bubble1.png"     onmouseover="show('question')" onmouseout="hide('question')"/>
	<img class="bubbles" id="bubble_question_no" src="images/instructions/bubble2.png"  onmouseover="show('question_no')" onmouseout="hide('question_no')"/>
	<img class="bubbles" id="bubble_clock" src="images/instructions/clock.png"          onmouseover="show('clock')" onmouseout="hide('clock')"/>
	<img class="bubbles" id="bubble_answerA" src="images/instructions/bubble3.png"      onmouseover="show('answerA')" onmouseout="hide('answerA')"/>
	<img class="bubbles" id="bubble_answerB" src="images/instructions/bubble3.png"      onmouseover="show('answerB')" onmouseout="hide('answerB')"/>
	<img class="bubbles" id="bubble_answerC" src="images/instructions/bubble3.png"      onmouseover="show('answerC')" onmouseout="hide('answerC')"/>
	<img class="bubbles" id="bubble_answerD" src="images/instructions/bubble3.png"      onmouseover="show('answerD')" onmouseout="hide('answerD')"/>
	<img class="bubbles" id="bubble_crossA" src="images/instructions/cross.png"         onmouseover="show('crossA')" onmouseout="hide('crossA')"/>
	<img class="bubbles" id="bubble_crossB" src="images/instructions/cross.png"         onmouseover="show('crossB')" onmouseout="hide('crossB')"/>
	<img class="bubbles" id="bubble_crossC" src="images/instructions/cross.png"         onmouseover="show('crossC')" onmouseout="hide('crossC')"/>
	<img class="bubbles" id="bubble_crossD" src="images/instructions/cross.png"         onmouseover="show('crossD')" onmouseout="hide('crossD')"/>
	<img class="bubbles" id="bubble_fitman" src="images/instructions/fitmanbubble.png"        onmouseover="show('fitman')" onmouseout="hide('fitman')"/>
	<img class="bubbles" id="bubble_progress_bar" src="images/instructions/progress_bar.png"  onmouseover="show('progress_bar')" onmouseout="hide('progress_bar')"/>

	</div>
</div>
