<?php

//待优化为操作原数组 空间复杂度 O(1)的方式
function mergeSort($arr)
{
    $count = count($arr);

    $midIndex = (int)(($count-1 / 2) ) ;
    if ($count==1) {
        return $arr;
    }
    $l = mergeSort(array_slice($arr,0,$midIndex));
    $r = mergeSort(array_slice($arr, $midIndex));
    return merge($l,$r);
}

function merge($l,$r)
{
    $arr = [];
    $lp = 0;
    $rp = 0;

    $lpMax = count($l)-1;
    $rpMax = count($r)-1;

    while ($lp<=$lpMax && $rp<=$rpMax) {
        if ($l[$lp] < $r[$rp]) {
            $arr[] = $l[$lp];
            $lp++;
        }
        if ($r[$rp] < $l[$lp]) {
            $arr[] = $r[$rp];
            $rp++;
        }
    }

    if ($lp <= $lpMax) {
        $arr = array_merge($arr,array_slice($l,$lp));
    }
    if ($rp <= $rpMax) {
        $arr = array_merge($arr,array_slice($r,$rp));
    }
    return $arr;
}
