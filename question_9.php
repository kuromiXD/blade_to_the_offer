<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-9-12
 * Time: 下午5:02
 */

include_once "Stack.php";
//使用两个栈实现一个队列
class QueueByStack
{
    public $stack1;
    public $stack2;
    public function  __construct()
    {
        $this->stack1 = new Stack();
        $this->stack2 = new Stack();
    }

    public function Enter($value)
    {
        $this->stack1->Push($value);
    }
    public function  Leave()
    {
        if ($this->stack2->IsEmpty()) {
            while (!$this->stack1->IsEmpty()) {
                $this->stack2->Push($this->stack1->ReadTop());
                $this->stack1->Pop();
            }
        }

        $this->stack2->Pop();
    }
}
$a = new QueueByStack();
$a->Enter(1);
$a->Enter(2);
$a->Enter(3);
$a->Leave();
$a->Enter(4);
$a->Leave();
print_r($a->stack1->toppoint);
print_r($a->stack2->toppoint);