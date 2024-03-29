<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Property extends Entity
{
    
    protected $_accessible = [
        'language_id' => true,
        'category_id' => true,
        'user_id' => true,
        'developer_id' => true,
        'project_id' => true,
        'seller_id' => true,
        'features_ids' => true,
        'property_title' => true,
        'property_desc' => true,
        'property_photos' => true,
        'property_videos' => true,
        'property_price' => true,
        'property_oldprice' => true,
        'property_currency' => true, //1=Sterling Pound, 2=Euro, 3=Dollar, 4=Turkish lira 
        'property_loc' => true, 
        'property_ref' => true,
        'property_usp' => true, //Unique Sell Points 
        'property_isfeatured' => true, //0=normal, 1=at top of the list, 2=in landingpages
        'property_isindexed' => true, //this for google index, noindex - 0-noindex, 1=index

        'adrs_country' => true,
        'adrs_city' => true,
        'adrs_region' => true,
        'adrs_district' => true,
        'adrs_street' => true,
        'adrs_block' => true,
        'adrs_no' => true,

        'param_netspace' => true,
        'param_grossspace' => true,
        'param_rooms' => true,
        'param_bedrooms' => true,
        'param_buildage' => true,
        'param_floors' => true,
        'param_floor' => true,
        'param_heat' => true,
        'param_bathrooms' => true,
        'param_balconies' => true,

        'param_isfurnitured' => true,
        'param_isresale' => true,
        'param_iscitizenship' => true,
        'param_isresidence' => true,
        'param_iscommission_included' => true,
        'param_titledeed' => true, 
        
        'param_usestatus' => true,
        'param_monthlytax' => true,
        'param_payment' => true,
        'param_ownership' => true,
        'param_ownertype' => true,
        'param_deposit' => true,
        
        'seo_title' => true,
        'seo_keywords' => true,
        'seo_desc' => true,
        'stat_created' => true,
        'stat_updated' => true,
        'stat_views' => true,
        'stat_shares' => true,
        'rec_state' => true,

        'project' => true,
        'category' => true,
        'proposals' => true,
        'histories' => true,
    ];
}
