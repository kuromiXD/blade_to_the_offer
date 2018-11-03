<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-10-23
 * Time: 下午2:30
 */

fscanf(STDIN, "%d", $n);

Print1ToMaxOfNDigitsB($n);

//将存储数的字符串按给出的位数n置为每一位都为0
function SetZero($n)
{
    $string = '0';
    for ($i = $n-1; $i >= 1; $i--) {
        $string = $string.'0';
    }
    return $string;
}


/*
//解法一：
//这个解题方法的思路是每次将数字字符的最末位加1,将此次加1后的值存储在$sum里面，若$sum >= 10说明产生了进位
//进位用$nTakeOver存储,若此时不是最高位加1产生的进位则进入前一位计算$sum,否则说明字符溢出，应停止加1，已得到最大的n位数。

function Increment(&$string)
{
    $isOverflow = 0;
    $nTakeOver = 0;
    $length = strlen($string);
    for ($i = $length-1; $i >= 0; $i--) {
        $sum = $string[$i] - '0' + $nTakeOver;
        if ($i == $length-1) {
            $sum++;
        }
        if ($sum >= 10) {
            if ($i == 0)
                $isOverflow = 1;
            else {
                $sum -= 10;
                $nTakeOver = 1;
                $string[$i] = $sum + '0';
            }
        } else {
            $string[$i] = $sum + '0';
            break;
        }
    }
    return $isOverflow;
}

function Print1ToMaxOfNDigits($n)
{
    if ($n < 0)
        return 0;
    $string = SetZero($n);
    while (!Increment($string)) {
        echo $string.PHP_EOL;
    }
}

*/


//解法二：


function PrintNumber($string)
{
    $isZero = true;
    $strLength = strlen($string);
    for ($i = 0; $i < $strLength; $i++) {
        if ($string[$i] != '0')
            $isZero = false;
        if (!$isZero)
            echo $string[$i];
    }
    echo PHP_EOL;
}

function Print1ToMaxOfNDigitsB($n)
{
    if ($n < 0)
        return 0;
    $string = SetZero($n);
    for ($i = 0; $i < 10; $i++) {
        $string[0] = $i + '0';
        Print1ToMaxOfNDigitsRecursively($string,$n,0);
    }
}

function Print1ToMaxOfNDigitsRecursively($string, $n, $index)
{
    if ($index == $n-1) {
        PrintNumber($string);
        return;
    }
    for ($i = 0; $i < 10; $i++) {
        $string[$index+1] = $i + '0';
        Print1ToMaxOfNDigitsRecursively($string, $n, $index+1);
    }
}


