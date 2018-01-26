<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 * @property string $product_image
 * @property int $price
 * @property string $brand
 * @property string $description
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'price'], 'integer'],
            [['product_image'], 'file', 'extensions' => 'png, jpg','maxFiles' => 4],
            [['title', 'brand'], 'string', 'max' => 255],
            [['description'], 'trim'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название товара',
            'category_id' => 'ID Категории',
            'product_image' => 'Картинки',
            'price' => 'Цена',
            'brand' => 'Бренд',
            'description' => 'Характеристики (описание) товара',
        ];
    }
}
