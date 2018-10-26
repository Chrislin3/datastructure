<?php
header("content-type:text/html;charset=utf-8");
include 'match_string.class.php';
$string = "xiaolinzifendoudediandi";
$linear_string = new Linear_string($string);

$string1 = new Linear_string("fendou");
echo "字符串fendou在xiaolinzifendoudediandi中第4个索引起第一次出现的位置：";
echo "</br>";
echo "</br>";

echo "朴素模式匹配算法结果：";
echo "</br>";
$index = $linear_string->index($string1,4);
echo $index;
echo "</br>";
echo "</br>";

echo "KMP模式匹配算法结果：";
echo "</br>";
$index = $linear_string->index_KMP($string1,4);
echo $index;
echo "</br>";
echo "</br>";

echo "改进KMP模式匹配算法结果：";
echo "</br>";
$index = $linear_string->index_KMPval($string1,4);
echo $index;
?>