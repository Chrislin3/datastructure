<?php
header("content-type:text/html;charset=utf-8");
include "order_search.class.php";

$a = array(0,1,16,24,35,47,59,62,73,88,99);
echo "初始化数组：";
echo "</br>";
$order_search = new Order_search($a);
print_r($order_search);
echo "</br>";
echo "</br>";

echo "二分查找显示62在数组中的位置：";
echo "</br>";
$key = $order_search->binary_search(62);
echo $key;
echo "</br>";
echo "</br>";

echo "插值查找显示73在数组中的位置：";
echo "</br>";
$key = $order_search->insert_search(73);
echo $key;
echo "</br>";
echo "</br>";

echo "斐波那契查找显示35在数组中的位置：";
echo "</br>";
$key = $order_search->fibinacci_search(35);
echo $key;
?>