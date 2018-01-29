<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $images;

    public function rules()
    {
        return [
            [['images'], 'file'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->images as $file) {
                var_dump($this->images);
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}