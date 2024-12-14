<?php

use app\models\Equipos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BuscaEquipo $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Equipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Equipos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Nombre',
            'Cantidad',
            'Descripcion',
            'TipoEquipo',
            [   
                'class' => ActionColumn::className(),
                'header' => 'Opciones',
                'urlCreator' => function ($action, Equipos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'IdEquipo' => $model->IdEquipo]);
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
    ]);  ?>

</div>
