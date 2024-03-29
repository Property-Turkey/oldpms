<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Leads extends Entity
{
    protected $_accessible = [
        'rec_state' => true,
    ];
}
