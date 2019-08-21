<?php
/**
 * Алгоритмы получения факториала
 *
 * factorial - O(n), рекурсивно, без гугла
 *
 * factorial2 - O(n), в цыкле, реализацию наискал
*/
function factorial($int){
    return $int > 1 ? $int * factorial($int - 1) : 1;
}


function factorial2($int){
    for ($i = 1, $k = 1; $i <= $int; $i++)
        $k*=$i;

    return $k;
}

echo factorial(5);
echo PHP_EOL;
echo factorial2(5);