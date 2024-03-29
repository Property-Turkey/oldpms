<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property int $language_id
 * @property int $parent_id
 * @property string $category_name
 * @property string $category_params
 * @property int $category_priority
 * @property int $rec_state
 *
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\ParentCategory $parent_category
 * @property \App\Model\Entity\ChildCategory[] $child_categories
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\Property[] $properties
 */
class Category extends Entity
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
        'parent_id' => true,
        'category_name' => true,
        'category_params' => true,
        'category_priority' => true,
        'rec_state' => true,
        'language' => true,
        'parent_category' => true,
        'child_categories' => true,
        'projects' => true,
        'properties' => true,
    ];
}
