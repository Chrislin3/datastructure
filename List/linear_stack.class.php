<?php
header("content-type:text/html;charset=utf-8");
/**
 * 栈的顺序存储结构的基本操作
 *
 *包括
 * 1.顺序栈的初始化 __contruct()
 * 2.销毁栈 destroyStack()
 * 3.清空栈 clearStack()
 * 4.判断栈是否为空 stackEmpty()
 * 5.获取栈顶元素 getTop()
 * 6.进栈操作 push()
 * 7.出栈操作 pop()
 * 8.遍历栈元素 traverse()
 */
class Linear_stack{
    const MAXSIZE = 20;
    private $data;
    private $top;
    //初始化
    public function __construct($data)
    {
        $this->data = $data;
        $this->top = count($data)-1;
    }
    //销毁栈
    public function destroyStack(){
        $this->top = -1;
        $this->data = null;
    }
    //清空栈
    public function clearStack(){
        $this->top = -1;
        $this->data = array();
    }
    //判断栈是否为空
    public function stackEmpty(){
        if($this->top == -1){
            echo "栈为空";
        }else{
            echo "栈非空";
        }
    }
    //获取栈顶元素
    public function getTop(){
        if($this->top!=-1){
            return $this->data[$this->top];
        }else{
            return false;
        }
    }
    //进栈操作：插入元素elem作为新的栈顶
    public function push($elem){
        if($this->top==self::MAXSIZE-1){
            echo "栈已满";
            return false;
        }else{
            $this->top++;
            $this->data[$this->top] = $elem;
        }

    }
    //出栈操作：删除栈顶元素，并用value返回
    public function pop(){
        if($this->top==-1){
            echo "栈已空";
            return false;
        }else{
            $value = $this->data[$this->top];
            unset($this->data[$this->top]);
            $this->top--;
            return $value;
        }
    }
    //遍历栈元素
    public function traverse(){
        $array = array();
        for ($i = 0;$i<=$this->top;$i++){
            array_push($array,$this->data[$i]);
        }
        return $array;
    }

}
?>