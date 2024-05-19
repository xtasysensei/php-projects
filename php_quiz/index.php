<?php

declare(strict_types=1);

function calc_records($ops)
{

    $records = [];
    for ($i = 0; $i < count($ops); $i++) {
        switch ($ops[$i]) {
            case is_numeric($ops[$i]):
                array_push($records, (int)$ops[$i]);
                break;
            case "D":
                if (count($records) > 1) {
                    $new_record = $records[count($records) - 1] * 2;
                    array_push($records, $new_record);
                } else {
                    $new_record = $records[0] * 2;
                    array_push($records, $new_record);
                };
                break;
            case "C":
                array_pop($records);
                break;
            case "+":
                if (count($records) >= 2) {
                    $new_score = $records[count($records) - 2] + $records[count($records) - 1];
                    array_push($records, $new_score);
                } else {
                    $new_score = $records[0];
                    array_push($records, $new_score);
                };
                break;

            default:
                echo "nothing";
                break;
        };
    }
    return array_sum($records);
};

$ops = ["5", "2", "C", "D", "+"];
echo calc_records($ops);
