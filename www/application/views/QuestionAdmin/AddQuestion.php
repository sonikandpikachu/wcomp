<!DOCTYPE htmlPUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AddQuestion</title>
<style type="text/css">
   div.ans { 
    margin-left:30px;
    margin:10px;
   }
   div.par {
    margin-left:30px;
    
   }
</style>
</head>
<body>
<script>
var answersCount = 1;
var critCount = 1;
var condCount = 1;
function addAnswer() {
    var mainDiv = document.getElementById('answers');
    var newDiv = document.createElement('div');
    newDiv.id = 'ans'+answersCount;
	newDiv.className = 'ans';
    newDiv.style = "margin-left:30px;";
    newDiv.innerHTML = '<div style = "float:left; width:30px;">'+
    '<input name="ans'+answersCount+
    'Flag" type="checkbox"/>'+
    '</div>'+answersCount+' Text of the answer: <br>'+
    '<input name="idans'+answersCount+'Txt" type="text" size="100" />'+'<br>'+
    '<div id="ans'+answersCount+'Par" class="par"></div>'+
    '<input name="ans'+answersCount+
    'condButton" type="button" onClick="addCondition ('+answersCount+')"'+
    ' value="Add Condition" />'+
    '<input name="ans'+answersCount+
    'critButton" type="button" onClick="addCriteria ('+answersCount+
    ')" value="Add Criteria" />'+
    '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<input name="ans'+answersCount+
    'deleteButton" type="button" onClick="removeAnswer('+answersCount+
    ')" value="Remove this answer" />';
    answersCount++;
    mainDiv.appendChild(newDiv);
}

function removeAnswer(id){
    var mainDiv = document.getElementById('answers');
    var removeDiv = document.getElementById('ans'+id);
    mainDiv.removeChild(removeDiv);
}

function addCondition (idAns){
    var mainDiv = document.getElementById('ans'+idAns+'Par');
    var newDiv = document.createElement('div');
    newDiv.id = 'ans'+idAns+'Cond'+condCount; 
    newDiv.innerHTML = 'Condition:<select name="ans'+idAns+'Cond'+condCount+'">'+
                        '<option>condition</option>'+
                        '<option>кондиция3</option>'+
                        '</select>'+
                        'Text of change:'+
                        '<input name="ans'+idAns+'TxtCond'+condCount+
                        '" type="text" size="50" />'+
                        '<input name="'+
                        'deleteButton" type="button" onClick="removeC('
                        +idAns+',&quot;Cond&quot;,'+condCount+
                        ')" value="Remove" />';
    condCount++;
    mainDiv.appendChild(newDiv);
}

function addCriteria (idAns){
    var mainDiv = document.getElementById('ans'+idAns+'Par');
    var newDiv = document.createElement('div');
    var name = "Crit";
    newDiv.id = 'ans'+idAns+'Crit'+critCount; 
    newDiv.innerHTML = 'Criteria:<select name="ans'+idAns+'Crit'+critCount+'">'+
                        '<option>Criteria1</option>'+
                        '</select>'+
                        'Text of change:'+
                        '<input name="ans'+idAns+'TxtCrit'+critCount+
                        '" type="text" size="50" />'+
                        '<input name="'+
                        'deleteButton" type="button" onClick="removeC('
                        +idAns+',&quot;Crit&quot;,'+critCount+
                        ')" value="Remove" />';
    critCount++;
    mainDiv.appendChild(newDiv);
}

function removeC (idAns,name,id) {
    var mainDiv = document.getElementById('ans'+idAns+'Par');
    alert('ans'+idAns+name+id);
    var removeDiv = document.getElementById('ans'+idAns+name+id);
    mainDiv.removeChild(removeDiv);
}

</script>
<div id='question'>
<h3>Text of Question:</h3>
<form action='http://wcomp/index.php/QuestionAdmin/AddQuestion/add' method="POST">
<input name="qstnTxt" type="text" size="150" />
<br>
<div id="answers" style = "margin-left:40px;">
<h3>Answers:</h3>

<!--<div id="ans1" class="ans">
<div style = "float:left; width:30px;">
<input name="ans1Flag" type="checkbox" disabled value="" />
</div>
1 Text of the answer: <br>
<input name="idans1Txt" type="text" size="100" />
<div id="ans1Par" class="par">
<div id="ans1crit1" >
Criteria:
<select name="ans1crit1">
<option>Пункт 1</option>
</select>
Text of change:
<input name="ans1crit1Txt" type="text" size="50" />
</div>

<div id="ans1cond1">
Condition:
<select name="ans1cond1">
<option>Пункт 1</option>
</select>
Text of change:
<input name="ans1crit1Txt" type="text" size="50" />
</div>
</div>
<input name="ans1condButton" type="button" onClick="1" value="Add Condition" />
<input name="ans1critButton" type="button" onClick="1" value="Add Criteria" />
<br>
</div>-->

</div>
<input name="ansAddButton" type="button" onClick="addAnswer()" value="Add Answer" />
<br>
<br>
<br>
<br>
<input name="" type="submit" value="Save question &amp; answers" />
</form>
</div>

</body>
</html>
