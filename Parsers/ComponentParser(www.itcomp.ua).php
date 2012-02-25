
Идет парсинг http://www.itcomp.ua/kompyutery-itcomp... <br/>
<br/>

<div id="progress">none </div>

<script>
function updateProgress(val, maxval)
{
	document.getElementById('progress').innerHTML = val.toString() + ' из ' + maxval;
}
</script> 
</body>



<?php

set_time_limit(0);
include_once ('simple_html_dom.php');

function getTextFromHTML($htmlText)
{
    $search = array(
        "'<[^br][\/\!]*?[^<>]*?>'si", // удаляем все теги, оставляем br
        "'" . chr(226) . chr(128) . chr(147) . "'i",
        "'" . chr(226) . chr(128) . chr(156) . "'i",
        "'" . chr(226) . chr(128) . chr(157) . "'i",
        "'&(quot|#34);'i", // Replace HTML special chars
        "'&(amp|#38);'i",
        "'&(lt|#60);'i",
        "'&(gt|#62);'i",
        "'&(nbsp|#160);'i",
        "'&#(\d+);'e"); // write as php
    $replace = array(
        "",
        "-",
        "\"",
        "\"",
        "\"",
        "&",
        "<",
        ">",
        " ",
        "chr(\\1)");

    $htmlText = preg_replace($search, $replace, $htmlText);

    // второй круг обработки (стырила кусок кода из инета)
    $s = array(
        '&acirc;&euro;&trade;' => '&rsquo;', // Right-apostrophe (eg in I'm)
        '&acirc;&euro;&oelig;' => '&ldquo;', // Opening speech mark
        '&acirc;&euro;&ldquo;' => '&mdash;', // Long dash
        '&acirc;&euro;' => '&rdquo;', // Closing speech mark
        '&Atilde;&copy;' => '&eacute;', // e acute accent
        chr(226) . chr(128) . chr(153) => '&rsquo;', // Right-apostrophe again
        chr(226) . chr(128) . chr(147) => '&mdash;', // Long dash again
        chr(226) . chr(128) . chr(156) => '&ldquo;', // Opening speech mark
        chr(226) . chr(128) . chr(148) => '&mdash;', // M dash again
        chr(226) . chr(128) => '&rdquo;', // Right speech mark
        chr(195) . chr(169) => '&eacute;', // e acute again
        );

    foreach ($s as $needle => $replace) {
        $htmlText = str_replace($needle, $replace, $htmlText);
    }

    return $htmlText;
}

// подключение к БД
$conn = mysql_connect("localhost", "root", "") or die("Соединение не установлено!");
@mysql_select_db("wComp") or die("Соединение не установлено 2!");


function insert($tablename, $data, $conn)
{
    $query = mysql_query("SELECT * FROM " . $tablename, $conn);
    $columns = mysql_num_fields($query);

    $q = 'insert into ' . $tablename . ' (';
    for ($i = 1; $i < $columns; $i++) {
        $q .= mysql_field_name($query, $i) . ', ';
        // echo ($i-1).' '. mysql_field_name($query, $i). '<br/>';;      !!!
    }
    $q = substr($q, 0, -2);
    $q .= ') values (\'';
    $o = 0;
    foreach ($data as $cell) {
        $q .= addslashes($cell) . '\', \'';
        $o++;

    }
    $q = substr($q, 0, -3);
    $q .= ')';

    return $q;
}


//парсинг

$html = file_get_html('http://www.itcomp.ua/kompyutery-itcomp.html');
//echo $html;

// Цикл разбора массива
// Обходим массив и ищем в нем соответствие тэгу H2


$components = $html->find('div[class="paramFilter"]', 0);

foreach($components->children (1)->children (1)->find('a rel["nofollow"]') as $e) {
$str = $e->plaintext;
$str = mb_convert_encoding($str, "windows-1251","UTF-8");
echo $str. '<br/>';
}




?>
