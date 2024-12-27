<?php

use app\models\Usuarios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\searchs\BuscaUsuario $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Matricula',
            'NombreUsuario', 
            [
                'label' => 'Nombre Completo',
                'value' => function ($model) { return $model->Nombre . " " . $model->Apellido; },
            ],
            [
                'label' => 'Nivel de Usuario',
                'value' => function ($model) { return $model->nivelUsuario ? $model->nivelUsuario->NombreNivel : 'No disponible'; },
            ],
            [   
                'class' => ActionColumn::className(),
                'header' => 'Opciones',
                'urlCreator' => function ($action, Usuarios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Matricula' => $model->Matricula]);
                },
                'contentOptions' => ['style' => 'text-align: center; padding: 5px;'],
                'buttons' => [
                    'view' => function($url, $model) {
                        return Html::a('Ver Detalle', $url, ['class' => 'btn btn-primary', 'title' => 'Ver',]);
                    },
                    'update' => function($url, $model) {
                        return '';
                    },
                    'delete' => function($url, $model) {
                        return '';
                    },
                ],
            ],
        ],
        'summary' => false,
        'emptyText' => 'No se encontraron resultados.'
    ]);  ?>

</div>
