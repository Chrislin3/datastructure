<?php
header("content-type:text/html;charset=utf-8");
/**
 *有序表查找操作
 *
 *包括
 * 1.初始化 __contruct()
 * 2.二分查找 binary_search()
 * 3.插值查找 insert_search()
 * 4.斐波那契查找 fibinacci_search()

 */
class Order_search{
    private $a;
    private $length;

    //初始化
    public function __construct($a = array())
    {
        $this->length = count($a);
        for ($i = 1;$i<=$this->length;$i++){
            $this->a[$i] = $a[$i-1];
        }


    }

    //二分查找
    public function binary_search($key){

        $low = 1;                         //定义最低下标为记录首位
        $high = $this->length;           //定义最高下标为记录末位
        while ($low<=$high){
            $mid = intval(($low+$high)/2);//折半

            if($key<$this->a[$mid]){     //若查找值比中值小
                $high = $mid - 1;        //最高下标调整到中值下标小一位
            }
            elseif ($key>$this->a[$mid]){//若查找值比中值大
                $low = $mid + 1;          //最高下标调整到中值下标大一位
            }
            else
                return $mid;            //若相等则说明mid即为查找到的位置
        }
        return 0;
    }

    //插值查找

    public function insert_search($key){

        $low = 1;
        $high = $this->length;
        while ($low<=$high){
            $mid = intval($low + ($high-$low) * ($key - $this->a[$low]) / ($this->a[$high] - $this->a[$low]));

            if($key<$this->a[$mid]){
                $high = $mid - 1;
            }
            elseif ($key>$this->a[$mid]){
                $low = $mid + 1;
            }
            else
                return $mid;
        }
        return 0;
    }

    //斐波那契查找
    //为了实现斐波那契查找算法，我们首先要准备一个斐波那契数列

    function Fbi($i){
        if($i < 2){
            return ($i == 0 ? 0 : 1);
        }
        return $this->Fbi($i - 1) + $this->Fbi($i - 2);
    }

    function fibinacci_search($key){
        $low = 1;                                               //定义最低下标为记录首位
        $high = $this->length;                                 //定义最高下标为记录末位
        $k = 0;
        while ($this->length>$this->Fbi($k)-1){               //计算n位于斐波那契数列的位置
            $k++;
        }
        for ($i = $this->length;$i<$this->Fbi($k)-1;$i++){    //将不满的数值补全
            $this->a[$i] = $this->a[$this->length];
        }
        while ($low<=$high){
            $mid = $low + $this->Fbi($k-1)-1;                  //计算当前分隔的下标
            if($key<$this->a[$mid]){                          //若查找记录小于当前分隔记录
                $high = $mid - 1;                             //最高下标调整到分隔下标mid-1处
                $k = $k -1;                                   //斐波那契下标减一位
            }
            elseif ($key > $this->a[$mid]){                 //若查找记录大于当前分隔记录
                $low = $mid + 1;                             //最高下标调整到分隔下标mid+1处
                $k = $k -2;                                  //斐波那契下标减2位
            }
            else{
                if($mid <= $this->length)
                    return $mid;                           //若相等则说明mid即为查找到的位置
                else
                    return $this->length;                 //若mid>数组长度说明是补全数值，返回长度
            }
        }
        return 0 ;
    }


}
?>