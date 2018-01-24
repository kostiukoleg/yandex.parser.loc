<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "platform".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 */
class Platform extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'platform';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'link', 'parse_link', 'xpath_product_link', 'xpath_title', 'xpath_price', 'xpath_img', 'xpath_main_img', 'xpath_description', 'product_category', 'product_url_category'], 'string', 'max' => 255],
             ['link_chk', 'default', 'value' => 0],
             ['description', 'filter', 'filter' => 'trim', 'skipOnArray' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название торговой площадки',
            'link' => 'Ссилка на площадку',
            'link_chk' => 'Полный путь в URL',
            'parse_link' => 'Ссылка на категорию что нужно спарсить',
            'description' => 'Описание товара',
            'xpath_product_link' => 'xpath на URL товара',
            'xpath_title' => 'xpath на название товара',
            'xpath_price' => 'xpath на цену товара',
            'xpath_img' => 'xpath на картинки для товара',
            'xpath_main_img' => 'xpath на главную картинку для товара',
            'xpath_description' => 'xpath на описание товара',
            'product_category' => 'Категория на Вашем сайте',
            'product_url_category' => 'URL категории на Вашем сайте',
        ];
    }
}
