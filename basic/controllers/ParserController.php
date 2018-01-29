<?php

namespace app\controllers;

use Yii;
use csv\CsvController;
use garyjl\simplehtmldom\SimpleHTMLDom;
use app\models\Platform;
use app\models\Product;

class ParserController extends \yii\web\Controller
{
	public $csv;

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

	public static function parsingImages($ht, $id, $i, $product, $regex)
	{
		$img = Array();
		
		if (($model = Platform::findOne($id)) !== null) {  
			if(isset($model->xpath_img) && $model->xpath_img != "null"){
				foreach($ht->find($model->xpath_img) as $el) {
				
					if($el->src==false) continue;
					
					$img_link_src = preg_replace( "/^.?\//", $model->link, $el->src);
					
					if($regex[0]!=='null'){
						$img_link_src = preg_replace( "/".$regex[0]."/", "/".$regex[1]."/", $el->src);
					}
					
					preg_match("/[a-zA-z\-0-9() ]+.[a-zA-z\-0-9]+$/",$img_link_src,$new_img);

					if (copy($img_link_src,Yii::getAlias("@web")."uploads/tempimage/".$new_img[0])) {
						 $img[]= $new_img[0];	
					}
				}
				$product->product_image = implode("|", $img);
			}else{
				foreach($ht->find($model->xpath_main_img) as $el) {
				
					if($el->src==false) continue;
					
					$img_link_src = preg_replace( "/^.?\//", $model->link, $el->src);
					
					if($regex[0]!=='null'){
						$img_link_src = preg_replace( "/".$regex[0]."/", "/".$regex[1]."/", $el->src);
					}
					
					preg_match("/[a-zA-z\-0-9() ]+.[a-zA-z\-0-9]+$/",$img_link_src,$new_img);
					if (copy($img_link_src,Yii::getAlias("@web")."uploads/tempimage/".$new_img[0])) {
						$img[] = $new_img[0];		
					}			
				}
				$product->product_image = implode("|", $img);
			}
		}
	}

	public static function getProductData($this, $id){
		
		$html = SimpleHTMLDom::file_get_html($this::getParseLink($id));
		if (($model = Platform::findOne($id)) !== null) {   
			if(!isset($model->xpath_product_link) || $model->xpath_product_link != "null"){	
	        	for( $i=0; $i<count($html->find($model->xpath_product_link)); $i++) {
	        		$product = new Product();
	        		$product->product_link = preg_replace( "/^.?\//", $model->link, $html->find($model->xpath_product_link)[$i]->href);
	        		
					if(!isset($model->xpath_title) || $model->xpath_title != "null"){
						$product->title = $html->find($model->xpath_title)[$i]->plaintext;
					}
					if(!isset($model->xpath_price) || $model->xpath_price != "null"){
						$product->price = $html->find($model->xpath_price)[$i]->plaintext;
					}
					
					$ln = preg_replace( "/^.?\//", $model->link, $html->find($model->xpath_product_link)[$i]->href);
					$ht = SimpleHTMLDom::file_get_html( $ln );
					if(!isset($model->xpath_description) || $model->xpath_description != "null"){
						$product->description = $ht->find($model->xpath_description)[0]->outertext;
					}
					$product->platform_id = $id;
					
					$regex = explode(",", $model->regular_img);
					//var_dump($regex);die();
					$this::parsingImages($ht, $id, $i, $product, $regex);

					$product->save(false);
				}
	        }
    	}
	}

	public static function madeHederCsv()
	{
		$this::delFile(Yii::getAlias("@web")."uploads/csv/data.csv");

		$this::createFile(Yii::getAlias("@web")."uploads/csv/data.csv", "a");

		$csv = new CsvController(Yii::getAlias("@web")."uploads/csv/data.csv");

		return $csv->setCSV(Array(mb_convert_encoding("Категория~URL категории~Товар~Вариант~Описание~Цена~URL~Изображение~Артикул~Количество~Активность~Заголовок [SEO]~Ключевые слова [SEO]~Описание [SEO]~Старая цена~Рекомендуемый~Новый~Сортировка~Вес~Связанные артикулы~Смежные категории~Ссылка на товар~Валюта~Свойства", "windows-1251", "utf-8")));
	}

	public static function madeDataCsv($csv)
	{
		$product = new Product();
		$category = mb_convert_encoding($product->category, 'windows-1251', 'UTF-8'); //Категория товара "Компьютерная техника/Компьютеры и ноутбуки/Ноутбуки"
		$url_category = $product->product_link; //URL категории
		$goods = mb_convert_encoding($main_arr["title"][$k], 'windows-1251', 'UTF-8'); //Товар "Ноутбук Dell Inspiron N411Z"
		$options = ""; //Вариант "без чехла"
		$description = str_replace('{$goods}',$goods,mb_convert_encoding(preg_replace( "/\r|\n/", "", $main_arr["xpath_product_description"][$k] ), 'windows-1251', 'UTF-8'));
		$price = $main_arr["price"][$k]; //Цена "19000"substr(, 0, -2)
		$url = ""; //URL "noutbuk-dell-inspiron-n411z"
		$img = ""; //Изображение "noutbuk-Dell-Inspiron-N411Z.png[:param:][alt=ноутбук dell][title=ноутбук dell]|noutbuk-Dell-Inspiron-N411Z-oneside.png[:param:][alt=Ноутбук"

		if(is_array($main_arr["img"][$k])){
			foreach($main_arr["img"][$k] as $im){
			$img .= $im."[:param:][alt=$goods][title=$goods]|";
			}
			$img = substr($img, 0, -1);
		} else {
			$img .= $main_arr["img"][$k]."[:param:][alt=$goods][title=$goods]";
		}
		
		$articul = ""; //Артикул "1000A"
		$count = "-1"; //Количество "-1 нет на складе"
		$activity = "1"; //Активность 1 включон 0 выключен
		$title_seo = ""; //Заголовок [SEO]
		$kay_words = ""; //Ключевые слова [SEO]
		$description_seo = ""; //Описание [SEO]
		$old_price = ""; //Старая цена
		$reccomend = "0"; //Рекомендуемый
		$new = "0"; //Новый
		$sort = ""; //Сортировка
		$weight = "0,27"; //Вес "2,27"
		$bind_articul = ""; //Связанные артикулы
		$neibor_category = ""; //Смежные категории
		$link_goods = ""; //Ссылка на товар
		$currency = "UAH"; //Валюта

		$pr = array(
			 "PB\/SB" => "полированная латунь / матовая латунь",
			 "MACC" => "матовая бронза",
			 "AB" => "старая бронза",
			 "SN\/CP" => "матовый никель / полированный хром",
			 "MBN" => "матовая темная сталь",
			 "White" => "белый",
			 "MOC" => "матовый старый хром",
			 "MA" => "матовый антрацит",
			 "MC" => "матовый хром",
			 "BN\/SBN" => "черный никель / матовый черный никель",
			 "BLACK" => "черный",
			 "CP" => "полированный хром",
			 "PCF" => "полированная бронза",
			 "MACC\/PCF" => "матова бронза/полірована бронза",
			 "MCF" => "матовая темная бронза",
			 "SN" => "матовый никель",
			 "SS" => "нержавеющая сталь",
			 "BN" => "черный никель",
		);
		
		foreach($pr as $p => $v){
			if(preg_match("/\s".$p."$/",$main_arr["title"][$k])){
				$propertis = "Цвет покрытия=$v"; //Свойства
			}else{
				$propertis = "";
			}
		}

		return $csv->setCSV(array("$category~$url_category~$goods~$options~$description~$price~$url~$img~$articul~$count~$activity~$title_seo~$kay_words~$description_seo~$old_price~$reccomend~$new~$sort~$weight~$bind_articul~$neibor_category~$link_goods~$currency~$propertis"));
	}
	
	public function actionParserSite($id)
	{
		$productList = new Product();
		
		$this::cleanDir(Yii::getAlias("@web")."uploads/tempimage");

		
		if (!file_exists(Yii::getAlias("@web")."uploads/tempimage")) {
			mkdir(Yii::getAlias("@web")."uploads/tempimage", 0777, true);
		}
		
		$this::getProductData($this, $id);
		
		//return $this->render('@app/modules/admin/views/product/view');
	}
}
