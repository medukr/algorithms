<?php


function binary_search($array, $search){
    $low = 0;
    $hight = count($array) - 1;

    while($low <= $hight){
        $mid = floor(($low + $hight) / 2);
        if ($search == $array[$mid]){
            return $mid;
        } elseif($array[$mid] < $search){
            $low = $mid + 1;
        } else {
            $hight = $mid - 1;
        }
    }
    return -1;
};


print_r(binary_search([1,2,3,4,5,6], 4));


function run_test(){

    echo 'Start!' . PHP_EOL;
    test('binary_search');
    echo 'Done!';
}

function test(string $method):void{

    echo $method . ' ';

    assert_test($method, [[1,2,3,4,5,6], 4], 3);
    assert_test($method, [[0,0,2,2,1], 0], 0);
    assert_test($method, [[0,0,2,2,1], 2], 2);
    assert_test($method, [[0,0,2,2,1], 5], -1);
    assert_test($method, [[0], 5], -1);
    assert_test($method, [[0], 0], 0);
    assert_test($method, [[], 0], -1);
    assert_test($method, [[], null], -1);
    assert_test($method, [['bcd','frt','def','abc', 'y'], 'def'], 2);


    echo ' ';
    speed_test($method, [range(5000, 0), 333], null);

    echo PHP_EOL;

}

function assert_test(string $method,array $from, $to):void{
    $result = $method(...$from);

    echo $result == $to ? '.' : '|';
}

function speed_test($method, $from){

    $m = memory_get_usage();
    $t = microtime(true);

    $method(...$from);

    $time_usage = (microtime(true) - $t);
    $memory_usage = (memory_get_usage() - $m);
    unset($test_array);

    echo 'time = '.$time_usage.'s, memory = '.$memory_usage . 'bite';

}
run_test();