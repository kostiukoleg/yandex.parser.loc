<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

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
            [['title', 'brand'], 'string', 'max' => 255],
            [['title', 'brand'], 'string', 'max' => 255],
            [['description'], 'trim'],
            [['product_image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, gif', 'maxFiles' => 4],
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
