<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HorariosTrabajadoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HorariosTrabajadoresTable Test Case
 */
class HorariosTrabajadoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HorariosTrabajadoresTable
     */
    public $HorariosTrabajadores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.horarios_trabajadores',
        'app.horarios',
        'app.estados',
        'app.trabajadores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HorariosTrabajadores') ? [] : ['className' => 'App\Model\Table\HorariosTrabajadoresTable'];
        $this->HorariosTrabajadores = TableRegistry::get('HorariosTrabajadores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HorariosTrabajadores);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
