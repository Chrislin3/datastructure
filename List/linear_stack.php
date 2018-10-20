<?php
header("content-type:text/html;charset=utf-8");
include 'linear_stack.class.php';
$data = array(1,2,3,4,5,6,7,8,9,10);
$stack = new Linear_stack($data);

echo "进栈元素666：";
echo "</br>";
$stack->push(666);
print_r($stack);
echo "</br>";
echo "</br>";

echo "栈顶元素出栈：";
echo "</br>";
$value = $stack->pop();
echo $value;
echo "</br>";

print_r($stack);
echo "</br>";
echo "</br>";

echo "遍历栈：";
echo "</br>";
$array = $stack->traverse();
print_r($array);
echo "</br>";
echo "</br>";

echo "获取栈顶元素：";
echo "</br>";
$top = $stack->getTop();
echo $top;
echo "</br>";
echo "</br>";

echo "判断栈是否为空：";
echo "</br>";
$stack->stackEmpty();
echo "</br>";
echo "</br>";

echo "清空栈：";
echo "</br>";
$stack->clearStack();
print_r($stack);
echo "</br>";
echo "</br>";

echo "清空栈后，再次判断栈是否为空：";
echo "</br>";
$stack->stackEmpty();
?>