<?php
session_start();
$width = 170;
$height = 60;
$image = imagecreatetruecolor($width, $height);


$white = imagecolorallocate($image, 255, 255, 255);
$znaki = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$ile = strlen($znaki);
$odstep = 15;
for ($i = 0; $i < 8; $i++)
{
    $a = rand(0, $ile - 1);
    $font_size = rand(10, 15);
    $angle = rand(0, 80);
    $h = rand(15, 50);
    $text = $znaki[$a];
    imagettftext($image, $font_size, $angle, $odstep, $h, $white, "Arial.ttf", $text);
    $tablica[$i] = $text;
    $odstep += 20;
}
$tekst = implode($tablica);
$_SESSION["tekst"] = $tekst;


header("Content-type: image/png");
imagepng($image);
imagepng($image, "Captcha.png");
imagedestroy($image);
?>