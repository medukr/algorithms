<?php

function brute_force_square($from){

    $result = 0;
    $thin =  0.0001;

    while ($result**2 <= $from){
        $result += $thin;
    }

    return $result;
};

function binary_square($from){

    $result = $from;
    $sharp = 0.0000000000001;
    $step = $from;
    $i = 0;
    while (abs($result ** 2 - $from) >= $sharp) {
        if ($result ** 2 > $from) {
            $result -= ($step /= 2) ;
        } else {
            $result += $step;
        }
            ++$i;
    }

    echo 'iteration '.$i, PHP_EOL;
    return $result;
};

function binary_square_2($from)
{
    $sharp = 0.0000000000001;
    $low = 0;
    $high = $from;
    $result = ($high + $low) / 2;
    $i = 0;
    while (abs($result ** 2 - $from) >= $sharp) {
        if ($result ** 2 < $from) {
            $low = $result;
        } else {
            $high = $result;
        }

        $result = ($high + $low) / 2;
        ++$i;
    }

    echo 'iteration ' . $i, PHP_EOL;
    return $result;
}

;



$from = 1;

print_r(brute_force_square($from));
echo PHP_EOL;
print_r(binary_square($from));
echo PHP_EOL;
print_r(binary_square_2($from));
echo PHP_EOL. 'Провверка ' . sqrt($from);


