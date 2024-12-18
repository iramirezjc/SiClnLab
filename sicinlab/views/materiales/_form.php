<?php

use yii\helpers\Html;
use app\models\Unidades;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Materiales $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="materiales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'Capacidad')->textInput(['type' => 'number', 'min' => 0, 'step' => '5']) ?>

    <?= $form->field($model, 'IdUnidad')->dropDownList(
            ArrayHelper::map(Unidades::find()->asArray()->all(), 'IdUnidad', 'Nombre'),
            ['prompt' => ['text' => 'Selecciona una opción', 'options' => ['hidden' => true]]]
        ) 
    ?>

    <?= $form->field($model, 'Cantidad')->textInput(['type' => 'number', 'min' => 0, 'step' => '1']) ?>

    <?= $form->field($model, 'Marca')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
