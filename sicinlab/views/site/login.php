<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'SiCInLab';
//$this->params['breadcrumbs'][] = $this->title;
Yii::$app->view->registerCssFile('@web/css/principal.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class],]);
?>
<img src="<?= Yii::getAlias('@web') ?>/backgrounds/logo.png" style="top:10%; position:  fixed;left:33%; width: 35%; "/>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, llena los campos para iniciar sesión:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php 
                $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Matricula']) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña']) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
