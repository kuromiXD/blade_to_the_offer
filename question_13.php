<?php 
function MovingCount($k, $rows, $cols)
{
	if ($k < 0 || $rows < 0 || $cols <0 ) {
		return -1;
	}
	$count = 0;
	$visit = array();
	for ($row = 0; $row < $rows; $row++) {
		for ($col = 0; $col < $cols; $col++) {
			$visit[$row][$col] = 0;
		}
	}
	$count = movingCountCore($k, $rows, $cols, 0, 0, $visit);
	return $count;
}

function MovingCountCore($k, $rows, $cols, $row, $col, &$visit)
{
	$count = 0;
	if (IsMove($k, $rows, $cols, $row, $col, $visit)) {
		$visit[$row][$col] = 1;
		$count = 1 + MovingCountCore($k, $rows, $cols, $row-1, $col, $visit)
		+ MovingCountCore($k, $rows, $cols, $row+1, $col, $visit) 
		+ MovingCountCore($k, $rows, $cols, $row, $col+1, $visit)
		+ MovingCountCore($k, $rows, $cols, $row, $col-1, $visit);
	}
	return $count;
}
function IsMove($k, $rows, $cols, $row, $col, $visit)
{
	if ($row >= $rows || $row < 0 || $col >= $cols || $col < 0 || $visit[$row][$col])
		return false;
	$sum = 0;
	while ($row > 0) {
		$sum += $row%10;
		$row = $row/10;
	}
	while ($col > 0) {
		$sum += $col%10;
		$col = $col/10;
	}
	return $k >= $sum;
}

echo MovingCount(5,4,4);

 ?>