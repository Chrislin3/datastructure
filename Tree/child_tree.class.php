<?php
header("content-type:text/html;charset=utf-8");

class CNode{     //孩子结点
    public $child;
    public $next;
    public function __construct()
    {
        $this->child = null;
        $this->next = null;
    }
}

class CHead{    //表头结构
    public $data;
    public $firstchild;
    public function __construct()
    {
        $cNode = new CNode();
        $this->data = null;
        $this->firstchild = $cNode;
    }


}

class Child_tree{
    private $nodes;
    private $r;
    private $n;

    public function __construct($nodes=array())
    {
        $this->r = 0;
        $this->n = count($nodes);
        for($i = 0;$i<$this->n;$i++){
            $this->nodes[$i] = new CHead();
            $this->nodes[$i]->data = $nodes[$i];
            $this->nodes[$i]->firstchild = null;

        }
    }

    public function setChild($i,$child){
        if($i<0 || $i>=$this->n){
            echo "设置位置错误";
            return false;
        }



            for ($j=0;$j<count($child);$j++){
                $cnode = new CNode();
                if($j == 0){

                    $cnode ->child = $child[$j];
                    $cnode ->next = null;
                    $this->nodes[$i]->firstchild = $cnode;
                }else{
                    $code_next = new CNode();
                    $code_next ->child = $child[$j];
                    $code_next ->next = null;
                }


            }




    }

    public function insertChild(){

    }




}
?>