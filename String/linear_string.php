<?php
header("content-type:text/html;charset=utf-8");
include 'linear_string.class.php';

$string = "xiaolinzifendoudediandi";
echo "初始化串：";
echo "</br>";
$linear_string = new Linear_string($string);
print_r($linear_string);
echo "</br>";
echo "</br>";

echo "获取2到5的子串：";
echo "</br>";
$sub = $linear_string->subString(2,5);
echo($sub);
echo "</br>";
echo "</br>";

echo "连接两个串lin和qinhua：";
echo "</br>";
$string1 = new Linear_string("lin");
$string2 = new Linear_string("qinhua");
$linear_string->concat($string1,$string2);
print_r($linear_string);
echo "</br>";
echo "</br>";

echo "比较两个串zuasha和zuashan的大小：";
echo "</br>";
$string1 = new Linear_string("zuasha");
$string2 = new Linear_string("zuashan");
$strcom = $linear_string->strCompare($string1,$string2);
echo($strcom);
echo "</br>";
echo "</br>";

echo "在索引3处插入一个子串xinru：";
echo "</br>";
$string = new Linear_string("xinru");
$linear_string->strInsert(3,$string);
print_r($linear_string);
echo "</br>";
echo "</br>";

echo "在索引3处删除一个长度为5的子串：";
echo "</br>";
$linear_string->strDelete(3,5);
print_r($linear_string);
echo "</br>";
echo "</br>";

echo "若主串中第3个字符之后存在与in相等的子串，则返回串in在主串中第一次出现的位置：";
echo "</br>";
$string = new Linear_string("in");
$index = $linear_string->index(3,$string);
echo  $index;
?>