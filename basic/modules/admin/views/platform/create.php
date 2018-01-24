<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Platform */

$this->title = 'Создать площадку';
$this->params['breadcrumbs'][] = ['label' => 'Торговые площадки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platform-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
