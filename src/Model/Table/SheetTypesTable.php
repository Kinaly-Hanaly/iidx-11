<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SheetTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Sheets
 *
 * @method \App\Model\Entity\SheetType get($primaryKey, $options = [])
 * @method \App\Model\Entity\SheetType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SheetType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SheetType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SheetType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SheetType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SheetType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SheetTypesTable extends Table
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

        $this->table('sheet_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Sheets', [
            'foreignKey' => 'sheet_type_id'
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
            ->requirePresence('sheet_type_code', 'create')
            ->notEmpty('sheet_type_code')
            ->add('sheet_type_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('sheet_type_name', 'create')
            ->notEmpty('sheet_type_name')
            ->add('sheet_type_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['sheet_type_name']));
        $rules->add($rules->isUnique(['sheet_type_code']));

        return $rules;
    }
}
