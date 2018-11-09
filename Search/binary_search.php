<?php
header("content-type:text/html;charset=utf-8");
include 'binary_search.class.php';

echo "初始化二叉排序树：";
echo "</br>";
$b37 = new Binary_search(37,null,null);
$b35 = new Binary_search(35,null,$b37);
$b51 = new Binary_search(51,null,null);
$b47 = new Binary_search(47,$b35,$b51);
$b58 = new Binary_search(58,$b47,null);

$b73 = new Binary_search(73,null,null);
$b93 = new Binary_search(93,null,null);
$b99 = new Binary_search(99,$b93,null);
$b88 = new Binary_search(88,$b73,$b99);

$binary_tree = new Binary_search(62,$b58,$b88);

print_r($binary_tree);
echo "</br>";
echo "</br>";

echo "查找数据37：";
echo "</br>";
$key = $binary_tree->search($binary_tree,37);
echo $key;
echo "</br>";
echo "</br>";

echo "插入数据29和36：";
echo "</br>";
$binary_tree->insert($binary_tree,29);
$binary_tree->insert($binary_tree,36);
print_r($binary_tree);
echo "</br>";
echo "</br>";


echo "删除数据47：";
echo "</br>";
$binary_tree->deletebt($binary_tree,47);
print_r($binary_tree);
echo "</br>";
echo "</br>";

echo "查找刚才插入的元素36：";
echo "</br>";
$key = $binary_tree->search($binary_tree,36);
echo $key;