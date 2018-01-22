<?php

/* @var $this yii\web\View */

$this->title = 'Парсер товаров Яндекс.Маркет v.9.25';
?>
<div class="site-index">
<h1>Парсер товаров Яндекс.Маркет v.9.25</h1>
  <div class="row">
    <div class="col-xs-6 col-lg-3">
                <h3>Управление</h3>
        <ul>
            <li><a href="">Запуск парсера</a></li>
            <li><a href="">Остановить парсер</a></li>
            <li><a href="">Редактор товаров</a></li>
            <li><a href="">Настройки</a></li>
        </ul>
                <h3>Экспорт</h3>
        <ul>
            <li><a href="">Экспорт в csv для 1C-Битрикс</a></li>
            <li><a href="">Экспорт в csv для Advantshop</a></li>
            <li><a href="">Экспорт в csv для Amiro.CMS 4.x</a></li>
            <li><a href="">Экспорт в csv для Amiro.CMS 5.x</a></li>
            <li><a href="">Экспорт в csv для BMshop</a></li>
            <li><a href="">Экспорт в csv для CS-Cart</a></li>
            <li><a href="">Экспорт в csv для Drupal e-Commerce</a></li>
            <li><a href="">Экспорт в csv для HostCMS</a></li>
            <li><a href="">Экспорт в csv для ImageCMS</a></li>
            <li><a href="">Экспорт в csv для Insales</a></li>
            <li><a href="">Экспорт в xml для MediaWiki</a></li>
            <li><a href="">Экспорт в csv для Moguta</a></li>
            <li><a href="">Экспорт в csv для NetCat</a></li>
            <li><a href="">Экспорт в csv для Ocstore</a></li>
            <li><a href="">Экспорт в csv для OpenCart & OcStore</a></li>
            <li><a href="">Экспорт в csv для OSCommerce</a></li>
            <li><a href="">Экспорт в csv для PHPShop</a></li>
            <li><a href="">Экспорт в csv для PrestaShop</a></li>
            <li><a href="">Экспорт в csv для ShopCMS</a></li>
            <li><a href="">Экспорт в csv для ShopScript</a></li>
            <li><a href="">Экспорт в csv для ShopScript Free</a></li>
            <li><a href="">Экспорт в csv для SimplaCMS</a></li>
            <li><a href="">Экспорт в csv для UMI.CMS</a></li>
            <li><a href="">Экспорт в csv для VamShop</a></li>
            <li><a href="">Экспорт в tkx для TextKit</a></li>
            <li><a href="">Экспорт в csv для VirtueMart</a></li>
            <li><a href="">Экспорт в csv для VirtueMart 2.x</a></li>
            <li><a href="">Экспорт в csv для WebAsyst</a></li>
            <li><a href="">Экспорт в csv для WooCommerce</a></li>
            <li><a href="">Экспорт в csv для WooCommerce (All import WP)</a></li>
            <li><a href="">Экспорт в xml для WordPress</a></li>
            <li><a href="">Экспорт в xml для WP eCommerce</a></li>
            <li><a href="">Экспорт в csv для Zebroid</a></li>
            <li><a href="">Экспорт в txt для Zerber</a></li>
            <li><a href="">Экспорт в txt для Zebrum Lite</a></li>
            <li><a href="">Экспорт в ТХТ</a></li>
            <li><a href="">Экспорт в csv №1</a></li>
            <li><a href="">Экспорт в csv №2</a></li>
            <li><a href="">Экспорт в csv №3</a></li>
            <li><a href="">Создать свой экспорт</a></li>
        </ul>
    </div>
    <div class="col-xs-12 col-sm-6 col-lg-9">
        <form action="" method="POST" enctype="multipart/form-data">
            <p>
                <label for="platform">Торговая площадка:</label>
                <select id="platform" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </p>
            <p>
                <label for="url_category">URL категории:</label>
                <textarea id="url_category" class="form-control"></textarea>
                <span>Возможен ввод нескольких товаров или URL категорий, по формату: 1 строка = 1 название или URL</span>
            </p>
            <p>
                <b>Пример:</b>
                <span>
                    https://market.yandex.ru/catalog/54726/list?hid=91491&track=menuleaf&local-offers-first=1&deliveryincluded=0&onstock=1<br>
                    https://market.yandex.ru/catalog/54542/list?hid=91011&local-offers-first=0&deliveryincluded=0&onstock=1
                </span>
            </p>
            <p>
                <label for="items">Кол-во товаров:</label>
                <input type="text" class="form-control" id="items">
            </p>            
            <p>
                <label for="delay">Задержка при парсинге:</label>
                <input type="text" class="form-control" id="delay">
            </p>
            <p>
                <label for="proxy">Использовать прокси:</label>
                <input type="checkbox" id="proxy">
            </p>
            <p>
                <input type="submit" class="btn btn-info" value="Начать парсинг">
            </p>
        </form>
    </div>   
  </div>  
</div>
