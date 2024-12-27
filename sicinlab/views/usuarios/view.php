<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\Usuarios $model */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php
$this->registerCss("
    .detail-view th {
        width: 20%; /* Ajusta el tamaño de las celdas de la columna izquierda */
    }
    .detail-view td {
        max-width: 500px; /* Establece un ancho máximo para las celdas de la columna derecha */
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .password-field-container {
        display: flex;
        justify-content: space-between; /* Alinea el contenido a la izquierda y el botón a la derecha */
        align-items: center; /* Asegura que el texto y el botón estén alineados verticalmente */
    }
    .password-field {
        margin-right: 10px; /* Agrega espacio entre la contraseña y el botón */
    }
");
?>

<div class="usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'Matricula' => $model->Matricula], ['class' => 'btn btn-primary']) ?>
        <?php if (Yii::$app->user->identity->Matricula != $model->Matricula): ?>
            <?= Html::a('Eliminar', ['delete', 'Matricula' => $model->Matricula], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Estas seguro que deseas eliminar este usuario?',
                    'method' => 'post',
                ],
            ])?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Matricula',
            'Nombre', 
            'Apellido', 
            // Ocultamos inicialmente la contraseña
            [
                'label' => 'Contraseña',
                'value' => Html::tag('div', 
                    Html::tag('span', '********', [
                        'id' => 'password-field', // Un id para el campo de la contraseña
                        'class' => 'password-field', // Clase para seleccionar con JS
                    ]) . 
                    Html::a('<i class="bi bi-eye-fill"></i>', '#', [
                        'class' => 'btn btn-link',
                        'id' => 'show-password-button', // ID para el manejo del clic
                        'title' => 'Mostrar Contraseña'
                    ]),
                    ['class' => 'password-field-container']
                ),
                'format' => 'raw',
            ], 
            'FechaNacimiento',
            'Telefono',
            [
                'label' => 'Nivel de Usuario',
                'value' => function ($model) { return $model->nivelUsuario ? $model->nivelUsuario->NombreNivel : 'No disponible'; },
            ],
            'NombreUsuario',
        ],
    ]) ?>

</div>

<?php
// Script para mostrar/ocultar la contraseña
$this->registerJs(new JsExpression("
    $('#show-password-button').on('click', function() {
        var passwordField = $('#password-field'); // Seleccionamos el campo de la contraseña
        var button = $(this); // El botón de mostrar/ocultar

        // Si el texto es '********', mostramos la contraseña real
        if (passwordField.text() === '********') {
            passwordField.text('". $model->Contrasenia ."'); // Reemplazamos por la contraseña real
            button.html('<i class=\"bi bi-eye-slash-fill\"></i>'); // Cambiamos el ícono a un ojo tachado
            button.attr('title', 'Ocultar Contraseña'); // Cambiamos el título del botón
        } else {
            passwordField.text('********'); // Ocultamos de nuevo la contraseña
            button.html('<i class=\"bi bi-eye-fill\"></i>'); // Volvemos a poner el ícono de ojo
            button.attr('title', 'Mostrar Contraseña'); // Cambiamos el título del botón
        }
    });
"));
?>
