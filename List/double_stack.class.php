<?php
header("content-type:text/html;charset=utf-8");
/**
 * 两栈共享空间的基本操作
 *
 *包括
 * 1.栈的初始化 __contruct()
 * 2.进栈操作 push()
 * 3.出栈操作 pop()

 */
class Double_stack{
    const MAXSIZE = 10;
    private $data;
    private $top1;
    private $top2;
    public function __construct()
    {
        $this->data = array();
        $this->top1 = -1;
        $this->top2 = self::MAXSIZE;
    }
    //进栈操作 push()
    public function push($elem,$stackNumber){
        if($this->top1+1 == $this->top2){
            echo "栈已满";
            return false;
        }
        if($stackNumber == 1){
            $this->top1++;
            $this->data[ $this->top1] = $elem;

        }
        if($stackNumber == 2){
            $this->top2--;
            $this->data[ $this->top2] = $elem;
        }
    }
    //出栈操作 pop()
    public function pop($stackNumber){
        if($stackNumber == 1){
            if($this->top1 == -1){
                echo "栈1已空";
                return false;
            }else{
                $value = $this->data[$this->top1];
                unset($this->data[$this->top1]);
                $this->top1--;
                return $value;
            }
        }
        if($stackNumber == 2){
            if($this->top2 == self::MAXSIZE){
                echo "栈2已空";
                return false;
            }else{
                $value = $this->data[$this->top2];
                unset($this->data[$this->top2]);
                $this->top2++;
                return $value;
            }

        }
    }
}
?>