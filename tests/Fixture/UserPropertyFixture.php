<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserPropertyFixture
 */
class UserPropertyFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user_property';
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
                'property_id' => 1,
                'stat_created' => '2023-02-16 13:24:04',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
