<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegistrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegistrosTable Test Case
 */
class RegistrosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegistrosTable
     */
    public $Registros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.registros',
        'app.condiciones',
        'app.estados',
        'app.trabajadores',
        'app.horarios__trabajadores',
        'app.horarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Registros') ? [] : ['className' => 'App\Model\Table\RegistrosTable'];
        $this->Registros = TableRegistry::get('Registros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Registros);

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
