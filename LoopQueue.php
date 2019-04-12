<?php

/*问题:
 * 1.取余操作在这里的作用是什么 ?  如果自己实现的话 , 就是判断超出数组边界的时候,tail需要跳到数组第一个    if tail+1=length then tail=0  ,就是往右移,超出就移到第一位
 * 2.变量的定义是否都明确了 ? 如下!
 * 3.为何要浪费掉一个空间 ? 用于区分空(front==tail)和满(tail往右移一位==front)的情况,如果不浪费的话 满的时候front也等于tail, 定义被打破了
 * 
 * 扩展:
 * 1.取余的其他实际应用,本质是什么? 哈希函数,值域映射........
 * https://www.zhihu.com/question/24706016  
 * https://www.zhihu.com/question/30526656
 * 
*/

class LoopQueue implements Queue
{
    private $data; //队列数组

    private $front; //队列头部,指向队列第一个元素
    private $tail; //队列尾部,指向队列最后一个元素的后一个空位置

    private $size; //当前队列长度
    private $capacity; //队列总容纳数量

    public function __construct($capacity)
    {
        $this->data = new SplFixedArray($capacity + 1); //额外增加一个浪费掉的大小
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
        return ($this->tail + 1) % $this->capacity == $this->front; //定义t在f前一个下标时,为满 , 使用到取余 映射
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
        if ($this->isFull()) {
            throw new \Exception('queue is full');
        }
        $this->data[$this->tail] = $item;
        $this->tail = ($this->tail + 1) % $this->data . $this->getSize();
        $this->size++;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \Exception('queue is empty.');
        }

        $res = $this->data[$this->front];
        $this->data[$this->front] = null;
        $this->front = ($this->front + 1) % $this->capacity;
        $this->size--;
        return $res;
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            throw new \Exception('queue is empty.');
        }
        return $this->data[$this->front];
    }

}

function main()
{
    $queue = new LoopQueue(10);
    
}
