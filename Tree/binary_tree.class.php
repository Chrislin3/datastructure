<?php
header("content-type:text/html;charset=utf-8");
/**
 * 二叉树的基本操作
 *
 *包括
 * 1.初始化 __contruct()
 * 2.创建二叉树 createBinaryTree()
 * 3.前序遍历 preOrderTraverse()
 * 4.中序遍历 inOrderTraverse()
 * 5.后序遍历 postOrderTraverse()
 */
class BTNode{
    public $data;
    public $lchild;
    public $rchild;
    public function __construct($data)
    {
        $this->data = $data;
        $this->lchild = null;
        $this->rchild = null;
    }


}

class Binary_tree{
    private $root;
    private $btdata;

    //初始化
    public function __construct($btdata = null)
    {
        $this->root = new BTNode(null);
        $this->btdata = $btdata;
    }

    //创建二叉树
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

    //前序遍历
    public function preOrderTraverse($tree,&$temp){
        if($tree != '#'){

            $temp[] = $tree->data;
            $this->preOrderTraverse($tree->lchild,$temp);
            $this->preOrderTraverse($tree->rchild,$temp);
        }else{
            return '';
        }

        return $temp;
    }

    //中序遍历
    public function inOrderTraverse($tree,&$temp){
        if($tree != '#'){

            $this->inOrderTraverse($tree->lchild,$temp);
            $temp[] = $tree->data;
            $this->inOrderTraverse($tree->rchild,$temp);
        }else{
            return '';
        }
   //     $temp = array_filter($temp);
        return $temp;
    }

    //后序遍历
    public function postOrderTraverse($tree,&$temp){
        if($tree !='#'){

            $this->postOrderTraverse($tree->lchild,$temp);
            $this->postOrderTraverse($tree->rchild,$temp);
            $temp[] = $tree->data;
        }else{
            return '';
        }
     //   $temp = array_filter($temp);
        return $temp;
    }

}

?>