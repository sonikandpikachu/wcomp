<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Develop Menu</title>
</head>
<body>
<? if (!empty($qstnAdd)) echo $qstnAdd.'<br>' ?>
<h3>Develop Menu:</h3>
1.<a href="<?=base_url()?>/QuestionAdmin/AddQuestion/">Go to adding questions</a>
<br>
2.<a href="<?=base_url()?>/QuestionAdmin/ShowQuestion/">Show all questions</a>
<br>
3.<a href="<?=base_url()?>/User/Main/">Show user view</a>
<br>
</body>
</html>
