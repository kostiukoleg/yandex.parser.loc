<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Platform */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="platform-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_chk')->checkbox() ?>

    <?= $form->field($model, 'parse_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textArea() ?>

    <?= $form->field($model, 'xpath_product_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xpath_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xpath_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xpath_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xpath_main_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xpath_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_url_category')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
