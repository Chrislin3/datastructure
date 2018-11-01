<?php
header("content-type:text/html;charset=utf-8");
class Bithnode{
    public $data;
    public $lchild;
    public $rchild;
    public $lTag;
    public $rTag;

}

class Thread_tree{
    private $root;
    private $btdata;

    //初始化
    public function __construct($btdata = null)
    {
        $this->root = new BTNode(null);
        $this->btdata = $btdata;
    }

    //创建线索二叉树
    public function createBinaryTree(&$root = null){

        $elem = array_shift($this->btdata);
        if($elem==null){
            return '';

        }elseif ($elem=='#'){//终止结点
            $root = '#';
            //    return $root;
        }else{
            $root = new BTNode($elem);//隐含条件 $root->data = $elem；

            $this->createBinaryTree($root->lchild);
            $this->createBinaryTree($root->rchild);
        }
        return $root;
    }

    public function inThreading(){

    }
}
?>