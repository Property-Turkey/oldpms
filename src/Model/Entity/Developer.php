<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Developer extends Entity
{
    protected $_accessible = [
        'dev_name' => true,
        'dev_configs' => [
            'phone' => true,
            'email' => true,
            'mobile' => true,
            'address' => true,
        ],
        'stat_created' => true,
        'rec_state' => true,
        'projects' => true,
        'properties' => true,
    ];
}
