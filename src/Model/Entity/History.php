<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class History extends Entity
{
    protected $_accessible = [
        'tar_id' => true,
        'tbl_tar' => true,
        
        'history_price' => true,
        'history_country' => true,
        'history_ip' => true,
        'history_lang'  => true,
        'stat_created' => true,

        'property' => true,
        'proposal' => true,
    ];
}
