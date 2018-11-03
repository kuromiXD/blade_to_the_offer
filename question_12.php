<?php
function HasPath($matrix, $rows, $cols, $targetString)
{
	if ($matrix == null || $targetString == null || $rows < 0 || $cols < 0) {
		return -1;
	}
	$visit = array();
	for ($i = 0; $i < $rows; $i++) {
		for ($j = 0; $j < $cols; $j++) {
			$visit[$i][$j] = 0;
		}
	}
	
	for ($row = 0; $row < $rows; $row++) {
		for ($col = 0; $col < $cols; $col++) {
			if (HasPathCore($matrix, $rows, $cols, $row, $col, $targetString, $visit, 0))
				return true;
		}
	}
	return false;
}

function HasPathCore($matrix, $rows, $cols, $row, $col, $targetString, &$visit, $pathLength)
{
	$hasPath = false;
	if ($row < 0 || $col < 0 || $row >= $rows || $col >= $cols) {
		return false;
	}
	if ($matrix[$row][$col] === $targetString[$pathLength] && !$visit[$row][$col]) {
		$pathLength++;
		if ($pathLength == strlen($targetString)) {
			return True;
		}
		$visit[$row][$col] = 1;
		if (HasPathCore($matrix, $rows, $cols, $row+1, $col, $targetString, $visit, $pathLength) ||
			HasPathCore($matrix, $rows, $cols, $row-1, $col, $targetString, $visit, $pathLength) ||
			HasPathCore($matrix, $rows, $cols, $row, $col+1, $targetString, $visit, $pathLength) ||
			HasPathCore($matrix, $rows, $cols, $row, $col-1, $targetString, $visit, $pathLength)
			) {
			$hasPath = True;
		} else {
			$hasPath = False;
		} 
			
	} else {
		$hasPath = False;
	}
	return $hasPath;
}
$array = array(
	array('a','b','t','g'),
	array('c','f','c','s'),
	array('j','d','e','h')
);
var_dump(HasPath($array, 3, 4, 'abtgshedjcfc'));