<?php

function swap(&$l, &$r)
{
    $tmp=$l;
    $l=$r;
    $r=$tmp;
}
