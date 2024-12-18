<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Materiales $model */

$this->title = 'Actualizar Materiales: ' . $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Materiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Nombre, 'url' => ['view', 'IdMaterial' => $model->IdMaterial]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="materiales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
