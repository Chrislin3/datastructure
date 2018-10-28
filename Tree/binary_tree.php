<?php
header("content-type:text/html;charset=utf-8");
include 'binary_tree.class.php';

$data = array('A', 'B', '#', 'D', '#', '#', 'C','E', '#', '#','F', '#', '#');

echo "初始化二叉树：";
echo "</br>";
$binary_tree = new Binary_tree($data);
print_r($binary_tree);
echo "</br>";
echo "</br>";

echo "前序创建一个二叉树：";
echo "</br>";
$tree = $binary_tree->createBinaryTree();
print_r($tree);
echo "</br>";
echo "</br>";

echo "二叉树的前序遍历：";
echo "</br>";
$preOrder = $binary_tree->preOrderTraverse($tree,$temp1);
print_r($preOrder);
echo "</br>";
echo "</br>";

echo "二叉树的中序遍历：";
echo "</br>";
$inOrder=$binary_tree->inOrderTraverse($tree,$temp2);
print_r($inOrder);
echo "</br>";
echo "</br>";

echo "二叉树的后序遍历：";
echo "</br>";
$postOrder=$binary_tree->postOrderTraverse($tree,$temp3);
print_r($postOrder);
?>