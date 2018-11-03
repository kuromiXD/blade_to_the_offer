<?php
//从二维数组的右上角开始找
/*function find($array,$rows,$columns,$number){
    if(!empty($array) && $rows>0 && $columns>0){
        $row=0;
        $column=$columns-1;
        while($row<$rows && $column>0){
            if($array[$row][$column]==$number){
                return true;
            } else if($array[$row][$column]<$number){
                $row++;
            } else {
                $column--;
            }
        }
    }
    return false;

}*/

//从左下角开始找
function find($array,$rows,$columns,$number){
    if(!empty($array) && $rows>0 && $columns>0){
        $row=$rows-1;
        $column=0;
        while($row>0 && $column<$columns){
            if($array[$row][$column]==$number){
                return true;
            } else if($array[$row][$column]>$number){
                $row--;
            } else {
                $column++;
            }
        }
    }
    return false;

}


?>