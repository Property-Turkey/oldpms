<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_fullname' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'user_role' => 'Lorem ipsum dolor sit amet',
                'user_token' => 'Lorem ipsum dolor sit amet',
                'stat_lastlogin' => '2022-03-02 13:22:57',
                'stat_created' => '2022-03-02 13:22:57',
                'stat_logins' => 1,
                'stat_ip' => 'Lorem ipsum dolor sit amet',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
