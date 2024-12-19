<?php

use app\models\Reactivos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\searchs\BuscaReactivo $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Reactivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reactivos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Reactivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
            [   
                'class' => ActionColumn::className(),
                'header' => 'Opciones',
                'urlCreator' => function ($action, Reactivos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'IdReactivo' => $model->IdReactivo]);
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
