<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OfficesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OfficesTable Test Case
 */
class OfficesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OfficesTable
     */
    protected $Offices;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Offices',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Offices') ? [] : ['className' => OfficesTable::class];
        $this->Offices = $this->getTableLocator()->get('Offices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Offices);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OfficesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
