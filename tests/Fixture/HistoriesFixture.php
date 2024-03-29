<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HistoriesFixture
 */
class HistoriesFixture extends TestFixture
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
                'tar_id' => 1,
                'tbl_tar' => 1,
                'history_value' => 'Lorem ipsum dolor sit amet',
                'history_configs' => 'Lorem ipsum dolor sit amet',
                'stat_created' => 1668518839,
            ],
        ];
        parent::init();
    }
}
