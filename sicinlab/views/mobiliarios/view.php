<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Mobiliarios $model */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Mobiliario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mobiliarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'IdMobiliario' => $model->IdMobiliario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'IdMobiliario' => $model->IdMobiliario], [
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
            'IdMobiliario',
            'Nombre',
            'Cantidad',
            'Descripcion',
            'Material',
        ],
    ]) ?>

</div>
