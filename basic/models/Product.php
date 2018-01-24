<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 * @property string $images
 * @property int $price
 * @property string $brand
 * @property string $description
 */
class Product extends \yii\db\ActiveRecord
{
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
            [['title', 'images', 'brand'], 'string', 'max' => 255],
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
            'images' => 'Картинки',
            'price' => 'Цена',
            'brand' => 'Бренд',
            'description' => 'Характеристики (описание) товара',
        ];
    }
}
