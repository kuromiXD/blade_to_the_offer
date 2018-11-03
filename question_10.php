<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-9-12
 * Time: 下午11:06
 */
//非递归求斐波那契数列
/*
function Fibonacci($n)
{
    $Fibonacci[0] = 0;
    $Fibonacci[1] = 1;
    if ($n < 2) {
        return $Fibonacci[$n];
    }
    $numA = 0;
    $numB = 1;
    $N = 0;
    for ($i = 2; $i <= $n; $i++) {
        $N = $numA + $numB;
        $numA = $numB;
        $numB = $N;
    }
    return $N;
    /*或者使用一个数组
    $Fibonacci[0] = 0;
    $Fibonacci[1] = 1;
    for ($i = 2; $i <= $n; $i++) {
        $Finonacci[$i] = $Finonacci[$i-2] + $Finonacci[$i-1];
    }
    return $Finonacci[$i];
    */
//}

//青蛙跳台阶问题：一次可以跳1阶或者两阶
/*
function StepN($n)
{
    $step[1] = 1;
    $step[2] = 2;
    if ($n <= 2)
        return $step[$n];
    $numA = 1;
    $numB = 2;
    $N = 0;
    for ($i = 3; $i <= $n; $i++) {
        $N = $numA + $numB;
        $numA = $numB;
        $numB = $N;
    }
    return $N;
}
echo StepN(6);
//同样的还有2x1小矩形铺满2xN的大矩形
function getMethodCount($n)
{
    $count[1] = 1;
    $count[2] = 2;
    if ($n <= 2)
        return $count[$n];
    $numA = 1;
    $numB = 2;
    $N = 0;
    for ($i = 3; $i <= $n; $i++) {
        $N = $numA + $numB;
        $numA = $numB;
        $numB = $N;
    }
    return $N;
}
*/
//对员工的年龄进行排序，可以使用辅助空间
function SortAges(&$peopleArray)
{
    if (empty($peopleArray)) {
        return -1;
    }
    $i = 0;
    define("MAXAGE", 99);
    while ($i <= MAXAGE) {
        $timesOfAge[$i++] = 0;
    }
    for ($j = 0; $j < count($peopleArray); $j++) {
        if ($peopleArray[$j] < 0 || $peopleArray[$j] > MAXAGE) {
            return -1;
        }
        $timesOfAge[$peopleArray[$j]]++;
    }
    $index = 0;
    for ($j = 0; $j<= MAXAGE; $j++) {
        for ($k = 0; $k < $timesOfAge[$j]; $k++) {
            $peopleArray[$index++] = $j;
        }
    }

}
$array = [23,41,31,43,31,54,13,53,53,1,3,64,74,3,35,41];
SortAges($array);
print_r($array);