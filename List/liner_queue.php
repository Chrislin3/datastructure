<?php
header("content-type:text/html;charset=utf-8");
include 'linear_queue.class.php';
$linear_queue = new Linear_queue();

echo "队列插入元素1,2,3,4,5：";
echo "</br>";
$linear_queue ->insertQueue(1);
$linear_queue ->insertQueue(2);
$linear_queue ->insertQueue(3);
$linear_queue ->insertQueue(4);
$linear_queue ->insertQueue(5);
print_r($linear_queue);
echo "</br>";
echo "</br>";
echo "队列删除元素：";
echo "</br>";
$valve = $linear_queue ->deleteQueue();
echo "第一次删除元素是: ".$valve;
echo "</br>";
$valve = $linear_queue ->deleteQueue();
echo "第二次删除元素是: ".$valve;
echo "</br>";
print_r($linear_queue);
echo "</br>";
echo "</br>";
$length = $linear_queue ->queueLength();
echo "此时队列的长度为: ".$length;

?>