<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Equipos $model */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Equipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'IdEquipo' => $model->IdEquipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'IdEquipo' => $model->IdEquipo], [
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
            'IdEquipo',
            'Nombre',
            'Cantidad',
            'Descripcion',
            'TipoEquipo',
        ],
    ]) ?>

</div>
