<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tunes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Versions
 * @property \Cake\ORM\Association\HasMany $Sheets
 *
 * @method \App\Model\Entity\Tune get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tune newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tune[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tune|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tune patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tune[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tune findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TunesTable extends Table
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

        $this->table('tunes');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Versions', [
            'foreignKey' => 'version_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Sheets', [
            'foreignKey' => 'tune_id'
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
            ->requirePresence('tune_code', 'create')
            ->notEmpty('tune_code')
            ->add('tune_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

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
        $rules->add($rules->isUnique(['tune_code']));
        $rules->add($rules->existsIn(['version_id'], 'Versions'));

        return $rules;
    }
}
