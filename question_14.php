<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-9-16
 * Time: 下午10:32
 */

//采用动态规划
function maxProductAfterCutting($length)
{
    if ($length < 2) {
        return 0;
    } elseif ($length == 2) {
        return 1;
    } elseif ($length == 3) {
        return 2;
    }

    $products = [0, 1, 2, 3];//$products存储的是长度为i的绳子能够在乘积中提供的值

    for ($i = 4; $i <= $length; $i++) {
        $max = -1;
        for ($j = 1; $j <= $i/2; $j++) {
            if ($max < $products[$j] * $products[$i-$j])
                $max = $products[$j] * $products[$i-$j];
        }
        $products[$i] = $max;
    }
    return $products[$length];
}

//采用贪心算法
function maxProductAfterCuttingB($length)
{
    if ($length < 2) {
        return 0;
    } elseif ($length == 2) {
        return 1;
    } elseif ($length == 3) {
        return 2;
    }

    $timeOf3 = floor($length / 3);
    if ($length - $timeOf3 * 3 == 1) {
        $timeOf3 --;
    }
    $timeOf2 = ($length - $timeOf3 * 3)/2 ;
    return pow(3, $timeOf3) * pow(2, $timeOf2);

}

echo maxProductAfterCuttingB(7).PHP_EOL;