<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\searchs\BuscaEquipo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="equipos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="d-flex justify-content-center align-items-center">
        <?= 
            $form->field($model, 'Nombre')-> textInput([
                'placeholder' => 'Buscar por nombre del equipo...', 'class' => 'form-control',
                'style' => 'width: 600px;'
            ])
            -> label(false)
        ?>
    

        <div class="form-group d-flex justify-content-start ms-2">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
            <?= Html::button('Limpiar', ['class' => 'btn btn-light ms-2', 'id' => 'btn-limpiar']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    $(document).ready(function() {
        // Cuando se haga clic en el botón "Limpiar"
        $('#btn-limpiar').on('click', function() {
            // Limpiar el campo de búsqueda (Nombre)
            $('input[name="BuscaEquipo[Nombre]"]').val('');

            // recarga la tabla sin filtros aplicados
            $('form').submit();
        });
    });
</script>