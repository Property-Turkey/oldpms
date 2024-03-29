<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserProjectTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserProjectTable Test Case
 */
class UserProjectTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserProjectTable
     */
    protected $UserProject;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UserProject',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('UserProject') ? [] : ['className' => UserProjectTable::class];
        $this->UserProject = $this->getTableLocator()->get('UserProject', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UserProject);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserProjectTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserProjectTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
