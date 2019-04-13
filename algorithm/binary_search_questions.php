<?php

/* 一道二分查找的变种题 , Example:
 * [1 , 2 , 4 , 7 ]
 * 8 返回-1
 * 2 返回下标1
 * 4返回下标2
 * 0 返回-1
 * 3返回比他小的最近的那个的下标 1
*/
function binarySearch($arr, $n, $target)
{
    $l = 0;
    $r = $n - 1; //变量实际意义 [l....r]里找target , 要明确变量的定义
    //二分查找的递归终止条件应该是没有范围可以查找 , 这里我看到的一点是递归和递归终止条件的数据的类型一般不一样
    //循环不变量是什么 , l r一直在变, 但是循环不变量不会变 , //变量实际意义 [l....r]里找target , 这个就是循环不变量
    while ($l <= $r) //区间[l..r] 依然是有效的 , 是个只有一个元素的数组
    {
        $mid = (int)(($l + $r) / 2);
        if ($arr[$mid] == $target) {
            return $mid;
        }
        //返回比他小的最近的那个的下标
        if ($target > $arr[$mid] && $target < $arr[$mid+1]) {
            return $mid;
        }
        if ($target > $arr[$mid]) {
            $l = $mid + 1;
        } else {
            $r = $mid - 1;
        }
    }
    //指针偏移出界,跳出循环,找不到
    return -1;
}