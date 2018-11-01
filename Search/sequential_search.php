<?php
header("content-type:text/html;charset=utf-8");
include "sequential_search.class.php";

$a = array("小","林","子","奋","斗","的","点","滴");
$sequential_search = new Sequential_search($a);
echo "初始化数组：";
echo "</br>";
print_r($sequential_search);
echo "</br>";
echo "</br>";

$key = $sequential_search->search_none("林");
echo "普通顺序查找“林”在数组中的位置：";
echo "</br>";
echo $key;
echo "</br>";
echo "</br>";

$key = $sequential_search->search("林");
echo "此时数组为：";
echo "</br>";
print_r($sequential_search);
echo "</br>";
echo "</br>";

echo "有哨兵顺序查找“林”在数组中的位置：";
echo "</br>";
echo $key;
?>