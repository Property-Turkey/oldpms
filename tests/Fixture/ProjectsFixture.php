<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectsFixture
 */
class ProjectsFixture extends TestFixture
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
                'language_id' => 1,
                'category_id' => 1,
                'user_id' => 1,
                'developer_id' => 1,
                'features_ids' => 'Lorem ipsum dolor sit amet',
                'project_title' => 'Lorem ipsum dolor sit amet',
                'project_desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'project_photos' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'project_videos' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'project_loc' => 'Lorem ipsum dolor sit amet',
                'project_ref' => 'Lorem ipsum dolor sit amet',
                'project_currency' => 1,
                'adrs_country' => 'Lorem ipsum dolor sit amet',
                'adrs_city' => 'Lorem ipsum dolor sit amet',
                'adrs_region' => 'Lorem ipsum dolor sit amet',
                'adrs_district' => 'Lorem ipsum dolor sit amet',
                'adrs_street' => 'Lorem ipsum dolor sit amet',
                'param_space' => 1,
                'param_greenspace' => 1,
                'param_homesspace' => 1,
                'param_delivertype' => 1,
                'param_deliverdate' => '2024-03-29',
                'param_totalunits' => 1,
                'param_blocks' => 1,
                'param_residential_units' => 1,
                'param_commercial_units' => 1,
                'param_unit_types' => 'Lorem ipsum dolor sit amet',
                'param_units_size_range' => 'Lorem ipsum dolor sit amet',
                'param_downpayment' => 1,
                'param_installment' => 1,
                'param_installment_months' => 1,
                'seo_title' => 'Lorem ipsum dolor sit amet',
                'seo_keywords' => 'Lorem ipsum dolor sit amet',
                'seo_desc' => 'Lorem ipsum dolor sit amet',
                'stat_created' => '2024-03-29 09:22:33',
                'stat_updated' => '2024-03-29 09:22:33',
                'stat_views' => 1,
                'stat_shares' => 1,
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
