<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;


$this->title = 'Форма регистрации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
<h1><?= Html::encode($this->title) ?></h1>
<?php if (Yii::$app->session->hasFlash('signupFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for registration. We will respond to you as soon as possible.
        </div>

    <?php else: ?>

        <p>
            Заполните все поля формы.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'id' => 'signup-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'email')->textInput() ?>

                    <?= $form->field($model, 'site')->textInput()  ?>

                    <?= $form->field($model, 'phone')->textInput() ?>

                    <?= $form->field($model, 'photo')->fileInput(['accept' => 'image/*']) ?>

                    <?= $form->field($model, 'captcha')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>