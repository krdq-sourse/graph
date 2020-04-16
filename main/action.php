<?php

$stack = [];
$trash = [];

//$foo = "4
//0110
//0010
//0001
//0000";
$foo = file_get_contents($_COOKIE['n']);
$count = (int)$foo[0];
$foo[0] = ',';
$foo[1] = ',';
$format = str_replace(',', '', $foo);
$tab = explode("\r\n", $format);

$temp = str_split($tab[0]);
$temp = array_diff($temp, [' ', [" "]]);
$tab[0] = '';
foreach ($temp as $value) {
    if (is_numeric($value)) {
        $tab[0] .= $value;
    }
}


$j = 0;
$graph = [];

for ($i = 'a'; $j != $count; $i++) {
    $graph += [$i => ''];
    $j++;
}
$i = 0;
foreach ($graph as $key => $value) {
    $graph[$key] = $tab[$i++];

    $graph[$key] = str_split($graph[$key]);
}
$s = "";

foreach ($graph as $key => $value) {
    $alf = 'a';
    foreach ($value as $her => $val) {


        if ($val != 0) {

            $s .= "sys.addEdge('$key','$alf'); \r\n";
            array_push($stack, $key);
            array_push($trash, $alf);
        }
        $alf++;
    }

}
setcookie('v', $s);
$stack = array_unique($stack);
$trash = array_unique($trash);
$stack = array_diff($stack, $trash);

$temp = "";
foreach ($stack as $value) {
    $temp .= toNum($value) . ' ';
}
setcookie('j', $temp);


function toNum($c)
{
    $i = 0;
    $b = 'a';
    while ($b != $c) {
        $i++;
        $b++;
    }
    return $i;
}


echo "<body onload='location.href=\"index.php\"'></body>";






