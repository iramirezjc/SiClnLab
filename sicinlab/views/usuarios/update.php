<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Usuarios $model */

$this->title = 'Actualizar Usuario: ' . $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Nombre, 'url' => ['view', 'Matricula' => $model->Matricula]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="usuarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
