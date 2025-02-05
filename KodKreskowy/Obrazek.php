<?php
session_start();
$textbefore = $_SESSION["text"];
$text = strtoupper($textbefore);
$width = (strlen($text) + 2) * 8 * 2;
$height = 200;
$image = imagecreatetruecolor($width, $height);

$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
imagefill($image, 0, 0, $white);


$char["0"] = "bwbWBwBwb";
$char["1"] = "BwbWbwbwB";
$char["2"] = "bwBWbwbwB";
$char["3"] = "BwBWbwbwb";
$char["4"] = "bwbWBwbwB";
$char["5"] = "BwbWBwbwb";
$char["6"] = "bwBWBwbwb";
$char["7"] = "bwbWbwBwB";
$char["8"] = "BwbWbwBwb";
$char["9"] = "bwBWbwBwb";
$char["A"] = "BwbwbWbwB";
$char["B"] = "bwBwbWbwB";
$char["C"] = "BwBwbWbwb";
$char["D"] = "bwbwBWbwB";
$char["E"] = "BwbwBWbwb";
$char["F"] = "bwBwBWbwb";
$char["G"] = "bwbwbWBwB";
$char["H"] = "BwbwbWBwb";
$char["I"] = "bwBwbWBwb";
$char["J"] = "bwbwBWBwb";
$char["K"] = "BwbwbwbWB";
$char["L"] = "bwBwbwbWB";
$char["M"] = "BwBwbwbWb";
$char["N"] = "bwbwBwbWB";
$char["O"] = "BwbwBwbWb";
$char["P"] = "bwBwBwbWb";
$char["Q"] = "bwbwbwBWB";
$char["R"] = "BwbwbwBWb";
$char["S"] = "bwBwbwBWb";
$char["T"] = "bwbwBwBWb";
$char["U"] = "BWbwbwbwB";
$char["V"] = "bWBwbwbwB";
$char["W"] = "BWBwbwbwb";
$char["X"] = "bWbwBwbwB";
$char["Y"] = "BWbwBwbwb";
$char["Z"] = "bWBwBwbwb";
$char["-"] = "bWbwbwBwB";
$char["."] = "BWbwbwBwb";
$char[" "] = "bWBwbwBwb";
$char["$"] = "bWbWbWbwb";
$char["/"] = "bWbWbwbWb";
$char["+"] = "bWbwbWbWb";
$char["%"] = "bwbWbWbWb";
$char["*"] = "bWbwBwBwb";

$x = 0;
for ($i = 0; $i < 9; $i++)
{
    if ($char["*"][$i] == "b")
    {
        imagefilledrectangle($image, $x, 0, $x + 1, 346, $black);
        $x++;
    }
    if ($char["*"][$i] == "B")
    {
        imagefilledrectangle($image, $x, 0, $x + 3, 346, $black);
        $x += 3;
    }
    if ($char["*"][$i] == "w")
    {
        imagefilledrectangle($image, $x, 0, $x + 1, 346, $white);
        $x++;
    }
    if ($char["*"][$i] == "W")
    {
        imagefilledrectangle($image, $x, 0, $x + 3, 346, $white);
        $x += 3;
    }
}
imagefilledrectangle($image, $x, 0, $x + 1, 346, $white);
$x++;
for ($i = 0; $i < strlen($text); $i++)
{
    for ($j = 0; $j < 9; $j++)
    {
        if ($char["$text[$i]"][$j] == "b")
        {
            imagefilledrectangle($image, $x, 0, $x + 1, 346, $black);
            $x++;
        }
        if ($char["$text[$i]"][$j] == "B")
        {
            imagefilledrectangle($image, $x, 0, $x + 3, 346, $black);
            $x += 3;
        }
        if ($char["$text[$i]"][$j] == "w")
        {
            imagefilledrectangle($image, $x, 0, $x + 1, 346, $white);
            $x++;
        }
        if ($char["$text[$i]"][$j] == "W")
        {
            imagefilledrectangle($image, $x, 0, $x + 3, 346, $white);
            $x += 3;
        }
    }
    imagefilledrectangle($image, $x, 0, $x + 1, 346, $white);
    $x++;
}
for ($i = 0; $i < 9; $i++)
{
    if ($char["*"][$i] == "b")
    {
        imagefilledrectangle($image, $x, 0, $x + 1, 346, $black);
        $x++;
    }
    if ($char["*"][$i] == "B")
    {
        imagefilledrectangle($image, $x, 0, $x + 3, 346, $black);
        $x += 3;
    }
    if ($char["*"][$i] == "w")
    {
        imagefilledrectangle($image, $x, 0, $x + 1, 346, $white);
        $x++;
    }
    if ($char["*"][$i] == "W")
    {
        imagefilledrectangle($image, $x, 0, $x + 3, 346, $white);
        $x += 3;
    }
}
imagefilledrectangle($image, $x, 0, $x + 1, 346, $white);
$x++;


header("Content-type: image/png");
imagepng($image);
imagepng($image, "KodKreskowy.png");
imagedestroy($image);