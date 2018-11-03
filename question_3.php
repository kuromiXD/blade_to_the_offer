<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-9-16
 * Time: 下午12:43
 */
//在一个长度为n的数组里的所有数字都在0～n-1范围中,数组里存在若干重复数字，找出任意一个重复数字
//思路：确定第i个下标的数组值m是否为i，若不为i,查看下标为m的数组值是否为m，若为m则说明m是一个重复值，否则进行交换到该位置
function getDuplicateNum($array,$n)
{
    $arrayCount = count($array);
    for ($i = 0; $i < $arrayCount; $i++) {
        if ($array[$i] < 0 || $array[$i] > $n-1) {
            return false;
        }
    }

    for ($i = 0; $i < $arrayCount; $i++) {

        if ($array[$i] != $i) {
            if ($array[$array[$i]] != $array[$i]) {
                $tmp = $array[$i];
                $array[$i] = $array[$tmp];
                $array[$tmp] = $tmp;
            } else {
                return $array[$i];
            }
        }
    }
}


//在一个长度为n+1的数组里有范围为(1~n)的数字，里面至少有一个数字是重复的,请找出一个重复值,但不能修改输入数组
//思路一：创建一个长度为n+1的数组，采用上面的解法
//思路二：采用二分法，如果某个范围内的数字数量超过了该范围的长度，则表明该范围里有重复的数字

function getduplicate($array){
    $array_count=count($array);
    if(empty($array)){

        return false;
    }
    if(max($array)>$array_count-1 || min($array)<1){

        return false;
    }
    $start=1;
    $end=$array_count-1;
    while($end>=$start){
        //得到中间数
        //$middle=intval(floor(($end-$start)/2))+$start;
        $middle=intval(floor(($end+$start)/2));
        //得到处于$start~$middle范围里的数值个数
        $count=countRange($array,$array_count,$start,$middle);
        //若此时$end已经与$start相等，说明筛选范围只剩一个数
        if($end==$start){
            //若该数在数组值中的数值大于1,则此数是重复数
            if($count>1){
                return $start;
            } else {
                break;
            }
        }
        //若end与start不相等，count大于此范围内的值个数,则说明此范围内（前半）有重复值;否则重复值可能存在于后半范围
        if($count>($middle-$start+1)){
            //end赋值为middle，意味这将搜索范围缩小的前一半，下一此接着二分
            $end=$middle;
        } else {
            //搜索范围在缩小在后半
            $start=$middle+1;
        }


    }
    return false;
}

function countRange($array,$array_count,$start,$end){
    if(empty($array)){
        return false;
    }
    $count=0;
    for($i=0;$i<$array_count;$i++){
        if($array[$i]>=$start && $array[$i]<=$end){
            $count++;
        }
    }
    return $count;
}

$array = [2, 3, 5, 4, 3, 2, 6, 7];
print_r(getduplicate($array, 8).PHP_EOL);