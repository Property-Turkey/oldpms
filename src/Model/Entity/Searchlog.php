<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Searchlog extends Entity
{
    protected $_accessible = [
        'search_val' => true,
        'search_group' => true,
        'search_ctrl' => true,
        'stat_created' => true,
    ];
}
