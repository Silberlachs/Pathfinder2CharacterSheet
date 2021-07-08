<?php
declare(strict_types=1);
namespace Pathfinder\tests;
include_once ('/home/mingo/wordpress/wp-config.php');
use Pathfinder\DatabaseAdapter\Adapter;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    private Adapter $testAdapter;

    public function setUp(): void
    {
        $this->testAdapter = new Adapter('Unit_test');
        parent::setUp();
    }

    public function testSaveAndLoadSingleValue()
    {
        $this->testAdapter->saveSingleValue('testValue', 'testMessage');
        $testMessage = $this->testAdapter->loadSingleValue('testValue');
        self::assertEquals('testMessage', $testMessage);
    }

}
