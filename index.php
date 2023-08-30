<?php
$file = fopen("stopwatch.txt", "w") or die("Unable to open file!");
echo "Quantos minutos voce gostaria no cronometro".PHP_EOL;
$handle = fopen("php://stdin", "r");
$line = fgets($handle);

echo $line;