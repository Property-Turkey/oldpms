<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Message extends Entity
{
    protected $_accessible = [
        'user_id' => true,
        'parent_id' => true,
        'message_to' => true,
        'message_subject' => true,
        'message_text' => true,
        'message_priority' => true,
        'stat_created' => true,
        'rec_state' => true,
        'user' => true,
        'school' => true,
        'parent_message' => true,
        'child_messages' => true,
        'user_message' => true,
    ];
}
