
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
$comp_array = array();

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


$tablename = "wComp_Garbage";
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

$need_next_page = true;
$i = 0;
while ($need_next_page) {
    $count = 0;
    $pageNumber = $i * 27;
    //echo $pageNumber;
    $page = 'http://www.itcomp.ua/kompyutery-itcomp.html&p=' . $pageNumber;
    echo $page . '<br/>';
    echo "<script>parent.updateProgress($i+1,232);</script>";
    flush();
    $html = file_get_html($page);
    foreach ($html->find('a[class="prodName"]') as $e) {
        $str = $e->href;
        $comp_array[] = $e->href;
        $count++;
    }
    if ($count != 27)
        $need_next_page = false;
    $i++;
}

for ($i = 0; $i < count($comp_array); $i++){
//for ($i = 0; $i < 1; $i++) {
    $item = array();
    $data = array();
    $GarbageFieldsCount = 39 - 1;
    for ($j = 0; $j < $GarbageFieldsCount; $j++) {
        $data[] = "NULL";
    }
    $comp_link = $comp_array[$i];
    $html = file_get_html($comp_link);
    $compName = mb_convert_encoding($html->find('li[class="category5"]', 0)->
        innertext, "windows-1251", "UTF-8");
    $image = $html->find('a[class="thickbox"]', 0);
    $bigImage = $image->href;
    $smallImage = $image->first_child()->src;
    $price = getTextFromHTML($html->find('div[class="col1 price"]', 0)->innertext);
    $priceM = explode(' ', $price);
    $price = $priceM[0];
    foreach ($html->find('td[class="texparam"]') as $e) {
        $param = mb_convert_encoding($e->innertext, "windows-1251", "UTF-8");
        $znachen = mb_convert_encoding($e->next_sibling()->innertext, "windows-1251",
            "UTF-8");

        if (trim($param) == "производитель") {
            $data[1] = $znachen;

        }
        if (trim($param) == "название процессора") {
            $data[17] = $znachen;
        }
        if (trim($param) == "частота процессора") {
            $data[19] = str_replace(",", ".", $znachen);
        }
        if (trim($param) == "кэш процессора") {
            $data[18] = $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "количество ядер/потоков") {
            $slova = explode('/', $znachen);
            $data[20] = $slova[0];
        }
        if (trim($param) == "шина") {
            $data[18] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "тех. процесс") {
            $data[18] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "разъем") {
            $data[18] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "тип памяти") {
            $data[21] = $znachen;
        }
        if (trim($param) == "количество модулей") {
            $data[24] = $znachen;
        }
        if (trim($param) == "общий объем памяти") {
            $data[23] = $znachen;
        }
        if (trim($param) == "модель платы") {
            $data[37] = "Материнская плата \n" . $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "производитель платы") {
            $data[37] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "чипсет материнской платы") {
            $data[37] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "модель видеокарты") {
            $data[25] = $znachen;
        }
        if (trim($param) == "тип видеопамяти") {
            $data[26] = $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "разрядность") {
            $data[26] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "режим работы видеокарт") {
            $data[26] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "объем диска") {
            $data[30] = $znachen;
        }
        if (trim($param) == "обороты/минуту") {
            $data[29] = $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "тип шины") {
            $data[29] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "кэш") {
            $data[29] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "дополнительный диск") {
            $data[29] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "оптический привод") {
            $data[36] = $znachen;
        }
        if (trim($param) == "card reader") {
            if ($znachen == "есть") {
                $data[10] = 1;
            } else {
                $data[10] = 0;
            }
        }
        if (trim($param) == "lan (локальная сеть)") {
            $data[37] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "звуковая карта") {
            $data[31] = $znachen;
        }
        if (trim($param) == "звуковые каналы") {
            $razmeri = explode(',', $znachen);
            $data[33] = $razmeri[0];
        }
        if (trim($param) == "доступные порты") {
            $data[37] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "корпус") {
            $data[13] = $znachen;
        }
        if (trim($param) == "размеры (Г x Ш x В), мм") {
            $razmeri = explode('x', $znachen);
            $data[5] = $razmeri[0];
            $data[4] = $razmeri[1];
            $data[3] = $razmeri[2];
        }
        if (trim($param) == "блок питания") {
            $data[37] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "производитель блока питания") {
            $data[37] .= $param . ' ' . $znachen . '\n';
        }
        if (trim($param) == "предустановленое ПО") {
            $pos = strpos($znachen, "Без ПО");
            if ($pos === false) {
                $data[35] = $znachen;
            } else {
                $data[35] = "нету";
            }

        }


    }

    $data[14] = str_replace(",", ".", $price);
    $data[0] = getTextFromHTML($compName);
    $data[15] = "ITComp";
    $data[16] = $comp_link;
    $data[38] = 'pictures\\big\\img' . $i . '.jpg';
    $data[39] = 'pictures\\small\\img' . $i . '.jpg';
    file_put_contents('pictures\\big\\img' . $i . '.jpg', file_get_contents('http://www.itcomp.ua' .
        $bigImage));
    file_put_contents('pictures\\small\\img' . $i . '.jpg', file_get_contents('http://www.itcomp.ua' .
        $smallImage));

    $q = insert($tablename, $data, $conn);    
    mysql_query($q) or die("Соединение не установлено 3!");


    $count = count($comp_array);
    echo "<script>parent.updateProgress($i+1,$count);</script>";
    flush();


}





?>
