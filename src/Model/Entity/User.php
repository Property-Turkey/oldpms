<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        'office_id' => true,
        'user_fullname' => true,
        'email' => true,
        'password' => true,
        'user_role' => true,
        'user_token' => true,
        'user_configs' => [
            'mobile'=>true,
            'address'=>true
        ],
        'stat_lastlogin' => true,
        'stat_created' => true,
        'stat_logins' => true,
        'stat_ip' => true,
        'rec_state' => true,
        'messages' => true,
        'office' => true,
    ];

    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
}