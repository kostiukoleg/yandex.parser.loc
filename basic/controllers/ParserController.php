<?php

namespace app\controllers;

use Yii;
use csv\CsvController;
use garyjl\simplehtmldom\SimpleHTMLDom;
use app\models\Platform;
use app\models\Product;

class ParserController extends \yii\web\Controller
{
	public $productList = Array();

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

	public static function getParseLink($id){
		if (($model = Platform::findOne($id)) !== null) {
            return $model->parse_link;
        }
	}

	public static function parsingImages($ht, $id, $i, $product)
	{
		if (($model = Platform::findOne($id)) !== null) {  
			if(isset($model->xpath_img) && $model->xpath_img != "null"){
				foreach($ht->find($model->xpath_img) as $el) {
				
					if($el->src==false) continue;
					
					$img_link_src = preg_replace( "/^.?\//", $model->link, $el->src);
					
					preg_match("/[a-zA-z\-0-9() ]+.[a-zA-z\-0-9]+$/",$img_link_src,$new_img);

					if (copy($img_link_src,Yii::getAlias("@web")."uploads/tempimage/".$new_img[0])) {
						$product->product_image .= $new_img[0] ."|";	
					}
				}
			}else{
				foreach($ht->find($model->xpath_main_img) as $el) {
				
					if($el->src==false) continue;
					
					$img_link_src = preg_replace( "/^.?\//", $model->link, $el->src);
					
					preg_match("/[a-zA-z\-0-9() ]+.[a-zA-z\-0-9]+$/",$img_link_src,$new_img);
					if (copy($img_link_src,Yii::getAlias("@web")."uploads/tempimage/".$new_img[0])) {
						$product->product_image .= $new_img[0] ."|";		
					}			
				}
			}
		}
	}

	public static function getProductData($this, $id){
		
		$html = SimpleHTMLDom::file_get_html($this::getParseLink($id));
		if (($model = Platform::findOne($id)) !== null) {   
			if(isset($model->xpath_product_link) && $model->xpath_product_link != "null"){	
	        	for( $i=0; $i<count($html->find($model->xpath_product_link)); $i++) {
	        		$product = new Product();
	        		$product->product_link = $html->find($model->xpath_product_link)[$i]->href;
	        		
					if(isset($model->xpath_title) && $model->xpath_title != "null"){
						$product->title = $html->find($model->xpath_title)[$i]->plaintext;
					}
					if(isset($model->xpath_price) && $model->xpath_price != "null"){
						$product->price = $html->find($model->xpath_price)[$i]->plaintext;
					}
					
					$ln = preg_replace( "/^.?\//", $model->link, $html->find($model->xpath_product_link)[$i]->href);
					$ht = SimpleHTMLDom::file_get_html( $ln );
					if(isset($model->xpath_description) && $model->xpath_description != "null"){
						$product->description = $ht->find($model->xpath_description)[0]->outertext;
					}
					$product->platform_id = $id;

					$this::parsingImages($ht, $id, $i, $product);

					$product->save(false);
				}
	        }
    	}
	}

	public static function madeDataCsv()
	{
		$this::delFile(Yii::getAlias("@web")."uploads/csv/data.csv");

		$this::createFile(Yii::getAlias("@web")."uploads/csv/data.csv", "a");

		$csv = new CsvController(Yii::getAlias("@web")."uploads/csv/data.csv");

		$csv->setCSV(Array(mb_convert_encoding("Категория~URL категории~Товар~Вариант~Описание~Цена~URL~Изображение~Артикул~Количество~Активность~Заголовок [SEO]~Ключевые слова [SEO]~Описание [SEO]~Старая цена~Рекомендуемый~Новый~Сортировка~Вес~Связанные артикулы~Смежные категории~Ссылка на товар~Валюта~Свойства", "windows-1251", "utf-8")));
	}

	public function actionParserSite($id)
	{

		$this::cleanDir(Yii::getAlias("@web")."uploads/tempimage");

		
		if (!file_exists(Yii::getAlias("@web")."uploads/tempimage")) {
			mkdir(Yii::getAlias("@web")."uploads/tempimage", 0777, true);
		}

		

		
		
		$this::getProductData($this, $id);
		//return $this->render('parser-site', ['productList'=>$productList]);
	}
}
