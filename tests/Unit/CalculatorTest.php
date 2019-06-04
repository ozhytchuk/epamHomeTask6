<?php
namespace tests\Unit;

use \PHPUnit\Framework\TestCase;
use src\Calculator;
use src\Commands\CommandInterface;

class CalculatorTest extends TestCase
{
    /**
     * @var Calculator
     */
    private $calc;

    public function setUp()
    {
        $this->calc = new Calculator();
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    public function getCommandMock() {
        return $this->getMockBuilder(CommandInterface::class)
            ->getMock();
    }

    public function testInitialCalcState()
    {
        $this->calc->init(1);

        $this->assertAttributeEquals(1, 'value', $this->calc);
    }

    /**
     * @covers \src\Calculator::addCommand()
     */
    public function testAddCommandNegative()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->calc->addCommand(null, $this->getCommandMock()); // DUMMY
    }

    /**
     * @covers \src\Calculator::addCommand()
     */
    public function testAddCommandPositive()
    {
        $this->calc->addCommand('name', $this->getCommandMock());

        $this->assertTrue($this->calc->hasCommand('name'));
    }

    /**
     * TODO: Check whether intents = []
     * TODO: Check whether value = expected
     *
     * @see PHPUnit :: assertAttributeEquals
     *
     * @covers \src\Calculator::init()
     */
    public function testInit()
    {

    }

    /**
     * @covers \src\Calculator::compute()
     */
    public function testComputeNegative()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->calc->init(42)
            ->compute('does not exist', 42);
    }

    /**
     * TODO: Check whether command and arguments have appeared in the intents array
     *
     * @see PHPUnit :: assertAttributeEquals
     *
     * @covers \src\Calculator::compute()
     */
    public function testComputePositive()
    {

    }

    /**
     * @covers \src\Calculator::getResult()
     */
    public function testGetResultPositive()
    {
        $command = $this->getCommandMock();
        $command->expects($this->once())
            ->method('execute');

        $command = $this->getMockBuilder(CommandInterface::class)
            ->getMock();


        $this->calc->addCommand('+', $command);
        $this->calc->init(42)
            ->compute('+', 42)
            ->getResult();
    }

    /**
     * TODO: Check that command was executed with exception
     *
     * Mock command`s execute method so that it returns exception and check whether it was thrown
     *
     * @see https://phpunit.readthedocs.io/en/7.1/test-doubles.html
     *
     * @covers \src\Calculator::getResult()
     */
    public function testGetResultNegative()
    {

    }

    public function tearDown()
    {
        unset($this->calc);
    }
}
