<?php
header("content-type:text/html;charset=utf-8");
include 'match_string.class.php';
$string = "xiaolinzifendoudediandi";
$linear_string = new Linear_string($string);

$string1 = new Linear_string("fendou");
$index = $linear_string->index($string1,4);
echo $index;

?>