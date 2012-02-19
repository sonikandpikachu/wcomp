<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Main</title>
</head>
<body>
 <p>Вопрос: </p>
 <p>&nbsp;<?=$question?></p>
 <p>Ответы:</p>
 <?php 
 foreach ($answers as $ans) {
 	echo $ans.'<br>';
 }
 ?>
</body>
</html>
