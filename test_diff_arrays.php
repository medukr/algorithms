<?php
/**
 * Проверка разныцы по занимаемой памяти массивами между Array() и SplFixedArray()
 *
 * */

echo 'Start';
for($size = 1000; $size < 6000000; $size *= 2) {
    echo PHP_EOL . "Testing size: $size" . PHP_EOL;

    for($s = memory_get_usage(), $container = Array(), $i = 0; $i < $size; $i++) $container[$i] = NULL;
    $firs =  memory_get_usage() - $s;
    echo 'Array() ' . $firs . PHP_EOL;

    for($s = memory_get_usage(), $container2 = new SplFixedArray($size), $i = 0; $i < $size; $i++) $container2[$i] = NULL;
    $second = memory_get_usage() - $s;
    echo 'SplFixedArray ' . $second . PHP_EOL;

    echo "Different memory between Array() / SplFixedArray = " . $firs / $second . PHP_EOL . PHP_EOL;
}
echo 'Done!';
?>