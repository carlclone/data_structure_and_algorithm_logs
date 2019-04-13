<?php

//使用到了广度优先搜索和队列
function reverse(Node $root)
{
    $queue = [];
    if ($root == null) {
        return null;
    }
    array_push($queue, $root);
    while (!empty($queue)) {
        $node = array_shift($queue);
        swap($node->left, $node->right);
        if ($node->left) {
            array_push($queue, $node->left);
        }
        if ($node->right) {
            array_push($queue, $node->right);
        }
    }
    return $root;
}

//递归法,树天然的递归结构
function reverse_recursive(Node $root)
{
    if ($root == null) {
        return null;
    }

    reverse($root->left);
    reverse($root->right);
    swap($root->left, $root->right);
    return $root;
}