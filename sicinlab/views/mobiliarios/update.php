<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Mobiliarios $model */

$this->title = 'Actualizar Mobiliario: ' . $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Mobiliarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Nombre, 'url' => ['view', 'IdMobiliario' => $model->IdMobiliario]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="mobiliarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>