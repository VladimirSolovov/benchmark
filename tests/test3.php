<?php
$data = file_get_contents('tests/result.json');
$json = json_decode($data, true);
$start = microtime(true);
$a = range(2, 9000000);
echo array_sum($a);
$timeres[] = round(microtime(true) - $start, 2);
file_put_contents('tests/result.json', json_encode($timeres));
?>