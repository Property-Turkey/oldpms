<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlueprintsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlueprintsTable Test Case
 */
class BlueprintsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BlueprintsTable
     */
    protected $Blueprints;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Blueprints',
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
        $config = $this->getTableLocator()->exists('Blueprints') ? [] : ['className' => BlueprintsTable::class];
        $this->Blueprints = $this->getTableLocator()->get('Blueprints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Blueprints);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BlueprintsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BlueprintsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
