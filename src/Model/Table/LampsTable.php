<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lamps Model
 *
 * @property \Cake\ORM\Association\HasMany $Scores
 *
 * @method \App\Model\Entity\Lamp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lamp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lamp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lamp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lamp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lamp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lamp findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LampsTable extends Table
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

        $this->table('lamps');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Scores', [
            'foreignKey' => 'lamp_id'
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
            ->requirePresence('lamp_code', 'create')
            ->notEmpty('lamp_code')
            ->add('lamp_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('lamp_name', 'create')
            ->notEmpty('lamp_name');

        $validator
            ->integer('lamp_score')
            ->requirePresence('lamp_score', 'create')
            ->notEmpty('lamp_score')
            ->add('lamp_score', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['lamp_code']));
        $rules->add($rules->isUnique(['lamp_score']));

        return $rules;
    }
}
