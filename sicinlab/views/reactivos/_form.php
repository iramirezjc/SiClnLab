<?php

use yii\helpers\Html;
use app\models\Unidades;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Reactivos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reactivos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'Formula')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'PeligroSalud')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'PeligroInflamable')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'PeligroReactividad')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'PeligroEspecifico')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'Cantidad')->textInput(['type' => 'number', 'min' => 0, 'step' => '1']) ?>

    <?= $form->field($model, 'IdUnidad')->dropDownList(
            ArrayHelper::map(Unidades::find()->asArray()->all(), 'IdUnidad', 'Nombre'),
            ['prompt' => ['text' => 'Selecciona una opción', 'options' => ['hidden' => true]]]
        ) 
    ?>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
