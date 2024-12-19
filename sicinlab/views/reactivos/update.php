<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reactivos $model */

$this->title = 'Actualizar Reactivo: ' . $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Reactivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Nombre, 'url' => ['view', 'IdReactivo' => $model->IdReactivo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="reactivos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
