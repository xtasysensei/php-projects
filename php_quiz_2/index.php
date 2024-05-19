<?php

declare(strict_types=1);

function check_string($s)
{
    $new_string = strlen($s);

    for ($i = 1; $i < $new_string; $i++) {

        $a = $s[$i] === ")";
        $b = $s[$i - 1]  === "(";
        $c = $s[$i] === "]";
        $d = $s[$i - 1]  === "[";
        $e = $s[$i - 1]  === "{";
        $f = $s[$i]  === "}";
        $valid = $a && $b || $c && $d || $e && $f;
    }

    if ($valid) {
        echo "String {$s} is valid";
    } else {
        echo "String {$s} is not valid";
    }
}

$s = "(){}";
echo check_string($s);
