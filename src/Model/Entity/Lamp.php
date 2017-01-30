<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lamp Entity
 *
 * @property int $id
 * @property string $lamp_code
 * @property string $lamp_name
 * @property int $lamp_score
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Score[] $scores
 */
class Lamp extends Entity
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
