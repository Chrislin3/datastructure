<?php
header("content-type:text/html;charset=utf-8");
include "node_queue.class.php";

$node_queue = new Node_queue();

echo "入队1,2,3,4,5：";
echo "</br>";
$node_queue->insertQueue(1);
$node_queue->insertQueue(2);
$node_queue->insertQueue(3);
$node_queue->insertQueue(4);
$node_queue->insertQueue(5);
print_r($node_queue);
echo "</br>";
echo "</br>";

echo "出对操作：";
echo "</br>";
$value = $node_queue->deleteQueue();
echo "出对的元素为：".$value;
echo "</br>";
print_r($node_queue);
echo "</br>";
echo "</br>";

echo "遍历队列：";
echo "</br>";
echo "第一种遍历方式：";
echo "</br>";
$array1 = $node_queue->queueTraverse1();
print_r($array1);
echo "</br>";
echo "第二种遍历方式：";
echo "</br>";
$array2 = $node_queue->queueTraverse2();
print_r($array2);
?>