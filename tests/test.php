<?php
$data = file_get_contents('tests/result.json');
$json = json_decode($data);
$start = microtime(true);
$a = range(1000, 100000);
$b = range(80000, 120000);
$result1 = array_intersect($a, $b);
$timeres[] = round(microtime(true) - $start, 2);
file_put_contents('tests/result.json', json_encode($timeres);
?>