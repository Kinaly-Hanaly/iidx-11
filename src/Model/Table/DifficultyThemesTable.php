<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DifficultyThemes Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Sheets
 *
 * @method \App\Model\Entity\DifficultyTheme get($primaryKey, $options = [])
 * @method \App\Model\Entity\DifficultyTheme newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DifficultyTheme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyTheme|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DifficultyTheme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyTheme[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyTheme findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DifficultyThemesTable extends Table
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

        $this->table('difficulty_themes');
        $this->displayField('theme_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Sheets', [
            'foreignKey' => 'difficulty_theme_id',
            'targetForeignKey' => 'sheet_id',
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
            ->requirePresence('theme_code', 'create')
            ->notEmpty('theme_code')
            ->add('theme_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('theme_name', 'create')
            ->notEmpty('theme_name');

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
        $rules->add($rules->isUnique(['theme_code']));

        return $rules;
    }
}
