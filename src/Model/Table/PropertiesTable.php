<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PropertiesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('properties');
        $this->setDisplayField('property_title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'LEFT',
        ]);
        $this->belongsTo('Developers', [
            'foreignKey' => 'developer_id',
            'joinType' => 'LEFT',
        ]);
        // $this->belongsTo('Sellers', [
        //     'foreignKey' => 'seller_id',
        //     'joinType' => 'LEFT',
        // ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        
        // $this->hasMany('Histories', [
        //     'foreignKey' => 'tar_id',
        //     'joinType' => 'INNER',
		// 	'dependent' => true,
		// 	'cascadeCallbacks' => true
        // ])->setConditions(['Histories.tbl_tar'=>1]);

        // $this->hasMany('Docs', [
        //     'foreignKey' => 'tar_id',
        //     'joinType' => 'INNER',
		// 	'dependent' => true,
		// 	'cascadeCallbacks' => true
        // ])->setConditions(['Docs.tar_tbl'=>1]);
        
        // $this->hasMany('Proposals', [
        //     'foreignKey' => 'tar_id',
        //     'joinType' => 'INNER',
		// 	'dependent' => true,
		// 	'cascadeCallbacks' => true
        // ])->setConditions(['tar_tbl'=>1]);
        
        // $this->hasOne('UserProperty', [
        //     'foreignKey' => 'property_id',
        // ]);

		$this->addBehavior('Log');
    }
    
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->integer('id')
        //     ->allowEmptyString('id', null, 'create');

        // $validator
        //     ->scalar('features_ids')
        //     ->maxLength('features_ids', 255)
        //     ->allowEmptyString('features_ids');

        // $validator
        //     ->scalar('property_title')
        //     ->maxLength('property_title', 255)
        //     ->requirePresence('property_title', 'create')
        //     ->notEmptyString('property_title');

        // $validator
        //     ->scalar('property_desc')
        //     ->allowEmptyString('property_desc');

        // $validator
        //     ->scalar('property_photos')
        //     ->maxLength('property_photos', 255)
        //     ->allowEmptyString('property_photos');

        // $validator
        //     ->integer('property_price')
        //     ->allowEmptyString('property_price');

        // $validator
        //     ->integer('property_oldprice')
        //     ->allowEmptyString('property_oldprice');

        // $validator
        //     ->scalar('property_loc')
        //     ->maxLength('property_loc', 255)
        //     ->requirePresence('property_loc', 'create')
        //     ->notEmptyString('property_loc');

        // $validator
        //     ->scalar('adrs_country')
        //     ->maxLength('adrs_country', 255)
        //     ->allowEmptyString('adrs_country');

        // $validator
        //     ->scalar('adrs_city')
        //     ->maxLength('adrs_city', 255)
        //     ->allowEmptyString('adrs_city');

        // $validator
        //     ->scalar('adrs_area')
        //     ->maxLength('adrs_area', 255)
        //     ->allowEmptyString('adrs_area');

        // $validator
        //     ->scalar('adrs_district')
        //     ->maxLength('adrs_district', 255)
        //     ->allowEmptyString('adrs_district');

        // $validator
        //     ->scalar('adrs_street')
        //     ->maxLength('adrs_street', 255)
        //     ->allowEmptyString('adrs_street');

        // $validator
        //     ->scalar('adrs_builing')
        //     ->maxLength('adrs_builing', 255)
        //     ->allowEmptyString('adrs_builing');

        // $validator
        //     ->scalar('adrs_no')
        //     ->maxLength('adrs_no', 255)
        //     ->allowEmptyString('adrs_no');

        // $validator
        //     ->integer('param_netspace')
        //     ->allowEmptyString('param_netspace');

        // $validator
        //     ->integer('param_grossspace')
        //     ->allowEmptyString('param_grossspace');

        // $validator
        //     ->integer('param_rooms')
        //     ->allowEmptyString('param_rooms');

        // $validator
        //     ->integer('param_buildage')
        //     ->allowEmptyString('param_buildage');

        // $validator
        //     ->integer('param_floors')
        //     ->allowEmptyString('param_floors');

        // $validator
        //     ->integer('param_floor')
        //     ->allowEmptyString('param_floor');

        // $validator
        //     ->integer('param_heat')
        //     ->allowEmptyString('param_heat');

        // $validator
        //     ->integer('param_bathrooms')
        //     ->allowEmptyString('param_bathrooms');

        // $validator
        //     ->integer('param_balconies')
        //     ->allowEmptyString('param_balconies');

        // $validator
        //     ->integer('param_isfurnitured')
        //     ->allowEmptyString('param_isfurnitured');

        // $validator
        //     ->integer('param_usestatus')
        //     ->allowEmptyString('param_usestatus');

        // $validator
        //     ->integer('param_monthlytax')
        //     ->allowEmptyString('param_monthlytax');

        // $validator
        //     ->integer('param_payment')
        //     ->allowEmptyString('param_payment');

        // $validator
        //     ->integer('param_ownership')
        //     ->allowEmptyString('param_ownership');

        // $validator
        //     ->integer('param_ownertype')
        //     ->allowEmptyString('param_ownertype');

        // $validator
        //     ->integer('param_deposit')
        //     ->allowEmptyString('param_deposit');

        // $validator
        //     ->scalar('seo_keywords')
        //     ->maxLength('seo_keywords', 255)
        //     ->allowEmptyString('seo_keywords');

        // $validator
        //     ->scalar('seo_desc')
        //     ->maxLength('seo_desc', 255)
        //     ->allowEmptyString('seo_desc');

        // $validator
        //     ->dateTime('stat_created')
        //     ->requirePresence('stat_created', 'create')
        //     ->notEmptyDateTime('stat_created');

        // $validator
        //     ->dateTime('stat_updated')
        //     ->notEmptyDateTime('stat_updated');

        // $validator
        //     ->integer('stat_views')
        //     ->notEmptyString('stat_views');

        // $validator
        //     ->integer('stat_shares')
        //     ->notEmptyString('stat_shares');

        // $validator
        //     ->notEmptyString('rec_state');

        return $validator;
    }
    
    // public function buildRules(RulesChecker $rules): RulesChecker
    // {
    //     // $rules->add($rules->existsIn('project_id', 'Projects'), ['errorField' => 'project_id']);
    //     // $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);

    //     return $rules;
    // }
}
