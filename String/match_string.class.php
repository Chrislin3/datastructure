<?php
header("content-type:text/html;charset=utf-8");
class Linear_string{
    /**
     * 串模式匹配算法
     *
     *包括
     * 1.串的初始化 __contruct()
     * 2.朴素的模式匹配算法 index()
     * 3.KMP模式匹配算法
     * 4.改进的KMP模式匹配算法
     */

    private $string;
    private $length;
    //构造函数
    public function __construct($string)
    {
        $this->length =strlen($string);
        $this->string = $string;

    }
    //朴素的模式匹配算法
    public function index($string,$pos){
        if($pos<0 || $pos >$this->length){
            echo "索引长度错误";
            return false;
        }

        $i = $pos-1;//i用来表示主串当前位置下标，从pos位置开始
        $j = 0;    //j用来表示子串当前位置下标，从子串头位置开始

        while($i< $this->length && $j< $string->length){
            if($this->string[$i] == $string->string[$j]){
                $i++;
                $j++;
            }else{
                $i = $i-$j+2;  //i退回上次匹配首位的下一位
                $j = 0;
            }

        }

        if($j >= $string->length){//若子串索引大于或者等于子串的长度，证明匹配成功，用i减去子串的长度就是主串与子串匹配的起始位置
            return $i-$string->length;
        }else{
            return 0;
        }
    }

    //KMP模式匹配算法
    public function get_next($string,$next = array()){
        $i = 0;
        $j = 0;
        $next[1] = 0;
        while ($i<$string->length){
            if($j == 0 || $string->string[$i] == $string->string[$j]){//$this->string[$i]代表后缀的单个字符，$this->string[$j]代表前缀的单个字符
                $i++;
                $j++;
                $next[$i] = $j;
            }else{
                $j = $next[$j];
            }
        }
    }

    public function index_KMP($string,$pos){
        $i = $pos-1;
        $j = 0;
        $next = array();
        $this->get_next($string,$next);
        while($i< $this->length && $j< $string->length){
            if($j == 0 || $this->string[$i] == $string->string[$j]){
                $i++;
                $j++;
            }else{

                $j = $next[$j];
            }

        }
        if($j>=$string->length){
            return $i - $string->length;
        }else{
            return 0;
        }
    }

    //改进的KMP模式匹配算法
    public function get_nextval($string,$next_val = array()){
        $i = 0;
        $j = 0;
        $next_val[1] = 0;
        while ($i<$string->length){
            if($j==0 || $string->string[$i] == $string->string[$j]){//$this->string[$i]代表后缀的单个字符，$this->string[$j]代表前缀的单个字符
                $i++;
                $j++;
                if($this->string[$i]!=$string->string[$j]){//若当前字符与前缀字符不同，则当前的j为$next_val[$i]在i的位置，即next[$i]
                    $next_val[$i] = $j;
                }else{
                    $next_val[$i] = $next_val[$j];//如果与前缀字符相同，则将前缀字符的$next_val赋值给$next_val在i的位置
                }

            }else{
                $j = $next_val[$j];
            }

        }
    }
    public function index_KMPval($string,$pos){
        $i = $pos-1;
        $j = 0;
        $next_val = array();
        $this->get_nextval($string,$next_val);
        while ($i< $this->length && $j< $string->length){
            if ($j == 0 || $this->string[$i] == $string->string[$j]){
                $i++;
                $j++;

            }else{

                $j = $next_val[$j];
            }
        }

        if($j>=$string->length){

            return $i - $string->length;
        }else{
            return 0;
        }
    }


}
?>