<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DifficultyTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $DifficultyThemesSheets
 *
 * @method \App\Model\Entity\DifficultyType get($primaryKey, $options = [])
 * @method \App\Model\Entity\DifficultyType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DifficultyType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DifficultyType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DifficultyTypesTable extends Table
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

        $this->table('difficulty_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('DifficultyThemesSheets', [
            'foreignKey' => 'difficulty_type_id'
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
            ->requirePresence('type_code', 'create')
            ->notEmpty('type_code')
            ->add('type_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('type_name', 'create')
            ->notEmpty('type_name');

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
        $rules->add($rules->isUnique(['type_code']));

        return $rules;
    }
}
