<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserPropertyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserPropertyTable Test Case
 */
class UserPropertyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserPropertyTable
     */
    protected $UserProperty;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UserProperty',
        'app.Users',
        'app.Properties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserProperty') ? [] : ['className' => UserPropertyTable::class];
        $this->UserProperty = $this->getTableLocator()->get('UserProperty', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UserProperty);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserPropertyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserPropertyTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
