<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property int|null $language_id
 * @property int $category_id
 * @property int $user_id
 * @property int|null $developer_id
 * @property string|null $features_ids
 * @property string $project_title
 * @property string|null $project_desc
 * @property string|null $project_photos
 * @property string|null $project_videos
 * @property string|null $project_loc
 * @property string|null $project_ref
 * @property int|null $project_currency
 * @property string|null $adrs_country
 * @property string|null $adrs_city
 * @property string|null $adrs_region
 * @property string|null $adrs_district
 * @property string|null $adrs_street
 * @property int|null $param_space
 * @property int|null $param_greenspace
 * @property int|null $param_homesspace
 * @property int|null $param_delivertype
 * @property \Cake\I18n\FrozenDate|null $param_deliverdate
 * @property int|null $param_totalunits
 * @property int|null $param_blocks
 * @property int|null $param_residential_units
 * @property int|null $param_commercial_units
 * @property string|null $param_unit_types
 * @property string|null $param_units_size_range
 * @property int|null $param_downpayment
 * @property int|null $param_installment
 * @property int|null $param_installment_months
 * @property string|null $seo_title
 * @property string|null $seo_keywords
 * @property string|null $seo_desc
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property \Cake\I18n\FrozenTime|null $stat_updated
 * @property int $stat_views
 * @property int $stat_shares
 * @property int $rec_state
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Developer $developer
 * @property \App\Model\Entity\Floorplan[] $floorplans
 * @property \App\Model\Entity\Property[] $properties
 * @property \App\Model\Entity\Seller[] $sellers
 * @property \App\Model\Entity\UserProject $user_project
 * @property \App\Model\Entity\History[] $histories
 * @property \App\Model\Entity\Proposal[] $proposals
 * @property \App\Model\Entity\Doc[] $docs
 */
class Project extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'language_id' => true,
        'category_id' => true,
        'user_id' => true,
        'developer_id' => true,
        'features_ids' => true,
        'project_title' => true,
        'project_desc' => true,
        'project_photos' => true,
        'project_videos' => true,
        'project_loc' => true,
        'project_ref' => true,
        'project_currency' => true,
        'adrs_country' => true,
        'adrs_city' => true,
        'adrs_region' => true,
        'adrs_district' => true,
        'adrs_street' => true,
        'param_space' => true,
        'param_greenspace' => true,
        'param_homesspace' => true,
        'param_delivertype' => true,
        'param_deliverdate' => true,
        'param_totalunits' => true,
        'param_blocks' => true,
        'param_residential_units' => true,
        'param_commercial_units' => true,
        'param_unit_types' => true,
        'param_units_size_range' => true,
        'param_downpayment' => true,
        'param_installment' => true,
        'param_installment_months' => true,
        'seo_title' => true,
        'seo_keywords' => true,
        'seo_desc' => true,
        'stat_created' => true,
        'stat_updated' => true,
        'stat_views' => true,
        'stat_shares' => true,
        'rec_state' => true,
        'category' => true,
        'user' => true,
        'developer' => true,
        'floorplans' => true,
        'properties' => true,
        'sellers' => true,
        'user_project' => true,
        'histories' => true,
        'proposals' => true,
        'docs' => true,
    ];
}
