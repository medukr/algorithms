<?php
/**
 * Created by andrii
 * Date: 19.08.19
 * Time: 12:12
 */

/**
 * Перевод числа из 10-й системы счисления в любую другую от 2 до 10, и наоборот
 *
 * @param int $x
 * @param int $toBase
 *
 * @return string
 */
function decx(int $x, int $toBase):string {
    $res = '';

    while($x > 0){
        $digit = $x % $toBase;

        $res .= $digit;
//    $res = str_pad($res, strlen($res) + 1, $digit, STR_PAD_LEFT);

        $x = intdiv($x, $toBase);
    }

//return $res;
    return strrev($res);
}


function xdec(string $x, $from):int{

    $length = strlen($x);
    $result = 0;
    for ($i = 0; $i < $length;$i++){
        $result += (int)$x[$i] * $from**($length - $i - 1);
    }

    return $result;
}


echo decx(1234, 7), PHP_EOL;

/*Проверка правильности алгоритма с помощью встроенной функции*/
echo base_convert(1234, 10, 7);
echo PHP_EOL;

echo xdec('3412', 7);
echo PHP_EOL;

/*Проверка правильности алгоритма с помощью встроенной функции*/
echo base_convert(3412, 7, 10);