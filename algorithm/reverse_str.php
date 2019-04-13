<?php

// leetcode reverse str , 简单的双指针移动
function reverseStr($str)
{
    $len=strlen($str);
    $p1=0;
    $p2=$len-1;
    while ($p1 <= $p2) {
        $tmp = $str[$p1];
        $str[$p1] = $str[$p2];
        $str[$p2] =  $tmp;
        $p1++;
        $p2--;
    }
    return $str;
}
