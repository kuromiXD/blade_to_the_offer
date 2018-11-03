<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-9-23
 * Time: 下午8:59
 */
//注意指数为负以及底数为0的情况
function Power($base, $exponent)
{

    if ($exponent == 0)
        return 1;
    if ($base == 0) {
        if ($exponent < 0)
            return false;
        else
            return 0;
    }
    $tmp = $exponent;
    if ($exponent < 0) {
        $tmp = -$exponent;
    }
    $result = GetPowerResult($base, $tmp);
    if ($exponent < 0)
    {
        $result = 1/$result;
    }
    return $result;
}

function GetPowerResult($base, $exponent)
{

    if ($exponent == 1)
        return $base;
    $result = GetPowerResult($base, $exponent >> 1);
    $result *= $result;
    if ($exponent & 0x1 == 1)
        $result *= $base;

    return $result;
}

echo Power(-5,-5).PHP_EOL;