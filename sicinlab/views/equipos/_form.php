<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Equipos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="equipos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'Cantidad')->textInput(['type' => 'number', 'min' => 0, 'step' => '1']) ?>

    <?= $form->field($model, 'Descripcion')->textArea(['maxlength' => true, 'form-control mb-3']) ?>

    <?= $form->field($model, 'TipoEquipo')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
