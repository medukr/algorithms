<?php
/**
 * Разворот массива O(n)
 *
 * Три схожие реализации с маленькими отличиями в логике свапа значений
 *
 *
 * Разворот строки O(n)
 *
 * Для php с возможностью обращаться к символам строки как к массиву[n] все тоже самое
 * Реализован один вариант
*/


function reverseArray1(array $array):array
{
    $a = null;
    $length = count($array);
    for ($i= 0; $i < $length/2 ; $i++) {

        $array[$i] = [$array[$length - 1 - $i], $array[$length - 1 - $i] = $array[$i]][0];
    }

    return $array;
}

function reverseArray2(array $array):array
{
    $length = count($array);

    $tmp = null;

    for ($i= 0; $i < $length/2 ; $i++) {

        $tmp = $array[$i];

        $array[$i] = $array[$length - 1 - $i];

        $array[$length - 1 - $i] = $tmp;

    }

    return $array;
}

function reverseArray3(array $array):array
{
    $new_arr = [];
    $length = count($array);

    for ($i= 0; $i < $length/2 ; $i++) {

        $new_arr[$i] = $array[$length - 1 - $i];
        $new_arr[$length - 1 - $i] = $array[$i];
    }

    return $new_arr;
}

function reverseArray4(array $array):array {

    $tmp = null;
    $length = count($array);

    for ($i = 0, $k = $length - 1;$i < $k;$i++, $k--){
        $tmp = $array[$i];
        $array[$i] = $array[$k];
        $array[$k] = $tmp;
    }

    return $array;

}


function cycleArray(array $array): array {
    $tmp = $array[0];
    $length = count($array);

    for ($i = 1; $i < $length ; $i++){
        $array[$i-1] = $array[$i];
    }

    $array[$length - 1] = $tmp;

    return $array;
}


function reverseString(string $string): string
{
$length = strlen($string);

    for ($i= 0; $i < $length / 2; $i++) {
        $string[$i] = [$string[$length - 1 - $i], $string[$length - 1 - $i] = $string[$i]][0];
    }

    return $string;
}
function reverseString2(string $string): string{

    $length = strlen($string);

    for ($i = 0, $k = $length - 1;$i < $k;$i++, $k--){
        $tmp = $string[$i];
        $string[$i] = $string[$k];
        $string[$k] = $tmp;
    }

    return $string;
}


function using_systemA(string $method_name):void {
    $size = 512000;
    $m = memory_get_usage();
    $s = microtime(true);
    $arr = $method_name(range(0, $size));
    echo $method_name . ': t=' . (microtime(true) - $s) . ' ms'
        . ', m=' . (memory_get_usage() - $m) . ' b'
        . PHP_EOL;
    unset($arr);
}

function assertA(string $method_name, $request, $response):void{
    echo  $method_name($request) == $response
        ? '.'
        : '|';
}



function test_reverseArray(){

    echo PHP_EOL . __FUNCTION__ . '  ';

    assertA('reverseArray1', range(0,5), range(5,0));
    assertA('reverseArray1', range(0,6), range(6,0));

    assertA('reverseArray2', range(0,5), range(5,0));
    assertA('reverseArray2', range(0,6), range(6,0));


    assertA('reverseArray3', range(0,5), range(5,0));
    assertA('reverseArray3', range(0,6), range(6,0));

    assertA('reverseArray4', range(0,5), range(5,0));
    assertA('reverseArray4', range(0,6), range(6,0));

    assertA('cycleArray', [1,2,3,4,5], [2,3,4,5,1]);
    assertA('cycleArray', ['a', 'b', 'c', 'd'], ['b', 'c', 'd', 'a']);

    echo PHP_EOL;

    echo 'Using system test' . PHP_EOL;

    using_systemA('reverseArray1');
    using_systemA('reverseArray2');
    using_systemA('reverseArray3');
    using_systemA('reverseArray4');
    using_systemA('cycleArray');

    echo 'Done!';
    echo PHP_EOL;


}

function test_reverseString(){
    echo PHP_EOL . __FUNCTION__ . '  ';
    echo reverseString('12345') == '54321'
        ? '.'
        : '|';

    echo reverseString('1234') == '4321'
        ? '.'
        : '|';

    echo reverseString2('12345') == '54321'
        ? '.'
        : '|';

    echo reverseString2('1234') == '4321'
        ? '.'
        : '|';


    echo PHP_EOL;
    echo 'Done!';
    echo PHP_EOL;

}


test_reverseArray();
test_reverseString();
