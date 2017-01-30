<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DifficultyThemesSheets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sheets
 * @property \Cake\ORM\Association\BelongsTo $DifficultyThemes
 * @property \Cake\ORM\Association\BelongsTo $DifficultyTypes
 * @property \Cake\ORM\Association\BelongsTo $DifficultyRanks
 *
 * @method \App\Model\Entity\DifficultyThemesSheet get($primaryKey, $options = [])
 * @method \App\Model\Entity\DifficultyThemesSheet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DifficultyThemesSheet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyThemesSheet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DifficultyThemesSheet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyThemesSheet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DifficultyThemesSheet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DifficultyThemesSheetsTable extends Table
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

        $this->table('difficulty_themes_sheets');
        $this->displayField('sheet_id');
        $this->primaryKey(['sheet_id', 'difficulty_theme_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sheets', [
            'foreignKey' => 'sheet_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DifficultyThemes', [
            'foreignKey' => 'difficulty_theme_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DifficultyTypes', [
            'foreignKey' => 'difficulty_type_id'
        ]);
        $this->belongsTo('DifficultyRanks', [
            'foreignKey' => 'difficulty_rank_id'
        ]);
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
        $rules->add($rules->existsIn(['sheet_id'], 'Sheets'));
        $rules->add($rules->existsIn(['difficulty_theme_id'], 'DifficultyThemes'));
        $rules->add($rules->existsIn(['difficulty_type_id'], 'DifficultyTypes'));
        $rules->add($rules->existsIn(['difficulty_rank_id'], 'DifficultyRanks'));

        return $rules;
    }
}
