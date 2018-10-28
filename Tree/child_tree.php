<?php
header("content-type:text/html;charset=utf-8");
include 'child_tree.class.php';
$nodes = array('A','B','C','D','E','F','G','H','I','J');
$child_tree = new Child_tree($nodes);
$child_tree->setChild(0,array(1,2));
$child_tree->setChild(1,array(3));
$child_tree->setChild(2,array(4,5));
$child_tree->setChild(3,array(6,7,8));
print_r($child_tree);

?>