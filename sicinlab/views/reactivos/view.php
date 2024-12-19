<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Reactivos $model */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Reactivos', 'url' => ['index']];
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
");
?>

<div class="reactivos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'IdReactivo' => $model->IdReactivo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'IdReactivo' => $model->IdReactivo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro que deseas eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IdReactivo',
            'Nombre',
            'Formula', 
            'PeligroSalud', 
            'PeligroInflamable', 
            'PeligroReactividad', 
            'PeligroEspecifico', 
            'Cantidad',
            [
                'label' => 'Unidad de Medida',
                'value' => function ($model) { return $model->unidad ? $model->unidad->Nombre : 'No disponible'; },
            ],
        ],
    ]) ?>

</div>
