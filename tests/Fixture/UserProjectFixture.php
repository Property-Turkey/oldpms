<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserProjectFixture
 */
class UserProjectFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user_project';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'project_id' => 1,
                'stat_created' => '2023-02-16 13:24:12',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
