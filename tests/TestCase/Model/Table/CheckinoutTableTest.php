<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CheckinoutTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CheckinoutTable Test Case
 */
class CheckinoutTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CheckinoutTable
     */
    public $Checkinout;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.checkinout',
        'app.users',
        'app.c_h_e_c_k_i_n_o_u_t'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Checkinout') ? [] : ['className' => 'App\Model\Table\CheckinoutTable'];
        $this->Checkinout = TableRegistry::get('Checkinout', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Checkinout);

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

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
