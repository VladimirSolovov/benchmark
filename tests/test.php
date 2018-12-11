<?php
$data = file_get_contents('tests/result.json');
$json = json_decode($data);
$start = microtime(true);
	$a = range(1000, 100000);
	$b = range(80000, 120000);
	$result1 = array_intersect($a, $b);
$timeres[] = round(microtime(true) - $start, 2);
$start2 = microtime(true);
	$sum = 200000;
	  for ($i = 1; $i <= $sum; $i += 1000){
	  	$a = array_fill(0, $i, NULL);
	  }
$timeres2[] = round(microtime(true) - $start, 2);
$start3 = microtime(true);
	$a = range(2, 9000000);
	$timeres3[] = round(microtime(true) - $start, 2);
$record = array_merge($timeres, $timeres2, $timeres3);
file_put_contents('tests/result.json', json_encode($record));
?>