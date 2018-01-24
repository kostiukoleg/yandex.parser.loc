<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\PlatformSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="platform-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'link') ?>
    
    <?= $form->field($model, 'link_chk') ?>

    <?= $form->field($model, 'parse_link') ?>

    <?= $form->field($model, 'description') ?>
    
    <?= $form->field($model, 'xpath_product_link') ?>

    <?= $form->field($model, 'xpath_title') ?>

    <?= $form->field($model, 'xpath_price') ?>

    <?= $form->field($model, 'xpath_img') ?>

    <?= $form->field($model, 'xpath_main_img') ?>

    <?= $form->field($model, 'xpath_description') ?>

    <?= $form->field($model, 'product_category') ?>

    <?= $form->field($model, 'product_url_category') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
