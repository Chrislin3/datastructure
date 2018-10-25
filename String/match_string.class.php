<?php
header("content-type:text/html;charset=utf-8");
class Linear_string{
    /**
     * 串的顺序存储结构的基本操作
     *
     *包括
     * 1.顺序串的初始化 __contruct()
     * 2.生成一个值等于字符串常量chars的串 strAssign()
     * 3.返回串的元素个数，即串的长度 strLength()
     * 4.返回串的自第pos个字符起长度为len的子串 subString()
     * 5.将string1和string2连接成一个新串 concat()
     * 6.比较两个串的大小，若string1>string2，则返回值>0；若string1=string2，则返回值=0；若string1<string2，则返回值<0 strCompare()
     * 7.在串的第pos个字符起长度为len的子串 strInsert()
     * 8.若主串中第pos个字符之后存在与string相等的子串，则返回串string在主串中第一次出现的位置 index()
     */

    private $string;
    private $length;
    //构造函数
    public function __construct($string)
    {
        $this->length =strlen($string);
        $this->string = $string;

    }

    public function index($string,$pos){
        if($pos<0 || $pos >$this->length){
            echo "索引长度错误";
            return false;
        }

        $i = $pos-1;
        $j = 0;
      //  echo $this->string[$i]
        while($i< $this->length && $j< $string->length){
            if($this->string[$i] == $string->string[$j]){
                $i++;
                $j++;
            }else{
                $i = $i-$j+2;
                $j = 0;
            }

        }

        if($j >= $string->length){
            return $i-$string->length;
        }else{
            return 0;
        }
    }



}
?>