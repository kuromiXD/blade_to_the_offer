<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-10-9
 * Time: 下午4:34
 */
//非稳定解法
/*function reOrderArray($array)
{
    $left = 0;
    $right = count($array)-1;
    while ($left < $right) {
        while ($left < $right && isOdd($array[$left])) {
            $left++;
        }
        while ($left < $right && !isOdd($array[$right])) {
            $right--;
        }
        if ($left < $right) {
            $tmp = $array[$left];
            $array[$left] = $array[$right];
            $array[$right] = $tmp;
        }
    }
    return $array;
}*/

function isOdd($num) {
    if ($num & 0x1) {
        return true;
    } else {
        return false;
    }
}
//稳定解法
function reOrderArray($array) {
    $left = 0;
    $arrayCount = count($array);
    while ($left < $arrayCount && isOdd($array[$left])) {
        $left++;
    }
    if ($left < $arrayCount-1)
        $right = $left+1;
    while ($right < $arrayCount) {

        while ($right < $arrayCount && !isOdd($array[$right])) {
            $right++;
        }
        if ($right < $arrayCount) {
            $tmp = $array[$right];
        } else {
            break;
        }


        for ($k = $right; $k > $left; $k--) {
            $array[$k] = $array[$k-1];
        }
        $array[$left++] = $tmp;

    }
    return $array;
}

$array = [1,2,3,4,5,6,7];
print_r(reOrderArray($array));
