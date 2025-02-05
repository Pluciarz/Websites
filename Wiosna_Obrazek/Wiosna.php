<?php
$height = 2480;
$width = 1748;
$image = imagecreatetruecolor($width, $height);

$red = imagecolorallocate($image, 255, 0, 0);
$lime = imagecolorallocate($image, 0, 255, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$yellow = imagecolorallocate($image, 255, 255, 0);
$green = imagecolorallocate($image, 0, 128, 0);
$orange = imagecolorallocate($image, 255, 165, 0);
$purple = imagecolorallocate($image, 128, 0, 128);
$brown = imagecolorallocate($image, 139, 69, 19);
$text = "Wesołych Świąt Wielkanocnych";
for($i = 0; $i <= 20; $i++)
{
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);
    $random[$i] = imagecolorallocate($image, $r, $g, $b);
}
for($i = 1; $i <= 5; $i++)
{
    $photo[$i] = imagecreatefrompng("$i.png");
}
for($i = 0; $i < 10; $i++)
{
    $a = rand(1, 5);
    $x = rand(20, 1560);
    $y = rand(170, 580);
    imagecopy($image, $photo[$a], $x, $y, 0, 0, imagesx($photo[$a]), imagesy($photo[$a]));
}

imagefill($image, 0, 0, $lime);
imagettftext($image, 100, 0, 25, 150, $red, "TektonPro-Bold.ttf", $text);
imagefilledellipse($image, 1074, 1000, 500, 400, $yellow);
imagefilledellipse($image, 950, 920, 50, 50, $black);
imagefilledellipse($image, 1190, 920, 50, 50, $black);
$values = array(
    1070, 950,
    1030, 1100,
    1110, 1100);
imagefilledpolygon($image, $values, 3, $orange);
imagefilledellipse($image, 1074, 1435, 600, 550, $yellow);

imagefilledellipse($image, 1074, 2000, 600, 600, $random[0]);
$values = array(
    774, 1550,
    774, 2000,
    974, 1700);
imagefilledpolygon($image, $values, 3, $random[1]);
$values = array(
    1374, 1550,
    1374, 2000, 
    1174, 1700);
imagefilledpolygon($image, $values, 3, $random[2]);
$values = array(
    1054, 1550,
    774, 2000,
    1194, 1715);
imagefilledpolygon($image, $values, 3, $random[3]);
imagefilledrectangle($image, 774, 1950, 1374, 2020, $random[4]);
imagefilledrectangle($image, 774, 1880, 1374, 1950, $random[5]);
imagefilledrectangle($image, 774, 1810, 1374, 1880, $random[6]);
imagefilledrectangle($image, 774, 1740, 1374, 1810, $random[7]);
imagefilledrectangle($image, 774, 1670, 1374, 1740, $random[8]);

imagefilledellipse($image, 400, 1844, 600, 600, $random[9]);
imagefilledrectangle($image, 101, 1870, 700, 2174, $random[10]);
$values = array(
    101, 2174,
    301, 2174,
    301, 2274);
imagefilledpolygon($image, $values, 3, $random[11]);
$values = array(
    301, 2174,
    401, 2174,
    301, 2274);
imagefilledpolygon($image, $values, 3, $random[11]);
$values = array(
    401, 2174,
    501, 2174,
    501, 2274);
imagefilledpolygon($image, $values, 3, $random[12]);
$values = array(
    501, 2174,
    700, 2174,
    501, 2274);
imagefilledpolygon($image, $values, 3, $random[12]);
imagefilledrectangle($image, 101, 2104, 700, 2174, $random[13]);
imagefilledrectangle($image, 101, 2034, 700, 2104, $random[14]);
imagefilledrectangle($image, 101, 1964, 700, 2034, $random[15]);
imagefilledrectangle($image, 101, 1894, 700, 1964, $random[16]);
imagefilledrectangle($image, 101, 1824, 700, 1894, $random[17]);



header("Content-type: image/png");
imagepng($image);
imagepng($image, "Wiosna.png");
imagedestroy($image);
?>