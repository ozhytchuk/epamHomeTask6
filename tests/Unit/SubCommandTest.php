<?php

namespace tests\Unit;

use \PHPUnit\Framework\TestCase;
use src\Commands\SubCommand;

class SubCommandTest extends TestCase
{
    /**
     * @var SumCommand
     */
    private $command;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->command = new SubCommand();
    }

    /**
     * @return array
     */
    public function commandPositiveDataProvider()
    {
        return [
            [3, 1, 2],
            [0.6, 0.1, 0.5],
            [-1, -2, 1],
            ['5', 1, 4],
        ];
    }

    /**
     * @dataProvider commandPositiveDataProvider
     */
    public function testCommandPositive($a, $b, $expected)
    {
        $result = $this->command->execute($a, $b);

        $this->assertEquals($expected, $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCommandNegative()
    {
        $this->command->execute(1);
    }

    /**
     * @inheritdoc
     */
    public function tearDown()
    {
        unset($this->command);
    }
}