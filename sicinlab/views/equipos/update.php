<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Equipos $model */

$this->title = 'Actualizar Equipos: ' . $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Equipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Nombre, 'url' => ['view', 'IdEquipo' => $model->IdEquipo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="equipos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
