<?php
header("content-type:text/html;charset=utf-8");
class Linear_queue{
    /**
     * 队列的顺序存储结构基本操作
     *
     *包括
     *1.顺序队列的初始化 __contruct()
     *2.获取顺序队列的长度queueLength()
     *3.在队列尾部插入元素insertQueue($elem)
     *4.在队列头部删除元素deleteQueue()
     */
    const MAXSIZE = 10;
    private $data;
    private $front;
    private $rear;
    public function __construct()
    {
        $this->data = array();
        $this->front = 0;
        $this->rear = 0;
    }
    //获取顺序队列的长度queueLength()
    public function queueLength(){
        return ($this->rear - $this->front + self::MAXSIZE)% self::MAXSIZE ;
    }
    //在队列尾部插入元素
    public function insertQueue($elem){
        if(($this->rear+1)%self::MAXSIZE == $this->front){//队列满的判断
            echo "队列已满";
            return false;
        }
        $this->data[$this->rear] = $elem;
        $this->rear = ($this->rear+1)%self::MAXSIZE;//rear指针向后移一位，若到最后则转向数组头部
    }
    //在队列头部删除元素，并返回元素值
    public function deleteQueue(){
        if($this->front == $this->rear){//队列空的判断
            echo "队列已空";
        }
        $value = $this->data[$this->front];
        unset($this->data[$this->front]);
        $this->front = ($this->front+1)%self::MAXSIZE;
        return $value;
    }

}
?>