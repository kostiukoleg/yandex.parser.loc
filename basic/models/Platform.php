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
            [['title', 'link'], 'string', 'max' => 255],
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
        ];
    }
}
