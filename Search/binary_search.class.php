<?php
header("content-type:text/html;charset=utf-8");
/**
 * 二叉排序树操作
 *
 *包括
 * 1.初始化 __contruct()
 * 2.二叉排序树查找操作 search()
 * 3.二叉排序树插入操作 insert()
 * 4.二叉排序树删除操作 deletebt()
 */
class Binary_search{
    private $data;
    private $lchild;
    private $rchild;
    //初始化
    public function __construct($data = 0, $lchild = null, $rchild = null)
    {
        $this->data = $data;
        $this->lchild = $lchild;
        $this->rchild = $rchild;
    }

    //二叉排序树查找操作
    public function search($binary_tree,$key){
        $last = null;
        if(!$binary_tree){                      //查找不成功
        //    echo '查找数据不存在';
            return false;
        }else{
            global $last;                      //将查找到的结构记录下来，方便插入操作时使用
            $last = $binary_tree;
        }
        if ($key == $binary_tree->data){      //查找成功

            return  '查找数据成功，该数据是：'.$binary_tree->data;

        }elseif ($key<$binary_tree->data){   //在左子树继续查找
            return $this->search($binary_tree->lchild,$key);
        }else{                                //在右子树继续查找
            return $this->search($binary_tree->rchild,$key);
        }
    }

    //二叉排序树插入操作
    public function insert($binary_tree,$key){

        global $last;

        if (!($this->search($binary_tree, $key))){
            $node = new Binary_search($key);        //创建一个新的结点
            if (!$last) {
                return $node;                       //插入$node作为新的根结点
            } else if ($key < $last->data) {
                $last->lchild = $node;              //插入$node作为左孩子
            } else {

                $last->rchild = $node;              //插入$node作为右孩子
            }

            return true;

        }

        return false;
    }

    //二叉排序树删除操作
    /*
     * 这里的代码与查找操作几乎相同，唯一的区别就是找到关键字后，这里执行的是delete方法，对结点进行删除
     * */
    public function deletebt($binary_tree,$key){
        if(!$binary_tree){                                              //不存在关键字等于key的数据元素
            return false;
        }
        else{
            if($key == $binary_tree->data){                             //找到了关键字等于key的元素
                return $this->delete($binary_tree);                     //执行删除操作
            }
            elseif ($key < $binary_tree->data){
                return $this->deletebt($binary_tree->lchild,$key);
            }
            else{
                return $this->deletebt($binary_tree->rchild,$key);
            }
        }
    }

    public function delete($binary_tree){

        if($binary_tree->rchild == null){                   //右子树为空，只需重接它的左子树
            $temp = $binary_tree;
            $binary_tree->data = $binary_tree->lchild;
            unset($temp);                                    //删除原结点
        }
        elseif ($binary_tree->lchild == null){             //左子树为空，只需重接它的右子树
            $temp = $binary_tree;
            $binary_tree->data = $binary_tree->rchild;
            unset($temp);
        }
        else{
            $temp = $binary_tree;

            $tem = $binary_tree->lchild;

            while ($tem->rchild){      //转左，然后向右到尽头，即为接近被删除结点的最大值
                $temp = $tem;           //临时变量temp指向替换结点的父节点
                $tem = $tem->rchild;   //临时变量tem指向替换结点

            }

            $binary_tree->data = $tem->data;    //将替换结点的值赋值给被删除结点，此时temp不是tem的父节点了，而是前驱结点
            if($temp != $binary_tree){
                $temp->rchild = $tem->lchild;  //如果temp和tem指向不同，则将$tem->lchild赋值给$temp->rchild
            }
            else{
                $temp->lchild = $tem->lchild; //如果temp和tem指向相同，则将$tem->lchild赋值给$temp->lchild
            }
            unset($tem);

        }
        return true;
    }
}