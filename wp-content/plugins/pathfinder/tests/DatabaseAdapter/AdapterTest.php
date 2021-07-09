<?php
declare(strict_types=1);
namespace Pathfinder\tests;
include_once ('/home/mingo/wordpress/wp-config.php');

use Pathfinder\Character\Character;
use Pathfinder\DatabaseAdapter\Adapter;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    private Adapter $testAdapter;

    public function setUp(): void
    {
        $this->testAdapter = new Adapter();
        parent::setUp();
    }

    public function testSaveAndLoadSingleValue()
    {
        $this->testAdapter->saveSingleValue('Unit_test_testValue', 'testMessage');
        $testMessage = $this->testAdapter->loadSingleValue('Unit_test_testValue');

        self::assertEquals('testMessage', $testMessage);
    }

    public function testSaveAndLoadCharacter()
    {
        $testCharacter = new Character('Unittest_Character');

        $this->testAdapter->saveCharacter($testCharacter);
        $char = $this->testAdapter->loadCharacter($testCharacter->getName());

        self::assertEquals($testCharacter->getName(), $char->getName());
    }

}
