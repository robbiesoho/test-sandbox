<?php

use PHPUnit\Framework\TestCase;

require 'task.php';

class TaskTest extends TestCase
{
    public function testTask()
    {
        $task = new Task('Eat');
        $this->assertInstanceOf('Task', $task);
    }
  
}
?>