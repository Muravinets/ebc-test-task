<?php

use app\services\TestTaskService;

class TestTaskServiceTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var TestTaskService
     */
    protected $service;

	protected function _before()
    {
        $this->service = new TestTaskService();
    }

    // tests
    public function testEmptyArray()
    {
        expect($this->service->process(1, []))->equals(-1);
    }

    public function testNoAnswer()
    {
        expect($this->service->process(1, [1]))->equals(-1);
        expect($this->service->process(1, [0, 1]))->equals(-1);
        expect($this->service->process(1, [1, 1]))->equals(-1);
        expect($this->service->process(1, [0, 0]))->equals(-1);
        expect($this->service->process(2, [1, 0]))->equals(-1);
        expect($this->service->process(5, ['5', 1]))->equals(-1);
    }

    public function testSuccess()
    {
        expect($this->service->process(5, [5, 1]))->equals(1);
        expect($this->service->process(5, [5, 5, 1]))->equals(1);
        expect($this->service->process(5, [5, 1, 1]))->equals(2);
        expect($this->service->process(5, [5, 1, 5]))->equals(1);
        expect($this->service->process(5, [1, 5, 1]))->equals(2);
        expect($this->service->process(5, [5, 5, 5, 1]))->equals(1);
        expect($this->service->process(5, [5, 5, 1, 5]))->equals(1);
        expect($this->service->process(5, [5, 1, 5, 1]))->equals(2);
        expect($this->service->process(5, [1, 5, 5, 1]))->equals(2);
        expect($this->service->process(5, [5, 5, 5, 1, 1]))->equals(2);
        expect($this->service->process(5, [5, 5, 1, 1, 1]))->equals(3);
        expect($this->service->process(5, [1, 5, 5, 1, 5]))->equals(2);
        expect($this->service->process(5, [1, 1, 1, 5, 5, 1]))->equals(4);
        expect($this->service->process(5, [5, 5, 1, 1, 1, 1, 5]))->equals(4);
    }
}
