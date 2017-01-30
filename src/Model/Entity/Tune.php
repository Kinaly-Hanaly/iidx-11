<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tune Entity
 *
 * @property int $id
 * @property string $tune_code
 * @property string $title
 * @property int $version_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Version $version
 * @property \App\Model\Entity\Sheet[] $sheets
 */
class Tune extends Entity
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
