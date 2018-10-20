<?php
header("content-type:text/html;charset=utf-8");
class List_node{
    /**
     * 单链表基本操作
     *
     *包括
     *1.单链表的初始化 __contruct()
     *2.单链表的创建——头插法
     *3.单链表的创建——尾插法
     *4.单链表的整表删除
     *5.获取单链表中指定位置的数据元素
     *6.在指定位置之前插入一个数据元素
     *7.删除指定位置的数据元素
     */
    private $data;
    private $next;

    public function __construct()
    {
        $this->data = null;
        $this->next = null;
    }
    //具有$num个数据元素的单链表的创建——头插法
    public function createListHead($num){

        for($i=0;$i<$num;$i++){
            $list_node = new List_node();//生成新的结点
            $list_node->data = rand(0,100);
            $list_node->next = $this->next;
            $this->next = $list_node;//插入到表头
        }

    }
//具有$num个数据元素的单链表的创建——尾插法
    public function createListTail($num){
        $tail=$this;
        for($i=0;$i<$num;$i++){
            $list_node = new List_node();
            $list_node->data = rand(0,100);
            $tail->next = $list_node;//表尾终端结点的指针指向新的结点
            $tail = $list_node;

        }
        $list_node->next = null;
    }
//单链表的整表删除
    public function clearList(){
        $p = $this->next;//p指向第一个结点
        while ($p){      //没有到表尾
            $node=$p->next;
            unset($p);
            $p = $node;
        }
        $this->next=null;
    }
//返回单链表中指定位置的数据元素
/*
 * 算法思路：
 * 1.声明指针p指向链表第一个结点，初始化计数器count从1开始
 * 2.当j<i时，就遍历链表，让p的指针向后移动，不断指向下一个结点，count累加1
 * 3.若到链表末尾p为空，则说明第pos结点不存在
 * 4.否则查找成功，返回结点p的数据
 */
    public function getElem($pos){
        $count=1;//计数器
        $p=$this->next;//p指向链表的第一个指针
        while($p && $count<$pos){//p不为空且计数器还没有达到pos时，循环继续
            $count++;
            $p=$p->next;//让p指向下一个结点
        }
        if(!$p || $pos<$count){
            return 'ERROR';
        }
        return $p->data;//取第pos个结点的数据
    }
    //在指定位置之前插入一个数据元素
    /*
     * 1.声明指针p指向链表头结点，初始化count从1开始
     * 2.当count<pos时，就遍历链表，让p的指针向后移动，不断指向下一个结点，同时count累加1
     * 3.若到链表末尾p为空，则说明第pos个结点不存在
     * 4.否则查找成功，生成一个空结点node
     * 5.单链表插入语句 $node->next = $p->next;$p->next = $node;
     */
    public function listInsert($pos,$elem){
        $p=$this;
        $count=1;
        while($p && $count<$pos){
            $count++;
            $p=$p->next;
        }
        if(!$p || $count>$pos){
            return 'ERROR';
        }
        $node = new List_node();
        $node->data = $elem;
        $node->next = $p->next;
        $p->next = $node;
        return 'OK';
    }
    // 删除指定位置的数据元素
    /*
     * 1.声明指针p指向链表头结点，初始化count从1开始
     * 2.当count<pos时，就遍历链表，让p的指针向后移动，不断指向下一个结点，同时count累加1
     * 3.若到链表末尾p为空，则说明第pos个结点不存在
     * 4.否则查找成功，将欲删除的结点$p->next赋值给q
     * 5.单链表的删除语句$p->next = $q->next;
     * 6.释放q结点
     */
    public function listDelete($pos){
        $p = $this;
        $count = 1;
        while ($p && $count< $pos){
            $count++;
            $p=$p->next;
        }
        if(!$p || $count>$pos){
            return 'ERROR';
        }
        $q = $p->next;
        $p->next = $q->next;
        unset($q);
        return 'OK';
    }
}
?>