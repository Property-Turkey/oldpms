<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class DevelopersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('developers');
        $this->setDisplayField('dev_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Projects', [
            'foreignKey' => 'developer_id',
        ]);
        $this->hasMany('Properties', [
            'foreignKey' => 'developer_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('dev_name')
            ->maxLength('dev_name', 255)
            ->requirePresence('dev_name', 'create')
            ->notEmptyString('dev_name');

        // $validator
        //     ->dateTime('stat_created')
        //     ->notEmptyDateTime('stat_created');

        // $validator
        //     ->notEmptyString('rec_state');

        return $validator;
    }
}
