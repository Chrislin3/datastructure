<?php
header("content-type:text/html;charset=utf-8");
include 'double_stack.class.php';
$double_stack = new Double_stack();
echo "进栈操作：";
echo "</br>";
$double_stack->push(1,1);
$double_stack->push(2,2);
$double_stack->push(3,2);
$double_stack->push(4,1);
$double_stack->push(5,2);
$double_stack->push(6,2);
$double_stack->push(7,1);
$double_stack->push(8,2);
$double_stack->push(9,2);
$double_stack->push(10,1);
print_r($double_stack);
echo "</br>";
echo "</br>";
echo "进栈操作,直至栈满：";
echo "</br>";
$double_stack->push(666,1);
echo "</br>";
$double_stack->push(888,2);
echo "</br>";
echo "</br>";
echo "出栈操作：";
echo "</br>";
echo "(1)、栈1出栈，top1-1，同时栈1的栈顶元素10被销毁";
echo "</br>";
$double_stack->pop(1);
print_r($double_stack);
echo "</br>";
echo "直至栈1空：";
echo "</br>";
$double_stack->pop(1);
$double_stack->pop(1);
$double_stack->pop(1);
$double_stack->pop(1);
echo "</br>";
echo "(2)、栈2出栈，top2+1，同时栈2的栈顶元素9被销毁";
echo "</br>";
$double_stack->pop(2);
print_r($double_stack);
echo "</br>";
echo "直至栈2空：";
echo "</br>";
$double_stack->pop(2);
$double_stack->pop(2);
$double_stack->pop(2);
$double_stack->pop(2);
$double_stack->pop(2);
$double_stack->pop(2);

