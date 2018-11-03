<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-9-17
 * Time: 上午11:29
 */
//常规解法
//思路：设置一个变量flag从1开始和数值n开始相与，每个位相与后flag左移，以从右往左的顺序检查
function NumberOf1($n)
{
    $count = 0;
    $flag = 1;
    while ($flag) {
        if ($n & $flag)
            $count++;
        $flag = $flag << 1;
    }
    return $count;
}

//优化解法
//思路：每次n与n-1相与，只有在n有‘1’位时，相与不为0
function NumberOf1B($n)
{
    $count = 0;
    while ($n) {
        $count++;
        $n = $n & ($n-1);
    }
    return $count;
}

//用1条语句判断一个整数是不是2的整数次方
//思路：2的整数次方的二进制中只有1个‘1’
function IsProductsOf2($n)
{
    $tmp = $n & $n-1;
    if ($tmp == 0) {
        return true;
    } else {
        return false;
    }
}


//两个整数m和n.计算要改变m的二进制表示中的多少位才能变为n
function ChangeToAnother($m, $n)
{
    $tmp = $m ^ $n;
    $count = 0;
    while ($tmp) {
        $tmp = $tmp & ($tmp-1);
        $count++;
    }
    return $count;
}

echo ChangeToAnother(10, 13);