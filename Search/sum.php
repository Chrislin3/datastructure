<?php

function duplicate($numbers, &$duplication)
{
    // write code here
    //这里要特别注意~找到任意重复的一个值并赋值到duplication[0]
    //函数返回True/False
    if(count($numbers)==0){
        return false;
    }
   // echo (count($numbers));
    for($i= 0;$i<count($numbers);$i++){
        if($numbers[$i]!=$i){
            echo $i;
            if($numbers[$i] == $numbers[$numbers[$i]]){
                $duplication[0] = $numbers[$i];
                return true;
            }
            $tem = $numbers[$i];
            $numbers[$i] = $numbers[$numbers[$i]];
            $numbers[$numbers[$i]] = $tem;
         //   swap($numbers,$i,$numbers[$i]);

        }
    }
    return false;
}


$numbers = [2,3,1,0,2,5,3];
duplicate($numbers, $duplication);
print_r($duplication);