<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sheet Entity
 *
 * @property int $id
 * @property string $sheet_code
 * @property int $tune_id
 * @property string $play_type
 * @property int $sheet_type_id
 * @property int $notes
 * @property string $textage_url_1p
 * @property string $textage_url_2p
 * @property int $level
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Tune $tune
 * @property \App\Model\Entity\SheetType $sheet_type
 * @property \App\Model\Entity\Score[] $scores
 * @property \App\Model\Entity\DifficultyTheme[] $difficulty_themes
 */
class Sheet extends Entity
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
        'id' => false
    ];
}
