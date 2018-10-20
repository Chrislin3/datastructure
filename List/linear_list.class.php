<?php
header("content-type:text/html;charset=utf-8");
/**
 * 顺序表基本操作
 *
 *包括
 *1.顺序表的初始化 __contruct()
 *2.清空顺序表 clearList()
 *3.根据下标返回顺序表中的某个元素 getElement()
 *4.在指定位置插入一个新的结点 listInsert()
 *5.在指定的位置删除元素list_Delete()
 */
class Linner_list{
    public $linner_list;
    public $size;
//1.顺序表的初始化 __contruct()
    function __construct($linner_list,$size)
    {
        $this->linner_list =$linner_list;
        $this->size = $size;
    }

//2.清空顺序表 clearList()
public function clearList(){
    if(isset($this->linner_list)){
        unset($this->linner_list);
    }else{
        $this->linner_list = array();
        $this->size=0;
    }
}
//3.根据下标返回顺序表中的某个元素 getElement()
//将线性表中第i个位置的元素返回，只要i的数值在下标范围内，就是把数组第i-1下标的值返回即可
    public function getElement($i){
        if($this->size==0 || $i<1 || $i>$this->size){
            echo "error";
            return false;
        }
        if(isset($this->linner_list)&&is_array($this->linner_list)){
            return $this->linner_list[$i-1];
        }
    }
//4.插入操作
//在线性表中第i个位置之前插入新的数据元素，线性表的长度+1
/*
 * (1) 如果插入位置不合理，抛出异常
 * (2)如果线性表的长度大于数组长度，则抛出异常或者动态增加容量
 * (3)从最后一个元素开始向前遍历到第i个位置，分别将他们都向后移动一个位置
 * (4)将要插入的元素填入i处
 * (5)表长加1
 */
    public function listInsert($i,$element){
        if($i<1 || $i>$this->size){
            echo "error";
            return false;
        }
 //       $this->size ++;
        if(isset($this->linner_list)&&is_array($this->linner_list)){
            if ($this->size==0){
                $this->linner_list[0]=$element;
                $this->size++;
            }else{
                for($j = $this->size-1;$j>=$i-1;$j--){
                    $this->linner_list[$j+1] = $this->linner_list[$j];
                }
                $this->linner_list[$i-1] = $element;
                $this->size ++;
            }

        }
    }
    //4.删除操作
    //删除线性表中第i个位置的元素，线性表的长度-1
    /*
     * (1) 如果删除位置不合理，抛出异常
     * (2)取出删除的元素
     * (3)从最后一个元素开始向前遍历到第i个位置，分别将他们都向后移动一个位置
     * (4)表长减1
     */
    public function listDelete($i){
        if($i<1 || $i>$this->size){
            echo "error";
            return false;
        }
        if(isset($this->linner_list)&&is_array($this->linner_list)){
            for($j = $i;$j<$this->size;$j++){
                $this->linner_list[$j-1] = $this->linner_list[$j];
            }
            $this->size --;


        }
    }
}

?>