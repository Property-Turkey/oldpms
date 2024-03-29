<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Proposal extends Entity
{
    protected $_accessible = [
        'user_id' => true,
        'tar_id' => true,
        'tar_tbl' => true,
        'proposal_title' => true,
        'proposal_desc' => true,
        'proposal_configs' => true,
        'stat_created' => true,
        'rec_state' => true,

        'property' => true,
        'project' => true,
        'histories' => true,
    ];
}
