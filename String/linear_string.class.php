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
    //生成一个值等于字符串常量chars的串
    public function strAssign($chars=null){

        if(strlen($chars) > $this->length){
            echo "字符串长度过长";
            return false;
        }
        $this->string = substr($this->string,0,strlen($chars));//将初始字符串截断的和chars一样长
        for($i = 0;$i<strlen($chars);$i++){
            $this->length = strlen($chars);
            $this->string[$i] = $chars[$i] ;
        }

    }
    //返回串的元素个数，即串的长度
    public function strLength(){
        return $this->length;
    }

    //返回串的自第pos个字符起长度为len的子串
    public function subString($pos,$len){
        $sub = '';
        if($pos<0 || $pos>$this->length || $len<0 || $pos+$len>$this->length){
            echo "索引长度过长";
            return false;
        }else{
            for($i=$pos,$j=0;$i<$pos+$len;$i++,$j++){
                $sub[$j] = $this->string[$i];
            }
            $sub = implode("",$sub);
            return $sub;
        }
    }

    //将string1和string2连接成一个新串
    public function concat($string1,$string2){
        $totallength = $string1->length+$string2->length;
        if( $totallength<= $this->length){
            $this->string = substr($this->string,0,$totallength);
            $this->length = $totallength;
            for ($i = 0;$i<$string1->length;$i++){
                $this->string[$i] = $string1->string[$i];
            }
            for($i=0;$i<$string2->length;$i++){
                $this->string[$i+$string1->length] = $string2->string[$i];
            }
        }
    }

    //比较两个串的大小，若string1>string2，则返回值>0；若string1=string2，则返回值=0；若string1<string2，则返回值<0
    public function strCompare($string1,$string2){
        for($i=0;$i<$string1->length && $i<$string2->length;$i++){ //在两个串长度相同的部分内进行比较，若两串不相等则进行相减并退出循环，若两串则退出循环
            if($string1->string[$i]!=$string2->string[$i]){
                return (ord($string2->string[$i]) - ord($string1->string[$i]));
                break;
            }
        }
        return $string2->length - $string1->length;//退出循环证明两串长度相等部分的内容是一样的，而此时若长度不等，再进行相减，得出结果

    }

    //在串的第pos个字符起长度为len的子串
    public function strInsert($pos,$string){
        if($pos<0 || $pos>$this->length){
            echo "索引长度错误";
            return false;
        }

        $this->length += $string->length;
        for($i = $this->length;$i>=$pos;$i--){
            $this->string[$i+$string->length]=$this->string[$i];
        }
        for($i=$pos;$i<$pos+$string->length;$i++){
            $this->string[$i] = $string->string[$i-$pos];
        }

    }

    //从串的第pos个字符之前删除长度为len的子串
    public function strDelete($pos,$len){
        if($pos<0 || $pos>$this->length || $pos+$len>$this->length){
            echo "索引长度错误";
            return false;
        }

        for($i=$pos+$len;$i<$this->length;$i++){
            $this->string[$i-$len] = $this->string[$i];

        }
        $this->length -= $len;
        $this->string = substr($this->string,0,$this->length);
    }

    //若主串中第pos个字符之后存在与string相等的子串，则返回串string在主串中第一次出现的位置
    public function index($pos,$string){
        if($pos<0 || $pos>$this->length){
            echo "索引长度错误";
            return false;
        }

        $length = $this->length;
        $length_sub = $string->length;
        $i = $pos;
        while($i <$length-$length_sub+1){

            $sub = $this->subString($i,$length_sub);
            $sub = new Linear_string($sub);

            if($this->strCompare($sub,$string) != 0){

                ++$i;
            }else
                return $i;
        }
        return 0;
    }



}
?>