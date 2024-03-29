<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocsFixture
 */
class DocsFixture extends TestFixture
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
                'tar_tbl' => 1,
                'doc_name' => 'Lorem ipsum dolor sit amet',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
