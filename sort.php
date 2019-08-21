<?php

/**
 * Квадратичные сортировки O(n^2)
 *
 * 1. Вставками (insert[.ion] sort)
 * 2. Методом выбора (choice/selection sort)
 * 3. Метод пузырька (bubble sort)
 *
 * Соритровка подсчетом (count sort) O(N)
 * --Необходимо написать релализацию
 *
 * Сортировка слиянием (рекурисия) O(N) (merge_sort)
 */

function insert_sort(array $array):array {
    $length = count($array);
    for ($i = 0; $i < $length; $i++){
        for ($k = $i; $k > 0 && $array[$k - 1] > $array[$k]; $k--){
                $tmp = $array[$k-1];
                $array[$k-1] = $array[$k];
                $array[$k] = $tmp;
        }
    }
    return $array;
}

function choice_sort(array $array):array {
    $length = count($array);
    for ($pos = 0; $pos < $length - 1; $pos++){
        for ($k = $pos + 1; $k < $length; $k++){
            if ($array[$pos] > $array[$k]){
                $tmp = $array[$pos];
                $array[$pos] = $array[$k];
                $array[$k] = $tmp;
            }
        }
    }
    return $array;
}

function bubble_sort(array $array):array {
    $length = count($array);
    for ($i = 1; $i < $length; $i++){
        for ($k = 0; $k < $length - $i; $k++){
            if ($array[$k] > $array[$k + 1]){
                $tmp = $array[$k];
                $array[$k] = $array[$k + 1];
                $array[$k + 1] = $tmp;
            }
        }
    }
    return $array;
}

function merge_sort(array $array):array{
    $length = count($array);

    if ($length < 2){
        return $array;
    } else {
        $left_arr = merge_sort(array_slice($array, 0 ,floor($length / 2)));
        $right_arr = merge_sort(array_slice($array, floor($length/2), $length));

        $left_length = count($left_arr);
        $right_length = count($right_arr);

        $merge_arr = [];

        $l = 0;
        $r = 0;

        while ($l < $left_length || $r < $right_length){
            if (isset($left_arr[$l]) && isset($right_arr[$r])) {
                if ($left_arr[$l] < $right_arr[$r])
                    $merge_arr[] = $left_arr[$l++];
                else
                    $merge_arr[] = $right_arr[$r++];

            }
            elseif(isset($right_arr[$r]))
                $merge_arr[] = $right_arr[$r++];
            else
                $merge_arr[] = $left_arr[$l++];

        }

        return $merge_arr;

    }
};

function run_test(){

    echo 'Start!' . PHP_EOL;
    test('insert_sort');
    test('choice_sort');
    test('bubble_sort');
    test('merge_sort');
    echo 'Done!';
}

function test(string $method):void{

    echo $method . ' ';

    assert_test($method, [4,2,3,5,1], [1,2,3,4,5]);
    assert_test($method, [0,0,2,2,1], [0,0,1,2,2]);
    assert_test($method, [22,44,55,7,0,-1,0] ,[-1,0,0,7,22,44,55]);
    assert_test($method, [0] ,[0]);
    assert_test($method, [] ,[]);
    assert_test($method, ['bcd','frt','def','abc', 'y'] ,['abc','bcd','def','frt','y']);

    echo ' ';
    speed_test($method);

    echo PHP_EOL;

}

function assert_test(string $method,array $from,array $to):void{
    echo $method($from) == $to ? '.' : '|';
}

function speed_test($method){
    $test_array = range(5000, 0);
    $t = microtime(true);

    $method($test_array);

    $time_usage = (microtime(true) - $t);

    unset($test_array);

    echo 'time = '.$time_usage.'s';

}
run_test();

//print_r(merge_sort([1,4,2,3,5, 10, -1]));
