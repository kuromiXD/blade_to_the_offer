<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-9-16
 * Time: 下午1:49
 */

function ReplaceBlack(&$string)
{
    $strLen = strlen($string);
    $count = substr_count($string, ' ');
    $replacedCount = $strLen + ($count * 2);
    $strLen--;

    $i = $replacedCount-1;
    $index = $strLen;
    while ($index >=0 && $i > $index) {
        if ($string[$index] == ' ') {

            $string[$i--] = '0';
            $string[$i--] = '2';
            $string[$i--] = '%';
        } else {
            $string[$i--] = $string[$index];
        }
        --$index;
    }
}
$string = 'you are a little chicken a ha ha';
ReplaceBlack($string);
echo $string.PHP_EOL;
