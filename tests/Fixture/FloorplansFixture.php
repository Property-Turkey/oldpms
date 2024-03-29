<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FloorplansFixture
 */
class FloorplansFixture extends TestFixture
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
                'floorplan_name' => 'Lorem ipsum dolor sit amet',
                'floorplan_minsize' => 1,
                'floorplan_maxsize' => 1,
                'floorplan_minprice' => 1,
                'floorplan_maxprice' => 1,
                'floorplan_photo' => 'Lorem ipsum dolor sit amet',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
