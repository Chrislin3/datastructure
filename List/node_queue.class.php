<?php
header("content-type:text/html;charset=utf-8");
class Node{
    /**
     * 队列的链式存储结构的基本操作
     *
     *包括
     * 1.初始化 __contruct()
     * 2.入队操作 insertQueue($elem)
     * 3.出对操作 deleteQueue()
     * 4.遍历队列 stackTraverse()
     */
    public $data;
    public $next;
    public function __construct()
    {
        $this->data = null;
        $this->next = null;
    }
}
class Node_queue{
    private $front;
    private $rear;
    private static $length;
    //初始化队列，这一步很重要！！！此时front和rear都指向头结点，见图1
    public function __construct()
    {
        $node = new Node();
        $this->front = $node;
        $this->rear = $node;
        self::$length = 0;
    }
    //队列插入元素，入队操作
    public function insertQueue($elem){
        $node = new Node();
        if(empty($node)){
            echo "存储分配失败";
        }
        $node->data = $elem;
        $node->next = null;
        $this->rear->next = $node; //把拥有元素elem的新结点node赋值给原来队尾结点的后继，见图2中的①
        $this->rear = $node;       //把当前的node设置为队尾结点，rear指向node，见图2中的②
        self::$length ++;         //队列长度加一

    }
    //队列删除元素，出队操作
    public function deleteQueue(){
        if($this->front == $this->rear){
            echo "队列已空";
            return false;
        }
        $p = $this->front->next;        //将欲删除的头结点暂存给p，见图3中的①
        $value = $p->data;               //将欲删除的队头结点数据赋值给value
        $this->front->next = $p->next; //将原队头结点后继p->next赋值给头结点后继，见图3中的②

        self::$length --;
        if ($this->rear == $p){
            $this->rear = $this->front;//若队头是队尾，则删除后将rear指向头结点，见图3中的③
        }
        unset($p);
        return $value;
    }
    //遍历队列,此处展示两种方式
    public function queueTraverse1(){
        $p = $this->front;
        $array = array();
        //p指针一直向队列的尾部移动，直至指向尾部结点停止
        while ($p->next){
            $p = $p->next;
            array_push($array,$p->data);
        }
        return $array;
    }
    public function queueTraverse2(){
        $p = $this->front;
        $array = array();
        //根据队列的长度进行遍历
        for($i=0;$i<self::$length;$i++){
            $p = $p->next;
            array_push($array,$p->data);
        }

        return $array;
    }
}
?>