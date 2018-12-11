<?php
$data = file_get_contents('tests/result.json');
$json = json_decode($data, true);
$start = microtime(true);
$sum = 200000;
  for ($i = 1; $i <= $sum; $i += 1000){
  	$a = array_fill(0, $i, NULL);
  }
$timeres[] = round(microtime(true) - $start, 2);
file_put_contents('tests/result.json', json_encode($timeres));
?>