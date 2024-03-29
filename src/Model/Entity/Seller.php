<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Seller extends Entity
{
    protected $_accessible = [
        'seller_name' => true,
        'seller_type' => true,
        'seller_nationality' => true,
        'seller_photos' => true,
        'seller_configs' => [
            'mngr' => [
                "fullname" => true, 
                "phone" => true, 
                "email" => true, 
                "mobile" => true
            ],
            'slr' => [
                "fullname" => true, 
                "phone" => true, 
                "email" => true, 
                "mobile" => true
            ],
        ],
        'stat_created' => true,
        'rec_state' => true,
        'projects' => true,
        'properties' => true,
    ];
}
