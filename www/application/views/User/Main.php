<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */
?>
<!DOCTYPE htmlPUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User View</title>

</head>
<body>
<h3>Вопрос: <?=$question?> </h3>
<p>Варианты ответов:</p>
<?
$i = 1; 
foreach ($answers as $ans) {
    echo '<a href = "'.base_url().'User/Main/?qstn='.$ans['wComp_id_NextQuestion'].'&ansid='
        .$ans['id_Answer'].'">'.$i.'. '.$ans['Answer_Text'].'</a><br>';
$i++;
}
?>
Выбраные ответы: 
<? 
print_r($ansid = $this->session->userdata('mydata'));
?>
</body>