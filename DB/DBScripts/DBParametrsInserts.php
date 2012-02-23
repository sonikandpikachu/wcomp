<?php

/**
 * @author Jenya
 * @copyright 2012
 */
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

$conn = mysql_connect("localhost", "root", "") or die("Соединение не установлено!");
@mysql_select_db("wComp") or die("Соединение не установлено 2!");

mysql_query("TRUNCATE TABLE  wComp_Criteria");
mysql_query("TRUNCATE TABLE  wComp_Condition");
mysql_query("TRUNCATE TABLE  wComp_Parametr");
$ini_array = parse_ini_file("Parametrs.ini", true);
$i = 0;
foreach ($ini_array as $ini) {
    if (!array_key_exists("autoCondition", $ini))
        $ini["autoCondition"] = false;
    if ($ini["type"] == "criteria") {
        $data = array();
        $data[0] = $ini["href"];
        $q = insert("wComp_Parametr", $data, $conn);
        mysql_query($q) or die("insert failed");
        $lastid = mysql_insert_id();
        $data = array();
        $data[0] = $ini["defValue"];
        $data[1] = $lastid;
        $data[2] = $ini["name"];
        if ($ini["minmax"] == "min")
            $data[3] = 0;
        if ($ini["minmax"] == "max")
            $data[3] = 1;
        $q = insert("wComp_Criteria", $data, $conn);
        mysql_query($q) or die("insert failed");
        if ($ini["autoCondition"])
            $ini["type"] = "condition";

    }
    if ($ini["type"] == "condition") {
        $data = array();
        $data[0] = $ini["href"];
        $q = insert("wComp_Parametr", $data, $conn);
        mysql_query($q) or die("insert failed");
        $lastid = mysql_insert_id();
        $data = array();
        $data[0] = $lastid;
        $data[1] = $ini["name"];
        $q = insert("wComp_Condition", $data, $conn);
        mysql_query($q) or die("insert failed");

    }
}

?>