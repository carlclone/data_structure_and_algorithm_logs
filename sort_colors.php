<?php

//leetcode sort colors , 计数排序写法
//后续:三路快排改进,参考 note, 重看刘宇波老师的课程
function sortColors($arr)
{
    $zero = 0;$one = 0;$two = 0;
    $sorted = [];
    foreach ($arr as $v) {
        if ($v == 0) {
            $zero++;
        }
        if ($v == 1) {
            $one++;
        }
        if ($v == 2) {
            $two++;
        }
    }
    for ($i = 0; $i < $zero; $i++) {
        $sorted[] = 0;
    }
    for ($i = 0; $i < $one; $i++) {
        $sorted[] = 1;
    }
    for ($i = 0; $i < $one; $i++) {
        $sorted[] = 2;
    }
    return $sorted;
}
