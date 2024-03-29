<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Doc extends Entity
{
    protected $_accessible = [
        'tar_id' => true,
        'tar_tbl' => true,
        'doc_name' => true,
        'doc_desc' => true,
        'doc_allowed_roles' => true,
        'stat_created' => true,
        'rec_state' => true,
        'property' => true,
        'project' => true,
    ];
}
