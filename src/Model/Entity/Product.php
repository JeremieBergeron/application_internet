<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $subcategory_id
 * @property int|null $country_id
 * @property string $name
 * @property string|null $description
 * @property float $price
 * @property int $quantity_available
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Subcategory $subcategory
 * @property \App\Model\Entity\Purchase[] $purchases
 * @property \App\Model\Entity\File[] $files
 * @property \App\Model\Entity\Tag[] $tags
 */
class Product extends Entity
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
        'category_id' => true,
        'subcategory_id' => true,
        'country_id' => true,
        'name' => true,
        'description' => true,
        'price' => true,
        'quantity_available' => true,
        'created' => true,
        'modified' => true,
        'subcategory' => true,
        'purchases' => true,
        'files' => true,
        'tags' => true,
    ];
}
