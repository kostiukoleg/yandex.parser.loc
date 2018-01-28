<?php

namespace app\controllers;

class ParserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public static function cleanDir($dir="")
    {
		if (file_exists($dir))
			foreach (glob($dir.'/*') as $file)
				unlink($file);
	}
	
	public static function minifyHTML($html){
		return preg_replace('/\s+/', ' ', $html);
	}	

	public static function delFile($fileName){
		if(file_exists(realpath($fileName))){
			unlink(realpath($fileName));
			return true;
		} else {
			return false;
		}
	}

	public static function createFile($fileName, $a){
		if(fopen($fileName, $a)){
			return true;
		} else {
			return false;
		}
	}
}
