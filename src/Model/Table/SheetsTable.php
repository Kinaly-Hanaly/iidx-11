<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sheets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tunes
 * @property \Cake\ORM\Association\BelongsTo $SheetTypes
 * @property \Cake\ORM\Association\HasMany $Scores
 * @property \Cake\ORM\Association\BelongsToMany $DifficultyThemes
 *
 * @method \App\Model\Entity\Sheet get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sheet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sheet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sheet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sheet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sheet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sheet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SheetsTable extends Table
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

        $this->table('sheets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tunes', [
            'foreignKey' => 'tune_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SheetTypes', [
            'foreignKey' => 'sheet_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Scores', [
            'foreignKey' => 'sheet_id'
        ]);
        $this->belongsToMany('DifficultyThemes', [
            'foreignKey' => 'sheet_id',
            'targetForeignKey' => 'difficulty_theme_id',
            'joinTable' => 'difficulty_themes_sheets'
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
            ->requirePresence('sheet_code', 'create')
            ->notEmpty('sheet_code')
            ->add('sheet_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('play_type', 'create')
            ->notEmpty('play_type');

        $validator
            ->integer('notes')
            ->allowEmpty('notes');

        $validator
            ->allowEmpty('textage_url_1p');

        $validator
            ->allowEmpty('textage_url_2p');

        $validator
            ->integer('level')
            ->allowEmpty('level');

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
        $rules->add($rules->isUnique(['sheet_code']));
        $rules->add($rules->existsIn(['tune_id'], 'Tunes'));
        $rules->add($rules->existsIn(['sheet_type_id'], 'SheetTypes'));

        return $rules;
    }
}
