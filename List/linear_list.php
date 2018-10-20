<?php
header("content-type:text/html;charset=utf-8");
include 'linear_list.class.php';
$array = array(1,2,3,4,5,6,7,8,9,10);
$size = 10;
$linear_list = new Linner_list($array,$size);
//获取元素
for ($i=1;$i<=$size;$i++){
    $num = $linear_list->getElement($i);
    echo $num;
    echo "</br>";
}
//在第二个位置插入元素66
$linear_list->listInsert(2,66);
print_r($linear_list);
echo "</br>";
//删除第二个元素66
$linear_list->listDelete(2);
print_r($linear_list);

?>