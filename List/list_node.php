<?php
header("content-type:text/html;charset=utf-8");
include 'list_node.class.php';
$list_node = new List_node();
$list_node->createListHead(10);
print_r($list_node);
echo ("</br>");
echo ("</br>");
$e = $list_node->getElem(2);
echo $e;
echo ("</br>");
echo ("</br>");
$list_node->listInsert(2,666);
print_r($list_node);
echo ("</br>");
echo ("</br>");
$list_node->listDelete(2);
print_r($list_node);
?>