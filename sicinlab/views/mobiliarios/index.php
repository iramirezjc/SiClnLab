<?php

use app\models\Mobiliarios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\searchs\BuscaMobiliario $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Mobiliarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobiliarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Mobiliario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Nombre',
            'Cantidad',
            'Descripcion',
            'Material',
            [   
                'class' => ActionColumn::className(),
                'header' => 'Opciones',
                'urlCreator' => function ($action, Mobiliarios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'IdMobiliario' => $model->IdMobiliario]);
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
