<?php

class LoopQueue implements Queue
{
    private $data;

    private $front;
    private $tail;

    private $size; //当前队列长度
    private $capacity; //队列总容纳数量

    public function __construct($capacity)
    {
        $this->data = new SplFixedArray($capacity + 1);
        $this->front = 0;
        $this->tail = 0;
        $this->size = 0;
        $this->capacity = $this->data->getSize() - 1;
    }

    public function isEmpty()
    {
        return $this->front == $this->tail; //定义相等为空
    }

    public function isFull()
    {
        return ($this->tail + 1) % $this->capacity == $this->front;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getCapacity()
    {
        return $this->data->getSize() - 1;
    }

    public function enqueue(int $item)
    {
        $this->data[$this->tail] = $item;
        $this->tail = ($this->tail + 1) % $this->data . $this->getSize();
        $this->size++;
    }

}
