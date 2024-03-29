<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropertiesFixture
 */
class PropertiesFixture extends TestFixture
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
                'category_id' => 1,
                'features_ids' => 'Lorem ipsum dolor sit amet',
                'property_title' => 'Lorem ipsum dolor sit amet',
                'property_desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'property_photos' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'property_price' => 1,
                'property_oldprice' => 1,
                'property_loc' => 'Lorem ipsum dolor sit amet',
                'adrs_country' => 'Lorem ipsum dolor sit amet',
                'adrs_city' => 'Lorem ipsum dolor sit amet',
                'adrs_area' => 'Lorem ipsum dolor sit amet',
                'adrs_district' => 'Lorem ipsum dolor sit amet',
                'adrs_street' => 'Lorem ipsum dolor sit amet',
                'adrs_builing' => 'Lorem ipsum dolor sit amet',
                'adrs_no' => 'Lorem ipsum dolor sit amet',
                'param_netspace' => 1,
                'param_grossspace' => 1,
                'param_rooms' => 1,
                'param_buildage' => 1,
                'param_floors' => 1,
                'param_floor' => 1,
                'param_heat' => 1,
                'param_bathrooms' => 1,
                'param_balconies' => 1,
                'param_isfurnitured' => 1,
                'param_usestatus' => 1,
                'param_monthlytax' => 1,
                'param_payment' => 1,
                'param_ownership' => 1,
                'param_ownertype' => 1,
                'param_deposit' => 1,
                'seo_keywords' => 'Lorem ipsum dolor sit amet',
                'seo_desc' => 'Lorem ipsum dolor sit amet',
                'stat_created' => '2022-03-08 14:05:39',
                'stat_updated' => '2022-03-08 14:05:39',
                'stat_views' => 1,
                'stat_shares' => 1,
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
