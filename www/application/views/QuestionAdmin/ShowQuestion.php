<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>show Questions</title>
</head>
<body>
<?
foreach ($qstn as $q) {
	$i = 0;
	echo '<h3>'.$q['Question_Text'].'</h3>';
	$qanswers = $answers[$i];//answers for question q
	echo 'ответы:<br>';
	foreach($qanswers as $ans) {
		print_r($ans);
		$count = 0;
		echo ($count+1).' '.$ans['Txt'].'<br>';
	}
	$i++;
}

?>
</body>
</html>
