<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DifficultyThemesSheet Entity
 *
 * @property int $sheet_id
 * @property int $difficulty_theme_id
 * @property int $difficulty_type_id
 * @property int $difficulty_rank_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Sheet $sheet
 * @property \App\Model\Entity\DifficultyTheme $difficulty_theme
 * @property \App\Model\Entity\DifficultyType $difficulty_type
 * @property \App\Model\Entity\DifficultyRank $difficulty_rank
 */
class DifficultyThemesSheet extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'sheet_id' => false,
        'difficulty_theme_id' => false
    ];
}
