<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Office Entity
 *
 * @property int $id
 * @property string $office_name
 * @property string|null $office_desc
 * @property string|null $office_photos
 * @property string|null $office_coverage
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property int $rec_state
 */
class Office extends Entity
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
        'language_id' => true,
        'office_name' => true,
        'office_desc' => true,
        'office_photos' => true,
        'office_coverage' => true,
        'stat_created' => true,
        'rec_state' => true,
    ];
}
