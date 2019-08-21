<?php
/**
 * Алгоритмы получения числа Фибоначчи
 *
 * fibonacci - O(n), рекурсивно, без гугла
 *
 * fibonacci2 - O(n^n), рекурсивно, всем известная реализация
*/
function fibonacci ($n, $array = []){

    if (empty($array)){
        $array[] = 0;
        if ($n > 0) {
            $array[] = 1;
        }
    }

    if ($n - 1 > 0) {
        $array[] = $array[count($array) - 2] + $array[count($array) - 1];
        $n--;
    }

    return ($n - 1 > 0) ? fibonacci($n, $array) : $array[count($array) - 1];
}

function fibonacci2($n){
    return $n < 2 ? $n : fibonacci2($n - 1) + fibonacci2($n - 2);
}

$position_number = 35;

$s = microtime(true);
echo "myFibonacci($position_number): " . fibonacci($position_number) . ' time=' . (microtime(true) - $s);

echo PHP_EOL;

$s = microtime(true);
echo "fibonacci($position_number): " . fibonacci2($position_number) . ' time=' .(microtime(true) - $s);