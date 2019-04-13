<?php

class Node
{
    public $data;
    public $left;
    public $right;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class BST {
    public $root;

    public function __construct(Node $root)
    {
        $this->root = $root;
    }

    public function add($data)
    {
        if ($this->root == null) {
            $this->root = new Node($data);
            return true;
        }
        $node = $this->root;

        while ($node) {
            /*这里遇到了很大的问题
            if else语句 尽量写成两个分支的 , 减少在同一个if判断多个条件
            小数据量(1个也行)模拟一遍循环 , 防止写错无限循环
            */
            if ($data < $node->data ) {
                if ($node->left == null) {
                    $node->left = new Node($data);
                    break;
                } else {
                    $node = $node->left;
                }
            }

            if ($data > $node->data ) {
                if ($node->right == null) {
                    $node->right = new Node($data);
                    break;
                } else {
                    $node = $node->right;
                }
            }

        }
        return true;
    }
}