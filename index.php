<?php
echo "<pre>", PHP_EOL;

$x = 12;
$flag = false;

$i = 1;
do {
  $flag = ($i % 10 == 0 or $flag);
} while (++$i <= $x);

var_dump($flag); //true




$x = 120;
$flag = true;

$i = 10;
do {
    $flag = $flag && ($i % 10 == 0) ;
} while (($i += 10) <= $x);

var_dump($flag); //true

echo PHP_EOL;


















