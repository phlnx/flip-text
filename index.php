<?php

require_once 'vendor/autoload.php';

use TextFlip\Flip;

$text = "This is a test string. It has digits, like 1, 2, 3, and letters, like A, B, C.";

echo "Original string:" . PHP_EOL;
echo($text) . PHP_EOL;
echo PHP_EOL;

echo "180 degrees rotation:" . PHP_EOL;
echo Flip::flip($text) . PHP_EOL;
echo PHP_EOL;

echo "Horizontal mirroring:" . PHP_EOL;
echo Flip::mirrorX($text) . PHP_EOL;
echo PHP_EOL;

echo "Vertical mirroring:" . PHP_EOL;
echo Flip::mirrorY($text) . PHP_EOL;
echo PHP_EOL;


