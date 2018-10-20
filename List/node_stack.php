<?php
header("content-type:text/html;charset=utf-8");
include 'node_stack.class.php';
$node_stack = new Node_stack();
echo "进栈操作：";
echo "</br>";
$node_stack->push(1);
$node_stack->push(2);
$node_stack->push(3);
$node_stack->push(4);
$node_stack->push(5);
print_r($node_stack);
echo "</br>";
echo "</br>";
echo "出栈操作：";
echo "</br>";
$value = $node_stack->pop();
echo $value;
echo "</br>";
print_r($node_stack);
echo "</br>";
echo "直至栈空：";
echo "</br>";
$node_stack->pop();
$node_stack->pop();
$node_stack->pop();
$node_stack->pop();
$node_stack->pop();
echo "</br>";
print_r($node_stack);

?>