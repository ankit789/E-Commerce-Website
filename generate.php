<?php
session_start();
header('Content-type: image/jpeg');
//echo 'cool!';
$text = $_SESSION['captcha'];
//$text = '4958';

$fontsize = 40;
$imgh = 75;
$imgw = 200;

$image = imagecreate($imgw,$imgh);
imagecolorallocate($image,255,255,255);
$font_color = imagecolorallocate($image,0,0,0);

for($x=1;$x<100;$x++){
	$x1 = rand(1,200);
	$x2 = rand(1,200);
	$y1 = rand(1,200);
	$y2 = rand(1,200);
	imageline($image,$x1,$x2,$y1,$y2,$font_color);
}

imagettftext($image,$fontsize,-10,25,50,$font_color,'font2.ttf',$text);
imagejpeg($image);

?>