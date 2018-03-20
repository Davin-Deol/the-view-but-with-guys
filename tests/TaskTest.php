<?php
 class TaskTest extends Tasks
  {
    private $CI;

    public function setUp()
    {
      // Load CI instance normally
      $this->CI = &get_instance();
    }

    public function testName()
    {
        $t = new Tasks();
        $t->test = "Person Name";
        echo $t->test;
    }
  }