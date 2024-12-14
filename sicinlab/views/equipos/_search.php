<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BuscaEquipo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="equipos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="d-flex justify-content-center align-items-center">
        <?= 
            $form->field($model, 'Nombre')
            -> textInput([
                'placeholder' => 'Buscar por nombre del equipo...', 'class' => 'form-control',
                'style' => 'width: 600px;'
            ])
            -> label(false)
        ?>
    

        <div class="form-group d-flex justify-content-start ms-2">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
