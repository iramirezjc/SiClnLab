<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Materiales $model */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Materiales', 'url' => ['index']];
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
<div class="materiales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'IdMaterial' => $model->IdMaterial], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'IdMaterial' => $model->IdMaterial], [
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
            'IdMaterial',
            'Nombre',
            'Capacidad',
            [
                'label' => 'Unidad de Medida',
                'value' => function ($model) { return $model->unidad ? $model->unidad->Nombre : 'No disponible'; },
            ],
            'Cantidad',
            'Marca',
        ],
    ]) ?>

</div>
