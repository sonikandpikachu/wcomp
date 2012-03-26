<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=cp1251" />
<title>show Questions</title>
</head>
<body>
<?
$i = 0;
foreach ($qstn as $q) {
	
	echo '<h3>Question: '.$q['Question_Text'].'('.$q['id_Question'].')'.'</h3>';
	$qanswers = $answers[$i];//all answers for q
	echo 'Answers:<br>';
    $j = 1;
	foreach($qanswers as $ans) {
		echo '<br><strong>'.$j.'.';
        echo 'Text:'.$ans['Txt'].'</strong><br>'.'Conditions&Crit:'.'<br>';
        for ($k = 0; $k < count($ans)-1; $k++) {
            echo '&nbsp;&nbsp;&nbsp;'.$ans[$k].'<br>';
        }
        echo '<br>';
        $j++;
        //print_r($ans);
	}
	$i++;
}

?>
</body>
</html>
