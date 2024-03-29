<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FloorplansTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FloorplansTable Test Case
 */
class FloorplansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FloorplansTable
     */
    protected $Floorplans;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Floorplans',
        'app.Projects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Floorplans') ? [] : ['className' => FloorplansTable::class];
        $this->Floorplans = $this->getTableLocator()->get('Floorplans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Floorplans);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FloorplansTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FloorplansTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
