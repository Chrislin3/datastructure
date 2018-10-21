<?php
header("content-type:text/html;charset=utf-8");
/**
 * 栈的链式存储结构的基本操作
 *
 *包括
 * 1.初始化 __contruct()
 * 2.进栈操作 push()
 * 3.出栈操作 pop()
 * 4.销毁栈 destroyStack()
 * 5.清空栈 clearStack()
 * 6.遍历栈 stackTraverse()
 */
class Node{
    public $data;
    public $next;
    public function __construct($data=null)
    {
        $this->data = $data;
        $this->next = null;
    }
}
class Node_stack{
    private $top;
    private $count;
    //初始化栈
    public function __construct(){
        $this->top=null;
        $this->count=0;
    }
    //进栈操作push()
    public function push($elem){
        $node = new Node();
        $node->data = $elem;
        $node->next = $this->top;
        $this->top = $node;
        $this->count++;
    }
    //出栈操作pop()
    public function pop(){
        if($this->top == null){
            echo "栈已空";
            return false;
        }else{
            $value = $this->top->data;
            unset($this->top->data);
            $this->top = $this->top->next;
            $this->count--;
            return $value;
        }
    }
    //销毁栈
    public function destroyStack(){
        $p=$this->top;
        while ($p){
            $p=$this->top->next;
            unset($this->top);
            $this->top=$p;
        }
        $this->count=0;
    }
    //清空栈
    public function clearStack(){
        $p=$this->top;
        while ($p){
            $p->next = null;
        }
        $this->top=null;
        $this->count=0;
    }
    //遍历栈
    public function stackTraverse(){
        if($this->top ==null){
            echo "栈已空";
            return false;
        }else{
            $array = array();
            $p=$this->top;
            while ($p){
                array_push($array,$p->data);
                $p = $p->next;
            }
            return $array;
        }
    }
}
?>