<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Platform */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Площадки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platform-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите это удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'link',
            'link_chk',
            'parse_link',
            'description',
            'xpath_product_link',  
            'xpath_title',  
            'xpath_price',  
            'xpath_img',  
            'xpath_main_img',  
            'xpath_description',  
            'product_category',  
            'product_url_category'
        ],
    ]) ?>

</div>
