<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class UserMessage extends Entity
{
    protected $_accessible = [
        'user_id' => true,
        'message_id' => true,
        'stat_created' => true,
        'rec_state' => true,
    ];
}
