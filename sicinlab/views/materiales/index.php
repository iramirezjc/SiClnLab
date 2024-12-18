<?php

use app\models\Materiales;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\searchs\BuscaMaterial $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Materiales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materiales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Material', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Nombre',
            'Capacidad',
            [
                'label' => 'Unidad de Medida',
                'value' => function ($model) { return $model->unidad ? $model->unidad->Nombre : 'No disponible'; },
            ],
            'Cantidad',
            'Marca',
            [   
                'class' => ActionColumn::className(),
                'header' => 'Opciones',
                'urlCreator' => function ($action, Materiales $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'IdMaterial' => $model->IdMaterial]);
                },
                'buttons' => [
                    'view' => function($url, $model) {
                        return Html::a('<i class="bi bi-eye-fill"></i>', $url, ['title' => 'Ver',]);
                    },
                    'update' => function($url, $model) {
                        return Html::a('<i class="bi bi-pencil-fill"></i>', $url, ['title' => 'Actualizar',]);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<i class="bi bi-trash-fill"></i>', $url, [
                            'title' => 'Eliminar',
                            'data-method' => 'post',
                            'data-confirm' => '¿Estas seguro que deseas eliminar este elemento?',
                        ]);
                    },
                ],
            ],
        ],
        'summary' => false,
        'emptyText' => 'No se encontraron resultados.'
    ]);  ?>

</div>
