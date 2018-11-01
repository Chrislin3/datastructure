<?php
header("content-type:text/html;charset=utf-8");
/**
 * 顺序查找操作
 *
 *包括
 * 1.初始化 __contruct()
 * 2.普通顺序查找 search_none()
 * 3.有哨兵顺序查找 search()

 */
class Sequential_search{
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

    //普通顺序查找
    public function search_none($key){
        for ($i = 1;$i<=$this->length;$i++){
            if($this->a[$i]==$key){
                return $i;
            }
        }
        return 0;
    }

    //有哨兵顺序查找
    public function search($key){
        $this->a[0] =$key;     //设置a[0]为关键字，我们称之为哨兵
        $i = $this->length;   //循环数组从尾部开始
        while ($this->a[$i] !=$key){
            $i--;
        }
        return $i;          //返回0则说明查找失败
    }
}
?>