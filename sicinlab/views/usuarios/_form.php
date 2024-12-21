<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\NivelUsuarios;

/** @var yii\web\View $this */
/** @var app\models\Usuarios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Matricula')->textInput([
            'type' => 'number', 'min' => 0,
            'placeholder' => 'Matricula del Estudiante o Profesor',
        ]) 
    ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'FechaNacimiento')->textInput([
            'maxlength' => true,
            'placeholder' => 'yy-mm-dd'
        ])
    ?>

    <?= $form->field($model, 'IdNivelUsuario')->radioList(NivelUsuarios::getNivelUsuarioOptions())?>

    <?= $form->field($model, 'NombreUsuario')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'Contrasenia')->passwordInput(['maxlength' => true])?>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
