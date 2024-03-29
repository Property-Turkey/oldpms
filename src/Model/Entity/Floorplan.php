<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Floorplan extends Entity
{
    protected $_accessible = [
        'project_id' => true,
        'floorplan_name' => true,
        'floorplan_photo' => true,
        'floorplan_minsize' => true,
        'floorplan_maxsize' => true,
        'floorplan_minprice' => true,
        'floorplan_maxprice' => true,
        'rec_state' => true,
        'project' => true,
    ];
}
