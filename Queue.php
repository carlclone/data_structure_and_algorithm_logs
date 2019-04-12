<?php


interface Queue {

    public function enqueue(int $item);

    public function dequeue();

    public function peek();

    public function isEmpty();

    public function getSize();
}