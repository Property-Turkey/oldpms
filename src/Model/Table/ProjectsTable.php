<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ProjectsTable extends Table
{
  
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('projects');
        $this->setDisplayField('project_title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Developers', [
            'foreignKey' => 'developer_id',
        ]);
        $this->hasMany('Properties', [
            'foreignKey' => 'project_id',
        ]);

		$this->addBehavior('Log');
    }


    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('language_id')
            ->allowEmptyString('language_id');

        $validator
            ->integer('category_id')
            ->notEmptyString('category_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('developer_id')
            ->allowEmptyString('developer_id');

        $validator
            ->scalar('features_ids')
            ->maxLength('features_ids', 255)
            ->allowEmptyString('features_ids');

        $validator
            ->scalar('project_title')
            ->maxLength('project_title', 255)
            ->requirePresence('project_title', 'create')
            ->notEmptyString('project_title');

        $validator
            ->scalar('project_desc')
            ->allowEmptyString('project_desc');

        $validator
            ->scalar('project_photos')
            ->allowEmptyString('project_photos');

        $validator
            ->scalar('project_videos')
            ->allowEmptyString('project_videos');

        $validator
            ->scalar('project_loc')
            ->maxLength('project_loc', 255)
            ->allowEmptyString('project_loc');

        $validator
            ->scalar('project_ref')
            ->maxLength('project_ref', 255)
            ->allowEmptyString('project_ref');

        $validator
            ->allowEmptyString('project_currency');

        $validator
            ->scalar('adrs_country')
            ->maxLength('adrs_country', 255)
            ->allowEmptyString('adrs_country');

        $validator
            ->scalar('adrs_city')
            ->maxLength('adrs_city', 255)
            ->allowEmptyString('adrs_city');

        $validator
            ->scalar('adrs_region')
            ->maxLength('adrs_region', 255)
            ->allowEmptyString('adrs_region');

        $validator
            ->scalar('adrs_district')
            ->maxLength('adrs_district', 255)
            ->allowEmptyString('adrs_district');

        $validator
            ->scalar('adrs_street')
            ->maxLength('adrs_street', 255)
            ->allowEmptyString('adrs_street');

        $validator
            ->integer('param_space')
            ->allowEmptyString('param_space');

        $validator
            ->integer('param_greenspace')
            ->allowEmptyString('param_greenspace');

        $validator
            ->integer('param_homesspace')
            ->allowEmptyString('param_homesspace');

        $validator
            ->allowEmptyString('param_delivertype');

        $validator
            ->date('param_deliverdate')
            ->allowEmptyDate('param_deliverdate');

        $validator
            ->integer('param_totalunits')
            ->allowEmptyString('param_totalunits');

        $validator
            ->integer('param_blocks')
            ->allowEmptyString('param_blocks');

        $validator
            ->integer('param_residential_units')
            ->allowEmptyString('param_residential_units');

        $validator
            ->integer('param_commercial_units')
            ->allowEmptyString('param_commercial_units');

        $validator
            ->scalar('param_unit_types')
            ->maxLength('param_unit_types', 255)
            ->allowEmptyString('param_unit_types');

        $validator
            ->scalar('param_units_size_range')
            ->maxLength('param_units_size_range', 255)
            ->allowEmptyString('param_units_size_range');

        $validator
            ->allowEmptyString('param_downpayment');

        $validator
            ->allowEmptyString('param_installment');

        $validator
            ->allowEmptyString('param_installment_months');

        $validator
            ->scalar('seo_title')
            ->maxLength('seo_title', 255)
            ->allowEmptyString('seo_title');

        $validator
            ->scalar('seo_keywords')
            ->maxLength('seo_keywords', 255)
            ->allowEmptyString('seo_keywords');

        $validator
            ->scalar('seo_desc')
            ->maxLength('seo_desc', 255)
            ->allowEmptyString('seo_desc');

        $validator
            ->dateTime('stat_created')
            ->requirePresence('stat_created', 'create')
            ->notEmptyDateTime('stat_created');

        $validator
            ->dateTime('stat_updated')
            ->allowEmptyDateTime('stat_updated');

        $validator
            ->integer('stat_views')
            ->notEmptyString('stat_views');

        $validator
            ->integer('stat_shares')
            ->notEmptyString('stat_shares');

        $validator
            ->notEmptyString('rec_state');

        return $validator;
    }

    // public function buildRules(RulesChecker $rules): RulesChecker
    // {
    //     $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);
    //     $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
    //     $rules->add($rules->existsIn('developer_id', 'Developers'), ['errorField' => 'developer_id']);

    //     return $rules;
    // }
}
