<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BlueprintsFixture
 */
class BlueprintsFixture extends TestFixture
{
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
                'project_id' => 1,
                'blueprint_name' => 'Lorem ipsum dolor sit amet',
                'blueprint_photo' => 'Lorem ipsum dolor sit amet',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
