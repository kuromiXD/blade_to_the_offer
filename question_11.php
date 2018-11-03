<?php
function GetMin($array)
{
	
	if ($array == null)
		return false;
	$left = 0;
	$right = count($array)-1;
	$indexMid = $left;
	while ($array[$left] >= $array[$right]) {
		if ($left - $right == 1) {
			$indexMid = $right;
			break;
		}
		$indexMid = ($left + $right)/2;
		if ($array[$left] == $array[$right] && $array[$indexMid] == $array[$right]) {
			return MinInOrder($array, $left, $right);
		}
		if ($array[$indexMid] > $array[$left]) {
			$left = $indexMid;
		} elseif ($array[$indexMid] < $array[$left]) {
			$right = $indexMid;
		}
	}

	return $array[$indexMid];
}

function MinInOrder($array, $left, $right)
{
	$result = $array[$left];
	for ($i = $left+1; $i <= $right; $i++) {
		if ($array[$i] < $result) 
			$result = $array[$i];
	}
	return $reuslt;
}