<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уворены что хотите это удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'category_id',
            [
                'attribute' => 'product_image',
                'format' => 'html',
                'value' => function($model) {  
                    $str = "";
                    $arr = explode("|", $model->product_image);
                        foreach ($arr as $value) {
                           $str .= Html::img(Yii::getAlias('@web'). "/uploads/tempimage/" . $value, ['width' => 250]);
                        }       
                    return $str;
                }
            ],
            'price',
            'brand',
            'description',
        ],
    ]) ?>

</div>
