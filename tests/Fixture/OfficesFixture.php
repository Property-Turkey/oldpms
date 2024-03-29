<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OfficesFixture
 */
class OfficesFixture extends TestFixture
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
                'office_name' => 'Lorem ipsum dolor sit amet',
                'office_desc' => 'Lorem ipsum dolor sit amet',
                'office_photos' => 'Lorem ipsum dolor sit amet',
                'office_coverage' => 'Lorem ipsum dolor sit amet',
                'stat_created' => '2022-03-29 09:32:57',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
