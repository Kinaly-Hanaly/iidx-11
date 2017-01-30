<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DifficultyRanks Model
 *
 * @property \Cake\ORM\Association\HasMany $DifficultyThemesSheets
 *
 * @method \App\Model\Entity\DifficultyRank get($primaryKey, $options = [])
 * @method \App\Model\Entity\DifficultyRank newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DifficultyRank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyRank|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DifficultyRank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyRank[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyRank findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DifficultyRanksTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('difficulty_ranks');
        $this->displayField('rank_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('DifficultyThemesSheets', [
            'foreignKey' => 'difficulty_rank_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('rank_code', 'create')
            ->notEmpty('rank_code')
            ->add('rank_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('rank_name', 'create')
            ->notEmpty('rank_name');

        $validator
            ->integer('rank_score')
            ->requirePresence('rank_score', 'create')
            ->notEmpty('rank_score')
            ->add('rank_score', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['rank_score']));
        $rules->add($rules->isUnique(['rank_code']));

        return $rules;
    }
}
